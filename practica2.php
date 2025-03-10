<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par o Impar</title>
</head>
<body>
    <h2>Determinador si un número es par o impar.</h2>

    <form action="" method="POST">
        <label>
            Ingrese el número:
            <input type="number" name="numero" required>
        </label>
        <button type="submit">Corroborar</button>
    </form>

</body>
</html>

<?php
    //Variable superglobal que indica el metodo de solicitud usado para acceder
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Metodo para validar una variable externa; parametros[type,variable_name,filter]
        $numero = filter_input(INPUT_POST,'numero',FILTER_VALIDATE_INT);
        //Comparacion estricta (no solo verifica el valor, sino también el tipo de dato)
        if ($numero !== false) {
            $respuesta = ($numero % 2 == 0) ? 'par' : 'impar';
            //Metodo para formatear un string; %d - integer, %s string
            $mensaje = sprintf('El número <strong>%d</strong> es %s', $numero, $respuesta);
            echo $mensaje;
        } else {
            echo "¡Por favor ingresa un número válido!";
        }
    }
   

