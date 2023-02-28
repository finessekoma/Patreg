<!DOCTYPE html>
<html>
<head>
	<title>MyOnlineStore</title>
	<link rel="stylesheet" type="text/css" href="jk.css">
</head>
<body>
	<!-- Header Section -->
	<header class="<?php if (isset($_SESSION['email']) && isset($_SESSION['password'])) { echo 'logged-in'; } ?>">
  <div class="container">
    <h1>Patreg Uniform</h1>
    <nav>
	<nav>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="products.php">Products</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="profile.php">Profile</a></li>
  </ul>
</nav>

    </nav>
  </div>
</header>


	<!-- End Header Section -->

	<!-- Banner Section -->
	<div class="banner">
  <div class="banner-content">
    <h1>Patreg Uniform Company</h1>
    <p>Welcome to our Uniform Company page! We are a leading provider of high-quality uniforms for a wide range of industries and professions. Our mission is to provide our customers with durable, comfortable, and stylish uniforms that make them look and feel their best.

At our Uniform Company, we offer a wide range of uniform options to suit the needs of different industries and professions. Our uniforms are made from high-quality materials that are designed to withstand the rigors of daily wear and tear, ensuring that they last for a long time. We also offer customization options so that our customers can personalize their uniforms to meet their specific needs.</p>
    <a href="#" class="button">Shop Now</a>
  </div>
</div>

	<!-- End Banner Section -->

	<!-- Products Section -->
	<section class="products-section">
		<div class="container">
			<h2>Our Products</h2>
			<div class="product">
				<img src="img/pants.webp" alt="Product 1">
				<h3>Product 1</h3>
				<p class="price">$19.99</p>
				<form action="page.php" method="post">
  <input type="hidden" name="product" value="123">
  <input type="submit" value="SHOP NOW">
</form>


			</div>
			<div class="product">
				<img src="img/skirt girls.jpg" alt="Product 2">
				<h3>Product 2</h3>
				<p class="price">$24.99</p>
				<form action="page.php" method="post">
  <input type="hidden" name="product" value="123">
  <input type="submit" value="Add to Cart">
</form>


			</div>
			<div class="product">
				<img src="img/girls blouse.jpg" alt="Product 3">
				<h3>Product 3</h3>
				<p class="price">$39.99</p>
				<form action="shopping_cart.php" method="post">
  <input type="hidden" name="product" value="123">
  <input type="submit" value="Add to Cart">
</form>

			</div>
			<div class="product">
				<img src="img/polo shirts.webp" alt="Product 4">
				<h3>Product 4</h3>
				<p class="price">$29.99</p>
				<form action="shopping_cart.php" method="post">
  <input type="hidden" name="product" value="123">
  <input type="submit" value="Add to Cart">
</form>

			</div>
		</div>
    	<!-- Reviews Section Start -->
	<div class="reviews-section">
		<h2>Reviews</h2>
		<div class="review">
			<h4>John Doe</h4>
			<p>Great product, fast shipping!</p>
		</div>
		<div class="review">
			<h4>Jane Smith</h4>
			<p>Product arrived damaged, but customer service was quick to resolve the issue.</p>
		</div>
		<!-- Add new review form -->
		<h3>Add a Review</h3>
		<form action="submit_review.php" method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<label for="review">Review:</label>
			<textarea id="review" name="review" required></textarea>
			<input type="submit" value="Submit">
		</form>
	</div>
	<!-- Reviews Section End -->

	<!-- Contact Section Start -->
	<div class="contact-section">
		<h2>Contact Us</h2>
		<form action="submit_contact.php" method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
			<label for="message">Message:</label>
			<textarea id="message" name="message" required></textarea>
			<input type="submit" value="Send">
		</form>
	</div>
	<!-- Contact Section End -->

	<!-- Footer Start -->
	<footer>
		<p>&copy; 2023 MyStore</p>
	</footer>
	<!-- Footer End -->
	
	<!-- Add to Cart Modal -->
	<div id="cart-modal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<h2>Item Added to Cart</h2>
			<p>Continue shopping or proceed to checkout.</p>
			<div class="modal-buttons">
				<button><a href="cart.php">View Cart</a></button>
				<button><a href="checkout.php">Checkout</a></button>
			</div>
		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html