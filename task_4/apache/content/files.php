<?php
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('theme.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File service</title>
</head>
<body>

<form method="post" enctype="multipart/form-data" action="files_utils.php">
    Выберите файл для загрузки
    <input type="file" name="file"/><br/>
    <input type="submit" name="submit" value="Загрузить"/>
</form>

<form method="get" action="files_utils.php">
    <input type="submit" name="button" value="Скачать" />
</form>

<div>
    <a href="index.html">Главная</a>
</div>

</body>
</html>