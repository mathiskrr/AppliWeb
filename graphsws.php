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


//Récupération des données de mesures
$sqltemp    = "SELECT module_id, sensor_value, date_value FROM TTemperature ORDER BY date_value DESC LIMIT 20;";
$resulttemp = mysqli_query($mysqli, $sqltemp);

while ($rowtemp = mysqli_fetch_array($resulttemp)) {
    $DateTemp[] = $rowtemp['date_value'];
    if ($rowtemp['module_id'] <= 100000000) {
        $Temp[] = $rowtemp['sensor_value'];
    }
}

$sqlelec    = "SELECT module_id, cons_value, date_value FROM TElecConsumption ORDER BY date_value DESC LIMIT 20;";
$resultelec = mysqli_query($mysqli, $sqlelec);

while ($rowelec = mysqli_fetch_array($resultelec)) {
    $DateElec[] = $rowelec['date_value'];
    if ($rowelec['module_id'] <= 100000000) {
        $Elec[] = $rowelec['cons_value'];
    }
}

$sqlhumid    = "SELECT module_id, sensor_value, date_value FROM THumidity ORDER BY date_value DESC LIMIT 20;";
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