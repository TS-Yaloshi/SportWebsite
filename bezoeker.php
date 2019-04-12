<?php 
    include("header.php");
    require("db.php");
    require("functions.php");
    $gebruiker = "";

    if(isset($_GET['gebruikersnaam'])) {
        $gebruiker = $_GET['gebruikersnaam'];
    } else if (isset($_SESSION['logged-in'])) {
        $gebruiker = $_SESSION['logged-in'];
    } else {
        header("Location: login.php");
    }
?>
<main>
    <h1>Activiteit van <?php echo $gebruiker;?></h1>

    <div class="card">
        <?php toonRecentePosts($dbh, "", $gebruiker, "post");?>
    </div>
</main>
<?php 
    include("footer.php");
?>