<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Deletando Horário</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$horarioID = $_POST['horarioID'];

$deletar = mysql_query("DELETE FROM horarios WHERE horarioID='$horarioID'");

if($deletar) {
	echo "<p align='center'><h3>Horário foi deletado</h3></p>";
} else {
	echo "<p align='center'><h3>erro ao deletar $nome, contate o suporte</h3></p>";
}
echo "<p><br /><a href='index_horario.php'>voltar</a></p>";
?>
</body>
</html>