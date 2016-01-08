<?php
//Formato padrão dos caracteres
header('Content-Type: text/html; charset=utf-8');

$servidor = "dbmy0050.whservidor.com";
$usuario = "itagranmar";
$senha = "monster10d";
$banco = "itagranmar";

$conexao = mysql_connect($servidor, $usuario, $senha) or die(mysql_error());
$seleciona_banco = mysql_select_db($banco);

//Formato padrão dos caracteres para salvar no banco de dados
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
?>