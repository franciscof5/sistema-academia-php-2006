<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Central de Professores</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center">
    <td><p><img src="../degrade_anil.jpg" alt="Degrade Anil" width="200" height="12"></p>
      <p><a href="../horarios/index_horario.php">Central de Horários</a></p>
	  <p><a href="cadastrar_professor.php">Cadastrar Professor</a></p>
	  <p><a href="../atividades/index_atividades.php">Central de Atividade </a></p>
      <p><img src="../degrade_anil.jpg" alt="Degrade Anil 2" width="200" height="12"></p></td>
  </tr>
</table>
</center>
<br /><br />
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

//
$seleciona_professores = mysqli_query($con, "SELECT * FROM professores ORDER BY nome");

echo "<center>
		<table width='80%' border='1'>
		  <tr>
			<td class='titulo'>Nome</td>
			<td class='titulo'>Endereço</td>
			<td class='titulo'>Cidade</td>
			<td class='titulo'>Email</td>
			<td class='titulo'>Telefone</td>
			<td class='titulo'>Alterar</td>
			<td class='titulo'>Deletar</td>
		  </tr>";
while ($linha=mysqli_fetch_assoc($seleciona_professores)) {
	echo "
		  <tr>
			<td class='impar'>".$linha['nome']."</td>
			<td class='impar'>".$linha['endereco']."</td>
			<td class='impar'>".$linha['cidade']."</td>
			<td class='impar'>".$linha['email']."</td>
			<td class='impar'>".$linha['telefone']."</td>
			<td class='impar'>
				<form action='alterar_professor.php' method='post'>
					<input type='hidden' value='".$linha['nome']."' name='nome'/>
					<input type='hidden' value='".$linha['endereco']."' name='endereco'/>
					<input type='hidden' value='".$linha['cidade']."' name='cidade'/>
					<input type='hidden' value='".$linha['email']."' name='email'/>
					<input type='hidden' value='".$linha['telefone']."' name='telefone'/>
					<input type='image' src='../alterar.jpg' />
				</form>
			</td>
			<td class='impar'>
				<form action='sql_deletarprofessor.php' method='post'>
					<input type='hidden' value='".$linha['nome']."' name='nome'/>
					<input type='hidden' value='".$linha['profID']."' name='professorID'/>
					<input type='image' src='../deletar.jpg' />
				</form>
			</td>
		  </tr>";
}
echo "</table></center><p>obs: ao deletar um professor todos seu horários serão deletados juntos.</p>";
?>
</body>
</html>
