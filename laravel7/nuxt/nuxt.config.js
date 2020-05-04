import colors from "vuetify/es5/util/colors";
require('dotenv').config({path: '../.env'})

export default {
  mode: "universal",
  /*
   ** Headers of the page
   */
  head: {
    titleTemplate: "%s - " + process.env.npm_package_name,
    title: process.env.npm_package_name || "",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      {
        hid: "description",
        name: "description",
        content: process.env.npm_package_description || "",
      },
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }],
  },
  /*
   ** Customize the progress-bar color
   */
  loading: { color: "#fff" },
  /*
   ** Global CSS
   */
  css: [
    '@/assets/scss/main.scss'
  ],
  /*
   ** Plugins to load before mounting the App
   */
  plugins: [
    '@/plugins/consts.js',
    '@/plugins/axios/index.js',
    // { src: 'plugins/axios/index.js', ssr: false }
  ],
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: ["@nuxtjs/vuetify"],
  /*
   ** Nuxt.js modules
   */
  modules: [
    '@nuxtjs/dotenv',
    '@nuxtjs/proxy',
    ['@nuxtjs/axios', {
      credentials: true
    }],
    ['@nuxtjs/auth',{
      strategies: {
        local: { //自前の認証処理を実行する
          endpoints: {
            login: { //ログインを実行する際のリクエスト設定
              url: '/login/', method: 'post', propertyName: false
            },
            logout: {　//ログアウトを実行する際のリクエスト設定
              url: '/logout/', method: 'get'
            },
          },
        },
      },
      localStorage: false
    }]
  ],
  proxy: {
    '/api': {
      target: process.env.API_URL,
      pathRewrite: {
        '^/api': '/'
      }
    }
  },
  /*
   ** vuetify module configuration
   ** https://github.com/nuxt-community/vuetify-module
   */
  vuetify: {
    customVariables: ["~/assets/variables.scss"],
    theme: {
      dark: true,
      themes: {
        dark: {
          primary: colors.blue.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3,
        },
      },
    },
  },
  env: {
    API_URL: process.env.API_URL
  },
  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {},
  },
  srcDir: "../nuxt/",
  watchers: {
    webpack: {
      poll: 1000,
    },
  },
  generate: {
    dir: "../public/nuxt/",
  },
};
