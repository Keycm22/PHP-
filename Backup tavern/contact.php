<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico - Contact Us</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="contact.css">
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
                $profilePicPath = ''; // Default path
                // You would typically fetch the user's actual profile picture path from the database here
                // e.g., if(isset($_SESSION['profile_pic'])) { $profilePicPath = $_SESSION['profile_pic']; }

                echo '<div class="user-profile-menu">';
                echo '<button class="btn header-button profile-button">';
                echo '<span class="username-text">' . htmlspecialchars($_SESSION['username']) . '</span> <i class="fas fa-caret-down"></i>';
                echo '</button>';
                echo '<div class="profile-dropdown-content">';
                echo '<a href="#profile-settings">Profile Settings</a>';
                echo '<a href="logout.php">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                // User is not logged in, show Sign In/Sign Up button
                echo '<a href="#" class="btn header-button" id="openModalBtn">Sign In/Sign Up</a>';
            }
            ?>
        </div>
    </header>

    <main>
        <section class="contact-info-section common-padding">
            <div class="container">
                <h2 class="section-heading">Get in Touch</h2>
                <div class="contact-grid">
                    <div class="contact-card">
                        <h3>Location</h3>
                        <p>123 Main Street, Guagua, Pampanga</p>
                        <p><a href="https://maps.app.goo.gl/YourGoogleMapsLink" target="_blank">View on Google Maps</a></p>
                    </div>
                    <div class="contact-card">
                        <h3>Reservations & Inquiries</h3>
                        <p>Phone: (045) 123-4567</p>
                        <p>Email: info@tavernpublico.com</p>
                    </div>
                    <div class="contact-card">
                        <h3>Hours of Operation</h3>
                        <p>Monday - Thursday: 11am - 10pm</p>
                        <p>Friday - Saturday: 11am - 12am</p>
                        <p>Sunday: 10am - 9pm</p>
                    </div>
                </div>

                <div class="contact-form-map-grid">
                    <div class="contact-form-container">
                        <h3>Send Us a Message</h3>
                        <form class="contact-form">
                            <div class="form-group">
                                <label for="contactName">Name</label>
                                <input type="text" id="contactName" name="contactName" required>
                            </div>
                            <div class="form-group">
                                <label for="contactEmail">Email</label>
                                <input type="email" id="contactEmail" name="contactEmail" required>
                            </div>
                            <div class="form-group">
                                <label for="contactSubject">Subject</label>
                                <input type="text" id="contactSubject" name="contactSubject">
                            </div>
                            <div class="form-group">
                                <label for="contactMessage">Message</label>
                                <textarea id="contactMessage" name="contactMessage" rows="6" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                   <div class="map-container">
                        <iframe src="http://maps.google.com/maps?q=269+Floridablanca+Road,+Jose+Abad+Santos+(Siran,+Guagua,+Pampanga)&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="container footer-grid">
            <div class="footer-about">
                <img src="456245474_122124580028367938_382156898811842987_n (1).jpg" alt="Tavern Publico Footer Logo" style="height: 35px; margin-bottom: 12px;">
                <p>Tavern Publico</p>
                <p>EST ★ 2024</p>
                <p>Taste the tradition, savor the innovation.</p>
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
                <p>123 Main Street, Guagua,</p>
                <p>Pampanga</p>
                <p>(045) 123-4567</p>
                <p>info@tavernpublico.com</p>
            </div>
            <div class="footer-hours">
                <h3>Hours</h3>
                <p>Monday - Thursday: 11am - 10pm</p>
                <p>Friday - Saturday: 11am - 12am</p>
                <p>Sunday: 10am - 9pm</p>
            </div>
        </div>
        <div class="container" style="text-align:center; padding-top: 30px; margin-top: 30px; border-top: 1px solid #333;">
            <p>&copy; 2025 Tavern Publico. All rights reserved.</p>
            <p style="margin-top: 10px;"><a href="#" style="color:#bbb; text-decoration:none;">Privacy Policy</a> | <a href="#" style="color:#bbb; text-decoration:none;">Terms of Service</a></p>
        </div>
    </footer>

    <div id="signInRegisterModal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>

        <div id="signInPanel" class="modal-panel active">
            <h2 class="modal-title">Sign In</h2>
            <form id="signInForm" class="modal-form" action="login.php" method="POST">
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
            <form id="registerForm" class="modal-form" action="register.php" method="POST">
                <div class="form-group">
                    <label for="registerUsername">Username</label>
                    <input type="text" id="registerUsername" name="username" placeholder="Choose a username" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email</label>
                    <input type="email" id="registerEmail" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Password</label>
                    <input type="password" id="registerPassword" name="password" placeholder="Create a password" required>
                </div>
                <div class="form-group">
                    <label for="registerConfirmPassword">Confirm Password</label>
                    <input type="password" id="registerConfirmPassword" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn btn-primary modal-btn">Register</button>
            </form>
            <p class="modal-bottom-text">Already have an account? <a href="#" class="switch-to-signin">Sign In here</a></p>
        </div>
    </div>
</div>
    <script>
        var modal = document.getElementById("signInModal");
        var openModalBtn = document.querySelector(".header-button");
        var closeButton = document.getElementsByClassName("close-button")[0];

        var signInPanel = document.getElementById("signInPanel");
        var registerPanel = document.getElementById("registerPanel");

        var switchToRegisterLinks = document.querySelectorAll(".switch-to-register");
        var switchToSignInLink = document.querySelector(".switch-to-signin");

        // When the user clicks the open modal button, show the modal and sign-in panel
        openModalBtn.onclick = function() {
          modal.style.display = "flex"; // Show the modal container
          // Ensure only signInPanel is active when opening
          signInPanel.classList.add("active");
          registerPanel.classList.remove("active");
        }

        // When the user clicks on <span> (x), close the modal
        closeButton.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal content, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }

        // Function to switch to register panel
        switchToRegisterLinks.forEach(function(link) {
            link.onclick = function(event) {
                event.preventDefault(); // Prevent default link behavior
                signInPanel.classList.remove("active");
                registerPanel.classList.add("active");
            };
        });

        // Function to switch back to sign-in panel
        if (switchToSignInLink) {
            switchToSignInLink.onclick = function(event) {
                event.preventDefault(); // Prevent default link behavior
                registerPanel.classList.remove("active");
                signInPanel.classList.add("active");
            };
        }
    </script>
     <script src="main.js"></script>
</body>
</html>