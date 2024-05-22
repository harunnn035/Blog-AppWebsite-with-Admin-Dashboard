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
            <form id="signInForm" method="post">
                <input type="text" placeholder="E-mail" name="email">
                <input type="password" placeholder="Password" name="pass">
                <button class="btn" type="submit">Sign In</button>
                <small class="message-alert message-alert-success2">Don't have an account? <a href="sing-up.php">Sign Up</a></small>
            </form>
        </div>
    </section>

    <!-- CUSTOM JS LINK -->
    <script src="Assets/main.js"></script>

    <?php
// check-login.php dosyası
include("includes/baglan.php");
// POST isteğiyle gelen verileri al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcı adı ve şifre kontrolü
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Burada gerekli giriş kontrolü işlemlerini yapabilirsiniz
    // Örnek olarak, basit bir kullanıcı adı ve şifre kontrolü yapalım
    $query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Kullanıcı bulunduğunda oturumu başlatın ve ana sayfaya yönlendirin
        $userrow = mysqli_fetch_array($result);
        $_SESSION["username"] = $userrow["username"];
        $_SESSION["user_id"] = $userrow["id"];
        echo "success";
        header("location:index.php");
    }
        // Başarılı giriş durumu
        
     else {
        // Hatalı giriş durumu
        echo "<script>alert('Kullanıcı adı veya şifre yanlış!');</script>";
    }
}


?>

</body>

</html>
