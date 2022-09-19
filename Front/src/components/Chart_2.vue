<template>
  <div id="chart">
        <apexchart width="450" type="donut" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
    data(){
        return{
            series: [44, 55, 41, 17],
          chartOptions: {
            chart: {
              type: 'donut',
            },
            labels: ['SteamVR', 'Occulus store', 'Viveport', 'Windows store', ],
            responsive: [{
              breakpoint: 350,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom',
              
                }
              }
            }]
          },
        }
    }
}
</script>

<style>

</style>