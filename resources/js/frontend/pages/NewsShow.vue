<template>
    <div>
        <div id="news-show" v-if="!isNewsEmpty &&  !isLoading">
            <div class="position-relative  " style="height: 30vh">
                <div class=" course-name position-absolute  w-100">
                    <div class="container text-uppercase">
                        <h2>{{news.name}}</h2>
                    </div>
                </div>
                <div class="banner position-absolute w-100">

                </div>
            </div>
            <div class="container">
                <b-breadcrumb>
                    <b-breadcrumb-item href="/" class="text-grey text-active-yellow">
                        <span class="text-grey text-active-yellow "><b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true" ></b-icon>Home</span>
                    </b-breadcrumb-item>
                    <b-breadcrumb-item active>
                        <span class="text-yellow">{{news.name}}</span></b-breadcrumb-item>
                </b-breadcrumb>
                <h3>{{news.name}}</h3>
                <b-row>
                    <b-col cols="12" lg="8">
                        <img v-bind:src="news.path_thumbnail" alt="" class="w-100">
                        <div class="main-course-show">
                            <div class="course-title d-flex pt-2 pb-4">
                                <div class="teach-info d-flex align-items-center">
                                    <div class="d-inline-block  pl-2"  >
                                        <i class="far fa-clock"></i>
                                        {{news.diff_created_at}}
                                        <i class="fas fa-user"></i>
                                        By: BestB Academy
                                    </div>
                                </div>

                            </div>
                            <div class="course-content">
                                <div>
                                    <p v-html="news.content">{{news.content}}</p>
                                </div>
                            </div>
                        </div>
                    </b-col>
                    <b-col cols="12" lg="4">
                        <listCourseType></listCourseType>
                        <listNewestCourses></listNewestCourses>
                    </b-col>
                </b-row>
            </div>
        </div>
        <div id="news-show" v-else-if="isLoading">
            <div class="position-relative  " style="height: 30vh">
                <div class=" course-name position-absolute  w-100">
                    <div class="container text-uppercase">
                        <h2><b-skeleton></b-skeleton></h2>
                    </div>
                </div>
                <div class="banner position-absolute w-100">

                </div>
            </div>
            <div class="container">
                <b-breadcrumb>
                    <b-breadcrumb-item href="/" class="text-grey text-active-yellow">
                        <span class="text-grey text-active-yellow "><b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true" ></b-icon></span>
                    </b-breadcrumb-item>
                    <b-breadcrumb-item active>
                        <span class="text-yellow"></span></b-breadcrumb-item>
                </b-breadcrumb>
                <h3><b-skeleton width="30%"></b-skeleton></h3>
                <b-row>
                    <b-col cols="12" lg="8">
                        <b-skeleton-img card-img="right" width="100%" aspect="16:9"> </b-skeleton-img>
                        <div class="main-course-show">
                            <div class="course-title d-flex pt-2 pb-4">
                                <div class="teach-info d-flex align-items-center">
                                    <div class="d-inline-block  pl-2"  >
                                    </div>
                                </div>

                            </div>
                            <div class="course-content">
                                <div>
                                    <b-skeleton v-for="item in 5"></b-skeleton>
                                    <b-skeleton width="85%"></b-skeleton>
                                </div>
                            </div>
                        </div>
                    </b-col>
                    <b-col cols="12" lg="4">
                        <listCourseType></listCourseType>
                        <listNewestCourses></listNewestCourses>
                    </b-col>
                </b-row>
            </div>
        </div>
        <div id="news-show" class="container" v-else>
            <p>Không có tin tức này</p>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from "vuex";
    import listCourseType from './Ads/ListCourseType';
    import listNewestCourses from './Ads/ListNewestCourses';
    export default {
        name: "NewsShow",
        components: {listCourseType,listNewestCourses},
        computed:{
            ...mapGetters([
                'news'
            ]),
            isNewsEmpty(){
                return (this.news === null ||(Object.keys(this.news).length === 0) && (this.news.constructor === Object));
            }
        },
        data(){
            return {
                isLoading:true,
            }
        },
        async mounted() {
            await this.$store.dispatch('getNewsBySlug',this.$route.params.slug)
                .catch(err=>{
                    console.log(err)
                }).finally(()=>{
                    this.isLoading = false;
                })

        }
    }
</script>

<style scoped>

</style>
