<?php 

function tr_degistirme($metin){
    $metin=trim($metin);
    $aranacak=array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
    $replace=array('C','c','g','g','i')
}

function guvenlik($gelen){
    $giden=addslashes($gelen);
    $giden=htmlspecialchars($giden);
    $giden=strip_tags($giden);
    return $giden;
}

?>