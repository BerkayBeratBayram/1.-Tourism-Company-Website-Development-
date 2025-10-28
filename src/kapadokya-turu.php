<?php include 'header.php'; ?>
<?php include 'db.php'; ?> <!-- Veritabanı bağlantısı burada dahil ediliyor -->


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kapadokya Turu Detayları</h1>
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
                        <p class="text"><b>1. Gün: Gece Yolculuğu</b></p>
                        <p class="text">*22:00 Merter Metro İstasyonu İspark Otoparkı</p>
                        <p class="text">*23:00 Mecidiyeköy Meydan Otobüs Durakları Yanı Mado Pastanesi Önü</p>
                        <p class="text">*23:59 Kadıköy Evlendirme Dairesi İspark Otopark Yanı</p>

                        <p class="text"><b>2. Gün: İstanbul - İzmit- Sakarya – Bolu – Ankara - Tuz Gölü – Aksaray - Ihlara Vadisi - Narlı Göl - Yeraltı Şehri - Nevşehir - Paşabağ - Dervent Vadisi – Ürgüp - Şarap Mahzenleri</b></p>
                        <p class="text">*00:15 Kartal Köprüsü Metro İstasyonu (E 5 Ankara İstikameti)</p>
                        <p class="text">*00:30 Çayırova Mc Donald's Önü</p>
                        <p class="text">*01:15 İzmit Halkevi Durakları'ndan katılan misafirlerimizle gece yolculuğumuza başlıyoruz.</p>
                        <p class="text">Değerli misafirlerimiz, sabahın erken saatlerinde Ankara'ya ulaşıyoruz. Tuz Gölü'nde kısa bir fotoğraf molası verdikten sonra Aksaray üzerinden Ihlara Vadisi'ne ulaşıyoruz. Ardından Narlıgöl, yeraltı şehirleri ve diğer önemli yerleri ziyaret ediyoruz. Paşabağ ve Dervent Vadisi gezisinin ardından Ürgüp'teki şarap mahzenlerini ziyaret ediyoruz.</p>

                        <p class="text"><b>Önemli Not:</b> Ihlara Vadisi ana giriş kapısının çalışmalardan dolayı kapalı olması halinde alternatif girişlerden yapılacaktır.</p>
                        
                        <ul class="text">
                            <li>Güzergahımız üzerinde uygun bir tesiste yemek alınacaktır. (Ekstra)</li>
                            <li>Öğle Yemeği: Anka Restoran’da menü olarak alınacaktır. (Ekstra)</li>
                            <li>Akşam Yemeği: Otelde alınacak olup, tur ücretine dahildir.</li>
                            <li>Güzergah: İstanbul- Ankara- Göreme / 745 KM</li>
                            <li>Mola Tesisleri: Bolu Unova Dinlenme Tesisleri, Şereflikoçhisar Ayrancı Dinlenme Tesisleri, Aksaray Tapan Tesisleri vb.</li>
                            <li>Konaklama Oteli: Seçilen otelde konaklama gerçekleştirilecektir.</li>
                            <li>Otele Giriş Saati: 18.00-19.00</li>
                        </ul>

                        <p class="text"><b>3. Gün: Balon Turu - Güvercinlik Vadisi - Üç Güzeller - Uçhisar Kalesi - Çömlek Atölyesi - Göreme Açık Hava Müzesi - Avanos - Onyx Taş Atölyesi - Hacı Bektaş-ı Veli</b></p>
                        <p class="text">Sabah otelde alınan kahvaltı sonrası, Güvercinlik Vadisi, Üç Güzeller ve diğer yerleri ziyaret ediyoruz. Hacı Bektaş-ı Veli dergahı gezisinin ardından dönüş yolculuğuna başlıyoruz.</p>
                        
                        <ul class="text">
                            <li>Sabah Kahvaltısı: Otelde alınacaktır. (Ücrete dahildir)</li>
                            <li>Öğle Yemeği: Uranos Restaurant menü olarak alınacaktır. (Ekstra)</li>
                            <li>Akşam Yemeği: Güzergah üzerinde alınacaktır. (Ekstra)</li>
                            <li>Güzergah: Kapadokya Bölge İçi / 35 KM, Avanos - Hacıbektaş / 50 KM, Hacıbektaş - Ankara / 225 KM, Ankara - İstanbul / 450 KM</li>
                            <li>Toplam Tur Mesafesi: 1700 KM Ortalama</li>
                            <li>Konaklama Oteli: DİKKAT BU GECE OTEL KONAKLAMASI YOKTUR.</li>
                            <li>Dinlenme Tesisleri: Can Kapadokya Dinlenme Tesisleri, Unova Dinlenme Tesisleri vb.</li>
                            <li>İstanbul'a Varış Saati: 23.30-02.00 (Yaklaşık)</li>
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
$sql = "SELECT * FROM tur_paketleri WHERE tur_adi = 'Kapadokya Turu'";
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
