<?php
include("../conecta.php");

$id_foto = $_GET["id_foto"];
$id_usuario_cadastro = $_GET["id_usuario_cadastro"];

$foto = $_GET["foto"];

$data = date("Y-m-d");
	
date_default_timezone_set("Brazil/East");
$hora = date("H:i:s");

$sql = "DELETE FROM fotos WHERE id='$id_foto'";
$query = mysql_query($sql);

unlink("../img/fotos/$foto");

if( $query ){
	echo("<script language='JavaScript'>alert('EXCLUSAO REALIZADA COM SUCESSO!'); location='../home.php';</script>");
} else {
	echo mysql_error();
}
?>