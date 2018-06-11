<html>
<head>
<title>Cadastrando Professor...</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>
<body>

<script language="javascript">
	function guardar() {
		if(document.professor.profEndereco.value.length<5) {
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

<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$nomeCadastrado = false;
$emailCadastrado = false;

//echo temporario

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

/*$nome = "Chico";
$endereco = "Adress";
$cidade = "City";
$email = "Mail-me shit";
$telefone = "1323412";*/

echo "
<center>
<form id='professor' name='professor' method='post' action='sql_alterarprofessor.php'>
	<label>
		Nome:
		<br />
		<input type='hidden' name='profNome' value='".$nome."'/>
		$nome
		<br />
	</label>
	<label>
		Endereço:
		<br />
		<input type='text' name='profEndereco' value='".$endereco."'/>
		<br />
	</label>
	<label>
		Cidade:
		<br />
		<input type='text' name='profCidade' value='".$cidade."'/>
		<br />
	</label>
	<label>
		Email:
		<br />
		<input type='text' name='profEmail' value='".$email."'/>
		<br />
	</label>
	<label>
		Telefone:
		<br />
		<input type='text' name='profTelefone' value='".$telefone."'/>
		<br />
	</label>
	<br />
	<input type='button' onClick='guardar()' value='Salvar Informações' />
	<br />
</form>
</center>";


?>
<center><br /><br /><a href='index_professores.php'>voltar</a></center>
</body>
</html>