<?php
ob_start(); // Çıktıyı tamponla
include 'header.php';
include 'db.php';  // Veritabanı bağlantısını dahil ediyoruz.

// Form gönderimi kontrolü
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Formdan gelen verileri çekiyoruz
    $ad_soyad = mysqli_real_escape_string($conn, $_POST['ad_soyad']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Şifreyi hash'leme (güvenlik için)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Kullanıcıyı veritabanına ekle
    $sql = "INSERT INTO kullanicilar (adi_soyadi, email, telefon, password) VALUES ('$ad_soyad', '$email', '$telefon', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        // Kullanıcı başarıyla eklendiğinde sayfayı yeniden yönlendir
        header("Location: kullanıcı-ekle.php?status=success");
        exit();  // Yönlendirmeden sonra işlem durdurulmalı
    } else {
        echo "Hata: " . mysqli_error($conn);
    }
}
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kullanıcı Ekle</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">Kullanıcı Kayıt</h3>
      </div>

      <!-- Form Etiketi -->
      <form action="kullanıcı-ekle.php" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label for="AdıSoyadı">Adı Soyadı</label>
            <input type="text" class="form-control" id="AdıSoyadı" name="ad_soyad" placeholder="Ad Soyad Giriniz." required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Eposta Adresi</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Mail Adresinizi Giriniz." required>
          </div>

          <div class="form-group">
            <label for="Telefon">Telefon Numarası</label>
            <input type="tel" class="form-control" id="telefonnumarası" name="telefon" placeholder="Telefon Numarasını Giriniz." required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Şifre</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Şifrenizi Giriniz." required>
          </div>
        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-dark">Kaydol</button>
        </div>
      </form>

      <!-- Başarı mesajı gösterme -->
      <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success mt-2">Kullanıcı başarıyla eklendi!</div>
      <?php endif; ?>

    </div>
  </div>
</div>
</div>

<?php
ob_end_flush(); // Tamponlanan çıktıyı gönder ve tamponlamayı kapat
?>
