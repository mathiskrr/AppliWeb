    function constuctGraph($DateTemp, $Temp, $DateElec, $Elec, $DateHumid, $Humid) {
     /************************************
        ***********    CHART 1    *********** 
        ************************************/
        var index = 11;
        const ctx1 = document.getElementById("chart1").getContext('2d');
          const myChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: [$DateTemp],
                datasets: 
                [{
                    label: 'Temperature',
                    data: [$Temp],
                    backgroundColor: 'transparent',
                    borderColor:'#eeff00',
                    borderWidth: 3
                }]
            },
         
            options: {
                scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                tooltips:{mode: 'index'},
                legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
            }
        });

        /************************************
        ***********    CHART 2    *********** 
        ************************************/

        const ctx2 = document.getElementById("chart2").getContext('2d');
          var myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [$DateElec],
                datasets: 
                [{
                    label: 'Consommation Électrique',
                    data: [$Elec],
                    backgroundColor: 'transparent',
                    borderColor:'#2f00ff',
                    borderWidth: 3
                }]
            },
         
            options: {
                scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                tooltips:{mode: 'index'},
                legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
            }
        });

        /************************************
        ***********    CHART 3    *********** 
        ************************************/

        const ctx3 = document.getElementById("chart3").getContext('2d');
          const myChart3 = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: [$DateHumid],
                datasets: 
                [{
                    label: 'Humidité',
                    data: [$Humid],
                    backgroundColor: 'transparent',
                    borderColor:'#15ff00',
                    borderWidth: 3
                }]
            },
         
            options: {
                scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
                tooltips:{mode: 'index'},
                legend:{display: true, position: 'top', labels: {fontColor: 'rgb(255,255,255)', fontSize: 16}}
            }
        });
    }