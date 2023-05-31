<?php
require "header.php";
?>
<?php
if (isset($_SESSION['id'])) {
	echo '<center><p class="login-titulo">Cambio de Email</p>
			<p class="login-subtitulo">Ingrese tu nuevo mail</p>
			<br></br>
			<br></br>

			<table class = datosUser>
  			<tr>
   			<th>E-mail actual</th>
    		<th colspan="2">Nuevo E-mail</th>
  			</tr>
  			<tr>
    		<td>' . $_SESSION['email'] . '
    		<td><form action="includes/editMail.inc.php" method="post"><input type="text" class="phMailEdit" name="mail-Edit" placeholder="Email">
    			<button type="submit" name="cambiarMail">Cambiar</button>
  			</tr>
			</table></center>';
} else {
	echo "ESTA PAGINA NO EXISTE!";
}
?>