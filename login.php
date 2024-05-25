<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

  <?php
    include("php/config.php");
    if(isset($_POST['submit'])){
      $email = mysqli_real_escape_string($conn, $_POST['Email']);
      $password = mysqli_real_escape_string($conn, $_POST['Password']);

      $result = mysqli_query($conn, "SELECT * FROM users WHERE Email= '$email' AND Password = '$password'") or die("Error");

      $row = mysqli_fetch_assoc($result);

      if(is_array($row) && !empty($row)){
        $_SESSION['valid'] = $row['Email'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['phone'] = $row['Phone'];
        $_SESSION['id'] = $row['Id'];
      }else{
        echo "<div class= 'message'>
        <p>Wrong username or password!</p>
        </div> <br>";
        echo "<a href ='login.php'><button class='submit'>Go Back</button>";
      }
      if(isset($_SESSION['valid'])){
        header("Location: index.php");
      }
    }else{
  ?>

    <h1 class="login-heading">Login As</h1>
    <div class="login-boxes">
      <div class="login-box" id="login1">
        <div class="patient">
          <h1>Admin Login</h1>
          <a href="admin.php" target="_blank"><button>Click Here</button></a>
        </div>
      </div>

      <div class="login-box" id="login2">
        <div class="patient">
          <h1>Doctor Login</h1>
          <a href="doctor.php" target="_blank"><button>Click Here</button></a>
        </div>
      </div>

      <div class="login-box" id="login3">
        <div class="patient">
          <h1>Patient Login</h1>
          <a href="patient.php" target="_blank"><button>Click Here</button></a>
        </div>
      </div>
    </div>
    <?php } ?>
  </body>
</html>
