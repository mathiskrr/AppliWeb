<!DOCTYPE html>

<html lang="fr">
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Page Tableau Conso Elec">

    <!--JS-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="./refreshGraph.js"></script>
    <script src="./graphs.js"></script>


    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

	<title> Accueil </title>
  <link rel="icon" href="img/logodax.png" sizes="16x16">
  </head>
   
  <body class="haut">


  	<!--*****************NAVBAR*****************-->
   
  	<?php include 'navbar.html';?>

	<!--******************GRAPHS******************-->
    <div id="id_graph">
      <div class='Graphiques'>
      <div class="graph1">
          <canvas id="chart1" style="width: 55%; height: 55%; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
      </div>
      <div class="graph2">
          <canvas id="chart2" style="width: 55%; height: 55%; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
      </div>
      <div class="graph3">
          <canvas id="chart3" style="width: 55%; height: 55%; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
      </div>
    </div>
  </div>

    <!--******************REFRESHGRAPH******************-->

    <script type="text/javascript">
	    $(document).ready(function () {
		    // 1er appel pour inclure le graphe et mettre en route le timer
		    refreshGraph();
	    });
    </script>

   </body>
</html>