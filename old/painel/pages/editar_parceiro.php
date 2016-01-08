<?php
include("../conecta.php");
include("../login/verifica_login.php");

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
		
		<li class='has-sub'><a href='#'><span>Serviços</span></a>
			<ul>
				<li class='has-sub'><a href='corte_jato.php'><span>Corte com Jato D'Água</span></a></li>
			</ul>
		</li>
		
		<li><a href='parceiros.php'><span>Parceiros</span></a></li>
		
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
					PARCEIROS » EDITANDO PARCEIRO
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="quadro_login">
		<?php
		$id_parceiro = $_GET["id_parceiro"];
		
		$psql = "SELECT * FROM parceiros WHERE id='$id_parceiro'";
		$pquery = mysql_query($psql);
		
		while( $plinha = mysql_fetch_object($pquery) ){
			$nome_parceiro = $plinha->nome_parceiro;
			$verifica_site = $plinha->verifica_site;
			$end_site = $plinha->end_site;
			$logo = $plinha->logo;
		}
		?>
		
		<p class="titulo">Editando os Dados Básicos de um Parceiro no GoPanel</p>
		
		<form name="frm_novo_usuario" method="post" action="confirma_edita_parceiro.php"  enctype="multipart/form-data">
			<input type="hidden" name="id_usuario_cadastro" value="<?php echo $id_usuario; ?>" />
			<input type="hidden" name="logo" value="<?php echo $logo; ?>" />
			<input type="hidden" name="id_parceiro" value="<?php echo $id_parceiro; ?>" />
		
			<table>
				<tr>
					<td style="padding: 10px; width: 150px;">Nome do Parceiro:</td>
					
					<td style="padding: 10px; width: 450px;">
						<input type="text" name="nome_parceiro" size="50" maxlength="245" style="text-transform: uppercase;" value="<?php echo $nome_parceiro; ?>" />
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Possui Site:</td>
					
					<td style="padding: 10px; width: 450px;">
						<?php
						if( $verifica_site == 1 ){
						?>
							<input type="radio" name="verifica_site" value="SIM" checked="checked" /> Sim
							<br /><input type="radio" name="verifica_site" value="NAO" /> Não
						<?php
						} else {
						?>
							<input type="radio" name="verifica_site" value="SIM" /> Sim
							<br /><input type="radio" name="verifica_site" value="NAO"checked="checked" /> Não
						<?php
						}
						?>
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Endereço do Site <strong><em>(não precisa colocar o http://)</em></strong>:</td>
					
					<td style="padding: 10px; width: 450px;">
						<?php
						if( $verifica_site == 1 ){
						?>
							<input type="text" name="end_site" size="50" maxlength="245" value="<?php echo $end_site; ?>" />
						<?php
						} else {
						?>
							<input type="text" name="end_site" size="50" maxlength="245" placeholder="digite aqui o enderço do site do parceiro" />
						<?php
						}
						?>
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">Logo ATUAL:</td>
					
					<td style="padding: 10px; width: 450px;">
						<img src="../img/fotos/<?php echo $logo; ?>" style=" width: 40%; height: 20%;" />
					</td>
				</tr>
				
				<tr>
					<td style="padding: 10px; width: 150px;">NOVO Logo:</td>
					
					<td style="padding: 10px; width: 450px;">
						<input type="file" name="foto" size="50"/>
					</td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" name="cadastrar" value="CONFIRMAR E CADASTRAR" style="background: #5B9DFF; color: #FFF; padding: 5px; border: 2px #5B9DFF solid; margin-top: 25px;" />
							
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