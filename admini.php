<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<style>
		/* Global Styles */
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			color: #333;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #555;
			color: white;
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 1px;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
		input[type="text"],
		textarea {
			padding: 8px;
			border: 1px solid #ddd;
			border-radius: 4px;
			width: 100%;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 8px 16px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		/* Page-specific styles */
		h1 {
			margin: 24px 0;
			font-size: 28px;
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: #555;
			border-bottom: 2px solid #ddd;
			padding-bottom: 8px;
		}
		.orders-table {
			margin-bottom: 48px;
		}
		.orders-table th {
			background-color: #2196F3;
			color: white;
		}
		.inventory-table {
			margin-bottom: 48px;
		}
		.inventory-table th {
			background-color: #F44336;
			color: white;
		}
		.add-item-form label,
		.remove-item-form label {
			display: block;
			margin-bottom: 8px;
			font-weight: bold;
			color: #555;
		}
		.add-item-form textarea {
			height: 120px;
		}
		.remove-item-form {
			margin-bottom: 24px;
		}
	</style>
</head>
<body>
	<h1>Orders</h1>
	<table class="orders-table">
		<tr>
			<th>Order ID</th>
			<th>Customer ID</th>
			<th>Item Name</th>
			<th>Quantity</th>
			<th>Total Price</th>
			<th>Order Date</th>
		</tr>
		<?php
			// Step 1: Connect to the database
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "uniforms";

			$conn = new mysqli($servername, $username, $password, $dbname);

			// Step 2: Retrieve data from the database
			$sql = "SELECT * FROM items";
			$result = $conn->query($sql);

			// Step 3: Display the table
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo"<td>".$row["order_id"]."</td>";
        echo "<td>".$row["customer_id"]."</td>";
        echo "<td>".$row["item_name"]."</td>";
        echo "<td>".$row["quantity"]."</td>";
        echo "<td>".$row["total_price"]."</td>";
        echo "<td>".$row["order_date"]."</td>";
        echo "</tr>";
        }
        ?>
        </table><h1>Inventory</h1>
<table>
	<tr>
    <th>image</th>
		<th>Item ID</th>
		<th>Item Name</th>
		<th>Description</th>
		<th>Price</th>
		<th>Quantity</th>
    
	</tr>
	<?php
		// Step 1: Connect to the database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "uniforms";

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Step 2: Retrieve data from the database
		$sql = "SELECT * FROM items";
		$result = $conn->query($sql);

		// Step 3: Display the table
		while($row = $result->fetch_assoc()) {
			echo "<tr>";
      echo "<td><img src='".$row["image"]."' width='100'></td>";
			echo "<td>".$row["ID"]."</td>";
			echo "<td>".$row["item_name"]."</td>";
			echo "<td>".$row["description"]."</td>";
			echo "<td>$".$row["item_price"]."</td>";
			echo "<td>".$row["quantity"]."</td>";
      
			echo "</tr>";
		}
	?>
</table>

<h1>Add Item</h1>
<form method="post" action="add_item.php" enctype="multipart/form-data">
	<label for="item_name">Item Name:</label>
	<input type="text" name="item_name"><br>
	<label for="description">Description:</label>
	<textarea name="description"></textarea><br>
	<label for="price">Price:</label>
	<input type="text" name="price"><br>
	<label for="quantity">Quantity:</label>
	<input type="text" name="quantity"><br>
	<label for="image">Image:</label>
	<input type="file" name="image"><br>
	<label for="category">Category:</label>
	<select name="category">
		<option value="1">Truck Suit</option>
		<option value="2">Sweaters</option>
		<option value="3">Dresses</option>
		<option value="4">Shirts</option>
		<option value="5">Tie</option>
		<option value="6">T-Shirts</option>
	</select><br>
	<input type="submit" name="submit_item" value="Add Item">
</form>

<?php
// check if the form was submitted
if (isset($_POST['submit_item'])) {
	// get the form data
	$item_name = $_POST['item_name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$category_id = $_POST['category'];

	// connect to the database
	$conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

	// insert the item into the database
	$sql = "INSERT INTO items (item_name, description, price, quantity, category_id) VALUES ('$item_name', '$description', '$price', '$quantity', '$category_id')";
	mysqli_query($conn, $sql);

	// close the database connection
	mysqli_close($conn);

	// redirect to the homepage
	header('Location: admini.php');
	exit;
}
// connect to the database
require_once "db_connection";

// insert the categories into the database
$sql = "INSERT INTO category (name) VALUES ('Truck Suit')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO category (name) VALUES ('Sweaters')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO category (name) VALUES ('Dresses')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO category (name) VALUES ('Shirts')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO category (name) VALUES ('Tie')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO category (name) VALUES ('T-Shirts')";
mysqli_query($conn, $sql);

// close the database connection
mysqli_close($conn);

?>




<h1>Remove Item</h1>
<form method="post" action="remove_item.php">
	<label for="item_id">Item ID:</label>
	<input type="text" name="item_id"><br>
	<input type="submit" value="Remove Item">
</form>

<script>
	// Confirm removal before submitting the form
	document.querySelector("form[action='remove_item.php']").addEventListener("submit", function(event) {
		if (!confirm("Are you sure you want to remove this item?")) {
			event.preventDefault();
		}
	});
</script>
</body>
</html>
/* Advanced CSS /
/ Here's a sample CSS with some advanced styling techniques */

/* Style the body with a background image */
<style>
body {
background-image: url("background.jpg");
background-size: cover;
background-position: center;
}

/* Style the tables */
table {
border-collapse: collapse;
margin: 20px 0;
width: 100%;
}

th, td {
padding: 12px;
text-align: left;
border: 1px solid #ddd;
}

th {
background-color: #f2f2f2;
color: #333;
}

/* Style the form */
form {
margin: 20px 0;
}

label {
display: block;
margin-bottom: 5px;
}

input[type="text"], textarea {
padding: 10px;
border: 1px solid #ccc;
border-radius: 4px;
resize: vertical;
}

input[type="submit"] {
background-color: #4CAF50;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
}

input[type="submit"]:hover {
background-color: #45a049;
}

table {
border-collapse: collapse;
width: 100%;
}

th, td {
text-align: left;
padding: 8px;
}
th {
background-color: #4CAF50;
color: white;
}

tr:nth-child(even) {
background-color: #f2f2f2;
}
table {
  border-collapse: collapse;
}
td {
  padding: 10px;
}
tr:hover {
  background-color: #ddd;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
th {
  background-color: #4CAF50;
  color: white;
}
</style>
