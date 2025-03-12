<?php
//Cargar posts desde JSON
function cargarPosts(){
    //Si el archivo existe, se lee su contenido strin JSON y se obtiene como un array php
    $posts = [];
    if (file_exists('storage/posts.json')) {
        $posts = json_decode(file_get_contents('storage/posts.json'),true);
    }

    /*Ordenar los posts por fecha.
        -usort() ordena un array usando una funcion de comparacion.
        -function($a,$b) compara dos elementos del array*/
    usort($posts, function ($a, $b){
        /*-strtotime convierte la fecha en un timestamp unix
            -la funcion de comparacion debe devolver:
                numero positivo: si $b debe ir antes que $a
                cero: si son iguales
                numero negativo: si $a debe ir antes que $b*/
        return strtotime($b['fecha']) - strtotime($a['fecha']);
    });

    return $posts;
}

//Filtrar posts por categoria
$categoriaSeleccionada = $_GET['categoria'] ?? '';
$posts = cargarPosts();
if (!empty($categoriaSeleccionada)) {
    $posts = array_filter($posts, function ($post) use ($categoriaSeleccionada) {
        return in_array($categoriaSeleccionada, $post['categorias']);
    });
}