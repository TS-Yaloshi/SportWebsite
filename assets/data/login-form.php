<?php 
    $loginForm = [
        [
            "label" => "Gebruikersnaam",
            "type" => "text",
            "name" => "username",
            "id" => "username",
            "placeholder" => "Gebruikersnaam",
            "attributes" => "required",
            "value" => (isset( $_SESSION['form-values']['gebruikersnaam'] )) ? $_SESSION['form-values']['gebruikersnaam'] : "",
            "error" => (isset( $_SESSION['error']['username'] )) ? $_SESSION['error']['username'] : ""
        ],   
        [
            "label" => "Wachtwoord",
            "type" => "password",
            "name" => "password",
            "id" => "password",
            "placeholder" => "Wachtwoord",
            "attributes" => "required",
            "value" => "",
            "error" => (isset( $_SESSION['error']['password'] )) ? $_SESSION['error']['password'] : ""
        ]
    ]
?>