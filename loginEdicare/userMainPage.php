<?php
	require "header.php";
?>
<?php
	if(isset($_SESSION['id'])){
		echo '<p class="login-titulo">Bienvenido tu gestor</p><p class="login-subtitulo">Selecciona la propiedad a la cual quieres acceder.</p>
			<br></br>
			<br></br>
  			<table class = datosUser>
  			<tr>
   			<th>Unidades Funcionales</th></tr>';
   		$user = mysqli_real_escape_string($conn,$_SESSION['id']);
		$result = mysqli_query($conn,"SELECT unidadesfuncionales.idUsuario, unidadesfuncionales.Descripcion, edificios.idEdificio, edificios.Direccion, edificios.Ciudad FROM  unidadesfuncionales, edificios WHERE '$user' = unidadesfuncionales.idUsuario AND edificios.idEdificio = unidadesfuncionales.idEdificio");
		while($fila = mysqli_fetch_array($result)){
		    echo '<tr><td>'.$fila['Direccion'].', '.$fila['Ciudad'].' | '.$fila['Descripcion'].'</td></tr>';
			}
			 echo '</table>';
			 echo '<a href="./reserva.php" class="hacer-reserva">Hacer reserva</a>';
	}
	else{
		echo '<div class="wrongPage">
			<p>Debes iniciar sesion para acceder a esta pagina.</p>
			</div>';
	}
 ?>