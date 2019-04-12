<?php session_start(); ?>
<!DOCTYPE html>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="assets/css/fonts.css">
        <link rel="stylesheet" href="assets/css/mobile-first.css">
        <title>Bergsport</title>
    </head>

    <body>
        <header class="main-nav">
            <input type="checkbox" name="mobile-menu-toggle" id="mobile-menu-toggle">
            <label for="mobile-menu-toggle"></label>

            <?php if (isset($_SESSION['logged-in'])): ?>
                <a href="logout.php" id="login-link"><?php echo $_SESSION['logged-in'] ?> - uitloggen</a>
            <?php else: ?>
                <a href="login.php" id="login-link">Inloggen</a>
            <?php endif;?>
            <nav>
                <ul>
                    <li>
                        <a href="video.php">video's</a>
                    </li>
                    <li>
                        <a href="forum.php" class="active">forum</a>
                        <ul>
                            <li>
                                <a href="rubriek.php?rubriek=1&rubriek_naam=Skiën">skiën</a>
                                <ul>
                                    <li><a href="rubriek.php?rubriek=5">skigebieden</a></li>
                                    <li><a href="rubriek.php?rubriek=6">weer & sneeuw</a></li>
                                    <li><a href="rubriek.php?rubriek=7">Materiaal</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="rubriek.php?rubriek=2&rubriek_naam=Snowboarden">snowboarden</a>
                                <ul>
                                    <li><a href="rubriek.php?rubriek=8">freeride</a></li>
                                    <li><a href="rubriek.php?rubriek=9">freestyle</a></li>
                                    <li><a href="rubriek.php?rubriek=10">alpineboarden</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="rubriek.php?rubriek=3&rubriek_naam=Bergwandelen">bergwandelen</a>
                                <ul>
                                    <li><a href="rubriek.php?rubriek=11">uitrusting</a></li>
                                    <li><a href="rubriek.php?rubriek=12">berggebieden</a></li>
                                    <li><a href="rubriek.php?rubriek=13">moeilijkheidsgraad</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="rubriek.php?rubriek=4&rubriek_naam=Bergbeklimmen">bergbeklimmen</a>
                                <ul>
                                    <li><a href="rubriek.php?rubriek=14">klimdisciplines</a></li>
                                    <li><a href="rubriek.php?rubriek=15">klimuitrusting</a></li>
                                    <li><a href="rubriek.php?rubriek=16">klimgebieden</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="logo">
                        <a href="index.php"><img src="assets/img/logo.svg" alt="logo"></a>
                    </li>
                    <li>
                        <a href="about-us.php">over ons</a>
                    </li>
                    <li>
                        <a href="bezoeker.php">bezoeker</a>
                    </li>
                    <li class="search">
                        <form action="zoeken.php" method="get" class="search-form">
                            <input type="search" name="full-search" id="full-search">
                            <input type="submit" value="zoeken" class="action">
                        </form>  
                    </li>
                </ul>
            </nav>
        </header>