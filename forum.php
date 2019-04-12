<?php include("header.php")?>
<?php require_once("db.php"); ?>
<main>
    <h1>Forum</h1>
    
    <?php 
        $sql = "SELECT * FROM Rubriek WHERE parent_rubriek IS NULL";
        $query = $dbh->prepare($sql);
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach($categories as $category): ?>
        <section>
            <h2>
                <a href="rubriek.php?rubriek=<?php echo $category['id']; ?>&rubriek_naam=<?php echo $category['naam'];?>">
                    <?php echo $category['naam']; ?>
                </a>
            </h2>
                <?php 
                    $sql = "SELECT * FROM Rubriek WHERE parent_rubriek=:parent";
                    $query = $dbh->prepare($sql);
                    $query->execute(array(':parent' => $category['id']));
                    $sub_categories = $query->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach( $sub_categories as $sub_category): ?>
                    <h3><?php echo $sub_category['naam']; ?></h3>
                    <?php
                        $sql = "SELECT TOP(1) * FROM Topic WHERE rubriek=:parent ORDER BY publication_date DESC";
                        $query = $dbh->prepare($sql);
                        $query->execute(array(':parent' => $sub_category['id']));
                        $topics = $query->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <?php foreach( $topics as $topic): ?>

                        <h4><a href="topic.php?id=<?php echo $topic['id']; ?>"><?php echo $topic['title']; ?></a></h4>
                        <p><?php echo $topic['beschrijving']; ?></p>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </section>
    <?php endforeach; ?>
</main>