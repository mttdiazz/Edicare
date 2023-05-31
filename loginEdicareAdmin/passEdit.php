<?php
	require "header.php";
?>
<?php
	if(isset($_SESSION['id'])){
		$idAdmin =$_SESSION['id'];
		$query="SELECT admin.pwdAdmin FROM admin WHERE admin.idAdmin = $idAdmin";
		$password = mysqli_query($conn, $query);
		$row1 = mysqli_fetch_array($password);

		echo '<center><p class="login-titulo">Cambio de Contraseña</p>
			<p class="login-subtitulo">Ingrese tu nueva Contraseña</p>
			<br></br>
			<br></br>

			<table class = datosUser>
  			<tr>
   			<th>Contraseña actual</th>
    		<th colspan="2">Nueva Contraseña</th>
  			</tr>
  			<tr>
    		<td><form action="includes/editPass.inc.php" method="post"><input type="text" class="phMailEdit" name="contraVieja" placeholder="Contraseña antigua">
    		<td><input type="text" class="phMailEdit" name="contraNueva" placeholder="Nueva contraseña">
    			<button type="submit" name="cambiarMail" >Cambiar</button>
    		</form>
  			</tr>
			</table></center>';
	}
	else{
		echo "ESTA PAGINA NO EXISTE!";
	}
 ?>