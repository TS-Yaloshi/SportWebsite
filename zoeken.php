<?php 
    include("header.php"); 
    require_once("functions.php");
    require("assets/data/search-form.php");
?>
<main>
    <h1>Zoeken</h1>
    <form action="zoeken.php" id="search-page" method="get">
        <?php createForm($searchForm); ?>
        <input type="submit" class="action" value="zoeken">
    </form>
    <div class="search-results">
        <h2>Zoekresultaten</h2>
        <?php require_once("search.php")?>
    </div>
</main>
<?php include("footer.php");?>