<?php
session_start();

include("includes/baglan.php");

$message = ""; // Mesaj değişkeni tanımlama

// Formdan gelen verileri alın
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $isFeatured = isset($_POST['isFeatured']) ? 1 : 0; // Checkbox kontrolü
    $comment = $_POST['comment'];
    $image = $_FILES["image"]["name"];

    // Form verilerini kontrol et
    if (empty($title) || empty($category) || empty($comment) || empty($image)) {
        $message = "All fields are required.";
    } else {
        // Resim yükleme işlemi (opsiyonel)
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // SQL sorgusu oluştur
        $sql = "INSERT INTO posts (title, category, is_featured, image, comment) VALUES ('$title', '$category', $isFeatured, '$target_file', '$comment')";

        if ($conn->query($sql) === TRUE) {
            $message = "Post successfully added.";
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

    <!-- CUSTOM CSS LINK -->
    <link rel="stylesheet" href="css/style.css">
    <!-- FONT AWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script defer src="js/main.js"></script>    
</head>

<body>

    <!-- NAVIGATION BAR -->
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
                <li><a href="cotact.php">Contact</a></li>
                <li><a class="" href="sing-in.php">Sign In</a></li>
                <li>
                    <div class="nav-profile">
                        <div class="profile-img">
                            <img src="Assets/img/portrait-man-laughing.jpg" alt="" width="" height="">
                        </div>

                        <ul>
                            <li><a class="dash" href="dashboard.php">Dashboard</a></li>
                            <li><a class="log" href="sing-in.php">Log Out</a></li>

                        </ul>

                    </div>
                </li>
            </ul>
            <button class="phone-button Open"> <i class="fa fa-bars"></i></button>
            <button class="phone-button Close"> <i class="fa fa-close"></i></button>

        </div>
    </nav>
    <!-- END NAVIGATION BAR -->

    <!-- ADD POST FORM -->
    <section class="form-section">
        <div class="container form-section-container">
            <h2 class="aca">Add Post</h2>
            <?php if (!empty($message)) { ?>
    <div class="message-alert <?php echo strpos($message, 'Error') === false && $message !== 'All fields are required.' ? 'message-alert-success ' : 'message-alert-error'; ?>">
        <p><?php echo $message; ?><a href="dashboard.php"><i class="fas fa-arrow-right message-icon"></i></a></p>
    </div>
<?php } ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Title" required>
                <select name="category" id="category" required>
                <option value="" disabled selected>Select Category</option>
                <option value="Discovery">Discovery</option>
                <option value="Food">Food</option>
                <option value="Science & Technology">Science & Technology</option>
                <option value="Photography">Photography</option>
                <option value="Travel">Travel</option>
                <option value="Music">Music</option>
                <option value="Sports">Sports</option>
                <option value="World">World</option>
                <option value="Wild Life">Wild Life</option>
                <option value="Now">Now</option>
            </select>
                <div class="form-control inline">
                    <input type="checkbox" id="is-Featured" name="isFeatured">
                    <label for="is-Featured">Featured</label>
                </div>
                <div class="form-control">  
                    <label for="thumb">Add Photos</label>
                    <input type="file" id="thumb" name="image" required>
                </div>
                <textarea rows="10" name="comment" placeholder="Comment" required></textarea>
                <button class="btn" type="submit" name="submit">Add Post</button>
            </form>
        </div>
    </section>
    <!-- END ADD POST FORM -->

    <?php
include("includes/footer.php");
    ?>

    <!-- CUSTOM JS LINK -->
    <script src="js/main.js"></script>
</body>

</html>
