<?php
	require "header.php";
?>
<?php
	if(isset($_SESSION['id'])){
		echo '<p class="login-titulo">Cambio de Contraseña</p>
			<p class="login-subtitulo">Ingrese tu nueva Contraseña</p>
			<br></br>
			<br></br>

			<table class = datosUser>
  			<tr>
   			<th>Contraseña actual</th>
    		<th colspan="2">Nueva Contraseña</th>
  			</tr>
  			<tr>
    		<td><form action="includes/editMail.inc.php" method="post"><input type="text" class="phMailEdit" name="mail-Edit" placeholder="Contraseña antigua">
    		<td><form action="includes/editMail.inc.php" method="post"><input type="text" class="phMailEdit" name="mail-Edit" placeholder="Nueva contraseña">
    			<button type="submit" name="cambiarMail">Cambiar</button>
  			</tr>
			</table>';
	}
	else{
		echo "ESTA PAGINA NO EXISTE!";
	}
 ?>