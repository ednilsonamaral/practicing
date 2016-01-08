<?php
include("../conecta.php");
include("verifica_login.php");

$id_usuario_cadastro = $_SESSION["id_usuario"];

$usql = "SELECT * FROM usuarios WHERE id='$id_usuario_cadastro' AND STATUS='ATIVO'";
$uquery = mysql_query($usql);

while( $ulinha = mysql_fetch_object($uquery) ){
	$nome_usuario = $ulinha->nome;
	$email = $ulinha->email;
	$login_usuario = $ulinha->login_usuario;
}

$psql = "SELECT * FROM usuarios_niveis WHERE id_usuario='$id_usuario_cadastro'";
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
		
		<li><a href='../pages/galeria_fotos.php'><span>Fotos</span></a></li>
		
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
					USUÁRIOS » ALTERAÇÃO DE SENHAS
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="quadro_login">
		<p class="titulo">Alterando a Senha do Usuário <?php echo $nome_usuario; ?> no GoPanel</p>
		
		<form name="frm_novo_usuario" id="frm_novo_usuario" method="post" action="confirma_altera_senha_usuario.php">
			<input type="hidden" name="id_usuario_cadastro" value="<?php echo $id_usuario_cadastro; ?>" />
			
			<?php
			$id_usuario = $_GET["id_usuario"];
			?>
			<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>" />
		
			<table>
				<tr>
					<td style="padding: 10px; width: 150px;">Nome:</td>
					
					<td style="padding: 10px; width: 450px;">
						<strong><?php echo $nome_usuario; ?></strong>
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Email:</td>
					
					<td style="padding: 10px; width: 450px;">
						<strong><?php echo $email; ?></strong>
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Login de Usuário:</td>
					
					<td style="padding: 10px; width: 450px;">
						<strong><?php echo $login_usuario; ?></strong>
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Senha:</td>
					
					<td style="padding: 10px; width: 450px;">
						<input type="password" name="senha" size="50" required style="text-transform: none;" maxlength="245" placeholder="digite aqui sua NOVA senha" />
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Confirmar Senha:</td>
					
					<td style="padding: 10px; width: 450px;">
						<input type="password" name="confirma_senha" size="50" required style="text-transform: none;" maxlength="245" placeholder="digite aqui sua senha novamente" />
					</td>
				</tr>
					
				<tr>
					<td colspan="2">
						<input type="submit" name="cadastrar" value="CONFIRMAR E ALTERAR SENHA" style="background: #5B9DFF; color: #FFF; padding: 5px; border: 2px #5B9DFF solid; margin-top: 25px;" />
							
						<input type="reset" value="LIMPAR" style="background: #5B9DFF; color: #FFF; padding: 5px; border: 2px #5B9DFF solid; margin-top: 25px;" />
					</td>
				</tr>
			</table>
		</form>
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