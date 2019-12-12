<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program Listeleme</title>
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
        echo "<th>Öğrenci Adı Soyadı</th>";
        echo "<th>Öğrenci Programı</th>";
        echo "<th>Eylem</th>";
        echo "</tr>";
        foreach($kayitlar as $kayit) {
            $program_id = intval($kayit['ogrenci_programi']);
            $psql = "SELECT program_adi FROM programlar WHERE program_id=?";
            $sorgu = $vt->prepare($psql);
            $sorgu->bindValue(1,$program_id, PDO::PARAM_INT);
            $sorgu->execute();
            $gelen = $sorgu->fetch(PDO::FETCH_ASSOC);
            $oid = $kayit['ogrenci_id'];
            echo "<tr>";
            echo "<td>$oid</td>";
            echo "<td>{$kayit['ogrenci_numarasi']}</td>";
            echo "<td>{$kayit['ogrenci_ad']} {$kayit['ogrenci_soyad']}</td>";
            echo "<td>{$gelen['program_adi']}</td>";
            echo "<td><a href='ogrsil.php?ogrid=$oid'>SİL</a> <a href='ogrduzenle.php?ogrid=$oid'>DÜZENLE</a></td>";

            echo "</tr>";
        }
        echo "</table>";
    ?>   
</body>
</html>