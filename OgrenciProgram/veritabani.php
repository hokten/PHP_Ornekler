<?php
try {
    $dsn="mysql:host=127.0.0.1;port=3306;dbname=veritabani;charset=utf8";
    $dbusername = "root";
    $dbpassword = "";
    $vt = new PDO($dsn, $dbusername, $dbpassword);
} catch(PDOException $e) {
    echo "Veritabanına bağlanılamadı : " . $e->getMessage();
}

$donem[1] = "Güz";
$donem[0] = "Bahar";



?>