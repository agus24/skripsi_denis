require('./bootstrap');

window.Vue = require('vue');

Vue.component('Header', require('./components/Header.vue'));
Vue.component('Footer', require('./components/Footer.vue'));
Vue.component('Slider', require('./components/Slider.vue'));
Vue.component('Banner', require('./components/innerBanner.vue'));
Vue.component('Item', require('./components/Item.vue'));
Vue.component('ItemContainer', require('./components/ItemContainer.vue'));
Vue.component('Home', require('./page/Home.vue'));

const app = new Vue({
  el : "#app"
});
