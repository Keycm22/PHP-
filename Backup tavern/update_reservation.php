<?php
session_start();
require_once 'db_connect.php'; // Include your database connection

header('Content-Type: application/json');

// Check if the user is logged in AND is an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['username'] !== 'admin') {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit;
}

$response = ['success' => false, 'message' => 'Invalid request.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $reservation_id = filter_var($_POST['reservation_id'] ?? '', FILTER_SANITIZE_NUMBER_INT);

    if (empty($reservation_id)) {
        echo json_encode(['success' => false, 'message' => 'Reservation ID is missing.']);
        exit;
    }

    if ($action === 'update') {
        // Sanitize and validate inputs
        $res_name = filter_var(trim($_POST['res_name'] ?? ''), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $res_email = filter_var(trim($_POST['res_email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $res_phone = filter_var(trim($_POST['res_phone'] ?? ''), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $res_date = filter_var(trim($_POST['res_date'] ?? ''), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $res_time = filter_var(trim($_POST['res_time'] ?? ''), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $num_guests = filter_var(trim($_POST['num_guests'] ?? ''), FILTER_SANITIZE_NUMBER_INT);
        $status = filter_var(trim($_POST['status'] ?? ''), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Basic validation
        if (empty($res_name) || empty($res_email) || empty($res_date) || empty($res_time) || empty($num_guests) || empty($status)) {
            echo json_encode(['success' => false, 'message' => 'All required fields must be filled for update.']);
            exit;
        }
        if (!filter_var($res_email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
            exit;
        }

        // Prepare an update statement
        $sql = "UPDATE reservations SET res_name=?, res_email=?, res_phone=?, res_date=?, res_time=?, num_guests=?, status=? WHERE reservation_id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssisi", $res_name, $res_email, $res_phone, $res_date, $res_time, $num_guests, $status, $reservation_id);

            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    $response = ['success' => true, 'message' => 'Reservation updated successfully.'];
                } else {
                    $response = ['success' => false, 'message' => 'No changes made or reservation not found.'];
                }
            } else {
                $response = ['success' => false, 'message' => 'Error executing update: ' . mysqli_error($link)];
                error_log("Error updating reservation: " . mysqli_error($link));
            }
            mysqli_stmt_close($stmt);
        } else {
            $response = ['success' => false, 'message' => 'Error preparing update statement: ' . mysqli_error($link)];
            error_log("Error preparing update statement: " . mysqli_error($link));
        }

    } elseif ($action === 'delete') {
        // Prepare a delete statement
        $sql = "DELETE FROM reservations WHERE reservation_id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $reservation_id);

            if (mysqli_stmt_execute($stmt)) {
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                    $response = ['success' => true, 'message' => 'Reservation deleted successfully.'];
                } else {
                    $response = ['success' => false, 'message' => 'Reservation not found or already deleted.'];
                }
            } else {
                $response = ['success' => false, 'message' => 'Error executing delete: ' . mysqli_error($link)];
                error_log("Error deleting reservation: " . mysqli_error($link));
            }
            mysqli_stmt_close($stmt);
        } else {
            $response = ['success' => false, 'message' => 'Error preparing delete statement: ' . mysqli_error($link)];
            error_log("Error preparing delete statement: " . mysqli_error($link));
        }
    }
}

mysqli_close($link);
echo json_encode($response);
?>