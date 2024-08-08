<?php
// Configuración de conexión a la base de datos
$host = 'localhost';
$db = 'beauty_products_db';
$user = 'root';
$pass = '12345Abc@';

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del producto desde la URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar el producto
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $product_id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si se encontró el producto
if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Producto no encontrado.";
    exit;
}

// Manejar la inserción de reseñas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $review_text = $_POST['review_text'];
        $rating = intval($_POST['rating']);

        if ($rating >= 1 && $rating <= 5) {
            $sql = "INSERT INTO reviews (user_id, product_id, review_text, rating) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('iisi', $user_id, $product_id, $review_text, $rating);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "La calificación debe estar entre 1 y 5.";
        }
    } else {
        echo "Debes iniciar sesión para dejar una reseña.";
    }
}

// Consultar las reseñas del producto
$sql = "SELECT r.review_text, r.rating, r.created_at, u.name FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.product_id = ? ORDER BY r.created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $product_id);
$stmt->execute();
$reviews_result = $stmt->get_result();

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
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
            height: 400px; /* Establece una altura fija más pequeña para la imagen */
            object-fit: contain; /* Ajusta la imagen para que se muestre completa dentro del contenedor */
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
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.html">Registro</a>
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

    <header class="text-center">
        <h1>Detalles del Producto</h1>
    </header>

    <main>
        <section class="container my-5">
            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
            <img src="imagenes/<?php echo htmlspecialchars($product['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
            <p><strong>Precio:</strong> RD$<?php echo number_format($product['price'], 2); ?></p>
            <p><strong>Categoría:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
            <a href="index.html" class="btn btn-custom">Volver a la tienda</a>
        </section>

        <!-- Reseñas del producto -->
        <section class="container my-5">
            <h3>Reseñas</h3>
            <?php if (isset($_SESSION['user_id'])): ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="review_text">Escribe tu reseña:</label>
                    <textarea id="review_text" name="review_text" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Calificación:</label>
                    <select id="rating" name="rating" class="form-control" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-custom">Enviar Reseña</button>
            </form>
            <?php else: ?>
            <p>Debes iniciar sesión para dejar una reseña.</p>
            <?php endif; ?>

            <!-- Mostrar reseñas -->
            <?php if ($reviews_result->num_rows > 0): ?>
            <ul class="list-unstyled mt-4">
                <?php while ($review = $reviews_result->fetch_assoc()): ?>
                <li class="media mb-4">
                    <img src="path/to/default-avatar.png" class="mr-3" alt="Avatar" style="width: 64px; height: 64px;">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><?php echo htmlspecialchars($review['name']); ?></h5>
                        <p><?php echo htmlspecialchars($review['review_text']); ?></p>
                        <p><strong>Calificación:</strong> <?php echo htmlspecialchars($review['rating']); ?>/5</p>
                        <p><small>Publicado el <?php echo htmlspecialchars($review['created_at']); ?></small></p>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else: ?>
            <p>No hay reseñas para este producto.</p>
            <?php endif; ?>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-light py-3">
        <div class="container text-center">
            <p>&copy; 2024 Tu Tienda de Belleza. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
