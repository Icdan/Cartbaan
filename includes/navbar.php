<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Hunt en Lauda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cursussen
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="cursussen-overzicht.php">Overzicht</a>
                    <a class="dropdown-item" href="cursussen.php">Toevoegen</a>
                </div>
            </li>
            <?php
            if(isset($_SESSION['klant'])) {
                echo "
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Uitvoeringen
                </a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                    <a class='dropdown-item' href='uitvoeringen-overzicht.php'>Overzicht</a>
                    <a class='dropdown-item' href='uitvoeringen.php'>Toevoegen</a>
                </div>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='winkelwagen.php'>Winkelwagen</a>
            </li>";
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="carts.php">Carts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <?php
    if(isset($_SESSION['klant'])) {
    echo "<div class='nav navbar-nav navbar-right'>
        <a class='btn btn-primary' href='logout.php'>Log out<span class='sr-only'>(current)</span></a>
    </div>";
    } else {
        echo "<div class='nav navbar-nav navbar-right'>
        <a class='btn btn-primary' href='login.php'>Log in<span class='sr-only'>(current)</span></a>
    </div>";
    }
    ?>
</nav>