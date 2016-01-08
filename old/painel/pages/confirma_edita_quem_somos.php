<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$texto = $_POST["texto"];
	
	$id_usuario_cadastro = $_POST["id_usuario_cadastro"];
	
	$data = date("Y-m-d");
	
	date_default_timezone_set("Brazil/East");
	$hora = date("H:i:s");
	
	$status = "ATIVO";
	
	$sql = "UPDATE quem_somos SET quem_somos='$texto', data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario_cadastro' WHERE id='1'";
	$query = mysql_query($sql);
	
	if( $query ){
		echo("<script language='JavaScript'>alert('PAGINA QUEM SOMOS ATUALIZADA COM SUCESSO!'); location='../home.php';</script>");
	} else {
		echo mysql_error();
	}
}
?>