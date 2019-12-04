<?php
try {
    $veritabani = new PDO("mysql:host=127.0.0.1;port=3306;dbname=vt1;charset=utf8","root","123456");
} catch(PDOException $e) {
    print "Veritabanina baglanamadi " . $e->getMessage();
}
$veritabani->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$fgadsoyad = $_POST["fadsoyad"];
$fgdersinadi = $_POST["fdersinadi"];
$fgvize = intval($_POST["fvize"]);
$fgfinal = intval($_POST["ffinal"]);
$veritabani->query("SET CHARACTER SET utf8");
$sql = "INSERT INTO notlar (`adsoyad`, `dersinadi`, `vize`, `final`) VALUES(?,?,?,?)";
$sorgu = $veritabani->prepare($sql);
$sorgu->bindValue(1, $fgadsoyad , PDO::PARAM_STR);
$sorgu->bindValue(2, $fgdersinadi, PDO::PARAM_STR);
$sorgu->bindValue(3, $fgvize, PDO::PARAM_INT);
$sorgu->bindValue(4, $fgfinal, PDO::PARAM_INT);
$sorgu->execute();

?>