<?php
// Bağlantı dosyasını dahil et
include 'includes/baglan.php';

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];
    $query = "SELECT * FROM categories WHERE id = $category_id";
    $result = mysqli_query($conn, $query);
    $category = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE categories SET title = '$title', description = '$description' WHERE id = $category_id";
    mysqli_query($conn, $query);
    header('Location: maneg-category.php');
    exit;
}
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
<?php
  include("includes/navbar.php");
  ?>

    <section class="form-section">
        <div class="container form-section-container">
            <h2 class="aca">Edit Category</h2>
            <form action="" method="POST">
                <input type="text" name="title" placeholder="Title" value="<?php echo $category['title']; ?>">
                <textarea name="description" rows="4" placeholder="Description"><?php echo $category['description']; ?></textarea>
                <button class="btn" type="submit">Update Category</button>
            </form>
        </div>
    </section>


    <?php
include("includes/footer.php");
    ?>

    <script src="js/main.js"></script>
</body>
</html>
