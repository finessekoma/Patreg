<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
  <link rel="stylesheet" href="checkout.css">
</head>
<body>
	<h1>Patreg Checkout</h1>
	<h2>Product Summary</h2>
<table>
  <tr>
    <th>Product Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
  </tr>
  <?php
  // Connect to the database
  require_once "db_connection.php";
  // Execute a query to retrieve the data
  $sql = "SELECT * FROM orders";
  $result = mysqli_query($conn, $sql);

  // Check if there are any rows returned
  if (mysqli_num_rows($result) > 0) {
    // Loop through the results and generate HTML code to display the data
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row["product_search"] . "</td>";
      echo "<td>" . $row["product_price"] . "</td>";
      echo "<td>" . $row["product_quantity"] . "</td>";
      echo "<td>" . $row["product_price"] * $row["product_quantity"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='4'>No products added to the cart.</td></tr>";
  }

  // Close the database connection
  mysqli_close($conn);
  ?>


</table>
	<h2>Billing Information</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>

		<label for="address">Address:</label>
		<input type="text" id="address" name="address" required>

		<label for="city">City:</label>
		<input type="text" id="city" name="city" required>

		<label for="state">State:</label>
		<input type="text" id="state" name="state" required>

		<label for="zip">Zip Code:</label>
		<input type="text" id="zip" name="zip" required>

		<label for="country">Country:</label>
		<input type="text" id="country" name="country" required>

		<h2>Shipping Information</h2>

		<label for="shipping-address">Shipping Address:</label>
		<input type="text" id="shipping-address" name="shipping-address" required>

		<label for="shipping-city">Shipping City:</label>
		<input type="text" id="shipping-city" name="shipping-city" required>

		<label for="shipping-state">Shipping State:</label>
		<input type="text" id="shipping-state" name="shipping-state" required>

		<label for="shipping-zip">Shipping Zip Code:</label>
		<input type="text" id="shipping-zip" name="shipping-zip" required>

		<label for="shipping-country">Shipping Country:</label>
		<input type="text" id="shipping-country" name="shipping-country" required>

		<h2>Payment Information</h2>

		<label for="card">Card Type:</label>
		<select id="card" name="card" required>
		  <option value="">Select Card Type</option>
		  <option value="visa">Visa</option>
		  <option value="mastercard">Mastercard</option>
		  <option value="discover">Discover</option>
		</select>

		<label for="cardnumber">Card Number:</label>
<input type="text" id="cardnumber" name="cardnumber" required>

<label for="expmonth">Expiration Month:</label>
<select id="expmonth" name="expmonth" required>
  <option value="">Select Month</option>
  <option value="01">January</option>
  <option value="02">February</option>
  <option value="03">March</option>
  <option value="04">April</option>
  <option value="05">May</option>
  <option value="06">June</option>
  <option value="07">July</option>
  <option value="08">August</option>
  <option value="09">September</option>
  <option value="10">October</option>
  <option value="11">November</option>
  <option value="12">December</option>
</select>

<label for="expyear">Expiration Year:</label>
<select id="expyear" name="expyear" required>
  <option value="">Select Year</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  <option value="2026">2026</option>
</select>

<label for="cvv">CVV:</label>
<input type="text" id="cvv" name="cvv" required>

<label for="promo">Promotional Code:</label>
    <input type="text" id="promo" name="promo">

    <input type="submit" value="Place Order">


</fieldset>
</form>

