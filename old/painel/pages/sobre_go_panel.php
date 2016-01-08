<?php
include("../conecta.php");
include("verifica_login.php");

$id_usuario = $_SESSION["id_usuario"];

$usql = "SELECT * FROM usuarios WHERE id='$id_usuario' AND STATUS='ATIVO'";
$uquery = mysql_query($usql);

while( $ulinha = mysql_fetch_object($uquery) ){
	$nome_usuario = $ulinha->nome;
	$login_usuario = $ulinha->login_usuario;
}

$psql = "SELECT * FROM usuarios_niveis WHERE id_usuario='$id_usuario'";
$pquery = mysql_query($psql);

while( $plinha = mysql_fetch_object($pquery) ){
	$perfil_usuario = $plinha->perfil;
}
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	
	<title>GoPanel - Site Itagran Marmoraria</title>

	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
	
	<link rel="stylesheet" type="text/css" media="screen" href="../scripts/estilos_home.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="../scripts/estilos_menu.css" />
</head>

<body>

<div id='cssmenu'>
	<ul>
		<li class='active'><a href='../home.php'><span>Inicio</span></a></li>
		<li><a href='quem_somos.php'><span>Quem Somos</span></a></li>
		<li><a href='produtos.php'><span>Produtos</span></a></li>
		<li><a href='projetos.php'><span>Projetos</span></a></li>
		
		<!--<li class='has-sub'><a href='#'><span>Serviços</span></a>
			<ul>
				<li class='has-sub'><a href='corte_jato.php'><span>Corte com Jato D'Água</span></a></li>
			</ul>
		</li>
		
		<li><a href='pages/parceiros.php'><span>Parceiros</span></a></li>-->
		
		<li><a href='galeria_fotos.php'><span>Fotos</span></a></li>
		
		<li><a href='../login/usuarios.php'><span>Usuários</span></a></li>
		
		<li class='has-sub last'><a href='#'><span>Sobre</span></a>
			<ul>
				<li><a href='minha_licenca.php'><span>Minha Licença</span></a></li>
				<li class='last'><a href='suporte.php'><span>Suporte</span></a></li>
			</ul>
		</li>
		
		<li class='has-sub last'><a href='#'><span>Olá <?php echo $nome_usuario . ' (' . $login_usuario . ')'; ?>!</span></a>
			<ul>
				<li><a href='../login/minha_conta.php'><span>Minha Conta</span></a></li>
				<li class='last'><a href='../login/logout.php'><span>Sair</span></a></li>
			</ul>
		</li>
	</ul>
</div><!-- FIM DO BLOCO DO MENU -->

<div id="geral">
	<div class="localizacao">
		Você está em: 
			<strong>
				<em>
					SOBRE » MINHA LICENÇA
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="conteudo">
		<p>
			CMS vem da sigla inglesa <em>Content Management System</em>, que em português é traduzido como Sistema de Gerenciamento de Conteúdo. Um CMS faz com que o proprietário do site possa atualizar o conteúdo dinâmico do seu site, desde fotos até notícias.
		</p>
		
		<p>
			O GoPanel é um CMS personalizavel. Ele se ajusta de acordo com o seu site. Assim, tornando ainda mais fácil a atualização de conteúdo dinâmico.
		</p>
		
		<p>
			Atualmente, a necessidade de atualização rápida em um site é primordial. E, enviar o conteúdo para o <em>webmaster</em> leva um certo tempo para atualização. Fazendo com que seu site fique atrasado. Com o CMS você pode atualizar seu site de qualquer, onde a única exigência para funcionamento do GoPanel é um navegador e acesso a Internet.
		</p>
		
		<p>
			O GoPanel possui uma interface moderna, elegante e amigável. Possui o Sistema de Gerenciamento de Permissão, onde você irá permitir ou não o que cada usuário do GoPanel deverá realizar.
		</p>
		
		<p>
			Tendo o GoPanel como CMS de seu site, os trabalhos de atualização do conteúdo dinâmico são em tempo real, tudo o que você altera através do GoPanel é alterado instantaneamente no site. Com isso, seu site sempre estará atualizado e sempre com inovações.
		</p>
		
		<p>
			Entre em contato conosco através dos meios de comunicação abaixo e solicite uma visita e apresentação do GoPanel.
		</p>
		
		<br />
		
		<p>
			Envie um email para: <br /><br />
			<strong>A/C Ednilson Amaral</strong>
			<br />Email: ednilsonamaral@live.com
			<br />Fone: (15) 9-9674-0359
		</p>
	</div>
</div><!-- FIM DO BLOCO GERAL -->

<footer id="rodape">
	
		<?php
		$ano_atual = date("Y");
		?>
		
		Todos os direitos reservados © 2010 - <?php echo $ano_atual; ?>
		
		<br />
		
		Desenvolvido por <a href="https://www.facebook.com/ednilson.amaral" target="_blank">Ednilson Amaral</a>
	
</footer>

</body>

</html>