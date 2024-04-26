
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="acomodo.js"></script>
    <title>Mi galeria de imagenes</title>
</head>
<body>
    <header>
            <div class="izquierda">
            <img src="camara.jpeg" alt="Imagen a la izquierda del encabezado">
            <h1>Mi galería de imágenes</h1>
        </div>
        <nav>
            <ul>
                <li><a href="Up_login.php">Subir imagen</a></li>
                <li><a href="registro.php">Registrarse</a></li>
                <li><a href="editar_user.php">Modificar usuario</a></li>
            </ul>
        </nav>
    </header>
    <hr>
    <div class="cuerpo">
        <div class="galeria">
            <?php
            $ruta_imagenes="imagen_k/";
            $imagenes = opendir($ruta_imagenes);
            $hay_imagenes = false;
            if($imagenes){
                while($imagen = readdir($imagenes)){
                    if(is_file($ruta_imagenes . $imagen) && getimagesize($ruta_imagenes . $imagen)){
                        echo "<img class='miniatura' src='$ruta_imagenes$imagen' onclick='mostrarImagen(this)'>";
                        $hay_imagenes = true;
                    } 
                }
                closedir($imagenes);
                echo '<center>';
            } else {
                echo "Error: al cargar carpeta de imagenes";
            }
            if(!$hay_imagenes){
                echo "No hay imagenes aún. Sube la primera";
            }
            echo '</center>';
            ?>
        </div>
    </div>
</body>
</html>
