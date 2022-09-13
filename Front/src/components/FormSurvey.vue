<template>
  <div class="mx-0 mx-sm-auto pt-4 pb-4 container"  >
  <div class="card">
    <div class="card-header bg-primary" >
      <h5 class="card-title text-white mt-2" >BigScreen Sondage</h5>
    </div>
    <div class="modal-body">
      <div class="text-center mt-3">
        
        <p>
          <strong>Votre opinion compte pour nous</strong>
        </p>
        
      </div>

      <hr />

      <form class="px-4" action="">
        <ul>
          <li v-for="question in questions" :key="question.id" style="list-style:none" class=" pt-2 mb-4">
            <div>
            <p class="text-left pt-4 mb-1 decompte">{{question.title}} </p>
            <p>{{question.content}}</p>
            
            <div class="form-control mb-2" v-if="question.type=='B'" >
              <input class="form-control" name="exampleForm"/>
            </div>
            <div class="form-control mb-2" v-else-if="question.type=='C'">
              <input class="form-control" name="exampleForm" type="number"/>
            </div>
            <div class="form-radio mb-2" v-else >
              <div>
                <input class="form-radio-input" value="r1" type="radio" 
                 />
                <label class="form-radio-label" for="r1">
                    {{question.possible_answer}}
                </label>
              </div>
            </div>
        </div>
          </li>
        </ul>
      </form>
    </div>
    <div class="card-footer text-end">
      <button type="button" class="btn btn-primary" data-toggle="modal">Finaliser</button>
    </div>
  </div>
</div>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import Modal from '../components/Modal.vue';
import axios from 'axios'
export default {
  components: { Modal },
    mounted() {
        //API Call
        axios.get("http://127.0.0.1:8000/api/questions").then((res) => {
            this.questions = res.data.data;
            console.log(res.data.data)
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

</style>