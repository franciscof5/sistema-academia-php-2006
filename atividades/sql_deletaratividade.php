<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Deletando Atividades</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$atividadeID = $_POST['atividadeID'];

$deletar = mysqli_query($con, "DELETE FROM atividades WHERE ativID='$atividadeID'");
$deletar2 = mysqli_query($con, "DELETE FROM horarios WHERE atividadeID='$atividadeID'");

if($deletar and $deletar2) {
	echo "<p align='center'><h3>Atividade e seus horários excluídos do banco de dados</h3></p>";
} else {
	echo "<p align='center'><h3>Atividade: erro ao deletar \"$titulo\" e/ou seus horários, tente novamente ou contate o suporte</h3></p>";
}
echo "<p><br /><a href='index_atividades.php'>voltar</a></p>";
?>
</body>
</html>
