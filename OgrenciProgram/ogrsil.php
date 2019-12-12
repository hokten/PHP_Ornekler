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
    if (!empty($_GET['ogrid'])) {
        require 'veritabani.php';
        $oid = intval($_GET['ogrid']);
        $sql = "DELETE FROM ogrenciler WHERE ogrenci_id=?";
        $sorgu = $vt->prepare($sql);
        $sorgu->bindValue(1, $oid, PDO::PARAM_INT);
        $sonuc = $sorgu->execute();
        if ($sonuc) echo "Öğrenci silindi.";
        else echo "Öğrenci silinemedi.";
        header("refresh:3; url=ogrliste.php");
    }
    ?>
</body>

</html>