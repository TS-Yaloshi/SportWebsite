<?php
    include("header.php");
    require_once("db.php");
    require("functions.php");
    require("assets/data/topic-form.php");

    $rubriek = isset($_GET['rubriek']) ? $_GET['rubriek'] : "";
    $_SESSION['rubriek-id'] = $rubriek;
    $_SESSION['rubrieknaam'] = isset($_GET['rubriek_naam']) ? $_GET['rubriek_naam'] : "";
    $sub_categories ="";
    $sub = 0;
    
    if ( !empty($rubriek) ) {
        $sql = "SELECT * FROM Rubriek WHERE parent_rubriek=:rubriekNaam";
        $query = $dbh->prepare($sql);
        $query->execute(array(':rubriekNaam' => $rubriek) );
        $sub_categories = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!$sub_categories) {
            $sub = 1;
            $sql = "SELECT * FROM Rubriek WHERE id=:rubriekNaam";
            $query = $dbh->prepare($sql);
            $query->execute(array(':rubriekNaam' => $rubriek) );
            $sub_categories = $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>

<main>
    <h1><?php echo $_SESSION['rubrieknaam']; ?></h1>
    <?php if(!$sub_categories): ?>
            <p>Geen posts voor deze categorie gevonden.</p>
            <?php exit;?>
    <?php else:?>
        <?php foreach( $sub_categories as $sub_category): ?>
        <div class="card">
            <h2>
                <a href="rubriek.php?rubriek=<?php echo $sub_category['id']; ?>">
                    <?php echo $sub_category['naam']; ?>
                </a>
            </h2>
            <?php 
                $sql = "SELECT TOP (2) * FROM Topic WHERE rubriek=:parent ORDER BY publication_date DESC";
                $query = $dbh->prepare($sql);
                $query->execute(array(':parent' => $sub_category['id']));
                $topics = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php foreach( $topics as $topic): ?>
                <h3><a href="topic.php?id=<?php echo $topic['id']; ?>"><?php echo $topic['title']; ?></a></h3>
                <p><?php echo $topic['beschrijving']; ?></p>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
    <?php endif;?>

    <?php if($sub == 1):?>
        <div class="card">
        <?php if (!isset( $_SESSION['logged-in'])):?>
                <a href="login.php">Log in</a> of <a href="registreren.php">registreer</a> om een bijdrage te plaatsen.
            <?php else:?>
            <form action="add-topic.php" method="post" id="add-topic" class="vertical-form">
                <?php createForm($topicForm); ?>

                <input type="submit" class="action" value="Topic plaatsen">
            </form>
        </div>
        <?php endif;?>
    <?php endif;?>
</main>