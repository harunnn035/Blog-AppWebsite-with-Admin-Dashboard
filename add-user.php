<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Website</title>

    <!-----------CUSTOM CSS LİNK---------------->
    <link rel="stylesheet" href="css/style.css">
    <!-------------FONTAWASOME LİNK------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="js/main.js"></script>
</head>

<body>
<?php
  include("includes/navbar.php");
  ?>

<!---- --------------sign up form----------------------------->
<section class="form-section" >
<div class="container form-section-container">
<h2 class="aca">Add User</h2>

<div class="error-message" id="errorMessage">You may have left empty space or the passwords may not match.  </div>
        <form id="signupForm" method="post"    enctype="multipart/form-data" onsubmit="return validateForm()">
            <input type="text" placeholder="Enter First Name" name="firstNm" id="firstNm" maxlength="10">
            <input type="text" placeholder="Enter Last Name" name="lastNm" id="lastNm" maxlength="10">
            <input type="text" placeholder="Enter User Name" name="userNm" id="userNm" maxlength="10">
            <input type="email" placeholder="Enter E-mail" name="email" id="email">
            <input type="password" placeholder="Create Password" name="pass" id="pass" maxlength="8">
            <input type="password" placeholder="Confirm Password Again" name="pass2" id="pass2" maxlength="8">
            
    <select name="rol" >
        <option value="Admin">Admin</option>
        <option value="Author">Author</option>
    </select>
    <div class="form-control">
        <label for="profile-img">Upload Profle Image</label>
    <input type="file" id="upload-img">
    </div>
    <button class="btn"   type="submit">Add User</button>
    
</div>

</section>
<!---- --------------sign up form----------------------------->



  <!------------------ Start FOOTER -------------------->
  <footer>
    <div class="footer-social">
        <a href=""><i class="fab fa-facebook"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
        <a href=""><i class="fab fa-linkedin"></i></a>

    </div>
    <div class="container footer-container">
        <article>
            <h4>Categories</h4>
            <ul>


                <li><a href="">Discovery</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Science & Technology</a></li>
                <li><a href="">Photography</a></li>
                <li><a href="">Travel</a></li>
                <li><a href="">Music</a></li>
                <li><a href="">Wild Life</a></li>
                <li><a href="">World</a></li>
                <li><a href="">World</a></li>

            </ul>
        </article>



        <article>
            <h4>Support</h4>
            <ul>
                <li><a href="">Online Support</a></li>
                <li><a href="">Email</a></li>
                <li><a href="">Phone Number</a></li>
                <li><a href="">Social Support</a></li>
                <li><a href="">Location</a></li>
            </ul>
        </article>



        <article>
            <h4>Parmalinks</h4>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">About </a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Social Support</a></li>
                <li><a href="">Location</a></li>
            </ul>
        </article>



        
    </div>
    <div class="footer-copy">
        Copyright &copy; Harun Dağ
    </div>
</footer>
<!------------------ End FOOTER -------------------->


<!------------CUSTOM JS LİNK---------------------->
<script src="js/main.js"></script>
</body>

</html>


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
 
 // Veritabanı bağlantısı kurun (bağlantı bilgilerinize göre düzenleyin)
include("includes/baglan.php");
 // Formdan gelen verileri al
// Formdan gelen verileri al
$userNm = $_POST['userNm'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$rol = $_POST['rol']; // Add this line to get the role value

// Eğer $rol değeri alınmışsa doğru bir şekilde alındığını kontrol etmek için bir echo yapabilirsiniz.
echo "Rol:" .  $rol;

// Veritabanına ekleme işlemi
$sql = "INSERT INTO users (userNm, email, pass, rol)  VALUES ('$userNm', '$email', '$pass', '$rol')"; // Include role in the query

if ($conn->query($sql) === TRUE) {
    echo " Başarıyla kullanıcı eklendi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

 
 
 // Bağlantıyı kapat
 $conn->close();
 ?>
 