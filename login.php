<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "12345Abc@";
    $dbname = "beauty_products_db";

    // Crear una conexión con la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar y ejecutar la consulta SQL
    $sql = "SELECT id, name, email, profile_picture, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($password, $user['password'])) {
            // Guardar datos del usuario en la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['profile_picture'] = $user['profile_picture'];

            // Redirigir al perfil del usuario
            header('Location: profile.php');
            exit();
        } else {
            $error = 'Correo electrónico o contraseña incorrectos.';
        }
    } else {
        $error = 'Correo electrónico o contraseña incorrectos.';
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
}
?>
