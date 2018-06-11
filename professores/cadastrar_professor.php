<?php header("Content-Type: text/html; charset=ISO-8859-1",true); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registrar Professores</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script language="javascript">
	function comer() {
		if(document.professor.profNome.value.length<3) {
			window.alert("Nome Pequeno");
			document.professor.profNome.focus();
		} else if(document.professor.profEndereco.value.length<5) {
			window.alert("Endereço Pequeno");
			document.professor.profEndereco.focus();
		} else if(document.professor.profCidade.value.length<3) {
			window.alert("Cidade Pequena");
			document.professor.profCidade.focus();
		} else if(document.professor.profEmail.value.length<6) {
			window.alert("Email Pequeno");
			document.professor.profEmail.focus();
		} else if(document.professor.profTelefone.value.length<8) {
			window.alert("Telefone Pequeno");
			document.professor.profTelefone.focus();
		} else {
			document.professor.submit();
		}
	}
</script>
<form id="professor" name="professor" method="post" action="sql_cadastrarprofessor.php">
	<label>
		Nome:
		<br />
		<input type="text" name="profNome">
		<br />
	</label>
	<label>
		Endereço:
		<br />
		<input type="text" name="profEndereco" />
		<br />
	</label>
	<label>
		Cidade:
		<br />
		<input type="text" name="profCidade" />
		<br />
	</label>
	<label>
		Email:
		<br />
		<input type="text" name="profEmail" />
		<br />
	</label>
	<label>
		Telefone:
		<br />
		<input type="text" name="profTelefone" />
		<br />
	</label>
	<br />
	<input type="button" onclick="comer();" value="Cadastrar" />
	<br />
</form>
</body>
</html>
