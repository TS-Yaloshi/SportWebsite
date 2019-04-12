<?php
    session_start();
    require_once("db.php");
    $no_error = false;
    if ( !empty( $_POST['username'] ) && !empty( $_POST['password'] ) ) {
        // check of gebruikersnaam al bestaat
        $sql = "SELECT * FROM Gebruiker WHERE gebruikersnaam = :userName";
        $query = $dbh->prepare($sql);
        $query->execute(array(':userName' => $_POST['username']));
        $userData = $query->fetch(PDO::FETCH_ASSOC);

        if($userData) {
            if (password_verify( $_POST['password'], $userData['wachtwoord'] ) === true ) {
                $_SESSION['logged-in'] = $_POST['username'];
                $no_error = true;
            }
        } else {
                $_SESSION['error']['username'] = "De combinatie van gebruikersnaam en wachtwoord is niet bekend.";
                header("Location: login.php");
        }
    }

    if ( empty( $_POST['username'] ) ) {
        $_SESSION['error']['username'] = "Gebruikersnaam mag niet leeg zijn.";
    } else {
        $_SESSION['form-values']['gebruikersnaam'] = $_POST['username'];
    }

    if ( empty( $_POST['password'] ) ) {
        $_SESSION['error']['password'] = "Wachtwoord mag niet leeg zijn.";
    }

    if ( $no_error ) {
        header("Location: index.php");
    } else {
        header("Location: login.php");
    }
?>