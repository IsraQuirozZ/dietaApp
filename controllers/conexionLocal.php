<!--
    Proyecto: Generador de Dietas
    Año: 2025
    Licencia: Uso académico solamente - Prohibida su redistribución, modificación o comercialización sin autorización. 
-->
    
<?php 
define("BASE_URL", "http://localhost/dietaApp/");
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "prueba_dietaapp";

$conexion = new mysqli($host, $usuario, $password, $base_datos);

if($conexion->connect_error){
    die("Error de conexión: " . $conexion->connect_error);
} 
?>