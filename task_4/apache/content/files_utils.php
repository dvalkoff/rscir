<?php
if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('theme.php');
require_once('api/persistence/PdfRepository.php');

const name = "NAME";

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        download();
        break;
    case "POST":
        upload();
        break;
    default:
        error();
        break;
}

function download(): void
{
    $pdfRepository = PdfRepository::getInstance();
    $result = $pdfRepository->findBySessionId(session_id());
    foreach ($result as $row) {
        header("Content-length: " . $row['size']);
        header("Content-type: " . $row['type']);
        header("Content-Disposition: attachment; filename=" . $row['name']);
        echo $row['content'];
        return;
    }

}

function upload(): void
{
    $file = $_FILES['file'];
    if ($file['size'] <= 0) {
        echo 'file is not provided';
        return;
    }
    if ($file['type'] != 'application/pdf') {
        echo 'is not a pdf file';
        return;
    }
    $tmpName  = $file['tmp_name'];
    $fp      = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    fclose($fp);
    $pdfRepository = PdfRepository::getInstance();
    $pdfRepository->saveOrUpdate(session_id(), $file['name'], $file['type'], $file['size'], $content);
    echo 'file ' . $file['name'] . ' was successfully saved';
}

function error(): void
{
    http_response_code(404);
    echo "FILES ERROR";
}