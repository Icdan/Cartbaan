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
            <form method="post">
                <label>Begindatum</label>
                <br>
                <input type="date" name="dateStart">
                <br><br>
                <label>Einddatum</label>
                <br>
                <input type="date" name="dateEnd">
                <br><br>
                <label>Selecteer cursus</label><br>
                <select name="select">
                    <?php
                    //Select all options for a course
                    $getCourses = mysqli_query($conn, "SELECT * FROM `cursus`");
                    //If we're able to get any courses, check how many there are and loop through the results, creating a selectable option for each of them
                    if ($getCourses) {
                        $amountOfCourses = mysqli_num_rows($getCourses);
                        for ($count = 1; $count <= $amountOfCourses; $count++) {
                            $row = mysqli_fetch_assoc($getCourses);
                            echo "<option value='". $row['idcursus'] ."' name='". $row['idcursus'] ."'>" . $row['omschrijving'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <br><br>
                <input type="submit" value="Toevoegen" name="submit">
                <?php
                if (isset($_POST['submit'])) {
                    $idcursus = $_POST['select'];
                    $begindatum = $_POST['dateStart'];
                    $einddatum = $_POST['dateEnd'];
                    // change idcursist to iddocent if we would want one of the actual teachers to add the execution of the course
                    // While testing, make the idnumber for the docent exists in the docent table
                    $iddocent = $_SESSION['idcursist'];
//                    mysqli_query($conn, "INSERT INTO uitvoering('begindatum', 'einddatum', 'iddocent') VALUES('$begindatum', '$einddatum', '$iddocent')");
                    mysqli_query($conn, "INSERT INTO `uitvoering`(`idcursus`, `begindatum`, `einddatum`, `iddocent`) VALUES('$idcursus', '$begindatum', '$einddatum', '$iddocent')");
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