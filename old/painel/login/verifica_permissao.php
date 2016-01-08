<?php
include("../conecta.php");

$id_usuario = $_SESSION["id_usuario"];

$nsql = "SELECT * FROM usuarios_niveis WHERE id_usuario='$id_usuario' AND status='ATIVO'";
$nquery = mysql_query($nsql);

while( $nlinha = mysql_fetch_object($nquery) ){
	$perfil_usuario = $linha->perfil;
}

if( $perfil_usuario == 1 ){
?>