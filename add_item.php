<?php
// Start the session
session_start();

// Connect to the database
require_once "db_connection.php";

// Check if the form was submitted
if(isset($_POST['submit_item'])) {

    // Get the item details from the form
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Upload image
    $image_url = '';
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("jpg","jpeg","png","gif");

        if(in_array($imageFileType,$extensions_arr)) {
            if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file)) {
                $image_url = $target_file;
            }
        }
    }

    // Insert the item into the database
    $query = "INSERT INTO items (item_name, quantity, item_price, description, image) VALUES ('$item_name', '$quantity', '$price','$description', '$image_url')";
    $result = mysqli_query($conn, $query);

    // Check if the item was successfully added to the database
    if($result) {
        $_SESSION['success_message'] = 'Item added successfully';
        header('Location: admini.php');
        exit;
    } else {
        $_SESSION['error_message'] = 'Error adding item';
    }

}

// Close the database connection
mysqli_close($conn);
?>
