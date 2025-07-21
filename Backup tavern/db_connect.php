<?php

// Database connection parameters for XAMPP (MySQL)
define('DB_SERVER', getenv('DB_HOST') ?? 'localhost');
define('DB_USERNAME', getenv('DB_USER') ?? 'root'); // Default XAMPP username
define('DB_PASSWORD', getenv('DB_PASSWORD') ?? '');     // Default XAMPP password (often empty)
define('DB_NAME', getenv('DB_NAME') ?? 'tavern_publico'); // The database name you created

// Attempt to connect to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Set the charset to utf8mb4 for proper emoji and special character handling
mysqli_set_charset($link, "utf8mb4");

?>