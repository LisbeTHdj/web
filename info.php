<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisbeth Glamour Shop - Sobre Nosotros</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Ajustar el tamaño del logo en la barra de navegación */
        .logo {
            max-width: 50px; /* Cambia el tamaño máximo del logo según tus necesidades */
        }
    
        /* Cambiar el color de fondo del encabezado a dorado */
        .hero {
            background-color: #d4af37; /* Color dorado */
        }
    
        /* Cambiar el color del botón de detalles */
        .btn-custom {
            background-color: #e67e22; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            border: none; /* Eliminar el borde del botón */
        }
    
        .btn-custom:hover {
            background-color: #d35400; /* Color de fondo del botón al pasar el cursor */
            color: white; /* Asegúrate de que el texto sea visible en el hover */
        }
    
        /* Ajustar el tamaño de las tarjetas */
        .card {
            border: 1px solid #ddd; /* Color del borde de la tarjeta */
        }
    
        /* Ajustar el tamaño de las imágenes dentro de las tarjetas */
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
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.html">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Acceso</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="info.php">Sobre Nosotros <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Sobre Nosotros</h1>
            <p class="lead">Conoce más acerca de nuestra tienda (Proyecto)</p>
        </div>
    </header>

    <!-- Information Section -->
    <section class="container my-5">
    <h2 class="text-center">Bienvenidos a Lisbeth Glamour Shop</h2>
<p class="text-center">Lisbeth Glamour Shop, creada por Lisbeth De Jesús G., es una página web diseñada para practicar y demostrar la usabilidad en un entorno web. Este sitio se ha desarrollado con el objetivo de ofrecer una experiencia de usuario fluida y eficiente,Simulando ser una tienda virtual de Cosmeticos.</p>
<p class="text-center">La interfaz está optimizada para facilitar una navegación intuitiva y cómoda. Cabe destacar que esta tienda es completamente ficticia y no tiene fines de lucro. Su propósito principal es servir como un proyecto de práctica para el desarrollo web en el marco de la materia Diseño Centrado en el Usuario.</p>
<p class="text-center">Esperamos que disfrutes de tu visita y encuentres la navegación agradable.</p>

    </section>

    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <p>&copy; Productos de Belleza 2024. Todos los derechos reservados.<br> (Esto es Un proyecto final de DCU Creado por Lisbeth De Jesus G.)</br></p>
        <p>
            <a href="privacy.html">Política de Privacidad</a> | <a href="terms.html">Términos de Servicio</a>
        </p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
