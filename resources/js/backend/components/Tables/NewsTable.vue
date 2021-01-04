<template>
    <div>
        <div v-if="isLoading">
            <div class="d-flex justify-content-center mb-3 h-100">
                <md-progress-spinner md-mode="indeterminate"></md-progress-spinner>
            </div>
        </div>
        <div v-else>
            <md-table v-model="isEmptyObject(listNews) ? [] : listNews.data" :table-header-color="tableHeaderColor">
                <md-table-row slot="md-table-row" slot-scope="{ item }"  md-selectable="multiple" md-auto-select >
                    <md-table-cell md-label="" class="img_table">
                        <img v-bind:src="item.path_thumbnail" alt="" class="admin-table-img">
                    </md-table-cell>
                    <md-table-cell md-label="Tên">{{ item.name }}</md-table-cell>
                    <md-table-cell md-label="Lượt xem">{{ item.view_count }}</md-table-cell>
                    <md-table-cell md-label="Ngày tạo">{{ item.diff_created_at }}</md-table-cell>
                    <md-table-cell md-label="Actions">
                        <form-news :model="item" :action="'EDIT'" :key="item.slug"></form-news>
                        <md-button class="md-raised" @click="deleteNews(item.slug)">Xóa</md-button>
                    </md-table-cell>
                </md-table-row>
            </md-table>
            <div class="d-flex">
                <a @click="fetchListNewsByUrl(isEmptyObject(listNews) ? null :listNews.links.prev)" ><md-icon>arrow_back_ios</md-icon></a>
                <a @click="fetchListNewsByUrl(isEmptyObject(listNews) ? null :listNews.links.next)"><md-icon>arrow_forward_ios</md-icon></a>
            </div>
        </div>
    </div>
</template>

<script>
    import formNews from '../../components/Dialog/FormNews';
    import {mapGetters} from "vuex";
    export default {
        name: "NewsTable",
        components:{formNews},
        data(){
            return {
                tableHeaderColor: {
                    type: String,
                    default: ""
                },
            }
        },
        computed:{
            ...mapGetters([
               'listNews','isLoading'
            ]),
        },
        mounted() {
            this.$store.dispatch('fetchListNews');
        },
        methods:{
            fetchListNewsByUrl(url){
                this.$store.dispatch('fetchListNewsByUrl',url);
            },
            deleteNews(slug){
                if(confirm('Xac nhan xoa ?')){
                    this.$store.dispatch('deleteNews',slug);
                    this.$toast.success('Xoa tin tức thành công');
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
