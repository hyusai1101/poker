<template>
  <v-container>
    <v-row
      justify="center"
    >
      <v-form
        ref="form"
        lazy-validation
      >
        <v-text-field
          v-model="loginInfo.email"
          :rules="emailRules"
          label="メールアドレス"
          required
        ></v-text-field>
        <v-text-field
          v-model="loginInfo.password"
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
import {mapActions} from 'vuex'
import axios from 'axios'
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
      ).then(res =>{
        console.log(res)
      }).catch(error => {
        console.log(error);
        alert('ハンドレンジの変更に失敗しました。リロードして再度お試しください')
      });
      // this.postLogin(this.loginInfo).then(()=>{
      //   this.$router.push('/')
      // })
    },
    ...mapActions([
      'postLogin'
    ])
  }
}
</script>
