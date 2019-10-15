<?php
//Start the session to work with PHP sessions
session_start();
//Connect to database
include "db/db_connection.php";
//If the login button is clicked, execute the code down below
if (isset($_POST['login'])) {
    //Set email & password variables to use in the log-in check
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Select user where email & password match the entered values
    $loginQuery = mysqli_query($conn, "SELECT * FROM `cursist` WHERE email = '$email' && wachtwoord = '$password'");
    //If the email & password match, see how many rows we get
    if ($loginQuery) {
        $loginResult = mysqli_num_rows($loginQuery);
        //User accounts should be unique so we should only be getting 1 row back
        if ($loginResult == 1) {
            //Get our pulled data for the user and put it in session variables so we can use it later on in the session
            //Redirect user to the home page
            $row = mysqli_fetch_assoc($loginQuery);
            $_SESSION['firstname'] = $row['voornaam'];
            $_SESSION['lastname'] = $row['achternaam'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['klant'] = true;
            header("Location: index.php");
        } elseif ($_POST) {
            //Email or password is wrongly entered
            echo "Please enter a valid email or password";
        }
    } else {
        // Error message to show us where exactly there's a mistake in the log-in process
        echo "Something went wrong, contact the site administrator";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <?php
    include "includes/header.php"
    ?>
    <title>Log-in page</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <form action="" method="post">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" placeholder="Your e-mail" maxlength="75" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Your password" maxlength="25" required>
                </div>
                <input type="submit" name="login" value="Log in" class="btn btn-primary">
            </form>
        </div>
    </div>
    <?php
    include "includes/footer.php"
    ?>
</body>
</html>
