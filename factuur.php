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
    <title>Factuur</title>
</head>
<body>
<?php
include "includes/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php
            echo "Klantnummer: " . $_SESSION['idcursist'];
            echo "<br>";
            echo $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];
            echo "<br>";
            echo $_SESSION['adres'];
            echo "<br>";
            echo $_SESSION['postcode'] . " " . $_SESSION['woonplaats'];
            echo "<br><br>";
            echo "<table>
                <tr>
                    <th>Omschrijving</th>
                    <th>Begindatum</th>
                    <th>Einddatum</th>
                    <th>Prijs</th>
                </tr>";
            $winkelwagen = array_unique($_SESSION['winkelwagen']);
            $subTotal = 0;
            foreach ($winkelwagen as $key => $value) {
                $uitvoeringNaamQuery = mysqli_query($conn, "SELECT * FROM `uitvoering` INNER JOIN `cursus` ON uitvoering.idcursus  = cursus.idcursus WHERE `iduitvoering` = '$value' ORDER BY uitvoering.begindatum ASC ");
                $row = mysqli_fetch_assoc($uitvoeringNaamQuery);
                echo "<tr>";
                echo "<td>" . $row['omschrijving'] . "</td><td>" . $row['begindatum'] . "</td><td>" . $row['einddatum'] . "</td><td>€" . $row['prijs'] . "</td>";
                echo "</tr>";
                $subTotal = $subTotal + $row['prijs'];
            }
            echo "<tr><td></td><td></td><td></td><td>€" . $subTotal . "</td></tr>";
            echo "<tr><td></td><td></td><td></td><td>€" . ($subTotal * 0.21) . "</td></tr>";
            echo "<tr><td></td><td></td><td></td><td>€" . ($subTotal * 1.21) . "</td></tr>";
            echo "</table>";
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