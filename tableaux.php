<?php
// connexion à la base de données pour afficher les valeurs dans un tableau
$connect = mysqli_connect("localhost", "root", "", "BEnOcean");

$query_temperature = "SELECT sensor_value, date_value FROM TTemperature";
$query_humidity = "SELECT sensor_value, date_value FROM THumidity";
$query_elecconsumption = "SELECT cons_value, date_value FROM TElecConsumption";

$result_temperature = mysqli_query($connect, $query_temperature);
$result_humidity = mysqli_query($connect, $query_humidity);
$result_elecconsumption = mysqli_query($connect, $query_elecconsumption);
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Page Tableau Conso Elec">
    <!-- CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title> Historique </title>
    <link rel="icon" href="img/logodax.png" sizes="16x16">
  </head>
  <body id="haut">
    <!--*****************NAVBAR*****************-->
    <?php include 'navbar.html'; ?>
    <!--******************MAIN******************-->
    <br /><br />  
    <div class="container" style="width:500px;">
    <div class="col-md-3">  
      <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
    </div>
    <div class="col-md-3">  
      <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
    </div>
    <div class="col-md-5">  
      <input type="button" name="filter" id="filter" value="Filtrer" class="btn btn-info" />  
    </div>
    <div style="clear:both"></div>
    <br />  
    <h3> Tableau Historique Température </h3>
    <!--Entête du tableau Température-->
    <div id="order_table" >
        <table class="table table-hover table-striped" href="#temp">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Valeur (°C)</th>
            </tr>
          </thead>
          <tbody>
            <!--Corps du tableau Température-->
            <?php
              while ($row = mysqli_fetch_array($result_temperature))
              {
                  echo "<tr><td>" . $row["date_value"] . "</td>
                            <td>" . $row["sensor_value"] . "</td>
                            </tr>";
              }
              echo "</tbody>";
              
              ?>
        </table>
      <h3> Tableau Historique Humidité </h3>
        <table class="table table-hover table-striped" href="#humid">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Valeur (%)</th>
            </tr>
          </thead>
          <tbody>
            <!--Corps du tableau Huymidity-->
            <?php
              while ($row = mysqli_fetch_array($result_humidity))
              {
                  echo "<tr><td>" . $row["date_value"] . "</td>
                            <td>" . $row["sensor_value"] . "</td>
                            </tr>";
              }
              echo "</tbody>";
              
              ?>
        </table>
      <h3> Tableau Historique Consommation Électrique </h3>
        <table class="table table-hover table-striped" href="#elec">
          <thead>
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Valeur (W)</th>
            </tr>
          </thead>
          <tbody>
            <!--Corps du tableau ElecConsumption-->
            <?php
              while ($row = mysqli_fetch_array($result_elecconsumption))
              {
                  echo "<tr><td>" . $row["date_value"] . "</td>
                            <td>" . $row["cons_value"] . "</td>
                            </tr>";
              }
              echo "</tbody>";
              
              ?>
        </table>
    </div>
  </body>
</html>

<script>
	$(document).ready(function() {
		$.datepicker.setDefaults({
			dateFormat: 'yy-mm-dd'
		});
		$(function() {
			$("#from_date").datepicker();
			$("#to_date").datepicker();
		});
		$('#filter').click(function() {
			var from_date = $('#from_date').val();
			var to_date = $('#to_date').val();
			if (from_date != '' && to_date != '') {
				$.ajax({
					url: "filter.php",
					method: "POST",
					data: {
						from_date: from_date,
						to_date: to_date
					},
					success: function(data) {
						$('#order_table').html(data);
					}
				});
			} else {
				alert("Please Select Date");
			}
		});
	}); 
</script>
