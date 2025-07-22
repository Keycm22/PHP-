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
            // User is logged in, show only the Logout button
            echo '<div class="user-profile-menu">';
            echo '<a href="logout.php" class="btn header-button logout-button">Logout</a>'; // Added a class for potential styling
            echo '</div>';
        } else {
            // User is not logged in, show Sign In/Sign Up button
            echo '<a href="#" class="btn header-button signin-button" id="openModalBtn">Sign In/Sign Up</a>';
        }
        ?>
    </div>
</header>