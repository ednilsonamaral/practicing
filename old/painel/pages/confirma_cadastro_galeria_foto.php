<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$id_usuario_cadastro = $_POST["id_usuario_cadastro"];
	
	$data = date("Y-m-d");
	
	date_default_timezone_set("Brazil/East");
	$hora = date("H:i:s");
	
	$nome_galeria = mb_strtoupper($_POST["nome_galeria"]);
	
	$sql = "INSERT INTO galeria_fotos (nome_galeria, data_cadastro, hora_cadastro, id_usuario_cadastro, status) VALUES ('$nome_galeria', '$data', '$hora', '$id_usuario_cadastro', 'ATIVO')";
	$query = mysql_query($sql);
	
	if( $query ){
		$vsql = "SELECT * FROM galeria_fotos WHERE hora_cadastro='$hora' AND data_cadastro='$data'";
		$vquery = mysql_query($vsql);
		
		while( $vlinha = mysql_fetch_object($vquery) ){
			$id_galeria = $vlinha->id;
		}
		
		echo("<script language='JavaScript'>alert('GALERIA DE FOTOS CADASTRADA COM SUCESSO!'); location='add_foto.php?id_galeria_foto=$id_galeria';</script>");
	} else {
		echo mysql_error();
	}
}
?>