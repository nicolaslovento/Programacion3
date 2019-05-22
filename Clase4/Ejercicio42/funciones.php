<?php
function ValidarYGuardarFotoEnCarpeta($nombresDeFotos,$tamaños,$tmp_name){

    $contador=0;
    foreach($nombresDeFotos as $nombre){

        $destino="imagenes/".$nombre;
        $extension=pathinfo($destino,PATHINFO_EXTENSION);
    
        if($extension != "jpeg" && $extension != "jpg"){

            echo "La imagen ".pathinfo($destino,PATHINFO_FILENAME)."con extension ".$extension." no se puede subir.";
            echo "<br>"."Solo se admite JPG y JPEG.";
            $contador++;
            continue;
        }

        echo $tamaños[$contador];
        if($tamaños[$contador]>900000){
            echo "La imagen ".pathinfo($destino,PATHINFO_FILENAME)."es muy pesada.";
            echo "<br>"."Solo se admite imagenes que no superen los 900KB.";
            $contador++;
            continue;

            
        }

        GuardarEnTexto($destino);
        move_uploaded_file($tmp_name[$contador],$destino);
        $contador++;
}
}

function MostrarImagenes(){

    $imagenes=array();
    $direccion=fopen("urlImagen.txt","r");

    while(!feof($direccion)){

        $linkImagen=fgets($direccion);
        if($linkImagen==" "){
            continue;
        }
        array_push($imagenes,$linkImagen);
    }
    fclose($direccion);
    
    for($i=0;$i<count($imagenes);$i++){
        if(5>strlen($imagenes[$i])){
            continue;
        }
        echo "<table border='1'> <tr> <td>";
        echo "<img src='".$imagenes[$i]."' widht='100px' height='100px'</img>"."<br>";
        echo "</td> <td>  Ver foto </td></tr> </table>";
    }
}

function GuardarEnTexto($imagen){

        $direccion=fopen("urlImagen.txt","a");

        fwrite($direccion,$imagen."\r\n");

        fclose($direccion);
        

}


?>