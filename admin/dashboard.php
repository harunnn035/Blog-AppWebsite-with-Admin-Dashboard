

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
    include('../includes/navbar.php');

  ?>



    <!-------------start dashn-boad-->
<section class="dashboard">
<div class="container dashboard-container">
<aside>
    <ul>

    
        <li><a href="../admin/add-post.php" class="active">
            <i class="fa fa-add"></i>
            <h5>Add post</h5>
        </a></li>
        <li><a href="../admin/dashboard.php" class="active">
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

      
     
    </ul>

</aside>

<main>
    <h2>Manage Post</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
        </thead> 
       
        <?php   
// Veritabanı bağlantısını içerir
include("../includes/baglan.php");

$sql = "SELECT * FROM posts ORDER BY created_at DESC"; // Tarihe göre azalan sırada sıralama
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['title'] . "</td>"; // Tablo sütun adlarınıza göre düzenleyin
        echo "<td>" . $row['category'] . "</td>";
        echo "<td><a href='edit-post.php?id=" . $row['id'] . "' class='btn sm'>Edit</a></td>";
        echo "<td><a href='delete-post.php?id=" . $row['id'] . "' class='btn sm delete-btn'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

    
    </table>
        
        
    </tbody>

</main>
</div>          
</section>
    <!-------------end dashn-boad-->

    <?php
include("../includes/footer.php");
    ?>


</body>

</html>

