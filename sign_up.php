<?php
session_start();
// include the database connection file
require_once "db_connection.php";

// define variables and initialize with empty values
$name = $email = $password = "";
$name_err = $email_err = $password_err = "";

// process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_SESSION["username"])) {
		$username = $_SESSION["username"];
	} else {
		$username = ""; // set the username to an empty string if the key is not set
	}

    // validate name
    if (empty(trim($_POST["username"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["username"]);
    }

    // validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        // prepare a select statement
        $sql = "SELECT name FROM signup WHERE email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // set parameters
            $param_email = trim($_POST["email"]);

            // attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // store result
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email address is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // close statement
            mysqli_stmt_close($stmt);
        }
    }

    // validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // check input errors before inserting into database
    if (empty($name_err) && empty($email_err) && empty($password_err)) {

        // prepare an insert statement
        $sql = "INSERT INTO signup (name, email, password) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_password);

            // set parameters
            $param_name = $name;
            $param_email = $email;
            $param_password = $password;

            // attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // redirect to login page
                header("location: customers.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // close statement
            mysqli_stmt_close($stmt);
        }
    }

    // close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="t.css">
</head>

<body>
    <div class="container">
        <h2>Sign Up</h2>
        <p>Please fill in this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_err)) ?>">
<input type="text" name="username" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
<span class="help-block"><?php echo $name_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Enter your email">
<span class="help-block"><?php echo $email_err; ?></span>
</div>

<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
<input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Enter your password">
<span class="help-block"><?php echo $password_err; ?></span>
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" value="Sign Up">
</div>

<p>Already have an account? <a href="login.php">Login here</a>.</p>
</form>
</div>
</div>
</div>
</body>
</html>
