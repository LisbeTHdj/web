<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

// Obtiene la información del usuario desde la sesión
$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$profile_picture = $_SESSION['profile_picture'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Lisbeth Glamour Shop</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
         .logo {
            max-width: 50px; /* Cambia el tamaño máximo del logo según tus necesidades */
        }
    
        body {
            background-color: #f8f9fa;
        }
        .profile-container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
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
                <li class="nav-item active">
                    <a class="nav-link" href="profile.php">Perfil <span class="sr-only">(current)</span></a>
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

    <!-- Profile Section -->
    <div class="profile-container">
        <h1 class="text-center">Perfil del Usuario</h1>
        <div class="text-center mb-4">
            <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" class="profile-picture">
        </div>
        <dl class="row">
            <dt class="col-sm-3">ID de Usuario</dt>
            <dd class="col-sm-9"><?php echo htmlspecialchars($user_id); ?></dd>

            <dt class="col-sm-3">Nombre</dt>
            <dd class="col-sm-9"><?php echo htmlspecialchars($name); ?></dd>

            <dt class="col-sm-3">Correo Electrónico</dt>
            <dd class="col-sm-9"><?php echo htmlspecialchars($email); ?></dd>
        </dl>
        <a href="logout.php" class="btn btn-danger btn-block">Cerrar Sesión</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
