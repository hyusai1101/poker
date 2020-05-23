import axios from 'axios'
// fixme apiを2/6/9の固定で作る。url設計を考え中
const baseUrl = `${process.env.API_URL}/api/handRanges/6`
export const state = () => ({
  handRange: []
})
export const getters = {
  getterHandRangeData: state => state.handRange.data
}
export const mutations = {
  setHandRangeToState: (state, payload) => {
    state.handRange = payload
  },
  // 状態リセット
  resetState: (state, target) => {
    state[target] = []
  }
}
export const actions = {
  /**
   * ハンドレンジの取得
   * @param {Function} commit
   */
  async getHandRange({commit}) {
    await axios.get(baseUrl).then((res) => {
      commit('setHandRangeToState', res.data)
    }).catch((error) => {
      commit('error-response/setErrorResponseToState', error.response, {root: true})
      throw error
    })
  },
  /**
   * 会社情報の更新
   * @param {Function} commit
   * @param {Object}   payload
   */
  // async putCompany({commit}, payload) {
  //   await axios.put(baseUrl, payload.company, {
  //     withCredentials: true
  //   }).then((res) => {
  //     commit('setCompanyToState', res.data)
  //   }).catch((error) => {
  //     commit('error-response/setErrorResponseToState', error.response, {root: true})
  //     throw error
  //   })
  // },
  /**
   * 状態リセット系
   * @param {Function} commit
   */
  // company
  // resetCompany({commit}) {
  //  commit('resetState', 'company')
  // }
}
