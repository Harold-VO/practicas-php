<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>

<body>
    <h2>Una calculadora básica que permita realizar operaciones aritméticas simples (suma, resta, multiplicación, división).</h2>
    <form method="POST">
        <label>
            Ingrese número:
            <input type="number" step="any" name="numero1" required>
        </label>
        <br>
        <label>
            Ingrese número:
            <input type="number" step="any" name="numero2" required>
        </label>
        <br>
        <select name="opciones">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <button type="submit">=</button>
    </form>
</body>

</html>

<?php
//Variable superglobal que indica el metodo de solicitud usado para acceder
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Metodo para validar una variable externa; parametros[type,variable_name,filter]
    $numero1 = filter_input(INPUT_POST, 'numero1', FILTER_VALIDATE_FLOAT);
    $numero2 = filter_input(INPUT_POST, 'numero2', FILTER_VALIDATE_FLOAT);
    $opcion = $_POST['opciones'];

    //Verificar que el dato sea un numero
    if ($numero1 !== false && $numero2 !== false) {
        $resultado = null;
        $error = null;
        switch ($opcion) {
            case '+':
                $resultado = $numero1 + $numero2;
                break;
            case '-':
                $resultado = $numero1 - $numero2;
                break;
            case '*':
                $resultado = $numero1 * $numero2;
                break;
            case '/':
                if ($numero2 == 0) {
                    $error = "No se puede dividir entre cero";
                } else {
                    $resultado = $numero1 / $numero2;
                }
                break;
            default:
                $error = "Operación Inválida";
                break;
        }
        //Mostramos el resultado solo si no hay error.
        if ($error !== null) {
            echo $error;   
        } else {
            echo number_format($resultado, 2); // Muestra 2 decimales
        }
    } else {
        echo "¡Por favor ingresa un número válido!";
    }
}
