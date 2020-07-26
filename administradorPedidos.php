<!DOCTYPE <!DOCTYPE html>
<meta charset="utf-8">

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Pedidos</title>
    <link rel="stylesheet" href="css/estilo.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

<div class="container">

<img src="imagenes/ni%C3%B1a.jpg" alt="foto" width="300">

<h2 class="text-center text-uppercase mt-5">Administrador de Pedidos</h2>
     
<table class="table table-striped table-hover table-condensed">
<thead>
<th>N°</th>
<th>Producto</th>
<th>Cliente</th>
<th>Dirección</th>
<th>Telefono</th>
<th>Precio</th>
<th>Forma de Pago</th>
<th>Finalizar Pedido</th>
</thead>

<?php
//Conectarse a la Base de Datos.
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Error de Conexión");

//Mostrar Datos
$consulta = "SELECT * FROM pedidos WHERE ESTADO=0";
$ejecutar = mysqli_query($conexion, $consulta);
$i = 0;
while($fila = mysqli_fetch_array($ejecutar))
{
    $id=$fila['ID'];
    $producto=$fila['PRODUCTO'];
    $nombre=$fila['NOMBRE'];
    $direccion=$fila['DIRECCION'];
    $telefono=$fila['TELEFONO'];
    $costo=$fila['COSTO'];
    $pago=$fila['PAGO'];
    
    $i++;
?>
<tbody>
<td><?php echo $id; ?></td>
<td><?php echo $producto; ?></td>
<td><?php echo $nombre; ?></td>
<td><?php echo $direccion; ?></td>
<td><?php echo $telefono; ?></td>
<td><?php echo $costo; ?></td>
<td><?php echo $pago; ?></td>
<td><a href="administradorPedidos.php?estatus=<?php echo $id; ?>" 
  class="btn btn-success btn-sm" >Finalizar</a></td>
</tbody>
</tr>
<?php } ?>
</table>
<h3 align="center"><a href="index.php" class="btn btn-primary">Volver</a></h3>
<?php
//Finalizar Pedido
if(isset($_GET['estatus']))
{
    $estatus_id = $_GET['estatus'];

    $estatus = $actualizar = "UPDATE pedidos SET ESTADO=1 WHERE ID='$estatus_id'";
    $ejecutar = mysqli_query($conexion, $estatus);

    if($ejecutar)
    {
        echo"<script>alert('El Pedido N°".$estatus_id." ha finalizado Correctamente')</script>";
        echo"<script>window.open('administradorPedidos.php','_self')</script>";
    }
}

?>
  </div>
</body>
</html>