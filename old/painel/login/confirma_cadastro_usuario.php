<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$nome = mb_strtoupper($_POST["nome"]);
	$email = $_POST["email"];
	$login_usuario = mb_strtoupper($_POST["login_usuario"]);
	
	$senha = md5 ($_POST["senha"]);
	
	$confirma_senha = md5 ($_POST["confirma_senha"]) ;
	
	$id_usuario_cadastro = $_POST["id_usuario_cadastro"];
	
	$data = date("Y-m-d");
	
	date_default_timezone_set("Brazil/East");
	$hora = date("H:i:s");
	
	$status = "ATIVO";
	
	$perfil_usuario = $_POST["perfil_usuario"];
	
	if( $senha == $confirma_senha ){
		//VERIFICANDO SE USUARIO JA EXISTE A PARTIR DO EMAIL
		$vsql = "SELECT * FROM usuarios WHERE email='$email'";
		$vquery = mysql_query($vsql);
		
		$vlinha = mysql_fetch_assoc($vquery);
		$vemail = $vlinha["email"];
		
		if( $email == $vemail ){
			echo("<script language='JavaScript'>alert('Esse usuário já existe!'); location='cadastro_usuario.php'</script>");
		} else {			
			$sql = "INSERT INTO usuarios (nome, email, login_usuario, senha, data_cadastro, hora_cadastro, id_usuario_cadastro, status) VALUES ('$nome', '$email', '$login_usuario', md5('$confirma_senha'), '$data', '$hora', '$id_usuario_cadastro', '$status')";
			$query = mysql_query($sql);
			
			
			if( $query ){
				$vusql = "SELECT * FROM usuarios WHERE email='$email' AND hora_cadastro='$hora' LIMIT 1";
				$vuquery = mysql_query($vusql);
				
				$vulinha = mysql_fetch_assoc($vuquery);
				$id_usuario = $vulinha["id"];
				
				$nsql = "INSERT INTO usuarios_niveis (id_usuario, perfil, data_cadastro, hora_cadastro, status) VALUES ('$id_usuario', '$perfil_usuario', '$data', '$hora', '$status')";
				$nquery = mysql_query($nsql);
				
				if( $nquery ){
					echo("<script language='JavaScript'>alert('Novo Usuário cadastrado com sucesso!'); location='usuarios.php'</script>");
				} else {
					echo mysql_error();
				}
			} else {
				echo mysql_error();
			}
		}
	} else {
		echo("<script language='JavaScript'>alert('Senhas não coicidem! Por favor, tente novamente!'); location='cadastro_usuario.php'</script>");
	}
}
?>