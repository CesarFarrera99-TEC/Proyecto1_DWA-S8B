<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
         <div class="links">
            <a href="resumen.php" class="button">Ver Resumen de Compras</a>
            <a href="productos.php" class="button">Ir a Productos</a>
            <a href="logout.php" class="button">Cerrar Sesión</a>
        </div>
        <h1>Bienvenido, <?php echo $username; ?>!</h1>
        <?php if ($username === 'administrador') : ?>
            <h2>Gráfica de Ventas</h2>
            <canvas id="salesChart"></canvas>
            <script>
                var ctx = document.getElementById('salesChart').getContext('2d');
                var salesChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
                        datasets: [{
                            label: 'Ventas',
                            data: [50, 75, 100, 125],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true // Mantiene la relación de aspecto
                    }
                });
            </script>
        <?php endif; ?>
    </div>
</body>
</html>
