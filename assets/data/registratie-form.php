<?php 
$registratieForm = [
    [
        "label" => "Naam",
        "type" => "text",
        "name" => "naam",
        "id" => "naam",
        "placeholder" => "Jan Jansen",
        "attributes" => "autofocus required",
        "value" => ( isset(  $_SESSION['form-values']['naam'] ) ) ?  $_SESSION['form-values']['naam'] : "",
        "error" => ( isset( $_SESSION['login-error']['naam'] ) ) ? $_SESSION['login-error']['naam'] : ""
    ],
    [
        "label" => "Gebruikersnaam",
        "type" => "text",
        "name" => "username",
        "id" => "username",
        "placeholder" => "Gebruikersnaam",
        "attributes" => "required",
        "value" => ( isset( $_SESSION['form-values']['gebruikersnaam'] ) ) ? $_SESSION['form-values']['gebruikersnaam'] : "",
        "error" => ( isset( $_SESSION['login-error']['username'] ) ) ? $_SESSION['login-error']['username'] : ""
    ],   
    [
        "label" => "Wachtwoord",
        "type" => "password",
        "name" => "password",
        "id" => "password",
        "placeholder" => "Wachtwoord",
        "attributes" => "required",
        "value" => "",
        "error" => ( isset( $_SESSION['login-error']['password'] ) ) ? $_SESSION['login-error']['password'] : ""
    ],
    [
        "label" => "Wachtwoord herhalen",
        "type" => "password",
        "name" => "password-repeat",
        "id" => "password-repeat",
        "placeholder" => "Wachtwoord herhalen",
        "attributes" => "required",
        "value" => "",
        "error" => ""
    ]
];
?>