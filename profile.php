<?php
// start the session
session_start();

// include the database connection file
require_once "db_connection.php";

// check if the user is logged in or signed up
if (!isset($_SESSION['user_id']) && !isset($_SESSION['signup_success'])) {
    // if not, redirect to the login or signup page
    header('location: login.php');
    exit;
}

// check if the form has been submitted
if (isset($_POST['action']) && $_POST['action'] == 'update_profile') {
    // get the values submitted in the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_id = $_SESSION['user_id'];

    // update the user information in the database
    $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$user_id'";
    mysqli_query($conn, $sql);

    // update the user information in the session
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;

    // display a success message
    $success_msg = "Profile information updated successfully";
}

// check if the form has been submitted to change the password
if (isset($_POST['action']) && $_POST['action'] == 'change_password') {
    // get the values submitted in the form
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_id = $_SESSION['user_id'];

    // retrieve the user information
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // check if the old password is correct
    if ($user['password'] != $old_password) {
        $error_msg = "Incorrect old password";
    } elseif ($new_password != $confirm_password) {
        // check if the new password and confirm password match
        $error_msg = "New password and confirm password do not match";
    } else {
        // update the password in the database
        $sql = "UPDATE users SET password='$new_password' WHERE id='$user_id'";
        mysqli_query($conn, $sql);

        // display a success message
        $success_msg = "Password changed successfully";
    }
}

// retrieve the user information
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile | MyWebsite</title>
</head>
<body>
    <h1>Welcome, <?php echo $user['name']; ?>!</h1>

    <?php if (isset($success_msg)): ?>
        <div style="color: green"><?php echo $success_msg; ?></div>
    <?php endif; ?>

    <?php if (isset($error_msg)): ?>
        <div style="color: red"><?php echo $error_msg; ?></div>
    <?php endif; ?>

    <h2>Profile information</h2>
    <form method="post" action="">
        <input type="hidden" name="action" value="update_profile">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>">
        <br>
        <input type="submit" name="update_profile" value="Update Profile">

    </form>

    <!-- display user orders -->
    <h2>My Orders</h2>
    <?php if ($orders): ?>
        <?php foreach ($orders as $order): ?>
            <?php
            $order_id = $order['order_id'];
            $product_id = $order['product_id'];
            $quantity = $order['quantity'];
            $total_price = $order['total_price'];
            $order_date = $order['order_date'];
            // retrieve the product details for the order
            $product_name = $order['product_name'];
            $product_image = $order['product_image'];
            ?>
            <div class='order'>
                <h3>Order #<?php echo $order_id; ?> - <?php echo $order_date; ?></h3>
                <img src='<?php echo $product_image; ?>'>
                <p><?php echo $product_name; ?></p>
                <p>Quantity: <?php echo $quantity; ?></p>
                <p>Total Price: <?php echo $total_price; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No orders found</p>
    <?php endif; ?>
</body>
</html>
