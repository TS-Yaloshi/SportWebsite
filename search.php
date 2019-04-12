<?php
    require_once("functions.php");
    require_once("db.php");
    $categories = ["Topic", "Post", "Gebruiker", "Rubriek"];
    $zoekterm = "";
    
    if ( !empty($_GET['search']) ) {
        $zoekterm = (isset($_GET['search'])) ? $_GET['search'] : "";
    }
    if ( !empty($_GET['full-search']) ) {
        $zoekterm = $_GET['full-search'];
    }
    if (!empty($zoekterm)) {
        $zoekterm = "%$zoekterm%";
    }

    $_SESSION['form-values']['full-search'] = $zoekterm;

    foreach($categories as $category) {
        $sql = zoeken($category);
        if ($sql != "") {
            $query = $dbh->prepare($sql);
            $query->execute(array($zoekterm, $zoekterm) );
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($results): ?>
                <h3><?php echo $category?></h3>
                <?php foreach ($results as $result): ?>
                    <div class="card">
                        <?php echo toonZoekresultaat($category, $result);?>
                    </div>
                <?php endforeach;
            endif;
        }
    }
?>