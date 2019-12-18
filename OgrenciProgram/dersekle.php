<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ders Ekle</title>
</head>

<body>
<?php
require 'veritabani.php';
?>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <label for="f_ders_kodu">Ders Kodu</label>
    <input type="text" name="f_ders_kodu" /><br>

    <label for="f_ders_adi">Ders Adı</label>
    <input type="text" name="f_ders_adi" /><br>

    <label for="f_ders_donemi">Ders Dönemi</label>
    <input type="text" name="f_ders_donemi" /><br>

    <label for="f_dersin_programi">Dersin Programı</label>
    <select name="f_dersin_programi">
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
    $g_ders_kodu = $_POST["f_ders_kodu"];
    $g_ders_adi = $_POST["f_ders_adi"];
    $g_ders_donemi = $_POST["f_ders_donemi"];
    $g_dersin_programi = intval($_POST["f_dersin_programi"]);
    $sql = "INSERT INTO dersler (ders_kodu , ders_adi, ders_donemi, dersin_programi) VALUES(?,?,?,?)";
    $sorgu = $vt->prepare($sql);
    $sorgu->bindValue(1, $g_ders_kodu, PDO::PARAM_STR);
    $sorgu->bindValue(2, $g_ders_adi, PDO::PARAM_STR);
    $sorgu->bindValue(3, $g_ders_donemi, PDO::PARAM_INT);
    $sorgu->bindValue(4, $g_dersin_programi, PDO::PARAM_INT);
    $sonuc = $sorgu->execute();
    if ($sonuc) echo "Ders eklendi.";
    else echo "Ders eklenemedi.";
}
?>
</body>

</html>