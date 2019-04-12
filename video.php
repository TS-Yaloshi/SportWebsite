<?php
    include("header.php");
    require("functions.php");
    require_once("db.php");
    require("assets/data/search-form.php");
?>
<main>
    <h1>Video's</h1>
    <form action="video.php" id="search-page" method="get">
        <?php createForm($searchForm); ?>
        <select name="volgorde" id="volgorde">
            <option value="desc">Datum - Aflopend</option>
            <option value="asc">Datum - Oplopend</option>
        </select>
        <?php maakRubriekSelect($dbh)?>
        <input type="submit" class="action" value="zoeken">
    </form>
    <div class="search-results-video">
        <h2>Zoekresultaten</h2>
        <?php require_once("get-video.php")?>
    </div>
</main>
<?php include("footer.php");?>