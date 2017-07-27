<?php
require "lib/mvc.php";

$fileName = filter_input(INPUT_GET, 'file', FILTER_SANITIZE_STRING);

$filePath = 'uploadfolder/' . $fileName;
$data = file_get_contents($filePath);

//$mimeType = mime_content_type($filePath);
//mimeType($filePath);

header("Content-type: application/*");
header("Content-Disposition:attachment;filename=$fileName");

echo $data;