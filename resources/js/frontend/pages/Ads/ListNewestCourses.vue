<template>
    <div class="ads-newest-course mt-5">
        <h3 class="text-uppercase ">KHÓA HỌC GẦN ĐÂY</h3>
        <div class="ads-border-title">
            <div></div>
        </div>
        <div v-if="listNewestCourses.length > 0">
            <b-card no-body class="overflow-hidden border-0 pt-3" v-for="item in listNewestCourses">
                <b-row no-gutters>
                    <b-col cols="3" class="card-img-course">
                        <a v-bind:href="genRouteCourseShow(item.slug)">
                            <b-card-img
                                v-bind:src="item.pathImg"
                                alt="Image"
                                class="rounded-0"
                            >
                            </b-card-img>
                        </a>
                    </b-col>
                    <b-col cols="9">
                        <b-card-body class="py-0">
                            <p class="m-0 "><a class="text-active-yellow text-decoration-none" v-bind:href="genRouteCourseShow(item.slug)">{{item.name}}</a></p>
                            <p class="text-blue">{{item.sell_price === null ? '0' : item.sell_price.toLocaleString()}} VND</p>
                        </b-card-body>
                    </b-col>
                </b-row>
            </b-card>
        </div >
        <div v-else>
            <b-card no-body class="overflow-hidden border-0 pt-3" v-for="item in 3">
                <b-row no-gutters>
                    <b-col cols="3" class="card-img-course">
                        <b-skeleton-img aspect="1:1"></b-skeleton-img>
                    </b-col>
                    <b-col cols="9">
                        <b-card-body class="py-0">
                            <p class="m-0 "><a class="text-active-yellow text-decoration-none" v-bind:href="genRouteCourseShow(item.slug)"><b-skeleton></b-skeleton></a></p>
                            <p class="text-blue"><b-skeleton></b-skeleton></p>
                        </b-card-body>
                    </b-col>
                </b-row>
            </b-card>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";
    import '../../mixins/genMixins';
    export default {
        name: "ListNewestCourses",
        computed:{
            ...mapGetters([
                'listNewestCourses'
            ]),
        },
        mounted(){
            this.$store.dispatch('fetchListNewestCourse');
        }
    }
</script>

<style lang="scss" scoped>
    .ads-newest-course{
        .card-img-course{
            overflow: hidden;
            img{
                transition: transform .3s;
            }
            img:hover{
                transform: scale(1.2);
            }
        }
    }
</style>
