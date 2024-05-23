<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Role</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-----------CUSTOM CSS LİNK---------------->
    <link rel="stylesheet" href="../css/style.css
    ">
    <script defer src="../js/main.js"></script>
</head>

<body>

    <!---- --------------edit role form----------------------------->
    <section class="form-section">
        <div class="container form-section-container">
            <h2 class="aca">Edit User Role</h2>
            <?php
    include("../includes/baglan.php");

    // Formdan gelen verileri al
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_POST["userId"];
        $rol = $_POST["rol"];

        // Veritabanına güncelleme sorgusu gönder
        $sql = "UPDATE users SET rol='$rol' WHERE userId=$userId";

        if ($conn->query($sql) === TRUE) {
            echo "Kullanıcı rolü başarıyla güncellendi.";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>

            <form action="edit-role.php" method="POST">
            <input type="hidden" name="userId" value="<?php echo isset($_GET['id']) ? htmlspecialchars($_GET['id']) : ''; ?>">

                <select name="rol">
                    <option value="Admin">Admin</option>
                    <option value="Author">Author</option>
                </select>
                <button class="btn" type="submit">Update Role</button>
            </form>
        </div>
    </section>
    <!---- --------------edit role form----------------------------->



    <?php
include("../includes/footer.php");
    ?>


</body>

</html>
