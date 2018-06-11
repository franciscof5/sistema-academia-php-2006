<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Central de Notícias</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<a href="cadastrar_noticia.php">Cadastrar Notícia</a>
<br /><br />

<?php
//Inclue o arquivo que faz a conexão com o banco de dados
include("../logaracademia.php");

echo "
	<label>
		Dia: Mês: Ano:
	</label>
	<form method='post' action='index_noticia.php'>
		<select name='dia'>
		  <option>1</option>
		  <option>2</option>
		  <option>3</option>
		  <option>4</option>
		  <option>5</option>
		  <option>6</option>
		  <option>7</option>
		  <option>8</option>
		  <option>9</option>
		  
		  <option>10</option>
		  <option>11</option>
		  <option>12</option>
		  <option>13</option>
		  <option>14</option>
		  <option>15</option>
		  <option>16</option>
		  <option>17</option>
		  <option>18</option>
		  <option>19</option>
		  
		  <option>20</option>
		  <option>21</option>
		  <option>22</option>
		  <option>23</option>
		  <option>24</option>
		  <option>25</option>
		  <option>26</option>
		  <option>27</option>
		  <option>28</option>
		  <option>29</option>
		  
		  <option>30</option>
		  <option>31</option>
		</select>
		<select name='mes'>
		  <option>1</option>
		  <option>2</option>
		  <option>3</option>
		  <option>4</option>
		  <option>5</option>
		  <option>6</option>
		  <option>7</option>
		  <option>8</option>
		  <option>9</option>
		  
		  <option>10</option>
		  <option>11</option>
		  <option>12</option>
		</select>
		<select name='ano'>
		  <option>2006</option>
		  <option>2008</option>
		  <option>2009</option>
		</select>
		<input type='submit' value='ir' />
	</form>";

//function gerenciar_noticias (dia, mes, ano) {
	$dia = $_POST['dia'];
	$mes = $_POST['mes'];
	$ano = $_POST['ano'];
	
	if(!isset($dia)) {
		$dia = date("d");
		$mes = date("m");
		$ano = date("Y");
	}
	//
	$dataUltimoLog = date("d/m/Y-H:i");
	//
	$buscanoticia = mysqli_query($con, "SELECT * FROM noticias WHERE dia='$dia' AND mes='$mes' AND ano='$ano'");
	if($buscanoticia) {
		echo "
				<table width='80%' border='1'>
				  <tr>
					<td class='titulo'>Titulo</td>
					<td class='titulo'>Noticia</td>
					<td class='titulo'>Categoria</td>
					<td class='titulo'>Alterar</td>
					<td class='titulo'>Deletar</td>
				  </tr>";
		while ($linha=mysqli_fetch_assoc($buscanoticia)) {
			echo "
				  <tr>
					<td class='impar'>".$linha['titulo']."</td>
					<td class='impar'>".$linha['noticia']."</td>
					<td class='impar'>".$linha['categoria']."</td>
					<td class='impar'>
						<form action='alterar_noticia.php' method='post' name='alterar_noticia' id='alterar_noticia'>
							<input type='image' src='../alterar.jpg' />
							<input type='hidden' value='".$linha['noticiaID']."' name='noticiaID'/>
						</form>
					</td>
					<td class='impar'>
						<form action='sql_deletarnoticia.php' method='post' name='deletar_noticia' id='deletar_noticia'>
							<input type='image' src='../deletar.jpg' />
							<input type='hidden' value='".$linha['noticiaID']."' name='noticiaID'/>
						</form>
					</td>
				  </tr>";
		}
		echo "</table>";
	} else {
		echo mysqli_error($con);
	}
//}
//gerenciar_noticias (date("d"), date("m"), date("Y"));

?>
</body>
</html>
