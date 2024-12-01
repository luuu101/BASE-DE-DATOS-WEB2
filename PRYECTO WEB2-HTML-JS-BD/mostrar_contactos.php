<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "muebleria";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar datos de la tabla `contactos`
$sql = "SELECT id, nombre, email, telefono, consulta, fecha FROM contactos ORDER BY fecha DESC";
$result = $conn->query($sql);

echo "<h1>Registros de Contactos</h1>";
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Consulta</th><th>Fecha</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['email']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['consulta']}</td>
                <td>{$row['fecha']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros.";
}

$conn->close();
?>
