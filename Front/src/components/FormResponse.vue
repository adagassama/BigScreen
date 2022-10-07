<template>
  <div class="survey">
    <nav class="header mb-2">
      <a href="/"><img src="../assets/bigscreen_logo.png" alt="image logo" /></a>
    </nav>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="survey_title">
            <div class="pb-3">
              <h5 class="card-title text-white mt-2">
                Vous trouverez ci-dessous les réponses que vous avez apportées à
                notre sondage le: {{ formatDate(visitor.created_at) }}
              </h5>
            </div>
          </div>
          <form>
            <div class="timeline">
              <div class="survey_card" v-for="answer in answers" :key="answer.id">
                <p class="survey_questions">{{ answer.question.title }}</p>
                <p class="survey_label">{{ answer.question.content }}</p>
                <div class="survey_answers answer-border">
                  {{ answer.answer }}
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import dayjs from "dayjs";
import { useRoute } from "vue-router";
export default {
  mounted() {
    const route = useRoute();
    const route_path = route.path.split("/");
    let url = route_path[2];
    console.log(url);
    axios
      .get(`http://127.0.0.1:8000/api/results/${url}`)
      .then((res) => {
        this.answers = res.data.data;
        this.visitor = res.data[0];
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      answers: [],
      visitor: [],
    };
  },
  methods: {
    formatDate(dateString) {
      const date = dayjs(dateString);
      return date.format("	DD/MM/YYYY à hh:mm ");
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
}
.answer-border {
  border: dashed;
  border-radius: 1%;
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
</style>
