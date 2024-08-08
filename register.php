<?php
// register.php

// Configura tu conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tu_base_de_datos";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtén los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$profile_picture = $_FILES['profile_picture']['name'];

// Opcional: Guarda la foto de perfil en el servidor
if (!empty($profile_picture)) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profile_picture);
    move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
}

// Inserta los datos en la base de datos
$sql = "INSERT INTO users (name, email, password, profile_picture) VALUES ('$name', '$email', '$password', '$profile_picture')";

if ($conn->query($sql) === TRUE) {
    // Redirige con un mensaje de éxito
    header("Location: register.html?success=1");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
