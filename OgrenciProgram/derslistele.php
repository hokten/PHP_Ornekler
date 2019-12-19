<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ders Listeleme Sayfası</title>
</head>
<body>
<?php
require 'veritabani.php';
$sql = "SELECT * FROM programlar";
$sorgu = $vt->query($sql, PDO::FETCH_ASSOC);
$kayitlar = $sorgu->fetchAll();


echo "<table border='1'>";
echo "<tr><th>Program ID</th><th>Program Adı</th></tr>";
foreach($kayitlar as $kayit) {
    $prog_id = $kayit['program_id'];
    echo "<tr>";
    echo "<td>{$kayit['program_id']}</td>";
    echo "<td><a href='derslistele1.php?progid=$prog_id'>{$kayit['program_adi']}</a></td>";
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>