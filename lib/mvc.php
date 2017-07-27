<?php
function getViewContent($view, array $data = []) {
//Mise en tampon du résultat de l'interpréteur PHP
    ob_start();
//Exportation des variables
    extract($data);
//inclusion de la vue
    require "views/{$view}.php";
//Récupération du contenu du tampon dans une variable
    $viewContent = ob_get_clean();
    return $viewContent;
}

function getRenderedView($view, array $data = [], $layout="default-layout"){
//Récupération du contenu de la vue
    $viewContent = getViewContent($view, $data);
//Ajout de la vue aux données
    $data["viewContent"] = $viewContent;
//Obtention du layout
    $rendered = getViewContent($layout, $data);
    return $rendered;
}

/**
 * @return bool|mixed
 */
function getPostFormSubmit() {
    $mimeTypesArray = [
        'text/csv', 'application/msword', 'application/json',
        'application/pdf', 'image/jpeg', 'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'application/vnd.oasis.opendocument.spreadsheet', 'text/plain',
        'application/vnd.oasis.opendocument.presentation', 'application/json',
        'application/vnd.ms-powerpoint', 'application/vnd.oasis.opendocument.text'
    ];

    $fileTitle = filter_input(INPUT_POST, "fileTitle", FILTER_SANITIZE_STRING);
    $isPosted = filter_has_var(INPUT_POST, "submit");
    $errors = [];

    if (!$isPosted || !isset($_FILES["fileLoad"])) {
        return false;
    }

//    $mimeTypesArray = json_decode(file_get_contents("data/mimeTypes.json"), true);

    $mimeType = $_FILES["fileLoad"]["type"];
//    echo '<pre>';
//        var_dump($mimeTypesArray);
//    echo '</pre>';
    if (in_array($mimeType, $mimeTypesArray)) {
        $parts = explode('.', $_FILES["fileLoad"]['name']);
        $ext = $parts[count($parts) - 1];
        $name = $parts[0] .'_file_';

//        $fileName = uniqid($name) . '.' . $ext;
        $fileName = $fileTitle  . '.' . $ext;
        $targetPath = getcwd().'/uploadfolder/';
        //Attribution d'un nom unique au fichier
        $filePath = $targetPath.$fileName;

        if (!move_uploaded_file($_FILES["fileLoad"]['tmp_name'], $filePath)) {
            $errors[] = "Aucun fichier uploadé";
        }

    } else {
        $errors[] = "Type de fichier non autorisé";
    }

    return $errors;
}

function listAllFilesInFolder() {
    $newList = [];
    $list = scandir ("uploadfolder/");
    foreach ($list as $file) {
        if($file != '.' && $file != '..')
        $newList[] = $file;
    }
    return $newList;
}