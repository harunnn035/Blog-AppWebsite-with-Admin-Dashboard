<?php
session_start();
include("includes/baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Kullanıcı adı ve şifre kontrolü
    $query = "SELECT * FROM users WHERE email = ? AND pass = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $userrow = $result->fetch_assoc();
        $_SESSION["userNm"] = $userrow["userNm"];
        $_SESSION["userId"] = $userrow["userId"];
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Kullanıcı adı veya şifre yanlış!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Website</title>
    <!-- CUSTOM CSS LINK -->
    <link rel="stylesheet" href="css/style.css">
    <!-- FONTAWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="js/main.js"></script>
</head>

<body>
    <!-- Sign in form -->
    <section class="form-section">
        <div class="container form-section-container">
            <h2 class="sin">Sign In</h2>
            <div class="error-message"></div>
            <form id="signInForm" action="sing-in.php" method="post">
                <input type="text" placeholder="E-mail" name="email" required>
                <input type="password" placeholder="Password" name="pass" required>
                <button class="btn" type="submit">Sign In</button>
                <small class="message-alert message-alert-success2">Don't have an account? <a href="sing-up.php">Sign Up</a></small>
            </form>
        </div>
    </section>
    <!-- CUSTOM JS LINK -->
    <script src="Assets/main.js"></script>
</body>
</html>
