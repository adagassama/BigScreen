<template>
  <div class="container mx-auto mt-4">
    <div class="row">
      <div class="col-md-6 col-xs-2">
        <div class="card card_charts charts-first">
          <div class="card-body">
            <Charts></Charts>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-2">
        <div class="card card_charts charts-second">
          <div class="card-body">
            <Chart_2></Chart_2>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-2">
        <div class="card card_charts charts-third">
          <div class="card-body">
            <Chart_3></Chart_3>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card card_charts charts-last" style="height: 18rem">
          <div class="card-body p-0">
            <Chart_4></Chart_4>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Charts from "./Charts.vue";
import Chart_4 from "./Chart_4.vue";
import Chart_2 from "./Chart_2.vue";
import Chart_3 from "./Chart_3.vue";

export default {
  components: { Charts, Chart_4, Chart_2, Chart_3 },
};
</script>

<style>


.card_charts {
  border: none;
  margin-bottom: 2rem;
  box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7,
    -8px -8px 15px #fff;
}
.charts-first {
  margin-left: 4% !important;
}
.card-body{
  padding-left: 0;
  align-items: center;
}
.charts-third {
  margin-left: 4% !important;
}
.charts-last {
  
}
@media screen and (min-width: 100px) {
  .card_charts {
    width: 15rem !important;
  }
  .row {
    display: flex;
    flex-direction: column;
  }
  .charts-third {
  margin-left: 1% !important;
  }
  .charts-first {
  margin-left: 1% !important;
  }
}
@media screen and (min-width: 320px) {
  .card_charts {
    width: 19rem !important;
  }
  .row {
    display: flex;
    flex-direction: column;
  }
}
@media screen and (min-width: 768px) {
  .card_charts {
    width: 30rem !important;
  }
  .row {
    display: flex;
    flex-direction: column;
  }
}
@media screen and (min-width: 992px) {
  .card_charts {
    width: 22rem !important;
  }
  .row {
    display: flex;
    flex-direction: row;
  }
}
@media screen and (min-width: 1200px) {
  .row {
    display: flex;
    flex-direction: row;
  }
  .card_charts {
    width: 29rem !important;
  }
}
</style>
