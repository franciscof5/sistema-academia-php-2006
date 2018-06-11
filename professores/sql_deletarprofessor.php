<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Deletando Professores</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$nome = $_POST['nome'];
$professorID = $_POST['professorID'];

$deletar = mysqli_query($con, "DELETE FROM professores WHERE nome='$nome'");
$deletar2 = mysqli_query($con, "DELETE FROM horarios WHERE profID='$professorID'");

if($deletar and $deletar2) {
	echo "<p align='center'><h3>Professor $nome e todos seu horários foram deletados</h3></p>";
} else {
	echo "<p align='center'><h3>Erro ao deletar $nome e/ou seus horários, contate o suporte</h3></p>";
}
echo "<p><br /><a href='index_professores.php'>voltar</a></p>";
?>
</body>
</html>
