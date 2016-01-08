<?php
include("../conecta.php");

$id_galeria_foto = $_GET["id_galeria_foto"];
$id_usuario_cadastro = $_GET["id_usuario_cadastro"];

$data = date("Y-m-d");
	
date_default_timezone_set("Brazil/East");
$hora = date("H:i:s");

$sql = "UPDATE galeria_fotos SET status='INATIVO', data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario_cadastro' WHERE id='$id_galeria_foto'";
$query = mysql_query($sql);

$fsql = "SELECT * FROM fotos WHERE id_galeria='$id_galeria_foto'";
$fquery = mysql_query($fsql);

while( $flinha = mysql_fetch_object($fquery) ){
	$foto = $flinha->foto;
	
	unlink("../img/fotos/$foto");
}

$isql = "DELETE FROM fotos WHERE id_galeria='$id_galeria_foto'";
$iquery = mysql_query($isql);

if( $query ){
	echo("<script language='JavaScript'>alert('EXCLUSAO REALIZADA COM SUCESSO!'); location='../home.php';</script>");
} else {
	echo mysql_error();
}
?>