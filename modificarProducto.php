<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Modificar</title>
    <link rel="stylesheet" href="css/estilo.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  </head>
  <body>
   <div class="container">

    <h2 class="text-center text-uppercase m-5">Modificar Producto</h2>
    
<?php
//Conectarse a la Base de Datos.
$conexion = mysqli_connect("localhost","root","","tienda") 
or die ("Error de Conexión");


if(isset($_GET['modificar']))
{
    $modificar_id = $_GET['modificar'];

    $consulta = "SELECT * FROM PRODUCTOS WHERE ID='$modificar_id'";
    $ejecutar= mysqli_query($conexion, $consulta);

    $fila= mysqli_fetch_array($ejecutar);

    $id=$fila['ID'];
    $nombreProducto=$fila['NOMBRE'];
    $caracteristicas=$fila['CARACTERISTICAS'];
    $foto=$fila['FOTO'];
    $costo=$fila['COSTO'];
}

?>

<form method="POST" action="" enctype="multipart/form-data">
<table class="table table-striped table-hover table-condensed">


    <thead>

        <th><label>Nombre del Producto:   </label></th>
        <td><input type="text" name="nombreProducto"  value="<?php echo $nombreProducto; ?>" required><br></td>
    </thead>

    <thead>
        <th><label>Caracteristica</label></th>
        <td><textarea rows="4" cols="50" name="caracteristicas" required><?php echo $caracteristicas; ?></textarea><br></td>
    </thead>


    <thead>
        <th><label>Foto Actual del Producto(.jpg):</label></th>
        <td><img src="imagenes/<?php echo $foto; ?>" width="180" height="180" ><br><input type="file" name="foto" ><br></td>
    </thead>


    <thead>
        <th><label>Valor del Producto:</label></th>
        <td><input type="text" name="costo" value="<?php echo $costo ; ?>" required><br></td>
    </thead>

    <tr>
        <td><input type="submit" name="modificarProductos" class="btn btn-success" value="Modificar Producto"></td>
        <td><a href="administradorProductos.php" class="btn btn-primary">Volver</a></td>
    </tr>
</table >
        
    </form>

<?php
    if(isset($_POST['modificarProductos']))
    {

        $actualizar_nombre = $_POST['nombreProducto'];
        $actualizar_caracteristicas= $_POST['caracteristicas'];
        $actualizar_foto = $_FILES['foto']['name'];
        $actualizar_costo = $_POST['costo'];

        
        if($actualizar_foto != "" || $actualizar_foto !=null)
        {
            if($_FILES['foto']['type'] == "image/jpeg")
            {
                copy($_FILES['foto']['tmp_name'], $actualizar_foto);

                $actualizar = "UPDATE productos SET NOMBRE='$actualizar_nombre', CARACTERISTICAS='$actualizar_caracteristicas', FOTO='$actualizar_foto', COSTO=$actualizar_costo WHERE ID='$modificar_id'";
                $ejecutar= mysqli_query($conexion, $actualizar);
                if($ejecutar)
                   {
                       echo"<script>alert('Producto Actualizado Correctamente')</script>";
                       echo"<script>window.open('administradorProductos.php','_self')</script>";
                   }



            }else{
                echo "El archivo debe ser Formato JPEG";
            }

        }else
        {
            $actualizar = "UPDATE productos SET NOMBRE='$actualizar_nombre', CARACTERISTICAS='$actualizar_caracteristicas', COSTO=$actualizar_costo WHERE ID='$modificar_id'";
                $ejecutar= mysqli_query($conexion, $actualizar);
                if($ejecutar)
                   {
                       echo"<script>alert('productos Actualizado Correctamente')</script>";
                       echo"<script>window.open('administradorProductos.php','_self')</script>";
                   }
            
            
        }

    }

?>    
</div>

</body>
</html>