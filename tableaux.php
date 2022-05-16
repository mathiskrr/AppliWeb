<!DOCTYPE html>
<html lang="fr">
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Page Tableau Conso Elec">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
	<title> Historique </title>
	<link rel="icon" href="img/logodax.png" sizes="16x16">
  </head>
   
  <body id="haut">


  	<!--*****************NAVBAR*****************-->
   
  	<?php include 'navbar.php';?>

	<!--******************MAIN******************-->
      

   <div class="container-fluid">


      <?php // connexion à la base de données pour afficher les valeurs dans un tableau

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "BEnOcean";

			// Création de la connexion
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Vérification de la connexion
			if ($conn->connect_error) {
			    die("Connexion échoué: " . $conn->connect_error);
			} 

			//Récupération des données de mesures
			$sqlElec = "SELECT cons_value, date_value FROM TElecConsumption";
			$resultElec = $conn->query($sqlElec);

			$sqlHumid = "SELECT sensor_value, date_value FROM THumidity";
			$resultHumid = $conn->query($sqlHumid);
			
			$sqlTemp = "SELECT sensor_value, date_value FROM TTemperature";
			$resultTemp = $conn->query($sqlTemp);
		?>
		<div class ="Temp">
		<h3> Tableau Historique Température </h3>

		<!--Entête du tableau Température-->
		<table class="table table-hover table-striped"> 
		  <thead>
		    <tr>
		      <th scope="col">Date</th>
		      <th scope="col">Valeur (°C)</th>
		    </tr>
		  </thead>
		  <tbody>
    	<!--Corps du tableau Température-->
    	<?php  
   				while($row = $resultTemp->fetch_assoc()) {
			        echo "<tr><td>".$row["date_value"]."</td>
			        	<td>".$row["sensor_value"]."</td>
					    </tr>";					        
			    	}
			    echo "</tbody>";

			?>
		</table>
		</div>

		<div class ="Elec">
		<h3> Tableau Historique Consommation Électrique </h3>

		<!--Entête du tableau Consommation Électrique-->
		<table class="table table-hover table-striped"> 
		  <thead>
		    <tr>
		      <th scope="col">Date</th>
		      <th scope="col">Valeur (W)</th>
		    </tr>
		  </thead>
		  <tbody>
    	<!--Corps du tableau Consommation Électrique-->
    	<?php  
   				while($row = $resultElec->fetch_assoc()) {
			        echo "<tr><td>".$row["date_value"]."</td>
			        	<td>".$row["cons_value"]."</td>
					    </tr>";					        
			    	}
			    echo "</tbody>";

			?>
		</table>
		</div>


		<div class= "Humid">
		<h3> Tableau Historique Humidité </h3>

		<!--Entête du tableau Humidité-->
		<table class="table table-hover table-striped"> 
		  <thead>
		    <tr>
		      <th scope="col">Date</th>
		      <th scope="col">Valeur (%)</th>
		    </tr>
		  </thead>
		  <tbody>
    	<!--Corps du tableau Humidité-->
    	<?php  
   				while($row = $resultHumid->fetch_assoc()) {
			        echo "<tr><td>".$row["date_value"]."</td>
			        	<td>".$row["sensor_value"]."</td>
					    </tr>";					        
			    	}
			    echo "</tbody>";

			?>
		</table>
		</div>
        </div>
   </body>
</html>