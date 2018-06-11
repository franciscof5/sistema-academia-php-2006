<html>
<head>
<title>Escrever Notícia</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script language="javascript">
	function guardar() {
		if(document.formulario_noticia.titulo.value.length<3) {
			window.alert("Título Pequeno");
			document.formulario_noticia.titulo.focus();
		} else if(document.formulario_noticia.noticia.value.length<5) {
			window.alert("Notícia muito curta");
			document.formulario_noticia.noticia.focus();
		} else {
			document.formulario_noticia.submit();
		}
	}
</script>
<form id="formulario_noticia" name="formulario_noticia" method="post" action="sql_cadastrarnoticia.php">
	<label>
		Titulo:
		<br />
		<input type="text" name="titulo" value="Netg">
		<br />
	</label>
	<label>
		Notícia:
		<br />
		<textarea name="noticia" rows="20" cols="80">Bem vindo ao sistema de notícias, escreva aqui sua notícia e escolha a categoria. Obrigado por escolher netg.</textarea>
		<br />
	</label>
	
	<label>
		Categoria:
	</label>
	
	<br />
 	<select name="categoria">
      <option>brasil</option>
      <option>mundo</option>
	  <option>cotidiano</option>
	  <option>cultura</option>
	  <option>esporte</option>
	  <option>tecnologia</option>
	  <option>tabloide</option>
	  <option>geral</option>
	</select>
	<br />
	<br />
	<label>
		Dia:   Mês:   Ano:
	</label>
	<br />
	<select name="dia">
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
	<select name="mes">
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
	<select name="ano">
      <option>2006</option>
      <option>2008</option>
	  <option>2009</option>
    </select>
	<br />
	<br />
	<input type="button" onClick="guardar();" value="Noticiar" />
	<br />
</form>
<br /><br /><a href='index_noticia.php'>voltar</a>
</body>
</html>
