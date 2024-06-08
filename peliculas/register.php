<?php
// Conectar a la base de datos
$servername = "localhost";
$dbname = "movies";
$dbusername = "root";
$dbpassword = "";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_user = $_POST['username'];
    $new_pass = $_POST['password'];


    $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);

   
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $new_user, $hashed_pass);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";

        header("Location: register.html");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
