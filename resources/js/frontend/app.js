/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

////////-----LIBRARY-----/////////////
// import VueMaterial from 'vue-material'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import '../../../public/bower_components/bootstrap/dist/js/bootstrap.bundle';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import Embed from 'v-video-embed'
import VueCarousel from 'vue-carousel';
import * as VueGoogleMaps from 'vue2-google-maps'
// import Chartist from "chartist";

// Vue.prototype.$Chartist = Chartist;

///////-----CUSTOM-----/////////////
import router from './router';
import store from "./store";
import mixin from './mixins/genMixins.js';
///////-----STYLE-----/////////////
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
// import 'vue-material/dist/vue-material.min.css'
// import 'vue-material/dist/theme/default.css';




// Vue.use(VueMaterial)
Vue.use(BootstrapVue);
Vue.use(IconsPlugin)
Vue.use(VueCarousel);
Vue.use(Embed);
Vue.use(VueGoogleMaps, {
    load: {
        key: '',
        libraries: 'places', // This is required if you use the Autocomplete plugin
    },
})
Vue.use(VueToast);
Vue.prototype.router = router;
Vue.prototype.goBack = () =>{
    router.go(-1);
}
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
    // data: {
    //     Chartist: Chartist
    // }
});
