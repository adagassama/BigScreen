<template>
  <div id="chart">
    <apexchart
      type="pie"
      width="470"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    // Appel API pour la récupération des données de la question 6
    axios.get("http://127.0.0.1:8000/api/getPieChart/6").then((res) => {
      this.series = res.data;
    });
  },
  name: "Chart",
  data: function () {
    return {
      series: [],
      chartOptions: {
        chart: {
          width: 470,
          type: "pie",
        },
        labels: [
          "Oculus Quest",
          "Oculus Rift/s",
          "HTC Vive",
          "Windows Mixed Reality",
          "Valve index",
        ],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 287,
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
