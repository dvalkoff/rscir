<html lang="en">
<head>
    <title>Drawer</title>
    <link rel="stylesheet" href="../resources/style.css" type="text/css"/>
</head>
<body>
<?php
require_once("../config/Constants.php");
require_once("ShapeFactory.php");

$factory = new ShapeFactory();

$shape = $factory->getShape($_GET['num']);
$shape->draw();
?>
</body>
</html>