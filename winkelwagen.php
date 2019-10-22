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
    <title>Winkelwagen</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <?php
            if (empty($_SESSION['winkelwagen'])) {
                echo "<p>U heeft niks in uw winkelwagen. <br> <a href='uitvoeringen-overzicht.php'>Wilt u iets toevoegen?</a></p>";
            } else {
                echo "<table>
                <th>Cursus</th>
                <th>Begindatum</th>
                <th>Einddatum</th>
                <th>Prijs</th>
                <th>Wijzig</th>";
                $winkelwagen = array_unique($_SESSION['winkelwagen']);
                foreach ($winkelwagen as $key => $value) {
                    $uitvoeringNaamQuery = mysqli_query($conn, "SELECT * FROM `uitvoering` INNER JOIN `cursus` ON uitvoering.idcursus  = cursus.idcursus WHERE `iduitvoering` = '$value' ORDER BY uitvoering.begindatum ASC ");
                    $row = mysqli_fetch_assoc($uitvoeringNaamQuery);
                    echo "<tr>";
                    echo "<td>" . $row['omschrijving'] . "</td><td>" . $row['begindatum'] . "</td><td>" . $row['einddatum'] . "</td><td>€" . $row['prijs'] . "</td><td><form method='post'><input type='submit' value='Annuleer' name='Annuleer'><input type='hidden' name='index' value='" . $key . "'></form></td>";
                    echo "</tr>";
                }
                echo "</table>";

                if (isset($_POST['Annuleer'])) {
                    $indexNo = $_POST['index'];
                    array_splice($_SESSION['winkelwagen'], $indexNo, 1);
                    header("Location: ww.php");
                }
                echo "<a class='btn btn-outline-primary' href='factuur.php'>Plaats bestelling</a>";
            }
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