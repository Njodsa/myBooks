
require('./bootstrap');

window.Vue = require('vue');
import router from './router'
Vue.component('paginate', require('vuejs-paginate'));
Vue.component('the-navigation', require('./components/theNavigation.vue').default);

const app = new Vue({
    el: '#app',
      router,

});
