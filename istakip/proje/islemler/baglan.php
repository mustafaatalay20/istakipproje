<?php

$host="localhost";
$veritabani_ismi="istakip";
$kullanici_adi="root";
$sifre="";

try{
    $db=new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);
    // echo "Veritabanı Bağlantısı Başarılı";
}

catch (PDOException $e){
    echo "Veritabanı Bağlantısı Başarısız";
    echo $e->getMessage();
}

?>