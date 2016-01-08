<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$nome_usuario = mb_strtoupper($_POST["nome_usuario"]);
	$email = $_POST["email"];
	
	$nsql = "SELECT * FROM usuarios WHERE email ='$email'";
	$nquery = mysql_query($nsql);
	
	while( $nlinha = mysql_fetch_object($nquery) ){
		$id_usuario = $nlinha->id;
		$nnome_usuario = $nlinha->nome;
	}
	
	if( $nnome_usuario == $nome_usuario ){
		/***************** GERANDO A SENHRA RANDOMICA *****************/
		function geraSenha(){               
			//caracteres que serão usados na senha randomica
			$chars = 'abcdxyswzABCDZYWSZ0123456789';
			//ve o tamnha maximo que a senha pode ter
			$max = strlen($chars) - 1;
			//declara $senha
			$senha = null;
						
			//loop que gerará a senha de 8 caracteres
			for($i=0;$i < 8; $i++){         
				$senha .= $chars{mt_rand(0,$max)};
			}
				
			return $senha;
		}

		$senha_neutro = geraSenha();
			
		$senha = md5 ( $senha_neutro );
			
		//Corpo do email
				
		//inicializa 2 variaveis para que  php.ini nao retorne erros
				
		//destinatario
		$para = $email;
			
		//para o envio em formato HTML
		$headers = "MIME-Version: 1.0";
		$headers = "Content-type: text/html; charset=utf-8\r\n";
			
		//endereço do remitente
		$headers .= "From: Suporte GoPanel - Geração de Nova Senha de Acesso";

		//corpo do email
		$mensagem = "Olá ";
		$mensagem .= ".<br \><br \>Você está recebendo este email porque solicitou o reenvio de sua senha.";
		$mensagem .= "<br \><br \><br \>Caso não tenha solicitado, remova esta mensagem imediatamente !";
		$mensagem .= "<br \><br \><br \>Sua nova senha de acesso é: ";
		$mensagem .= '<strong>'.$senha_neutro.'</strong>';
		$mensagem .= "<br \><br \><br \>Vá ao site e mude sua senha !";
		$mensagem .= "<br \><br \><br \><br \>Esta é uma mensagem automática, não responda !";
				
		//envia a senha para o email com a função mail
		$envia = mail($para,"Recuperação de senha",$mensagem,$headers);
		/***************** GERANDO A SENHRA RANDOMICA *****************/

		if( $envia ){
			$esql = "UPDATE usuarios SET senha=md5('$senha') WHERE id='$id_usuario'";
			$equery = mysql_query($esql);
			
			echo("<script language='JavaScript'>alert('SUA NOVA SENHA FOI ENCAMINHADA PARA O EMAIL CADASTRADO NO GOPANEL! DENTRO DE INSTANTES VOCE RECEBERA ESTE EMAIL!'); location='../index.php';</script>");
		} else {
			echo mysql_error();
		}
	} else {
		echo("<script language='JavaScript'>alert('NOME DE USUARIO E EMAIL INVALIDOS!!!'); location='../index.php';</script>");
	}
}
?>