<template>
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
        ログイン
      </v-card-title>
          <v-text-field
            v-model="loginInfo.email"
            :rules="emailRules"
            label="メールアドレス"
            required
          ></v-text-field>
          <v-text-field
            v-model="loginInfo.password"
            :rules="[rules.required, rules.min]"
            label="パスワード"
            required
          ></v-text-field>
      <v-card-text
        class="text-center"
      >
              <v-btn
                color="primary"
                @click="login()"
              >
                ログイン
              </v-btn>
      </v-card-text>
    </v-card>
  </v-row>
</template>

<script>
  import {mapActions} from 'vuex'
  import axios from 'axios'

  const Cookie = process.client ? require('js-cookie') : undefined;
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
        loginInfo: {
          email: '',
          password: '',
        }
      };
    },
    methods: {
      login() {
        axios.post('http://poker.com/api/login/',
          this.loginInfo
        ).then(res => {
          Cookie.set('jwt', res.data.token);
          this.$router.push('/')
        }).catch(error => {
          alert('ログインに失敗しました。再度お試しください。')
        });
      },
      ...mapActions([
        'postLogin'
      ])
    }
  }
</script>
