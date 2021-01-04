<template>
    <div class="content">
        <div class="md-layout">
            <div
                class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
            >
                <md-card>
                    <md-card-header data-background-color="green">
                        <h4 class="title">Quản lí khóa học</h4>
                        <div>
                            <form-course :model="{}" :action="'ADD'"></form-course>
                        </div>
                    </md-card-header>
                    <md-card-content>
                        <courses-table></courses-table>
                    </md-card-content>
                </md-card>
            </div>
        </div>
    </div>
</template>

<script>
    import formCourse from '../components/Dialog/FormCourses';
    import coursesTable from '../components/Tables/CoursesTable';
    import {mapGetters} from "vuex";
    export default {
        name: "Courses",
        components:{formCourse,coursesTable},
        mounted() {
            this.$store.dispatch('fetchAllListCourseTypes');
            this.$store.dispatch('fetchListTeacher');
        }
    }
</script>

<style scoped>

</style>
