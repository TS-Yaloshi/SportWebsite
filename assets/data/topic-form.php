<?php 
    $topicForm = [
        [
            "label" => "Titel",
            "type" => "text",
            "name" => "topic-title",
            "id" => "topic-title",
            "placeholder" => "Titel",
            "attributes" => "autofocus required",
            "value" => (isset( $_SESSION['form-values']['topic-title'] )) ? $_SESSION['form-values']['topic-title'] : "",
            "error" => (isset( $_SESSION['error']['topic-title'] )) ? $_SESSION['error']['topic-title'] : ""
        ],
        [
            "label" => "Nieuw topic starten",
            "type" => "textarea",
            "form" => "add-topic",
            "name" => "topic-text",
            "id" => "topic-text",
            "placeholder" => "Uw topic tekst",
            "attributes" => "required",
            "value" => (isset( $_SESSION['form-values']['topic-text'] )) ? $_SESSION['form-values']['add-topic'] : "",
            "error" => (isset( $_SESSION['error']['topic-text'] )) ? $_SESSION['error']['add-topic'] : ""
        ]
    ]
?>