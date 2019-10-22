<?php
//Start the session to work with PHP sessions
session_start();
//Connect to database
include "db/db_connection.php";
//If user isn't logged in they'll be redirected to the log-in page.
if (!$_SESSION['loggedin']) {
    header("Location: login.php");
}
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
    <title>Uitvoeringen overzicht</title>
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
                    <th>Begindatum</th>
                    <th>Einddatum</th>
                    <th>Wijzigen</th>
                    <th>Bestellen</th>
                </tr>
                <?php
                //Select and show all courses
                $getUitvoeringen = mysqli_query($conn, "SELECT * FROM `uitvoering` INNER JOIN `cursus` ON uitvoering.idcursus  = cursus.idcursus ORDER BY uitvoering.begindatum ASC");
                //If we're able to get any courses, check how many there are and loop through the results, creating a table row with data for each of them
                //Also adds a button to delete a course
                if ($getUitvoeringen) {
                    $amountOfExec = mysqli_num_rows($getUitvoeringen);
                    for ($count = 1; $count <= $amountOfExec; $count++) {
                        $row = mysqli_fetch_assoc($getUitvoeringen);
                        echo "<tr><td>" . $row['omschrijving'] . "</td><td>" . $row['begindatum'] . "</td><td>" . $row['einddatum'] . "</td><td>" . "<form method='post'><input type='submit' name='verwijder' value ='Verwijder'><input type='hidden' name='iduitvoering' value='" . $row['iduitvoering'] . "'></td>
<td><input type='submit' name='bestel' value ='Bestel'></form></td><td>" . $row['iduitvoering'] . "</td>
</tr>";
                    }
                }
                //If something is selected to be deleted, it will look at the id of the item being deleted and force a refresh of the page in order to make sure the course overview is updated
                if (isset($_POST['verwijder'])) {
                    $id = $_POST['iduitvoering'];
                    mysqli_query($conn, "DELETE FROM uitvoering WHERE `iduitvoering` = '$id'");
                    header("Location: ");
                } elseif (isset($_POST['bestel'])) {
                    $id = $_POST['iduitvoering'];
                    array_push($_SESSION['winkelwagen'], $id);
//                    $cursist = $_SESSION['idcursist'];
//                    mysqli_query($conn, "INSERT INTO `uitvoering_has_cursist`(`iduitvoering`, `idcursist`) VALUES ('$id', '$cursist')");
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