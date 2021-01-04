<template>
    <div>
        <div v-if="isLoading">
            <div class="d-flex justify-content-center mb-3 h-100">
                <md-progress-spinner md-mode="indeterminate"></md-progress-spinner>
            </div>
        </div>
        <div v-else>
            <md-table v-model="isEmptyObject(listTeachers) ? [] :listTeachers.data" :table-header-color="tableHeaderColor">
                <md-table-row slot="md-table-row" slot-scope="{item}"  md-selectable="multiple" md-auto-select >
                    <md-table-cell md-label="">
                        <img v-bind:src="item.pathAvatar" alt="">
                    </md-table-cell>
                    <md-table-cell md-label="Tên">{{ item.full_name }}</md-table-cell>
                    <md-table-cell md-label="Email">{{ item.email }}</md-table-cell>
                    <md-table-cell md-label="Số điện thoại">{{ item.phone_number }}</md-table-cell>
                    <md-table-cell md-label="Ngày tạo">{{ item.created_at }}</md-table-cell>
                    <md-table-cell md-label="Actions">
                        <form-teacher :model="item" :action="'EDIT'" :key="item.slug"></form-teacher>
                        <md-button class="md-raised" @click="deleteTeacher(item.slug)">Xóa</md-button>
                    </md-table-cell>
                </md-table-row>
            </md-table>
            <div class="d-flex">
                <a @click="fetchTeacherByUrl(isEmptyObject(listTeachers) ? null :listTeachers.links.prev)" ><md-icon>arrow_back_ios</md-icon></a>
                <a @click="fetchTeacherByUrl(isEmptyObject(listTeachers) ? null :listTeachers.links.next)"><md-icon>arrow_forward_ios</md-icon></a>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";
    import formTeacher from '../Dialog/FormTeacher';
    import mixin from '../../mixins/genMixins';

    export default {
        name: "TeachersTable",
        components:{formTeacher},
        props: {
            tableHeaderColor: {
                type: String,
                default: ""
            },
        },
        computed:{
            ...mapGetters([
                'listTeachers','isLoading'
            ]),
        },
        mounted() {
            this.$store.dispatch('fetchListTeacher');
        },
        data(){
            return {
                selected: [],
            }
        },
        methods:{
            deleteTeacher(slug){
                if(confirm('Xac nhan xoa ?')){
                    this.$store.dispatch('deleteTeacher',slug)
                        .then(res=>{
                            this.$toast.success('Xoa giang vien thanh cong');
                        })
                        .catch(err => {
                            this.$toast.error(err)
                        })
                    ;
                }
            },
            fetchTeacherByUrl(url){
                if(url!== null && typeof url !== "undefined")
                    this.$store.dispatch('fetchListTeacherByUrl',url);
            }
        }
    }
</script>

<style lang="scss" scoped>
    .md-table-cell-container{
        img{
            width: 30px;
        }
    }

</style>
