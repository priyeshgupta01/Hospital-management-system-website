<?php
 session_start();
 include("php/config.php");
 if(!isset($_SESSION['valid'])){
    header("Location: login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="index.php">Logo</a></p>
        </div>

        <div class="right-links">

            <?php
                $id = $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT * FROM users WHERE Id = $id");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Phone = $result['Phone'];
                    $res_id = $result['Id'];
                    $res_disease = $result['disease'];
                    $res_doc = $result['doctor_name'];
                }

                echo "<a href = 'update.php?Id=$res_id' target='_blank'>Change Profile</a>";
            ?>

            <a href="logout.php"> <button class="btn">Log out</button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b> <?php echo $res_Uname ?></b>, Welcome</p>
                </div>
                <div class="box">
                    <p>Your email is <b><?php echo $res_Email ?></b></p>
                </div>
                <div class="bottom">
                    <div class="box">
                        <p>And your Disease is <b><?php echo $res_disease ?></b></p>
                    </div>
                </div>
                <div class="box">
                    <p>Your Doctor is<b> <?php echo $res_doc ?></b></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>