import axios from 'axios'

export default function({ $axios, redirect }) {
  $axios.onRequest((config) => {
    axios.defaults.headers.common['Authorization'] = localStorage.getItem(
      'jwt'
    )
    return config
  })

  $axios.onResponse(config => {
    $axios.setHeader('Access-Control-Allow-Origin', 'http://poker.com')
  })
}
