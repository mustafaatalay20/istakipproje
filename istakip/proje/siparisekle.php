<?php include 'header.php' ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Sipariş Ekleme</h5>
        </div>
        <div class="card-body">
            <form action="islemler/islem.php" method="POST">
                <div class="form-row">
                    <div class="col-md-6">
                        <label>Ad Soyad</label>
                        <input type="text" class="form-control" name="musteri_isim" placeholder="Müşterinizin İsmini Giriniz">
                    </div>
                    <div class="col-md-6">
                        <label>Mail Adresi</label>
                        <input type="email" class="form-control" name="musteri_mail" placeholder="Müşterinizin Mail Adresini Giriniz">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-md-6">
                        <label>Telefon Numarası</label>
                        <input type="number" class="form-control" name="musteri_telefon" placeholder="Müşterinizin Telefon Numarasını Giriniz">
                    </div>
                    <div class="col-md-6">
                        <label>Sipariş Başlığı</label>
                        <input type="text" class="form-control" name="siparis_baslik" placeholder="Siparişinizin Başlığını Giriniz">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label>Sipariş Durumu</label>
                        <select required name="siparis_durum" class="form-control">
                            <option>Yeni Başladı</option>
                            <option>Devam Ediyor</option>
                            <option>Bitti</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Ücret</label>
                        <input type="number" class="form-control" required name="siparis_ucret" placeholder="Siparişinizin Ücretini Giriniz">
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="form-group col-md-6">
                        <label>Teslim Tarihi</label>
                        <input type="date" class="form-control" required name="siparis_teslim_tarihi" placeholder="Teslim Tarihi">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Aciliyet</label>
                        <select required name="siparis_aciliyet" class="form-control">
                            <option>Acil</option>
                            <option>Normal</option>
                            <option>Acelesi Yok</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea class="form-control" required name="siparis_detay" id="editor"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div

