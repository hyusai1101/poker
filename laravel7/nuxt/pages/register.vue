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

        <v-form
          ref="form"
          v-model="valid"
        >
          <v-text-field
            v-model="email"
            label="メールアドレスを入力"
            outlined
            required
            validate-on-blur
          />
          <v-text-field
            v-model="password"
            :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
            :type="show ? 'text' : 'password'"
            :hint="validation ? hint : undefined"
            :counter="validation"
            label="パスワードを入力"
            outlined
            required
            validate-on-blur
            autocomplete="on"
            @click:append="show = !show"
          />
          <v-card-text
            class="text-center"
          >
            <v-btn
              :disabled="!valid || loading"
              :loading="loading"
              color="primary"
              @click="signup"
            >
              登録する(無料)
            </v-btn>
          </v-card-text>
        </v-form>

        <v-card-actions>
          <v-divider />
        </v-card-actions>
        <v-card-text
          class="text-center"
        >
          会員登録はお済みですか？
        </v-card-text>
        <v-card-actions>
          <v-btn
            to="/login"
            class="mx-auto px-4"
          >
            ログインする
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-row>
  </v-container>
</template>

<script>
  export default {
    data: () => ({
      rules: {
        match: value => /.+@.+\..+/.test(value) || ''
      },
      email: {
        type: String,
        default: ''
      },
      password: {
        type: String,
        default: ''
      },
    }),
  }
</script>
