<template>
  <div id="chart">
        <apexchart width="400" type="pie" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
    data(){
        return{
            series: [44, 55, 41, 17],
          chartOptions: {
            chart: {
              type: 'pie',
            },
            labels: ['SteamVR', 'Occulus store', 'Viveport', 'Windows store', ],
            responsive: [{
              breakpoint: 450,
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