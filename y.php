<?php
  // Connect to the database and retrieve payment information
  $db_host = 'localhost';
  $db_name = 'my_database';
  $db_user = 'my_username';
  $db_password = 'my_password';

  $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM payments";
  $result = $conn->query($sql);

  $payments = array();

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $payments[] = $row;
    }
  }

  <!DOCTYPE html>
  <html>
  <head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
  </head>
  <body>
    <header>
      <h1>Admin Page</h1>
    </header>
    <nav>
      <ul>
        <li><a href="#manage-orders">Manage Orders</a></li>
        <li><a href="#manage-inventory">Manage Inventory</a></li>
        <li><a href="#manage-users">Manage Users</a></li>
        <li><a href="#manage-payments">Manage Payments</a></li>
      </ul>
    </nav>
    <section id="manage-orders">
      <h2>Manage Orders</h2>
      <!-- HTML code for managing orders goes here -->
    </section>
    <section id="manage-inventory">
      <h2>Manage Inventory</h2>
      <!-- HTML code for managing inventory goes here -->
    </section>
    <section id="manage-users">
      <h2>Manage Users</h2>
      <!-- HTML code for managing users goes here -->
    </section>
    <section id="manage-payments">
      <h2>Manage Payments</h2>
      <table>
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Total Amount Paid</th>
          </tr>
        </thead>
        <tbody>
          <!-- PHP code to retrieve payment information and generate table rows goes here -->
        </tbody>
      </table>
    </section>
 
  
  echo '<!DOCTYPE html>';
  echo '<html>';
  echo '<head>';
  echo '<title>Admin Page</title>';
  echo '<link rel="stylesheet" type="text/css" href="admin.css">';
  echo '</head>';
  echo '<body>';
  echo '<header>';
  echo '<h1>Admin Page</h1>';
  echo '</header>';
  echo '<nav>';
  echo '<ul>';
  echo '<li><a href="#manage-orders">Manage Orders</a></li>';
  echo '<li><a href="#manage-inventory">Manage Inventory</a></li>';
  echo '<li><a href="#manage-users">Manage Users</a></li>';
  echo '<li><a href="#manage-payments">Manage Payments</a></li>';
  echo '</ul>';
  echo '</nav>';
  echo '<section id="manage-orders">';
  echo '<h2>Manage Orders</h2>';
  <table>
  <thead>
    <tr>
      <th>Order ID</th>
      <th>Customer Name</th>
      <th>Order Date</th>
      <th>Order Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>001</td>
      <td>John Smith</td>
      <td>2022-02-20</td>
      <td>Shipped</td>
    </tr>
    <tr>
      <td>002</td>
      <td>Jane Doe</td>
      <td>2022-02-21</td>
      <td>Processing</td>
    </tr>
    <!-- More rows of data go here -->
  </tbody>
</table>  echo '</section>';
  echo '<section id="manage-inventory">';
  echo '<h2>Manage Inventory</h2>';
  // Generate HTML code for managing inventory here
  echo '</section>';
  echo '<section id="manage-users">';
  echo '<h2>Manage Users</h2>';
  // Generate HTML code for managing users here
  echo '</section>';
  echo '<section id="manage-payments">';
  echo '<h2>Manage Payments</h2>';
  echo '<table>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Order ID</th>';
  echo '<th>Customer Name</th>';
  echo '<th>Total Amount Paid</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  foreach ($payments as $payment) {
    echo '<tr>';
    echo '<td>' . $payment['order_id'] . '</td>';
    echo '<td>' . $payment['customer_name'] . '</td>';
    echo '<td>$' . number_format($payment['total_amount_paid'], 2) . '</td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';
  echo '</section>';
  echo '</body>';
  echo '</html>';

  // Close the database connection
  $conn->close();
?>
 </body>
  </html>