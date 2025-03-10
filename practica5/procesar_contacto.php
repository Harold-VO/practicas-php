<?php
//Verificar que el metodo de solicitud usado para acceder coincida
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    //Metodo que filtra una variable en especifico; ['variable',tipo filtro]
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $mensaje = $_POST['mensaje'];
    $nombre_archivo = $_FILES['archivo']['name']; //En vez de guardar todo el array $_FILES, tomamos solo el nombre del archivo.

    //Validaciones
    $errores = [];
    if (empty($nombre)) $errores[] = "Nombre Requerido";
    if (!$email) $errores[] = "Email inválido";

    if (empty($errores) && !empty($_FILES['archivo']['tmp_name'])) {
        //Se guardan los datos en un array para poder almacenar todos los string
        $datos = [$nombre, $email, $mensaje, $nombre_archivo];
        //Mover los archivos de la ruta temporal a una especifica
        move_uploaded_file($_FILES['archivo']['tmp_name'], "archivos/" . $_FILES['archivo']['name']);

        //Abrir un archivo en modo APPEND (sólo escritura; ubica el apuntador de archivo al final del mismo. Si el archivo no existe, intenta crearlo.)
        $archivo_registro = fopen("contactos.csv", 'a');
        fputcsv($archivo_registro, $datos); //Da formato CSV a una linea
        fclose($archivo_registro);

        echo "Datos guardados correctamente.";
        echo "<br>";

        // Leer el archivo línea por línea
        $historial = file('contactos.csv');
        foreach ($historial as $linea) {
            echo $linea;
            echo "<br>";
        }
    } else {
        foreach ($errores as $error) {
            echo $error;
        }
    }
}
