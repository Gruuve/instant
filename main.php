<?php 

$qw = $_GET["q"];
$url = "https://api.duckduckgo.com/?q="+ qw +"&format=json&pretty=1&no_redirect=1&no_html=1";
$json = file_get_contents($url);
$json_data = json_decode($json);


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
                <img src="https://duckduckgo.com/i/0f9d3f68.jpg" height="200" width="165">
                <div class="card-body">
                  <h2 class="card-title"><?php echo $qw; ?></h2>
                  <p class="card-text" style="font-size: 18px">Abstract Text kslighlsihglidhglihriirrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr Abstract Text</b></p>
                  <p class="card-text"><small class="text-muted"><a href ="Abstract URl">Abstract Source</a></small></p>
                </div>
              </div>

              <br>

              <!--Answer-->

              <div class="card bg-primary">
                <div class="card-body">
                    <h3 class="card-title" style="color : white;">This is a Answer to the question asked.</h3>
                </div>
              </div>

                <!--Details--> <br>

              <div class="card">
                  <div class="card-body">
                      <h3 class="card-title">Results</h3>
                      <div class="card-text" style="font-size: 18px">
                        <ul>
                          <li>Data 1 : <b>ugefiuwgufg</b></li>
                        </ul>
                      </div>
                  </div>
                </div>


        </div> 

</body>





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