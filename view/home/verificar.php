<?php
require_once("c://xampp/htdocs/login_con_errores/controller/homeController.php");

session_start();

$obj = new homeController();

$correo = $obj->limpiarcorreo($_POST['correo']);
$contraseña = $obj->limpiarcadena($_POST['contraseña']);

$bandera = $obj->verificarusuario($correo, $contraseña);

if ($bandera) {
    $_SESSION['usuario'] = $correo;
    header("Location: moonlab/index.html");
} else {
    $error = "<li>Credenciales incorrectas</li>";
    header("Location:login.php?error=" . $error);
}
?>
