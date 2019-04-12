<?php
    require_once("functions.php");

    $term = (isset($_GET['full-search'])) ? $_GET['full-search'] : "";
    $rubriek = (isset($_GET['rubriek'])) ? $_GET['rubriek'] : "";
    $volgorde = (isset($_GET['volgorde'])) ? $_GET['volgorde'] : "desc";
    $aantal = 25;
?>

<div class="card">
    <?php toonVideos($term, $rubriek, $volgorde, $dbh, $aantal);?>
</div>