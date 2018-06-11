<?php
ob_start();
/*
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
#<meta charset=”UTF-8”>
*/
header("Content-Type: text/html; charset=ISO-8859-1",true);
?>

<head>
<!DOCTYPE HTML>
<html lang=”pt-br”>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<title>Logar no Sistema</title>
<link href="academia.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
if(isset($_POST['user']) && isset($_POST['pass'])) {
	if($_POST['user']=='gym_master' and $_POST['pass']=='dg2486') {
		setcookie('b1s8', "curimbata", time()+1800, "/");
		echo "<script>location='horarios/index_horario.php';</script>";
		ob_end_flush();
	}
} else {
	/*echo "<script>alert('Senha e/ou usuário inválido');</script>";*/
	echo "<p>ERRO: Usuário ou senha inválido, por motivo de segurança o sistema exige que voce refaça o login a cada 30 minutos</p>";
}
?>
<center>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
	<tr align="center">
		<td>
		<p><img src="degrade_anil.jpg" alt="Degrade Anil" width="200" height="12"></p>
		<form name="login" method="post" action="index.php">
			<p>
			Usuário:
			<br />
			<input type="text" name="user" />
			</p>
		    <p>
			Senha:
			<br />
			<input type="password" name="pass" />
			</p>
			<p>
			<br />
			<input type="submit" value="logar" />
			</p>
        </form>
		<p><img src="degrade_anil.jpg" alt="Degrade Anil 2" width="200" height="12"></p>
		</td>
	</tr>
</table>
</center>
<p>LOGAR: para acessar e testar o sistema o usuário é "gym_master" e a senha "dg2486"</p>
</body>
</html>
