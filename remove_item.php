<?php
// Start the session
session_start();

// Connect to the database
require_once "db_connection.php";

// Check if the form was submitted
if(isset($_POST['item_id'])) {
    // Get the item ID from the form
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);

    // Remove the item from the database
    $query = "DELETE FROM items WHERE ID = '$item_id'";
    $result = mysqli_query($conn, $query);

    // Check if the item was successfully removed from the database
    if($result) {
        $_SESSION['success_message'] = 'Item removed successfully';
    } else {
        $_SESSION['error_message'] = 'Error removing item';
    }
}

// Close the database connection
mysqli_close($conn);

// Redirect back to the admin page
header('Location: admini.php');
exit;
?>
