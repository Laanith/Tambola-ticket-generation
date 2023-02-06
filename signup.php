<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/styles.css" />
    <title>Sign up</title>
  </head>
  <body style='margin : 0;' >
    <div class='topbar' style="display:block;">
    <img src="cbitlogo.png" class="logo">
    <div class='title' style="display : inline-block ; margin : 0;"><strong><i><h1>Online Tambola Game</h1></i></strong></div>
    </div>
    <div class="downpart" >
      <div class="downbar">
        <center>
          <div class="buttonclass"><a class='button' href="rules.php">Home/Rules</a></div>
          <div class="buttonclass"  style='margin-bottom : 35px'><a class='button' href="signin.php">Sign in</a></div>
        </center>
      </div>
      <div class="content-box formbox">
        <center>
          <h3 style='font-size : 4rem;'>Welcome !</h3><br /><br />
          <form class="" action="signup.php" method="post"><br /><br />
              <label for="name"><h4>Name : </h4></label><input  required='true' type="Text" placeholder="Your Name" id="name" name="name"><br /><br />
              <label for="username"><h4>Username : </h4></label> <input required='true' type="text" placeholder="Username must be unique" id="username" name="username"><br /><br />
              <label for="email"><h4>Email : </h4></label> <input required='true' type="email" placeholder="Your Email ID" id="email" name="email"><br /><br />
              <label for="password"><h4>Password : </h4></label><input required='true' type="password" placeholder="Enter the Password" id="password" name="password"><br /><br />
              <label for="confirmpassword"><h4>Confirm Password : </h4></label> <input required='true' type="password" placeholder="Enter the Password" id="confirmpassword" name="confirmpassword"><br /><br />
              <button class='button' type="submit" name="submit">Sign Up</button>
          </form>
        </center>
      </div>
    </div>
  </body>
</html>


<?php
require 'config.php';
// if (!$conn) {                                                         //Uncomment this and run script to check if connection is established
//   die("Connection Failed: ". mysqli_connect_error());                 //between database and php.
// }
// echo "Connection established successfully";

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    if($name === "" or $username === "" or $email==="" or $password==="" or $confirmpassword === "" ){
      echo '<script>alert("Cannot intake empty fields");</script>';
    }
    $duplicate = mysqli_query($conn, "SELECT * FROM userids WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert('Either Username or Email are already in use'); </script>";
    }


    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO userids VALUES('$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration successful, redirecting to Sign In page'); </script>";
            echo "<script> window.location.replace('signin.php')</script>";
        }
        else{
            echo
            "<script> alert('Recheck the password'); </script>";
        }
    }
}
?>
