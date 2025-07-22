<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico - Reservation</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="reservation.css">
</head>
<body>

    <header class="main-header">
        <div class="header-content">
            <div class="logo">
                <div class="logo-main-line">
                    <span>Tavern Publico</span>
                </div>
                <span class="est-year">EST ★ 2024</span>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
             <?php
            session_start(); // Start the session at the very beginning of index.php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                // User is logged in, show profile button
                echo '<div class="user-profile-menu">';
                echo '<button class="btn header-button profile-button">' . htmlspecialchars($_SESSION['username']) . '</button>';
                echo '<div class="profile-dropdown-content">';
                echo '<a href="logout.php">Logout</a>';
                // Add other profile links here if needed
                echo '</div>';
                echo '</div>';
            } else {
                // User is not logged in, show Sign In/Sign Up button
                echo '<a href="#" class="btn header-button">Sign In/Sign Up</a>';
            }
            ?>
        </div>
    </header>

    <section class="reservation-hero-section">
        <img src="images/1st.jpg" alt="Tavern Publico exterior at night" class="reservation-bg-image">
        <div class="reservation-overlay">
            <div class="reservation-container">
                <div class="reservation-form-card">
                    <h2>Schedule a Reservation</h2>
                    <form class="reservation-form" action="process_reservation.php" method="POST">
                        <div class="form-group-inline">
                            <div class="form-group">
                                <label for="resDate">Date</label>
                                <input type="date" id="resDate" name="resDate" required>
                            </div>
                            <div class="form-group">
                                <label for="resTime">Time</label>
                                <select id="resTime" name="resTime" required>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="13:00">1:00 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <option value="17:00">5:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numGuests">Number of Guests</label>
                            <select id="numGuests" name="numGuests" required>
                                <option value="1">1 Person</option>
                                <option value="2">2 People</option>
                                <option value="3">3 People</option>
                                <option value="4">4 People</option>
                                <option value="5">5 People</option>
                                <option value="6plus">6+ People (Call Us)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resName">Name</label>
                            <input type="text" id="resName" name="resName" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="resPhone">Phone Number</label>
                            <input type="tel" id="resPhone" name="resPhone" placeholder="Your Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="resEmail">Email</label>
                            <input type="email" id="resEmail" name="resEmail" placeholder="Your Email" required>
                        </div>
                        <button type="submit" class="btn btn-primary confirm-reservation-btn">Confirm Reservation</button>
                    </form>
                </div>

                <div class="hours-card">
                    <h3>Hours of Operation</h3>
                    <p><strong>Monday - Thursday</strong><br>11:00 AM - 6:00 PM</p>
                    <p><strong>Friday - Saturday</strong><br>11:00 AM - 7:00 PM</p>
                    <p><strong>Sunday</strong><br>12:00 PM - 9:00 PM</p>
                    <p class="call-message">For parties of 6 or more, please call us directly at (123) 456-7890</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer">
        <div class="container footer-grid">
            <div class="footer-about">
                <img src="logo.png" alt="Tavern Publico Footer Logo">
                <p>Tavern Publico</p>
                <p>EST ★ 2024</p>
                <p>Taste the tradition, savor the innovation.</p>
                <div class="social-icons">
                    <a href="#"><img src="images/fb.png" alt="Facebook"></a>
                    <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
                    <a href="#"><img src="images/instagram.png" alt="Instagram"></a>
                </div>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="menu.html">Menu</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p>123 Main Street, Anytown, Philippines</p>
                <p>Email: info@tavernpublico.com</p>
                <p>Phone: +63 912 345 6789</p>
            </div>
            <div class="footer-hours">
                <h3>Hours</h3>
                <p>Tuesday - Thursday: 5:00 PM - 10:00 PM</p>
                <p>Friday - Saturday: 5:00 PM - 11:00 PM</p>
                <p>Sunday: 11:00 AM - 3:00 PM (Brunch)</p>
                <p>Monday: Closed</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 Tavern Publico. All rights reserved.</p>
        </div>
    </footer>

<div id="signInUpModal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>

        <div id="signInPanel" class="modal-panel active">
            <h2 class="modal-title">Sign In</h2>
            <form id="signInForm" class="modal-form">
                <div class="form-group">
                    <label for="loginUsernameEmail">Username or Email</label>
                    <input type="text" id="loginUsernameEmail" name="username_email" placeholder="Enter your username or email" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary modal-btn">Sign In</button>
            </form>
            <p class="modal-bottom-text">Don't have an account? <a href="#" class="switch-to-register">Register here</a></p>
        </div>

        <div id="registerPanel" class="modal-panel">
            <h2 class="modal-title">Register</h2>
            <form id="registerForm" class="modal-form">
                <div class="form-group">
                    <label for="registerName">Username</label>
                    <input type="text" id="registerName" name="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email</label>
                    <input type="email" id="registerEmail" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Password</label>
                    <input type="password" id="registerPassword" name="password" placeholder="Create a password" required>
                </div>
                <button type="submit" class="btn btn-primary modal-btn">Register</button>
            </form>
            <p class="modal-bottom-text">Already have an account? <a href="#" class="switch-to-signin">Sign In here</a></p>
        </div>
    </div>
</div>

    <script src="main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const resDateInput = document.getElementById('resDate');
            if (resDateInput) {
                const today = new Date();
                const day = String(today.getDate()).padStart(2, '0');
                const month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                const year = today.getFullYear();
                resDateInput.value = `${year}-${month}-${day}`;
            }
        });
    </script>
</body>
</html>