<?php
include("../conecta.php");

$id_exclui_usuario = $_GET["id_exclui_usuario"];
$id_usuario_cadastro = $_GET["id_usuario_cadastro"];

$data = date("Y-m-d");
	
date_default_timezone_set("Brazil/East");
$hora = date("H:i:s");

$sql = "UPDATE usuarios SET status='INATIVO', data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario_cadastro' WHERE id='$id_exclui_usuario'";
$query = mysql_query($sql);

$nsql = "UPDATE usuarios_niveis SET status='INATIVO', data_update='$data', hora_update='$hora', id_usuario_update='$id_usuario_cadastro' WHERE id_usuario='$id_exclui_usuario'";
$nquery = mysql_query($nsql);

if( $query ){
	echo("<script language='JavaScript'>alert('EXCLUSAO REALIZADA COM SUCESSO!'); location='../home.php';</script>");
} else {
	echo mysql_error();
}
?>