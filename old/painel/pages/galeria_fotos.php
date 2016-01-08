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
			"sScrollXInner": "100%",
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
		<li class='active'><a href='../home.php'><span>Inicio</span></a></li>
		<li><a href='quem_somos.php'><span>Quem Somos</span></a></li>
		<li><a href='produtos.php'><span>Produtos</span></a></li>
		<li><a href='projetos.php'><span>Projetos</span></a></li>
		
		<!--<li class='has-sub'><a href='#'><span>Serviços</span></a>
			<ul>
				<li class='has-sub'><a href='corte_jato.php'><span>Corte com Jato D'Água</span></a></li>
			</ul>
		</li>
		
		<li><a href='pages/parceiros.php'><span>Parceiros</span></a></li>-->
		
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
					ADMINISTRAÇÃO DAS GALERIA DE FOTOS
				</em>
			</strong>
	</div><!-- FIM DO BLOCO DA LOCALIZAÇÃO DO USUÁRIO -->
	
	<div class="quadro_login">
		<p class="titulo">Visualizando as Galerias de Fotos</p>
		
		<section id="quadro_funcionalidades">
			<div class="conteudo_quadro_funcionalidades">
				<a href="cadastro_galeria_foto.php" alt="CADASTRAR UMA NOVA GALERIA DE FOTOS NO GOPANEL" title="CADASTRAR UMA NOVA GALERIA DE FOTOS NO GOPANEL" style="text-decoration: none; margin-right: 5px;">
					<img src="../img/adicionar.png" style="width: 24px; heigth: 24px;" alt="CADASTRAR UMA NOVA GALERIA DE FOTOS NO GOPANEL" title="CADASTRAR UMA NOVA GALERIA DE FOTOS NO GOPANEL" />
				</a>
			</div>
		</section>
		
		<section id="quadro_data_table">
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
						<th width="120" style="font-weight: bold; text-align: center;">Funções</th>
						<th style="font-weight: bold; text-align: center;">Nome da Galeria<br />de Fotos</th>
						<th style="font-weight: bold; text-align: center;">Quantidade<br />de Fotos</th>
						<th style="font-weight: bold; text-align: center;">Cadastrado Por</th>
						<th style="font-weight: bold; text-align: center;">Última Atualização</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
					$sql = "SELECT * FROM galeria_fotos WHERE status='ATIVO' ORDER BY nome_galeria ASC";
					$query = mysql_query($sql);
					
					while( $linha = mysql_fetch_object($query) ){
						$nome_galeria = $linha->nome_galeria;
						$nome_galeria = strtoupper($nome_galeria);
						
						$id_galeria = $linha->id;
						
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
						<td align="center">
							<a href="editar_galeria_foto.php?id_galeria_foto=<?php echo $id_galeria; ?>" alt="EDITAR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" title="EDITAR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" style="text-decoration: none;">
								<img src="../img/editar.png" style="width: 24px; heigth: 24px;" alt="EDITAR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" title="EDITAR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" />
							</a>
							
							<a href="excluir_galeria_foto.php?id_galeria_foto=<?php echo $id_galeria; ?>" alt="EXCLUIR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" title="EXCLUIR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" style="text-decoration: none;">
								<img src="../img/excluir.png" style="width: 24px; heigth: 24px;" alt="EXCLUIR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" title="EXCLUIR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" />
							</a>
							
							<a href="add_foto.php?id_galeria_foto=<?php echo $id_galeria; ?>" alt="ADICIONAR FOTO NESTA GALERIA DE FOTO" title="EXCLUIR OS DADOS BÁSICOS DESTA GALERIA DE FOTO" style="text-decoration: none;">
								<img src="../img/add_foto.png" style="width: 24px; heigth: 24px;" alt="ADICIONAR FOTO NESTA GALERIA DE FOTO" title="ADICIONAR FOTO NESTA GALERIA DE FOTO" />
							</a>
							
							<a href="ver_foto.php?id_galeria_foto=<?php echo $id_galeria; ?>" alt="VER AS FOTOS DESTA GALERIA DE FOTO" title="VER AS FOTOS DESTA GALERIA DE FOTO" style="text-decoration: none;">
								<img src="../img/ver_foto.png" style="width: 24px; heigth: 24px;" alt="VER AS FOTOS DESTA GALERIA DE FOTO" title="VER AS FOTOS DESTA GALERIA DE FOTO" />
							</a>
						</td>
						
						<td align="center"><?php echo $nome_galeria; ?></td>
						
						<td align="center">
							<?php
							$qsql = "SELECT * FROM fotos WHERE id_galeria_foto='$id_galeria' AND status='ATIVO'";
							$qquery = mysql_query($qsql);
							
							$num_fotos = mysql_num_rows($qquery);
							
							echo $num_fotos;
							?>
						</td>
						
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
						<th style="font-weight: bold; text-align: center;">Nome da Galeria<br />de Fotos</th>
						<th style="font-weight: bold; text-align: center;">Quantidade<br />de Fotos</th>
						<th style="font-weight: bold; text-align: center;">Cadastrado Por</th>
						<th style="font-weight: bold; text-align: center;">Última Atualização</th>
					</tr>
				</tfoot>
			</table>
		
		</section<!-- FIM DO BLOCO ONDE VAI SER COLOCADO O DATA TABLE -->
	</div><!-- FIM DO BLOCO DA DIV QUADRO_LOGIN -->
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