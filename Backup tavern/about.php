<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico - About Us</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.css">
</head>
<body>

    <?php include 'partials/header.php'; ?>

    <main>

        <section class="our-story-section common-padding">
            <div class="container">
                <h2 class="section-heading">Our Story</h2>
                <div class="story-content">
                    <div class="story-image">
                        <img src="images/story.jpg" alt="Our Story Image">
                    </div>
                    <div class="story-text">
                        <p>Founded in 2024, Tavern Publico was born from a passion for bringing together exceptional craft food and drinks in a welcoming environment. Our chefs use locally-sourced ingredients to create memorable dishes that honor tradition while embracing innovation.</p>
                        <p>Every visit to Tavern Publico is an opportunity to experience the warmth of our hospitality and the quality of our cuisine. We believe in creating not just meals, but experiences, fostering a community where good food and good company thrive.</p>
                        <p>From our humble beginnings, we've grown into a beloved local spot, known for our cozy ambiance and dedication to culinary excellence. Our team is committed to providing outstanding service and ensuring every guest feels at home.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-section common-padding" style="background-color: #fefefe;">
            <div class="container">
                <h2 class="section-heading">Meet Our Team</h2>
                <div class="team-grid">
                    <div class="team-member">
                        <img src="images/OIP.webp" alt="Chef Name">
                        <h3>Chef John Doe</h3>
                        <p>Executive Chef</p>
                        <p class="team-bio">With over 20 years of experience, Chef John brings a unique blend of traditional and modern culinary techniques to our kitchen.</p>
                    </div>
                    <div class="team-member">
                        <img src="images/OIP.webp" alt="Manager Name">
                        <h3>Jane Smith</h3>
                        <p>Restaurant Manager</p>
                        <p class="team-bio">Jane ensures every aspect of your dining experience is seamless and enjoyable, leading our team with dedication.</p>
                    </div>
                    <div class="team-member">
                        <img src="images/OIP.webp" alt="Mixologist Name">
                        <h3>Mike Johnson</h3>
                        <p>Head Mixologist</p>
                        <p class="team-bio">Mike crafts innovative cocktails, turning every drink into a work of art and a delight for the senses.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'partials/footer.php'; ?>

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