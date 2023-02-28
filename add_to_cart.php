<?php
    // Connect to database
   require_once"db_connection";

    // Retrieve item data from POST parameters
    $name = $_POST["name"];
    $price = $_POST["price"];

    // Insert item into shopping cart table
    $sql = "INSERT INTO shopping_cart (name, price) VALUES ('$name', $price)";
    if ($conn->query($sql) === TRUE) {
        echo "Item added to cart.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
