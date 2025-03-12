<?php
//Verificamos que el metodo de solicitud para acceser coincida
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $categorias = $_POST['categorias'];
    $imagen = $_FILES['imagen'];

    if (empty($titulo) || empty($contenido)) {
        die("El título y contenido son obligatorios");
    }

    //Guardar la imagen en una carpeta si no hay error
    $rutaImagen = '';
    if ($imagen['error'] === UPLOAD_ERR_OK) {
        //Genera un ID a la imagen, anexando el nombre real de esta
        $nombreImagen = uniqid() . '-' . $imagen['name'];
        $rutaImagen = 'assets/images' . $nombreImagen;
        move_uploaded_file($imagen['tmp_name'], $rutaImagen);
    }

    //Creacion del post
    $post = [
        'id' => uniqid(), //ID unico para cada post
        'titulo' => $titulo,
        'contenido' => $contenido,
        'categorias' => $categorias,
        'imagen' => $rutaImagen,
        'fecha' => date('Y-m-d H:i:s') //Fecha de creacion
    ];

    //Guardar el post en un archivo JSON
    //Este array actuará como contenedor temporal de todos los posts
    $posts = [];

    //file_exists() es una función de PHP que devuelve true si el archivo existe, false si no
    if (file_exists('storage/posts.json')) {
        /*Convercion de los string JSON a un array asociativo para poder agregar los demas posts.
                -file_get_contents es una funcion para leer el contenido de un archivo como string.
                -json_decode convierte el string JSON en un array, el parametro true indica que se quiere un array en lugar de un objeto*/
        $posts = json_decode(file_get_contents('storage/posts.json'), true);
    }

    //Guardar el nuevo post en el array
    $posts[] = $posts;

    /*Escribir el string JSON en el archivo posts.json
        json_encode convierte el array de PHP en un string JSON*/
    file_put_contents('storage/posts.json', json_encode($posts));

    header('Location: index.php');
    //Asegura que el código posterior a la redirección no se ejecute (evita posibles bugs).
    exit;
}
