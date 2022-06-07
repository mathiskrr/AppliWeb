<?php

if (!empty($_GET['salle'])) {
  $salle=intval($_GET['salle']);
  if ($salle <= 0 || $salle > 6) {
    // message d'erreur
    $salle=1;
  }
} else {
  $salle=1;
}
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
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="./tableaux.js"></script>
    <script src="./refreshTab.js"></script>

    <title> Historique </title>
    <link rel="icon" href="img/logodax.png" sizes="16x16">
  </head>
  <body id="haut">
    <!--*****************NAVBAR*****************-->
    <?php include 'navbar.php'; ?>
    <!--******************MAIN******************-->
    <input type="button" name="refreshButton" id="refreshButton" value="Rafraichir" class="btn btn-info" />
    <br /><br />  
    <div class="container" style="width:900px;">
    <br />
    <h3 id="Temp"> Tableau Historique Température ( Dernières 24 heures ) </h3>
    <div id="idtemp"></div>

    <h3 id="Elec"> Tableau Historique Consommation Électrique ( Dernières 24 heures ) </h3>
    <div id="idelec"></div>

    <h3 id="Humid"> Tableau Historique Humidité ( Dernières 24 heures ) </h3>
    <div id="idhumid"></div>
  </body>
</html>

<script>
	$(document).ready(function() {
      $('#refreshButton').click(function() {
        refreshTab(0,<?php echo $salle ?>);
      });
	    $(document).ready(function () {
	      // 1er appel pour inclure le tableau et met en route le timer
        refreshTab(10000,<?php echo $salle ?>);
	    });
	});
</script>
