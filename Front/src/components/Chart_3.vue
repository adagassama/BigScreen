<template>
  <div id="chart">
        <apexchart width="400" type="pie" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>
 
 <script>
 
 export default {
   data: function() {
     return {
        series: [25, 15, 44, 55, 17],
          chartOptions: {
            chart: {
              type: 'pie',
            },
            labels: ['TV en direct ', ' films', ' travailler', ' solo', 'équipe '],
            responsive: [{
              breakpoint: 200,
              options: {
                chart: {
                  width:70
                },
                legend: {
                  position: 'bottom',
              
                }
              }
            }]
          },
          
     }
   },
 }
 </script>
 