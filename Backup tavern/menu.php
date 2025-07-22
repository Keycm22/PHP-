<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tavern Publico - Menu</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="main.css">
     <link rel="stylesheet" href="menu.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php include 'partials/header.php'; ?>

    <main>
        <section class="menu-section common-padding">
            <div class="container">
                <div class="menu-header">
                    <div class="category-buttons">
                        <button class="category-btn active" data-category="Specialty">
                            <i class="fas fa-utensils"></i> specialty
                        </button>
                        <button class="category-btn" data-category="Breakfast">
                            <i class="fas fa-pizza-slice"></i> All Day breakfast
                        </button>
                        <button class="category-btn" data-category="Lunch">
                            <i class="fas fa-hamburger"></i> Ala Carte/For Sharing
                        </button>
                        <button class="category-btn" data-category="Sizzlers">
                            <i class="fas fa-fish"></i> Sizzling Plates
                        </button>
                        <button class="category-btn" data-category="Coffee">
                            <i class="fas fa-pasta"></i> Cafe Drinks
                        </button>
                        <button class="category-btn" data-category="Cool Creations">
                            <i class="fas fa-leaf"></i> Frappe
                        </button>
                    </div>
                    <div class="search-sort">
                        <div class="search-bar">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Search">
                        </div>
                        <div class="sort-by">
                            <span>Sort by:</span>
                            <select>
                                <option value="popular">Popular</option>
                                <option value="price-low-high">Price: Low to High</option>
                                <option value="price-high-low">Price: High to Low</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h2 class="current-category-title">Specialty</h2>

                <div class="menu-grid">
                    <div class="menu-item-card" data-category="Specialty">
                        <img src="images/Sisig.jpg" alt="Sizzling Sisig">
                        <h3>Sizzling Sisig</h3>
                        <div class="item-price-add">
                             <span class="price">$19.99</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="menu-item-card" data-category="Specialty">
                        <img src="images/Liempo.jpg" alt="Sizzling Liempo">
                        <h3>Sizzling Liempo</h3>
                        <div class="item-price-add">
                             <span class="price">$19.99</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="menu-item-card" data-category="Specialty">
                        <img src="images/Tapa.jpg" alt="Tapa Silog">
                        <h3>Tapa Silog</h3>
                        <div class="item-price-add">
                             <span class="price">$19.99</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    
                    <div class="menu-item-card" data-category="Breakfast">
                        <img src="images/Chicken.jpg" alt="Classic Chiken">
                        <h3>Chicken Silog</h3>
                        <div class="item-price-add">
                            <span class="price">$19.99</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Breakfast">
                        <img src="images/Sisig.jpg" alt="Classic Sisig">
                        <h3>SiSig Silog</h3>
                        <div class="item-price-add">
                            <span class="price">$17.50</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                     <div class="menu-item-card" data-category="Breakfast">
                        <img src="images/Pork.jpg" alt="Classic Pork">
                        <h3>Pork Silog</h3>
                        <div class="item-price-add">
                            <span class="price">$18.75</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="menu-item-card" data-category="Breakfast">
                        <img src="images/Bagnet.jpg" alt="Classic Bagnet">
                        <h3>Bagnet Silog</h3>
                        <div class="item-price-add">
                            <span class="price">$18.99</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="menu-item-card" data-category="Breakfast">
                        <img src="images/Tapa.jpg" alt="Classic Tapa">
                        <h3>Tapa Silog</h3>
                        <div class="item-price-add">
                            <span class="price">$13.99</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>


                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/classic-burger.jpg" alt="Ala Sisig">
                        <h3>Sisig Kapampangan</h3>
                        <div class="item-price-add">
                            <span class="price">$15.50</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/chicken-burger.jpg" alt="Ala Bagnet">
                        <h3>Bagnet</h3>
                        <div class="item-price-add">
                            <span class="price">$14.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/vegan-burger.jpg" alt="Ala Tokwat">
                        <h3>Tokwat Baboy</h3>
                        <div class="item-price-add">
                            <span class="price">$13.75</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                     <div class="menu-item-card" data-category="Lunch">
                        <img src="images/classic-burger.jpg" alt="Ala Dinakdakan">
                        <h3>Dinakdakan</h3>
                        <div class="item-price-add">
                            <span class="price">$15.50</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/chicken-burger.jpg" alt="Ala Beef">
                        <h3>Beef Caldereta</h3>
                        <div class="item-price-add">
                            <span class="price">$14.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/vegan-burger.jpg" alt="Ala Embotido">
                        <h3>Embitido De Fiesta</h3>
                        <div class="item-price-add">
                            <span class="price">$13.75</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/classic-burger.jpg" alt="Ala Soy">
                        <h3>Soy Garlic Chicken</h3>
                        <div class="item-price-add">
                            <span class="price">$15.50</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/chicken-burger.jpg" alt="Ala Sinigang">
                        <h3>Sinigang na Salmon Head</h3>
                        <div class="item-price-add">
                            <span class="price">$14.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/vegan-burger.jpg" alt="Ala Hipon">
                        <h3>Sinigang na Hipon</h3>
                        <div class="item-price-add">
                            <span class="price">$13.75</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                     <div class="menu-item-card" data-category="Lunch">
                        <img src="images/classic-burger.jpg" alt="Ala Chopsey">
                        <h3>Chopsey</h3>
                        <div class="item-price-add">
                            <span class="price">$15.50</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/chicken-burger.jpg" alt="Ala Guisado">
                        <h3>Mix Guisado Canton</h3>
                        <div class="item-price-add">
                            <span class="price">$14.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Lunch">
                        <img src="images/vegan-burger.jpg" alt="Ala Karekare">
                        <h3>Kare Kare Bagnet</h3>
                        <div class="item-price-add">
                            <span class="price">$13.75</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>


                    <div class="menu-item-card" data-category="Sizzlers">
                        <img src="images/sushi-nigiri.jpg" alt="Sizzling Ribs">
                        <h3>Baby Back Ribs</h3>
                        <div class="item-price-add">
                            <span class="price">$25.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Sizzlers">
                        <img src="images/sushi-rolls.jpg" alt="Sizzling Chicken">
                        <h3>Fried Chicken(2pcs/1pc)</h3>
                        <div class="item-price-add">
                            <span class="price">$22.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Sizzlers">
                        <img src="images/sashimi-platter.jpg" alt="Sizzling Inasal">
                        <h3>CHicken Inasal</h3>
                        <div class="item-price-add">
                            <span class="price">$30.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Sizzlers">
                        <img src="images/sushi-nigiri.jpg" alt="Sizzling Liempo">
                        <h3>Liempo</h3>
                        <div class="item-price-add">
                            <span class="price">$25.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Sizzlers">
                        <img src="images/sushi-rolls.jpg" alt="Sizzling Pork">
                        <h3>Pork Cutlet</h3>
                        <div class="item-price-add">
                            <span class="price">$22.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Sizzlers">
                        <img src="images/sashimi-platter.jpg" alt="Sizzling Steak">
                        <h3>Burger Steak</h3>
                        <div class="item-price-add">
                            <span class="price">$30.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                     <div class="menu-item-card" data-category="Sizzlers">
                        <img src="images/sashimi-platter.jpg" alt="Sizzling Chop">
                        <h3>Pork Chop</h3>
                        <div class="item-price-add">
                            <span class="price">$30.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>


                    <div class="menu-item-card" data-category="Coffee">
                        <img src="images/lasagna.jpg" alt="Homemade Lasagna">
                        <h3>Homemade Lasagna</h3>
                        <div class="item-price-add">
                            <span class="price">$17.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Coffee">
                        <img src="images/pasta-carbonara.jpg" alt="Spaghetti Carbonara">
                        <h3>Spaghetti Carbonara</h3>
                        <div class="item-price-add">
                            <span class="price">$16.50</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Coffee">
                        <img src="images/risotto.jpg" alt="Mushroom Risotto">
                        <h3>Mushroom Risotto</h3>
                        <div class="item-price-add">
                            <span class="price">$18.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>

                    <div class="menu-item-card" data-category="Cool Creations">
                        <img src="images/vegan-tacos.jpg" alt="Vegan Tacos">
                        <h3>Vegan Tacos</h3>
                        <div class="item-price-add">
                            <span class="price">$13.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Cool Creations">
                        <img src="images/quinoa-salad.jpg" alt="Quinoa Salad">
                        <h3>Quinoa Salad</h3>
                        <div class="item-price-add">
                            <span class="price">$12.50</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="menu-item-card" data-category="Cool Creations">
                        <img src="images/lentil-soup.jpg" alt="Hearty Lentil Soup">
                        <h3>Hearty Lentil Soup</h3>
                        <div class="item-price-add">
                            <span class="price">$9.00</span>
                            <button class="add-to-cart-btn"><i class="fas fa-plus"></i></button>
                        </div>
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
    <script src="main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const categoryButtons = document.querySelectorAll('.category-btn');
            const menuItems = document.querySelectorAll('.menu-item-card');
            const currentCategoryTitle = document.querySelector('.current-category-title');
            const searchInput = document.querySelector('.search-bar input');
            const sortBySelect = document.querySelector('.sort-by select');

            // Function to filter and display menu items based on category
            const filterMenuItems = (category) => {
                menuItems.forEach(item => {
                    if (category === 'all' || item.dataset.category === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
                // Update title, capitalize the first letter
                currentCategoryTitle.textContent = category.charAt(0).toUpperCase() + category.slice(1);
            };

            // Event listeners for category buttons
            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    filterMenuItems(button.dataset.category);
                });
            });

            // Initial display: show Asian category by default on page load
            filterMenuItems('asian');

            // Search functionality (simple client-side filter)
            searchInput.addEventListener('keyup', () => {
                const searchTerm = searchInput.value.toLowerCase();
                menuItems.forEach(item => {
                    const itemName = item.querySelector('h3').textContent.toLowerCase();
                    // Check if the item's current display style is not 'none' (i.e., it's currently visible in its category)
                    // This prevents searching across hidden categories
                    const isVisibleByCategory = item.style.display !== 'none';

                    if (itemName.includes(searchTerm) && isVisibleByCategory) {
                        item.style.display = 'block';
                    } else if (!itemName.includes(searchTerm) && isVisibleByCategory) {
                        item.style.display = 'none'; // Hide if it doesn't match search and was visible
                    }
                    // If isVisibleByCategory is false (item is already hidden by category filter),
                    // we do nothing, it remains hidden.
                });
            });


            // Sort functionality (client-side sort - visual only, not persistent)
            sortBySelect.addEventListener('change', () => {
                const sortValue = sortBySelect.value;
                const menuGrid = document.querySelector('.menu-grid');
                // Only sort currently visible items
                const visibleItems = Array.from(menuItems).filter(item => item.style.display !== 'none');

                visibleItems.sort((a, b) => {
                    const priceA = parseFloat(a.querySelector('.price').textContent.replace('$', ''));
                    const priceB = parseFloat(b.querySelector('.price').textContent.replace('$', ''));

                    if (sortValue === 'price-low-high') {
                        return priceA - priceB;
                    } else if (sortValue === 'price-high-low') {
                        return priceB - priceA;
                    }
                    return 0; // Keep original order if not sorting by price or 'popular'
                });

                // Re-append sorted items to the grid
                visibleItems.forEach(item => menuGrid.appendChild(item));
            });

        });
    </script>
</body>
</html>