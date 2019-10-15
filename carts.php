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
        <div class="col-12">
            <table>
                <tr>
                    <th>Cart nummer</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
                <?php
                $getCarts = mysqli_query($conn, "SELECT * FROM `cart`");

                if ($getCarts) {
                    $amountOfCarts = mysqli_num_rows($getCarts);
                    for ($count = 1; $count <= $amountOfCarts; $count++) {
                        $row = mysqli_fetch_assoc($getCarts);
                        echo "<tr><td>" . $row['nummer'] . "</td><td>" . $row['merk'] . "</td><td>" . $row['type'] . "</td><td>" . $row['status'] . "</td></tr>";
                    }
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