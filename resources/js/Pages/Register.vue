<template>
  <div>
    <header class="cabecalho">
      <div class="cabecalho-nav">
        <inertia-link href="/"> ← </inertia-link>
        <h4>Cadastre-se</h4>
      </div>
    </header>

    <main class="main">
      <form @submit.prevent="handleFormRegister()" class="form">
        <label>Nome</label>
        <input type="text" v-model="form.name" @focus="errors.name = ''" />
        <small v-if="errors.name" class="text-danger">{{ errors.name }}</small>

        <label>E-mail</label>
        <input type="email" v-model="form.email" @focus="errors.email = ''" />
        <small v-if="errors.email" class="text-danger">{{
          errors.email
        }}</small>

        <label>Senha</label>
        <input
          type="password"
          v-model="form.password"
          @focus="errors.password = ''"
        />
        <small v-if="errors.password" class="text-danger">{{
          errors.password
        }}</small>

        <label>Confirma senha</label>
        <input
          type="password"
          v-model="form.password_confirmation"
          @focus="errors.password_confirmation = ''"
        />
        <small v-if="errors.password_confirmation" class="text-danger">{{
          errors.password_confirmation
        }}</small>
        <button>Logar</button>
      </form>
    </main>
  </div>
</template>

<script>
export default {
  props: {
    errors: Object,
  },
  methods: {
    handleFormRegister() {
      this.$inertia.post("/register", this.form);
    },
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      }),
    };
  },
};
</script>

<style scoped>
* {
  box-sizing: border-box;
}
.cabecalho {
  width: 100%;
  height: 10vh;
  display: flex;
  align-items: center;
  justify-content: flex-start;
  background: white;
  font-size: 20px;
}

.cabecalho-nav {
  width: 50%;
  display: flex;
  justify-content: space-between;
  padding: 0px 10px;
}

.main {
  width: 100%;
  height: 90vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.form {
  width: 50%;
  padding: 30px;
  background: white;
  border-radius: 4px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}

.form input {
  width: 100%;
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 0.5rem;
  font-size: 1rem;
  background: #f7f7f7;
}

.form button {
  margin-top: 30px;
  font-family: sans-serif;
  font-size: 0.9em;
  padding: 0.6rem 2rem;
  border: none;
  background: #ffb801;
  border-radius: 4px;
  color: #402d00;
}

small {
  display: block;
  margin-top: 5px;
}

@media all and (max-width:720px) {
  .cabecalho-nav {
    width: 60%;
  }

  .form {
    width: 90%;
  }
}
</style>