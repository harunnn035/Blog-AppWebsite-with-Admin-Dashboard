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
        <li><a href="maneg-category.php" >
            <i class="fa fa-list"></i>
            <h5>Manage category</h5>
        </a></li>
    </ul>

</aside>

<main>
                <h2>Manage Users</h2>
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Edit Role</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("includes/baglan.php");

                        $sql = "SELECT userId, userNm, email, rol FROM users ORDER BY userId DESC";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {    
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["userId"] . "</td>
                                        <td>" . $row["userNm"] . "</td>
                                        <td>" . $row["email"] . "</td>
                                        <td>" . $row["rol"] . "</td>
                                        <td><a href='edit-role.php?id=" . $row["userId"] . "' class='btn sm'>Edit Role</a></td>
                                        <td><a href='delete-user.php?id=" . $row["userId"] . "' class='btn sm' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a></td>
                                      </tr>";
                            }   
                        } else {
                            echo "<tr><td colspan='6'>No users found in the database.</td></tr>";
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
include("includes/footer.php");
    ?>

    <!------------CUSTOM JS LİNK---------------------->
    <script src="js/main.js"></script>
</body>

</html>