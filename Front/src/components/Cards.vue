<template>
  <div class="container mx-auto mt-4">
    <div class="row">
      <div class="col-md-6">
        <div class="card card_charts" style="width: 18rem; height: 18rem;">
          <div class="card-body">
         
            <Charts></Charts>
            
          </div>
        </div>
      </div>
      <div class="col-md-6 ">
        <div class=" card card_charts" style="width: 18rem; height: 18rem;">
          
          <div class="card-body">
            
            <Chart_4></Chart_4>
            
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card_charts" style="width: 18rem; height: 18rem;">
         
          <div class="card-body">
            
            <Chart_2></Chart_2>
           
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card card_charts" style="width: 18rem; height: 18rem;">
          
          <div class="card-body">
            <Chart_3></Chart_3>
            
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
    components: { Charts, Chart_4, Chart_2, Chart_3 }
};
</script>

<style>
:root {
  --gradient: linear-gradient(to left top, #dd2476 10%, #ff512f 90%) !important;
}

.card_charts {
  
  border: none;
  margin-bottom: 2rem;
}

</style>
