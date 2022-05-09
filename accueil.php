<!DOCTYPE html>

<?php // connexion à la base de données pour afficher les valeurs dans un tableau

session_start();

			$servername = "192.168.0.28";
			$username = "mathis_carrere";
			$password = "sbRQi87R7";
			$dbname = "BEnOcean";

			// Création de la connexion
			$mysqli = new mysqli($servername, $username, $password, $dbname) or die($mysqli->error);

            $DateTemp = array();
            $Temp = array();

            $DateElec = array();
            $Elec = array();

            $DateHumid = array();
            $Humid = array();


			//Récupération des données de mesures
			$sqltemp = "SELECT module_id, sensor_value, date_value FROM TTemperature";
			$resulttemp = mysqli_query($mysqli, $sqltemp);

			while ($rowtemp = mysqli_fetch_array($resulttemp)) {
                $DateTemp[] = $rowtemp['date_value'];
                if ($rowtemp['module_id'] <= 100000000) {      
                  $Temp[] = $rowtemp['sensor_value'];
                }
              }

      $sqlelec = "SELECT module_id, cons_value, date_value FROM TElecConsumption";
			$resultelec = mysqli_query($mysqli, $sqlelec);

			while ($rowelec = mysqli_fetch_array($resultelec)) {
                $DateElec[] = $rowelec['date_value'];
                if ($rowelec['module_id'] <= 100000000) {      
                  $Elec[] = $rowelec['cons_value'];
                }
              }

      $sqlhumid = "SELECT module_id, sensor_value, date_value FROM THumidity";
			$resulthumid = mysqli_query($mysqli, $sqlhumid);

			while ($rowhumid = mysqli_fetch_array($resulthumid)) {
                $DateHumid[] = $rowhumid['date_value'];
                if ($rowhumid['module_id'] <= 100000000) {      
                  $Humid[] = $rowhumid['sensor_value'];
                }
              }
		?>

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


    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

	<title> Accueil </title>
  <link rel="icon" href="img/logodax.png" sizes="16x16">
  </head>
   
  <body class="haut">


  	<!--*****************NAVBAR*****************-->
   
  	<?php include 'navbar.php';?>

	<!--******************GRAPHS******************-->
    <div id="id_graph"></div>

    <!--******************REFRESHGRAPH******************-->

    <script src="./refreshGraph.js"></script>

    <script type="text/javascript">
	    $(document).ready(function () {
		    // 1er appel pour inclure le graphe et mettre en route le timer
		  refreshGraph();
	  });
    </script>

   </body>
</html>