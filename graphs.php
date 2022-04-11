<div class='Graphiques'>
   <div class="graph1">
      <canvas id="chart1" style="width: 55%; height: 55%; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
   </div>
   <div class="graph2">
      <canvas id="chart2" style="width: 55%; height: 55%; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
   </div>
   <div class="graph3">
      <canvas id="chart3" style="width: 55%; height: 55%; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>
   </div>
  </div>

      <script type="text/javascript">

        /************************************
        ***********    CHART 1    *********** 
        ************************************/
        var index = 11;
        const ctx1 = document.getElementById("chart1").getContext('2d');
          const myChart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['<?php echo implode("','",array_unique($DateTemp)); ?>'],
                datasets: 
                [{
                    label: 'Temperature',
                    data: [<?php echo implode(",",$Temp); ?>],
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
                labels: ['<?php echo implode("','",array_unique($DateElec)); ?>'],
                datasets: 
                [{
                    label: 'Consommation Électrique',
                    data: [<?php echo implode(",",$Elec); ?>],
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
                labels: ['<?php echo implode("','",array_unique($DateHumid)); ?>'],
                datasets: 
                [{
                    label: 'Humidité',
                    data: [<?php echo implode(",",$Humid); ?>],
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
      </script>  