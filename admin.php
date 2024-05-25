<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login Form</title>
    <link rel="stylesheet" href="form.css" />
  </head>
  <body>
    <div class="box">
      <form action="" method="post" autocomplete="off">
        <h2>Admin Login</h2>
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
    </div>
  </body>
</html>
