<?php 
    session_start();
    require("db.php");

    if ( empty($_POST['topic-title']) ) {
        $_SESSION['error']['topic-title'] = "Voer a.u.b. een titel in.";
    }

    if ( empty($_POST['topic-title']) ) {
        $_SESSION['error']['topic-text'] = "Topic mag niet leeg zijn!";
    }

    if ( !isset($_SESSION['error']['topic-title']) && !isset($_SESSION['error']['topic-text'])) {
        $title = $_POST['topic-title'];
        $text = $_POST['topic-text'];
        $author = $_SESSION['logged-in'];
        $rubriekId = $_SESSION['rubriek-id'];
        $date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO Topic (title, beschrijving, author, rubriek, publication_date) VALUES (:topicTitle, :topicText, :author, :rubriek, :pub_date);";
        $query = $dbh->prepare($sql);
        $query->execute([':topicTitle' => $title, ':topicText' => $text, ':author' => $author, ':rubriek' => $rubriekId, ':pub_date' => $date]);
        header("Location: rubriek.php?rubriek=".$rubriekId."&rubriek_naam=".$_SESSION['rubrieknaam']);
    } else {
        header("Location: rubriek.php?rubriek=".$rubriekId."&rubriek_naam=".$_SESSION['rubrieknaam']);
    }
?>