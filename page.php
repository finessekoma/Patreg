





<!DOCTYPE html>
<html>
<head>
	<title>Shop Now</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			margin-top: 50px;
		}

		form {
			margin: 50px auto;
			width: 50%;
			background-color: #fff;
			padding: 30px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
		}

		input[type="text"], select {
			display: block;
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 20px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			float: right;
		}

		.product-select {
			display: flex;
			flex-wrap: wrap;
		}

		.product-select label {
			flex: 1;
			margin-right: 20px;
		}

		.product-select select {
			flex: 2;
			margin-bottom: 0;
		}

		.product-search {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}

		.product-search label {
			margin-right: 20px;
		}

		.product-search input[type="text"] {
			margin-bottom: 0;
		}

		.size-color-select {
			display: flex;
			flex-wrap: wrap;
		}

		.size-color-select label {
			flex: 1;
			margin-right: 20px;
		}

		.size-color-select select {
			flex: 2;
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<h1>Shop Now</h1>
	<form>
		<div class="product-search">
			<label for="product-search">Search for a product:</label>
			<input type="text" id="product-search" name="product-search">
		</div>
		<div class="product-select">
			<label for="product-type">Product Type:</label>
			<select id="product-type" name="product-type">
				<option value="">Select Product Type</option>
				<option value="t-shirt">T-Shirt</option>
				<option value="hoodie">Hoodie</option>
				<option value="sweatshirt">Sweatshirt</option>
			</select>
			<label for="product-size">Size:</label>
			<select id="product-size" name="product-size">
				<option value="">Select Size</option>
				<option value="small">Small</option>
				<option value="medium">Medium</option>
				<option value="large">Large</option>
			</select>
			<label for="product-color">Color:</label>
			<select id="product-color" name="product-color">
            <option value="">Select Color</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
            </select>
            </div>
            <div class="size-color-select">
            <label for="product-quantity">Quantity:</label>
            <input type="text" id="product-quantity" name="product-quantity">
            <label for="product-price">Price:</label>
            <input type="text" id="product-price" name="product-price" readonly>
            </div>
            <input type="submit" value="Add to Cart">
			<!-- Button to redirect to checkout page -->
			<form action="checkout.php" method="POST">
    <input type="hidden" name="product_search" value="<?php echo $product_search; ?>">
    <input type="hidden" name="product_type" value="<?php echo $product_type; ?>">
    <input type="hidden" name="product_size" value="<?php echo $product_size; ?>">
    <input type="hidden" name="product_color" value="<?php echo $product_color; ?>">
    <input type="hidden" name="product_quantity" value="<?php echo $product_quantity; ?>">
    <input type="hidden" name="product_price" value="<?php echo $product_price; ?>">
    <button type="submit">Checkout</button>
</form>


            </form>
            <script>
            // Define the product data
            const products = [
              {
                name: "T-Shirt",
                sizes: [
                  { name: "Small", price: 20 },
                  { name: "Medium", price: 25 },
                  { name: "Large", price: 30 }
                ],
                colors: ["Red", "Blue", "Green"]
              },
              {
                name: "Hoodie",
                sizes: [
                  { name: "Small", price: 40 },
                  { name: "Medium", price: 45 },
                  { name: "Large", price: 50 }
                ],
                colors: ["Black", "Grey", "Navy"]
              },
              {
                name: "Sweatshirt",
                sizes: [
                  { name: "Small", price: 30 },
                  { name: "Medium", price: 35 },
                  { name: "Large", price: 40 }
                ],
                colors: ["Yellow", "Pink", "Purple"]
              }
            ];
            
            // Get references to the form elements
            const productSearch = document.getElementById("product-search");
            const productType = document.getElementById("product-type");
            const productSize = document.getElementById("product-size");
            const productColor = document.getElementById("product-color");
            const productQuantity = document.getElementById("product-quantity");
            const productPrice = document.getElementById("product-price");
            
            // Set up event listeners for the form elements
            productSearch.addEventListener("input", updateProductOptions);
            productType.addEventListener("change", updateSizeAndColorOptions);
            productSize.addEventListener("change", updatePrice);
            productColor.addEventListener("change", updatePrice);
            productQuantity.addEventListener("input", updatePrice);
            
            // Update the available product options based on the search input
            function updateProductOptions() {
              const searchValue = productSearch.value.toLowerCase();
              const filteredProducts = products.filter(product =>
                product.name.toLowerCase().includes(searchValue)
              );
              const productTypeOptions = filteredProducts.map(product =>
                `<option value="${product.name}">${product.name}</option>`
              );
              productType.innerHTML = `<option value="">Select Product Type</option>${productTypeOptions}`;
              updateSizeAndColorOptions();
            }
            
            // Update the available size and color options based on the selected product type
            function updateSizeAndColorOptions() {
              const selectedProduct = products.find(product => product.name === productType.value);
              const sizeOptions = selectedProduct.sizes.map(size =>
                `<option value="${size.name}" data-price="${size.price}">${size.name}</option>`
              );
              const colorOptions = selectedProduct.colors.map(color =>
                `<option value="${color}">${color}</option>`
              );
              productSize.innerHTML = `<option value="">Select Size</option>${sizeOptions}`;
              productColor.innerHTML = `<option value="">Select Color</option>${colorOptions}`;
              updatePrice();
            }
            
            // Update the displayed price based on the selected size, color, and quantity
            function updatePrice() {
              const selectedSizeOption = productSize.options[productSize.selectedIndex];
              const selectedColorOption = productColor.options[productColor.selectedIndex];
              const selectedQuantity = parseInt(productQuantity.value);
              const pricePerUnit = parseInt(selectedSizeOption.dataset.price);
              const totalPrice = pricePerUnit * selectedQuantity;
              productPrice.value = `$${totalPrice.toFixed(2)}`;
            }
        </script>     
		<?php
	// Check if form was submitted
	if (isset($_POST['submit'])) {

		// Get form data
		$product_search = $_POST['product_search'];
		$product_type = $_POST['product_type'];
		$product_size = $_POST['product_size'];
		$product_color = $_POST['product_color'];
		$product_quantity = $_POST['product_quantity'];
		$product_price = $_POST['product_price'];

		// Connect to database
		require_once "db_connection";

		// Prepare SQL statement
		$sql = "INSERT INTO orders (product_search, product_type, product_size, product_color, product_quantity, product_price) VALUES ('$product_search','$product_type','$product_size','$product_color','$product_quantity','$product_price')";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ssssis", $product_search, $product_type, $product_size, $product_color, $product_quantity, $product_price);
		$product_search = $_POST['product_search'];
		$product_type = $_POST['product_type'];
		$product_size = $_POST['produc_size'];
		$product_color = $_POST['product_color'];
		$product_quantity = $_POST['product_quantity'];
		$product_price = 0;      
		// Calculate product price based on type and quantity
		if ($product_type == 't-shirt') {
			$product_price = 20 * $product_quantity;
		} else if ($product_type == 'hoodie') {
			$product_price = 30 * $product_quantity;
		} else if ($product_type == 'sweatshirt') {
			$product_price = 25 * $product_quantity;
		}
		
		$stmt->execute();
		$stmt->close();
		$mysqli->close();
	}
	 ?>
            
            </body>
            </html>
         
          
            