<?php
require_once './conexion.php';

if (isset($_POST)) {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    $encoded_password = password_hash($password, PASSWORD_BCRYPT);
    try {
        $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES(:nombre, :correo, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":correo", $correo);
        $stmt->bindParam(":password", $encoded_password);
        if ($stmt->execute()) {
            echo json_encode(["status" => 201, "title" => "Created", "message" => "El usuario $nombre fue creado."]);
        } else {
            echo json_encode(["status" => 400, "title" => "Bad Request", "message" => "Error en la solicitud."]);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit();
    }
}
