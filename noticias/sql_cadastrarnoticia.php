<html>
<head>
<title>Enviando...</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

//echo temporario

$titulo = $_POST['titulo'];
$noticia = $_POST['noticia'];
$categoria = $_POST['categoria'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$inserir = mysql_query("INSERT INTO `noticias` (`ano`, `mes`, `dia`, `titulo`, `noticia`, `categoria`, `noticiaID`) VALUES ('$ano', '$mes', '$dia', '$titulo', '$noticia', '$categoria', '');");
if($inserir) {
	echo "Notícia adicionada com sucesso!";
	echo "<br /><br /><a href='index_noticia.php'>voltar</a>";
} else {
	echo "Erro no cadastro, tente novamente ou entre em contato com o suporte";
	echo "<br /><br /><a href='index_noticia.php'>voltar</a>";
}
?>