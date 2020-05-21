<template>
    <div>
      <v-app-bar
        absolute
        color="gray"
        dark
      >
        <v-toolbar-title>try-poker</v-toolbar-title>

        <div class="flex-grow-1"></div>
        <div v-if="user">
          <v-btn
            @click="logout()"
          >
            ログアウト
          </v-btn>
        </div>
        <div v-else>
          <v-btn
            @click="getLogin()"
          >
            ログイン
          </v-btn>
          <a href="/login"></a>
        </div>
      </v-app-bar>
    </div>
</template>
<script>
export default {
  name: 'TheHeader',
  computed: {
    user() {
      return this.$auth.user;
    },
    loggedIn() {
      return this.$auth.loggedIn;
    }
  },
  methods: {
    logout() {
      this.$auth.logout();
      localStorage.removeItem('localstorage-jwt');
      this.$router.push('/');
    },
    getLogin(){
      this.$router.push('/login')
    }
  }
}
</script>

<style>
  .l-Header-Logo {
    width: 100px;
    height: 100px;
    display: block;
    margin: 0 auto;
  }
</style>
