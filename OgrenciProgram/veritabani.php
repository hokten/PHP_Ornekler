<?php
try {
            $vt = new PDO("mysql:host=127.0.0.1;dbname=veritabani;charset=utf8", "root","");
        }
        catch (PDOException $e) {
            echo "Veritabanına bağlanamadı : " . $e->getMessage();
        }
        ?>