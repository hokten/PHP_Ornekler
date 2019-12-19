<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ders Listeleme Sayfası</title>
</head>
<body>
<?php
    if(!empty($_GET['progid']) && filter_var($_GET['progid'], FILTER_VALIDATE_INT)) {
    require 'veritabani.php';
    $sql = "SELECT * FROM dersler WHERE dersin_programi = ?";
    $sorgu = $vt->prepare($sql);
    $sorgu->bindValue(1, $_GET['progid'], PDO::PARAM_INT);
    $sorgu->execute();
    $kayitlar = $sorgu->fetchAll();
    echo "<table border='1'>";
echo "<tr><th>Ders Kodu</th><th>Ders Adı</th><th>Ders Dönemi</th></tr>";
foreach($kayitlar as $kayit) {
    $dersin_yili = ceil(intval($kayit['ders_donemi'])/2);
    $dersin_donemi = $donem[intval($kayit['ders_donemi'])%2];
    echo "<tr>";
    echo "<td>{$kayit['ders_kodu']}</td>";
    echo "<td>{$kayit['ders_adi']}</td>";
    echo "<td>{$dersin_yili}. Sınıf $dersin_donemi Dönemi</td>";
    echo "</tr>";
}
echo "</table>";
    }

?>
</body>
</html>