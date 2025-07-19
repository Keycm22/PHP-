<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico</title>
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

    <section class="hero-section">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="images/1st.jpg" alt="Tavern Publico Interior" class="hero-bg-image">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>TAVERN PUBLICO</h1>
                        <span class="est-year-hero">EST ★ 2024</span>
                    </div>
                </div>
            </div>

            <div class="mySlides fade">
                <img src="images/2nd.jpg" alt="Dining Area" class="hero-bg-image">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>Experience Fine Dining</h1>
                        <span class="est-year-hero">Fresh Ingredients, Exquisite Taste</span>
                    </div>
                </div>
            </div>

            <div class="mySlides fade">
                <img src="images/3rd.jpg" alt="Bar Area" class="hero-bg-image">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>Craft Cocktails & Spirits</h1>
                        <span class="est-year-hero">Unwind and Indulge</span>
                    </div>
                </div>
            </div>

            <div class="mySlides fade">
                <img src="images/4th.jpg" alt="Outdoor Seating" class="hero-bg-image">
                <div class="hero-overlay">
                    <div class="hero-text">
                        <h1>Perfect Ambiance</h1>
                        <span class="est-year-hero">For Every Occasion</span>
                    </div>
                </div>
            </div>

            <div style="text-align:center; position: absolute; bottom: 20px; width: 100%; z-index: 2;">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="" onclick="currentSlide(3)"></span>
                <span class="" onclick="currentSlide(4)"></span>
            </div>

        </div>
    </section>

    <section class="reserve-now-section common-padding">
        <div class="container">
            <h2>Reserve Your Table</h2>
            <p>Book your spot for an unforgettable dining experience at Tavern Publico.</p>
            <a href="reserve.php" class="btn btn-primary reserve-now-btn">Reserve Now</a>
        </div>
    </section>

    <section class="specialties-section common-padding">
        <div class="container">
            <h2>Our Specialties</h2>
            <div class="specialties-grid">
                <div class="specialty-card">
                    <img src="images/1-OS.jpg" alt="Craft Burger Deluxe">
                    <h3>Craft Burger Deluxe</h3>
                    <p>House-made patty with aged cheddar, caramelized onions, and our secret sauce on a brioche bun.</p>
                    <div class="price-arrow">


                    </div>
                </div>
                <div class="specialty-card">
                    <img src="images/2-OS.jpg" alt="Smoky Old Fashioned">
                    <h3>Smoky Old Fashioned</h3>
                    <p>Premium bourbon, house-made bitters, and a hint of smoke, garnished with an orange peel.</p>
                    <div class="price-arrow">


                    </div>
                </div>
                <div class="specialty-card">
                    <img src="images/3-OS.jpg" alt="Tavern Chocolate Lava">
                    <h3>Tavern Chocolate Lava</h3>
                    <p>Warm chocolate cake with a molten center, served with vanilla bean ice cream.</p>
                    <div class="price-arrow">


                    </div>
                </div>
            </div>
            <a href="menu.php" class="btn btn-secondary">View Full Menu</a>
        </div>
    </section>

    <section class="our-story-section common-padding">
        <div class="container">
            <h2>Our Story</h2>
            <div class="story-content">
                <div class="story-image">
                    <img src="images/story.jpg" alt="Our Story Image">
                </div>
                <div class="story-text">
                    <h2>Our Story</h2>
                    <p>Founded in 2024, Tavern Publico was born from a passion for bringing together exceptional craft food and drinks in a welcoming environment. Our chefs use locally-sourced ingredients to create memorable dishes that honor tradition while embracing innovation.</p>
                    <p>Every visit to Tavern Publico is an opportunity to experience the warmth of our hospitality and the quality of our cuisine.</p>
                    <a href="gallery.html" class="btn btn-outline-dark">Learn More About Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="upcoming-events-section common-padding">
        <div class="container">
            <h2>Upcoming Events</h2>
            <div class="events-grid">
                <div class="event-card">
                    <img src="images/event.jpg" alt="Live Acoustic Night">
                    <span class="event-date">Friday, March 14, 2025 • 8:00 PM</span>
                    <h3>Live Acoustic Night</h3>
                    <p>Enjoy the soothing sounds of local acoustic artists while savoring our craft cocktails.</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div>
                <div class="event-card">
                    <img src="images/even2.jpg" alt="Wine & Cheese Pairing">
                    <span class="event-date">Saturday, March 22, 2025 • 6:30 PM</span>
                    <h3>Wine & Cheese Pairing</h3>
                    <p>A guided tasting experience featuring premium wines paired with artisanal cheeses.</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div>
                <div class="event-card">
                    <img src="images/event3.jpg" alt="Exclusive 5-Course Tasting Menu">
                    <span class="event-date">Friday, March 14, 2025 • 8:00 PM</span>
                    <h3>Live Acoustic Night</h3>
                    <p>An exclusive 5-course tasting menu with commentary from our executive chef.</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div>
            </div>
            <a href="events.html" class="btn btn-secondary">View All Events</a>
        </div>
    </section>

    <section class="guest-testimonials-section common-padding">
        <div class="container">
            <h2>What Our Guests Say</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p>"The foods was absolutely amazing! Juicy, flavorful, and perfectly cooked. The atmosphere was cozy and the staff was attentive. Will definitely be back!"</p>
                    <div class="guest-info">
                        <img src="images/OIP.webp" alt="Maria Santos">
                        <div class="guest-details">
                            <span class="guest-name">Maria Santos</span>
                            <span class="guest-title">Local Guide • 18 reviews</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p>"Tavern Publico has become our go-to spot for date nights. The foods are creative and delicious, and the ambiance is perfect for a romantic evening. Highly recommend!"</p>
                    <div class="guest-info">
                        <img src="images/man-3d-avatar-4-1024.webp" alt="Maria Santos">
                        <div class="guest-details">
                            <span class="guest-name">Maria Santos</span>
                            <span class="guest-title">Local Guide • 18 reviews</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="stars">★★★★★</div>
                    <p>"We hosted our company dinner at Tavern Publico and it was perfect! The staff was accommodating, the food was excellent, and everyone had a great time. Thank you for making our event special!"</p>
                    <div class="guest-info">
                        <img src="images/ICON-MALE_Male-And-Female-Review-Messages.png" alt="Anna Cruz">
                        <div class="guest-details">
                            <span class="guest-name">Anna Cruz</span>
                            <span class="guest-title">Local Guide • 18 reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="call-to-action-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Experience Tavern Publico?</h2>
                <p>Join us for an unforgettable dining experience. Whether you're planning a romantic dinner, family gathering, or just want to enjoy great food and drinks, we're here to serve you.</p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-outline-white">Reserve a Table</a>
                    <a href="#" class="btn btn-outline-white">Order Online</a>
                    <a href="#" class="btn btn-outline-white">Contact Us</a>
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

    <script>
        // Get the modal
        var modal = document.getElementById("signInUpModal");
        // Get the button that opens the modal
        var openModalBtn = document.querySelector(".header-button");
        // Get the <span> element that closes the modal
        var closeButton = document.querySelector(".close-button");

        // Get the sign-in and register panels
        var signInPanel = document.getElementById("signInPanel");
        var registerPanel = document.getElementById("registerPanel");

        // Get links to switch panels
        var switchToRegisterLinks = document.querySelectorAll(".switch-to-register");
        var switchToSignInLink = document.querySelector(".switch-to-signin");


        // When the user clicks the button, open the sign-in panel
        // This part needs to be conditional based on whether the user is logged in.
        // The current logic only applies if the "Sign In/Sign Up" button is present.
        // We'll manage the modal display more robustly in main.js.
        if (openModalBtn) {
            openModalBtn.onclick = function() {
                modal.style.display = "flex"; // Show the modal container
                // Ensure only signInPanel is active when opening
                signInPanel.classList.add("active");
                registerPanel.classList.remove("active");
            }
        }


        // When the user clicks on <span> (x), close the modal
        if (closeButton) {
            closeButton.onclick = function() {
                modal.style.display = "none";
            }
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