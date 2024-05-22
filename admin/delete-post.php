<?php
session_start();
include("../includes/baglan.php"); // Include your database connection file

// Check if post ID is provided in the URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $post_id = $_GET['id'];

    // Prepare and execute SQL query to delete post
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id); // Assuming post ID is an integer
    $stmt->execute();

    // Check if the deletion was successful
    if($stmt->affected_rows > 0) {
        // Redirect to a page after successful deletion
        header("Location: dashboard.php?delete=success"); // You can change the redirect URL
        exit();
    } else {
        // Redirect to a page if deletion failed
        header("Location: dashboard.php?delete=error"); // You can change the redirect URL
        exit();
    }
} else {
    // Redirect if post ID is not provided in the URL
    header("Location: dashboard.php"); // Redirect to the dashboard or any other page
    exit();
}

$conn->close();
?>
