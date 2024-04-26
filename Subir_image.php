<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="usurg.css">
    <title>Document</title>
</head>
<body>
<center>
    <?php
    $carpeta = "imagen_k/";

    if(!empty($_FILES["archivo"]["name"])){
        $archivo = $_FILES["archivo"]["name"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        
        if($tipo_archivo != "image/jpg" && $tipo_archivo != "image/png" && $tipo_archivo != "image/jpeg" && $tipo_archivo != "image/gif")
        {
            echo "Error: Solo se permiten imagenes JPG, PNG y GIF";
            return;
        }
        
        if($tamano_archivo > 1000000)
        {
            echo "Error: El archivo es demasiado grande";
            return;
        }

        move_uploaded_file($ruta_temporal, $carpeta . $archivo);
        echo "Se ha enviado el archivo";
        echo '<form action="index.php" method="post">';
            
        echo  '<input type="submit" value="Inicio">';
        echo '</form>';
    }   
    else
    {
        echo "No se logro hacer el envio";
       echo '<form action="index.php" method="post">';
            
        echo '<input type="submit" value="inicio">';
        echo '</form>';
    }
    ?></center>
</body>
</html>