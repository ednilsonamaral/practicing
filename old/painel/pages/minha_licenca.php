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
		<li><a href='../pages/quem_somos.php'><span>Quem Somos</span></a></li>
		<li><a href='../pages/produtos.php'><span>Produtos</span></a></li>
		<li><a href='../pages/projetos.php'><span>Projetos</span></a></li>
		
		<!--<li class='has-sub'><a href='#'><span>Serviços</span></a>
			<ul>
				<li class='has-sub'><a href='corte_jato.php'><span>Corte com Jato D'Água</span></a></li>
			</ul>
		</li>
		
		<li><a href='pages/parceiros.php'><span>Parceiros</span></a></li>-->
		
		<li><a href='galeria_fotos.php'><span>Fotos</span></a></li>
		
		<li><a href='usuarios.php'><span>Usuários</span></a></li>
		
		<li class='has-sub last'><a href='#'><span>Sobre</span></a>
			<ul>
				<li><a href='../pages/minha_licenca.php'><span>Minha Licença</span></a></li>
				<li class='last'><a href='../pages/suporte.php'><span>Suporte</span></a></li>
			</ul>
		</li>
		
		<li class='has-sub last'><a href='#'><span>Olá <?php echo $nome_usuario . ' (' . $login_usuario . ')'; ?>!</span></a>
			<ul>
				<li><a href='minha_conta.php'><span>Minha Conta</span></a></li>
				<li class='last'><a href='logout.php'><span>Sair</span></a></li>
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
			Seu site possui o <strong>GoPanel 1.0.2 e você tem o direito de utilizá-lo até às 23:59 de 31 de dezembro de 2016. Para renovar a contratação do GoPanel para o seu site você deverá entrar em contato com o Suporte do mesmo.</strong>
		</p>
		
		<p>
			O GoPanel não é exclusividade do seu site. O GoPanel não é exclusividade para você. Você não se torna proprietário da obra (GoPanel), mas sim, está recebendo uma Licença de Uso, que é uma permissão para o uso do GoPanel, de forma não exclusiva.
		</p>
		
		<p>
			O GoPanel é uma ferramenta com direitos autoriais sobre o Sr. Ednilson de Almeida Amaral, no qual o mesmo, disponibilizou uma licença de uso para o seu site. <strong>O Sr. Ednilson de Almeida Amaral é o proprietário do GoPanel, ou seja, é aquele que detem os direitos autorais de software, onde, pode ou não conceder a outrem o direito de usar por tempo indeterminado e de forma não exclusiva, para uso em seus servidores (equipamento onde serão instalados o GoPanel).</strong>
		</p>
		
		<p>
			Você não se torna proprietário da obra (GoPanel), mas sim, está recebendo uma Licença de Uso, que é uma permissão para o uso do GoPanel, de forma não exclusiva. <strong>Você se torna o licenciado, aquele que adquire a Licença de Uso do Software, possuindo somente o direito de uso e não de propriedade, não podendo este transferir a outrem, comercializar, doar a outrem, arrendar, alienar, sublicenciar e tampouco dar o objeto em garantia.</strong>
		</p>
		
		<p>
			Para maiores informações, por favor, comunique-se com o Suporte do GoPanel.
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