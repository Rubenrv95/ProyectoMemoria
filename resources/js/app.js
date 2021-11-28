

require('./bootstrap');

window.Vue = require('vue');

Vue.component('navbar-component', require('./components/Navbar.vue').default);

const app = new Vue({
    el: '#app',
});
