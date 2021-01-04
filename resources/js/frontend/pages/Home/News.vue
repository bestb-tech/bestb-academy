<template>
	<div id="home-news" class="container ">
        <div class="text-center title py-5">
            <h2>Tin Tức Bestb Academy </h2>
            <p class="text-grey">Chia sẻ kiến thức, tin tức, sự kiện Bestb Academy        </p>
            <div class="title-border-bottom w-25"></div>
        </div>

        <div class="row" v-if="!isEmptyObject(listNews)">
            <news-item v-for="item in listNews.slice(0,8)"  :item="item" ></news-item>
        </div>
        <div v-else>
            <p class="text-center">Hiện không có tin tức</p>
        </div>
    </div>
</template>

<script>
    import { Carousel} from 'vue-carousel';
    import NewsItem from "./NewsItem";
    import {mapGetters} from "vuex";
    export default {
        name: "News",
        components: {NewsItem,Carousel},
        computed:{
            ...mapGetters([
                'listNews'
            ])
        },
        mounted() {
            this.$store.dispatch('fetchListNews');
        }
    }
</script>

<style scoped>

</style>
