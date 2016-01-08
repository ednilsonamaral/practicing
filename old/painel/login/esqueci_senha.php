<?php
include("../conecta.php");
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	
	<title>GoPanel - Site Itagran Marmoraria</title>

	<link rel="stylesheet" type="text/css" media="screen" href="../scripts/estilos_login.css" />
</head>

<body>

<div id="geral">
	<form name="frm_login" action="confirma_esqueci_senha.php" method="post">
		<table class="frm_login">
			<tr>
				<td style="width: 400px; height: 345px;" rowspan="3">
					<img src="../img/1389205875_go_kde.png" />
					<br /><font style="color: #888; ">Esqueci minha senha do GoPanel</font>
				</td>
			</tr>
			
			<tr>
				<td style="width: 350px; text-align: left; padding-top: 20px;">
					<label for="nome_usuario" style="font-size: 16px; color: #888; margin-left: 5px;">Qual seu Nome de Usuário?</label>
					
					<br />
					<input name="nome_usuario" type="text" size="35" maxlength="50" required placeholder="Digite aqui seu NOME DE USUÁRIO" style="padding: 10px; font-size: 15px; font-weight: bold;" />
					
					<br /><br />
					<label for="email" style="font-size: 16px; color: #888; margin-left: 5px;">Qual seu Email?</label>
					
					<br />
					<input name="email" type="text" size="35" maxlength="50" required placeholder="Digite aqui seu EMAIL" style="padding: 10px; font-size: 15px; font-weight: bold;" />
					
					<br />
					<input type="submit" value="SOLICITAR NOVA SENHA" name="cadastrar" style="background: #5B9DFF; color: #FFF; padding: 5px; border: 2px #5B9DFF solid; margin-top: 25px;" />
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