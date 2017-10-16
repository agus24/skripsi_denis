import VueRouter from 'vue-router';
require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router');

Vue.use(VueRouter)

Vue.component('example', require('./components/Example.vue'));
Vue.component('Header', require('./components/Header.vue'));
Vue.component('Footer', require('./components/Footer.vue'));
Vue.component('Slider', require('./components/Slider.vue'));
Vue.component('Banner', require('./components/innerBanner.vue'));

const routes = [
  { path: '/', component: require('./page/Home.vue') },
  { path: '/bar', component: require('./components/Header.vue') }
]

const router = new VueRouter({
  routes
})

const app = new Vue({
  router
}).$mount('#app');
