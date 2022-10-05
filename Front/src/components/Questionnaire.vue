<template>
<div class="container mr-0 ml-0 pl-0 pr-0">
  <h2 class="text-center pt-0 pb-4 mt-0 mb-4">Liste de Questionnaires</h2>
  <div class="row">
    <div class="col-lg-12">
      <div class="card  cardF rounded shadow border-1">
        <div class="card-body cbody rounded">
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="col-3">Numero Question</th>
                  <th class="col-6">Corps de la question</th>
                  <th class="col-8">Type de Question</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="question in questions" :key="question.id" style="list-style:none">
                  <td class="col-3 text-center">{{question.id}}</td>
                  <td class="col-6">{{question.content}}</td>
                  <td class="col-8 text-center">{{question.type}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</template>

<script>
    import $ from 'jquery'
    import axios from 'axios';
export default {
    data(){
        return{
            questions:[]
        }
    },
    mounted(){
        /*  $(function() {
        $(document).ready(function() {
            $('#example').DataTable();
        }); */
        
            //API Call
            axios.get("http://127.0.0.1:8000/api/questions").then((res) => {
            this.questions = res.data.data;

            });
}
}
</script>

<style>
.cbody{
  width: 100% !important;
}
h2{
    color:dodgerblue;
}
@media screen and (min-width: 320px) {
  .cardF{
    margin-left: 0.5rem !important;
    margin-right: 0;
    width:100% !important;
}
}
@media screen and (min-width: 992px) {
  .cardF{
    margin-left: 10% !important;
    margin-right: 0;
    width:80% !important;
}
}
</style>