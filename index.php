<?php
//Definir variable sesión:
session_start();


//Conectarse a la Base de Datos.
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Error de Conexión");

?>

<html>
    <head>
        <title>Tienda Virtual</title>

        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
         integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body>
 <div class="container">
<!-- <div class="card">
  <div class="card-body"> -->
   <h1 class="text-left text-uppercase text-success m-5">Tienda Virtual 
    <img src="imagenes/gamer.jpg" alt="logo"  width="450px;" align="centert"></h1>
  
<!--   </div>
</div> -->

    <!-- Contenido -->
 <!-- <img src="imagenes/ni%C3%B1a.jpg" alt="foto" width="300"> -->

      <h1 class="text-center m-5">Ingrese sus datos de loguin</h1>
      
    <form method="POST" action="index.php">
<table class="table table-striped table-hover table-condensed">
    <tr>
        <th><label>Email:   </label></th>
        <td><input type="text" name="email" placeholder="Escriba su correo" required><br></td>
    </tr>
    <tr>
        <th><label>Contraseña:</label></th>
        <td><input type="password" name="contrasena" placeholder="Escriba su contraseña" required><br></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="sesion" value="Iniciar Sesión" class="btn btn-success"></td>
    </tr>
</table >
        
    </form>
    <br>
    <br>
    <p><h3 style="color:gray;" align="center">No estás registrado, ingresa <a href="registroCliente.php">aquí</a> para crear una cuenta</h3>
    <h3 style="color:gray;" align="center">Ingresar como trabajador de la tienda, pincha <a href="sesionTrabajador.php">aquí</a>.</h3>

    </p>


    
    <!-- Pie de pagina -->
    <footer><h6 text align="center"> Copiright 2018. Sitio creado por ricardo Llanos M </h6></footer>
  </body>

<?php
if(isset($_POST['sesion']))
{
    $email=$_POST['email'];
    
    $_SESSION['user']=$email;


    //Consultar Datos
    $consulta = "SELECT * FROM clientes WHERE EMAIL='$email'";
    $ejecutar = mysqli_query($conexion, $consulta);

    
    if($fila = mysqli_fetch_array($ejecutar))
    {
        $contrasena=$fila['CONTRASENA'];

        if($_POST['contrasena'] == $contrasena )
        {
            
            header('Location: productos.php'); 
            
/*             ?>
            <script type="text/javascript">
            window.location="http://rllanostienda2111.cl/productos.php";
            </script>
            
            <?php */
        }else{
            echo "<script>alert('Contraseña Incorrecta')</script>";   
        }
    }else{
        echo  "<script>alert('El correo no existe')</script>";   
    }
}
?>


</div>

</body>
    
</html>



