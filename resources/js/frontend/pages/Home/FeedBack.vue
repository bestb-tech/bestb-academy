<template>
    <div id="home-feed-back" class="container">
        <div class="text-center title py-5">
            <h2>FEEDBACK HỌC VIÊN SAU CÁC BUỔI HỌC </h2>
            <div class="title-border-bottom w-25"></div>
        </div>

        <carousel
            :per-page="3"
            :mouse-drag="true"
            :autoplay="true"
            :loop="true"
            :scroll-per-page="false"
            :autoplay-hover-pause="false"
            :navigation-enabled="true"
            :pagination-enabled="true"
            :slide-click="show_modal1"
        >
            <slide v-for="(item,index) in items" :key="index"  @slideclick="show_modal1" v-bind:data-src="item">
                <img v-bind:src="item" alt="" class="w-100 p-3" >
            </slide>

        </carousel>

        <b-modal id="modal-slide" size="xl">
            <img v-bind:src="modal_src" alt="" class="w-100">
        </b-modal>
    </div>
</template>

<script>
    import { Carousel} from 'vue-carousel';

    export default {
        name: "FeedBack",
        components:{Carousel},
        data(){
            return {
                items:[
                    '/frontend/img/120447517_23845925502530785_8953018893732007638_n.png.jpg',
                    "/frontend/img/120601236_1844069232407147_4455501995795112383_n.jpg",
                    "/frontend/img/120658158_1844069275740476_7163179918583105235_o.jpg",
                    "/frontend/img/120502613_1844069285740475_8777000651280857473_n.jpg",
                    "/frontend/img/120576460_1844069322407138_3089219734332737311_o.jpg"
                ]    ,
                modal_src:null,
            }
        },
        methods:{
            show_modal1(dataset){
                this.modal_src = dataset.src;
                this.$bvModal.show('modal-slide')
            }
        }
    }
</script>

<style scoped>

</style>
