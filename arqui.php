<?php
$serverName = "dbarqui.database.windows.net"; 
$connectionOptions = array(
    "Database" => "dbarqui", 
    "Uid" => "serversqlarqui", 
    "PWD" => "Serversql1" 
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
