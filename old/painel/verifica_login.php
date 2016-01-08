<?php
session_start();

$data = date("dmY");

if( $_SESSION["logado"] != $data ){
	echo("<script language='JavaScript'>alert('VOCE NAO TEM PERMISSAO PARA ACESSAR ESSA AREA!'); location='index.php';</script>");
}
?>