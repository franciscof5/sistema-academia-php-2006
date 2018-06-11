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

$tituloCadastrado = false;

//echo temporario

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];


$buscarTitulo = mysqli_query($con, "SELECT titulo FROM atividades WHERE titulo='$titulo'");

while ($row = mysqli_fetch_assoc($buscarTitulo)) {
	if($row['titulo']==$titulo)
	$tituloCadastrado = true;
	else
	$tituloCadastrado = false;
}


if(!$tituloCadastrado) {
	$inserir = mysqli_query($con, "INSERT INTO `atividades` (`titulo`, `descricao`, `atividadeID`) VALUES ('$titulo', '$descricao', '');");
	if($inserir) {
		echo "<p align='center'><h3>Atividade: \"$titulo\" inserida com sucesso</h3></p>";
		echo "<p><br /><a href='index_atividades.php'>voltar</a></p>";
	} else {
		echo "<p align='center'><h3>Erro ao cadastrar, tente novamente ou entre em contato com o suporte</h3></p>";
		echo "<p><br /><a href='index_atividades.php'>voltar</a></p>";
	}
} else {
	echo "<script>
			alert('Uma atividade com o mesmo título já esta armazanada no banco de dados');
			history.back(-1);
		  </script>";
}
?>
</body>
</html>