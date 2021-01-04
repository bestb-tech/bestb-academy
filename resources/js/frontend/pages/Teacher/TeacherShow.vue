<template>
    <div id="teacher-show" >
        <div class="position-relative banner-top " style="height: 30vh">
            <div class=" course-name position-absolute  w-100">
                <div class="container text-uppercase">
                    <h2>{{teacherName}}</h2>
                </div>
            </div>
            <div class="banner position-absolute w-100">

            </div>
        </div>
        <div class="m-0 py-3 bread-crumb-top">
            <div class="container">
                <b-breadcrumb class="bg-light  m-0">
                    <b-breadcrumb-item href="/" class="text-grey text-active-yellow">
                        <span class="text-grey text-active-yellow text-decoration-none"><b-icon icon="house-fill" scale="1.25" shift-v="1.25" aria-hidden="true" ></b-icon>Home</span>
                    </b-breadcrumb-item>
                    <b-breadcrumb-item active>
                        <span class="text-yellow">{{teacherName}}</span></b-breadcrumb-item>
                </b-breadcrumb>
            </div>

        </div>
        <div class="container mt-3 pt-3">
            <b-row v-if="!(isEmptyObject(teacher) || isLoading) ">
                <b-col lg="3">
                    <b-card
                        no-body
                        v-bind:img-src="teacher.pathAvatar"
                        img-alt="Image"
                        img-top
                    >
                        <b-list-group flush >
                            <b-list-group-item class="bg-main-dark text-yellow"><i class="far fa-envelope pr-3"></i>{{teacher.email}}</b-list-group-item>
                            <b-list-group-item class="bg-main-dark text-yellow border-light"><i class="fas fa-mobile-alt pr-3"></i>{{teacher.phone_number}}</b-list-group-item>
                        </b-list-group>
                    </b-card>
                </b-col>
                <b-col lg="9">
                    <div class="teacher-name-section">
                        <h5><b>Giảng viên:</b>
                        </h5>
                        {{teacherName}}
                    </div>
                    <div>
                        <h5 class="mt-5"><b>Giới thiệu giảng viên</b></h5>
                        <p v-html="teacher.description">{{teacher.description}}</p>
                    </div>
                    <div>
                        <h5 class="mt-5"><b>Danh sách khóa học</b></h5>
                        <table class="w-100">
                            <tr>
                                <th>Tên khóa học</th>
                                <th>Số bài học</th>
                                <th>Chứng chỉ</th>
                            </tr>
                            <tr v-for="item in listCourseByTeacher" >
                                <td><a class="text-decoration-none text-main-dark" v-bind:href="genRouteCourseShow(item.slug)">{{item.name}}</a></td>
                                <td>{{item.total_lesson}}</td>
                                <td>Có</td>
                            </tr>
                        </table>
                    </div>
                </b-col>
            </b-row>
            <b-row v-else-if="isLoading">
                <b-col lg="3">
                    <b-card
                        no-body
                    >
                        <b-skeleton-img></b-skeleton-img>
                        <b-list-group flush >
                            <b-list-group-item class="bg-main-dark text-yellow"><i class="far fa-envelope pr-3"></i><b-skeleton></b-skeleton></b-list-group-item>
                            <b-list-group-item class="bg-main-dark text-yellow border-light"><i class="fas fa-mobile-alt pr-3"></i><b-skeleton></b-skeleton></b-list-group-item>
                        </b-list-group>
                    </b-card>
                </b-col>
                <b-col lg="9">
                    <div class="teacher-name-section">
                        <h5><b>Giảng viên:</b>
                        </h5>
                        <b-skeleton></b-skeleton>
                    </div>
                    <div>
                        <h5 class="mt-5"><b>Giới thiệu giảng viên</b></h5>
                        <b-skeleton></b-skeleton>
                    </div>
                    <div>
                        <h5 class="mt-5"><b>Danh sách khóa học</b></h5>
                        <b-skeleton-table
                            :rows="5"
                            :columns="3"
                            :table-props="{ bordered: true, striped: true }"
                        ></b-skeleton-table>
                    </div>
                </b-col>
            </b-row>
            <div v-else>
                Giảng viên này không có
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";
    import mixin from "../../mixins/genMixins"
    import router from '../../router';

    export default {
        name: "TeacherShow",
        computed:{
            ...mapGetters([
                'listCourseByTeacher','teacher'
            ]),
            teacherName(){
                return mixin.methods.isEmptyObject(this.teacher) ? 'GIẢNG VIÊN' : this.teacher.full_name;
            }
        },
        async mounted() {
            await this.$store.dispatch('fetchTeacher',this.$route.params.teacherSlug).catch(err => console.log(err));
            await this.$store.dispatch('fetchListCourseByTeacher',this.$route.params.teacherSlug).catch(err => console.log(err));
            this.isLoading = false;
        },
        data(){
            return {
                isLoading:true,
            }
        }
    }
</script>

<style lang="scss" scoped>
    .bread-crumb-top{
        border-bottom:solid 1px #ececec!important;
    }
    .list-group-item,{
        border-bottom:solid 1px #ececec!important;
    }
    table{
        border: solid 1px #ececec;
        tr {
            border-bottom:solid 1px #ececec;
            td,th{
                padding:1rem;
            }
        }
        tr:first-child{
            background: var(--main-yellow);
        }
        tr:hover{
            background: var(--main-smoke);
        }
    }


</style>
