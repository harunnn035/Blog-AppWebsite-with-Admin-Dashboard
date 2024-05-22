<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL Blog Application With Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="js/main.js"></script>
</head>

<body>
    <?php
  include("includes/navbar.php");
  ?>
    <!-- Start Featured -->
    <section class="Featured">
        <div class="container featured-container">
            <?php
            session_start();
            include("includes/baglan.php");

            // SQL query: select the featured post
            $featured_sql = "SELECT * FROM posts WHERE is_featured = 1 ORDER BY id DESC LIMIT 1";
            $featured_result = $conn->query($featured_sql);

            if ($featured_result->num_rows > 0) {
                $featured_post = $featured_result->fetch_assoc();
                echo "<div class='post-thumb'><img src='" . $featured_post['image'] . "'></div>";
                echo "<div class='post-info'>";
                echo "<div class='category1'>" . $featured_post['category'] . "</div>";
                echo "<h2 class='post-title'><a href='/post.php'>" . $featured_post['title'] . "</a></h2>";
                echo "<p class='post-body'>" . $featured_post['comment'] . "</p>";
                echo "<div class='post-profile'>";
                echo "<div class='post-profile-img'><img src='Assets/img/portrait-white-man-isolated.jpg' alt=''></div>";
                echo "<div class='post-profile-info'>";
               
                echo "<small>" . $featured_post['created_at'] . "</small>";
                echo "</div></div></div>";
            } else {
                echo "<p>No featured post available</p>";
            }
            ?>
        </div>
    </section>
    <!-- Featured End -->

    <!-- Post START -->
    <section class="post-container">
        <?php
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
    <!-- Post END -->


    <?php
include("includes/footer.php");
    ?>

    <script src="Assets/main.js"></script>
</body>

</html>
