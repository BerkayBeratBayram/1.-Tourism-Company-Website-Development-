<?php include 'header.php'; ?>
<?php include 'db.php'; // Veritabanı bağlantısını dahil et ?>

<div class="content-wrapper">
    <!-- Header Section -->
    <div class="content-header">
        <div class="container-fluid"></div>
    <section class="content">

    <div class="card">
    <div class="card-header">
    <h3 class="card-title">Otobüsler</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
    <i class="fas fa-times"></i>
    </button>
    </div>
    </div>
    <div class="card-body p-0">
    <table class="table table-striped projects">
    <thead>
    <tr>
    <th style="width: 1%">#</th>
    <th style="width: 20%">Otobüs Plaka</th>
    <th style="width: 30%">Koltuk Sayısı</th>
    <th>Doluluk</th>
    <th style="width: 8%" class="text-center">Sefer</th>
    <th style="width: 20%"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Seferler tablosundan verileri çekme
    $sql = "SELECT * FROM otobusler"; // Tablo adını ve gerekli sütunları kontrol edin
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Verileri döngüye alarak tabloyu oluştur
        while($row = $result->fetch_assoc()) {
            $id = $row['id']; // ID'yi kullanarak işlemler yapabilirsiniz
            $plaka = $row['plaka'];
            $koltuk_sayisi = $row['koltuk_sayisi'];
            $doluluk = $row['doluluk']; // Doluluk oranı yüzdesi
            $sefer = $row['sefer']; // Sefer bilgisi
            $kapasite = $row['kapasite']; // Kapasite bilgisi

            // Doluluk oranını hesapla
            if ($kapasite > 0) {
                $oran = ($doluluk / $kapasite) * 100;
            } else {
                $oran = 0;
            }

            $gorsel = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7vIpo7X81rpBlfQxhLodGdz8LhVtULWFbzA&s'; // Görsel yolu (değiştirin)

            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td><a>$plaka</a><br><small>$row[marka]</small></td>";
            echo "<td>$koltuk_sayisi</td>";
            echo "<td class='project_progress'>";
            echo "<div class='progress progress-sm'>";
            echo "<div class='progress-bar bg-green' role='progressbar' aria-valuenow='$oran' aria-valuemin='0' aria-valuemax='100' style='width: $oran%'></div>";
            echo "</div>";
            echo "<small>$oran% Doluluk</small>";
            echo "</td>";
            echo "<td class='project-state'><span class='badge badge-primary'>$sefer</span></td>";
            echo "<td class='project-actions text-right'>";
            echo "<img src='$gorsel' alt='Görsel' style='width: 30px; height: 40px;'>"; // Görsel
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data available</td></tr>";
    }

    $conn->close();
    ?>
    </tbody>
    </table>
    </div>

    </div>

    </section>
</div>
