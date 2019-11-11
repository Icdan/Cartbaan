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
    <title>Cursussen overzicht</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table>
                <tr>
                    <th>Omschrijving</th>
                    <th>Wijzigen</th>
                </tr>
                <?php
                //Select and show all courses
                $getCursus = mysqli_query($conn, "SELECT * FROM `cursus`");
                //If we're able to get any courses, check how many there are and loop through the results, creating a table row with data for each of them
                //Also adds a button to delete a course
                if ($getCursus) {
                    $amountOfCursussen = mysqli_num_rows($getCursus);
                    for ($count = 1; $count <= $amountOfCursussen; $count++) {
                        $row = mysqli_fetch_assoc($getCursus);
                        echo "<tr><td>" . $row['omschrijving'] ."</td><td>€" . $row['prijs'] ."</td><td>" . "<form method='post'><input type='submit' name='verwijder' value ='Verwijder'><input type='hidden' name='idcursus' value='" . $row['idcursus'] . "'></form></td></tr>";
                    }
                }
                //If something is selected to be deleted, it will look at the id of the item being deleted and force a refresh of the page in order to make sure the course overview is updated
                if (isset($_POST['verwijder'])) {
                    $id = $_POST['idcursus'];
                    mysqli_query($conn, "DELETE FROM cursus WHERE `idcursus` = '$id'");
                    header("Location: cursussen-overzicht.php");
                }
                ?>
            </table>
        </div>
    </div>
</div>
<!-- Javascript files -->
<?php
include "includes/footer.php";
?>
</body>
</html>