<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345Abc@";
$dbname = "beauty_products_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar productos
$sql = "SELECT id, name, price, image_url FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisbeth Glamour Shop - Productos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .logo {
            max-width: 50px; /* Cambia el tamaño máximo del logo según tus necesidades */
        }
        .hero {
            background-color: #d4af37; /* Color dorado */
        }
        .btn-custom {
            background-color: #e67e22; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            border: none; /* Eliminar el borde del botón */
        }
        .btn-custom:hover {
            background-color: #d35400; /* Color de fondo del botón al pasar el cursor */
            color: white; /* Asegúrate de que el texto sea visible en el hover */
        }
        .card {
            border: 1px solid #ddd; /* Color del borde de la tarjeta */
        }
        .card-img-top {
            width: 100%; /* Asegura que la imagen cubra todo el ancho del contenedor */
            height: 400px; /* Establece una altura fija para todas las imágenes */
            object-fit: cover; /* Ajusta la imagen para cubrir el contenedor sin distorsión */
        }
    </style>
    <link rel="icon" type="image/png" href="../imagenes/Logo_salon_lis.png">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">
            <img src="../imagenes/Logo_salon_lis.png" alt="Logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Inicio</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="products.php">Productos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.html">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Acceso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="info.php">Sobre Nosotros</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Products Section -->
    <section class="container my-5">
        <h2 class="text-center">Productos</h2>
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="imagenes/<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['name']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                                <p class="card-text">RD$<?php echo number_format($row['price'], 2); ?></p>
                                <a href="product_details.php?id=<?php echo $row['id']; ?>" class="btn btn-custom">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No se encontraron productos.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>
