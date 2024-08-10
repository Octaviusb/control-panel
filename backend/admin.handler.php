<?php

include_once '/includes/db_connect.php';
include_once '/includes/funciones.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica si el usuario está logueado y tiene rol de admin
if (!isset($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user']['correo'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lógica para asignar puntos, autorizar canjes, etc.
    if (isset($_POST['assign_points'])) {
        $userId = $_POST['user_id'];
        $points = $_POST['points'];
        $month = $_POST['month'];
        if (assignPoints($conn, $userId, $points, $month)) {
            $successMessage = "Puntos asignados correctamente.";
        } else {
            $errorMessage = "Error al asignar puntos: " . $conn->error;
        }
    }

    if (isset($_POST['authorize_redemption'])) {
        $redemptionId = $_POST['redemption_id'];
        $status = $_POST['status'];
        $comments = $_POST['comments'];
        if (authorizeRedemption($conn, $redemptionId, $status, $comments)) {
            $successMessage = "Canje autorizado correctamente.";
        } else {
            $errorMessage = "Error al autorizar el canje: " . $conn->error;
        }
    }

    if (isset($_POST['authorize_massive'])) {
        $redemptionIds = $_POST['redemption_ids'];
        $status = $_POST['status'];
        $comments = $_POST['comments'];
        $payrollMonth = $_POST['payroll_month'];
        if (authorizeMassive($conn, $redemptionIds, $status, $comments, $payrollMonth)) {
            $successMessage = "Autorizaciones masivas realizadas correctamente.";
        } else {
            $errorMessage = "Error al realizar autorizaciones masivas: " . $conn->error;
        }
    }

    if (isset($_POST['reject_massive'])) {
        $redemptionIds = $_POST['redemption_ids'];
        $status = $_POST['status'];
        $comments = $_POST['comments'];
        if (rejectMassive($conn, $redemptionIds, $status, $comments)) {
            $successMessage = "Rechazos masivos realizados correctamente.";
        } else {
            $errorMessage = "Error al realizar rechazos masivos: " . $conn->error;
        }
    }

    if (isset($_POST['create_benefit'])) {
        $name = $_POST['name'];
        $rules = $_POST['rules'];
        $targetGroups = $_POST['target_groups'];
        $modules = $_POST['modules'];
        $roles = $_POST['roles'];
        $activationDate = $_POST['activation_date'];
        $deactivationDate = $_POST['deactivation_date'];
        $image = $_FILES['image'];
        $termsAndConditions = $_POST['terms_and_conditions'];
        if (createBenefit($conn, $name, $rules, $targetGroups, $modules, $roles, $activationDate, $deactivationDate, $image, $termsAndConditions)) {
            $successMessage = "Beneficio creado correctamente.";
        } else {
            $errorMessage = "Error al crear el beneficio: " . $conn->error;
        }
    }
}
?>