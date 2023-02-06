<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/styles.css" />
    <title>Home/Rules</title>
  </head>
  <body style='margin : 0;' >
    <div class='topbar' style="display:block;">
    <img src="cbitlogo.png" class="logo">
    <div class='title' style="display : inline ; margin : 0;"><strong><i><h1 style="display : inline-block;">Online Tambola Game</h1></i></strong></div>
    </div>
    <div class="downpart" >
      <div class="downbar">
        <center>
          <div class="buttonclass"><a class='button' href="tickets.php" target="_blank" >Tickets</a></div>
          <div class="buttonclass"><a class='button' href="numberboard.php" target="_blank">Numberboard</a></div>
          <div class="buttonclass"  style='margin-bottom : 35px'><a class='button' href="signin.php">Log Out</a></div>
        </center>
      </div>
      <div class="content-box">
        <center><h6 class='nameofman' id='name'
        style="font-style: italic;
        font-family: sans-serif;
        color : inherit;
        margin: 0;
        display: inline;
        font-size : 3.5rem;" ></h6><br /></center><h2 style="display :inline; margin-left : 10px; font-size : 3rem;">Rules :</h2><br>
        <ul>
          <li><strong><h3>Decide on the winning point for the game</h3></ strong>
            <ul>
              <li><h4>Early point</h4><br /><p>The player who first strikes 5 numbers in any row wins. This is best if you only want to play a short game.</p></li>
              <li><h4>First Row</h4><br /><p>The player who is first to strike all of the numbers along the top row wins.</p></li>
              <li><h4>Corners</h4><br /><p>The player who can strike each number in the 4 corners of the ticket first, wins.</p></li>
            </ul>
          </li>
          <li><strong><h3>Strike the numbers off as they are called randomly on screen,as if you are playing the game.</h3></li>
            <li><strong><h3>Player whose ticket gets striken off first as per the winning point, wins</h3></strong>
        </ul>
      </div>
    </div>
  </body>
</html>

<?php
$name = $_SESSION["name"];
?>

<h2 id="document_target" style="display: none;"><?php echo $name ; ?></h2>

<?php
if( $name != null){
  echo '<script> document.getElementById("name").textContent ="Hello ! " + document.getElementById("document_target").textContent;</script>';
} ?>
