<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movies";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener todas las películas alquiladas
$sql = "SELECT * FROM alquileres";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Listado de Películas Alquiladas</h1>";
    echo "<table border='1'>
    <tr>
    <th>Película</th>
    <th>Cliente</th>
    <th>Fecha de Alquiler</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["pelicula"]."</td>
        <td>".$row["cliente"]."</td>
        <td>".$row["fecha_alquiler"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}
$conn->close();
?>
