<?php require_once 'cargar_posts.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h1>Blog Dinámico</h1>
    <a href="crear_post.php">Crear Nuevo Post</a>

    <?php if (empty($posts)): ?>
        <p>No hay posts disponibles.</p>
    <?php else: ?>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h2><?= htmlspecialchars($post['titulo']) ?></h2> <!--htmlspecialchars muestra texto, no codigo-->
                <p><?= nl2br(htmlspecialchars($post['contenido'])) ?></p> <!--nl2br() convierte saltos de linea en etiquetas <br>-->
                <?php if (!empty($post['imagen'])): ?>
                    <img src="<?= htmlspecialchars($post['imagen']) ?>" alt="Imagen destacada" width="200">
                <?php endif; ?>
                <p><strong>Categorías:</strong> <?= htmlspecialchars(implode(', ', $post['categorias'])) ?></p>
                <p><small>Publicado el <?= htmlspecialchars($post['fecha']) ?></small></p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>