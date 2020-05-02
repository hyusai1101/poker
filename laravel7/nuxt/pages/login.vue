<template>
  <v-container>
    <v-row
      justify="center"
    >
      <v-form
        ref="form"
        v-model="valid"
        lazy-validation
      >
        <v-text-field
          v-model="email"
          :rules="emailRules"
          label="メールアドレス"
          required
        ></v-text-field>
        <v-text-field
          v-model="password"
          :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
          :rules="[rules.required, rules.min]"
          :type="show1 ? 'text' : 'password'"
          label="パスワード"
          hint="パスワードは最低8文字以上です"
          counter
        ></v-text-field>
        <v-btn
          color="primary"
          @click="login()"
        >
          ログイン
        </v-btn>
      </v-form>
    </v-row>
  </v-container>
</template>

<script>

import axios from 'axios';
export default {
  data() {
    return {
      password: '',
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      show1: false,
      rules: {
        required: value => !!value || 'Required.',
        min: v => v.length >= 5 || 'Min 8 characters',
      },
    };
  },
  methods: {
    login() {
      const baseUrl = 'http://poker.com/api/login';
      axios.post(baseUrl, {
        'email': this.email,
        'password': this.password
      }).then(res => {
        this.$router.push('/')
      }).catch(error => {
      });
    },
  }
}
</script>
