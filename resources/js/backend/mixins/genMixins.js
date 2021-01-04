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
        },
        formatShortDate(date){
            const date_ft = new Date(date);
            const year = date_ft.getFullYear();
            let month = date_ft.getMonth()+1;
            let dt = date_ft.getDate();
            if (dt < 10) {
                dt = '0' + dt;
            }
            if (month < 10) {
                month = '0' + month;
            }

            return (year+'-' + month + '-'+dt);
        }
    }
}
Vue.mixin(mixin)
export default mixin;


