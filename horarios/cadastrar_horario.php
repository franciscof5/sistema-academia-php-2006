<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastrar Horário</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
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
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

//faz as buscas, ta brincando?
$seleciona_professor = mysql_query("SELECT * FROM professores ORDER BY nome");
$seleciona_atividades = mysql_query("SELECT * FROM atividades ORDER BY titulo");

echo "
<form id='fhorario' name='fhorario' method='post' action='sql_cadastrarhorario.php'>
	<label>
		Atividade:
		<br />
		<select name='atividade' onChange='MM_jumpMenu('parent',this,0)'>";
			while($linha=mysql_fetch_array($seleciona_atividades)) {
				echo "<option>".$linha['titulo']."</option>";
			}
  		echo "</select>
		<br />
	</label>
	<label>
		Professor:
		<br />
		<select name='professor' onChange='MM_jumpMenu('parent',this,0)'>";
			while($linha=mysql_fetch_array($seleciona_professor)) {
				echo "<option>".$linha['nome']."</option>";
			}
			
  		echo "</select>
		<br />
	</label>
	<label>
		Horário Inicio:
		<br />
		<input type='text' name='horarioInicio' value='00:00:00' size='5' maxlength='8'/>
		<br />
	</label>
	<label>
		Horário de Termino:
		<br />
		<input type='text' name='horarioTermino' value='00:00:00' size='5' maxlength='8'/>
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
	<br />
	<input type='button' onClick='guardar();' value='Cadastrar' />
	<br />
</form>
<p><br /><a href='index_horario.php'>voltar</a></p>";


?>
</body>
</html>
