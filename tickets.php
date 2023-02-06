<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="public/styles.css" />
    <title>Ticket Generation</title>
  </head>
  <style>
    .box {
      display: table-cell;
      padding: 5px 10px;
      border : solid 1px black;
      background-color: white !important;
      z-index : 1;
      margin: 0;
      width : 10% !important;
      text-align: center;
    }
    .box:hover {
      display: table-cell;
      padding: 5px 10px;
      border : solid 1px black;
      background-color: white !important;
      z-index : 1;
      margin: 0;
      width : 10% !important;
      text-align: center;
    }

    br {
      margin: 0;
    }

    .row {
      display: table-row;
      margin : 0;
    }

    .radio {
      border : solid 5px black;
      border-radius: 100%;
    }

  </style>
  <body style='margin : 0;' >
    <div class='topbar' style="display:block;">
    <img src="cbitlogo.png" class="logo">
    <div class='title' style="display : inline ; margin : 0;"><strong><i><h1 style="display : inline-block;">Online Tambola Game</h1></i></strong></div>
    </div>
    <div class="downpart" >
      <div class="downbar">
        <center>
          <div class="buttonclass"><a class='button' href="rules.php" target="_blank">Home/Rules</a></div>
          <div class="buttonclass"><a class='button' href="numberboard.php" target="_blank">Numberboard</a></div>
          <div class="buttonclass"  style='margin-bottom : 35px'><a class='button' href="signin.php">Log Out</a></div>
        </center>
      </div>
      <div class="content-box" id="content">
        <div class="form">
          <center>
            <label  ><br /><h3>Select the number of players:</h3></label><br />
            <input type="radio" name="radio" class="radio" value="1"><h4>1</h4>
            <input type="radio" name="radio" class="radio" value="2"><h4>2</h4>
            <input type="radio" name="radio" class="radio" value="3"><h4>3</h4>
            <input type="radio" name="radio" class="radio" value="4"><h4>4</h4>
            <input type="radio" name="radio" class="radio" value="5"><h4>5</h4>
            <input type="radio" name="radio" class="radio"  value="6"><h4>6</h4><br /><br />
            <button  id="mybutton" type="submit" name="submit" value="hi" class="button">Submit</button><br /><br />
            <div id="ticket" style='display : block'>
            </div>
          </center>
        </div>

      </div>
    </div>
    <?php
    $command ='python3 ticketgenerator.py';
    $output = shell_exec($command);
    $output = str_replace('Structural representation','*', $output);
    $output = substr($output, 1);
    $output = str_replace('\\n','', $output);
    $arr = explode("*",$output);
    ?>

    <script type='text/javascript'>

    var xampp = '';

    function remove_linebreaks(str){
        return str.replace( /[\\n\r\n]+/gm, "" );
    }

        var arr = [];

        var tentickets = <?php echo json_encode($arr); ?>;


    document.getElementById("mybutton").addEventListener("click", function(){
          document.getElementById("mybutton").value = "bye";
          document.getElementById("mybutton").innerHTML = "Fetching data...";
          if( document.getElementById("mybutton").value == "bye"  ){
            var ele = document.getElementsByName('radio');
                  for(i = 0; i < ele.length; i++) {
                      if(ele[i].checked){
                          xampp = ele[i];
                          document.getElementById("mybutton").innerHTML = "Submitted !";
                      }
                    }
          }

          for( var i = 0 ; i < parseInt(xampp.value) ; i++){
            arr[i] = JSON.stringify( tentickets[i]);
           }
           var count = 1;
           document.getElementById('content').innerHTML += "<center>";
           for (element of arr){

             element = String(element);
             element = element.replace( /["]/gm,"");
             element = element.replace(/\\/g,"");
             element = element.replace(/n/g,"");
             // document.getElementById('ticket').innerHTML += "<p>"+element+"</p>";
             let reg = /\[|\]/g
             element = element.replace(reg,'');
             element = element.split(' ');
             var final= element.filter((str) => str !== '');
             for (var i = 0; i < final.length; i++) {
               var p = '<p class="box">' + final[i] + '</p>';
               document.getElementById('ticket').innerHTML += p;
               if( (i+1)%9 === 0){
                 document.getElementById('ticket').innerHTML += p;
                 document.getElementById('ticket').lastChild.style.display = "table-column-group";
                                 }
             }
             document.getElementById('ticket').innerHTML += "<br /><h4>Ticket for player "+count+"</h4><br /><br /><br />";
             count = count + 1;
             //document.getElementById('ticket').innerHTML += "<p>element added</p>";
           }
           document.getElementById('content').innerHTML += "</center>";
    });






  //   arr[0] = String(arr[0]);
  //   arr[0] = arr[0].replace(/(\r\n|\n|\r)/gm, "");
  //   arr[0] = arr[0].replace(/^[0-9-( )]+$/gm,"");
  //   arr[0] = arr[0].replace( /["]/gm,"");
  //   arr[0] = arr[0].replace(/[[]/gm,"");
  //   arr[0] = arr[0].replace(/[]]/gm,"");
  //
  //   arr[0] = arr[0].replace(reg,'');
  //   arr[0] = arr[0].slice(1);
  //   arr[0] = arr[0].slice(0, arr.length - 1);
  //   arr[0] = arr[0].split(' ');
  //   const final= arr[0].filter((str) => str !== '');
//   for (var i = 0; i < final.length; i++) {
//     var p = '<p class="box">' + final[i] + '</p>';
//     document.getElementById('ticket').innerHTML += p;
//     if( (i+1)%9 === 0){
//       document.getElementById('ticket').lastChild.style.display = "table-column-group";
//     }
// }



    </script>
  </body>
</html>
