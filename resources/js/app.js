

require('./bootstrap');

window.Vue = require('vue');

Vue.component('navbar-component', require('./components/Navbar.vue').default);
Vue.component('modaluser-component', require('./components/crear_usuario.vue').default);

const app = new Vue({
    el: '#app',
});
