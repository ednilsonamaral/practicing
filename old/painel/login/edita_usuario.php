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

if( $perfil_usuario != 1 ){
	echo("<script language='JavaScript'>alert('VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESSA ÁREA!'); location='../home.php';</script>");
} else {
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
					USUÁRIOS » MINHA CONTA
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="quadro_login">
		<p class="titulo">Visualizando / Editando Dados da Minha Conta no GoPanel</p>
		
		<?php
		$id_usuario_get = $_GET["id_usuario"];
		
		$sql = "SELECT * FROM usuarios WHERE id='$id_usuario_get' AND status='ATIVO'";
		$query = mysql_query($sql);
		
		while( $linha = mysql_fetch_object($query) ){
			$nome = $linha->nome;
			$email = $linha->email;
			$login_usuario = $linha->login_usuario;
		}
		
		$psql = "SELECT * FROM usuarios_niveis WHERE id_usuario='$id_usuario_get'";
		$pquery = mysql_query($psql);
		
		while( $plinha = mysql_fetch_object($pquery) ){
			$perfil_usuario = $plinha->perfil;
		}
		?>
		
		<form name="frm_minha_conta" method="post" action="confirma_edita_usuario.php">
			<input type="hidden" name="perfil_usuario" value="<?php echo $perfil_usuario; ?>" />
			<input type="hidden" name="id_usuario_get" value="<?php echo $id_usuario_get; ?>" />
			
			<table>
				<tr>
					<td style="padding: 10px; width: 150px;">Nome:</td>
					
					<td style="padding: 10px; width: 450px;">
						<input type="text" name="nome" size="50" maxlength="245" value="<?php echo $nome; ?>" />
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Email:</td>
					
					<td style="padding: 10px; width: 450px;">
						<input type="text" name="email" size="50" style="text-transform: none;" maxlength="245" value="<?php echo $email; ?>" />
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Login de Usuário:</td>
					
					<td style="padding: 10px; width: 450px;">
						<input type="text" name="login_usuario" size="50" maxlength="245" value="<?php echo $login_usuario; ?>" />
					</td>
				</tr>
					
				<tr>
					<td colspan="2">
						<input type="submit" name="cadastrar" value="CONFIRMAR EDIÇÃO" style="background: #5B9DFF; color: #FFF; padding: 5px; border: 2px #5B9DFF solid; margin-top: 25px;" />
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
<?php
} //fim do if de verificação de permissão do usuário
?>