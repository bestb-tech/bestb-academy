
require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
Vue.use(Vuex);

import router from './router/index';
import store from './store';
import Chartist from "chartist";

// Plugins
import GlobalComponents from "./globalComponents";
import GlobalDirectives from "./globalDirectives";
import Notifications from "./components/NotificationPlugin";
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
// MaterialDashboard plugin
import MaterialDashboard from "./material-dashboard";
import CKEditor from 'ckeditor4-vue';


Vue.use(MaterialDashboard);
Vue.use(GlobalComponents);
Vue.use(GlobalDirectives);
Vue.use(Notifications);
Vue.use( CKEditor );
Vue.use(VueToast);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import mixin from './mixins/genMixins.js';
Vue.prototype.router = router;
Vue.prototype.$Chartist = Chartist;

Vue.prototype.goBack = () =>{
    router.go(-1);
}

const app = new Vue({
    el: '#app',
    components:{},
    router,
    store:store,
    data: {
        Chartist: Chartist
    }
});
