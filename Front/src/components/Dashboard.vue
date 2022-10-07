<template>
  <div class="dashboard">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <ul class="list-unstyled components pt-5 mt-5 text-center">
        <img
          src="../assets/bigscreen_logo.png"
          alt="le logo"
          style="width: 15rem"
        />
        <li class="text-center" @click="display(1)">
          <a href="#">Accueil</a>
        </li>
        <li class="text-center" @click="display(2)">
          <a href="#">Questionnaires</a>
        </li>
        <li class="text-center" @click="display(3)">
          <a href="#">Réponses</a>
        </li>
      </ul>
      <ul class="list-unstyled CTAs">
        <li>
          <a href="#" class="download" @click.prevent="logout" aria-label="bouton de deconnexion">Déconnexion</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-info" aria-label="menu resposive">
            <i class="fas fa-align-left fs-3"></i>
          </button>
        </div>
      </nav>
      <Accueil v-if="page == 1"></Accueil>
      <Questionnaire v-else-if="page == 2"></Questionnaire>
      <Reponse v-else></Reponse>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
import Accueil from "./Accueil.vue";
import Questionnaire from "./Questionnaire.vue";
import Reponse from "./Reponse.vue";
import axios from "axios";
import Swal from "sweetalert2";
window.axios = axios;

export default {
  data() {
    return {
      page: 1,
      token: localStorage.getItem("token"),
    };
  },
  methods: {
    display(k) {
      this.page = k;
    },
    logout() {
      axios
        .post("http://127.0.0.1:8000/api/logout")
        .then((response) => {
          localStorage.removeItem("token");
          Swal.fire({
            title: "Bigscreen !",
            html: `<p>${response.data.msg}</p>`,
            icon: "success",
          });
          this.$router.push("/login");
        })
        .catch((errors) => {
          console.log(errors);
        });
    },
  },
  components: {
    Accueil,
    Questionnaire,
    Reponse,
  },
  mounted() {
    window.axios.defaults.headers.common[
      "Authorization"
    ] = `Bearer ${this.token}`;
    $(document).ready(function () {
      $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
      });
    });
  },
};
</script>

<style>
p {
  font-family: "Poppins", sans-serif;
  font-size: 1.1em;
  font-weight: 300;
  line-height: 1.7em;
  color: #999;
}

a,
a:hover,
a:focus {
  color: inherit;
  text-decoration: none;
  transition: all 0.3s;
}

.navbar {
  border: none;
  border-radius: 0;
  margin-bottom: 40px;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
  box-shadow: none;
  outline: none !important;
  border: none;
}

.line {
  width: 100%;
  height: 1px;
  border-bottom: 1px dashed #ddd;
  margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.dashboard {
  display: flex;
  width: 100%;
  align-items: stretch;
}

#sidebar {
  min-width: 250px;
  max-width: 250px;
  background: #141b35;
  color: #fff;
  transition: all 0.3s;
}

#sidebar.active {
  margin-left: -250px;
}

#sidebar ul.components {
  padding: 20px 0;
  border-bottom: 1px solid #47748b;
}

#sidebar ul p {
  color: #fff;
  padding: 10px;
}

#sidebar ul li a {
  padding: 10px;
  font-size: 1.1em;
  display: block;
  text-decoration: none;
  color: #fff;
}

#sidebar ul li a:hover {
  color: #7386d5;
  background: #fff;
}

ul ul a {
  font-size: 0.9em !important;
  padding-left: 30px !important;
  background: #6d7fcc;
}

ul.CTAs {
  padding: 20px;
}

ul.CTAs a {
  text-align: center;
  font-size: 0.9em ;
  display: block;
  border-radius: 5px;
  margin-bottom: 5px;
}

a.download {
  background: #fff;
  color: #141b35 !important;
  font-weight: bold;
  font-size: 1.1rem !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
  width: 100%;
  padding: 20px;
  min-height: 100vh;
  transition: all 0.3s;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
  #sidebar {
    margin-left: -250px;
  }
  #sidebar.active {
    margin-left: 0;
  }
  #sidebarCollapse span {
    display: none;
  }
}
</style>
