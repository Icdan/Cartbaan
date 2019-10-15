<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Hunt en Lauda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li><li class="nav-item">
                <a class="nav-link" href="cursussen.php">Cursussen</a>
            </li>
                <a class="nav-link" href="carts.php">Carts</a>
            </li>
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