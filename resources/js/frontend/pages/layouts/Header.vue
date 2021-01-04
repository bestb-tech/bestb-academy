<template>
    <div class="vue-header">
        <div class=" info">
            <div class="container d-flex justify-content-center align-items-center  py-2">
                <span class="mr-auto"><a href="tel:0988953824" class="text-white text-active-yellow text-decoration-none">Mobile: 0988.953.824 (Ms Nhung)</a></span>
<!--                <div class="btn-group">-->
<!--                    <a href="" class="btn py-0">Dang ki</a>-->
<!--                    <a href="" class="btn py-0">Dang nhap</a>-->
<!--                </div>-->
            </div>


        </div>
        <div class=" menu">
            <b-navbar toggleable="lg" type="light"  class="container" variant="faded" >
                <b-navbar-brand href="/"><img src="/frontend/img/logo.png" alt=""></b-navbar-brand>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                    <!-- Right aligned nav items -->
                    <b-navbar-nav class="ml-auto">


                        <b-nav-item-dropdown
                            text="GIỚI THIỆU" left
                           >
                            <b-dropdown-item href="/introduction">VỀ BESTB</b-dropdown-item>
                        </b-nav-item-dropdown>

                        <b-nav-item-dropdown text="KHÓA HỌC" left>
                            <b-dropdown-item v-for="item in listCourseType" v-bind:href="genRouteCourseTypeShow(item.slug)">{{item.name}}</b-dropdown-item>

                        </b-nav-item-dropdown>
<!--                        <b-nav-item href="#">THƯ VIỆN</b-nav-item>-->
<!--                        <b-nav-item-dropdown text="BESTB SHARE" left>-->
<!--                            <b-dropdown-item href="#">STOCK 1...</b-dropdown-item>-->
<!--                            <b-dropdown-item href="#">STOCK 2...</b-dropdown-item>-->
<!--                            <b-dropdown-item href="#">STOCK 1...</b-dropdown-item>-->
<!--                        </b-nav-item-dropdown>-->


<!--                        <b-nav-item-dropdown text="BLOG" left>-->
<!--                            <b-dropdown-item href="#">STOCK 1...</b-dropdown-item>-->
<!--                            <b-dropdown-item href="#">STOCK 2...</b-dropdown-item>-->
<!--                            <b-dropdown-item href="#">STOCK 1...</b-dropdown-item>-->
<!--                        </b-nav-item-dropdown>-->
                        <b-nav-item href="/news">TIN TỨC</b-nav-item>
                        <b-nav-item href="/contact">LIÊN HỆ</b-nav-item>
                    </b-navbar-nav>
                </b-collapse>
            </b-navbar>

        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "vueHeader",
        mounted() {
            this.$store.dispatch('fetchListCourseTypes');
        },
        computed:{
            ...mapGetters([
                'listCourseType'
            ]),

        }
    }
</script>

<style scoped>

</style>
