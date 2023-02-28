<?php
session_start();

// Check if the user is already logged in, if yes then redirect to dashboard page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: customers.php");
    exit;
}

// Include config file
require_once "db_connection.php";

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email address.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
}
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT name, email, password FROM signup WHERE email = ?";
        
        // Replace the variables with your own database details
        $host = 'localhost';
        $user = 'root';
        $db_password = '';
        $database = 'uniforms';

        // Create a connection to the MySQL server
        $link = mysqli_connect($host, $user, $db_password, $database);

        // Check if the connection was successful
        if (!$link) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $row = null;

            // prepare the query
            $stmt = mysqli_prepare($conn, "SELECT name, password FROM signup WHERE email = ?");
            
            // bind parameters and execute query
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            
            // get result and store in $row
            mysqli_stmt_bind_result($stmt, $id, $hashed_password);
            mysqli_stmt_fetch($stmt);
            
            // check if $row is not null before accessing its properties
            if ($row !== null && password_verify($password, $hashed_password)) {
                        // Password is correct, so start a new session
                        session_start();
                      
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $row['id'];
                        $_SESSION["email"] = $email;
                      
                        // Redirect user to welcome page
                        header("location: customers.php");
                      } else {
                        // Display an error message if password is not valid
                        $password_err = "Invalid password";
                      }
                      
                    }
                } 
                else{
                    // Display an error message if email doesn't exist
                    $email_err = "No account found with that email address.";
                }
             
    
            // Close statement
            mysqli_stmt_close($stmt);
            
    // Close connection
    mysqli_close($link);
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
     <link rel="stylesheet" type="text/css" href="pk.css">
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <label>Email</label>
<input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
<span class="invalid-feedback"><?php echo $email_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
<label>Password</label>
<input type="password" name="password" class="form-control">
<span class="invalid-feedback"><?php echo $password_err; ?></span>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Login">
</div>
<p>Don't have an account? <a href="sign_up.php">Sign up now</a>.</p>
</form>
</div>
</div>
</div>
</body>
</html>


