<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$senha = md5 ($_POST["senha"]);
	
	$confirma_senha = md5 ($_POST["confirma_senha"]) ;
	
	$id_usuario_cadastro = $_POST["id_usuario_cadastro"];
	
	$id_usuario = $_POST["id_usuario"];
	
	$data = date("Y-m-d");
	
	date_default_timezone_set("Brazil/East");
	$hora = date("H:i:s");
	
	$status = "ATIVO";
	
	if( $senha != $confirma_senha){
		echo ' FDP !';
	} else {
		$sql = "UPDATE usuarios SET senha=md5('$confirma_senha'), data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario_cadastro' WHERE id='$id_usuario'";
		$query = mysql_query($sql);
		
		if( $query ){
			echo("<script language='JavaScript'>alert('SENHA ATUALIZADA COM SUCESSO!'); location='../home.php';</script>");
		} else {
			echo mysql_error();
		}
	}
}
?>