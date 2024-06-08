<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "movies"; 

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$usuario = $_POST['username'];
$peliculas = $_POST['peliculas'];

$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$fecha = $_POST['fecha'];
$cvv = $_POST['cvv'];

// Obtener id_usuario basado en el username
$query_usuario = "SELECT id FROM users WHERE username = '$usuario' LIMIT 1";
$result_usuario = $conexion->query($query_usuario);

if ($result_usuario->num_rows > 0) {
    $id_usuario = $result_usuario->fetch_assoc()['id'];

    // Insertar datos en la base de datos
    $peliculas_array = explode(',', $peliculas);
    foreach ($peliculas_array as $pelicula) {
        $query = "INSERT INTO pago (id_usuario, pelicula,  tarjeta, fecha_transaccion) VALUES ('$id_usuario', '$pelicula', '$numero', NOW())";

        if ($conexion->query($query) !== TRUE) {
            echo "Error: " . $query . "<br>" . $conexion->error;
        }
    }

    echo "<script>alert('Transacción exitosa. Disfruta de tu película!'); window.location.href='pelis.html';</script>";
} else {
    echo "Error: Usuario no encontrado.";
}