<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$titulo = $_POST['titulo'];
$noticia = $_POST['noticia'];
$categoria = $_POST['categoria'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];


$alterar = mysql_query("UPDATE noticias SET titulo='$titulo', noticia='$noticia', categoria='$categoria', dia='$dia', mes='$mes', ano='$ano' WHERE noticiaID='$noticiaID'");

if($alterar) {
	echo "Sucesso";
} else {
	echo "Erro no cadastro, tente novamente ou entre em contato com o suporte";
}
echo "<br /><br /><a href='index_noticia.php'>voltar</a>";
?>