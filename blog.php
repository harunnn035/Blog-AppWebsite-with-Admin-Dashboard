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
    <i class="fab fa-facebook" aria-hidden="true"></i>
    <?php
  include("includes/navbar.php");
  ?>
<!----------------- Blog Page Seach BAR START------------------->
<section class="search-bar">
    <form class="container search-container" method="GET" action="search.php">
        <div>
            <i class="fa fa-search"></i>
            <input type="search" name="query" placeholder="Search.." required>
        </div>
        <button class="btn1 " type="submit">Search</button>
    </form>
</section>

<!----------------- Blog Page Seach BAR   END------------------->



  <!-- Post START -->
  <section class="post-container">
        <?php

        include("includes/baglan.php");
        // SQL query: select all posts, order by is_featured first, then by id
        $sql = "SELECT * FROM posts ORDER BY is_featured DESC, id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<article class='post-item'>";
                echo "<div class='post-thumb'><img src='" . $row['image'] . "' alt=''></div>";
                echo "<div class='post-info'>";
                echo "<a href='category-post.php' class='category-btn'>" . $row['category'] . "</a>";
                echo "<h3 class='post-title'><a href='post.php'>" . $row['title'] . "</a></h3>";
                echo "<p class='post-body'>" . $row['comment'] . "</p>";
                echo "<div class='post-profile'>";
                echo "<div class='post-profile-img'><img src='Assets/img/portrait-white-man-isolated.jpg' alt=''></div>";
                echo "<div class='post-profile-info'>";
              
                echo "<small>" . $row['created_at'] . "</small>";
                echo "</div></div></div></article>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </section>
    <!------------------ Post END -------------------->




    <?php
include("includes/footer.php");
    ?>



</body>

</html>