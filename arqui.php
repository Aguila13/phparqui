<?php
$serverName = "<your_server_name>.database.windows.net"; // Reemplaza con tu nombre de servidor
$connectionOptions = array(
    "Database" => "<your_database_name>", // Reemplaza con el nombre de tu base de datos
    "Uid" => "<your_username>", // Reemplaza con tu nombre de usuario
    "PWD" => "<your_password>" // Reemplaza con tu contraseña
);

// Intenta conectar
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Prepara la consulta SQL
    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)";
    $params = array($nombre, $correo, $contrasena);
    
    // Ejecuta la consulta
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Registro exitoso";
}

sqlsrv_close($conn);
?>
