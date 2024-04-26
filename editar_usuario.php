<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirige si el usuario no ha iniciado sesión
    exit();
}

$servidor = "localhost";
$usuariodb = "root";
$passdb = "mont";
$db = "tabla_galeria";

$conexion = mysqli_connect($servidor, $usuariodb, $passdb, $db);

$usuario = $_SESSION['usuario'];
$nuevo_nombre = $_POST['nombre'];
$nuevo_email = $_POST['email'];
$nueva_contrasena = $_POST['contrasena'];

$consulta = "UPDATE usuarios SET nombre='$nuevo_nombre', correo_electronico='$nuevo_email', contrasena='$nueva_contrasena' WHERE nombre='$usuario'";

if (mysqli_query($conexion, $consulta)) {
    $_SESSION['usuario'] = $nuevo_nombre; // Actualiza el nombre de usuario en la sesión
    header("Location: editar_user.php"); // Redirige al perfil del usuario
    exit();
} else {
    echo "Error al actualizar la información del usuario: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>
