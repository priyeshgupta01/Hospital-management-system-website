<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login Form</title>
    <link rel="stylesheet" href="form.css" />
  </head>
  <body>
    <div class="box">

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
        header("Location: dashboard.php");
      }
        }else{
      ?>
      <form action="" method="post" autocomplete="off">
        <h2>Patient Login</h2>
        <div class="inputBox">
          <input type="text" name="Email" required="required" />
          <span>Userame</span>
          <i></i>
        </div>
        <div class="inputBox">
          <input type="password" name="Password" required="required" />
          <span>Password</span>
          <i></i>
        </div>
        <div class="links">
          <a href="#">Forgot Password ?</a>
          <a href="./register.php">Signup</a>
        </div>
        <input type="submit" name="submit" value="Login" />
      </form>
      <?php } ?>
    </div>
  </body>
</html>
