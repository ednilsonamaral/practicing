<?php
include("../conecta.php");

session_start();

$login_usuario = strtoupper($_POST["login_usuario"]);
$senha = md5($_POST["senha"]);

$sql = "SELECT * FROM usuarios WHERE login_usuario='$login_usuario' AND senha=md5('$senha') AND NOT status='INATIVO'";
$query = mysql_query($sql);

$contando = mysql_num_rows($query);

while( $linha = mysql_fetch_object($query) ){
	$nome = $linha->nome;
	$login_usuario = $linha->login_usuario;
	$id_usuario = $linha->id;
}

$data_entrada = date("Y-m-d");

date_default_timezone_set("Brazil/East");
$hora_entrada = date("H:i:s");

$status = "ATIVO";

$visibilidade = "IN";

if( $contando < 1 ){
	echo("<script language='JavaScript'>alert('LOGIN DE USUÁRIO E/OU SENHA INCORRETOS! POR FAVOR, TENTE NOVAMENTE!'); location='../index.php';</script>");
} else {
	$data = date("dmY");
	
	$lsql = "INSERT INTO usuarios_logados (id_usuario, visibilidade, data_entrada, hora_entrada, status) VALUES ('$id_usuario', '$visibilidade', '$data_entrada', '$hora_entrada', '$status')";
	$lquery = mysql_query($lsql);
	
	$psql = "SELECT * FROM usuarios_niveis WHERE id_usuario='$id_usuario'";
	$pquery = mysql_query($psql);
	
	while( $linha = mysql_fetch_object($query) ){
		$perfil_usuario = $linha->perfil;
	}
	
	$_SESSION["id_usuario"] = "$id_usuario";
	$_SESSION["logado"] = "$data";
	$_SESSION["data_entrada"] = "$data_entrada";
	$_SESSION["hora_entrada"] = "$hora_entrada";
	
	if( $lquery ){
		echo("<script language='JavaScript'>location='../home.php';</script>");
	} else {
		echo mysql_error();
	}
}
?>