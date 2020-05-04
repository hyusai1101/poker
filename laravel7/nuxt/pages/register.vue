<template>
  <v-container>
    <v-row
      justify="center"
    >
      <v-card
        flat
        width="90%"
        max-width="368"
        color="transparent"
      >
        <v-card-title
          class="justify-center headline"
        >
          新規会員登録
        </v-card-title>
        <v-text-field
          v-model="name"
          label="名前（ニックネーム）"
          outlined
          required
        />
        <v-text-field
          v-model="email"
          label="メールアドレスを入力"
          outlined
          required
        />
        <v-text-field
          v-model="password"
          label="パスワードを入力"
          outlined
          required
          validate-on-blur
          autocomplete="on"
        />
        <v-card-text
          class="text-center"
        >
          <v-btn
            color="primary"
            @click="register()"
          >
            登録する(無料)
          </v-btn>
        </v-card-text>

        <v-card-text
          class="text-center"
        >
          会員登録はお済みですか？
        </v-card-text>
<!--        <v-card-actions>-->
<!--          <v-btn-->
<!--            to="/login"-->
<!--            class="mx-auto px-4"-->
<!--          >-->
<!--            ログインする-->
<!--          </v-btn>-->
<!--        </v-card-actions>-->
      </v-card>
    </v-row>
  </v-container>
</template>

<script>

import axios from 'axios';
const Cookie = process.client ? require('js-cookie') : undefined
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
    };
  },
  methods: {
    register() {
      const baseUrl = 'http://poker.com/api/register';
      axios.post(baseUrl, {
        'name': this.name,
        'email': this.email,
        'password': this.password
      }).then(res => {
        Cookie.set('jwt', res.data.token);
        this.$router.push('/')
      }).catch(error => {
      });
    },
  }
}
</script>
