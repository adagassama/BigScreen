<template>
  <div class="container mr-0 ml-0 pl-0 pr-0">
    <h2 class="text-center pt-0 pb-4 mt-0 mb-4">Liste de Questions et leurs Réponses</h2>
    <div class="row" v-for="visitor in visitors" :key="visitor.id">
      <div class="col-lg-12" >
        <div class="card cardF rounded shadow border-1" >
          <div class="card-body cbody rounded">
            <div class="table-responsive" >
              <table id="example" style="width:100%" class="table table-striped table-bordered" >
                <thead>
                  <tr>
                    <th class="col-3">Numero Question</th>
                    <th class="col-5">Corps de la question</th>
                    <th class="col-8">Réponse de Question</th>
                  </tr>
                </thead>
                <tbody v-for="answer in answers" :key="answer.id">
                  <tr v-if="visitor.id == answer.visitor_id" style="list-style:none">
                      <td class="col-3 text-center">{{answer.question_id}}</td>
                      <td class="col-5">{{answer.question.content}}</td>
                      <td class="col-8 text-center">{{answer.answer}}</td>
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
  import axios from "axios";
export default {
  mounted() {
    axios
    .get(`http://127.0.0.1:8000/api/answers`)
      .then((res) => {
        this.answers = res.data.data;
      })
      .catch((error) => {
        console.log(error);
      });
    axios
    .get(`http://127.0.0.1:8000/api/visitors`)
      .then((res) => {
        this.visitors = res.data.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      answers: [],
      visitors:[]
    };
  }
};
  
  </script>
  
  <style>
  .row{
    margin-bottom: 3em;
  }
  .cardFirst{
      margin-left: 0;
      margin-right: 0;
      width:80% !important;
  }
  h2{
    color:whitesmoke;
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