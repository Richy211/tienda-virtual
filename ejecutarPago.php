<?php
echo "PROCESANDO PAGO... </br>";

$arrayPedido= array($_POST['arrayPedido0'],$_POST['arrayPedido1'],$_POST['arrayPedido2'],$_POST['arrayPedido3'],$_POST['arrayPedido4'],$_POST['arrayPedido5'],$_POST['arrayPedido6']);

session_start();
$conexion = mysqli_connect("localhost","root","","tienda") or die ("Error de Conexión");

if (isset($_POST['finPedido']))
{					

		
		  $insertarPedido = "INSERT INTO pedidos (ID, PRODUCTO, NOMBRE, DIRECCION, TELEFONO, ESTADO, COSTO, PAGO) VALUES (NULL,'$arrayPedido[0]','$arrayPedido[1]','$arrayPedido[2]','$arrayPedido[3]', $arrayPedido[4], '$arrayPedido[5]', '$arrayPedido[6]')";

        $ejecutar = mysqli_query($conexion, $insertarPedido);

        if($ejecutar)
        {
            echo"<script>alert('La compra se realizó Exitosamente')</script>";
            echo"<script>window.open('productos.php','_self')</script>";
        }else{
            echo mysql_errno($conexion) . ": " . mysql_error($conexion) . "\n";
            printf("Errormessage: %s\n", mysqli_error($conexion));
        }

    
}

?>

