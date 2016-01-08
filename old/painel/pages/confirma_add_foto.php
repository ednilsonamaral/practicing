<?php
include("../conecta.php");

if( $_POST["cadastrar"] ){
	$id_usuario_cadastro = $_POST["id_usuario_cadastro"];
	$id_galeria_foto = $_POST["id_galeria_foto"];
	$legenda = $_POST["legenda"];
	
	$data = date("Y-m-d");
	
	date_default_timezone_set("Brazil/East");
	$hora = date("H:i:s");
	
	$foto = $_FILES["foto"];
 
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) {
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
 
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "../img/fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		}
 
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0) {
			foreach ($error as $erro) {
				echo $erro . "<br />";
			}
		}
	}
	
	$sql = "INSERT INTO fotos (id_galeria_foto, foto, legenda, data_cadastro, hora_cadastro, id_usuario_cadastro, status) VALUES ('$id_galeria_foto', '$nome_imagem', '$legenda', '$data', '$hora', '$id_usuario_cadastro', 'ATIVO')";
	$query = mysql_query($sql);
	
	if( $query ){
		echo("<script language='JavaScript'>alert('FOTO CADASTRADA COM SUCESSO!'); location='ver_foto.php?id_galeria_foto=$id_galeria_foto';</script>");
	} else {
		echo mysql_error();
	}
}
?>