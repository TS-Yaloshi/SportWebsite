<?php 
$searchForm = [
    [
        "label" => "Zoekterm",
        "type" => "search",
        "name" => "full-search",
        "id" => "full-search",
        "placeholder" => "Zoek",
        "attributes" => "",
        "value" => (isset( $_SESSION['form-values']['full-search'] )) ? $_SESSION['form-values']['full-search'] : "",
        "error" => (isset( $_SESSION['error']['full-search'] )) ? $_SESSION['error']['full-search'] : ""
    ]
]
?>