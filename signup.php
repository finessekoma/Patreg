<?php
// include the database connection file
require_once "db_connection.php";

// check if the form has been submitted
if (isset($_POST['action']) && $_POST['action'] == 'signup') {
    // get the values submitted in the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // insert the data into the database
    $sql = "INSERT INTO signup (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "New user created successfully";
        header('location:customers.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// close the database connection
mysqli_close($conn);
?>
