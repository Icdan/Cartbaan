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
    <title>Cursussen toevoegen</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST">
                <label>Cursus</label>
                <br>
                <input type="text" required name="omschrijving" placeholder="Omschrijving" maxlength="45">
                <input type="text" required name="prijs" placeholder="Prijs" maxlength="45">
                <br><br>
                <input type="submit" value="Toevoegen" name="toevoegen">
                <?php
                //Select all options for a course
                if (isset($_POST['omschrijving'])) {
                    $amountOfRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cursus"));
                    $newID = $amountOfRows;
                    $omschrijving = $_POST['omschrijving'];
                    $prijs = $_POST['prijs'];
                    $insertCursus = mysqli_query($conn, "INSERT INTO cursus (`omschrijving`, `prijs`) VALUES('$omschrijving', '$prijs')");
                }
                ?>
            </form>
        </div>
    </div>
</div>
<!-- Javascript files -->
<?php
include "includes/footer.php";
?>
</body>
</html>