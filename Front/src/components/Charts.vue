<template>
     <div id="chart">
        <apexchart type="pie" width="500" :options="chartOptions" :series="series"></apexchart>
      </div>
  </template>
  
  <script>
  
  export default {
    name: 'Chart',
    data: function() {
      return {
        series: [30, 7, 40, 20, 22],
          chartOptions: {
            chart: {
              width: 500,
              type: 'pie',
            },
            labels: ['Oculus Quest', 'Oculus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'Valve index'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
      }
    },
  }
  </script>
  