<?php 
    $postForm = [
        [
            "label" => "Reactie",
            "type" => "textarea",
            "form" => "add-post",
            "name" => "newPost",
            "id" => "newPost",
            "placeholder" => "Uw bericht hier",
            "attributes" => "autofocus required",
            "value" => (isset( $_SESSION['form-values']['newPost'] )) ? $_SESSION['form-values']['newPost'] : "",
            "error" => (isset( $_SESSION['error']['newPost'] )) ? $_SESSION['error']['newPost'] : ""
        ]
    ]
?>