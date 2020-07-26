<!DOCTYPE <!DOCTYPE html>
<meta charset="utf-8">
<head>
    <title> Pedidos </title>
<!-- <link rel="stylesheet" type="text/css" href="css/estilo.css"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
 crossorigin="anonymous">
</head>

<script>
function sacarvalor(){
    
var valor = document.getElementById("formaPago").value;

//Aquí decides que quieres hacer con el valor.

return valor;
}


function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

</script>



<body>
<div class="container"> 

 <header> 
      <h1>Detalle del Pedido:</h1>
    </header>
    <!-- Contenido -->
    <section>
    
 
<h3  style="color:green;" align="center">Detalle de Compra</h3>
<?php
session_start();
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Error de Conexión");




//variable costo de envio:
$costoEnvio=3000;

//Inicializar Algunas Variables:
$productoPedido="";
$arrayPedido[7];

if(!empty($_POST['check_list'])){

//Bucle para almacenar y mostrar valores de casilla de verificación individual marcada.
foreach($_POST['check_list'] as $selected){
 
$consulta = "SELECT * FROM productos WHERE ID='$selected'";
    $ejecutar= mysqli_query($conexion, $consulta);

    $fila= mysqli_fetch_array($ejecutar);

    $id=$fila['ID'];
    $nombreProducto=$fila['NOMBRE'];
    $caracteristicas=$fila['CARACTERISTICAS'];
    $foto=$fila['FOTO'];
    $costo=$fila['COSTO'];
    $costoTotal+=$costo;
    $productoPedido .=$nombreProducto . ','; 
?>
<table class="table table-striped table-hover table-condensed">
        
    <tr>
    <td><?php echo "<b>Producto:  </b>".$nombreProducto2 ?></td> 
    </tr>
    <tr>
    <td><?php echo "<b>Caracteristicas:  </b>".$caracteristicas?></td>
    </tr>

    <tr>
    <td><?php echo "<b>Precio:  </b>$". $costo ?></td> 
    </tr>
</table>

<?php
}

$arrayPedido[0] = trim($productoPedido, ',');
}
//}
?>

<?php

if(isset($_SESSION['user']))
{
    $email = $_SESSION['user'];

    $consulta = "SELECT * FROM clientes WHERE EMAIL='$email'";
    $ejecutar= mysqli_query($conexion, $consulta);

    $fila= mysqli_fetch_array($ejecutar);

    $id=$fila['ID'];
    $nombre=$fila['NOMBRE'];
    $apellido = $fila['APELLIDO'];
	$arrayPedido[1]=$nombre ." ".$apellido;
    $telefono = $fila['TELEFONO'];
	$arrayPedido[3]= $telefono;
    $direccion = $fila['DIRECCION'];
	$arrayPedido[2]= $direccion;
	
}

$arrayPedido[4]= "0";
$arrayPedido[5]= ($costoTotal+$costoEnvio)."";
$arrayPedido[6]= "Tarjeta";
echo"</br>";
//print_r ($arrayPedido);
echo"</br>";

$arrayPedidoSerialize= serialize($arrayPedido);
//echo $arrayPedidoSerialize;
echo"</br>";
?>

<h3 align="center">Información del Contacto</h3>
<table class="table table-striped table-hover table-condensed">
        
    <tr >
    <td><?php echo "<b>Nombre:  </b>". $nombre." ".$apellido ?></td> 
    </tr>

    <tr>
    <td><?php echo "<b>Telefono:  </b>". $telefono ?></td> 
    </tr>

    <tr>
    <td><?php echo "<b>Dirección:  </b>". $direccion ?></td> 
    </tr>

    <tr>
    <td><?php echo "<b>Email:  </b>". $email ?></td> 
    </tr>
</table>
<h3 align="center">Realizar Pago</h3>



<form method="POST" action="ejecutarPago.php">
<table border=0 align="center">
    <tr>
        <td><label>Costo producto:   </label></td>
        <td><input type="text" name="costoTotal" value="$<?php echo $costoTotal ?>" disabled><br></td>
    </tr>
    <tr>
        <td><label>Costo Envío:</label></td>
        <td><input type="text" name="costoEnvio" value="$<?php echo $costoEnvio ?>" disabled><br></td>
    </tr>
    <tr>
        <td><label>Costo Total:</label></td>
        <td><input type="text" name="costoTotal" value="$<?php echo $costoTotal+$costoEnvio ?>" disabled><br></td>
    </tr>
    
    <tr>
        <td><label>Número de Tarjeta:</label></td>
        <td><input type="text" onkeypress='return validaNumericos(event)' maxlength="20" required/></td>
    </tr>
    
    <tr>
        <td><label>Clave Tarjeta:</label></td>
        <td><input type="text" onkeypress='return validaNumericos(event)' maxlength="3" required/></td>
    </tr>
    
    <tr>
        <td>
		<input type="hidden" name="arrayPedido0" value="<?php echo $arrayPedido[0]; ?>" >
		<input type="hidden" name="arrayPedido1" value="<?php echo $arrayPedido[1]; ?>" >
		<input type="hidden" name="arrayPedido2" value="<?php echo $arrayPedido[2]; ?>" >
		<input type="hidden" name="arrayPedido3" value="<?php echo $arrayPedido[3]; ?>" >
		<input type="hidden" name="arrayPedido4" value="<?php echo $arrayPedido[4]; ?>" >
		<input type="hidden" name="arrayPedido5" value="<?php echo $arrayPedido[5]; ?>" >
		<input type="hidden" name="arrayPedido6" value="<?php echo $arrayPedido[6]; ?>" >
		
        <input type="submit" name="finPedido" value="Finalizar Pedido" class="btn btn-primary">
        </td>        
    </tr>
</table >
    
<?php

//Insertar Datos
if (isset($_POST['finPedido']))
{					
		
    $nombrePedido=$nombre." ".$apellido;
    $direccionPedido=$direccion;
    $telefonoPedido=$telefono;
    $costoPedido=$costoTotal+$costoEnvio;


		echo"<script>alert('$productoPedido')</script>";

		  $insertarPedido = "INSERT INTO pedidos (ID, PRODUCTO, NOMBRE, DIRECCION, TELEFONO, ESTADO, COSTO, PAGO) 
          VALUES (NULL,'$arrayPedido[0]','$arrayPedido[1]','$arrayPedido[2]','$arrayPedido[3]', $arrayPedido[4], 
          '$arrayPedido[5]', '$arrayPedido[6]')";

        if(mysqli_query($conexion, $insertarPedido))
        {
            echo"<script>alert('La compra se realizó Exitosamente')</script>";
            echo"<script>window.open('productos.php','_self')</script>";
        }else{
            echo mysql_errno($conexion) . ": " . mysql_error($conexion) . "\n";
            printf("Errormessage: %s\n", mysqli_error($conexion));
        }
}
?>
<br><br>
<h6 align="center"><a href="index.php" class="btn btn-success">Volver</a></h6>
</p>

</section>
    <!-- Contenido relacionado-->
    
    <!-- Pie de pagina -->
 
  </body>

  </div>
</html>

