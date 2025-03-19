<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Post</title>
</head>
<body>
    <h1>Crea un nuevo post</h1>
    <form action="procesar_post.php" method="POST" enctype="multipart/form-data">
        <label>
            Título:
            <input type="text" name="titulo" required>
        </label>
        <br>
        <label>
            Contenido:
            <br>
            <textarea name="contenido" required></textarea>
        </label>
        <br>
        <label>
            Categorías:
            <br>
            <input type="checkbox" name="categorias[]" value="PHP"> PHP
            <input type="checkbox" name="categorias[]" value="Web"> Web
            <input type="checkbox" name="categorias[]" value="Tutoriales"> Tutoriales
        </label>
        <br>
        <label>
            Imagen
            <input type="file" name="imagen">
        </label>
        <br>
        <button type="submit">Publicar</button>
    </form>
</body>
</html>