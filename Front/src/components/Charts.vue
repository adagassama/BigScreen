<template>
     <div id="chart">
        <apexchart type="pie" width="450" :options="chartOptions" :series="series"></apexchart>
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
              width: 450,
              type: 'pie',
            },
            labels: ['Oculus Quest', 'Oculus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'Valve index'],
            responsive: [{
              breakpoint: 100,
              options: {
                chart: {
                  width: 100
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
  