<?php

$isimler = array("Ali", "Veli", "Ayşe", "Zeynep");
echo '$simler' . " dizisi " . sizeof($isimler) . " elemanlı.";

// sizeof($dizi) ve count($dizi) fonksiyonları, $dizi dizisinin
//eleman saysını verir.

$ad = "Ayşe";
var_dump(is_array($ad));
var_dump(is_array($isimler));


// in_array iki argüman alır ve bir dizinin içinde belirtilen
// eleman varsa true yoksa false döndürür
var_dump(in_array("Mehmet", $isimler));
// $isimler dizisinde "Mehmet" elemanı olmadığından false
// döner.

var_dump(in_array("Ali", $isimler));
// $isimler dizisinde "Ali" elemanı olduğundan true
// döner.

// Associative Array
// İlişkisel Dizi
$notlar = array(
    "numarasi" => 123,
    "adsoyad" => "Ali Veli",
    "vize" => 45,
    "final" => 78
);

var_dump(array_values($notlar));
var_dump(array_keys($notlar));

$notlar1 = array(
    array("Ali", "Veli"),
    "deneme" => 123,
    25 => array("Ali", "Veli", "Mehmet"),
    array("Ali", "Veli", "Mehmet"),

);

var_dump(array_values($notlar1));
var_dump(array_keys($notlar1));

$isimler = ["Ali", "Veli"];
var_dump($isimler);
$isimler[] = "Mehmet";
var_dump($isimler);
array_push($isimler, "Fatma");
var_dump($isimler);
array_unshift($isimler, "Nail");
var_dump($isimler);

$notlar=[45,50,34,21];
var_dump($notlar);
array_pop($notlar);
var_dump($notlar);
array_shift($notlar);
var_dump($notlar);


?>
