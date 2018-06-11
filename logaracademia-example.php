<?
//verifica o cookie terça 9 de maio de 2006
if($_COOKIE["b1s8"]!="curimbata") {
	echo "<script>location='../index.php';</script>";
}
//


//Dia segunda feira dia 27 de fevereiro de 2006, comecei a fazer o site, deve ter sido ontem umas 10 horas o ínicio mesmo...
error_reporting("E_ALL & ~E_NOTICE");

mysqli_connect("localhost", "user", "pass") or die("Não pode conectar: " . mysqli_error());

mysql_select_db("academia");
?>