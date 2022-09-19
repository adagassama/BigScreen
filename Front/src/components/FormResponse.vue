<template>
    <div class="mx-0 mx-sm-auto pt-4 pb-4 container"  >
  <div class="card ">
    <div class="card-header" >
      <h5 class="card-title text-white mt-2" >BIGSCREEN - RESULTAT DU SONDAGE</h5>
    </div>
    <div class="modal-body">
      <div class="text-center mt-3">
        
        <div>
          <strong>Merci d'avoir participer à notre sondage</strong>
          <p class="pt-4">Ci dessous vos resultats</p>
        </div>
        
      </div>

      <hr />

      <form class="px-4" action="">
        <ul>
          <li v-for="question in questions" :key="question.id" style="list-style:none" width="20" class=" pt-2 mb-4 border border-1">
            <div>
            <p class="text-left pt-4 mb-1 decompte">{{question.title}} </p>
            <p>{{question.content}}</p>
            
            <div class="form-control div-reponse mb-2"  >
              <div class="div-rep" >ici la reponse ici la reponse</div>
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
import Modal from '../components/Modal.vue';
import axios from 'axios'
export default {
  components: { Modal },
    mounted() {
        //API Call
        axios.get("http://127.0.0.1:8000/api/questions").then((res) => {
            this.questions = res.data.data;

        });
        
      },
      data() {
        return {
            questions: [],
            
        };
      },
}
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