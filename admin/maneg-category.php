<?php
session_start();
include("includes/baglan.php");

$sql = "SELECT * FROM categories ORDER BY id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Blog Website</title>

    <!-----------CUSTOM CSS LİNK---------------->
    <link rel="stylesheet" href="../css/style.css">
    <!-------------FONTAWASOME LİNK------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="../js/main.js"></script>
</head>
<body>
<?php
  include("includes/navbar.php");
  ?>




    <!-------------start dashn-boad-->
<section class="dashboard">
<div class="container dashboard-container">
<aside>
    <ul>    
        <li><a href="add-post.php">
            <i class="fa fa-add"></i>
            <h5>Add post</h5>
        </a></li>
        <li><a href="dashboard.php" class="active">
            <i class="fa fa-pen"></i>
            <h5>Manage post</h5>
        </a></li>
        <li><a href="add-user.php">
            <i class="fa fa-user-plus"></i>
            <h5>Add user</h5>
        </a></li>
        <li><a href="maneg-user.php">
            <i class="fa fa-users"></i>
            <h5>Manage Users </h5>
        </a></li>
        <li><a href="add-category.php">
            <i class="fa fa-mobile"></i>
            <h5>Add Category </h5>
        </a></li>
        <li><a href="manage-category.php" class="active">
            <i class="fa fa-list"></i>
            <h5>Manage category</h5>
        </a></li>
    </ul>

</aside>

<main>
    <h2>Manage Category</h2>
    <table class="mngctg">
        <thead>
            <tr>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead> 
        <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Veritabanından veri varsa tabloya ekleyin
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['title']}</td>
                                <td><a href='edit-category.php?id={$row['id']}' class='btn sm'>Edit</a></td>
                                <td><a href='delete-category.php?id={$row['id']}' class='btn sm danger'>Delete</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No categories found</td></tr>";
                }
                $conn->close();
                ?>
        </tbody>
    </table>
</main>
</div>          
</section>
<!-------------end dashn-boad-->



<?php
include("..includes/footer.php");
    ?>

</body>
</html>
