<template>
	<div id="list-cousers" >

        <div class="position-relative  " style="height: 30vh">
            <div class=" course-name position-absolute  w-100">
                <div class="container text-uppercase">
                    <h2>DANH SÁCH KHÓA HỌC</h2>
                </div>
            </div>
            <div class="banner position-absolute w-100">

            </div>
        </div>
        <div class="container">
            <div class="row list-khoahoc pt-5" v-if="listCourses.length !== 0 && !isLoading">
                <KhoahocItem v-for="(item,index) in listCourses" :item="item" :key="index"></KhoahocItem>
            </div>

            <div class="row list-khoahoc pt-5" v-else-if="isLoading">

                <div class="col col-6 col-lg-3 mb-4 khoahoc-item" v-for="item in 4">
                    <div class="h-100">
                        <b-card
                            no-body
                            style="max-width: 20rem;"

                            img-top
                            class="h-100"
                        >
                            <template #header >
                                <b-skeleton-img card-img="right" width="100%" aspect="1:1"> </b-skeleton-img>
                            </template>
                            <b-card-body >
                                <b-skeleton></b-skeleton>
                                <b-card-title >
                                    <b-skeleton></b-skeleton>
                                </b-card-title>
                                <div class="teach-info">
                                    <b-skeleton type="avatar"></b-skeleton>
                                    <span><b-skeleton></b-skeleton></span>
                                </div>
                            </b-card-body>
                            <b-card-footer>
                                <i class="fas fa-users"></i>
                                <i class="far fa-comment-dots"></i>
                            </b-card-footer>

                        </b-card>
                    </div>
                </div>
            </div>

            <div v-else>
                <p>Hiện không có khóa học</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";
    import KhoahocItem from "./KhoahocItem";

    export default {
        name: "ListCourses",
        components:{
            KhoahocItem
        },
        props:['courseType'],
        computed:{
            ...mapGetters([
                'listCourses','breadCrumb'
            ])
        },
        data(){
            return {
                listCoursesInfo : '',
                isLoading:true,
            }
        },
        async mounted() {
            this.$store.dispatch('fetchListCoursesByType',this.$route.params.courseType)
                .then((res)=>{
                    if(res.data.data.courses.length === 0){
                        this.listCoursesInfo = 'Hiện không có khóa học';
                    }
                }).finally(()=>{
                    this.isLoading = false;
            });
        }
    }
</script>

<style scoped>

</style>
