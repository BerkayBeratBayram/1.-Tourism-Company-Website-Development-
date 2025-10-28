<?php include 'header.php'; ?>
<?php include 'db.php'; // Veritabanı bağlantısını dahil et ?>

<!-- Main Content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Bilet Al</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Bilet Al</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Purchase Form -->
        <div class="card">
            <div class="card-body">
                <form action="biletler.php" method="post">
                    <div class="form-group">
                        <label for="bus">Otobüs Seferi</label>
                        <select id="bus" name="bus_id" class="form-control" required>
                            <?php
                            // Otobüs seferlerini çekme
                            $sql = "SELECT id, sefer FROM otobusler";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Seferleri listeye ekleme
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['sefer']}</option>";
                                }
                            } else {
                                echo "<option value=''>No sefer available</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">Adınız</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-posta</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Satın Al</button>
                </form>

                <?php
                // Form gönderildiğinde işlem yapma
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $bus_id = $_POST['bus_id'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];

                    // Veritabanına bilet ekleme
                    $stmt = $conn->prepare("INSERT INTO biletler (bus_id, name, email, phone) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param("isss", $bus_id, $name, $email, $phone);

                    if ($stmt->execute()) {
                        // Bilet eklendikten sonra doluluk oranını güncelle
                        $stmt->close(); // İlk kapama işleminden sonra tekrar kapatma yapmıyoruz

                        // Doluluk oranını güncelleme işlemi
                        $sql = "UPDATE otobusler SET doluluk = doluluk + 1 WHERE id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $bus_id);

                        if ($stmt->execute()) {
                            // Otobüs kapasitesini al
                            $sql = "SELECT kapasite, doluluk FROM otobusler WHERE id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("i", $bus_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();

                            if ($row) {
                                $kapasite = $row['kapasite'];
                                $doluluk = $row['doluluk'];

                                if ($kapasite > 0) {
                                    $oran = ($doluluk / $kapasite) * 100;
                                    echo "<div class='alert alert-success mt-3'>Biletiniz başarıyla alındı! Doluluk oranı: " . number_format($oran, 2) . "%</div>";
                                } else {
                                    echo "<div class='alert alert-warning mt-3'>Kapadite bilgisi hatalı, doluluk oranı hesaplanamadı.</div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Doluluk oranı güncellenemedi.</div>";
                            }

                            $stmt->close(); // Son kapama işlemi
                        } else {
                            echo "<div class='alert alert-danger mt-3'>Bir hata oluştu. Lütfen tekrar deneyin.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Bir hata oluştu. Lütfen tekrar deneyin.</div>";
                    }

                    // Bağlantıyı kapatma
                    $conn->close();
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
