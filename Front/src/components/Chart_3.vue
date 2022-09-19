<template>
    <div id="chart">
       <apexchart type="pie" width="380" :options="chartOptions" :series="series"></apexchart>
     </div>
 </template>
 
 <script>
 
 export default {
   name: 'Chart',
   data: function() {
     return {
        series: [25, 15, 44, 55, 17],
          chartOptions: {
            chart: {
              width: '430',
              type: 'pie',
            },
            labels: ['TV en direct ', ' films', ' travailler', ' solo', 'équipe '],
            theme: {
              monochrome: {
                enabled: true
              }
            },
            plotOptions: {
              pie: {
                dataLabels: {
                  offset: -5
                }
              }
            },
            dataLabels: {
              formatter(val, opts) {
                const name = opts.w.globals.labels[opts.seriesIndex]
                return [name, val.toFixed(1) + '%']
              }
            },
            legend: {
              show: false
            }
          },
          
     }
   },
 }
 </script>
 