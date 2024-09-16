<?php
// Veritabanı bağlantı bilgileri
$servername = "localhost";
$username = "root"; // veya veritabanı kullanıcı adınız
$password = ""; // veya veritabanı şifreniz
$dbname = "atakan_turizm";

// Veritabanı bağlantısı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
