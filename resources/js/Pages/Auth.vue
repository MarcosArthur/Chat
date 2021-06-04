<template>
  <form id="modal" class="animar" @submit.prevent="handleFormLogin">
    <h1>Login</h1>
    <label>E-mail</label>
    <input type="email" v-model="form.email" @focus="errors.email = ''"/>
    <small v-if="errors.email" class="text-danger">{{errors.email}}</small>
    <label>Senha</label>
    <input type="password" v-model="form.password" @focus="errors.password = ''"/>
    <small v-if="errors.password" class="text-danger">{{errors.password}}</small>
    <button>Logar</button>

     <div class="alert" @click="errors.fail_authenticate = ''" v-if="errors.fail_authenticate">{{errors.fail_authenticate}}</div>
  </form>

 
</template>

<script>
export default {
  props: {
    errors: Object,
  },
  methods: {
    handleFormLogin() {
       this.$inertia.post('/authenticate', this.form)
    }
  },
  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
      }),
    };
  },
};
</script>

<style scoped>
body {
  background: #f7f7f7;
  margin: 20px;
}

#ativar {
  display: block;
  margin: 20px auto;
}

.text-danger {
  display: block;
  margin-top: 10px;
  color: #e74c3c;
}

.alert {
  width: 100%;
  height: 50px;
  margin-top: 10px;
  color: white;
  background: #e74c3c ;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding: 7px;
  border-radius: 7px;
}

#modal h1 {
  font-family: sans-serif;
  margin: 0px 0px 20px;
}

#modal label {
  display: block;
  font-family: sans-serif;
  margin-bottom: 5px;
  margin-top: 10px;
}

#modal input {
  width: 100%;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 0.5rem;
  font-size: 1rem;
  background: #f7f7f7;
}

#modal button {
  margin-top: 20px;
  display: block;
  font-family: sans-serif;
  font-size: 1rem;
  padding: 0.6rem 2rem;
  border: none;
  background: #ffb801;
  border-radius: 4px;
  color: #402d00;
}

#modal {
  padding: 30px;
  background: white;
  border-radius: 4px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  margin: 20px auto;
  opacity: 0;
  transform: translateX(-20px);
}

#modal.animar {
  animation-name: slide;
  animation-duration: 0.3s;
  animation-timing-function: ease;
  animation-delay: 0s;
  animation-iteration-count: 1;
  animation-direction: normal;
  animation-fill-mode: forwards;
  animation-play-state: running;
  /* animation: slide .3s forwards; */
}

@keyframes slide {
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

#load {
  width: 20px;
  height: 20px;
  border: 10px solid;
  border-radius: 50%;
  border-top-color: transparent;
  margin: 0 auto;
  color: #ffb801;
  animation: load 0.6s linear infinite;
}

@keyframes load {
  to {
    transform: rotate(360deg);
  }
}

@keyframes loadFrames {
  0% {
    transform: translate(0px) scale(0.5);
  }
  25% {
    transform: translate(200px);
  }
  50% {
    transform: translate(200px, -200px) scale(1.5);
  }
  75% {
    transform: translate(0px, -200px);
  }
  100% {
    transform: translate(0px) scale(0.5);
  }
}
</style>