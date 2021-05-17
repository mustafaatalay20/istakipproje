
<!--Güncelleme İşlemi-->
<?php 

include 'baglan.php';

if(isset($_POST['ayarkaydet'])){
    $ayarkaydet=$db->prepare("UPDATE ayarlar SET 
        site_baslik=:site_baslik, 
        site_aciklama=:site_aciklama, 
        site_sahibi=:site_sahibi");
    
    $ayarkaydet->execute(array(
        'site_baslik' => $_POST['site_baslik'] , 
        'site_aciklama' => $_POST['site_aciklama'],
        'site_sahibi' => $_POST['site_sahibi']
    ));

}

?>