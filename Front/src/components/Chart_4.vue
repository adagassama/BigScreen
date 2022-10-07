<template>
  <div id="chart">
    <apexchart
      type="radar"
      width="450"
      height="350"
      :options="chartOptions"
      :series="series"
    ></apexchart>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    //API Call
    axios.get("http://127.0.0.1:8000/api/getRadarChart").then((res) => {
      this.series[0].data = res.data;
    });
  },
  data() {
    return {
      series: [
        {
          name: "Series 1",
          data: [],
        },
      ],
      chartOptions: {
        chart: {
          height:350,
          width: 500,
          type: "radar",
        },
        xaxis: {
          categories: [
            "Qualité de l'image",
            "Confort de l'utilisation",
            "Connection réseau",
            "Qualité des graphismes",
            "Qualité audio",
          ],
          labels: {
            show: true,
            style: {
              colors: ["#a8a8a8"],
              fontSize: "11px",
              fontFamily: "Arial",
            },
          },
        },
        responsive: [
          {
            breakpoint: 400,
            options: {
              chart: {
                width: 280,
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
