<!DOCTYPE <!DOCTYPE html>
<meta charset="utf-8">
   <head>
        <title>Tienda Virtual</title>
        <link rel="stylesheet" href="css/estilo.css">
        <meta charset="utf-8">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>


<?php
//Conectarse a la Base de Datos.
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Erro de Conexión");

?>

<html>
 

<body>
        
<h1 class="text-center text-uppercase text-success m-5">Ingrese sus datos
   </h1>

 <div class="row">
 <div class="derecha col-md-9">

    <form method="POST" name="form" action="registroCliente.php" 
        onsubmit="return validar()">

        <div class="form-group row">
        <label for="nombre" class="control-label col-md-2">Nombre</label>
        <div class="col-md-7">
        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Escriba su Nombre">
        </div>
        </div>
        

        <div class="form-group row">
        <label for="Apellido" class="control-label col-md-2">Apellido:</label>
        <div class="col-md-7">
        <input type="text" name="apellido" class="form-control" placeholder="Escriba su Apellido" required> 
        </div>
        </div>

        <div class="form-group row">
        <label for="Telefono" class="control-label col-md-2">Teléfono:</label>
        <div class="col-md-7">
        <input type="text" name="telefono"  class="form-control" placeholder="Escriba su Teléfono" required>
        </div>
        </div>

        <div class="form-group row">
            <label for="Direccion" class="control-label col-md-2">Dirección:</label>
            <div class="col-md-7">
            <input type="text" name="direccion" class="form-control" placeholder="Escriba su Dirección" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="Email" class="control-label col-md-2">Email:</label>
            <div class="col-md-7">
            <input type="text" name="email" class="form-control" placeholder="Escriba su Email" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="contrasena" class="control-label col-md-2">Contraseña:</label>
            <div class="col-md-7">
            <input type="password" name="contrasena" class="form-control" placeholder="Escriba su Contraseña" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="contrasena2" class="control-label col-md-2">Repita contraseña:</label>
            <div class="col-md-7">
            <input type="password" name="contrasena2" class="form-control" placeholder="Repita su Contraseña" required>
            </div>
        </div>


        <input type="submit" name="registro"  class="btn btn-success" value="Registrarse">
      <a href="index.php" class="btn btn-warning">Volver</a>

    </form>
        </div>  <!--Fin class derecha -->

<div class="izquierda col-md-3">
<img src="imagenes/registro.jpg" alt="logo"  width="350px;" align="centert">
</div>
 </div>

<?php
//Insertar Datos
if (isset($_POST['registro']))
{
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $contrasena2 = $_POST['contrasena2'];

    $insertar = "INSERT INTO clientes (ID, NOMBRE,APELLIDO, TELEFONO, DIRECCION, EMAIL, CONTRASENA) VALUES (NULL, '$nombre', '$apellido','$telefono','$direccion','$email','$contrasena')";

//Validar Contraseñas
    if ($contrasena != $contrasena2) 
    {
        echo "<script>alert('Las contraseñas no coinciden')</script>";
    } //Validar correo...***
     else {
        // Insertar Cliente

        $ejecutar = mysqli_query($conexion, $insertar);

        if($ejecutar)
        {
            echo "<script>alert('Su Registro ha sido exitoso')</script>";
        }

     }


   

}



?>

