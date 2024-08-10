<?php
session_start(); // Asegúrate de iniciar la sesión

include 'includes/db_connect.php';
include 'includes/funciones.php';

// Asegurar que el usuario esté autenticado y tenga una sesión válida
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$employee_id = $_SESSION['user']['id'] ?? null;
if ($employee_id === null) {
    header('Location: login.php');
    exit;
}

// Función para asignar puntos a un usuario
function assignPoints($conn, $userId, $points, $month) {
    $sql = "INSERT INTO historial_puntos (usuario_id, puntos, mes) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iii", $userId, $points, $month);
        return $stmt->execute();
    } else {
        error_log('Error al preparar la consulta: ' . $conn->error);
        return false;
    }
}

// Función para autorizar un canje
function authorizeRedemption($conn, $redemptionId, $status, $comments) {
    $sql = "UPDATE historial_canje SET estado = ?, comentarios = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssi", $status, $comments, $redemptionId);
        return $stmt->execute();
    } else {
        error_log('Error al preparar la consulta: ' . $conn->error);
        return false;
    }
}

// Función para autorizar canjes de manera masiva
function authorizeMassive($conn, $redemptionIds, $status, $comments, $payrollMonth) {
    $placeholders = implode(',', array_fill(0, count($redemptionIds), '?'));
    $sql = "UPDATE historial_canje SET estado = ?, comentarios = ?, mes_nomina = ? WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $types = str_repeat('s', count($redemptionIds)) . 'sss';
        $params = array_merge([$status, $comments, $payrollMonth], $redemptionIds);
        $stmt->bind_param($types, ...$params);
        return $stmt->execute();
    } else {
        error_log('Error al preparar la consulta: ' . $conn->error);
        return false;
    }
}

// Función para rechazar canjes de manera masiva
function rejectMassive($conn, $redemptionIds, $status, $comments) {
    $placeholders = implode(',', array_fill(0, count($redemptionIds), '?'));
    $sql = "UPDATE historial_canje SET estado = ?, comentarios = ? WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $types = str_repeat('s', count($redemptionIds)) . 'ss';
        $params = array_merge([$status, $comments], $redemptionIds);
        $stmt->bind_param($types, ...$params);
        return $stmt->execute();
    } else {
        error_log('Error al preparar la consulta: ' . $conn->error);
        return false;
    }
}

// Función para crear un beneficio
function createBenefit($conn, $name, $rules, $targetGroups, $modules, $roles, $activationDate, $deactivationDate, $image, $termsAndConditions) {
    $sql = "INSERT INTO beneficios (nombre, reglas, grupos_objetivo, modulos, roles, fecha_activacion, fecha_desactivacion, imagen, terminos_condiciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssssssss", $name, $rules, $targetGroups, $modules, $roles, $activationDate, $deactivationDate, $image, $termsAndConditions);
        return $stmt->execute();
    } else {
        error_log('Error al preparar la consulta: ' . $conn->error);
        return false;
    }
}

// Declarar las variables de las funciones
try {
    $total_puntos = getEmployeePoints($conn, $employee_id);
    $redeemed_points = getRedeemedPoints($conn, $employee_id);
    $expiring_points = getExpiringPoints($conn, $employee_id);
    $benefits = getBenefits($conn);
    $help_message = getHelp();
    $redemption_methods = getRedemptionMethods();
} catch (Exception $e) {
    error_log($e->getMessage());
    echo "Error al obtener los datos. Por favor, inténtalo de nuevo más tarde.";
    exit;
}
?>
