<template>
    <div class="survey">
      <nav class="header mb-2">
        <a href="/"><img src="../assets/bigscreen_logo.png" alt="image logo" /></a>
      </nav>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="survey_title">
              <div class="pb-4">
                <h5 class="card-title text-white mt-2">
                  Merci de répondre à toutes les questions et de valider le
                  formulaire en bas de page.
                </h5>
              </div>
              <p v-if="this.msg !== ''" class="card-title error p-2 mb-5 bg-light text-center col-lg-12 m-auto">
                {{ this.msg }}
              </p>
            </div>
            <form>
              <div class="timeline">
                <div
                  class="survey_card"
                  v-for="(question, index) in questions"
                  :key="question.id"
                  style="list-style: none"
                >
                  <p class="survey_questions">{{ question.title }}</p>
                  <hr/>
                  <p class="survey_label fs-4">{{ question.content }}</p>

                  <div
                    class="survey_answers"
                    v-if="question.type == 'B' && question.id == 1"
                  >
                    <input
                      maxlength="255"
                      type="email"
                      :name="'rep' + question.id"
                      v-model="formData[index].answer"
                      aria-label = "email"
                    />
                  </div>
                  <div class="survey_answers" v-else-if="question.type == 'B'">
                    <input
                      :name="'rep' + question.id"
                      v-model="formData[index].answer" aria-label = "champs de saisit"
                    />
                  </div>
                  <div class="survey_answers radio-answer" v-else-if="question.type == 'C'">
                    <div v-for="n in 5" :key="n.id" >
                      <span>
                        <input type="radio"  v-model="formData[index].answer"
                        :name="'rep' + question.id" :value="n" aria-label = "choix de 1 5" />
                        <label class="label"> {{n}}</label>
                      </span>  
                    </div>  
                  </div>
                  <div v-else>
                    <section>
                      <div class="survey_answers">
                        <select
                          v-model="formData[index].answer"
                          :name="'rep' + question.id"
                        >
                          <option
                            v-for="rep in question.possible_answer.split(',')"
                            :key="rep.id"
                            :value="rep"
                          >
                            {{ rep }}
                          </option>
                        </select>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
              <div class="card-footer text-end">
              <button @click.prevent="create" class="btn btn-primary" aria-label="bouton Finaliser">
                Finaliser
              </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
export default {
  mounted() {
    // Appel API pour recuperer la liste des questions
    axios.get("http://127.0.0.1:8000/api/questions").then((res) => {
      this.questions = res.data.data;
      this.formData = this.questions.map((question) => {
        return { question_id: question.id, answer:''};
      });
    });
  },
  data() {
    return {
      questions: [],
      formData: [],
      answers: {},
      msg:""
    };
  },
  methods: {
    // Enregistrement des réponses d'un visiteur
    create() {
      this.formData.forEach(element => {
          this.answers[element.question_id] = element.answer;
        });
      const userAnswers = {answersArray:this.answers};
      axios
        .post("http://127.0.0.1:8000/api/answers", userAnswers)
        .then((response) => {
          Swal.fire({
            title: "Bigscreen !",
            html: `<p>${response.data.text}</p>
                             <a href="/response/${response.data.token}">http://localhost:5173/response/${response.data.token}</a>`,
            icon: "success",
          });
        })
        .catch((error) => {
          console.log(error)
          if (error.response.status == 422) {
            this.msg = error.response.data.msg
          }
        });
    },
  },
};
</script>

<style>
.header {
  position: sticky;
  top: 0;
  z-index: 1;
  object-fit: contain;
  background-color: #2c3e50;
  padding-left: 21%;
  z-index: 10;
}
.header > a > img {
  object-fit: contain;
  width: 100%;
  max-width: 450px;
}
.label{
  margin-left: 5px;
}
@media (max-width: 500px) {
  .header {
    padding-left: 0%;
  }
}
.survey_title {
  color: #fff;
  font-size: 1.2em;
  font-weight: 600;
}
.survey_card {
  padding: 20px;
  border: none !important;
  border-radius: none !important;
  background-color: #ecf0f1;
  margin-bottom: 8em;
  position: relative;
}
.survey_active {
  display: block;
}
.survey_buttons {
  display: flex;
  justify-content: space-between;
  width: 100%;
}

.survey_buttons > .btn_survey {
  background-color: #fff;
  padding: 5px;
  margin: 5px;
  text-decoration: none;
  color: #333;
  border: 1px lightgray solid;
}
.btn_survey_active {
  background-color: #fff;
  padding: 5px;
  margin: 5px;
  text-decoration: none;
  color: #333;
  border: 1px lightgray solid;
  display: block;
}
.survey_validations {
  text-align: right;
}
.emailValidator {
  background-color: #333;
  color: white;
  margin-top: 10px;
  border-radius: 3px;
}
.emailValidator > p {
  color: white;
  font-size: 14px;
  font-weight: 600;
  text-align: center;
  padding-top: 8px;
  padding-left: 5px;
  padding-right: 5px;
}
.survey_questions {
    color: #333;
    font-size: 1.2em;
    font-weight: 600;
  }
  .survey_label {
    color: #333;
    font-size: 1.3em;
    font-weight: 500;
  }
.survey_answers {
  background: #fff;
  padding: 10px;
  /*border: 0.5px dashed #bdc3c7;*/
}
.survey_answers > textarea,
.survey_answers > input,
.survey_answers > select {
  padding: 10px;
  border-top: none !important;
  border-left: none !important;
  border-right: none !important;
  border-radius: none !important;
  width: 100%;
  border: 1px solid #bdc3c7;
}

.survey_answers > input:focus,
.survey_answers > textarea:focus,
.survey_answers > select:focus {
  outline: none;
}
/*  Refresh Container */
.refresh {
  position: fixed;
  bottom: 30px;
  right: 20px;
  width: 60px;
  height: 60px;
  background: #fff;
  z-index: 8;
  border-radius: 50%;
  cursor: pointer;
}
/* Refresh Loader */
.refresh > .refresh_loader {
  width: 60px;
  height: 60px;
}
/* Refresh Loader Hover  */
.refresh > .refresh_loader:hover {
  transform: rotate(1080deg);
  transition: all 2s; /* transition when the mouse over */
}
.refresh_loader:after {
  content: "Recharger la page";
  position: relative;
  top: 120px;
  left: -14px;
  font-size: 1.25em;
  font-family: helvetica, arial, sans-serif;
  font-variant: small-caps;
  color: #fff;
  opacity: 0;
  transition: opacity 2s;
}
.radio-answer{
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
}
.error {
  color: black;
  font-size: 1em;
  font-weight: 400;
}
</style>
