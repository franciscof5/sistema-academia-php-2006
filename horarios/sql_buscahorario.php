<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

$atividade = $_POST['atividade'];
//$atividade = "karate";
echo "<p align='center'>$atividade</p>";

$bus_query = "SELECT horarios. * , atividades. * , professores. * FROM horarios INNER JOIN atividades ON horarios.atividadeID = atividades.atividadeID INNER JOIN professores ON horarios.profID = professores.profID WHERE titulo='$atividade' ORDER BY 'dianum'";


$busca = mysqli_query($con, $bus_query);

if($busca) {
	//manda ver uma tabela
	echo "<p align='center'><table width='80%' border='1'> <tr><td>Dia</td><td>Hora</td></tr>";
	while($linha=mysqli_fetch_assoc($busca)) {
		echo "<tr><td>";
		echo $linha['diastr'];
		echo "</td><td>";
		echo $linha['horarioInicio'];
		echo "</td></tr>";
	}
	echo "</table></p>";
} else {
	echo "Erro na busca, tente novamente ou entre em contato com o suporte";
}