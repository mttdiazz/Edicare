<?php
	require "header.php";
?>
<?php


	if(isset($_SESSION['id'])){
		echo '<center><p class="login-titulo">Configuracion de cuenta</p>
			<p class="login-subtitulo">Aqui podras modificar los datos de tu usuario</p>
			<br></br>
			<br></br>

			<table class = datosUser>
  			<tr>
   			<th>E-mail</th>
    		<th colspan="2">Contraseña</th>
  			</tr>
  			<tr>
    		<td>'.$_SESSION['email'].' <a href="./mailEdit.php" class="editar-submit">Editar</a></td>
    		<td>  ********** <a href= ./passEdit.php class="editar-submit">Editar</a></td>
  			</tr>
			</table>
			</center>';
	}
	else{
		echo "ESTA PAGINA NO EXISTE!";
	}
 ?>