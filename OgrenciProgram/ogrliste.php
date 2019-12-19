<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Program Ekleme Sayfası</title>
</head>
<body>
<?php
require 'veritabani.php';
$sql = "SELECT * FROM ogrenciler";
$sorgu = $vt->query($sql, PDO::FETCH_ASSOC);
$kayitlar = $sorgu->fetchAll();


echo "<table border='1'>";
echo "<tr>";
echo "<th>Öğrenci ID</th>";
echo "<th>Öğrenci Numarası</th>";
echo "<th>Ad</th>";
echo "<th>Soyad</th>";
echo "<th>Programı</th>";
echo "<th>Eylem</th>";
echo "</tr>";



foreach($kayitlar as $kayit) {

    $psql = "SELECT program_adi FROM programlar WHERE program_id=?";
    $psorgu = $vt->prepare($psql);
    $program_id = intval($kayit['ogrenci_programi']);
    $psorgu->bindValue(1, $program_id, PDO::PARAM_INT);
    $psorgu->execute();
    $program_kayit = $psorgu->fetch(PDO::FETCH_ASSOC);


    echo "<tr>";
    echo "<td>{$kayit['ogrenci_id']}</td>";
    echo "<td>{$kayit['ogrenci_numarasi']}</td>";
    echo "<td>{$kayit['ogrenci_ad']}</td>";
    echo "<td>{$kayit['ogrenci_soyad']}</td>";
    echo "<td>{$program_kayit['program_adi']}</td>";
    echo "<td><a href='ogrsil.php?ogrid={$kayit['ogrenci_id']}'>SİL</a>";
    echo " <a href='ogrduzenle.php?ogrid={$kayit['ogrenci_id']}'>DÜZENLE</a>";
    echo " <a href='derskaydi.php?ogrid={$kayit['ogrenci_id']}'>DERS KAYIT</a>
    </td>";


    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>