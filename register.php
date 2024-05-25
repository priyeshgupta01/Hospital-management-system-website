<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register</title>

    <link rel="stylesheet" href="register.css" />
  </head>
  <body>
    <section class="container">

  <?php

    include("php/config.php");
    if(isset($_POST['submit'])){
      $username = $_POST['Username'];
      $email = $_POST['Email'];
      $phone = $_POST['Phone'];
      $DOB = $_POST['DOB'];
      $gender = $_POST['gender'];
      $address = $_POST['Address'];
      $password = $_POST['Password'];
      $disease = $_POST['Disease'];
      $doctor_name = $_POST['Doctor_name'];



    //verifying the unique email:-

    $verify_query = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$email'");

    if(mysqli_num_rows($verify_query) != 0){
      echo "<div class= 'message'>
               <p>This email is used, try another please!</p>
            </div> <br>";
      echo "<a href ='javascript:self.history.back()'><button class='submit'>Go Back</button>";
    }
    else{

      mysqli_query($conn, "INSERT INTO users(Username, Email, Phone, DOB, Gender, Address, Password, disease, doctor_name) VALUES ('$username', '$email', '$phone', '$DOB', '$gender', '$address', '$password', '$disease', '$doctor_name') ") or die("Error Occured");

      echo "<div class= 'message'>
             <p>Registration successfull!</p>
           </div> <br>";
     echo "<a href ='login.php'><button class='submit'>Login Now</button>";
    }

    } else{

  ?>

      <header>Registration Form</header>
      <form action="" class="form" method="post">
        <div class="input-box">
          <label>Full Name</label>
          <input
            type="text"
            name="Username"
            placeholder="Enter full name"
            required
          />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input
            type="text"
            name="Email"
            placeholder="Enter email address"
            required
          />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input
              type="mobile"
              name="Phone"
              placeholder="Enter phone number"
              required
            />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input
              type="date"
              name="DOB"
              placeholder="Enter birth date"
              required
            />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="Male" /> Male
            
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="Female" /> Female
             
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" value="prefer not to say" /> prefer not to say
              
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input
            type="text"
            name="Address"
            placeholder="Enter street address"
            required
          /> 
          <label>Disease</label>
          <input
            type="text"
            placeholder="Explain about your disease"
          />
          <div class="column">
            <div class="select-box">
              <select name="Disease">
                <option hidden>Disease Type</option>
                <option>Infectious diseases</option>
                <option>Deficiency diseases</option>
                <option>Hereditary diseases</option>
                <option>Physiological diseases</option>
              </select>
            </div>
            <div class="select-box">
              <select name="Doctor_name">
                <option hidden>Select Doctor</option>
                <option>Dr.Devesh Gupta</option>
                <option>Dr.Shalini Dubey</option>
                <option>Dr.Amrita Singh</option>
                <option>Dr.Akash Sharma</option>
                <option>Dr.Amit Mishra</option>
              </select>
            </div>
          </div>
          <div class="column">
            <input
              type="password"
              name="Password"
              placeholder="Create Password"
              required
            />
          </div>
        </div>
        <input type="submit" class="submit" name="submit" value="Register" />
      </form>
      <?php } ?>
    </section>
  </body>
</html>
