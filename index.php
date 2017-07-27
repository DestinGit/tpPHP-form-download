<?php
require "lib/mvc.php";
require "models/model.php";

$message = "";
$errors = getPostFormSubmit();
if (count($errors) == 0) {
    $message = "Fichier téléchargé avec succès";
}

if (!$errors) {
    $errors = [];
}

$list = listAllFilesInFolder();
//$list = [];
$html = getRenderedView("home", [
    'message' => $message,
    'errors' => $errors,
    'list' => $list
]);

echo $html;
