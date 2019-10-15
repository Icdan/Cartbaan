<?php
//Start the session to work with PHP sessions
session_start();
//Connect to database
include "db/db_connection.php";
//If user isn't logged in they'll be redirected to the log-in page.
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS files -->
    <?php
    include "includes/header.php";
    ?>
    <title>Homepage</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <?php
                echo "<p class='text-center'>Hallo " . $_SESSION['firstname'];
            ?>
        </div>
    </div>
</div>
<!-- Javascript files -->
<?php
include "includes/footer.php";
?>
</body>
</html>