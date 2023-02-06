<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/styles.css" />
    <title>Numberboard</title>
  </head>
  <style media="screen">

  .box {
    border : solid 2px black;
    display: inline-block;
    padding : 8px 16px;
    width : 25px;
    height : 20px;
    background-color: #AEE2FF;
    color : black;
    margin : 7px 20px 7px 20px;
  }
  </style>


<body style='margin : 0;' >
    <div class='topbar' style="display:block;">
    <img src="cbitlogo.png" class="logo">
    <div class='title' style="display : inline ; margin : 0;"><strong><i><h1>Online Tambola Game</h1></i></strong></div>
    </div>

    <div class="downpart" >
      <div class="downbar">
        <center>
          <div class="buttonclass"><a class='button' href="rules.php target="_blank"">Home/Rules</a></div>
          <div class="buttonclass"><a class='button' href="tickets.php" target="_blank">Tickets</a></div>
          <div class="buttonclass"  style='margin-bottom : 35px'><a class='button' href="signin.php">Log Out</a></div>
        </center>
      </div>

      <div>
          <center><div style='position : absolute ; top :30%; border-width :3px;' class='content-box'><h3>Generate a random number</h3></div>
      </div>

<div class='card content-box' style="display:inline-block; border : solid 5px black;z-index: 1; width:13%; border-radius : 40px; left :16% !important;
    top :36% !important;
    position : absolute; !important;">
    <center>
        <h2 id='number' style='display : inline-block;'>0</h2><br>
        <script type="text/javascript" id="true">
                    var numarray = [];

        function getRandomInt(max) {
            return Math.floor(Math.random() * max + 1);
        }


        function clickme(){
          var k = getRandomInt(90);
          if( numarray.includes(k,0) === true ){
            clickme();
          }
          else{
            document.getElementById('number').innerHTML = String(k);
            numarray.push(k);
            document.getElementsByClassName('box')[k-1].style.textDecoration = 'line-through';
            document.getElementsByClassName('box')[k-1].style.backgroundColor = '#863A6F';
          }
        }
        </script>
        <button style='margin-bottom : 4px;' type="button" class='button' onclick="clickme()">Call Next</button>
        </center>
</div>


<div class='card' style="display:inline-block; border-width: 0; right :1% !important;
    top :36% !important;
    position : absolute; !important; padding-left : 40px; padding-right : 40px;">
<center>
<div id="carddiv">
<script>
    for(let i = 1; i < 91 ; i++){
      var child = '<p class="box">'+i+'</p>';
      document.getElementById('carddiv').innerHTML += child ;
      if(i%10 == 0){
        document.getElementById('carddiv').innerHTML += '<br />';
      }
    }
 </script>

</div></center>
</div>

</div>






  </body>
</html>

<?php  ?>
