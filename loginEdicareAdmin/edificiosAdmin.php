<?php
  require "header.php";
if(isset($_SESSION['id'])){
  $idAd = $_SESSION['id'];
  echo '<p class="login-titulo">Edificios</p>
    <p class="login-subtitulo">Aqui podras asignar unidades funcionales a usuarios especificos.</p>
    <br></br>
    <br></br>';
  echo '</section>
    </div>
    <center>
    <div class="listaEdificios">
    <table class="datosUser">
    <tr>
    <th>Direccion del Edificio</th>
    <th>Ciudad</th>
    <th>Accion</th>
    </tr>';
  $sql = ("SELECT idEdificio,Direccion, Ciudad FROM edificios WHERE  idAdmin='$idAd'");
  $result = mysqli_query($conn, $sql);
  while ($fila = mysqli_fetch_array($result)) {
    echo '<tr><td>' . $fila[1] . '</td><td>' . $fila[2] . '</td><td>'?>
    <a href="./adminUF.php?idEd=<?php echo $fila[0];?>" class="nuevoSAdm"><button type="submit" name="idEdif" class="editar-submit" >Administrar</button></a><?php 
  }
}
else{
    echo "ESTA PAGINA NO EXISTE!";
  }
 ?>