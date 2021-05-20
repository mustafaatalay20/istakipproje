<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 

include 'baglan.php';

ob_start();
session_start();

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
if(isset($_POST['oturumac'])){
    $kullanicisor=$db->prepare("SELECT*FROM kullanici WHERE 
        kullanici_mail=:mail 
        AND 
        kullanici_sifre=:sifre");
    $kullanicisor->execute(array(
        'mail' => $_POST['kullanici_mail'],
        'sifre' => $_POST['kullanici_sifre']
    ));
   $sonuc=$kullanicisor->rowcount();
   
   if($sonuc==0){
       echo "Mail ya da şifreniz yanlış";
   }else{
    header("location:../index.php");
    $_SESSION['kullanici_mail']=$_POST['kullanici_mail'];
   }
}

if(isset($_POST['projeekle'])){
    $projeekle=$db->prepare("INSERT INTO proje SET 
    proje_baslik=:baslik,
    proje_teslim_tarihi=:teslim_tarihi,
    proje_aciliyet=:aciliyet,
    proje_durum=:durum,
    proje_detay=:detay");

    $projeekle->execute(array(
        'baslik'=>$_POST['proje_baslik'],
        'teslim_tarihi'=>$_POST['proje_teslim_tarihi'],
        'aciliyet'=>$_POST['proje_aciliyet'],
        'durum'=>$_POST['proje_durum'],
        'detay'=>$_POST['proje_detay']
    ));
    if($projeekle){
        echo "Başarılı";
        header("Location:../projeler.php");
        } else {

    }
}


if(isset($_POST['projeduzenle'])){
    $projeduzenle=$db->prepare("UPDATE proje SET 
    proje_baslik=:baslik,
    proje_teslim_tarihi=:teslim_tarihi,
    proje_aciliyet=:aciliyet,
    proje_durum=:durum,
    proje_detay=:detay WHERE proje_id=:proje_id");

    $projeduzenle->execute(array(
        'baslik'=>$_POST['proje_baslik'],
        'teslim_tarihi'=>$_POST['proje_teslim_tarihi'],
        'aciliyet'=>$_POST['proje_aciliyet'],
        'durum'=>$_POST['proje_durum'],
        'detay'=>$_POST['proje_detay'],
        'proje_id'=>$_POST['proje_id']
    ));

    if($projeduzenle){
        header("location:../projeler.php");
    }else{
        echo "Kayıt İşlemi Başarısız";
        exit;
    }
}


if(isset($_POST['projesilme'])){
    $sil=$db->prepare("DELETE FROM proje WHERE proje_id=:proje_id");
    $kontrol=$sil->execute(array(
        'proje_id'=>$_POST['proje_id']
    ));

    if($kontrol){
        header("location:../projeler.php");
    }else{
        echo "Silme İşlemi Başarısız";
        exit;
    }
}
if(isset($_POST['siparisekle'])){
    $siparisekle=$db->prepare("INSERT INTO siparis SET 
    musteri_adsoyad=:musteri_adsoyad,
    musteri_mail=:musteri_mail,
    musteri_telefon=:musteri_telefon,
    siparis_baslik=:siparis_baslik,
    siparis_durum=:siparis_durum,
    siparis_ucret=:siparis_ucret,
    siparis_teslim_tarihi=:siparis_teslim_tarihi,
    siparis_aciliyet=:siparis_aciliyet,
    siparis_detay=:siparis_detay");

    $siparisekle->execute(array(
        'musteri_adsoyad'=>$_POST['musteri_adsoyad'],
        'musteri_mail'=>$_POST['musteri_mail'],
        'musteri_telefon'=>$_POST['musteri_telefon'],
        'siparis_baslik'=>$_POST['siparis_baslik'],
        'siparis_durum'=>$_POST['siparis_durum'],
        'siparis_ucret'=>$_POST['siparis_ucret'],
        'siparis_teslim_tarihi'=>$_POST['siparis_teslim_tarihi'],
        'siparis_aciliyet'=>$_POST['siparis_aciliyet'],
        'siparis_detay'=>$_POST['siparis_detay']
    ));


    if($siparisekle){
        header("location:../index.php");
    }else{
        echo "Kayıt İşlemi Başarısız";
        exit;
    }
}

if(isset($_POST['siparissilme'])){
    $sil=$db->prepare("DELETE FROM siparis WHERE siparis_id=:siparis_id");
    $kontrol=$sil->execute(array(
        'siparis_id'=>$_POST['siparis_id']
    ));

    if($kontrol){
        header("location:../siparisler.php");
    }else{
        echo "Silme İşlemi Başarısız";
        exit;
    }
}


?>