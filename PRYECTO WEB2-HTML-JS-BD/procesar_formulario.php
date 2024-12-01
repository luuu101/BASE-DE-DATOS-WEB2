<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Cambiar si configuraste una contraseña para MySQL
$dbname = "muebleria";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar los datos enviados por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $consulta = $conn->real_escape_string($_POST['consulta']);

    // Insertar los datos en la tabla `contactos`
    $sql = "INSERT INTO contactos (nombre, email, telefono, consulta) VALUES ('$nombre', '$email', '$telefono', '$consulta')";

    if ($conn->query($sql) === TRUE) {
        echo "Consulta enviada correctamente.";
        echo "<a href='contactos.html'>Volver</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
