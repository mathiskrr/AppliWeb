function constructTab(Temp, Elec, Humid) {

    output_temperature ='';
    output_humidity ='';
    output_eleconsumption ='';

    // Tableau Température
    output_temperature = '<table class="table table-hover table-striped" href="#temp">' +
          '<thead>' +
            '<tr>' +
              '<th scope="col">Date</th>' +
              '<th scope="col">Valeur (°C)</th>' +
            '</tr>' +
          '</thead>' +
          '<tbody>';

    for (var index in Temp) {
        output_temperature = output_temperature + '<tr><td>' + Temp[index]["date_value"] + '</td>' +
            '<td>' + Temp[index]["sensor_value"] + '</td>' +
            '</tr>';
    }

    output_temperature = output_temperature + '</tbody>' +
        '</table>';
    
    $('#idtemp').html(output_temperature);

    // Tableau Humidité
    output_humidity = '<table class="table table-hover table-striped" href="#humid">' +
          '<thead>' +
            '<tr>' +
              '<th scope="col">Date</th>' +
              '<th scope="col">Valeur (%)</th>' +
            '</tr>' +
          '</thead>' +
          '<tbody>';

    for (var index in Humid) {
        output_humidity = output_humidity + '<tr><td>' + Humid[index]["date_value"] + '</td>' +
            '<td>' + Humid[index]["sensor_value"] + '</td>' +
            '</tr>';
    }

    output_humidity = output_humidity + '</tbody>' +
        '</table>';
    
    $('#idhumid').html(output_humidity);

    // Tableau Consommation Électrique
    output_elecconsumption = '<table class="table table-hover table-striped" href="#elec">' +
          '<thead>' +
            '<tr>' +
              '<th scope="col">Date</th>' +
              '<th scope="col">Valeur (W)</th>' +
            '</tr>' +
          '</thead>' +
          '<tbody>';

    for (var index in Elec) {
        output_elecconsumption = output_elecconsumption + '<tr><td>' + Elec[index]["date_value"] + '</td>' +
            '<td>' + Elec[index]["cons_value"] + '</td>' +
            '</tr>';
    }

    output_elecconsumption = output_elecconsumption + '</tbody>' +
        '</table>';
    
    $('#idelec').html(output_elecconsumption);
}
