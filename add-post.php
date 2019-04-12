<?php 
    session_start();
    require("db.php");

    if ( empty($_POST['newPost']) ) {
        $_SESSION['error']['newPost'] = "Voer a.u.b. een bericht in.";
    }

    if ( !isset($_SESSION['error']['newPost']) ) {
        $text = $_POST['newPost'];
        $thePostAuthor = $_SESSION['logged-in'];
        $topicId = $_SESSION['topic-id'];
        $date = date("Y-m-d H:i:s");


        $sql = "INSERT INTO Post (beschrijving, author, topic, publication_date) VALUES (:bodyText, :postAuthor, :postTopic, :publication_date);";
        $query = $dbh->prepare($sql);
        $query->execute([':bodyText' => $text, ':postAuthor' => $thePostAuthor, ':postTopic' => $topicId, ':publication_date' => $date]);
        header("Location: topic.php?id=".$topicId);
    } else {
        header("Location: topic.php?id=".$topicId);
    }
?>