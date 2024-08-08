<?php

// Información de conexión a la base de datos
$host = "localhost";        
$dbname = "beauty_products_db"; 
$username = "root";          
$password = "12345Abc@";             

// Crear una conexión a la base de datos
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>