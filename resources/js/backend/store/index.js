import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

import mutations from './mutations';
import getters from './getters';
import actions from './actions';

const store = new Vuex.Store({
    state: {
        user: null,
        users_admin:[],
        listTeachers:{},
        listNews:{},
        listCourses:{},
        listCourseTypes:{},
        listCourseTypesExtracted:{},
        isLoading:true,
    },
    mutations,
    getters,
    actions,
    currentUrl:null,
});

export default store;
