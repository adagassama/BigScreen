<template>
  <div class="wrapper">
    <div class="logo">
      <img src="../assets/profil.png" alt="profil" />
    </div>
    <div class="logo_bigscreen">
      <img src="../assets/bigscreen_logo.png" alt="profil" />
    </div>

    <div class="form-field d-flex align-items-center">
      <input type="text" v-model="formData.email" />
    </div>
    <div class="form-field d-flex align-items-center">
      <input type="password" name="password" v-model="formData.password" />
    </div>
    <p class="text-danger" v-text="errors.message"></p>
    <button @click="login" class="btn mt-3">- CONNEXION -</button>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      formData: {
        email: "",
        password: "",
        device_name: "browser",
      },
      errors: {},
    };
  },
  methods: {
    login() {
      // Appel API pour la connexion
      axios
        .post("http://127.0.0.1:8000/api/login", this.formData)
        .then((response) => {
          localStorage.setItem("token", response.data);
          this.$router.push("/administration");
        })
        .catch((errors) => {
          this.errors = errors.response.data;
          console.log(this.errors);
        });
    },
  },
};
</script>

<style>
.wrapper {
  max-width: 350px;
  min-height: 400px;
  margin: 100px auto;
  padding: 30px 30px 30px 30px;
  background-color: #ecf0f3;
  border-radius: 5px;
}

.logo {
  width: 80px;
  margin: auto;
}

.logo_bigscreen img {
  width: 100%;
  max-width: 450px;
}

.logo img {
  width: 100%;
  height: 80px;
  padding: 2px;
  object-fit: cover;
  border-radius: 50%;
  color: #039be5;
  box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7,
    -8px -8px 15px #fff;
}

.wrapper .name {
  font-weight: 600;
  font-size: 1.4rem;
  letter-spacing: 1.3px;
  padding-left: 10px;
  color: #555;
}

.wrapper .form-field input {
  width: 100%;
  display: block;
  border: none;
  outline: none;
  background: none;
  font-size: 1.2rem;
  color: #666;
  padding: 10px 15px 10px 10px;
  /* border: 1px solid red; */
}

.wrapper .form-field {
  padding-left: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
  box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
  color: #555;
}

.wrapper .btn {
  box-shadow: none;
  width: 100%;
  height: 40px;
  background-color: #03a9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
  letter-spacing: 1.3px;
}

.wrapper .btn:hover {
  background-color: #039be5;
}

.wrapper a {
  text-decoration: none;
  font-size: 0.8rem;
  color: #03a9f4;
}

.wrapper a:hover {
  color: #039be5;
}

@media (max-width: 380px) {
  .wrapper {
    margin: 30px 20px;
    padding: 40px 15px 15px 15px;
  }
}
</style>
