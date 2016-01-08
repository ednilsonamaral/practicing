<?php
include("conecta.php");
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
	
	<link rel="stylesheet" type="text/css" media="screen" href="scripts/estilos_home.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="scripts/estilos_menu.css" />
</head>

<body>

<div id='cssmenu'>
	<ul>
		<li class='active'><a href='home.php'><span>Inicio</span></a></li>
		<li><a href='pages/quem_somos.php'><span>Quem Somos</span></a></li>
		<li><a href='pages/produtos.php'><span>Produtos</span></a></li>
		<li><a href='pages/projetos.php'><span>Projetos</span></a></li>
		
		<!--<li class='has-sub'><a href='#'><span>Serviços</span></a>
			<ul>
				<li class='has-sub'><a href='corte_jato.php'><span>Corte com Jato D'Água</span></a></li>
			</ul>
		</li>
		
		<li><a href='pages/parceiros.php'><span>Parceiros</span></a></li>--> 
		
		<li><a href='pages/galeria_fotos.php'><span>Fotos</span></a></li>

		<li><a href='login/usuarios.php'><span>Usuários</span></a></li>
		
		<li class='has-sub last'><a href='#'><span>Sobre</span></a>
			<ul>
				<li><a href='pages/minha_licenca.php'><span>Minha Licença</span></a></li>
				<li class='last'><a href='pages/suporte.php'><span>Suporte</span></a></li>
			</ul>
		</li>
		
		<li class='has-sub last'><a href='#'><span>Olá <?php echo $nome_usuario . ' (' . $login_usuario . ')'; ?>!</span></a>
			<ul>
				<li><a href='login/minha_conta.php'><span>Minha Conta</span></a></li>
				<li class='last'><a href='login/logout.php'><span>Sair</span></a></li>
			</ul>
		</li>
	</ul>
</div><!-- FIM DO BLOCO DO MENU -->

<div id="geral">
	<div class="localizacao">
		Você está em: 
			<strong>
				<em>
					PÁGINA INICIAL DO GoPanel
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="conteudo">
		<?php
		date_default_timezone_set("Brazil/East");
		$hora = date("H:i");
		
		$hora = date("H", strtotime($hora));
		
		if( $hora >= 12 ){
			echo("Boa Tarde " . $nome_usuario . " (" . $login_usuario . ") Seja bem vindo ao GoPanel!");
		} else if( $hora >= 18 ){
			echo("Boa Noite $nome_usuario ($login_usuario)! Seja bem vindo ao GoPanel!");
		} else if( $hora < 12 ){
			echo("Bom Dia $nome_usuario ($login_usuario)! Seja bem vindo ao GoPanel!");
		}
		?>
		
		<p>
			O GoPanel é um Gereciador de Conteúdo Dinâmico do seu site. Com essa ferramente, você mesmo atuaiza seu site, de forma rápida e eficaz, fácil e dinâmica. Independente do local onde você esteja, seja em casa ou no trabalho, seja na rua ou na estrada, você pode atualizar o seu site!
		</p>
		
		<p>
			Um Gerenciador de Conteúdo Dinâmico de Sites faz com que o próprio dono do site atualize-o, não ficando dependente dos desenvolvedores do mesmo.
		</p>
		
		<p>
			O GoPanel oferece a você excelente pacotes funcionais para o Gerenciamento de Conteúdo Dinâmico do seu site, sendo:
			<br />- Gerenciamento de Notícias;
			<br />- Gerenciamento de Galeria de Fotos;
			<br />- Gerenciamenot de Vídeos;
			<br />- Gerenciamento das principais Páginas do seu site;
			<br />- E muitas outras soluções para tornar o seu site mais atrativo e funcional.
		</p>
		
		<p>
			O GoPanel foi desenvolvido através de uma estrutura modular, podendo ser atualizado a qualquer momente. Além das possibilidades de possuir módulos exclusivos ao ramo de atividade do seu site.
		</p>
		<!--
		<p>
			Nossa equipe personaliza o GoPanel de acordo com as suas necessidades, com as necessidades do seu site, tornando o Gerenciamento de Conteúdo Dinâmico de Sites personalizado para o seu negócio.
		</p>
		
		<p>
			Entre em contato conosco e descubra os benefícios do GoPanel em seu site, seu negócio ou empresa.
		</p>
		-->
		<p>
			Qualquer dúvida relacionada as funcionalidades do GoPanel, basta acessar o link de Suporte, no menu superior.
		</p>
	</div><!-- FIM DO BLOCO DO CONTEUDO PRINCIPAL -->
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