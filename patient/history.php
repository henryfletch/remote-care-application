<?php

// Check the person is logged in!
session_start();    
if (isset($_SESSION['patientAppID']))
{
    $user_id = $_SESSION['patientAppID'];
    //If logged in, go to the HTML page:
}
else
{
header('Location: https://3yp.villocq.com/patient'); 
}
?>

<html>
<head> 
<title>Cardiac Track App</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style.css">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.95; user-scalable=0;">
 
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
        <?php
        // query MySQL and put results here
        include 'graph-data.php';
    ?>
    );

        var options = {
          //title: 'Blood Pressure',
          //titleTextStyle: {color: 'red', fontSize: '40', fontName: 'arial' },
          //chartArea.top: '30',
          //backgroundColor.stroke: {#80807D},
          //vAxis.baselineColor: 'red',
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
         
      }
    </script>
    
  </head>
</head>
<body >
<div class="main_page">

<div id="title_menu">
Cardiac Track
</div>

<div class="page_header" style="position:relative; top:87px; font-size:26px">
<a href="menu.php">
<img src="menu_button.png" style="float:left" height="36px" >
</a>
Historical Track 
</div>

<div id="chart_title">Blood Pressure</div>

<div id="chart_div" style="width: 320px; height: 260px;"></div>

</div>
</html>