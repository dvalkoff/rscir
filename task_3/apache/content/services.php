<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Наши сервисы</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
</head>
<body>
<h1>Список наших сервисов</h1>
<table width="100%">
    <tr><td>Название</td><td>Цена</td></tr>
    <?php
    $mysqli = new mysqli("db", "root", "example", "appDB");
    $result = $mysqli->query("SELECT * FROM services");
    foreach ($result as $row) {
        echo "<tr><td>{$row['name']}</td> <td>{$row['price']}</td></tr>";
    }
    ?>
</table>
<a href="index.html">На главную</a>
<br>
<a href="admin/admin.php">Страница администратора</a>
</body>
</html>