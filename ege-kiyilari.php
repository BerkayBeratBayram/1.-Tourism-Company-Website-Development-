<?php include 'header.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ege Kıyıları Turu Detayları</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info" style="margin-right: 10px;"></i><b>Tur Programı</b></h5>
                        <p class="text">Tur Programı seçilen tarihe göre değişiklik gösterebilmektedir.</p>
                        
                        <p class="text"><b>1. Gün: İzmir ve Çeşme Turu</b></p>
                        <p class="text">*09:00 İzmir Saat Kulesi ve Kordon gezisi</p>
                        <p class="text">*11:00 Tarihi Asansör ziyareti</p>
                        <p class="text">*13:00 Çeşme sahil gezisi ve serbest zaman</p>
                        <p class="text">*16:00 Alaçatı sokaklarında gezinti ve akşam yemeği</p>

                        <p class="text"><b>2. Gün: Efes Antik Kenti ve Şirince Köyü</b></p>
                        <p class="text">*09:00 Efes Antik Kenti ziyareti</p>
                        <p class="text">*11:00 Artemis Tapınağı ve Celsus Kütüphanesi gezisi</p>
                        <p class="text">*13:00 Şirince Köyü'nde öğle yemeği ve serbest zaman</p>
                        <p class="text">*15:00 Şarap tadımı ve köy gezisi</p>

                        <p class="text"><b>Önemli Not:</b> Hava koşullarına bağlı olarak bazı ziyaret noktaları iptal edilebilir ve alternatif programlar sunulacaktır.</p>
                        
                        <ul class="text">
                            <li>Sabah Kahvaltısı: Otelde (Ücrete dahildir)</li>
                            <li>Öğle Yemeği: Yerel restoranlarda menü olarak alınacaktır. (Ekstra)</li>
                            <li>Akşam Yemeği: Güzergah üzerinde uygun bir restoranda alınacaktır. (Ekstra)</li>
                            <li>Güzergah: İzmir, Çeşme, Alaçatı, Efes, Şirince</li>
                            <li>Konaklama Oteli: Seçilen otelde konaklama gerçekleştirilecektir.</li>
                        </ul>

                        <p class="text"><b>3. Gün: Bodrum ve Kuşadası Turu</b></p>
                        <p class="text">*09:00 Bodrum Kalesi ve Sualtı Arkeoloji Müzesi ziyareti</p>
                        <p class="text">*12:00 Bodrum sahilinde serbest zaman ve öğle yemeği (Ekstra)</p>
                        <p class="text">*15:00 Kuşadası sahilinde yürüyüş ve akşam yemeği (Ekstra)</p>
                        <p class="text">*17:00 İstanbul’a dönüş yolculuğu ve tur bitişi</p>

                        <ul class="text">
                            <li>Sabah Kahvaltısı: Otelde (Ücrete dahildir)</li>
                            <li>Öğle Yemeği: Bodrum'da (Ekstra)</li>
                            <li>Akşam Yemeği: Kuşadası'nda (Ekstra)</li>
                            <li>Güzergah: Bodrum, Kuşadası</li>
                            <li>İstanbul'a Varış Saati: 23.30-00.00 (Yaklaşık)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Fatura Kısmı -->
<?php
// Veritabanı bağlantısını kontrol edin
include 'db.php'; 

// Veritabanından Kapadokya turu bilgilerini çek
$sql = "SELECT * FROM tur_paketleri WHERE tur_adi = 'Ege Kıyıları Turu'";
$result = mysqli_query($conn, $sql);

// Sorgu sonucunu kontrol edin
if (mysqli_num_rows($result) > 0) {
    // Sonuç varsa değişkenlere atama yap
    $row = mysqli_fetch_assoc($result);
    $tur_ucreti = $row['tur_ucreti'];
    $kdv_ucreti = $row['kdv_ucreti'];
    $ek_ucretler = $row['ek_ucretler'];
    $total = $row['total'];
} else {
    // Eğer sonuç yoksa, bir hata mesajı verin
    echo "Veri bulunamadı!";
}
?>

<div class="content-wrapper">
    <section class="content">
        <div class="invoice p-3 mb-3">
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> Tur Şartları
                        <small class="float-right">Date: 2/10/2014</small>
                    </h4>
                </div>
            </div>

            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>Ücrete Dahil Olan Hizmetler</strong><br>
                        * Otellerde 1 Gece Yarım Pansiyon Konaklama<br>
                        * Açık Büfe 1 Sabah Kahvaltısı<br>
                        * Açık Büfe veya Set Menü Oluşan 1 Akşam Yemeği<br>
                        * Tatilbudur.com Araçlar ile Ulaşım<br>
                        * Milli Park Giriş Ücretleri<br>
                        * Programda Belirtilen Tüm Çevre Gezileri<br>
                        * Bardak Su<br>
                        * Profesyonel Rehberlik Hizmetleri<br>
                        * 1618 Nolu Turizm Kanununa Göre Zorunlu Seyahat Sigortası
                    </address>
                </div>

                <div class="col-sm-4 invoice-col">
                    <address>
                        <strong>Ücrete Dahil Olmayan Hizmetler</strong><br>
                        * Müze Kart (Kültür Ve Turizm Bakanlığına Ait Müzelere Giriş İçin Gereklidir)<br>
                        * Müze ve Ören Yeri Giriş Ücretleri<br>
                        * Tüm Öğlen Yemekleri<br>
                        * Tüm Yemeklerde Alınan İçecekler<br>
                        * Tüm Özel Harcamalar<br>
                        * Ekstra Belirtilen Tüm Organizasyonlar<br>
                        * Türk Gecesi (Kuzu Gecesi)<br>
                        * Balon Turu<br>
                        * Seyr-İ Balon Turu<br>
                        * Atv Safari
                    </address>
                </div>

                <div class="col-sm-4 invoice-col">
                    <b>Konaklama Otelleri</b><br>
                    * Otellerimiz 5 Yıldızlıdır.<br>
                    * Otellerin Açık Büfesi Vardır.<br>
                    * Sneack İkramlarımız Vardır.<br>
                    * Spa ve Türk Hamamı Vardır.<br>
                    * Alacard Restoranı Mevcuttur.<br>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                        plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>

              <!-- Fatura Kısmı -->
<div class="col-6">
    <p class="lead">Amount Due <?php echo date('m/d/Y'); ?></p>
    
    <!-- Form Grubu -->
    <form>
        <div class="form-group">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Tur Ücreti</th>
                            <td>
                                <input type="text" class="form-control" value="<?php echo "$" . number_format($tur_ucreti, 2); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>KDV (20%)</th>
                            <td>
                                <input type="text" class="form-control" value="<?php echo "$" . number_format($kdv_ucreti, 2); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Ek Ücretler</th>
                            <td>
                                <input type="text" class="form-control" value="<?php echo "$" . number_format($ek_ucretler, 2); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>Toplam</th>
                            <td>
                                <input type="text" class="form-control" value="<?php echo "$" . number_format($total, 2); ?>" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>

            </div>

            <div class="row no-print">
                <div class="col-12">
                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                    <a href="odeme.php" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Ödeme Yap</a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>

