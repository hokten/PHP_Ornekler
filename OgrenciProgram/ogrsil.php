<?php
if(!empty($_GET['ogrid'])) {
    require 'veritabani.php';
    $sil_ogrenci_id= intval($_GET["ogrid"]);
    $sql = "DELETE FROM ogrenciler WHERE ogrenci_id=?";
    $sorgu = $vt->prepare($sql);
    $sorgu->bindValue(1, $sil_ogrenci_id, PDO::PARAM_STR);
    $sonuc = $sorgu->execute();
    if($sonuc) {
        echo "Öğrenci başarıyla silindi";
    }
    else {
        echo "Öğrenci silinemedi";
    }
    header("Refresh:3;url=ogrliste.php");
}
?>











