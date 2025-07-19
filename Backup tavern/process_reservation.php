<?php
session_start(); // Start session to get user_id if logged in
require_once 'db_connect.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $resDate = htmlspecialchars(trim($_POST['resDate'] ?? ''));
    $resTime = htmlspecialchars(trim($_POST['resTime'] ?? ''));
    $numGuests = htmlspecialchars(trim($_POST['numGuests'] ?? ''));
    $resName = htmlspecialchars(trim($_POST['resName'] ?? ''));
    $resPhone = htmlspecialchars(trim($_POST['resPhone'] ?? ''));
    $resEmail = htmlspecialchars(trim($_POST['resEmail'] ?? ''));
    $status = "Pending"; // Default status for new reservations

    // Optional: Get user_id if a user is logged in
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Basic validation (you can add more robust validation if needed)
    if (empty($resDate) || empty($resTime) || empty($numGuests) || empty($resName) || empty($resPhone) || empty($resEmail)) {
        header('Location: reserve.php?status=error&message=Missing required fields.');
        exit;
    }

    // Prepare an insert statement
    // Note: user_id can be NULL, so we handle it with a ternary operator and 'i' or 's' for bind_param
    $sql = "INSERT INTO reservations (user_id, res_date, res_time, num_guests, res_name, res_phone, res_email, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        if ($user_id === null) {
            // If no user is logged in, bind null for user_id
            mysqli_stmt_bind_param($stmt, "sssissis", $null_user_id, $param_resDate, $param_resTime, $param_numGuests, $param_resName, $param_resPhone, $param_resEmail, $param_status);
            $null_user_id = null; // Explicitly set null for binding
        } else {
            // If user is logged in, bind the user_id
            mysqli_stmt_bind_param($stmt, "isssisss", $param_user_id, $param_resDate, $param_resTime, $param_numGuests, $param_resName, $param_resPhone, $param_resEmail, $param_status);
            $param_user_id = $user_id;
        }

        $param_resDate = $resDate;
        $param_resTime = $resTime;
        $param_numGuests = $numGuests;
        $param_resName = $resName;
        $param_resPhone = $resPhone;
        $param_resEmail = $resEmail;
        $param_status = $status; // 'Pending'

        if (mysqli_stmt_execute($stmt)) {
            // Reservation successfully saved to database
            header('Location: reserve.php?status=success');
            exit;
        } else {
            // Error inserting into database
            error_log("Reservation insert error: " . mysqli_stmt_error($stmt)); // Log the actual error
            header('Location: reserve.php?status=error&message=Database insert failed.');
            exit;
        }

        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the statement
        error_log("Reservation prepare error: " . mysqli_error($link)); // Log the actual error
        header('Location: reserve.php?status=error&message=Database preparation failed.');
        exit;
    }

    // Close database connection
    mysqli_close($link);

} else {
    // If accessed directly without POST method
    header('Location: reserve.php');
    exit;
}
?>