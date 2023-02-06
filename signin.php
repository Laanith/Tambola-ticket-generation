<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/styles.css" />
    <title>Sign in</title>
  </head>
  <body style='margin : 0;' >
    <div class='topbar' style="display:block;">
    <img src="cbitlogo.png" class="logo">
    <div class='title' style="display : inline-block ; margin : 0;"><strong><i><h1>Online Tambola Game</h1></i></strong></div>
    </div>
    <div class="downpart" >
      <div class="downbar">
        <center>
          <div class="buttonclass"><a class='button' href="rules.php">Home</a></div>
          <div class="buttonclass"  style='margin-bottom : 35px'><a class='button' href="signup.php">Sign up</a></div>
        </center>
      </div>
      <div class="content-box formbox">
        <center>
          <h3 style='font-size : 4rem;'>Welcome ! Sign in to continue :</h3><br /><br />
          <form class="" action="signin.php" method="post">
            <label for="username"><h4>Your Username :</h4></label>
            <input id='username' type='text' placeholder="Your name" name="username" ><br /><br />
            <label for="password"><h4>Password</h4></label>
            <input type='password' placeholder="Password" name="password"><br /><br />
            <button class='button' type="submit" name="submit">Sign In</button>
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
    $username = strval($_POST["username"]);
    $name = "";
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM userids WHERE Username='$username'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
        if ( $password == $row["Password"]){
          $_SESSION['name']= $row["Name"];
          echo '<script>alert("Password is correct");</script>';
          echo '<script> window.location.replace("rules.php");</script>';
        }
        else{
            echo
            "<script> alert('Wrong password'); </script>";
        }
    }
    else{
        echo
            "<script> alert('User not registered'); </script>";
            "<script> windows.location.replace('signup.php');</script>";
    }
}

?>
