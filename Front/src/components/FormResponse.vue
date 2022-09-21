<template>
    <div class="mx-0 mx-sm-auto pt-4 pb-4 container"  >
  <div class="card ">
    <div class="card-header" >
      <h5 class="card-title text-white mt-2" >BIGSCREEN - RESULTAT DU SONDAGE</h5>
    </div>
    <div class="modal-body">
      <div class="text-center mt-3">
        
        <div>
          <strong>Vous trouverez ci-dessous les réponses que vous apportées à notre sondage le :</strong>
          <p class="pt-4">Ci dessous vos resultats</p>
        </div>
        
      </div>

      <hr />

      <form class="px-4" action="">
        <ul>
          <li v-for="answer in answers" :key="answer.id" style="list-style:none" width="20" class=" pt-2 mb-4 border border-1">
            <div>
            <p class="text-left pt-4 mb-1 decompte">{{answer.question.title}} </p>
            <p>{{answer.question.content}}</p>
            
            <div class="form-control div-reponse mb-2"  >
              <div class="div-rep">{{answer.answer}}</div>
            </div>
           
            
        </div>
          </li>
        </ul>
      </form>
    </div>
  </div>
</div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    let url = localStorage.getItem("url");
    console.log(url);
    axios
      .get(`http://127.0.0.1:8000/api/results/${url}`)
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
  .card{
   width: 50%;
   margin-left: 20rem ;
  }
  .decompte{
    font-size:1rem ;
    font-weight: bold;
  }
  .card-header{
    background-color : #03A9F4 !important;
  }
  .div-reponse{
    border: 1px dashed !important;
    
  }
  .div-rep{
    height: 20%;
  }
  

</style>