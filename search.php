<?php
session_start();
include("includes/baglan.php");

if (isset($_GET['query'])) {
    $search_query = $conn->real_escape_string($_GET['query']);
    
    // SQL query to search posts by title or body
    $sql = "SELECT * FROM posts WHERE title LIKE '%$search_query%' OR comment LIKE '%$search_query%' ORDER BY id DESC";
    $result = $conn->query($sql);
    ?>
    
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Results</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script defer src="js/main.js"></script>
        <style>
.serh2{
    font-size: 2rem;
   
}
.post-item-search{
    width: 40%;
    height: 40%;
}
            
        </style>
    </head>

    <body>
    <?php
  include("includes/navbar.php");
  ?>
        <!-- Search Results START -->
        <section class="post-search">
            <h2 class="serh2">Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <article class="post-item-search">
                        <div class="post-thumb"><img src="<?php echo $row['image']; ?>" alt=""></div>
                        <div class="post-info">
                            <a href="category-post.php" class="category-btn"><?php echo $row['category']; ?></a>
                            <h3 class="post-title"><a href="post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h3>
                            <p class="post-body"><?php echo substr($row['comment'], 0, 150); ?>...</p>
                            <div class="post-profile">
                                <div class="post-profile-img"><img src="Assets/img/portrait-white-man-isolated.jpg" alt=""></div>
                                <div class="post-profile-info">
                                    
                                    <small><?php echo $row['created_at']; ?></small>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                }
            } else {
                echo "<p>No posts found matching your query.</p>";
            }
            ?>
        </section>
        <!-- Search Results END -->

        <script src="Assets/main.js"></script>
    </body>
    </html>
    <?php
}
?>
