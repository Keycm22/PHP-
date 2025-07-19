<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico - Events</title>
    <link rel="stylesheet" href="main.css">
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
            <a href="#" class="btn header-button">Sign In/Sign Up</a>
        </div>
    </header>

    <main>

        <section class="upcoming-events-section common-padding">
            <div class="container">
                <h2 class="section-heading">Our Event Calendar</h2>
                <div class="events-grid">
                    <div class="event-card">
                        <img src="images/3-OS.jpg" alt="Live Acoustic Night">
                        <span class="event-date">Friday, March 14, 2025 • 8:00 PM</span>
                        <h3>Live Acoustic Night</h3>
                        <p>Enjoy the soothing sounds of local acoustic artists while savoring our craft cocktails.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                    <div class="event-card">
                        <img src="images/3rd.jpg" alt="Wine & Cheese Pairing">
                        <span class="event-date">Saturday, March 22, 2025 • 6:30 PM</span>
                        <h3>Wine & Cheese Pairing</h3>
                        <p>A guided tasting experience featuring premium wines paired with artisanal cheeses.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                    <div class="event-card">
                        <img src="images/1st.jpg" alt="Exclusive 5-Course Tasting Menu">
                        <span class="event-date">Friday, April 5, 2025 • 7:00 PM</span>
                        <h3>Exclusive 5-Course Tasting Menu</h3>
                        <p>An exclusive 5-course tasting menu with commentary from our executive chef.</p>
                        <a href="#" class="learn-more">Learn More</a>
                    </div>
                    <div class="event-card">
                        <img src="images/event.jpg" alt="Cocktail Masterclass">
                        <span class="event-date">Saturday, April 19, 2025 • 4:00 PM</span>
                        <h3>Cocktail Masterclass</h3>
                        <p>Learn the art of mixology from our head mixologist, includes tasting sessions.</p>
                        <a href="#" class="learn-more">Learn More</a>
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

    <div id="signInModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <div id="signInPanel" class="modal-panel active">
                <div class="modal-header-logo">
                    
                </div>
                <h2>Sign in to your account</h2>
                <p class="modal-subtext">Or <a href="#" class="switch-to-register create-account-link">create a new account</a></p>
                <form class="modal-form">
                    <div class="form-group">
                        <label for="signInEmail">Email address</label>
                        <input type="email" id="signInEmail" name="signInEmail" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="signInPassword">Password</label>
                        <input type="password" id="signInPassword" name="signInPassword" placeholder="Enter your password">
                    </div>
                    <div class="form-checkbox-group">
                        <input type="checkbox" id="rememberMe" name="rememberMe">
                        <label for="rememberMe">Remember me</label>
                        <a href="#" class="forgot-password-link">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn btn-modal-sign-in">Sign In</button>
                </form>
                <p class="modal-bottom-text">Don't have an account? <a href="#" class="switch-to-register sign-up-link">Sign up</a></p>
            </div>
            <div id="registerPanel" class="modal-panel">
                <div class="modal-header-logo">
                    
                </div>
                <h2>Create your account</h2>
                <p class="modal-subtext">Join Tavern Publico</p>
                <form class="modal-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First name</label>
                            <input type="text" id="firstName" name="firstName" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last name</label>
                            <input type="text" id="lastName" name="lastName" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email address</label>
                        <input type="email" id="registerEmail" name="registerEmail" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">Password</label>
                        <input type="password" id="registerPassword" name="registerPassword" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-modal-create-account">Create Account</button>
                </form>
                <div class="modal-separator">
                    <span>OR</span>
                </div>
                <button class="btn btn-facebook-signup">
                    <img src="path/to/your/facebook-icon.png" alt="Facebook Icon"> Sign up with Facebook
                </button>
                <p class="modal-bottom-text">Already have an account? <a href="#" class="switch-to-signin">Sign in</a></p>
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