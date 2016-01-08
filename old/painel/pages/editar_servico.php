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
	
	<!-- TINYMCE -->
	<script type="text/javascript" src="../scripts/tinymce/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({
			selector: "textarea"
		});
	</script>
	<!-- TINYMCE -->
	
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
		
		<li class='has-sub'><a href='#'><span>Serviços</span></a>
			<ul>
				<li class='has-sub'><a href='corte_jato.php'><span>Corte com Jato D'Água</span></a></li>
			</ul>
		</li>
		
		<!--<li><a href='pages/parceiros.php'><span>Parceiros</span></a></li>-->
		
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
		
		<?php
		$id_servico = $_GET["id_servico"];
		
		$psql = "SELECT * FROM servicos WHERE id='$id_servico'";
		$pquery = mysql_query($psql);
		
		while( $plinha = mysql_fetch_object($pquery) ){
			$traducao_nome_servico = $plinha->traducao_nome_servico;
			$traducao_nome_servico = strtoupper($traducao_nome_servico);
			
			$descricao = $plinha->descricao;
		}
		?>
		
			<strong>
				<em>
					ADMINISTRAÇÃO DOS SERVIÇOS  » CORTE COM JATO D'ÁGUA  » <?php echo $traducao_nome_servico; ?>
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="conteudo">
		<form name="form" method="post" action="confirma_editar_servico.php">
			<input type="hidden" name="id_usuario_cadastro" value="<?php echo $id_usuario; ?>" />
			<input type="hidden" name="id_servico" value="<?php echo $id_servico; ?>" />
			
			<label for="galeria_fotos">Associar Galeria de Fotos:</label>
			
			<select name="galeria_fotos">
				<option value="0"></option>
				
				<?php
				$gsql = "SELECT * FROM galeria_fotos WHERE status='ATIVO' ORDER BY nome_galeria ASC";
				$gquery = mysql_query($gsql);
				
				while( $glinha = mysql_fetch_object($gquery) ){
					$id_galeria_foto = $glinha->id;
					$nome_galeria = $glinha->nome_galeria;
					
					$data_cadastro = $glinha->data_cadastro;
					$data_cadastro = date("d/m/Y", strtotime($data_cadastro));
				?>
					<option value="<?php echo $id_galeria_foto; ?>"><?php echo $nome_galeria . " (" . $data_cadastro . ")";?></option>
				<?php
				}
				?>
			</select>
			
			<br /><br />
			
			<textarea name="texto" rows="50"><?php echo $descricao; ?></textarea>
			
			<input type="submit" name="cadastrar" value="CONFIRMAR E CADASTRAR" style="background: #5B9DFF; color: #FFF; padding: 5px; border: 2px #5B9DFF solid; margin-top: 25px;" />
							
			<input type="reset" value="LIMPAR" style="background: #5B9DFF; color: #FFF; padding: 5px; border: 2px #5B9DFF solid; margin-top: 25px;" />
			
			<br /><br />
		</form>
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