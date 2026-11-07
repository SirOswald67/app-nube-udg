<?php
include 'conexion.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM registros WHERE id = :id");
$stmt->execute(['id' => $id]);
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$registro) {
    die("Registro no encontrado.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="h4 mb-4">Detalle del Registro #<?php echo $registro['id']; ?></h1>
                <p><strong>Nombre:</strong> <br><?php echo htmlspecialchars($registro['nombre']); ?></p>
                <p><strong>Descripción:</strong> <br><?php echo htmlspecialchars($registro['descripcion']); ?></p>
                <p class="text-muted small"><strong>Fecha de creación:</strong> <?php echo $registro['created_at']; ?></p>
                
                <a href="index.php" class="btn btn-primary mt-3">Volver al inicio</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>