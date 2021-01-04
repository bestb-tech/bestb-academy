<template>
    <div id="course-show" >
        <div class="position-relative  " style="height: 30vh">
            <div class=" course-name position-absolute  w-100">
                <div class="container text-uppercase">
                    <h2>{{course.name}}</h2>
                </div>
            </div>
            <div class="banner position-absolute w-100">

            </div>
        </div>
        <div class="container" v-if="!isCourseEmpty && !isLoading">
            <b-breadcrumb>
                <b-breadcrumb-item href="/" class="text-grey text-active-yellow">

                    <span class="text-grey text-active-yellow "><b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true" ></b-icon>Home</span>
                </b-breadcrumb-item>
                <b-breadcrumb-item
                    v-bind:href="genRouteCourseTypeShow(course.course_type.slug)"
                    class="text-grey text-active-yellow"
                >
                    <span class="text-grey text-active-yellow">{{course.course_type.name}}</span>
                </b-breadcrumb-item>
                <b-breadcrumb-item active>
                    <span class="text-yellow">{{course.name}}</span></b-breadcrumb-item>
            </b-breadcrumb>
            <h3>{{course.name}}</h3>
            <b-row>
                <b-col cols="12" lg="8">
                    <div class="main-course-show">
                        <div class="course-title d-flex pt-2 pb-4">
                            <div class="teach-info d-flex align-items-center">
                                <div class="d-inline-block">
                                    <a v-bind:href="'/teachers/' + course.teachers[0].slug  " class="text-active-yellow text-decoration-none text-grey">
                                        <img v-bind:src="course.teachers[0].pathAvatar" alt="">
                                    </a>
                                </div>
                                <div class="d-inline-block  pl-2"  >
                                    <span class="text-grey normal-bold">Giảng viên:</span><br>
                                    <span class="text-active-yellow text-uppercase">
                                        <a v-bind:href="'/teachers/' + course.teachers[0].slug  " class="text-active-yellow text-decoration-none ">
                                            {{course.teachers[0].full_name}}
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="pl-4 d-flex align-items-center">
                                <i class="far fa-bookmark text-yellow" style="font-size: 30px"></i>
                                <div class="d-inline-block pl-2"  >
                                    <span class="text-grey normal-bold">Chuyên mục:</span><br>
                                    <span ><a class="text-active-yellow text-uppercase text-decoration-none" v-bind:href="genRouteCourseTypeShow(course.course_type.slug)">{{course.course_type.name}}</a></span>
                                </div>
                            </div>
                        </div>

                        <div class="course-content">
                            <img v-bind:src="course.pathImg" alt="" class="w-100">
                            <div>
                                <p v-html="course.description">{{course.description}}</p>
                            </div>
                        </div>
                        <h3 class="my-3">Thông tin giảng viên</h3>
                        <div class="teacher-info p-lg-5 p-3">
                            <div class="d-flex flex-wrap">
                                <div class="pr-3"><a v-bind:href="'/teachers/' + course.teachers[0].slug  "><img v-bind:src="course.teachers[0].pathAvatar" alt=""></a></div>
                                <div >
                                    <a v-bind:href="'/teachers/' + course.teachers[0].slug  " class="text-active-yellow text-decoration-none text-grey"><p class="m-0 ">{{course.teachers[0].full_name}}</p></a>
                                    <p class="text-blue" v-html="course.teachers[0].description">{{course.teachers[0].description}} VND</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </b-col>
                <b-col cols="12" lg="4">
                    <b-card>
<!--                        <template #header header-class="">-->
<!--                          -->
<!--                        </template>-->
                        <b-card-header header-class="main-btn">
                            <a v-bind:href="course.google_form_url" class=" btn text-yellow text-decoration-none w-100 text-grey ">ĐĂNG KÍ KHÓA HỌC</a>
                        </b-card-header>
                        <b-card-body>
                            <b-card-text class="text-grey">
                                HỌC PHÍ
                            </b-card-text>
                            <b-card-title>{{course.sell_price === null ? '0' : course.sell_price.toLocaleString()}} VNĐ</b-card-title>
                        </b-card-body>

                        <b-list-group flush class="text-grey">
                            <b-list-group-item >
                                <i class="fas fa-history"></i>
                                Điều kiện: Không
                            </b-list-group-item>
                            <b-list-group-item>
                                <i class="fas fa-chart-bar"></i>
                                Trình độ: intermediate
                            </b-list-group-item>
                            <b-list-group-item>
                                <i class="fas fa-book"></i>
                                Số lượng bài học: {{course.total_lesson}}
                            </b-list-group-item>
                            <b-list-group-item>
                                <i class="fas fa-certificate"></i>
                                Chứng chỉ: Có
                            </b-list-group-item>
                        </b-list-group>
                    </b-card>

                    <listCourseType></listCourseType>
                    <listNewestCourses></listNewestCourses>
                </b-col>
            </b-row>
        </div>
        <div class="container" v-else-if="isLoading">
            <b-breadcrumb>
                <b-breadcrumb-item href="/" class="text-grey text-active-yellow">
                    <span class="text-grey text-active-yellow "><b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true" ></b-icon>Home</span>
                </b-breadcrumb-item>
            </b-breadcrumb>
            <h3><b-skeleton width="35%"></b-skeleton></h3>
            <b-row>
                <b-col cols="12" lg="8">
                    <div class="main-course-show">
                        <div class="course-title d-flex pt-2 pb-4">
                            <div class="teach-info d-flex align-items-center">
                                <div class="d-inline-block">
                                    <b-skeleton type="avatar"></b-skeleton>
                                </div>
                                <div class="d-inline-block  pl-2"  >
                                    <span class="text-grey normal-bold">Giảng viên:</span><br>
                                    <span class="text-active-yellow text-uppercase">
                                        <b-skeleton></b-skeleton>
                                    </span>
                                </div>
                            </div>
                            <div class="pl-4 d-flex align-items-center">
                                <i class="far fa-bookmark text-yellow" style="font-size: 30px"></i>
                                <div class="d-inline-block pl-2"  >
                                    <span class="text-grey normal-bold">Chuyên mục:</span><br>
                                    <span ><b-skeleton></b-skeleton></span>
                                </div>
                            </div>
                        </div>

                        <div class="course-content">
                            <b-skeleton-img width="100%"></b-skeleton-img>
                            <div>
                                <b-skeleton></b-skeleton>
                            </div>
                        </div>
                        <h3 class="my-3">Thông tin giảng viên</h3>
                        <div class="teacher-info p-5">
                            <div class="d-flex">
                                <div><a ><b-skeleton type="avatar"></b-skeleton></a></div>
                                <div class="pl-3">
                                    <a ><p class="m-0 "><b-skeleton></b-skeleton></p></a>
                                    <p class="text-blue"><b-skeleton></b-skeleton></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-col>
                <b-col cols="12" lg="4">
                    <b-card>
                        <b-card-header header-class="main-btn">
                            <a class=" btn text-yellow text-decoration-none w-100 text-grey ">ĐĂNG KÍ KHÓA HỌC</a>
                        </b-card-header>
                        <b-card-body>
                            <b-card-text class="text-grey">
                                HỌC PHÍ
                            </b-card-text>
                            <b-card-title><b-skeleton></b-skeleton></b-card-title>
                        </b-card-body>

                        <b-list-group flush class="text-grey">
                            <b-list-group-item >
                                <b-skeleton></b-skeleton>
                            </b-list-group-item>
                            <b-list-group-item>
                                <b-skeleton></b-skeleton>
                            </b-list-group-item>
                            <b-list-group-item>
                                <b-skeleton></b-skeleton>
                            </b-list-group-item>
                            <b-list-group-item>
                                <b-skeleton></b-skeleton>
                            </b-list-group-item>
                        </b-list-group>
                    </b-card>

                    <listCourseType></listCourseType>
                    <listNewestCourses></listNewestCourses>
                </b-col>
            </b-row>
        </div>
        <div class="container" v-else>
            <p>Không tồn tại khóa học</p>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";
    import listCourseType from './Ads/ListCourseType';
    import listNewestCourses from './Ads/ListNewestCourses';
    export default {
        name: "CourseShow",
        props:[''],
        data(){
            return {
                name:'',
                email:'',
                phone_number:'',
                isLoading:true,
            }
        },
        components: {listCourseType,listNewestCourses},
        computed:{
            ...mapGetters([
                'course'
            ]),
            isCourseEmpty(){
                return ((Object.keys(this.course).length === 0) && (this.course.constructor === Object));
            }
        },
        async mounted(){
            await this.$store.dispatch('getCourseBySlug',this.$route.params.courseSlug)
                .catch((err)=>{console.log(err)})
                .finally(()=>{
                    this.isLoading = false;
                });
        },
        methods:{

        }
    }
</script>

<style lang="scss" scoped>
    .teacher-info {
        border: solid 1px var(--main-smoke);
        img{
            object-fit: cover;
            width: 100px;
            height:100px;
        }
    }

</style>
