<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Productos predefinidos
$productos = [
    ['nombre' => 'Computadora Gamer', 'precio' => 50000, 'imagen' => 'image/producto1.jpg'],
    ['nombre' => 'Monitor Gamer', 'precio' => 2000, 'imagen' => 'image/producto2.jpg'],
    ['nombre' => 'Teclado Gamer', 'precio' => 350, 'imagen' => 'image/producto3.jpg'],
    ['nombre' => 'Mouse Logitech', 'precio' => 250, 'imagen' => 'image/producto4.jpg']
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Catálogo de Productos</h1>
        <ul class="product-list">
            <?php foreach ($productos as $producto) : ?>
                <li class="product-item">
                    <img class="product-image" src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                    <p class="product-name"><?php echo $producto['nombre']; ?> - $<?php echo $producto['precio']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="dashboard.php" class="button">Ir a Dashboard</a>
        <a href="resumen.php" class="button">Ver Resumen de Compras</a>
        <a href="logout.php" class="button">Cerrar Sesión</a>
    </div>
</body>
</html>
