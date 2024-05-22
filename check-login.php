<?php
session_start();

include("includes/baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Veritabanında kullanıcı adı veya e-posta adresi ve şifre kontrolü yap
    $sql = "SELECT * FROM users WHERE (email = '$email') AND pass = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Başarılı giriş
        $_SESSION['username'] = $email; // Kullanıcı oturumu başlat
        echo "success";
    } else {
        // Hatalı giriş
        echo "Kullanıcı adı/e-posta veya şifre hatalı.";
    }
}

// Bağlantıyı kapat
$conn->close();
?>
