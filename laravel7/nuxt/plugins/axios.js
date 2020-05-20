import axios from 'axios'

export default function({ $axios }) {
  $axios.onRequest((config) => {
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('localstorage-jwt');
    return config
  })

  $axios.onResponse(config => {
    $axios.setHeader('Access-Control-Allow-Origin', 'http://poker.com')
  })
}
