<?php
  // Connect to the database
  require_once "db_connection.php";
  // Get all items from the inventory table
  $sql = "SELECT * FROM inventory";
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  if (!$conn) {
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  }
  
  $result = $conn->query($sql);
  mysqli_close($conn);

  // Display the inventory table
  if ($result->num_rows > 0) {
    echo "<h2>Inventory</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Item Name</th>";
    echo "<th>Quantity</th>";
    echo "<th>Price</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["item_name"] . "</td>";
      echo "<td id='" . $row["item_id"] . "-quantity'>" . $row["quantity"] . "</td>";
      echo "<td id='" . $row["item_id"] . "-price'>$" . $row["price"] . "</td>";
      echo "<td>";
      echo "<form action='sell_item.php' method='post'>";
      echo "<input type='hidden' name='item_id' value='" . $row["item_id"] . "' />";
      echo "<input type='submit' value='Sell' />";
      echo "</form>";
      echo "</td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  } else {
    echo "No items found in inventory.";
  }
?>
<script>
function sellItem(itemId) {
  // Send an AJAX request to sell.php
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Update the quantity on the page
      document.getElementById(itemId + "-quantity").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("POST", "sell.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("item_id=" + itemId);
}
</script>