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
      <a href="./login">ログイン</a>
      <v-spacer></v-spacer>
    </v-toolbar>
  </v-card>
</template>
<script>
export default {
  name: 'TheHeader'
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
