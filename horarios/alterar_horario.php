<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alterar Horários</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>
<body>

<script language='javascript'>
	function guardar() {
		if(document.fhorario.horarioInicio.value.length!=8) {
			window.alert('Horário de inicio não é válido');
			document.fhorario.horarioInicio.focus();
		} else if(document.fhorario.horarioTermino.value.length!=8) {
			window.alert('Horário de término não é valido');
			document.fhorario.horarioTermino.focus();
		} else {
			document.fhorario.submit();
		}
	}
</script>

<?php
//COLOCAR O HORARIO DE TERMINO

//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$horarioID = $_POST['horarioID'];

//faz as buscas, ta brincando?
$seleciona_professor = mysqli_query($con, "SELECT * FROM professores ORDER BY nome");
$seleciona_atividades = mysqli_query($con, "SELECT * FROM atividades ORDER BY titulo");
$busca_horario = mysqli_query($con, "SELECT horarios. * , atividades. * , professores. * FROM horarios INNER JOIN atividades ON horarios.atividadeID = atividades.ativID INNER JOIN professores ON horarios.profID = professores.profID WHERE horarioID='$horarioID'");
//precisa usar 2 vezes a msm busca
 $busca_horario2 = mysqli_query($con, "SELECT horarios. * , atividades. * , professores. * FROM horarios INNER JOIN atividades ON horarios.atividadeID = atividades.ativID INNER JOIN professores ON horarios.profID = professores.profID WHERE horarioID='$horarioID'");
//precisa usar 2 vezes a msm busca 
$busca_horario3 = mysqli_query($con, "SELECT horarios. * , atividades. * , professores. * FROM horarios INNER JOIN atividades ON horarios.atividadeID = atividades.ativID INNER JOIN professores ON horarios.profID = professores.profID WHERE horarioID='$horarioID'");
//precisa usar 2 vezes a msm busca

echo "
<form id='fhorario' name='fhorario' method='post' action='sql_alterarhorario.php'>
	<label>
		Atividade:
		<br />";
			while($linha=mysqli_fetch_assoc($busca_horario)) {
				echo $linha['titulo'];
			}
  	echo "<br />
	</label>
	<label>
		Professor:
		<br />
		<select name='professor' onChange='MM_jumpMenu('parent',this,0)'>";
			while($linha=mysqli_fetch_assoc($seleciona_professor)) {
				echo "<option>".$linha['nome']."</option>";
			}
			
  		echo "</select>
		<br />
	</label>
	<label>
		Horário Inicio:
		<br />";
			while($linha=mysqli_fetch_assoc($busca_horario2)) {
				echo "<input type='text' name='horarioInicio' value='".$linha['horarioInicio']."' size='5' maxlength='8'/>";
			}
		echo "
		<br />
	</label>
	<label>
		Horário de Termino:
		<br />";
			while($linha=mysqli_fetch_assoc($busca_horario3)) {
				echo "<input type='text' name='horarioTermino' value='".$linha['horarioTermino']."' size='5' maxlength='8'/>";
			}
		echo "
		<br />
	</label>
	<label>
		Dia da Semana:
		<br />
		<select name='diastr' onChange='MM_jumpMenu('parent',this,0)'>
			<option>Domingo</option>
			<option>Segunda-feira</option>
			<option>Terça-feira</option>
			<option>Quarta-feira</option>
			<option>Quinta-feira</option>
			<option>Sexta-feira</option>
			<option>Sábado</option>
		</select>
		<br />
	</label>
	<input type='hidden' name='horarioID' value='".$horarioID."'/>
	<br />
	<input type='button' onClick='guardar();' value='Alterar' />
	<br />
</form>";

?>
<p><br /><a href='index_horario.php'>voltar</a></p>
</body>
</html>