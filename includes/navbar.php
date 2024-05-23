<?php
// Session başlatılması
session_start();
?>

<!-- NAV BAR START -->
<nav>
    <div class="nav-container">
        <a href="../index.php" class="logo">
            <h3 class="bas">Blog Page Website</h3>
        </a>
        <ul class="nav-link">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../blog.php">Blog</a></li>
            <li><a href="../about.php">About</a></li>
            <!-- <li><a href="services.php">Services</a></li>
            <li><a href="cotact.php">Contact</a></li> -->
            
            <?php if (isset($_SESSION['userId'])) { ?>
                <li>
                    <a href="#">Hoşgeldiniz, <?php echo htmlspecialchars($_SESSION['userNm']); ?></a>
                </li>
                <li>
                    <a class="dash" href="../admin/dashboard.php">Dashboard</a>
                </li>
                <li>
                    <a class="log" href="includes/logout.php">Log Out</a>
                </li>
            <?php } else { ?>
                <li>
                    <a class="" href="../sing-in.php">Sign In</a>
                </li>
            <?php } ?>
            <li>
                <div class="nav-profile">
                    <div class="profile-img">
                        <img src="../Assets/img/portrait-man-laughing.jpg" alt="" width="" height="">
                    </div>
                </div>
            </li>
        </ul>
        <button class="phone-button Open"><i class="fa fa-bars"></i></button>
        <button class="phone-button Close"><i class="fa fa-close"></i></button>
    </div>
</nav>
<!-- NAV BAR END -->
