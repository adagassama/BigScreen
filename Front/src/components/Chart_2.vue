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
      axios.get("http://127.0.0.1:8000/api/getPieChart/7").then((res) => {
        this.series = res.data;
      });
    },
    data(){
        return{
          series: [],
          chartOptions: {
            chart: {
              type: 'pie',
            },
            labels: ['SteamVR', 'Occulus store', 'Viveport', 'Windows store', ],
            legend: {
              position: "right",  
              fontSize: '12px',
            },
            responsive: [
            {
              breakpoint: 100,
              options: {
                legend: {
                  position:'bottom'
                } 
              }
            }
          ]
          },
        }
    }
}
</script>

<style>

</style>