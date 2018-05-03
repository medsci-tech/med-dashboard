/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import App from './views/App.vue';
import router from './router';
import store from './store';
import VCharts from 'v-charts';
import 'v-charts/lib/style.css';
import 'bootstrap/dist/css/bootstrap.css';

Vue.use(VCharts);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue')
)

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue')
)

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue')
)

const app = new Vue({
  el: '#app',
  components: {
    app: App
  },
  store,
  router
})
