<?php // connexion à la base de données pour afficher les valeurs dans un tableau
session_start();

$servername = "192.168.0.28";
$username   = "mathis_carrere";
$password   = "sbRQi87R7";
$dbname     = "BEnOcean";

// Création de la connexion
$mysqli = new mysqli($servername, $username, $password, $dbname) or die($mysqli->error);

$DateTemp = array();
$Temp     = array();

$DateElec = array();
$Elec     = array();

$DateHumid = array();
$Humid     = array();

/*$urlsalle = "http://192.168.0.28/appliwebold/accueil.php?salle=1";
$components = parse_url($urlsalle, PHP_URL_QUERY);
parse_str($components, $results);
$salle=$_GET['salle'];*/

//Récupération des données de mesuresy
$sqltemp = "SELECT * 
FROM 
(SELECT t.module_id, sensor_value, date_value 
FROM TTemperature t, TModules m, TRoom r 
WHERE t.module_id = m.module_id 
AND m.room_id = r.room_id 
AND r.room_id = 1 
ORDER BY e.date_value 
DESC LIMIT 20) 
AS Elec 
ORDER BY date_value";
$resulttemp = mysqli_query($mysqli, $sqltemp);

while ($rowtemp = mysqli_fetch_array($resulttemp)) {
    $DateTemp[] = $rowtemp['date_value'];
    if ($rowtemp['module_id'] <= 100000000) {
        $Temp[] = $rowtemp['sensor_value'];
    }
}

$sqlelec = "SELECT * 
FROM 
(SELECT e.module_id, cons_value, date_value 
FROM TElecConsumption e, TModules m, TRoom r 
WHERE e.module_id = m.module_id 
AND m.room_id = r.room_id 
AND r.room_id = 1
ORDER BY e.date_value 
DESC LIMIT 20) 
AS Elec 
ORDER BY date_value";
$resultelec = mysqli_query($mysqli, $sqlelec);

while ($rowelec = mysqli_fetch_array($resultelec)) {
    $DateElec[] = $rowelec['date_value'];
    if ($rowelec['module_id'] <= 100000000) {
        $Elec[] = $rowelec['cons_value'];
    }
}

$sqlhumid = "SELECT * 
FROM 
(SELECT h.module_id, sensor_value, date_value 
FROM THumidity h, TModules m, TRoom r 
WHERE h.module_id = m.module_id 
AND m.room_id = r.room_id 
AND r.room_id = 1 
ORDER BY e.date_value 
DESC LIMIT 20) 
AS Elec 
ORDER BY date_value";
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