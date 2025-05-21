<?php
session_start();

if (!isset($_SESSION['id_cliente'])) {
    header("Location: ../views/login.php");
    exit();
}

require_once "conexionLocal.php";

$id_cliente = $_SESSION['id_cliente'];
$peso = $_POST['peso'] ?? null;
$altura = $_POST['altura'] ?? null;
$edad = $_POST['edad'] ?? null;
$sexo = $_POST['sexo'] ?? null;
$actividad = $_POST['actividad'] ?? null;

if ($peso && $altura && $edad && $sexo && $actividad) {
    $stmt = $conexion->prepare("SELECT id_cliente FROM datos_cliente WHERE id_cliente = ?");
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $update = $conexion->prepare("UPDATE datos_cliente SET peso = ?, altura = ?, edad = ?, sexo = ?, actividad = ? WHERE id_cliente = ?");
        $update->bind_param("diissi", $peso, $altura, $edad, $sexo, $actividad, $id_cliente);
        $update->execute();
        $update->close();
    } else {
        $insert = $conexion->prepare("INSERT INTO datos_cliente (id_cliente, peso, altura, edad, sexo, actividad) VALUES (?, ?, ?, ?, ?, ?)");
        $insert->bind_param("idiiss", $id_cliente, $peso, $altura, $edad, $sexo, $actividad);
        $insert->execute();
        $insert->close();
    }

    $stmt->close();
    $conexion->close();
    header("Location: ../views/perfil.php?mensaje=datos_actualizados");
    exit();
} else {
    header("Location: ../views/datosCliente.php?error=faltan_datos");
    exit();
}
