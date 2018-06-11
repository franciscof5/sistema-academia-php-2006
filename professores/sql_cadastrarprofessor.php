<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registrar Professores</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$nomeCadastrado = false;
$emailCadastrado = false;

//echo temporario

$nome = $_POST['profNome'];
$adress = $_POST['profEndereco'];
$cidade = $_POST['profCidade'];
$email = $_POST['profEmail'];
$telefone = $_POST['profTelefone'];


$buscarNome = mysql_query("SELECT nome FROM professores WHERE nome='$nome'");

while ($row = mysql_fetch_array($buscarNome)) {
	if($row['nome']==$nome)
	$nomeCadastrado = true;
	else
	$nomeCadastrado = false;
}

$buscarEmail = mysql_query("SELECT email FROM professores");

while ($row2 = mysql_fetch_array($buscarEmail)) {
	if($row2['email']==$email)
	$emailCadastrado = true;
	else
	$emailCadastrado = false;
}

if(!$nomeCadastrado and !$emailCadastrado) {
	$inserir = mysql_query("INSERT INTO `professores` (`nome`, `endereco`, `cidade`, `email`, `telefone`) VALUES ('$nome', '$adress', '$cidade', '$email', '$telefone');");
	if($inserir) {
		echo "<p align='center'><h3>$nome cadastrado no sistema</h3></p>";
		echo "<p><br /><a href='index_professores.php'>voltar</a></p>";
	} else {
		echo "<p align='center'><h3>Erro no cadastro, tente novamente ou entre em contato com o suporte</h3></p>";
		echo "<p><br /><a href='index_professores.php'>voltar</a></p>";
	}
} else if($nomeCadastrado) {
	echo "<script>
			alert('esse professor já está cadastrado');
			history.back(-1);
		  </script>";
} else if($emailCadastrado) {
	echo "<script>
			alert('professores diferentes não podem usar o mesmo email');
			history.back(-1);
		  </script>";
}
?>
</body>
</html>