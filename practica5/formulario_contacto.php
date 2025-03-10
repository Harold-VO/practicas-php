<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación y Archivos</title>
</head>
<body>
    <h2>Crear un formulario de contacto que guarde la información en un archivo .txt o .csv.</h2>
    <form action="procesar_contacto.php" method="POST" enctype="multipart/form-data">
        <label>
            Nombre:
            <input type="text" name="nombre" required>
        </label> <br>
        <label>
            Email:
            <input type="email" name="email" required>
        </label> <br>
        <label>
            Mensaje:
            <br>
            <textarea name="mensaje"></textarea>
        </label> <br>
        <label>
            Archivo:
            <input type="file" name="archivo">
        </label> <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>