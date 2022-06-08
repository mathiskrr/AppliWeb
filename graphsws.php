<?php // connexion à la base de données pour afficher les valeurs dans un tableau
session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "BEnOcean";

// Création de la connexion
$mysqli = new mysqli($servername, $username, $password, $dbname) or die($mysqli->error);

$DateTemp = array();
$Temp     = array();

$DateElec = array();
$Elec     = array();

$DateHumid = array();
$Humid     = array();

if (!empty($_GET['salle'])) {
    $salle=intval($_GET['salle']);
    if ($salle <= 0 || $salle > 6) {
        // message d'erreur
        $salle=1;
    }
} else {
    $salle=1;
}

//Récupération des données de mesuresy
$sqltemp = sprintf("SELECT * 
FROM 
(SELECT t.module_id, t.sensor_value, t.date_value 
FROM TTemperature t, TModules m, TRoom r 
WHERE t.date_value > DATE_SUB(NOW(), INTERVAL 24 HOUR) 
AND t.module_id = m.module_id 
AND m.room_id = r.room_id 
AND r.room_id = %d 
ORDER BY t.date_value 
DESC LIMIT 20) 
AS Temp 
ORDER BY date_value", $salle);
$resulttemp = mysqli_query($mysqli, $sqltemp);

while ($rowtemp = mysqli_fetch_array($resulttemp)) {
    $DateTemp[] = $rowtemp['date_value'];
    if ($rowtemp['module_id'] <= 100000000) {
        $Temp[] = $rowtemp['sensor_value'];
    }
}

$sqlelec = sprintf("SELECT * 
FROM 
(SELECT e.module_id, e.cons_value, e.date_value 
FROM TElecConsumption e, TModules m, TRoom r 
WHERE e.date_value > DATE_SUB(NOW(), INTERVAL 24 HOUR) 
AND e.module_id = m.module_id 
AND m.room_id = r.room_id 
AND r.room_id = %d
ORDER BY e.date_value 
DESC LIMIT 20) 
AS Elec 
ORDER BY date_value", $salle);
$resultelec = mysqli_query($mysqli, $sqlelec);

while ($rowelec = mysqli_fetch_array($resultelec)) {
    $DateElec[] = $rowelec['date_value'];
    if ($rowelec['module_id'] <= 100000000) {
        $Elec[] = $rowelec['cons_value'];
    }
}

$sqlhumid = sprintf("SELECT * 
FROM 
(SELECT h.module_id, h.sensor_value, h.date_value 
FROM THumidity h, TModules m, TRoom r 
WHERE h.date_value > DATE_SUB(NOW(), INTERVAL 24 HOUR) 
AND h.module_id = m.module_id 
AND m.room_id = r.room_id 
AND r.room_id = %d 
ORDER BY h.date_value 
DESC LIMIT 20) 
AS Humid
ORDER BY date_value", $salle);
$resulthumid = mysqli_query($mysqli, $sqlhumid);

while ($rowhumid = mysqli_fetch_array($resulthumid)) {
    $DateHumid[] = $rowhumid['date_value'];
    if ($rowhumid['module_id'] <= 100000000) {
        $Humid[] = $rowhumid['sensor_value'];
    }
}

header('Content-Type: application/json');
echo json_encode(array(
    'DateTemp' => $DateTemp,
    'Temp' => $Temp,
    'DateElec' => $DateElec,
    'Elec' => $Elec,
    'DateHumid' => $DateHumid,
    'Humid' => $Humid
));