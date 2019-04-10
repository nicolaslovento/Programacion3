<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio42</title>
</head>
<body>
    <form action="imagen.php" method="post" enctype="multipart/form-data" >

        <input type="file" name="fotos[]" multiple>
        <input type="submit" name="enviar">

    </form>
</body>
</html>