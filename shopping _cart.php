
<!DOCTYPE html>
<html>
  <head>
    <title>Shopping Cart</title>
    <script>
      function calculateTotal() {
        var price = 10; // Replace with the actual price of the item
        var quantity = document.getElementById("quantity").value;
        var total = price * quantity;
        document.getElementById("total").innerHTML = "$" + total.toFixed(2);
      }
    </script>
  </head>
  <body>
    <h1>Item Name</h1>
    <form>
      <label for="size">Size:</label>
      <select id="size">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
      </select>
      <br>
      <label for="color">Color:</label>
      <select id="color">
        <option value="Red">Red</option>
        <option value="Blue">Blue</option>
        <option value="Green">Green</option>
      </select>
      <br>
      <label for="quantity">Quantity:</label>
      <input type="number" id="quantity" min="1" max="10" value="1">
      <br>
      <button type="button" onclick="calculateTotal()">Add to Cart</button>
      <p>Total: <span id="total">$10.00</span></p>
    </form>
  </body>
</html>
