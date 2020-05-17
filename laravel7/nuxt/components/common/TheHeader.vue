<template>
  <v-card
    color="grey lighten-4"
    flat
    tile
  >
    <v-toolbar>
      <v-spacer></v-spacer>
      <v-toolbar-title>try-poker</v-toolbar-title>
      <v-spacer></v-spacer>
<!--      <img class="l-Header-Logo" src="@/assets/logo_transparent.png">-->
      <pre>
        {{user}}
      </pre>
      <div v-if="user">
        <v-btn
          @click="logout()"
        >
          ログアウト
        </v-btn>
      </div>
      <div v-else>
        <a href="/login">ログイン</a>

      </div>
      <v-spacer></v-spacer>
    </v-toolbar>
  </v-card>
</template>
<script>
export default {
  name: 'TheHeader',
  computed: {
    user() {
      return this.$auth.user;
    }
  },
  methods: {
    logout() {
      this.$auth.logout();
      localStorage.removeItem('jwt')
    },
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
