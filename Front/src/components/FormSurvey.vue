<template>
  <div class="mx-0 mx-sm-auto pt-4 pb-4 container">
    <div class="card">
      <div class="card-header bg-primary">
        <h5 class="card-title text-white mt-2">BigScreen Sondage</h5>
      </div>
      <div class="modal-body">
        <div class="text-center mt-3">
          <p>
            <strong
              >Merci de répondre à toutes les questions et de valider le
              formulaire en bas de page</strong
            >
          </p>
        </div>

        <hr />

        <form class="px-4" action="">
          <ul>
            <li
              v-for="(question, index) in questions"
              :key="question.id"
              style="list-style: none"
              class="pt-2 mb-4"
            >
              <div>
                <p class="text-left pt-4 mb-1 decompte">{{ question.title }}</p>
                <p>{{ question.content }}</p>

                <div
                  class="form-control mb-2"
                  v-if="question.type == 'B' && question.id == 1"
                >
                  <input
                    class="form-control"
                    type="email"
                    name="email"
                    v-model="formData[index].answer"
                  />
                </div>
                <div class="form-control mb-2" v-else-if="question.type == 'B'">
                  <input
                    class="form-control"
                    name="rep17"
                    id="question.id"
                    v-model="formData[index].answer"
                  />
                </div>
                <div class="form-control mb-2" v-else-if="question.type == 'C'">
                  <select
                    v-model="formData[index].answer"
                    class="form-control"
                    name="'rep' + question.id"
                  >
                    <option v-for="n in 5" :key="n.id" :value="n">
                      {{ n }}
                    </option>
                  </select>
                </div>
                <div class="form-radio mb-2" v-else>
                  <section>
                    <div>
                      <select
                        v-model="formData[index].answer"
                        class="form-control"
                        name="'rep' + question.id"
                      >
                        <option
                          v-for="rep in question.possible_answer.split(',')"
                          :key="rep.id"
                          :value="rep"
                        >
                          {{ rep }}
                        </option>
                      </select>

                      <!-- <input class="form-radio-input" :id=question.id :name="'rep' + question.id" type="radio" v-model="formData.rep[question.id]"/> 
                  <label class="form-radio-label" :for="question.id">
                      {{rep}}
                  </label> -->
                    </div>
                  </section>
                </div>
              </div>
            </li>
          </ul>
        </form>
      </div>
      <div class="card-footer text-end">
        <button @click.prevent="create" class="btn btn-primary">
          Finaliser
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import Modal from "../components/Modal.vue";
import axios from "axios";
export default {
  components: { Modal },
  mounted() {
    //API Call
    axios.get("http://127.0.0.1:8000/api/questions").then((res) => {
      this.questions = res.data.data;
      console.log(this.questions);
      this.formData = this.questions.map((question) => {
        return { question_id: question.id, answer: "" };
      });
    });
  },
  data() {
    return {
      questions: [],
      formD: {
        email: "",
      },
      formData: [],
    };
  },
  methods: {
    // Ajout des résultats d'un sondage
    create() {
      // axios.post('http://127.0.0.1:8000/api/visitors', this.formD).then((response) => {
      //     console.log(response);
      //     this.$toast.success('Succès Visitor!')
      // }).catch((error) => {
      //     console.log(error)
      // });
      console.log(this.formData);
      let blag = new FormData();
        this.formData.forEach(element => {
          blag.append('formData[]', JSON.stringify(element));
        });
      axios
        .post("http://127.0.0.1:8000/api/answers",blag)
        .then((response) => {
          console.log(response);
          this.$toast.success("Succès Answers !");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
.card {
  width: 50%;
  margin-left: 20rem;
}
.decompte {
  font-size: 1rem;
  font-weight: bold;
}
</style>
