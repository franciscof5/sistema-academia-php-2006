<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastrando Professor...</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>
<?php
//Inclue o arquivo que faz a conex�o com o banco de dados
include("../logaracademia.php");

//buscar o ID da atividade
$atividade = $_POST['atividade'];
//buscar o ID do professor
$professor = $_POST['professor'];
$horarioInicio = $_POST['horarioInicio'];
//horarioTermino
$horarioTermino = $_POST['horarioTermino'];
//dia escrito, precisa pegar tb o dia em numero
$diastr = $_POST['diastr'];


if($diastr=="Domingo") {
	$dianum = 1;
} else if($diastr=="Segunda-feira") {
	$dianum = 2;
} else if($diastr=="Ter�a-feira") {
	$dianum = 3;
} else if($diastr=="Quarta-feira") {
	$dianum = 4;
} else if($diastr=="Quinta-feira") {
	$dianum = 5;
} else if($diastr=="Sexta-feira") {
	$dianum = 6;
} else if($diastr=="S�bado") {
	$dianum = 7;
}


//Acha o ID do professor
$buscarProfessorID = mysql_query("SELECT * FROM professores WHERE nome='$professor'");

while ($row = mysql_fetch_array($buscarProfessorID)) {
	$professorID = $row['profID'];
}

//Acha o ID da atividade
$buscarAtividadeID = mysql_query("SELECT * FROM atividades WHERE titulo='$atividade'");

while ($row = mysql_fetch_array($buscarAtividadeID)) {
	$atividadeID = $row['ativID'];
}

//ADICIONAR O HORARIO NO BANCO DE DADOS

$adicionar = mysql_query("INSERT INTO `horarios` (`dianum`, `diastr`, `horarioInicio`, `horarioTermino`, `profID`, `atividadeID`, `horarioID`) VALUES ('$dianum', '$diastr', '$horarioInicio', '$horarioTermino', '$professorID', '$atividadeID', '');");

if($adicionar) {
	echo "<p align='center'><h3>$atividade �s $horarioInicio de $diastr cadastrado no sistema</h3></p>";
	echo "<p><br /><a href='index_horario.php'>voltar</a></p>";
} else {
	echo "<p align='center'><h3>Erro no cadastro, tente novamente ou entre em contato com o suporte</h3></p>";
	echo "<p><br /><a href='index_horario.php'>voltar</a></p>";
}
?>