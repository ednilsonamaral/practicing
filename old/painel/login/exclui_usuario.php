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
	
	<link rel="stylesheet" type="text/css" media="screen" href="../scripts/estilos_home.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="../scripts/estilos_menu.css" />
	
	<!-- CÓDIGOS PARA DATA TABLES -->
	<link rel="stylesheet" href="../scripts/data_tables/table_jui.css" />
	<link rel="stylesheet" href="../scripts/data_tables/jquery-ui-1.8.4.custom.css" />
	
	<script type="text/javascript" src="../scripts/data_tables/jquery.mim.js"></script>
	<script type="text/javascript" src="../scripts/data_tables/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function() {
		oTable = $('#example').dataTable({
			/**
			"bPaginate": true,
			"bJQueryUI": true,
			"sScrollX": "100%",
			"sScrollXInner": "100%",
			"sPaginationType": "full_numbers",
		
			"bScrollCollapse": true
			**/
			
			"bPaginate": true,
			"bJQueryUI": true,
			"bAutoWidth": false,
			"sScrollX": "100%",
			"sScrollXInner": "140%",
			"sPaginationType": "full_numbers",
			"bScrollCollapse": true
		});
	});
	</script>
	<!-- CÓDIGOS PARA DATA TABLES -->
</head>

<body>

<div id='cssmenu'>
	<ul>
		<li><a href='../home.php'><span>Inicio</span></a></li>
		<li><a href='../pages/quem_somos.php'><span>Quem Somos</span></a></li>
		<li><a href='../pages/produtos.php'><span>Produtos</span></a></li>
		<li><a href='../pages/projetos.php'><span>Projetos</span></a></li>
		
		<!--<li class='has-sub'><a href='#'><span>Serviços</span></a>
			<ul>
				<li class='has-sub'><a href='corte_jato.php'><span>Corte com Jato D'Água</span></a></li>
			</ul>
		</li>
		
		<li><a href='pages/parceiros.php'><span>Parceiros</span></a></li>-->
		
		<li><a href='../pages/galeria_fotos.php'><span>Fotos</span></a></li>
		
		<li><a href='usuarios.php' class="active"><span>Usuários</span></a></li>
		
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
					USUÁRIOS » LISTA DE USUÁRIOS » EXCLUIR USUÁRIO
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="quadro_login">
		<p class="titulo">Excluindo usuário do GoPanel</p>
		
		<section id="quadro_data_table">
			<?php
			$id_exclui_usuario = $_GET["id_usuario"];
			
			$esql = "SELECT * FROM usuarios WHERE id='$id_exclui_usuario'";
			$equery = mysql_query($esql);
			
			while( $elinha = mysql_fetch_object($equery) ){
				$enome = $elinha->nome;
				$elogin_usuario = $elinha->login_usuario;
				$eemail = $elinha->email;
			}
			?>
			
			<p>
				Você tem certeza que deseja EXCLUIR o usuário <strong><?php echo $enome . ' (' . $elogin_usuario . ')'; ?></strong> do GoPanel?
			</p>
			
			<div class="bloco_exclui_usuario" align="center">
				<a href="confirma_exclui_usuario.php?id_exclui_usuario=<?php echo $id_exclui_usuario; ?>&id_usuario_cadastro=<?php echo $id_usuario; ?>" alt="CONFIRMAR E EXCLUIR USUÁRIO DO GOPANEL" title="CONFIRMAR E EXCLUIR USUÁRIO DO GOPANEL" style="text-decoration: none;">
					<img src="../img/confirmar.png" style="width: 24px; height: 24px;" alt="CONFIRMAR E EXCLUIR USUÁRIO DO GOPANEL" title="CONFIRMAR E EXCLUIR USUÁRIO DO GOPANEL" />
				</a>
				
				<a href="../home.php" alt="CANCELAR EXCLUSAO" title="CANCELAR EXCLUSAO"  style="text-decoration: none; margin-left: 15px;">
					<img src="../img/excluir.png" style="width: 24px; height: 24px;" alt="CANCELAR EXCLUSAO" title="CANCELAR EXCLUSAO" />
				</a>
			</div><!-- FIM DO BLOCO ONDE VAI AS OPÇÕES DE EXCLUIR O USUÁRIO -->
		</section<!-- FIM DO BLOCO ONDE VAI SER COLOCADO O DATA TABLE -->
		
	</div><!-- FIM DO BLOCO DO QUADRO DO LOGIN -->
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