<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Simular productos seleccionados
$productosSeleccionados = [
    ['nombre' => 'Computadora Gamer', 'precio' => 50000, 'cantidad' => 2],
    ['nombre' => 'Teclado Gamer', 'precio' => 2000, 'cantidad' => 1]
];

// Calcular subtotal y total
$subtotal = 0;
foreach ($productosSeleccionados as $producto) {
    $subtotal += $producto['precio'] * $producto['cantidad'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Compras</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Resumen de Compras</h1>
        <ul>
            <?php foreach ($productosSeleccionados as $producto) : ?>
                <li class="product-item">
                    <?php echo $producto['nombre']; ?> - $<?php echo $producto['precio']; ?> x <?php echo $producto['cantidad']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <p class="total"><strong>Total: $<?php echo $subtotal; ?></strong></p>
        <a href="dashboard.php" class="button">Ir a Dashboard</a>
        <a href="productos.php" class="button">Volver al Catálogo</a>
        <a href="logout.php" class="button">Cerrar Sesión</a>
    </div>
</body>
</html>
