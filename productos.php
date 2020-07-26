<!-- // Módulo: Muestra de productos
// Autor:  Ricardo Llanos
// Fecha de creación de Modulo: Agosto 2018
// Función: Mostrar los datos rescatados de la base de datos
// Muestra de datos: estos los muestra en una tabla con los siguientes datos
//ID – Nombre de productos – Características – Costo – Foto – Pedir  -->
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
     crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
<header>

    </header>
<!--  <img src="imagenes/ni%C3%B1a.jpg" alt="foto" width="300">


<h2 class="text-center text-uppercase mb-5">Productos Disponibles</h2> -->

<h1 class="text-left text-uppercase text-success m-5">Productos Disponibles 
    <img src="imagenes/ni%C3%B1a.jpg" alt="foto" width="300" align="centert"></h1>



<form action="pedido.php" method="post">
<table class="table table-striped table-hover table-condensed">
<tr>
<th>N°</th>
<th>Nombre del Producto</th>
<th>Caracteristicas</th>
<th>Costos</th>
<th>Foto</th>
<th>Pedir Plato</th>
</tr>



<?php
//Conectarse a la Base de Datos.
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Error de Conexión");

//Mostrar Datos
$consulta = "SELECT * FROM productos";
$ejecutar = mysqli_query($conexion, $consulta);

$i =0;


while($fila = mysqli_fetch_array($ejecutar)){
    $id=$fila['ID'];    
    $nombreProducto=$fila['NOMBRE'];
    $caracteristicas=$fila['CARACTERISTICAS'];
    $costo=$fila['COSTO'];
    $foto=$fila['FOTO'];

    

?>


<?php //if($i==-1){ echo "style=\"visibility:hidden; width:1px; height:1px; \" "; } ?>

<tr align="center">

<td><?php echo $id; if($i==-1){ echo "style=\"visibility:hidden; width:1px; height:1px; \" "; }?></td>
<td><?php echo $nombreProducto;?></td>
<td><?php echo $caracteristicas; ?></td>
<td>$<?php echo $costo; ?></td>
<td><img src="imagenes/<?php echo $foto; ?>" width=130px higth=180px ></a></td>
<td><input type="checkbox" name="check_list[]" value="<?php echo $id; ?>" >Seleccionar Artículo</input></td>

</tr>
<?php 
$i++;
};
;?>

</table>
<input type="submit" name="submit" value="Ir a Comprar" class="btn btn-primary">
<a href="index.php" class="btn btn-success">Volver</a>
</form>
  </section>
  </body>
  </div>
<br><br>

