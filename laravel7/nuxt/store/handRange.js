import axios from 'axios'

export const state = () => ({
  list: []
})

export const mutations = {
  setList (state, list) {
    state.list = list
  }
}

export const actions = {
  async getList ({commit}) {
    const res = await this.$axios.$get('/api/todos')
    commit("setList", res)
  },
  async fetchItems({ commit }) {
    await axios.get('http://poker.com/api/handRanges').then((response) => {
      commit('setItems', { items: response.data })
    })
  }
}
