<?php
include("../conecta.php");

$id_parceiro = $_GET["id_parceiro"];
$id_usuario_cadastro = $_GET["id_usuario_cadastro"];
$logo = $_GET["logo"];

unlink("../img/fotos/$logo");

$data = date("Y-m-d");
	
date_default_timezone_set("Brazil/East");
$hora = date("H:i:s");

$sql = "DELETE FROM parceiros WHERE id='$id_parceiro'";
$query = mysql_query($sql);

if( $query ){
	echo("<script language='JavaScript'>alert('PARCEIRO EXCLUIDO COM SUCESSO!'); location='parceiros.php';</script>");
} else {
	echo mysql_error();
}
?>