<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$id_usuario_cadastro = $_POST["id_usuario_cadastro"];
	$id_galeria_foto = $_POST["id_galeria_foto"];
	
	$nome_galeria = mb_strtoupper($_POST["nome_galeria"]);
	
	$data = date("Y-m-d");
	
	date_default_timezone_set("Brazil/East");
	$hora = date("H:i:s");
	
	$sql = "UPDATE galeria_fotos SET nome_galeria='$nome_galeria', data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario_cadastro' WHERE id='$id_galeria_foto'";
	$query = mysql_query($sql);
	
	if( $query ){
		echo("<script language='JavaScript'>alert('DADOS BÁSICOS DA GALERIA DE FOTO ATUALIZADAS COM SUCESSO!'); location='galeria_fotos.php';</script>");
	} else {
		echo mysql_error();
	}
}
?>