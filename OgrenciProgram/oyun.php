<?php
try {
    $veritabani = new PDO("mysql:host=127.0.0.1;port=3306;dbname=vt1","root","123456");
} catch(PDOException $e) {
    print "Veritabanina baglanamadi " . $e->getMessage();
}
$veritabani->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dadi = "Matematik";
$not = 50;
$sorgu = $veritabani->prepare("SELECT * FROM notlar WHERE dersinadi=? AND vize>=?");
$sorgu->bindValue(1, $dadi , PDO::PARAM_STR);
$sorgu->bindValue(2, $not, PDO::PARAM_INT);
$sorgu->execute();
var_dump($sorgu->fetchAll(PDO::FETCH_ASSOC));



$sorgu1 = $veritabani->prepare("SELECT * FROM notlar WHERE dersinadi=:dersadi AND vize>=:vizesi");
$sorgu1->bindValue(':dersadi', $dadi , PDO::PARAM_STR);
$sorgu1->bindValue(':vizesi', $not, PDO::PARAM_INT);
$sorgu1->execute();
var_dump($sorgu1->fetchAll(PDO::FETCH_ASSOC));
?>