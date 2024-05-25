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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Profile</title>
    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    <section class="container">

    <?php
      if(isset($_POST['submit'])){
        $username = $_POST['Name'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $DOB = $_POST['DOB'];
        $gender = $_POST['gender'];
        $address = $_POST['Address'];

        $id = $_SESSION['id'];

        $edit_query = mysqli_query($conn, "UPDATE users SET Username='$username', Email='$email', Phone = '$phone', DOB = '$DOB', Gender = '$gender', Address='$address' WHERE Id = $id ") or die("Error!");

        if($edit_query){
          echo "<div class= 'message'>
             <p>Profile Updated!</p>
             </div> <br>";
          echo "<a href ='dashboard.php'><button class='submit'>Go Home</button>";
        }
      }else{

        $id = $_SESSION['id'];
        $query = mysqli_query($conn, "SELECT * FROM users WHERE Id = $id");

        while($result = mysqli_fetch_assoc($query)){
          $res_Uname = $result['Username'];
          $res_Email = $result['Email'];
          $res_Phone = $result['Phone'];
          $res_DOB = $result['DOB'];
          $res_Gender = $result['Gender'];
          $res_Address = $result['Address'];
        }
    ?>



      <header>Change Profile</header>
      <form action="" class="form" method="post">
        <div class="input-box">
          <label>Full Name</label>
          <input
            type="text"
            name="Name"
            value="<?php echo $res_Uname?>"
            placeholder="Enter full name"
            required
          />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input
            type="text"
            name="Email"
            value="<?php echo $res_Email?>"
            placeholder="Enter email address"
            required
          />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input
              type="number"
              name="Phone"
              value="<?php echo $res_Phone?>"
              placeholder="Enter phone number"
              required
            />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input
              type="date"
              name="DOB"
              value="<?php echo $res_DOB?>"
              placeholder="Enter birth date"
              required
            />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" checked />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" />
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input
            type="text"
            name="Address"
            value="<?php echo $res_Address?>"
            placeholder="Enter street address"
            required
          />
          <input
            type="text"
            placeholder="Enter street address line 2"
            required
          />
          <div class="column">
            <div class="select-box">
              <select>
                <option hidden>Country</option>
                <option>India</option>
                <option>America</option>
                <option>Japan</option>
                <option>Nepal</option>
              </select>
            </div>
            <input type="text" placeholder="Enter your city" required />
          </div>
        </div>
        <input type="submit" class="submit" name="submit" value="Update" />
      </form>
      <?php } ?>
    </section>
  </body>
</html>
