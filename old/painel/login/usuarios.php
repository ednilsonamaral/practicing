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
		
		<li class="active"><a href='usuarios.php'><span>Usuários</span></a></li>
		
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
					USUÁRIOS » LISTA DE USUÁRIOS
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="quadro_login">
		<p class="titulo">Visualizando os Usuários cadastrados no GoPanel</p>
		
		<section id="quadro_funcionalidades">
			<div class="conteudo_quadro_funcionalidades">
				<a href="cadastro_usuario.php" alt="CADASTRAR UM NOVO USUÁRIO NO GOPANEL" title="CADASTRAR UM NOVO USUÁRIO NO GOPANEL" style="text-decoration: none; margin-right: 5px;">
					<img src="../img/adicionar.png" style="width: 24px; heigth: 24px;" alt="CADASTRAR UM NOVO USUÁRIO NO GOPANEL" title="CADASTRAR UM NOVO USUÁRIO NO GOPANEL" />
				</a>
			</div>
		</section>
		
		<section id="quadro_data_table">
		
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
						<th width="150" style="font-weight: bold; text-align: center;">Funções</th>
						<th width="400" style="font-weight: bold; text-align: center;">Nome</th>
						<th width="300" style="font-weight: bold; text-align: center;">Email</th>
						<th width="250" style="font-weight: bold; text-align: center;">Login de Usuário</th>
						<th width="250" style="font-weight: bold; text-align: center;">Cadastrado Por</th>
						<th width="250" style="font-weight: bold; text-align: center;">Última Atualização</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
					$sql = "SELECT * FROM usuarios WHERE status='ATIVO' ORDER BY nome ASC";
					$query = mysql_query($sql);
					
					while( $linha = mysql_fetch_object($query) ){
						$nome = $linha->nome;
						$login_usuario = $linha->login_usuario;
						$email = $linha->email;
						$id_usuarios = $linha->id;
						
						$data_cadastro = $linha->data_cadastro;
						$data_cadastro = date("d/m/Y", strtotime($data_cadastro));
						$hora_cadastro = $linha->hora_cadastro;
						
						$id_usuario_cadastro = $linha->id_usuario_cadastro;
						
						$ucsql = "SELECT * FROM usuarios WHERE id='$id_usuario_cadastro'";
						$ucquery = mysql_query($ucsql);
						
						while( $uclinha = mysql_fetch_object($ucquery) ){
							$nome_usuario_cadastro = $uclinha->nome;
							$login_usuario_cadastro = $uclinha->login_usuario;
						}
						
						$data_update = $linha->data_update;
						$data_update = date("d/m/Y", strtotime($data_update));
						
						$hora_update = $linha->hora_update;
						
						$id_usuario_update = $linha->id_usuario_update;
						
						if( $id_usuario_update != 0 ){
							$uusql = "SELECT * FROM usuarios WHERE id='$id_usuario_update'";
							$uuquery = mysql_query($uusql);
							while( $uulinha = mysql_fetch_object($uuquery) ){
								$nome_usuario_update = $uulinha->nome;
								$login_usuario_update = $uulinha->login_usuario;
							}
						}
					?>
					
					<tr>
						<td>
							<a href="edita_usuario.php?id_usuario=<?php echo $id_usuarios; ?>" style="text-decoration: none;" alt="CLIQUE AQUI PARA EDITAR OS DADOS BÁSICOS DESTE USUÁRIO" title="CLIQUE AQUI PARA EDITAR OS DADOS BÁSICOS DESTE USUÁRIO">
								<img src="../img/editar.png" style="width: 24px; height: 24px;" alt="CLIQUE AQUI PARA EDITAR OS DADOS BÁSICOS DESTE USUÁRIO" title="CLIQUE AQUI PARA EDITAR OS DADOS BÁSICOS DESTE USUÁRIO" />
							</a>
							
							<a href="altera_senha_usuario.php?id_usuario=<?php echo $id_usuarios; ?>" style="text-decoration: none;" alt="CLIQUE AQUI PARA ALTERAR A SENHA DESTE USUÁRIO" title="CLIQUE AQUI PARA ALTERAR A SENHA DESTE USUÁRIO">
								<img src="../img/key.png" style="width: 24px; height: 24px;" alt="CLIQUE AQUI PARA ALTERAR A SENHA DESTE USUÁRIO" title="CLIQUE AQUI PARA ALTERAR A SENHA DESTE USUÁRIO" />
							</a>
							
							<a href="altera_perfil_usuario.php?id_usuario=<?php echo $id_usuarios; ?>" style="text-decoration: none;" alt="CLIQUE AQUI PARA O PERFIL DESTE USUÁRIO" title="CLIQUE AQUI PARA O PERFIL DESTE USUÁRIO">
								<img src="../img/profile.png" style="width: 24px; height: 24px;" alt="CLIQUE AQUI PARA O PERFIL DESTE USUÁRIO" title="CLIQUE AQUI PARA O PERFIL DESTE USUÁRIO" />
							</a>
							
							<a href="exclui_usuario.php?id_usuario=<?php echo $id_usuarios; ?>" style="text-decoration: none;" alt="CLIQUE AQUI PARA EXCLUIR ESTE USUÁRIO" title="CLIQUE AQUI PARA EXCLUIR ESTE USUÁRIO">
								<img src="../img/excluir.png" style="width: 24px; height: 24px;" alt="CLIQUE AQUI PARA EXCLUIR ESTE USUÁRIO" title="CLIQUE AQUI PARA EXCLUIR ESTE USUÁRIO" />
							</a>
						
						</td>
						
						<td><?php echo $nome; ?></td>
						<td><?php echo $email; ?></td>
						<td align="center"><?php echo $login_usuario	; ?></td>
						
						<td align="center" style="padding: 10px;">
                        	<?php echo $nome_usuario_cadastro . ' (' . $login_usuario_cadastro . ')<br />EM ' . $data_cadastro . '<br />ÀS ' . $hora_cadastro; ?>
                        </td>
                        
                        <td align="center" style="padding: 10px;">
                        	<?php
							if( $id_usuario_update == 0 ){
								echo ' - ';
							} else {
								echo $nome_usuario_update . ' (' . $login_usuario_update . ')<br />EM ' . $data_update . '<br />ÀS ' . $hora_update;
							}
							?>
                        </td>
					</tr>
					
					<?php
					}
					?>
				</tbody>
				
				<tfoot>
					<tr>
						<th width="120" style="font-weight: bold; text-align: center;">Funções</th>
						<th style="font-weight: bold; text-align: center;">Nome</th>
						<th style="font-weight: bold; text-align: center;">Email</th>
						<th style="font-weight: bold; text-align: center;">Login de Usuário</th>
						<th style="font-weight: bold; text-align: center;">Cadastrado Por</th>
						<th style="font-weight: bold; text-align: center;">Última Atualização</th>
					</tr>
				</tfoot>
			</table>
		
		</section<!-- FIM DO BLOCO ONDE VAI SER COLOCADO O DATA TABLE -->
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