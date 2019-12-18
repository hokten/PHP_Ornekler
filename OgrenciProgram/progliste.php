<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Program Ekleme Sayfası</title>
</head>
<body>
<?php
    require 'veritabani.php';
    $sql = "SELECT * FROM programlar";
    $sorgu = $vt->query($sql, PDO::FETCH_ASSOC);
    $kayitlar = $sorgu->fetchAll();


    echo "<table border='1'>";
    echo "<tr><th>Program ID</th><th>Program Adı</th><th>Eylem</th></tr>";
    foreach($kayitlar as $kayit) {
        echo "<tr>";
        echo "<td>{$kayit['program_id']}</td>";
        echo "<td>{$kayit['program_adi']}</td>";
        echo "<td><a href=''>DÜZENLE</a> <a href=''>SİL</a>";
        echo "</tr>";
    }
    echo "</table>";

?>
</body>
</html>