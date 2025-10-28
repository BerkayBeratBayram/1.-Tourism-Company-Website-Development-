<?php include 'header.php'; ?>
<?php include 'db.php'; // Veritabanı bağlantısını dahil ediyoruz ?>

<?php
// Veritabanından verileri çekmek için sorgu
$sql = "SELECT sefer_sayisi, otobus_sayisi, kayitli_kullanici_sayisi, aktif_kullanici_sayisi FROM istatistikler LIMIT 1";
$result = $conn->query($sql);

// Sorgu sonucundan verileri çek
if ($result->num_rows > 0) {
    // Verileri diziye aktar
    $row = $result->fetch_assoc();
    $sefer_sayisi = $row['sefer_sayisi'];
    $otobus_sayisi = $row['otobus_sayisi'];
    $kayitli_kullanici_sayisi = $row['kayitli_kullanici_sayisi'];
    $aktif_kullanici_sayisi = $row['aktif_kullanici_sayisi'];
} else {
    // Eğer sonuç yoksa varsayılan değerler
    $sefer_sayisi = 0;
    $otobus_sayisi = 0;
    $kayitli_kullanici_sayisi = 0;
    $aktif_kullanici_sayisi = 0;
}
?>

<!-- Main Content -->
<div class="content-wrapper">
    <!-- Header Section -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Anasayfa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <!-- Small Boxes Section -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $sefer_sayisi; ?></h3>
                    <p>Sefer Sayısı</p>
                </div>
                <div class="icon">
                    <i class="fas fa-road"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $otobus_sayisi; ?></h3>
                    <p>Otobüs Sayısı</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bus"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo $kayitli_kullanici_sayisi; ?></h3>
                    <p>Kayıtlı Kullanıcı Sayısı</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?php echo $aktif_kullanici_sayisi; ?></h3>
                    <p>Aktif Kullanıcı Sayısı</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Main Content Section -->
    <div class="row mb-4">
        <!-- Popüler Rotalar Bölümü -->
        <div class="col-md-6">
            <h2 class="mb-4 mt-0">Popüler Rotalar</h2>
            <div class="row">
                <!-- İlk Rota -->
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <img src="../../dist/img/day-trips-from-istanbul-copy.jpg" class="card-img-top" alt="Rota 1">
                        <div class="card-body">
                            <h5 class="card-title">İstanbul Turu</h5>
                            <p class="card-text">İstanbul'un tarihi ve turistik yerlerini keşfedin. Topkapı Sarayı, Sultanahmet Camii, Kapalıçarşı ve daha fazlası.</p>
                            <a href="istanbul-turu.php" class="btn btn-primary">Detaylar</a>
                        </div>
                    </div>
                </div>
                <!-- İkinci Rota -->
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <img src="https://cdn.agentis.com.tr/geziekspresi.com.tr/files/actv/19/02272020122239-f.png" class="card-img-top" alt="Rota 2">
                        <div class="card-body">
                            <h5 class="card-title">Kapadokya Turu</h5>
                            <p class="card-text">Kapadokya'nın benzersiz peri bacalarını ve yer altı şehirlerini keşfedin. Sıcak hava balonlarıyla unutulmaz bir deneyim yaşayın.</p>
                            <a href="kapadokya-turu.php" class="btn btn-primary">Detaylar</a>
                        </div>
                    </div>
                </div>
                <!-- Üçüncü Rota -->
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <img src="https://www.gezilanya.com/images/tur/guney-ege-turu-her-hafta_1121995787.jpg" class="card-img-top" alt="Rota 3">
                        <div class="card-body">
                            <h5 class="card-title">Ege Kıyıları</h5>
                            <p class="card-text">Ege Denizi'nin güzel plajlarını ve tatil köylerini keşfedin. Bodrum, Marmaris ve Fethiye gibi popüler destinasyonlar sizleri bekliyor.</p>
                            <a href="ege-kiyilari.php" class="btn btn-primary">Detaylar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kullanıcı Yorumları Bölümü -->
        <div class="col-md-6">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">Kullanıcı Yorumları</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <!-- Yorum 1 -->
                <div class="col-md-12 d-flex align-items-stretch flex-column mb-4">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Gezgin
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Melih Yeter</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover</p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                    <div class="comment-body">
                                        <br>
                                        <p>Bu hizmeti kullanmaktan çok memnun kaldım. Müşteri hizmetleri oldukça ilgili ve otobüsler konforlu.</p>
                                    </div>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Yorum 2 -->
                <div class="col-md-12 d-flex align-items-stretch flex-column mb-4">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Vlogger
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Dursun Özbek</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> CEO / Law / President / Tea Lover</p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                    <div class="comment-body">
                                        <br>
                                        <p>Bu hizmeti kullanmaktan çok memnun kaldım. Müşteri hizmetleri oldukça ilgili ve otobüsler konforlu.</p>
                                    </div>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Yorum 3 -->
                <div class="col-md-12 d-flex align-items-stretch flex-column mb-4">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Blogger
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover</p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                    <div class="comment-body">
                                        <br>
                                        <p>Bu hizmeti kullanmaktan çok memnun kaldım. Müşteri hizmetleri oldukça ilgili ve otobüsler konforlu.</p>
                                    </div>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    </div>
</div>

<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
