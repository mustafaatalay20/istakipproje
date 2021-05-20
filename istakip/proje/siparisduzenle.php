<?php include 'header.php';

if(isset($_POST['siparis_id'])){
    $siparissor=$db->prepare("SELECT * FROM siparis WHERE siparis_id=:id");
    $siparissor->execute(array(
        'id'=>$_POST['siparis_id']
    ));
    $sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);
} else {
    header('location:index.php');
}

?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Sipariş Düzenleme</h5>
        </div>
        <div class="card-body">
            <form action="islemler/islem.php" method="POST">
                <div class="form-row">
                    <div class="col-md-6">
                        <label>Ad Soyad</label>
                        <input type="text" class="form-control" name="musteri_adsoyad" value="<?php echo $sipariscek['musteri_adsoyad']; ?>">
                    </div>
                <div class="col-md-6">
                    <label>Mail Adresi</label>
                    <input type="email" class="form-control" name="musteri_mail" value="<?php echo $sipariscek['musteri_mail']; ?>">
                </div>
               </div>
               <div class="form-row mt-2">
                    <div class="col-md-6">
                        <label>Telefon Numarası</label>
                        <input type="text" class="form-control" name="musteri_telefon" value="<?php echo $sipariscek['musteri_telefon']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label>Sipariş Başlığı</label>
                        <input type="text" class="form-control" name="siparis_baslik" value="<?php echo $sipariscek['siparis_baslik']; ?>">
                    </div>
               </div>
               <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label>Sipariş Durumu</label>
                        <select required name="siparis_durum" class="form-control">
                            <option <?php if($sipariscek['siparis_durum']=="Yeni Başladı") {echo "selected";}?> value="Yeni Başladı">Yeni Başladı</option>
                            <option <?php if($sipariscek['siparis_durum']=="Devam Ediyor") {echo "selected";}?> value="Devam Ediyor">Devam Ediyor</option>
                            <option <?php if($sipariscek['siparis_durum']=="Bitti") {echo "selected";}?> value="Bitti">Bitti</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Ücret (TL)</label>
                        <input type=" number" class="form-control" name="siparis_ucret" value="<?php echo $sipariscek['siparis_ucret']; ?>">
                    </div>
               </div>
               <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label>Teslim Tarihi</label>
                        <input type="date" class="form-control" required name="siparis_teslim_tarihi" value="<?php echo $sipariscek['siparis_teslim_tarihi']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Aciliyet</label>
                        <select required name="siparis_aciliyet" class="form-control">
                            <option <?php if($sipariscek['siparis_aciliyet']=="Acil") {echo "selected";}?> value="Acil">Acil</option>
                            <option <?php if($sipariscek['siparis_aciliyet']=="Normal") {echo "selected";}?> value="Normal">Normal</option>
                            <option <?php if($sipariscek['siparis_aciliyet']=="Acelesi Yok") {echo "selected";}?> value="Acelesi Yok">Acelesi Yok</option>
                        </select>
                    </div>
               </div>
               <div class="form-row mt-2">
                    <div class="form-group col-md-12">
                        <label>Sipariş Detay</label>
                        <textarea class="form-control" required name="siparis_detay" id="siparisdetay"><?php echo $sipariscek['siparis_detay'] ?></textarea>
                    </div>
               </div>
               <button type="submit" name="siparisekle" class="btn btn-primary">Kaydet</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>


<script>
CKEDITOR.replace('siparisdetay');
</script>