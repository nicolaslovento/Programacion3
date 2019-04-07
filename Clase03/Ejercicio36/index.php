<!--Aplicación Nº 36 (Empresa de turismo con promociones)
Modificar la aplicación anterior para que la empresa pueda ofrecer una promoción de acuerdo
al modo de pago y la cantidad de pasajes a comprar.
Si el pago es en efectivo se realizará un descuento del 12% del valor del pasaje. Si es por
medio de tarjetas de crédito o débito el descuento será del 7%.
Independientemente de la forma de pago, si la cantidad de pasajes es superior a 2 cada pasaje
extra se abonará el 35% menos. -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ejercicio29</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    <form action="funciones.php" method="post">
        <table>
            <tr>
            <td>Destino:</td>
            <td><select id="cbo" name="destino" value="1">
                <option value="1" name="Rio">Rio De Janeiro</option>
                <option value="2" name="Punta">Punta Del Este</option>
                <option value="3" name="Habana">La Habana</option>
                <option value="4" name="Miami">Miami</option>
                <option value="5" name="Ibiza">Ibiza</option>
            </select></td>

            </tr>
            <tr>
            <td>Cantidad de pasajes:</td>
            <td><select id="cbo" name="pasajes">
                <option value="1" name="1">1</option>
                <option value="2" name="2">2</option>
                <option value="3" name="3">3</option>
                <option value="4" name="4">4</option>
                <option value="5" name="5">5</option>
            </select></td>

            </tr>
            <tr>
            <td>Metodo de pago:</td>
            <td><select id="cbo" name="metodoDePago">
                <option value="1" name="1">Efectivo</option>
                <option value="2" name="2">Tarjeta de credito</option>
                <option value="3" name="3">Tarjeta de debito</option>
                
            </select></td>

            </tr>
            <tr><td>
                Calcular valor</td>
            <td><input name="enviar" type="submit" value="Click aqui"></input></td></tr>
        </table>
        
    </form>
    
    
</body>
</html>