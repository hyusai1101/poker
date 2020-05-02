/**
 * @nuxt/auth モジュールで認証後に me を fetch
 * そのため、me の state は store では管理しない
 */
import axios from 'axios'

const meUrl = `${process.env.API_URL}/me/`
// 厳格モードの設定は、ルートモジュールでのみ可能
export const strict = false
export const state = () => ({
  websiteNumber: 0
})
export const getters = {
  isLogin: state => state.auth.loggedIn,
  getterWebsiteNumber: state => state.websiteNumber,
  getterMeData: state => state.auth.user.data,
  isRoleAdmin: state => state.auth.user.data.role === ROLE_ADMIN,
  isRoleStaff: state => state.auth.user.data.role === ROLE_STAFF
}
export const mutations = {
  setMeToState: (state, payload) => {
    state.auth.user = payload
  },
  setWebsiteNumberToState: (state, number) => {
    state.websiteNumber = number
  },
  resetWebsiteNumberToState: (state) => {
    state.websiteNumber = 0
  }
}
export const actions = {
  /**
   * ユーザー情報を取得
   * @param {Function} commit
   */
  async getMe({commit}) {
    await axios.get(meUrl, {
      withCredentials: true
    }).then((res) => {
      commit('setMeToState', res.data)
    }).catch((error) => {
      commit('error-response/setErrorResponseToState', error.response, {root: true})
      throw error
    })
  },
  /**
   * ユーザー情報を更新
   * @param {Function} commit
   * @param {Object}   payload
   */
  async putMe({commit}, payload) {
    await axios.put(meUrl, payload.user, {
      withCredentials: true
    }).then((res) => {
      commit('setMeToState', res.data)
    }).catch((error) => {
      commit('error-response/setErrorResponseToState', error.response, {root: true})
      throw error
    })
  },
  /**
   * ユーザー情報を更新
   * @param {Function} commit
   * @param {Object}   payload
   */
  async putMeConfirm({commit}, payload) {
    await axios.put(`${meUrl}confirm/`, payload.number, {
      withCredentials: true
    }).then((res) => {
      commit('setMeToState', res.data)
    }).catch((error) => {
      commit('error-response/setErrorResponseToState', error.response, {root: true})
      throw error
    })
  },
  /**
   * ウェブサイトの指定
   * @param {Function} commit
   * @param {Number}   number
   */
  async setWebsiteNumber({commit}, number = 0) {
    await commit('setWebsiteNumberToState', number)
  },
  /**
   * ウェブサイトナンバーのリセット
   * @param {Function} commit
   */
  resetWebsiteNumber({commit}) {
    commit('resetWebsiteNumberToState')
  }
}
