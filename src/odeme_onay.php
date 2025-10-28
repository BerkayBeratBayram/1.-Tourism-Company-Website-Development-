<?php include 'header.php'; ?>
<?php include 'db.php'; ?> <!-- Veritabanı bağlantısı burada dahil ediliyor -->

<?php
$tur_adi = isset($_POST['tur_adi']) ? $_POST['tur_adi'] : 'Kapadokya Turu';
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <h2>Ödeme Onayı</h2>
            <p>Ödemeniz başarıyla alınmıştır. <?php echo $tur_adi; ?> için teşekkür ederiz.</p>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
