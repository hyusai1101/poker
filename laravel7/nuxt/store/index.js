/**
 * @nuxt/auth モジュールで認証後に me を fetch
 * そのため、me の state は store では管理しない
 */
import axios from 'axios'

const baseUrl = `${process.env.API_URL}/api`;
// 厳格モードの設定は、ルートモジュールでのみ可能
export const strict = false

export const state = () => ({
  user: null
});

export const getters = {
  user: (state) => state.user
};

export const mutations = {
  userState(state, user) {
    state.user = user
  },
};

export const actions = {

  async postLogin({commit}, payload) {
    console.log(payload)
    await axios.post(baseUrl + '/login', payload, {
      withCredentials: true
    }).then((res) => {
      console.log(res)
      commit('userState', res)
    })
  }
}
