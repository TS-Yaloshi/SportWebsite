<?php 
include("header.php");
require_once("db.php");
require("functions.php");
require("assets/data/post-form.php");

$topic = isset($_GET['id']) ? $_GET['id'] : "";
$_SESSION['topic-id'] = $topic;
$reacties = $firstPost = "";

if ( !empty($topic) ) {
    // eerste post
    $sql = "SELECT * FROM Topic WHERE id=:topicId";
    $query = $dbh->prepare($sql);
    $query->execute(array(':topicId' => $topic) );
    $firstPost = $query->fetch(PDO::FETCH_ASSOC);

    // reacties
    if ($firstPost) {
        $sql = "SELECT * FROM Post WHERE topic=:topicId";
        $query = $dbh->prepare($sql);
        $query->execute(array(':topicId' => $topic) );
        $reacties = $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
<main>
    <div class="card">
        <?php 
            if (!$firstPost) {
                echo  'Dit topic is niet gevonden';
                exit;
            }
        ?>

        <h1><?php echo $firstPost['title']; ?></h1>
        <small><a href="bezoeker.php?gebruikersnaam=<?php echo$firstPost['author']; ?>"><?php echo$firstPost['author']; ?></a> - <?php echo $firstPost['publication_date']; ?></small>
        <p><?php echo $firstPost['beschrijving']; ?></p>
    </div>
    
    <?php foreach($reacties as $reactie): ?>
    <div class="card">
        <small><a href="author.php?gebruikersnaam=<?php echo$reactie['author']; ?>"><?php echo$reactie['author']; ?></a> - <?php echo $reactie['publication_date']; ?></small>
        <p><?php echo $reactie['beschrijving']?></p>
    </div>
    <?php endforeach;?>

    <div class="card">
    <?php if (!isset( $_SESSION['logged-in'])):?>
            <a href="login.php">Log in</a> of <a href="registreren.php">registreer</a> om een bijdrage te plaatsen.
    <?php else:?>
        <form action="add-post.php" method="post" id="add-post" class="vertical-form">
            <?php createForm($postForm); ?>
            <input type="submit" class="action" value="Reactie plaatsen">
        </form>
    <?php endif;?>
    </div>
        
</main>
