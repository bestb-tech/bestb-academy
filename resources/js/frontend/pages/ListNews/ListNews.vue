<template>
    <div id="list-news" >
        <div class="position-relative  " style="height: 30vh">
            <div class=" course-name position-absolute  w-100">
                <div class="container text-uppercase">
                    <h2>TIN TỨC</h2>
                </div>
            </div>
            <div class="banner position-absolute w-100">

            </div>
        </div>
        <div class="container">
            <div class="row list-khoahoc" v-if="listNews.length > 0 && !isLoading">
                <NewsItem v-for="(item,index) in listNews" :item="item" :key="item.id"></NewsItem>
            </div>
            <div class="row list-khoahoc" v-else-if="isLoading">
                <div class="p-3 col-12 col-lg-3 new-item" v-for="item in 4">
                    <b-card
                        tag="article"
                        class="mb-lg-2 "
                    >
                        <template #header >
                            <b-skeleton-img card-img="left" width="100%" aspect="1:1" left> </b-skeleton-img>
                        </template>

                        <b-card-text>
                            <b-skeleton></b-skeleton> <br>
                            <span class="text-grey">
                        <b-skeleton></b-skeleton><br>
                        By:<b-skeleton></b-skeleton>
                    </span>
                        </b-card-text>
                    </b-card>
                </div>
            </div>
            <div v-else>
                <p>{{listNewsInfo}}</p>

            </div>
        </div>

    </div>
</template>

<script>
    import NewsItem from "../Home/NewsItem";
    import {mapGetters} from "vuex";

    export default {
        name: "ListNews",
        components:{NewsItem},
        computed:{
            ...mapGetters([
                'listNews'
            ]),
        },
        data(){
            return {
                listNewsInfo:'',
                isLoading:true,
            }
        },
        async mounted() {
            await this.$store.dispatch('fetchListNews')
            .then((res)=>{
                if(res.data.data.length === 0){
                    this.listNewsInfo = 'Hiện không có tin tức'
                }
            }).catch((err)=>{
                console.log('err:',err)
            }).finally(()=>{
                    this.isLoading = false;
                });
        }
    }
</script>

<style lang="scss" scoped>
    .card-header{
        padding: 0;
    }
</style>
