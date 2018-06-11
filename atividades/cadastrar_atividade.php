<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Central de Horários</title>
<link href="../academia.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script language="javascript">
	function guardar() {
		if(document.atividades.titulo.value.length<3) {
			window.alert("Título Muito Pequeno");
			document.atividades.titulo.focus();
			//
		} else if(document.atividades.descricao.value.length<20) {
			window.alert("Descrição está muito pequena");
			document.atividades.descricao.focus();
			//
		} else {
			document.atividades.submit();
		}
	}
</script>
<center>
<form id="atividades" name="atividades" method="post" action="sql_cadastraratividade.php">
	<label>
		Título:
		<br />
		<input type="text" name="titulo">
		<br />
	</label>
	<label>
		Descrição:
		<br />
		<textarea rows="10" name="descricao"></textarea>
		<br />
	</label>
	<br />
	<input type="button" onClick="guardar();" value="Cadastrar" />
	<br />
</form>
</center>
<br /><br /></p>
<p>obs: Não usar aspas duplas, por exemplo "esporte", e sim aspas simples, 'esporte' <br />
  obs: Para fazer uma quebra de linha (pular uma linha) não usar o Enter, é necessário escrever &lt;br /&gt;<br />
  <br />
  <a href='index_atividades.php'>voltar</a>
</p>
</body>
</html>
