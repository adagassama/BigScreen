<template>
   <div id="chart">
        <apexchart type="radar" height="350" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
    data(){
        return{
            series: [{
            name: 'Series 1',
            data: [80, 50, 30, 40, 100, 20],
          }],
          chartOptions: {
            chart: {
              height: 350,
              type: 'radar',
            },
            xaxis: {
              categories: ['January', 'February', 'March', 'April', 'May', 'June'],
              labels: {
                    show: true,
                    style: {
                        colors: ["#a8a8a8"],
                        fontSize: "11px",
                        fontFamily: 'Arial'
                    }
}
            }
          },
        }
    }
}
</script>

<style>

</style>