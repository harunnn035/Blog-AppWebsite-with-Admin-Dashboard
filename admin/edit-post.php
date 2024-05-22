<?php
session_start();

// Veritabanı bağlantısı
include("../includes/baglan.php");

// Post bilgilerini çekmek
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$title = '';
$category = '';
$is_featured = 0;
$comment = '';

if ($id > 0) {
    $sql = "SELECT * FROM posts WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        $title = $post['title'];
        $category = $post['category'];
        $is_featured = $post['is_featured'];
        $comment = $post['comment'];
    }
}

// Formdan gelen verileri kontrol et ve al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $title = isset($_POST['title']) ? $conn->real_escape_string($_POST['title']) : '';
    $category = isset($_POST['category']) ? $conn->real_escape_string($_POST['category']) : '';
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $comment = isset($_POST['comment']) ? $conn->real_escape_string($_POST['comment']) : '';

    // Resim yükleme işlemi
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = $_FILES['image']['name'];
        $imageTempName = $_FILES['image']['tmp_name'];
        $imagePath = 'uploads/' . basename($imageName);

        if (move_uploaded_file($imageTempName, $imagePath)) {
            $image = ", image = '" . $conn->real_escape_string($imagePath) . "'";
        }
    }

    // SQL güncelleme sorgusu oluştur
    $sql = "UPDATE posts SET title = '$title', category = '$category', is_featured = $is_featured $image, comment = '$comment' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Post successfully updated.";
    } else {
        echo "Error updating post: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Website</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="../js/main.js"></script>
</head>
<body>
<?php
  include("../includes/navbar.php");
  ?>

    <section class="form-section">
        <div class="container form-section-container">
            <h2 class="aca">Edit Post</h2>
            <form action="edit-post.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">   
                <input type="text" name="title" placeholder="Title" value="<?php echo htmlspecialchars($title); ?>">
                <select name="category">
                    <option value="Discovery" <?php if($category == '1') echo 'selected'; ?>>Discovery</option>
                    <option value="Food" <?php if($category == '2') echo 'selected'; ?>>Food</option>
                    <option value="Science & Technology" <?php if($category == '3') echo 'selected'; ?>>Science & Technology</option>
                    <option value="Photography" <?php if($category == '4') echo 'selected'; ?>>Photography</option>
                    <option value="Travel" <?php if($category == '5') echo 'selected'; ?>>Travel</option>
                    <option value="Music" <?php if($category == '6') echo 'selected'; ?>>Music</option>
                    <option value="Sports" <?php if($category == '7') echo 'selected'; ?>>Sports</option>
                    <option value="                    <option value="8" <?php if($category == '8') echo 'selected'; ?>>World</option>
" <?php if($category == '8') echo 'selected'; ?>>World</option>
                    <option value="9" <?php if($category == '9') echo 'selected'; ?>>Wild Life</option>
                </select>
                <div class="form-control inline">
                    <input type="checkbox" id="is-featured" name="is_featured" value="1" <?php echo ($is_featured == 1) ? 'checked' : ''; ?>>
                    <label for="is-featured">Featured</label>
                </div>
                <div class="form-control">  
                    <label for="thumb">Change Photos</label>
                    <input type="file" id="thumb" name="image">
                </div>
                <textarea rows="10" placeholder="Comment" name="comment"><?php echo htmlspecialchars($comment); ?></textarea>
                <button class="btn" name="submit" type="submit">Update Post</button>
            </form>
        </div>
    </section>

   
    <?php
include("../includes/footer.php");
    ?>

</body>
</html>
