<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alterarando professr...</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$nome = $_POST['profNome'];
$endereco = $_POST['profEndereco'];
$cidade = $_POST['profCidade'];
$email = $_POST['profEmail'];
$telefone = $_POST['profTelefone'];


$alterar = mysqli_query($con, "UPDATE professores SET endereco='$endereco', cidade='$cidade', email='$email', telefone='$telefone' WHERE nome='$nome'");

if($alterar) {
	echo "<p align='center'><h3>$nome teve dados alterados com sucesso</h3></p>";
} else {
	echo "<p align='center'><h3>Erro na alteração, tente novamente ou entre em contato com o suporte</h3></p>";
}
echo "<p><br /><a href='index_professores.php'>voltar</a></p>";
?>
</body>
</html>