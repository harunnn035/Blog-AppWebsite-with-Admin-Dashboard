<?php
session_start();
include("includes/baglan.php");

$message = ""; // Mesaj değişkeni tanımlama

// Formdan gelen verileri alın
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Form verilerini kontrol et
    if (empty($title) || empty($description)) {
        $message = "All fields are required.";
    } else {
        // SQL sorgusu oluştur
        $sql = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";

        if ($conn->query($sql) === TRUE) {
            // Başarı durumunda mesajı ayarla
            $message = "Category successfully added. <a href='maneg-category.php'><i class='fas fa-arrow-right message-icon'></i></a>";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Website</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="js/main.js"></script>
</head>
<body>
    <nav>
        <div class="nav-container">
            <a href="./index.php" class="logo">
                <h3 class="bas">Blog Page</h3>
            </a>
            <ul class="nav-link">
                <li><a href="index.php">Home</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="sign-in.php">Sign In</a></li>
                <li>
                    <div class="nav-profile">
                        <div class="profile-img">
                            <img src="Assets/img/portrait-man-laughing.jpg" alt="" width="" height="">
                        </div>
                        <ul>
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="sign-in.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <button class="phone-button Open"> <i class="fa fa-bars"></i></button>
            <button class="phone-button Close"> <i class="fa fa-close"></i></button>
        </div>
    </nav>

    <section class="form-section">
        <div class="container form-section-container">
            <h2 class="aca">Add Category</h2>
            <?php if (!empty($message)) { ?>
                <div class="message-alert <?php echo strpos($message, 'Error') === false && $message !== 'All fields are required.' ? 'message-alert-success' : 'message-alert-error'; ?>">
                    <p><?php echo $message; ?></p>
                </div>
            <?php } ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="title" placeholder="Title">
                <textarea rows="4" name="description" placeholder="Description"></textarea>
                <button class="btn" type="submit">Add Category</button>
            </form>
        </div>
    </section>

    <?php
include("includes/footer.php");
    ?>

    <script src="js/main.js"></script>
</body>
</html>
