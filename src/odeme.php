<?php include 'header.php'; ?>
<?php include 'db.php'; ?> <!-- Veritabanı bağlantısı burada dahil ediliyor -->

<?php
// Tur bilgisini almak
$tur_adi = isset($_GET['tur']) ? $_GET['tur'] : 'Kapadokya Turu';
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="card-header bg-dark text-white">
                            <h2 class="text-center"> Ödeme Ekranı</h2>
                        </div>
                        <div class="card-body">
                            <form action="odeme_onay.php" method="post">
                                <input type="hidden" name="tur_adi">

                                <div class="form-group mb-4">
                                    <label class="font-weight-bold"><i class="fas fa-user"></i> Adı Soyadı</label>
                                    <input type="text" class="form-control form-control-lg" name="adi_soyadi" placeholder="Adınızı ve Soyadınızı Giriniz" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="font-weight-bold"><i class="fas fa-credit-card"></i> Kart Numarası</label>
                                    <input type="text" class="form-control form-control-lg" name="kart_numarasi" placeholder="Kart Numaranızı Giriniz" required>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold"><i class="fas fa-calendar-alt"></i> Son Kullanma Tarihi</label>
                                            <input type="text" class="form-control form-control-lg" name="son_kullanma_tarihi" placeholder="MM/YY" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold"><i class="fas fa-lock"></i> CVV</label>
                                            <input type="text" class="form-control form-control-lg" name="cvv" placeholder="CVV" required>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-dark btn-lg btn-block">
                                    <i class="fas fa-credit-card"></i> Ödeme Yap
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
