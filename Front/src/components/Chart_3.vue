<template>
  <div id="chart">
    <apexchart
      width="410"
      type="pie"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    // Appel API pour la récupération des données de la question 10
    axios.get("http://127.0.0.1:8000/api/getPieChart/10").then((res) => {
      this.series = res.data;
    });
  },
  data: function () {
    return {
      series: [],
      chartOptions: {
        chart: {
          type: "pie",
          width:410,
        },
        labels: ["TV en direct ", " films", " travailler", " solo", "équipe "],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 280,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      },
    };
  },
};
</script>
