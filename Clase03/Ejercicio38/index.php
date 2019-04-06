<!--Aplicación Nº 38 (Descuento por Compra)
Un restaurante ofrece un descuento del 10% para consumos entre $ 300 y $ 550 y un
descuento del 20% para consumos mayores a $ 550. Para todos los demás casos no se aplica
ningún tipo de descuento.
Elaborar una aplicación web que permita determinar el importe a pagar por el consumidor. -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ejercicio38</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>

    <form action="cuentas.php" method="post">
        <span><b>Gasto:</b></span><input type="number" name="gasto" id="gasto"></input>
        <input type="submit" id="enviar" value="Calcular"></input>
    </form>

</body>
</html>