<template>
  <div id="chart">
    <apexchart
      width="430"
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
    // Appel API pour la récupération des données de la question 7
    axios.get("http://127.0.0.1:8000/api/getPieChart/7").then((res) => {
      this.series = res.data;
    });
  },
  data() {
    return {
      series: [],
      chartOptions: {
        chart: {
          width:430,
          type: "pie",
        },
        labels: ["SteamVR", "Occulus store", "Viveport", "Windows store"],
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

<style></style>
