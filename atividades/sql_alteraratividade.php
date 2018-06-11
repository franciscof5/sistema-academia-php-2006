<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Central de Horários</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$atividadeID = $_POST['atividadeID'];


$alterar = mysqli_query($con, "UPDATE atividades SET descricao='$descricao', titulo='$titulo' WHERE atividadeID='$atividadeID'");

if($alterar) {
	echo "<p align='center'><h3>Descriçao de \"$titulo\" concluída</h3></p>";
} else {
	echo "<p align='center'><h3>Erro ao alterar, tente novamente ou entre em contato com o suporte</h3></p>";;
}
echo "<p><br /><a href='index_atividades.php'>voltar</a></p>";
?>
</body>
</html>