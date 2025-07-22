document.addEventListener('DOMContentLoaded', () => {

    // --- Smooth Scrolling for Navigation Links ---
    // (Preserved from your original main.js)
    document.querySelectorAll('.main-nav ul li a, .reserve-now-btn, .footer-links ul li a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            // Check if the href is an internal anchor link (starts with #)
            // and not a PHP file link
            if (this.hash !== '' && this.getAttribute('href').startsWith('#')) {
                e.preventDefault();
                const targetId = this.hash;
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - (document.querySelector('.main-header')?.offsetHeight || 0), // Adjust for fixed header
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // --- New: Highlight Active Navigation Link ---
    // This function sets the 'active-nav-link' class based on the current page.
    const highlightActiveNavLink = () => {
        let currentPath = window.location.pathname.split('/').pop();
        if (currentPath === '' || currentPath === '/') {
            currentPath = 'index.php'; // Default to index.php for root
        }

        const navLinks = document.querySelectorAll('.main-nav ul li a');

        navLinks.forEach(link => {
            link.classList.remove('active-nav-link'); // Remove from all first
            const linkPath = link.getAttribute('href').split('/').pop();

            if (currentPath === linkPath) {
                link.classList.add('active-nav-link'); // Add to the current one
            }
        });
    };

    highlightActiveNavLink(); // Call it when the DOM is loaded

    // New: Placeholder for "Reserve Now" button (if it exists on index.php)
    // The href="reserve.php" on the button now handles redirection,
    // so this JS listener is not strictly needed for redirection but can be for other effects.
    const reserveNowBtn = document.querySelector('.reserve-now-btn');
    if (reserveNowBtn) {
        reserveNowBtn.addEventListener('click', (e) => {
            // No need for e.preventDefault() if the button naturally links to reserve.php
            // alert('Redirecting to reservation page...'); // Optional: for debugging
        });
    }


    // --- Sign In/Sign Up Modal Functionality ---
    var modal = document.getElementById("signInUpModal");
    var openModalBtns = document.querySelectorAll(".signin-button"); // Targets the "Sign In/Sign Up" button
    var closeButton = document.querySelector(".modal .close-button");
    var signInPanel = document.getElementById("signInPanel");
    var registerPanel = document.getElementById("registerPanel");
    var switchToRegisterLinks = document.querySelectorAll(".switch-to-register");
    var switchToSignInLink = document.querySelector(".switch-to-signin");

    openModalBtns.forEach(function(openModalBtn) {
        // Open Modal - only if the button exists (i.e., user is not logged in)
        if (openModalBtn && !openModalBtn.classList.contains('profile-button')) { // Check if it's the sign-in/up button, not the profile button
            openModalBtn.onclick = function() {
                modal.style.display = "flex"; // Show the modal container
                // Ensure only signInPanel is active when opening
                signInPanel.classList.add("active");
                registerPanel.classList.remove("active");
            }
        }
    })

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

    // Handle Registration Form Submission
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const username = document.getElementById('registerName').value;
            const email = document.getElementById('registerEmail').value;
            const password = document.getElementById('registerPassword').value;

            try {
                const response = await fetch('register.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        username: username,
                        email: email,
                        password: password
                    })
                });

                const data = await response.json();

                if (data.success) {
                    alert(data.message);
                    // Optionally switch to sign-in panel after successful registration
                    signInPanel.classList.add("active");
                    registerPanel.classList.remove("active");
                    registerForm.reset(); // Clear the form
                } else {
                    alert(data.message);
                }
            } catch (error) {
                console.error('Error during registration:', error);
                alert('An error occurred during registration. Please try again.');
            }
        });
    }

    // New: Handle Sign In Form Submission
    const signInForm = document.getElementById('signInForm');
    if (signInForm) {
        signInForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const username_email = document.getElementById('loginUsernameEmail').value;
            const password = document.getElementById('loginPassword').value;

            try {
                const response = await fetch('login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        username_email: username_email,
                        password: password
                    })
                });

                const data = await response.json();

                if (data.success) {
                    alert(data.message);
                    // Close modal and redirect if login is successful
                    modal.style.display = "none";
                    signInForm.reset(); // Clear the form
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        // Default redirect if not specified (e.g., refresh current page)
                        window.location.reload();
                    }
                } else {
                    alert(data.message);
                }
            } catch (error) {
                console.error('Error during login:', error);
                alert('An error occurred during login. Please try again.');
            }
        });
    }
    // --- End Sign In/Sign Up Modal Functionality ---

    // --- New: Profile Dropdown Functionality ---
    const profileButton = document.querySelector('.profile-button');
    const profileDropdown = document.querySelector('.profile-dropdown-content');

    if (profileButton && profileDropdown) {
        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('show-dropdown');
        });

        // Close the dropdown if the user clicks outside of it
        window.addEventListener('click', (event) => {
            if (!event.target.matches('.profile-button') && !event.target.matches('.profile-dropdown-content a')) {
                if (profileDropdown.classList.contains('show-dropdown')) {
                    profileDropdown.classList.remove('show-dropdown');
                }
            }
        });
    }


    // --- Slideshow functionality ---
    // (Preserved from your original main.js, with a check for slideshow elements)
    let slideIndex = 0;
    // Only call showSlides if there are elements with class 'mySlides'
    if (document.getElementsByClassName("mySlides").length > 0) {
        showSlides();
    }

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (slides.length > 0) { // Double-check inside function as well
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }
    }

}); // End of DOMContentLoaded