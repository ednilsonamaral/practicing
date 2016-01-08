<?php
include("../conecta.php");

if( !isset($_SESSION) ){
	session_start();
}

$data_entrada = $_SESSION["data_entrada"];
$hora_entrada = $_SESSION["hora_entrada"];
$id_usuario = $_SESSION["id_usuario"];

$_SESSION["id_usuario"] = NULL;
$_SESSION["logado"] = NULL;
$_SESSION["data_entrada"] = NULL;
$_SESSION["hora_entrada"] = NULL;

unset($_SESSION["id_usuario"]);
unset($_SESSION["logado"]);
unset($_SESSION["data_entrada"]);
unset($_SESSION["hora_entrada"]);

$data_saida = date("Y-m-d");

date_default_timezone_set("Brazil/East");
$hora_saida = date("H:i:s");

$sql = "UPDATE usuarios_logados SET visibilidade='OUT', data_saida='$data_saida', hora_saida='$hora_saida', status='INATIVO' WHERE data_entrada='$data_entrada' AND hora_entrada='$hora_entrada' AND id_usuario='$id_usuario'";
$query = mysql_query($sql);

if( $query ){
	echo("<script language='JavaScript'>location='../index.php';</script>");
} else {
	echo mysql_error();
}
?>