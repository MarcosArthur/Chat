<template>
  <div>
    <header>
      <h4>cadastre-se</h4>
    </header>

    <main>
      <form @submit.prevent="handleFormRegister()">
        <label>Nome</label>
        <input type="email" v-model="form.nome" @focus="errors.name = ''" />
        <small v-if="errors.name" class="text-danger">{{
          errors.name
        }}</small>


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
       this.$inertia.post('/register', this.form)
    }
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      }),
    };
  },
};
</script>

<style>
</style>