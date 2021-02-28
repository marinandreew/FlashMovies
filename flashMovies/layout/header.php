<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FlashMovies</title>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <header>
            <nav class="navbar navbar-expand-sm justify-content-center">
                <a href="index.php" title="FlashMovies" class="logo">
                    <img src="images/logo.png" height="120" width="120" alt="Logo">
                </a>
            </nav>
            <nav class="navbar navbar-expand-sm justify-content-center red">
                <ul class="navbar-nav">
                <li class="nav-item-home">
                        <a href="index.php" title="Home" class="logo">
                            <img src="images/home.png" height="40" width="40" alt="Logo">
                        </a>
                </li>
                    <?php
                    if($loggedIn) {
                        ?>
                        <li class="nav-item">
                            <a href="account.php" title="My Account Favourites" class="logo">
                                <img src="images/account.png" height="40" width="40" alt="Logo">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                        </ul>
                        <?php
                    } else {
                        ?>
                    <li class="nav-item">
                        <a href="login.php" title="Login/Register" class="logo">
                            <img src="images/account.png" height="40" width="40" alt="Logo">
                        </a>
                    </li>
                        <?php
                    }
                    ?>
                
            </nav>
        </header>
        <main>
            <div class="container">