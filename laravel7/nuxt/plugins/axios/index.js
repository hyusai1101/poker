export let axios;

export default ({ store, $axios }) => {
  $axios.onRequest(config => {
    config.headers.common['Authorization'] = `Bearer `+ store.user();
    config.headers.common['Accept'] = 'application/json';
  });

  $axios.onResponse(config => {
    $axios.setHeader('Access-Control-Allow-Origin', 'http://poker.com')
  })

  $axios.onError(error => {
    return Promise.reject(error.response);
  });

  axios = $axios;
}
