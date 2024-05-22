<?php
session_start();
include("../includes/baglan.php");

// Kategori silme işlemi
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Silme sorgusu
    $sql = "DELETE FROM categories WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Category deleted successfully.";
        header("Location: manage-category.php");
        exit();
    } else {
        $_SESSION['error'] = "Error deleting category: " . $conn->error;
        header("Location: manage-category.php");
        exit();
    }
} else {
    $_SESSION['error'] = "Category ID not provided.";
    header("Location: manage-category.php");
    exit();
}

$conn->close();
?>
