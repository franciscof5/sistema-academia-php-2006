<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Central de Atividades</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center">
    <td><p><img src="../degrade_anil.jpg" alt="Degrade Anil" width="200" height="12"></p>
      <p><a href="../horarios/index_horario.php">Central de Horários</a></p>
	  <p><a href="../professores/index_professores.php">Central de Professores</a></p>
	  <p><a href="cadastrar_atividade.php">Cadastrar Atividades</a></p>
      <p><img src="../degrade_anil.jpg" alt="Degrade Anil 2" width="200" height="12"></p></td>
  </tr>
</table>
</center>
<br /><br />
<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

//
$seleciona_atividades = mysqli_query($con, "SELECT * FROM atividades");
//

echo "<center>
		<table width='80%' border='1'>
		  <tr>
			<td class='titulo'>Título</td>
			<td class='titulo'>Descrição</td>
			<td class='titulo'>Alterar</td>
			<td class='titulo'>Deletar</td>
		  </tr>";
while ($linha=mysqli_fetch_assoc($seleciona_atividades)) {
	echo "
		  <tr>
			<td class='impar'>".$linha['titulo']."</td>
			<td class='impar'>".$linha['descricao']."</td>
			<td class='impar'>
				<form action='alterar_atividade.php' method='post'>
					<input type='hidden' value='".$linha['titulo']."' name='titulo'/>
					<input type='hidden' value='".$linha['descricao']."' name='descricao'/>
					<input type='hidden' value='".$linha['atividadeID']."' name='atividadeID'/>
					<input type='image' src='../alterar.jpg' />
				</form>
			</td>
			<td class='impar'>
				<form action='sql_deletaratividade.php' method='post'>
					<input type='hidden' value='".$linha['titulo']."' name='titulo'/>
					<input type='hidden' value='".$linha['descricao']."' name='descricao'/>
					<input type='hidden' value='".$linha['atividadeID']."' name='atividadeID'/>
					<input type='image' src='../deletar.jpg' />
				</form>
			</td>
		  </tr>";
}
echo "</table></center>";
echo "</table></center><p>obs: ao deletar uma atividades todos seu horários serão deletados juntos.</p>";
?>
</body>
</html>
