<template>
    <div>
        <div v-if="isLoading">
            <div class="d-flex justify-content-center mb-3 h-100">
                <md-progress-spinner md-mode="indeterminate"></md-progress-spinner>
            </div>
        </div>
        <div v-else>
            <md-table v-model="isEmptyObject(listCourses) ? [] : listCourses.data" :table-header-color="tableHeaderColor">
                <md-table-row slot="md-table-row" slot-scope="{ item }"  md-selectable="multiple" md-auto-select >
                    <md-table-cell md-label="" class="img_table">
                        <img v-bind:src="item.pathImg" alt="" class="admin-table-img">
                    </md-table-cell>
                    <md-table-cell md-label="Tên">{{ item.name }}</md-table-cell>
                    <md-table-cell md-label="Danh mục">{{ item.course_type.name }}</md-table-cell>
                    <md-table-cell md-label="Giá">{{ (item.sell_price == null) ? '' : item.sell_price.toLocaleString() }}</md-table-cell>
                    <md-table-cell md-label="GG Form">
                        <a v-bind:href="item.google_form_url">Link</a>
                    </md-table-cell>

                    <md-table-cell md-label="GG Sheet">
                        <a v-bind:href="item.google_sheet_url">Link</a>
                    </md-table-cell>

                    <md-table-cell md-label="Actions">
                        <form-courses :model="item" :action="'EDIT'" :key="item.slug"></form-courses>
                        <md-button class="md-raised" @click="deleteCourse(item.slug)">Xóa</md-button>
                    </md-table-cell>
                </md-table-row>
            </md-table>
            <div class="d-flex">
                <a @click="fetchListCoursesByUrl(isEmptyObject(listCourses) ? null :listCourses.links.prev)" ><md-icon>arrow_back_ios</md-icon></a>
                <span v-if="!isEmptyObject(listCourses)">{{listCourses.meta.current_page}}/{{listCourses.meta.last_page}}</span>
                <a @click="fetchListCoursesByUrl(isEmptyObject(listCourses) ? null :listCourses.links.next)"><md-icon>arrow_forward_ios</md-icon></a>
            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from "vuex";
    import formCourses from '../Dialog/FormCourses';
    export default {
        name: "CoursesTable",
        components:{formCourses},
        computed:{
            ...mapGetters([
                'listCourses','isLoading'
            ])
        },
        mounted() {
            this.$store.dispatch('fetchListCourses');
        },
        data(){
            return {
                tableHeaderColor: {
                    type: String,
                    default: ""
                },
            }
        },
        methods:{
            deleteCourse(slug){
                if(confirm('Xác nhận xóa'))
                    this.$store.dispatch('deleteCourse',slug)
                        .then((res) => {
                            this.$toast.success('Xóa khóa học thành công');
                        })
                        .catch((err) => {
                            this.$toast.error('Xin thử lại');
                        });
            },
            fetchListCoursesByUrl(url){
                this.$store.dispatch('fetchListCoursesByUrl',url)
            }
        }
    }
</script>

<style lang="scss" scoped>
    .preview{
        width: 300px;
    }
</style>
