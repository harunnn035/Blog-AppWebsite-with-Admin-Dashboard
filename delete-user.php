<?php
include("includes/baglan.php");

// Kullanıcı ID'sini al
$userId = $_GET['id'];

// SQL sorgusunu hazırla
$sql = "DELETE FROM users WHERE userId = ?";

// Hazırlanan ifadeyi başlat
$stmt = $conn->prepare($sql);

// ID parametresini bağla
$stmt->bind_param("i", $userId);

// Sorguyu çalıştır
if ($stmt->execute()) {
    // Başarılı silme işlemi sonrası yönlendirme
    header("Location: maneg-user.php?message=User deleted successfully");
} else {
    // Hata mesajı göster
    echo "Error deleting record: " . $conn->error;
}

// Bağlantıyı kapat
$stmt->close();
$conn->close();
?>
