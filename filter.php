<?php
//filter.php
if (isset($_POST["from_date"], $_POST["to_date"]))
{
    $connect = mysqli_connect("localhost", "root", "", "BEnOcean");
    $output_temperature = '';
    $output_humidity = '';
    $output_elecconsumption = '';

    $query_temperature = "SELECT sensor_value, date_value FROM TTemperature WHERE date_value BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "'";
    $query_humidity = "SELECT sensor_value, date_value FROM THumidity WHERE date_value BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "'";
    $query_elecconsumption = "SELECT cons_value, date_value FROM TElecConsumption WHERE date_value BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "'";

    $result_temperature = mysqli_query($connect, $query_temperature);
    $result_humidity = mysqli_query($connect, $query_humidity);
    $result_elecconsumption = mysqli_query($connect, $query_elecconsumption);
    $output_temperature .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th>Température (°C)</th>  
                     <th>Date</th>  
                </tr>  
      ';
    if (mysqli_num_rows($result_temperature) > 0)
    {
        while ($row = mysqli_fetch_array($result_temperature))
        {
            $output_temperature .= '  
                     <tr>  
                          <td>' . $row["sensor_value"] . '</td>  
                          <td>' . $row["date_value"] . '</td>  
                     </tr>  
                ';
        }
    }
    else
    {
        $output_temperature .= '  
                <tr>  
                     <td colspan="5">Pas de données trouvée</td>  
                </tr>  
           ';
    }
    $output_temperature .= '</table>';
    echo $output_temperature;

    $output_humidity .= '  
    <h3> Tableau Historique Humidité </h3>
      <table class="table table-bordered">  
           <tr>  
                <th>Humidté (%)</th>  
                <th>Date</th>  
           </tr>  
 ';
    if (mysqli_num_rows($result_humidity) > 0)
    {
        while ($row = mysqli_fetch_array($result_humidity))
        {
            $output_humidity .= '  
                <tr>  
                     <td>' . $row["sensor_value"] . '</td>  
                     <td>' . $row["date_value"] . '</td>  
                </tr>  
           ';
        }
    }
    else
    {
        $output_humidity .= '  
           <tr>  
                <td colspan="5">Pas de données trouvée</td>  
           </tr>  
      ';
    }
    $output_humidity .= '</table>';
    echo $output_humidity;

    $output_elecconsumption .= '
    <h3> Tableau Historique Consommation Électrique </h3>  
     <table class="table table-bordered">  
          <tr>  
               <th>Valeur (W)</th>  
               <th>Date</th>  
          </tr>  
';
    if (mysqli_num_rows($result_elecconsumption) > 0)
    {
        while ($row = mysqli_fetch_array($result_elecconsumption))
        {
            $output_elecconsumption .= '  
           <tr>  
                <td>' . $row["cons_value"] . '</td>  
                <td>' . $row["date_value"] . '</td>  
           </tr>  
      ';
        }
    }
    else
    {
        $output_elecconsumption .= '  
      <tr>  
           <td colspan="5">Pas de données trouvée</td>  
      </tr>  
 ';
    }
    $output_elecconsumption .= '</table>';
    echo $output_elecconsumption;
}
?>
