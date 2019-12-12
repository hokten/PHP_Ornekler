<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Öğrenci Düzenleme</title>
</head>

<body>
    <?php
    if(empty($_GET['ogrid'])) {
        echo "Düzenlenecek öğrenci yok";
    }
    else {
        require 'veritabani.php';
        $oid = intval($_GET['ogrid']);
        $sql = "SELECT * FROM ogrenciler WHERE ogrenci_id=?";
        $sorgu = $vt->prepare($sql);
        $sorgu->bindValue(1, $oid, PDO::PARAM_INT);
        $sorgu->execute();
        $kayit = $sorgu->fetch(PDO::FETCH_ASSOC);
        $ogrenci_numarasi = $kayit["ogrenci_numarasi"];
        $ogrenci_adi = $kayit["ogrenci_ad"];
        $ogrenci_soyadi = $kayit["ogrenci_soyad"];
        $ogrenci_programi = intval($kayit["ogrenci_programi"]);

    }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <label for="f_ogrenci_num">Öğrenci Numarası</label>
        <input type="text" value="<?php echo $ogrenci_numarasi; ?>" name="f_ogrenci_num" /><br>
        <label for="f_ogrenci_ad">Öğrenci Adı</label>
        <input type="text" value="<?php echo $ogrenci_adi; ?>" name="f_ogrenci_ad" /><br>
        <label for="f_ogrenci_soyad">Öğrenci Soyadı</label>
        <input type="text" value="<?php echo $ogrenci_soyadi; ?>" name="f_ogrenci_soyad" /><br>
        <label for="f_ogrenci_programi">Öğrencinin Programı</label>
        <?php
        echo "<select name='f_ogrenci_programi'>";
        $sql = "SELECT * FROM programlar";
        $sorgu = $vt->query($sql, PDO::FETCH_ASSOC);
        $kayitlar = $sorgu->fetchAll();
        foreach ($kayitlar as $kayit) {
            $prog_id = $kayit['program_id'];
            if($prog_id == $ogrenci_programi)
            echo "<option value='{$kayit['program_id']}' selected>{$kayit['program_adi']}</option>";
            else
            echo "<option value='{$kayit['program_id']}'>{$kayit['program_adi']}</option>";
        }
        echo "</select>";
            ?>
            <input type="submit" value="EKLE" />
    </form>
    
</body>

</html>