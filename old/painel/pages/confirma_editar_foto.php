<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$id_usuario_cadastro = $_POST["id_usuario_cadastro"];
	$id_galeria_foto = $_POST["id_galeria_foto"];
	$id_foto = $_POST["id_foto"];
	
	$legenda = $_POST["legenda"];
	
	$data = date("Y-m-d");
	
	date_default_timezone_set("Brazil/East");
	$hora = date("H:i:s");
	
	$sql = "UPDATE fotos SET legenda='$legenda', data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario_cadastro' WHERE id='$id_foto'";
	$query = mysql_query($sql);
	
	if( $query ){
		echo("<script language='JavaScript'>alert('DADOS BÁSICOS DA FOTO ATUALIZADAS COM SUCESSO!'); location='ver_foto.php?id_galeria_foto=$id_galeria_foto';</script>");
	} else {
		echo mysql_error();
	}
}
?>