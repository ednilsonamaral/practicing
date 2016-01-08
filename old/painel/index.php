<?php
include("conecta.php");
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	
	<title>GoPanel - Site Itagran Marmoraria</title>

	<link rel="stylesheet" type="text/css" media="screen" href="scripts/estilos_login.css" />
</head>

<body>

<div id="geral">
	<form name="frm_login" action="login/logando.php" method="post">
		<table class="frm_login">
			<tr>
				<td style="width: 400px; height: 345px;" rowspan="3">
					<img src="img/1389205875_go_kde.png" />
				</td>
				
				<td style="width: 350px; text-align: left; padding-top: 60px;">
					<label for="login_usuario" style="font-size: 16px; color: #888; margin-left: 5px;">Nome de Usuário</label>
					<input name="login_usuario" type="text" size="35" maxlength="50" required autofocus style="padding: 10px; font-size: 15px; text-transform: uppercase; font-weight: bold;" placeholder="Digite aqui seu NOME DE USUÁRIO" />
				</td>
			</tr>
			
			<tr>
				<td style="width: 350px; text-align: left; padding-top: 20px;">
					<label for="senha" style="font-size: 16px; color: #888; margin-left: 5px;">Senha</label>
					
					<br />
					
					<input name="senha" type="password" size="35" maxlength="50" required placeholder="Digite aqui sua SENHA" style="padding: 10px; font-size: 15px; font-weight: bold;" />
					
					<br />
					<input type="submit" value="ENTRAR" name="cadastrar" style="background: #5B9DFF; color: #FFF; padding: 5px; border: 2px #5B9DFF solid; margin-top: 25px;" />
					
					<br />
					
					<font class="recupera_senha">
						<a href="login/esqueci_senha.php">Esqueci minha senha!</a>
					</font>
				</td>
			</tr>
		</table>
	</form>
</div>

<footer id="rodape">
	<p>
		<?php
		$ano_atual = date("Y");
		?>
		
		Todos os direitos reservados © 2010 - <?php echo $ano_atual; ?>
		
		<br />
		
		Desenvolvido por <a href="https://www.facebook.com/ednilson.amaral" targe="_blank">Ednilson Amaral</a>
	</p>
</footer>

</body>

</html>