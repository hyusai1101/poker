<template>
  <v-layout>
    <v-flex class="text-center">
      <button v-on:click="test">aaa</button>
    </v-flex>
  </v-layout>
</template>

<script>
  const Cookie = process.client ? require('js-cookie') : undefined;
  import axios from 'axios'
  export default {
    methods: {
      test() {
        const header = {"Authorization": "Bearer " + Cookie.get('jwt')};
        axios.get('http://poker.com/api/me/',{
          headers: header,
          data: {}
        }).then(res =>{
          console.log(res)
          // this.$router.push('/')
        }).catch(error => {
          console.log(error);
          alert('ハンドレンジの変更に失敗しました。リロードして再度お試しください')
        });
      }
    }
  };
</script>
