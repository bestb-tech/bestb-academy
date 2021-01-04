import Vue from 'vue';
const mixin = {
    methods: {
        capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        },
        isLastItemArray(index,length){
            return index === length - 1;
        },
        genRouteCourseShow(slug){
            return '/courses/'+slug;
        },
        genRouteCourseTypeShow(slug){
            return '/course-types/'+slug;
        },
        isEmptyObject(object){
            return ((Object.keys(object).length === 0) && (object.constructor === Object));
        }

    }
}
Vue.mixin(mixin)
export default mixin;


