
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import Vuetify from 'vuetify';
Vue.use(Vuetify);

export default new Vuetify({ })
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('AppHome', require('./components/AppHome.vue'));
import router from './Router/router.js';
import User from './Helpers/User.js';
window.User = User; 

window.EventBus = new Vue(); 

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify(opts),
});

const opts = {
  theme: {
    dark: true,
    themes: {
      light: {
        primary: '...',
      },
      dark: {
        primary: '...',
      }
    }
  }
}