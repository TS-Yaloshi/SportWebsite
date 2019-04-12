<?php 
    session_start();
    require_once("db.php");

    $_SESSION['error'] = [];
    $_SESSION['form-values'] = [];

    // naam
    if ( empty( $_POST['naam'] ) ) {
        $_SESSION['error']['naam'] = "Naam mag niet leeg zijn.";
    } else {
        $_SESSION['form-values']['naam'] = $_POST['naam'];
    }

    // gebruikersnaam 
    if ( empty( $_POST['username'] ) ) {
        $_SESSION['error']['username'] = "Gebruikersnaam mag niet leeg zijn.";
    } else {
        $_SESSION['form-values']['gebruikersnaam'] = $_POST['username'];
    }

    // check of gebruikersnaam al bestaat
    $sql = "SELECT * FROM Gebruiker WHERE gebruikersnaam = :userName";
    $query = $dbh->prepare($sql);
    $query->execute(array(':userName' => $_POST['username']));
    $usernameExists = $query->fetch(PDO::FETCH_ASSOC);

    if ($usernameExists) {
        $_SESSION['error']['username'] = "Deze gebruikersnaam is al in gebruik.";
    }

    // wachtwoord verschilt
    if ( !empty( $_POST['password'] ) && !empty( $_POST['password-repeat'] ) ) {
        if ( $_POST['password'] !== $_POST['password-repeat'] ) {
            $_SESSION['error']['password'] = "Wachtwoorden komen niet overeen.";
        }
    }

    // wachtwoord niet ingevuld
    if ( empty( $_POST['password'] ) || empty( $_POST['password-repeat'] ) ) {
        $_SESSION['error']['password'] = "Wachtwoord mag niet leeg zijn.";
    }
    
    // insert user in database en redirect naar index.php
    if ( !isset( $_SESSION['error']['username'] ) && !isset( $_SESSION['error']['password']) && !isset( $_SESSION['error']['naam']) ) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $naam = $_POST['naam'];

        $sql = "INSERT INTO Gebruiker (gebruikersnaam, wachtwoord, naam) VALUES (:username, :pw, :displayname)";
        $query = $dbh->prepare($sql);
        $query->execute(array(':username' => $username, ':pw' => $password, ':displayname' => $naam));

        $_SESSION['logged-in'] = $_POST['username'];;
        header("Location: index.php");
    } else {
        header("Location: registreren.php");
    }  
?>