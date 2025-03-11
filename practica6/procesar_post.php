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
        $post = [];
        
    }