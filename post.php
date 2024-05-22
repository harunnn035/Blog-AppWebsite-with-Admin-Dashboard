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

<!--------------------Single Post Start-------------------->
<section class="singele-post">
    <div class="container singele-post-container">

<h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi, ea.</h2>

<div class="post-thumb">
    <img src="Assets/img/kapl.jpg" alt="">
</div>
<div class="post-info">
    <div class="category-btn">Photography</div>
    <h3 class="post-title"><a href="post.html">Lorem ipsum dolor sit,
            amet consectetur adipisicing. </a></h3>

    <p class="post-body">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde quas ad ipsum
        tempore

        doloremque animi perspiciatis recusandae soluta adipisci facilis.</p>
    <div class="post-profile">
        <div class="post-profile-img">
            <img src="Assets/img/portrait-white-man-isolated.jpg" alt="">


        </div>
        <div class="post-profile-info">
            <p class="yusuf">yusufcan</p>
            <small> June 14 2023- 10:24 </small>
        </div>
    </div>
<div class="singele-post-thumb">
<img src="" alt="">

</div>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci aut rem obcaecati nobis saepe voluptatibus iste ratione dolor velit laborum ad voluptatum officiis, provident voluptate porro. Corrupti doloribus molestiae eum quisquam expedita odit hic, ipsam accusantium, neque sapiente porro placeat!</p>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci aut rem obcaecati nobis saepe voluptatibus iste ratione dolor velit laborum ad voluptatum officiis, provident voluptate porro. Corrupti doloribus molestiae eum quisquam expedita odit hic, ipsam accusantium, neque sapiente porro placeat!</p>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci aut rem obcaecati nobis saepe voluptatibus iste ratione dolor velit laborum ad voluptatum officiis, provident voluptate porro. Corrupti doloribus molestiae eum quisquam expedita odit hic, ipsam accusantium, neque sapiente porro placeat!</p>


</div>
</section>


<!--------------------Single Post End-------------------->




<?php
include("includes/footer.php");
    ?>


    <!------------CUSTOM JS LİNK---------------------->
    <script src="Assets/main.js"></script>
</body>

</html>