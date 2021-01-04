<template>
	<div class="ads-course-type mt-5">
        <h3 class="text-uppercase ">DANH MỤC KHÓA HỌC</h3>
        <div class="ads-border-title">
            <div></div>
        </div>

        <ul v-if="listCourseType.length > 0" class="p-0">
            <li v-for="item in listCourseType"><a v-bind:href="genRouteCourseTypeShow(item.slug)" class="text-decoration-none text-active-yellow text-main-dark">{{item.name}}</a></li>
        </ul>
        <ul v-else class="p-0">
            <li v-for="item in 3">
                <b-skeleton></b-skeleton>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "ListCourseType",
        computed:{
            ...mapGetters([
                'listCourseType'
            ]),
            isEmptyListCourseType(){
                return ((Object.keys(this.listCourseType).length === 0) && (this.listCourseType.constructor === Object));
            }
        },
        created(){
            this.$store.dispatch('fetchListCourseTypes');
        }
    }
</script>

<style scoped>
    ul{
        list-style: none;
    }
</style>
