<template>
  <div id="chart">
        <apexchart width="400" type="pie" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>
 
 <script>
import axios from "axios";
  export default {
    mounted() {
      //API Call
      axios.get("http://127.0.0.1:8000/api/getPieChart/10").then((res) => {
        this.series = res.data;
        console.log(this.series);
      });
    },
   data: function() {
     return {
        series: [],
          chartOptions: {
            chart: {
              type: 'pie',
            },
            labels: ['TV en direct ', ' films', ' travailler', ' solo', 'équipe '],
            responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 280
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
 