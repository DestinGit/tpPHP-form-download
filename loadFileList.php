<?php
require "lib/mvc.php";

$list = listAllFilesInFolder();

echo json_encode($list);