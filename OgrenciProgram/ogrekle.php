<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program Ekle</title>
</head>

<body>
    <?php
    require 'veritabani.php';
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="f_ogrenci_num">Öğrenci Numarası</label>
        <input type="text" name="f_ogrenci_num" /><br>
        <label for="f_ogrenci_ad">Öğrenci Adı</label>
        <input type="text" name="f_ogrenci_ad" /><br>
        <label for="f_ogrenci_soyad">Öğrenci Soyadı</label>
        <input type="text" name="f_ogrenci_soyad" /><br>
        <label for="f_ogrenci_programi">Öğrencinin Programı</label>
        <select name="f_ogrenci_programi">
            <?php
            $sql = "SELECT * FROM programlar";
            $sorgu = $vt->query($sql, PDO::FETCH_ASSOC);
            $kayitlar = $sorgu->fetchAll();
            foreach ($kayitlar as $kayit)
                echo "<option value='{$kayit['program_id']}'>{$kayit['program_adi']}</option>";
            echo "</select>"
            ?>
            <input type="submit" value="EKLE" />
    </form>
    <?php
    if (!empty($_POST)) {
        try {
            $vt = new PDO("mysql:host=127.0.0.1;dbname=veritabani;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "Veritabanına bağlanamadı : " . $e->getMessage();
        }
        $g_ogrenci_num = intval($_POST["f_ogrenci_num"]);
        $g_ogrenci_ad = $_POST["f_ogrenci_ad"];
        $g_ogrenci_soyad = $_POST["f_ogrenci_soyad"];
        $g_ogrenci_programi = intval($_POST["f_ogrenci_programi"]);
        $sql = "INSERT INTO ogrenciler (ogrenci_numarasi, ogrenci_ad, ogrenci_soyad, ogrenci_programi) VALUES(?,?,?,?)";
        $sorgu = $vt->prepare($sql);
        $sorgu->bindValue(1, $g_ogrenci_num, PDO::PARAM_INT);
        $sorgu->bindValue(2, $g_ogrenci_ad, PDO::PARAM_STR);
        $sorgu->bindValue(3, $g_ogrenci_soyad, PDO::PARAM_STR);
        $sorgu->bindValue(4, $g_ogrenci_programi, PDO::PARAM_INT);
        $sonuc = $sorgu->execute();
        if ($sonuc) echo "Öğrenci eklendi.";
        else echo "Öğrenci eklenemedi.";
    }
    ?>
</body>

</html>