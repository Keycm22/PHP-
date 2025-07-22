<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico - Events</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <?php include 'partials/header.php'; ?>

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

    <?php include 'partials/header.php'; ?>

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