<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>
    <h2>Escribe una función que reciba un número y devuelva su factorial.</h2>
    <form action="" method="POST">
        <label>
            Ingresa el número:
            <input type="number" name="numero" required>
        </label>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>

<?php
    function CalcularFactorial(int $numero) {
        if($numero < 0) return "No existe factorial de números negativos";
        if($numero == 0) return 1;
        
        $resultado = 1;
        for ($i=1; $i <= $numero; $i++) { 
            $resultado *= $i;
        }
        return $resultado;
    }

    //Variable superglobal que indica el metodo de solicitud usado para acceder
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Metodo para validar una variable externa; parametros[type,variable_name,filter]
        $numero = filter_input(INPUT_POST,'numero',FILTER_VALIDATE_INT);    
        if ($numero !== false && $numero >= 0) {
            $factorial = CalcularFactorial($numero);
            echo sprintf('El factorial de <strong>%d</strong> es %s', $numero, $factorial);
        } else {
            echo "¡Por favor ingresa un número positivo!";
        }
    }