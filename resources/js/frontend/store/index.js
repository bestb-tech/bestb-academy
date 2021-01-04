import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import mutations from './mutations';
import getters from './getters';
import actions from './actions';

const store = new Vuex.Store({
    state:{
        courseType: {},
        listCourseType:[],
        course: {},
        listCourses:[],
        listNewestCourses:{},
        breadCrumb:[],
        listTeacher:[],
        teacher:{},
        listCourseByTeacher:{},
        listNews:{},
        news: {}
    },
    mutations,
    getters,
    actions
})
export default store;
