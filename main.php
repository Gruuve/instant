<?php 

$qw = $_GET["q"];
$url = "https://api.duckduckgo.com/?q=". $qw ."&format=json&pretty=1&no_redirect=1&no_html=1";
$json = file_get_contents($url);
$json_data = json_decode($json);

$heading = $json_data->Heading;

if ($heading == ""){
  echo "<script>window.location = \"main.html\";</script>";
}

$text = $json_data->AbstractText;
$img = $json_data->Image;
$imgH = $json_data->ImageHeight;
$imgW = $json_data->ImageWidth;

$textS = $json_data->AbstractSource;
$textU = $json_data->AbstractURL;

$answer = $json_data->Answer;





?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom_main.css">


    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">

    <title>Gruuve : Instant Search</title>
  </head>
  <body>
      <nav class="navbar navbar-dark bg-danger">
          <div class="container-fluid">
              <a class="navbar-brand" href="index.html"><font class="temp">Gruuve </font><font class="subtag">Instant Search</font></a>

              <div class="form-inline">
                  <input type="text" class="form-control" placeholder="Search" id="input1" style="font-size : 18px;">
                  <div class="input-group-append">
                    <button class="btn btn-warning" type="button" id="search" onclick="search()">Search</button>
                  </div> 
                </div>
        </nav>

        <br><br>              <!--Breaks-->
        <!--Results-->

        <div class="container">
          
            <div class="card">
                <img src="<?php echo $img; ?>" height="<?php echo $imgH; ?>" width="<?php echo $imgW; ?>">
                <div class="card-body">
                  <h2 class="card-title"><?php echo $heading; ?></h2>
                  <p class="card-text" style="font-size: 18px"><?php echo $text; ?></p>
                  <p class="card-text"><small class="text-muted"><a href ="<?php echo $textU ?>"><?php echo $textS; ?></a></small></p>
                </div>
              </div>

              

              <!--Answer-->

              <?php 
              
              if ($answer != ""){
              echo "<br><div class=\"card bg-primary\">
                <div class=\"card-body\">
                    <h3 class=\"card-title\" style=\"color : white;\">$answer</h3>
                </div>
              </div>";} ?>

                <!--Details--> <br>

                <?php

                if(!empty($json_data->Infobox)){

                  $info = $json_data->Infobox->content;

              echo "<div class=\"card\">
                  <div class=\"card-body\">
                      <h3 class=\"card-title\">Results</h3>
                      <div class=\"card-text\" style=\"font-size: 18px\">
                        <ul>";

                          
                          foreach($info as $in)
                          if ($in->data_type == "string"){
                          echo "<li>$in->label : <b>$in->value</b></li>";
                          }
                          
                        
                       echo" </ul>
                      </div>
                  </div>
                </div>";

                        }
                          ?>


                      
                        <!--Links-->

                        <?php

                        if(!empty($json_data->Results)){

                            $res = $json_data->Results;

                       echo "<br><div class=\"card\">
                          <div class=\"card-body\">
                          <h3 class=\"card-title\">Links</h3>
                          <div class=\"card-text\">";


                            foreach($res as $re){
                              $iU = $re->Icon->URL;
                              $iH = $re->Icon->Height;
                              $iW = $re->Icon->Width;
                              $RR = $re->Result;

                            echo "<font style=\"font-size:20px;\"> $RR </font><div>";
                            
                              echo "<img src =$iU height=$iH width=$iW > $re->FirstURL
                              
                          </div>";
                            
                        }




                      echo " </div>


                      
                               </div> </div> ";  }  ?>

                               

        
        </div>
        
                        <br><br>
</body>
</html>




<!--Script Start-->
<script>
    function search(){
      var a = document.getElementById('input1').value;
 
      if(a==''){
        alert('Please enter a value.');
      }
      else {
        a = a.trim();
        a = findAndReplace(a," ","+");
        var url = 'main.php?q=' + a;
        window.location = url;
        
      }
 
    }
 
 
 function findAndReplace(string, target, replacement) {
  
  var i = 0, length = string.length;
  
  for (i; i < length; i++) {
  
    string = string.replace(target, replacement);
  
  }
  
  return string;
  
 }
 
 </script>