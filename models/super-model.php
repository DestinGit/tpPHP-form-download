<?php
function storageFile() {

    $sorage = json_decode(file_get_contents("data/storage.json"), true);
}