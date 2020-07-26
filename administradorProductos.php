<!DOCTYPE <!DOCTYPE html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <title>AdminProductos</title>
    <link rel="stylesheet" href="css/estilo.css">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
<div class="container"></div>


<?php
//Conectarse a la Base de Datos.
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Error de Conexión");

?>
<h2 class="text-center text-uppercase mt-5">Administrador de Productos</h2>

<form method="POST" action="administradorProductos.php" enctype="multipart/form-data">




        <div class="form-group">
        <label for="Producto" >Nombre del producto:   </label>
        <input  type="text" name="nombreProducto"  class="form-control" placeholder="Escriba Nuevo Producto" required>
       </div>

        <div class="form-group">
        <label for="Caracteristicas">Caracteristicas:</label>
        <textarea rows="4" cols="50" name="caracteristicas" class="form-control" placeholder="Ingrese caracteristicas" required></textarea>
        </div>


        <div class="form-group">
        <label for="foto">Foto del Producto(.jpg):</label>
        <td><input type="file" name="foto" value="Cargar Imágen del Producto" class=" form-control btn btn-success btn-sm" required><br>
        </div>

        <div class="form-group">
        <label for="producto" class="form-coontrol">Valor del Producto:</label>
        <input type="text" name="costo" class="form-control" placeholder="Ingrese valor producto" required>
        </div>

        
            <input type="submit" name="registroProducto"  class="btn btn-success" value="Ingresar Nuevo producto">
  
        
    </form>

<?php
//Insertar Datos
if (isset($_POST['registroProducto']))
{

    $nombreProducto=$_POST['nombreProducto'];
    $caracteristicas=$_POST['caracteristicas'];
    $foto=$_FILES['foto']['name'];
    $costo=$_POST['costo'];
    
    if($_FILES['foto']['type'] == "image/jpeg")
    {
        copy($_FILES['foto']['tmp_name'], 'imagenes/'.$foto);

        $insertarProducto = "INSERT INTO productos (ID, NOMBRE, CARACTERISTICAS, FOTO, COSTO) 
        VALUES (NULL,'$nombreProducto','$caracteristicas','$foto', $costo)";

        $ejecutar = mysqli_query($conexion, $insertarProducto);

        if($ejecutar)
        {
            echo "<h3>Producto insertado correctamente</h3>";
        }

    }else{
        echo "El archivo debe ser Formato JPEG";
    }

}

?>

<br><br>
<h3 class="text-center text-uppercase m-5">Productos:</h3>

<table class="table table-striped table-hover table-condensed">
<thead>
<th>N°</th>
<th>Nombre del Producto</th>
<th>Caracteristicas</th>
<th>Foto</th>
<th>Costos</th>
<th>Modificar Producto</th>
<th>Eliminar Producto</th>
</thead>

<?php
//Conectarse a la Base de Datos.
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Error de Conexión");

//Mostrar Datos
$consulta = "SELECT * FROM productos";
$ejecutar = mysqli_query($conexion, $consulta);

$i = 0;

while($fila = mysqli_fetch_array($ejecutar))
{
    $id=$fila['ID'];
    $nombreProducto=$fila['NOMBRE'];
    $caracteristicas=$fila['CARACTERISTICAS'];
    $foto=$fila['FOTO'];
    $costo=$fila['COSTO'];

    $i++;



?>

<tr align="center">
<td><?php echo $id; ?></td>
<td><?php echo $nombreProducto; ?></td>
<td><?php echo $caracteristicas; ?></td>
<td><img src="imagenes/<?php echo $foto; ?>" width="180" height="180"> </td>
<td><?php echo $costo; ?></td>
<td><a href="modificarProducto.php?modificar=<?php echo $id; ?>" class="btn btn-success btn-sm">Modificar</a></td>
<td><a href="administradorProductos.php?eliminar=<?php echo $id; ?>" class="btn btn-warning btn-sm">Eliminar</a></td>


</tr>

<?php } ?>
</table>

<h3 align="center"><a href="index.php" class="btn btn-primary">Volver</a></h3>

<?php

//BORRAR 
if(isset($_GET['eliminar']))
{
    $borrar_id = $_GET['eliminar'];

    $borrar = "DELETE FROM productos WHERE ID='$borrar_id'";
    $ejecutar = mysqli_query($conexion, $borrar);

    if($ejecutar)
    {
        echo"<script>alert('Producto Eliminado Correctamente')</script>";
        echo"<script>window.open('administradorProductos.php','_self')</script>";
    }
}

?>

</body>
</html>