<?php
session_start(); // Start the session at the very beginning
require_once 'db_connect.php'; // Include your database connection

// Check if the user is logged in AND is an admin
// For a real system, you'd have a 'role' column in your users table (e.g., 'admin', 'user')
// For now, we'll use a simple check for username 'admin' as set up in login.php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['is_admin'] !== true) {
    header('Location: login.php'); // Redirect to login page if not logged in or not admin
    exit;
}

// Fetch reservations from the database
$reservations = [];
$sql = "SELECT reservation_id, user_id, res_date, res_time, num_guests, res_name, res_phone, res_email, status, created_at FROM reservations ORDER BY created_at DESC";

if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $reservations[] = $row;
    }
    mysqli_free_result($result);
} else {
    error_log("Admin page database error: " . mysqli_error($link));
    // Optionally, display an error message on the page
}

// Fetch counts for dashboard summary boxes
$totalReservations = count($reservations);
$pendingReservations = count(array_filter($reservations, function($r) { return $r['status'] === 'Pending'; }));
$confirmedReservations = count(array_filter($reservations, function($r) { return $r['status'] === 'Confirmed'; }));
$cancelledReservations = count(array_filter($reservations, function($r) { return $r['status'] === 'Cancelled'; }));


mysqli_close($link); // Close the connection after fetching data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico - Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <div class="page-wrapper">

        <aside class="admin-sidebar">
            <div class="sidebar-header">
                <img src="Tavern.png" alt="Home Icon" class="home-icon">
            </div>
            <nav>
                <ul class="sidebar-menu">
                    <li class="menu-item active">
                        <a href="#"><i class="material-icons">dashboard</i> Dashboard</a>
                    </li>
                    <li class="menu-item">
                        <a href="calendar.php"><i class="material-icons">calendar_today</i> Calendar Management</a>
                    </li>
                    <li class="menu-item">
                        <a href="reservation.php"><i class="material-icons">event_note</i> Reservation</a>
                    </li>
                </ul>
                <div class="user-management-title">User Management</div>
                <ul class="sidebar-menu user-management-menu">
                    <li class="menu-item">
                        <a href="#"><i class="material-icons">people</i> Notification Control</a>
                    </li>
                    <li class="menu-item">
                        <a href="#"><i class="material-icons">security</i> Table Management</a>
                    </li>
                    <li class="menu-item">
                        <a href="#"><i class="material-icons">settings</i> Customer Database</a>
                    </li>
                    <li class="menu-item">
                        <a href="#"><i class="material-icons">settings</i>Reservation Reports</a>
                    </li>
                    <li class="menu-item">
                        <a href="logout.php"><i class="material-icons">logout</i> Log out</a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div class="admin-content-area">
            <header class="main-header">
                <div class="header-content">
                    <div class="admin-header-right">
                        <img src="images/PEOPLE.jpg" alt="User Avatar" style="width: 40px; height: 40px; border-radius: 50%;">
                        <span>Vincent Paul</span>
                        <span class="admin-role">Admin</span>
                    </div>
                </div>
            </header>

            <main class="dashboard-main-content">
                <h1 class="dashboard-heading">Reservation Dashboard</h1>

                <section class="dashboard-summary">
                    <div class="summary-box total">
                        <h3>Total reservations</h3>
                        <p><?php echo $totalReservations; ?></p>
                        <div class="box-icon">📊</div>
                    </div>
                    <div class="summary-box pending">
                        <h3>Pending</h3>
                        <p><?php echo $pendingReservations; ?></p>
                        <div class="box-icon">🕒</div>
                    </div>
                    <div class="summary-box confirmed">
                        <h3>Confirmed</h3>
                        <p><?php echo $confirmedReservations; ?></p>
                        <div class="box-icon">✅</div>
                    </div>
                    <div class="summary-box cancelled">
                        <h3>Cancelled</h3>
                        <p><?php echo $cancelledReservations; ?></p>
                        <div class="box-icon">❌</div>
                    </div>
                </section>

                <section class="dashboard-stats-and-calendar">
                    <div class="dashboard-stats">
                        <div class="stat-box">
                            <h3>Total customer a weeks</h3>
                            <p>276</p> <div class="box-icon">📈</div>
                        </div>
                        <div class="stat-box">
                            <h3>Total customer a months</h3>
                            <p>276</p> <div class="box-icon">📈</div>
                        </div>
                    </div>
                    <div class="calendar-box">
                        <h3>Calendar</h3>
                        <div id="calendar">
                            <p style="text-align: center; font-size: 0.9em;">(Calendar widget goes here)</p>
                        </div>
                    </div>
                </section>

                <section class="recent-reservations-section">
                    <h2>Recent reservations <input type="text" id="reservationSearchTop" class="search-input-top" placeholder="Search"></h2>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>CUSTOMER</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>STATUS</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($reservations)): ?>
                                    <tr><td colspan="6">No reservations found.</td></tr>
                                <?php else: ?>
                                    <?php foreach ($reservations as $reservation): ?>
                                        <?php
                                            $statusClass = strtolower($reservation['status']);
                                            // Prepare data for the 'View' modal. Remove sensitive info like user_id if not needed for display.
                                            $displayData = [
                                                'Reservation ID' => $reservation['reservation_id'],
                                                'User ID' => $reservation['user_id'] ?? 'N/A', // Display N/A if no user_id
                                                'Date' => $reservation['res_date'],
                                                'Time' => $reservation['res_time'],
                                                'Number of Guests' => $reservation['num_guests'],
                                                'Name' => $reservation['res_name'],
                                                'Phone' => $reservation['res_phone'],
                                                'Email' => $reservation['res_email'],
                                                'Status' => $reservation['status'],
                                                'Booked At' => $reservation['created_at']
                                            ];
                                            $fullReservationJson = htmlspecialchars(json_encode($displayData), ENT_QUOTES, 'UTF-8');
                                        ?>
                                        <tr data-reservation-id="<?php echo $reservation['reservation_id']; ?>" data-full-reservation='<?php echo $fullReservationJson; ?>'>
                                            <td>
                                                <div class="customer-info">
                                                    <img src="images/default_avatar.png" alt="Customer Avatar" class="customer-avatar">
                                                    <div>
                                                        <strong><?php echo htmlspecialchars($reservation['res_name']); ?></strong><br>
                                                        <small><?php echo htmlspecialchars($reservation['res_email']); ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo htmlspecialchars($reservation['res_date']); ?></td>
                                            <td><?php echo htmlspecialchars($reservation['res_time']); ?></td>
                                            <td><span class="status-badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($reservation['status']); ?></span></td>
                                            <td class="actions">
                                                <button class="btn btn-small view-btn">View</button>
                                                </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>

            <div id="reservationModal" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <h2>Reservation Details</h2>
                    <div id="modalDetails">
                        </div>
                    <div class="modal-actions">
                        <button class="btn btn-small modal-confirm-btn" data-status="Confirmed">Confirm</button>
                        <button class="btn btn-small modal-decline-btn" data-status="Declined">Decline</button>
                        <button class="btn btn-small modal-delete-btn">Delete</button>
                    </div>
                </div>
            </div>

        </div> </div> <script src="admin.js"></script>
</body>
</html>