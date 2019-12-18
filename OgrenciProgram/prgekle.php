<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Program Ekleme Sayfası</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input name="f_program_adi" type="text"/>
    <input type="submit" value="EKLE"/>
</form>

<?php
if(!empty($_POST)) {
    require 'veritabani.php';
    $f_program_adi = $_POST["f_program_adi"];
    $sql = "INSERT INTO programlar (program_adi) VALUES(?)";
    $sorgu = $vt->prepare($sql);
    $sorgu->bindValue(1, $f_program_adi, PDO::PARAM_STR);
    $sonuc = $sorgu->execute();
    if($sonuc) {
        echo "Program başarıyla eklendi";
    }
    else {
        echo "Program eklenemedi";
    }
}


?>
</body>
</html>