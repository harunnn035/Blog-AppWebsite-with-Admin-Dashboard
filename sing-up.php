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
    <style>
        .error-message {
            color: red;
            margin-top: 5px;
            display: none;
            
        }
    </style>
</head>
<body>

<!-- Sign up form -->
<section class="form-section">
    <div class="container form-section-container">
        <h2 class="sup">Sign Up</h2>
        <div class="error-message" id="errorMessage">You may have left empty space or the passwords may not match.  </div>
        <form id="signupForm" method="post"  action="sing-up.php"   enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="text" placeholder="Enter First Name" name="firstNm" id="firstNm" maxlength="10">
            <input type="text" placeholder="Enter Last Name" name="lastNm" id="lastNm" maxlength="10">
            <input type="text" placeholder="Enter User Name" name="userNm" id="userNm" maxlength="10">
            <input type="email" placeholder="Enter E-mail" name="email" id="email">
            <input type="password" placeholder="Create Password" name="pass" id="pass" maxlength="8">
            <input type="password" placeholder="Confirm Password Again" name="pass2" id="pass2" maxlength="8">
            <div class="form-control">
                <label for="upload-img">Upload Profile Image</label>
                <input type="file" id="upload-img" name="profileImg">
            </div>
            <input type="submit" class="btn" name="kayitButon" value="Sign Up">
        </form>
        <small class="message-alert message-alert-success">Already have an account? <a href="sing-in.php">Sign In</a></small>
    </div>
</section>

<!-- CUSTOM JS SCRIPT -->
<script>
   function validateForm() {
    var ad = document.getElementById("firstNm").value.trim();
    var soyad = document.getElementById("lastNm").value.trim();
    var kullanici = document.getElementById("userNm").value.trim();
    var mail = document.getElementById("email").value.trim();
    var pass = document.getElementById("pass").value.trim();
    var pass2 = document.getElementById("pass2").value.trim();  

    if (ad === "" || soyad === "" || kullanici === "" || mail === "" || pass === "" || pass2 === "" || pass != pass2) {
        document.getElementById("errorMessage").style.display = "block";
        
        
        return false; // Formun gönderilmesini engelle
        
    }

    // Formun doğru şekilde gönderildiğinde giriş sayfasına yönlendir
alert("Kayıt başarılı giriş yapabilirsiniz..");
    return true;

   
    
}

</script>

</body>
</html>
<?php

include("includes/baglan.php");
// Formdan gelen verileri al
$userNm= $_POST['userNm'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

// Şifreleri kontrol et ve hashle
if ($pass != $pass2) {
    die("Hata: Şifreler eşleşmiyor.");
}

// Veritabanına ekleme işlemi
$sql = "INSERT INTO users (userNm, email, pass) VALUES ('$userNm', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Başarıyla kayıt olundu.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Bağlantıyı kapat
$conn->close();
?>

