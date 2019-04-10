
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="2" align="center">
    <caption>FOTOS</caption>
<?php

    $destino="Imagenes/".$_FILES["foto"]["name"];
    move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);

    //guardo en texto
    $direccion=fopen("imagenesParaMostrar.txt","a");
    if(0>fwrite($direccion,$destino."\r\n")){
        echo "NO SE PUDO GUARDAR LA FOTO EN TEXTO";
    }
    fclose($direccion);

    //traigo las direcciones y la guardo en array
    $fotos=array();
    $direccion=fopen("imagenesParaMostrar.txt","r");
    while(!feof($direccion)){

        $linkImagen=fgets($direccion);
        if($linkImagen==" "){
            continue;
        }

        array_push($fotos,$linkImagen);

    }
    fclose($direccion);
    
    for($i=0;$i<count($fotos);$i++){

        if(5>strlen($fotos[$i])){
            continue;
        }
        echo "<tr> <td>";
        echo "<img src='".$fotos[$i]."' widht='100px' height='100px'</img>"."<br>";
        echo "</td> <td>  Ver foto </td></tr> ";

    }



    //muestra una foto sola.
    /*$destino="Imagenes/".$_FILES["foto"]["name"];
    move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);

    $fotos=array();
    array_push($fotos,$destino);
    
    for($i=0;$i<count($fotos);$i++){

        echo "<tr> <td>";
        echo "<img src='".$fotos[$i]."' widht='100px' height='100px'</img>"."<br>";
        echo "</td> <td>  Ver foto </td></tr> ";

    }*/


    //metodo para traer imagenes mediante una carpeta.
    /*$fotos=opendir("Imagenes");
    while ($archivo = readdir($fotos)) //obtenemos un archivo y luego otro sucesivamente
    {
        if (!is_dir($archivo))//verificamos si es o no un directorio
        {
            echo "<tr> <td>";
            echo "<img src='Imagenes/".$archivo."' widht='100px' height='100px'</img>"."<br>";
            echo "</td> <td>  Ver foto </td></tr> ";
        }
    }*/
   
?>
<a href="index.php">Volver a la pagina principal</a>
    </table>

</body>

</html>