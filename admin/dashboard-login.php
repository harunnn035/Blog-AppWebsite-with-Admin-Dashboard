<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Website</title>

    <!-- CUSTOM CSS LINK -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- FONTAWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="..js/main.js"></script>
</head>

<body>

    <!-- Sign in form -->
    <section class="form-section">
        <div class="container form-section-container">
            <h2 class="sin">Dashboard Sign In</h2>
            <div class="error-message"></div>
            <form id="signInForm" method="post">
                <input type="text" placeholder="E-mail" name="email">
                <input type="password" placeholder="Password" name="pass">
                <button class="btn" type="submit">Sign In</button>
             
            </form>
        </div>
    </section>


    <?php
include("../includes/baglan.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $userrow = mysqli_fetch_array($result);
        $_SESSION["userNm"] = $userrow["userNm"];
        $_SESSION["userId"] = $userrow["userId"];

        if ($userrow["rol"] == "admin") {
            header("Location: dashboard.php");
            exit(); // Exit here after redirection
        } elseif     ($userrow["rol"] == "author") {
            echo "<script>alert('Bu sayfaya erişim izniniz yok!'); window.location.href='../index.php';</script>";
            exit(); // Exit here after redirection
        }
    } else {
        echo "<script>alert('Kullanıcı adı veya şifre yanlış!'); window.location.href='../index.php';</script>";
        exit(); // Exit here after redirection
    }
}
?>
</body>

</html>
