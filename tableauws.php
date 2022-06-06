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

// connexion à la base de données pour afficher les valeurs dans un tableau
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "BEnOcean";

// Création de la connexion
$mysqli = new mysqli($servername, $username, $password, $dbname) or die($mysqli->error);

$sqltemp = sprintf("SELECT t.sensor_value, t.date_value, t.module_id
FROM TTemperature t, TModules m, TRoom r 
WHERE t.date_value > DATE_SUB(NOW(), INTERVAL 24 HOUR) 
AND t.module_id = m.module_id
AND m.room_id = r.room_id 
AND r.room_id = %d", $salle);

$resulttemp = mysqli_query($mysqli, $sqltemp);

$Temp = array();
while ($rowtemp = mysqli_fetch_array($resulttemp)) {
    $tmptemp['date_value'] = $rowtemp['date_value'];
    if ($rowtemp['module_id'] <= 100000000) {
        $tmptemp['sensor_value'] = $rowtemp['sensor_value'];
    }
    $Temp[] = $tmptemp;
}

$sqlhumid = sprintf("SELECT h.sensor_value, h.date_value, h.module_id
FROM THumidity h, TModules m, TRoom r 
WHERE h.date_value > DATE_SUB(NOW(), INTERVAL 24 HOUR) 
AND h.module_id = m.module_id
AND m.room_id = r.room_id 
AND r.room_id = %d", $salle);

$resulthumid = mysqli_query($mysqli, $sqlhumid);

$Humid = array();
while ($rowhumid = mysqli_fetch_array($resulthumid)) {
    $tmphumid['date_value'] = $rowhumid['date_value'];
    if ($rowhumid['module_id'] <= 100000000) {
        $tmphumid['sensor_value'] = $rowhumid['sensor_value'];
    }
    $Humid[] = $tmphumid;
}

$sqlelec = sprintf("SELECT e.cons_value, e.date_value, e.module_id
FROM TElecConsumption e, TModules m, TRoom r 
WHERE e.date_value > DATE_SUB(NOW(), INTERVAL 24 HOUR) 
AND e.module_id = m.module_id
AND m.room_id = r.room_id 
AND r.room_id = %d", $salle);

$resultelec = mysqli_query($mysqli, $sqlelec);

$Elec = array();
while ($rowelec = mysqli_fetch_array($resultelec)) {
    $tmpelec['date_value'] = $rowelec['date_value'];
    if ($rowelec['module_id'] <= 100000000) {
        $tmpelec['cons_value'] = $rowelec['cons_value'];
    }
    $Elec[] = $tmpelec;
}

header('Content-Type: application/json');
echo json_encode(array(
    'Temp' => $Temp,
    'Humid' => $Humid,
    'Elec' => $Elec
));