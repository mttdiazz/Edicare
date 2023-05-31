<?php
	require "header.php";
?>
<?php
$user = mysqli_real_escape_string($conn,$_SESSION['id']);
$query = "SELECT sumxedificio.Descripcion, sumxedificio.idEdificio, unidadesfuncionales.idEdificio, unidadesfuncionales.idUsuario,edificios.Direccion FROM sumxedificio, unidadesfuncionales, edificios WHERE unidadesfuncionales.idUsuario = $user AND unidadesfuncionales.idEdificio = sumxedificio.idEdificio AND edificios.idEdificio = unidadesfuncionales.idEdificio";

$result = mysqli_query($conn, $query);
$opciones = "";

?>
<?php
	if(isset($_SESSION['id'])){
		echo '<p class="login-titulo">Gestiona tus reservas</p><p class="login-subtitulo">Aqui podras efectuar nuevas reservas o cancelar alguna ya efectuada.</p>
			<br></br>
			<br></br>
  			<table class = datosUser>
  			<tr>
  			<form class="reserva" action="../loginEdicare/includes/reservar.inc.php" method="POST">'
  			?>

  		<!DOCTYPE html>
		<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css" />
		</head>     
		<body>
		<div class="custom-select" style="width:60%;margin-left: 20%;">
		  <select id="sum" name="sum" title="sum">
		    <option value="0">Selecciona un SUM:</option>
		    <?php
				while ($row1 = mysqli_fetch_array($result)):;
			?>
			<option name="sum" value="<?php echo $row1['Descripcion'];?>" ><?php echo $row1['Descripcion'].' | '.$row1['Direccion'];?></option>
		<?php endwhile;   ?>
		  </select>
		</div>
		<br>
		<p class='labelSelectorFecha'> Fecha y horario: </p>
		<br>
  		<div class="custom-select" style="width:20%; margin-left: 40%;">
		  <select id="horario" name="horario">
		    <option name="horario" value="" disabled selected>Selecciona un horario:</option>
			<option name="horario" value="Mediodia">Mediodia</option>
			<option name="horario" value="Noche">Noche</option>
		  </select>
		</div>
		<script type="text/javascript" src="selectorJs.js"></script>
		<input type="date" class= 'selectorFecha' id="fecha" name="fecha">
  		<button  class="botreserva" id="botonreserva" type="submit">Reservar</button>
  		</form> 
		</body>
		</html>
  		<?php 
  		echo '
  			<br><br>
  			<br><br>
   			<th>Mis Reservas</th></tr>';
   			$user = mysqli_real_escape_string($conn,$_SESSION['id']);
   			$sql=("SELECT reservaxsum.fecha, reservaxsum.horario, sumxedificio.Descripcion, edificios.Direccion, unidadesfuncionales.Descripcion FROM reservaxsum, sumxedificio, edificios, unidadesfuncionales WHERE unidadesfuncionales.idUsuario = $user AND unidadesfuncionales.idEdificio = sumxedificio.idEdificio AND unidadesfuncionales.idUnidad = reservaxsum.idUnidad AND edificios.idEdificio = sumxedificio.idEdificio ");
			$result = mysqli_query($conn,$sql);
			while($fila = mysqli_fetch_array($result)){
		    echo '<tr><td>'.$fila[3].' | '.$fila[4].' | '.$fila[2].' | '.$fila[0].' | '.$fila[1].'</td></tr>';
			};
			echo '</table>';
			echo '<a href="borrarReserva.php" class="cancelarReservas-submit">Click aqui para cancelar alguna de tus reservas</a>';
	}
	else{
		echo '<div class="wrongPage">
			<p>Debes iniciar sesion para acceder a esta pagina.</p>
			</div>';
	}
 ?>
