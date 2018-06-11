<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Central de Horários</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<center>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr align="center">
    <td><p><img src="../degrade_anil.jpg" alt="Degrade Anil" width="200" height="12"></p>
      <p><a href="cadastrar_horario.php">Adicionar Hor&aacute;rio</a></p>
	  <p><a href="../professores/index_professores.php">Central de Professores </a></p>
	  <p><a href="../atividades/index_atividades.php">Central de Atividade </a></p>
      <p><img src="../degrade_anil.jpg" alt="Degrade Anil 2" width="200" height="12"></p></td>
  </tr>
</table>
</center>


<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

//faz as bucas, ta brincando?
$seleciona_professor = mysql_query("SELECT * FROM professores ORDER BY nome");
$seleciona_atividades = mysql_query("SELECT * FROM atividades ORDER BY titulo");

echo "
	<center>
	<form name='busca' action='index_horario.php' method='post'>
		<br />
		<select name='atividade' onChange='MM_jumpMenu('parent',this,0)'>";
			while($linha=mysql_fetch_array($seleciona_atividades)) {
				echo "<option>".$linha['titulo']."</option>";
			}
  		echo "</select>
		<input type='submit' value='buscar'/>
	</form>
	</center>";

//Função da busca

$atividade = $_POST['atividade'];
echo "<p align='center'><h3>$atividade</h3></p>";

$busca = mysql_query("SELECT horarios. * , atividades. * , professores. * FROM horarios INNER JOIN atividades ON horarios.atividadeID = atividades.ativID INNER JOIN professores ON horarios.profID = professores.profID WHERE titulo='$atividade' ORDER BY 'dianum'");

if($busca) {
	//manda ver uma tabela
	echo "<center><table width='80%' border='1'> <tr><td class='titulo'>Dia</td><td class='titulo'>Hora</td><td class='titulo'>Professor</td><td class='titulo'>Alterar</td><td class='titulo'>Deletar</td></tr>";
	while($linha=mysql_fetch_array($busca)) {
		echo "<tr><td class='impar'>";
		echo $linha['diastr'];
		echo "</td><td class='impar'>";
		echo $linha['horarioInicio'];
		echo "</td><td class='impar'>";
		echo $linha['nome'];
		echo "<td class='impar'>
				<form action='alterar_horario.php' method='post'>
					<input type='hidden' value='".$linha['horarioID']."' name='horarioID' />
					<input type='image' src='../alterar.jpg' />
				</form>
			</td>";
		echo "<td class='impar'>
				<form action='sql_deletarhorario.php' method='post'>
					<input type='hidden' value='".$linha['horarioID']."' name='horarioID' />
					<input type='image' src='../deletar.jpg' />
				</form>
			</td></tr>";
	}
	echo "</table></center>";
} else {
	echo "Erro na busca, tente novamente ou entre em contato com o suporte";
}

/*$seleciona_dados = mysql_query("SELECT horarios. * , atividades. * , professores. * FROM horarios INNER JOIN atividades ON horarios.atividadeID = atividades.atividadeID INNER JOIN professores ON horarios.profID = professores.profID ORDER BY 'horarioInicio'");

$dia1 = array("segunda", "5:00", "ballet", "junior");
$dia2 = array("tserca", "7:00", "luta", "marcos");
$md = array($dia1, $dia2);
$n=0;

echo "
		<table width='80%' border='1'>
		  <tr>
		    <td class='titulo'>hora/dia</td> 
			<td class='titulo'>Domingo</td>
			<td class='titulo'>Segunda</td>
			<td class='titulo'>Terça</td>
			<td class='titulo'>Quarta</td>
			<td class='titulo'>Quinta</td>
			<td class='titulo'>Sexta</td>
			<td class='titulo'>Sábado</td>
		  </tr>
		  <tr>";*/
/*reset($md);  
while (list($key, $value) = each ($md)) {
   echo "Chave: $key; Valor: $value[$n]<br />\n";
   $n++;
}*/

/*function atacaTD ($titulo, $professor, $horarioInicio, $dia, $diaTabela) {
	if($diaTabela<7) {
		if($dia<$diaTabela) {
			for($i=0;$i<(($diaTebela-$dia)*-1);$i++) {
				echo "<td class='par'> V $titulo <br /> $diaTabela e $dia</td>";
				$diaTabela++;
			}
		} else {
			echo "<td class='par'> $titulo <br /> $diaTabela e $dia</td>";
			$diaTabela++;
		}
	} else if($diaTabela>=7) {
		echo "</tr><tr>";
		echo "<td class='titulo'>$horarioInicio</td>";
		$diaTabela=1;
	}*/
	/*if($diaTabela>7 and $diaTabela!="") {
		echo "BROOK  ";
		//Se o dia passado for menor que o dia que esta rodando é pq tem que pular
		echo "</tr><tr>";
		echo "<td class='titulo'>$horarioInicio</td>";
		$diaTabela=1;
	} elseif($diaTabela<=7 and $diaTabela!="") {
		echo "dia tabela : ".$diaTabela;
		for ($i=0;$i<($diaTabela-$dia)*-1;$i++) {
			$diaTabela++;
			echo "<td class='par'>vazio $dia</td>"; 
		}
		echo "<td class='par'> $titulo <br /> $diaTabela e $dia</td>";
		//$diaTabela=$dia;	
		$diaTabela=7;
	} else {
		echo "inicioDvariavel ".$diaTabela;
		$diaTabela=8;
	}*/
//}

//$n=1;
//$diaTabela=8;

//while ($linha=mysql_fetch_array($seleciona_dados)) {
	// o $diaTabela tem que ser passado aqui pois na função ele não é visivel
	//atacaTD($linha['titulo'], $linha['nome'], $linha['horarioInicio'], $linha['dia']);
	/*
	$dia = $linha['dia'];
	$titulo = $linha['titulo'];
	$horarioInicio = $linha['horarioInicio'];
	
	if($diaTabela<=7) {
		//echo " MENOR7 ";
		if($diaTabela<$dia) {
			echo " <br />1.$diaTabela<$dia - ".(($diaTebela-$dia)*-1);
			for($i=0;$i<=(($diaTebela-$dia)*-1);$i++) {
				echo "<td class='par'> horário vázio </td>";
				$diaTabela++;
			}
		} else if($diaTabela>$dia) {
			echo " <br />2.$diaTabela>$dia ";
			echo "</tr><tr>";
			echo "<td class='titulo'>$horarioInicio</td>";
			$diaTabela=1;
		} else {
			echo " <br />3.$diaTabela=$dia ";
			echo "<td class='par'> $titulo <br /> $diaTabela e $dia</td>";
			$diaTabela++;
		}
	} else if($diaTabela>7) {
		//echo " MAIOR7 ";
		echo "</tr><tr>";
		echo "<td class='titulo'>$horarioInicio</td>";
		$diaTabela=1;
	}*/
	
	//echo $linha['dia']." : ";
	//echo $linha['titulo']." : ";
	//if($diaTabela==7)
	//$diaTabela=1;
	//if($horarioAnterior==$linha['horarioInicio']) {
		//serve para dar quebra de linhas se necessário
		//echo "<td class='impar'>".$linha['titulo']." com <br />".$linha['nome']."</td>";
		
		/*if($n%2==0) {
			//echo "par";
			echo "<td class='par'>".$linha['titulo']." com <br />".$linha['nome']."</td>";	
		} else {
			//echo "impar";
			echo "<td class='impar'>".$linha['titulo']." com <br />".$linha['nome']."</td>";	
		}*/
		//atacaTD($linha['titulo'], $linha['nome'], $linha['horarioInicio'], $linha['dia']);
		/*if($linha['dia']=="segunda" and $diaTabela==1) {
			echo "<td class='par'>".$linha['titulo']." com <br />".$linha['nome']."</td>";
			$diaTabela++;
			//
		} else if($linha['dia']=="terca" and $diaTabela==2) {
			echo "<td class='par'>".$linha['titulo']." com <br />".$linha['nome']."</td>";
			$diaTabela++;
			//
		} else if($linha['dia']=="quarta") {
			if($diaTabela<3) {
				for ($i=0;$i<3-$diaTabela;$i++) {
					$diaTabela++;
					echo "<td class='par'>vazia</td>"; 
				}
			}
			echo "<td class='par'>".$linha['titulo']." com <br />".$linha['nome']."</td>";
			$diaTabela++;
			//
		} else if($linha['dia']=="quinta" and $diaTabela==4) {
			echo "<td class='par'>".$linha['titulo']." com <br />".$linha['nome']."</td>";
			$diaTabela++;
			//
		} else if($linha['dia']=="sexta" and $diaTabela==5) {
			echo "<td class='par'>".$linha['titulo']." com <br />".$linha['nome']."</td>";
			$diaTabela++;
			//
		} else {
			echo "<td class='par'>";
			if($linha['dia']=="quarta") { 
				echo "asdkjasdkj";
				echo $diaTabela;
			}
			echo "</td>";
			$diaTabela++;
			//
		}*/
		
	//} else {
		//$n++;
		//$diaTabela++;
		//Adiciona uma linha nova com o horário pego na tabela
		//echo "<tr>";
		//echo "<td class='titulo'>".$linha['horarioInicio']."</td>";
		/*if($n%2==0) {
			//echo "par";
			echo "<td class='par'>".$linha['titulo']." com <br />".$linha['nome']."</td>";	
		} else {
			//echo "impar";
			echo "<td class='impar'>".$linha['titulo']." com <br />".$linha['nome']."</td>";	
		}*/
		//echo "<td class='par'>".$linha['titulo']." com <br />".$linha['nome']."</td>";
	//}
	
	//$horarioAnterior = $linha['horarioInicio'];
//}
/*while ($linha=mysql_fetch_array($seleciona_dados)) {
	$horario=$linha['horarioInicio'];
	echo "
		  <tr>
			<th class='titulo'>".$horario."</th>";
			if($linha['dia']=="segunda")
			echo "<th class='impar'>".$linha['titulo']." com <br />".$linha['nome']."</th>";
			else if($linha['dia']=="terca")
			echo "<th class='par'>".$linha['titulo']." com <br />".$linha['nome']."</th>";
			else if($linha['dia']=="quarta")
			echo "<th class='impar'>".$linha['titulo']." com <br />".$linha['nome']."</th>";
			else if($linha['dia']=="quinta")
			echo "<th class='par'>".$linha['titulo']." com <br />".$linha['nome']."</th>";
			else if($linha['dia']=="sexta")
			echo "<th class='impar'>".$linha['titulo']." com <br />".$linha['nome']."</th>";
			else if($linha['dia']=="sabado")
			echo "<th class='par'>".$linha['titulo']." com <br />".$linha['nome']."</th>";
			else if($linha['dia']=="domingo")
			echo "<th class='impar'>".$linha['titulo']." com <br />".$linha['nome']."</th>";
	//}
}*/
echo "</table>";
?>
</p>
</body>
</html>
