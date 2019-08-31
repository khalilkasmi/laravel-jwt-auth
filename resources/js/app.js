require('./bootstrap');

import axios from 'axios'

window.Vue = require('vue');

Vue.use(axios)

import login from './components/loginComponent'

const app = new Vue({
  el: '#app',
  components: {
    login
  }

})
