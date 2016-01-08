<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$nome = mb_strtoupper($_POST["nome"]);
	$email = $_POST["email"];
	$login_usuario = mb_strtoupper($_POST["login_usuario"]);
	
	$data = date("Y-m-d");
	
	date_default_timezone_set("Brazil/East");
	$hora = date("H:i:s");
	
	$status = "ATIVO";
	
	$perfil_usuario = $_POST["perfil_usuario"];
	$id_usuario = $_POST["id_usuario_get"];
	
	$sql = "UPDATE usuarios SET nome='$nome', email='$email', login_usuario='$login_usuario', data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario' WHERE id='$id_usuario'";
	$query = mysql_query($sql);
		
	$psql = "UPDATE usuarios_niveis SET perfil='$perfil_usuario', data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario' WHERE id_usuario='$id_usuario'";
	$pquery = mysql_query($psql);
		
	if( $pquery ){
		echo("<script language='JavaScript'>alert('CONTA ATUALIZADA COM SUCESSO!'); location='../home.php';</script>");
	} else {
		echo mysql_error();
	}
}
?>