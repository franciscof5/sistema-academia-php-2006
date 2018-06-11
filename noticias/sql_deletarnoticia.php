<html>
<head>
<title>Deletando Professor...</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$noticiaID = $_POST['noticiaID'];

$deletar = mysqli_query($con, "DELETE FROM noticias WHERE noticiaID='$noticiaID'");

if($deletar) {
	echo "Notícia deletada";
} else {
	echo "Erro ao deletar, contate o suporte";
}
echo "<br /><br /><a href='index_noticia.php'>voltar</a>";
?>
