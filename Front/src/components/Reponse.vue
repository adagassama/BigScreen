<template>
  <div class="container mr-0 ml-0 pl-0 pr-0">
    <h2 class="text-center pt-4 pb-0 mb-0">Liste de Réponse des sondages</h2>
    <div class="row py-5">
      <div class="col-lg-10 mx-auto">
        <div class="card cardFirst rounded shadow border-1">
          <div class="card-body p-5 bg-white rounded">
            <div class="table-responsive">
              <table id="example" style="width:100%" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th class="col-3">Numero Question</th>
                    <th class="col-5">Corps de la question</th>
                    <th class="col-8">Réponse de Question</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="answer in answers" :key="answer.id">
                    <td class="col-3">{{answer.question.title}}</td>
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
        this.answers = res.data.data
        console.log(this.answers);
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      answers: [],
    };
  }
};
  
  </script>
  
  <style>
  .cardFirst{
      margin-left: 0;
      margin-right: 0;
      width:80% !important;
  }
  h2{
    color:dodgerblue;
  }
  </style>