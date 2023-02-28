<?php
// include the database connection file
require_once "db_connection.php";

// check if the form has been submitted
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    // get the values submitted in the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // retrieve the user with the matching email and password
    $sql = "SELECT * FROM adminu WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // check if the user exists
    if (mysqli_num_rows($result) == 1) {
        // start the session and store the user information
        session_start();
        $user = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $user['name'];
        $_SESSION['profile_picture'] = $user['profile_picture'];

        // redirect the user to the admini.php page
        header('Location: admini.php');
        exit();
    } else {
        echo "Incorrect email or password";
    }
}

// close the database connection
mysqli_close($conn);
?> 
