<template>
     <div id="chart">
        <apexchart type="pie" width="450" :options="chartOptions" :series="series"></apexchart>
      </div>
  </template>
  
  <script>
  import axios from "axios";
  export default {
    mounted() {
      //API Call
      axios.get("http://127.0.0.1:8000/api/getPieChart/6").then((res) => {
        this.series = res.data;
        console.log(this.series);
      });
    },
    name: 'Chart',
    data: function() {
      return {
        series: [],
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
                position: "bottom"
              }
            }
          }]
        },
      }
    },
  }
  </script>
  