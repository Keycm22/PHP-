<?php
session_start();
require_once 'db_connect.php'; // Include your database connection

// Check if the user is logged in AND is an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['username'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Fetch all reservations from the database
$allReservations = [];
$sql = "SELECT reservation_id, user_id, res_date, res_time, num_guests, res_name, res_phone, res_email, status, created_at FROM reservations ORDER BY created_at DESC";

if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $allReservations[] = $row;
    }
    mysqli_free_result($result);
} else {
    error_log("Reservation page database error: " . mysqli_error($link));
    // Optionally, display an error message on the page
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico - All Reservations</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Optional: Add specific styles for reservation.php if needed, or put them in admin.css */
        .reservation-page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            flex-wrap: wrap; /* Allow items to wrap on smaller screens */
            gap: 10px; /* Space between items in header */
        }
        .reservation-page-header h1 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }
        .reservation-page-header .search-input {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 14px;
            width: 250px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="%23999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>');
            background-repeat: no-repeat;
            background-position: left 10px center;
            padding-left: 40px;
        }
        .customer-info .customer-name-email {
            white-space: nowrap; /* Prevent name/email from wrapping */
            overflow: hidden;
            text-overflow: ellipsis; /* Add ellipsis if it overflows */
            max-width: 150px; /* Adjust max width as needed */
        }
        /* Style for the new "Check Overall Availability" button */
        .check-overall-availability-btn {
            background-color: #28a745; /* Green color */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.95em;
            margin-left: auto; /* Push button to the right */
        }
        .check-overall-availability-btn:hover {
            background-color: #218838;
        }

        /* Modal styles (similar to reservationModal, but for availability check) */
        #availabilityModal .modal-content {
            max-width: 500px;
        }
        #availabilityModal .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        #availabilityModal .form-group input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        #availabilityModal .availability-result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
        }
        #availabilityModal .availability-result.available {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        #availabilityModal .availability-result.unavailable {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
    </style>
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
                <div class="reservation-page-header">
                    <h1>All Reservations</h1>
                    <input type="text" id="reservationSearch" class="search-input" placeholder="Search reservations...">
                    <button class="check-overall-availability-btn">Check Overall Availability</button>
                </div>

                <section class="all-reservations-section">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>CUSTOMER</th>
                                    <th>DATE</th>
                                    <th>TIME</th>
                                    <th>GUESTS</th>
                                    <th>PHONE</th>
                                    <th>STATUS</th>
                                    <th>BOOKED AT</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($allReservations)): ?>
                                    <tr><td colspan="8" style="text-align: center;">No reservations found.</td></tr>
                                <?php else: ?>
                                    <?php foreach ($allReservations as $reservation): ?>
                                        <?php
                                            $statusClass = strtolower($reservation['status']);
                                            // Prepare data for the 'View/Edit' modal
                                            $fullReservationData = [
                                                'reservation_id' => $reservation['reservation_id'],
                                                'user_id' => $reservation['user_id'] ?? 'N/A',
                                                'res_date' => $reservation['res_date'],
                                                'res_time' => $reservation['res_time'],
                                                'num_guests' => $reservation['num_guests'],
                                                'res_name' => $reservation['res_name'],
                                                'res_phone' => $reservation['res_phone'],
                                                'res_email' => $reservation['res_email'],
                                                'status' => $reservation['status'],
                                                'created_at' => $reservation['created_at']
                                            ];
                                            $fullReservationJson = htmlspecialchars(json_encode($fullReservationData), ENT_QUOTES, 'UTF-8');
                                        ?>
                                        <tr data-reservation-id="<?php echo $reservation['reservation_id']; ?>" data-full-reservation='<?php echo $fullReservationJson; ?>'>
                                            <td>
                                                <div class="customer-info">
                                                    <img src="images/default_avatar.png" alt="Customer Avatar" class="customer-avatar">
                                                    <div class="customer-name-email">
                                                        <strong><?php echo htmlspecialchars($reservation['res_name']); ?></strong><br>
                                                        <small><?php echo htmlspecialchars($reservation['res_email']); ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo htmlspecialchars($reservation['res_date']); ?></td>
                                            <td><?php echo htmlspecialchars($reservation['res_time']); ?></td>
                                            <td><?php echo htmlspecialchars($reservation['num_guests']); ?></td>
                                            <td><?php echo htmlspecialchars($reservation['res_phone']); ?></td>
                                            <td><span class="status-badge <?php echo $statusClass; ?>"><?php echo htmlspecialchars($reservation['status']); ?></span></td>
                                            <td><?php echo htmlspecialchars($reservation['created_at']); ?></td>
                                            <td class="actions">
                                                <button class="btn btn-small view-edit-btn">View/Edit</button>
                                                <button class="btn btn-small delete-btn">Delete</button>
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
                    <h2>Reservation Details & Edit</h2>
                    <form id="editReservationForm">
                        <input type="hidden" id="modalReservationId" name="reservation_id">

                        <div class="form-group">
                            <label for="modalResName">Customer Name:</label>
                            <input type="text" id="modalResName" name="res_name" required>
                        </div>
                        <div class="form-group">
                            <label for="modalResEmail">Email:</label>
                            <input type="email" id="modalResEmail" name="res_email" required>
                        </div>
                        <div class="form-group">
                            <label for="modalResPhone">Phone:</label>
                            <input type="tel" id="modalResPhone" name="res_phone">
                        </div>
                        <div class="form-group">
                            <label for="modalResDate">Date:</label>
                            <input type="date" id="modalResDate" name="res_date" required>
                        </div>
                        <div class="form-group">
                            <label for="modalResTime">Time:</label>
                            <input type="time" id="modalResTime" name="res_time" required>
                        </div>
                        <div class="form-group">
                            <label for="modalNumGuests">Number of Guests:</label>
                            <input type="number" id="modalNumGuests" name="num_guests" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="modalStatus">Status:</label>
                            <select id="modalStatus" name="status">
                                <option value="Pending">Pending</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Declined">Declined</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modalCreatedAt">Booked At:</label>
                            <input type="text" id="modalCreatedAt" name="created_at" readonly>
                        </div>
                        <div class="modal-actions">
                            <button type="submit" class="btn modal-save-btn">Save Changes</button>
                            <button type="button" class="btn modal-delete-btn">Delete Reservation</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="availabilityModal" class="modal">
                <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <h2>Check Table Availability</h2>
                    <form id="checkAvailabilityForm">
                        <div class="form-group">
                            <label for="checkDate">Date:</label>
                            <input type="date" id="checkDate" name="check_date" required>
                        </div>
                        <div class="form-group">
                            <label for="checkTime">Time:</label>
                            <input type="time" id="checkTime" name="check_time" required>
                        </div>
                        <div class="form-group">
                            <label for="checkNumGuests">Number of Guests:</label>
                            <input type="number" id="checkNumGuests" name="check_num_guests" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Check Availability</button>
                    </form>
                    <div id="availabilityResult" class="availability-result" style="display: none;">
                        </div>
                </div>
            </div>

        </div>
    </div>

    <script src="reservation.js"></script>
</body>
</html>