
<?php
//Conectarse a la Base de Datos.
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Error de Conexión");

?>

<html>
    <head>
        <title>Tienda Virtual</title>
        <link rel="stylesheet" href="css/estilo.css">
        <meta charset="utf-8">

         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    
      <body>
       <div class="container"> 
     

    <h1 class="text-center text-uppercase mt-5">Iniciar Sesión - Portal Trabajadores</h1>
<form method="POST" action="sesionTrabajador.php">

<div class="row">
<div class="derecha col-md-9">
            <div class="form-group row">
              <label for="Usuario" class="control-label col-md-2">Usuario:</label>
              <div class="col-md-7">
              <input type="text" name="usuario" placeholder="Ingrese su Usuario" class="form-control" required><br>
              </div>
            </div>

            <div class="form-group row">
                  <label for="contraseña" class="control-label col-md-2">Contraseña:</label>
                  <div class="col-md-7">
                <input type="password" name="contrasena" class="form-control" placeholder="Escriba su contraseña" required>
                </div>
            </div>

        <div class="form-group">
       <input type="submit" name="sesionTrabajador"  class="btn btn-success" value="Iniciar Sesión">
      <a href="index.php" class="btn btn-primary">Volver</a>

       </div>
    </form>

    </div> <!-- Fin clase derecha -->

<div class="izquierda col-md-3">
<img src="imagenes/trabajadores.jpg" width="500" alt="trabajadores"  align="center">
</div>



   </div>  <!-- FIn row  -->
    
<?php
if(isset($_POST['sesionTrabajador']))
{
    $usuario=$_POST['usuario'];

    //Consultar Datos
    $consulta = "SELECT * FROM usuarios WHERE USUARIO='$usuario'";
    $ejecutar = mysqli_query($conexion, $consulta);

    
    if($fila = mysqli_fetch_array($ejecutar))
    {
        $contrasena=$fila['CONTRASENA'];
        $rol=$fila['ROL'];

        if($_POST['contrasena'] == $contrasena )
        {
            if($rol=="1")
            {
                header('Location: administradorProductos.php');

            }elseif($rol=="2")
            {
                header('Location: administradorPedidos.php');

            }
            
            

        }else{
            echo "<script>alert('Contraseña Incorrecta')</script>";
        }

    }else{
        echo "<script>alert('El Usuario no existe')</script>";
    }

    
}
?>


</div>  
</body> 
</html>



