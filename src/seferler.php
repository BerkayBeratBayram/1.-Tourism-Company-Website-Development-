<?php include 'header.php'; ?>
<?php include 'db.php'; // Veritabanı bağlantısını dahil et ?>

<!-- Main Content -->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Otobüs Seferleri</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Otobüs Seferleri</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marka</th>
                            <th>Otobüs Plaka</th>
                            <th>Sefer</th>
                            <th>Tarih</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Verileri çekme
                        $sql = "SELECT id, marka, plaka, sefer, tarih FROM otobusler";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Verileri tabloya yazdırma
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['marka']}</td>
                                        <td>{$row['plaka']}</td>
                                        <td>{$row['sefer']}</td>
                                        <td>{$row['tarih']}</td>
                                        <td>
                                            <a href='biletler.php?id={$row['id']}' class='btn btn-primary btn-sm'>Bilet Al</a>
                                            <a href='detaylar.php?id={$row['id']}' class='btn btn-info btn-sm'>Detayları Görüntüle</a>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No records found</td></tr>";
                        }

                        // Bağlantıyı kapatma
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Image Section -->
        <div class="image-section mt-4">
            <h3>Bizim Otobüslerimiz</h3>
            <div class="row">
                <!-- Example images, replace with your chosen images -->
                <div class="col-md-4 mb-3">
                    <img src="https://www.mercedes-benz-bus.com/content/dam/mbo/markets/tr_TR/models/travego-edit-1/images/teaser/mbbo-tr-teaser-travego.jpg" alt="Bus 1" class="img-fluid">
                    <p>Mercedes-Benz Travego</p>
                </div>
                <div class="col-md-4 mb-3">
                    <img src="https://autoline.com.tr/img/pages-description/2/b/1675677595395231952/1-b.jpg" alt="Bus 2" class="img-fluid">
                    <p>Scania Kolosw</p>

                </div>
                <div class="col-md-4 mb-3">
                    <img src="https://i.redd.it/%C3%B6nerdi%C4%9Finiz-%C5%9Fehirleraras%C4%B1-otob%C3%BCs-firmas%C4%B1-ve-koltuk-yeri-v0-xdg0kiayvyyb1.jpg?width=1280&format=pjpg&auto=webp&s=70f9e5d276d4a0ef6fcb333c464647707aa62416" alt="Bus 3" class="img-fluid">
                    <p>Ford Carpenter</p>
                </div>
                <!-- Add more images as needed -->
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Optional CSS for styling -->
<style>
    .image-section {
        text-align: center;
    }
    .image-section img {
        max-width: 100%;
        height: auto;
    }
</style>
