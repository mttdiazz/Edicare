<?php
	require "header.php";
	$idUsuario = $_SESSION['id'];
	$query = "SELECT reservaxsum.idReserva, reservaxsum.fecha, reservaxsum.horario, sumxedificio.Descripcion, edificios.Direccion, unidadesfuncionales.Descripcion FROM reservaxsum, sumxedificio, edificios, unidadesfuncionales WHERE unidadesfuncionales.idUsuario = $idUsuario AND unidadesfuncionales.idEdificio = sumxedificio.idEdificio AND unidadesfuncionales.idUnidad = reservaxsum.idUnidad AND edificios.idEdificio = sumxedificio.idEdificio ";
	$result = mysqli_query($conn, $query);
?>
<?php
	if(isset($_SESSION['id'])){
		echo '<p class="login-titulo">Gestor de Reservas</p>
			<p class="login-subtitulo">Aqui podras cancelar alguna reserva ya efectuada</p>
		<br></br>
		<br></br>';
		?>
		<!DOCTYPE html>
		<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css" />
		</head>     
		<body>
		<form id="borrarreserva" name="borrarreserva" action="./includes/borrarReserva.inc.php" method="POST">
		<div class="custom-select" style="width:50%; margin-left: 25%;">
		<select id="reserva" name="idReserva">
		<option name="reserva" value="" disabled selected>Selecciona una reserva para borrar:</option>
		<?php
			while ($row1 = mysqli_fetch_array($result)):;
		?>
		<option value="<?php echo $row1[0];?>" name="nombreReserva">
		<?php 
			echo  $row1[4].' | '.$row1[5].' | '.$row1[3].' | '.$row1[1].' | '.$row1[2];
		?>
		</option>
		<?php endwhile;   ?>
						</select>
		</div>
		<script type="text/javascript" src="selectorJs.js"></script>
		<br>
		<button type="submit" id="aceptar" name="aceptar" value="Borrar reserva" class="cancelarReservas-submit">Borrar la Reserva</button>
		</form>
		</body>
		</html>


	<?php
	}
	else{
		echo "ESTA PAGINA NO EXISTE!";
	}
 ?>