<?php
// Incluir la conexión a la base de datos
include 'admin/conexion.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    // Validar que los campos obligatorios no estén vacíos
    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        // Preparar la consulta SQL
        $sql = "INSERT INTO mensajes (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)";

        // Preparar la declaración
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Vincular parámetros ("ssss" indica 4 strings)
            mysqli_stmt_bind_param($stmt, "ssss", $nombre, $email, $telefono, $mensaje);

            // Ejecutar la declaración
            if (mysqli_stmt_execute($stmt)) {
                echo "Mensaje guardado exitosamente.";
            } else {
                echo "Error al guardar el mensaje: " . mysqli_error($conn);
            }

            // Cerrar la declaración
            mysqli_stmt_close($stmt);
        } else {
            echo "Error en la preparación de la consulta: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor complete los campos obligatorios.";
    }

    // Cerrar la conexión
    mysqli_close($conn);
}
?>
