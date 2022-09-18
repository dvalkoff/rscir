<html lang="en">
<head>
    <title>Sorter</title>
    <link rel="stylesheet" href="../resources/style.css" type="text/css"/>
</head>
<body>
<?php
include 'MergeSorter.php';

$array = explode(',', $_GET['array']);
$array = MergeSorter::mergeSort($array);



?>
<table>
    <tr>
        <th>Index</th>
        <th>Value</th>
    </tr>
    <?php
    for ($i = 0; $i < sizeof($array); $i++)
        echo "<tr><td>$i</td><td>$array[$i]</td></tr>";
    ?>
</body>
</html>