<html lang="en">
<head>
    <title>Hello world page</title>
</head>
<body>
<h1>Таблица пользователей данного продукта</h1>
<table>
    <tr>
        <th>Id</th><th>Name</th><th>Surname</th>
    </tr>
    <?php
    include 'src/db.php';

    $dbh = DB::connect();

    foreach ($dbh->query('SELECT * FROM appDB.users') as $row) {
        echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['surname']}</td></tr>";
    }
    ?>
</table>
<?php
phpinfo();
?>
</body>
</html>