<template>
  <div>
    {{ user.name }}
    <div v-for="user in users" :key="user.id">{{ user.name }}</div>
  </div>
</template>

<script>
export default {
  props: {
    users: Object,
  },
  computed: {
    user() {
      return this.$page.props.auth.user;
    },
  },
  data: {
    id_user_to: "",
  },
  methods: {
    loadMessagens(id) {
      this.id_user_to = id;
    },
  },
  mounted() {
    Echo.private(`user.${this.user.id}`).listen('.SendMessage', (e) => {
      console.log(e)
    });
  },
};
</script>

<style>
</style>