<?php
  // Connect to the database
  require_once "db_connection.php";

  // Get the item ID from the form
  $itemId = $_POST["item_id"];

  // Get the current quantity of the item from the database
  $sql = "SELECT quantity FROM inventory WHERE item_id = $itemId";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $quantity = $row["quantity"];

  // Update the quantity in the database
  if ($quantity > 0) {
    $quantity--;
    $sql = "UPDATE inventory SET quantity = $quantity WHERE item_id = $itemId";
    if ($conn->query($sql) === TRUE) {
      echo "Item sold successfully.";
      header ('location: admini.php');
    } else {
      echo "Error updating item: " . $conn->error;
    }
  } else {
    echo "Item out of stock.";
  }

  mysqli_close($conn);
?>
