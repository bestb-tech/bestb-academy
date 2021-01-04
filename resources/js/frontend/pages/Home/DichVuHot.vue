<template>
    <div id="home-dich-vu-hot" class="container pb-3">
        <div  class="row">
            <div class="col col-lg-4 col-12">
                <div class="title">
                    <h3>Video phổ biến</h3>
                    <div class="title-border-bottom w-25 pt-2 mb-3"></div>
                </div>
                <video-embed src="https://www.youtube.com/watch?v=LXb3EKWsInQ&ab_channel=Jacob%2BKatieSchwarz" class="mb-3"></video-embed>
                <video-embed src="https://www.youtube.com/watch?v=LXb3EKWsInQ&ab_channel=Jacob%2BKatieSchwarz"></video-embed>
            </div>
            <div class="col col-lg-4 col-12 khoa-hoc-hot">
                <div class="title">
                    <h3>Đăng ký nhiều</h3>
                    <div class="title-border-bottom w-25 pt-2 mb-3"></div>
                </div>
                <khoa-hoc-hot-item v-for="(item,index) in listNewestCourses" :item="item" :key="index"></khoa-hoc-hot-item>
            </div>
            <div class="col col-lg-4 col-12 cau-hoi-hot">
                <div class="title">
                    <h3>Câu hỏi thường gặp</h3>
                    <div class="title-border-bottom w-25 pt-2 mb-3"></div>
                </div>

                <div>
                    <div class="accordion" role="tablist">
                        <b-card no-body class="mb-1">
                            <b-card-header header-tag="header" class="p-1 m-0" role="tab">
                                <b-button block v-b-toggle.accordion-1 >Accordion 1</b-button>
                            </b-card-header>
                            <b-collapse id="accordion-1" visible accordion="my-accordion" role="tabpanel">
                                <b-card-body>
                                    <b-card-text>I start opened because <code>visible</code> is <code>true</code></b-card-text>
                                    <b-card-text>{{ text }}</b-card-text>
                                </b-card-body>
                            </b-collapse>
                        </b-card>

                        <b-card no-body class="mb-1">
                            <b-card-header header-tag="header" class="p-1 m-0" role="tab">
                                <b-button block v-b-toggle.accordion-2 >Accordion 2</b-button>
                            </b-card-header>
                            <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
                                <b-card-body>
                                    <b-card-text>{{ text }}</b-card-text>
                                </b-card-body>
                            </b-collapse>
                        </b-card>

                        <b-card no-body class="mb-1">
                            <b-card-header header-tag="header" class="p-1 m-0" role="tab">
                                <b-button block v-b-toggle.accordion-3 >Accordion 3</b-button>
                            </b-card-header>
                            <b-collapse id="accordion-3" accordion="my-accordion" role="tabpanel">
                                <b-card-body>
                                    <b-card-text>{{ text }}</b-card-text>
                                </b-card-body>
                            </b-collapse>
                        </b-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import KhoaHocHotItem from "./KhoaHocHotItem";
    import {mapGetters} from "vuex";
    export default {
        name: "DichVuHot",
        components: {KhoaHocHotItem},
        computed:{
            ...mapGetters([
                'listNewestCourses'
            ])
        },
        data(){
            return {
                items:[
                    {
                        name:"Khoá học Tone Việt Nam",
                        teacher:{
                            name:"Hồ Ngọc Nghĩa",
                            avata:"/frontend/img/avatar_user_1_1602649800-200x200.jpg"
                        },
                        price:100000,
                        img:"/frontend/img/DSC_5917-750x500.jpg",
                        countMembers:100,
                        countComments:50,
                        starRate:5,
                    },
                    {
                        name:"Khoá học Photoshop Online Master",
                        teacher:{
                            name:"Hồ Ngọc Nghĩa",
                            avata:"/frontend/img/avatar_user_1_1602649800-200x200.jpg"
                        },
                        price:200000,
                        img:"/frontend/img/104767313_1537169436461929_8642789464656569560_o-750x500.jpg",
                        countMembers:111,
                        countComments:51,
                        starRate:3,
                    },
                    {
                        name:"Khoá học Blend màu Hàn Quốc",
                        teacher:{
                            name:"Hồ Ngọc Nghĩa",
                            avata:"/frontend/img/avatar_user_1_1602649800-200x200.jpg"
                        },
                        price:19999999,
                        img:"/frontend/img/ZY3A0453_1-750x500.jpg",
                        countMembers:999,
                        countComments:50,
                        starRate:5,
                    },
                ],
                text:"Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry\n" +
                    "          richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor\n" +
                    "          brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon\n" +
                    "          tempor, sunt aliqua put a bird on it squid single-origin coffee nulla\n" +
                    "          assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore\n" +
                    "          wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher\n" +
                    "          vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic\n" +
                    "          synth nesciunt you probably haven't heard of them accusamus labore VHS."
            }
        }
    }
</script>

<style scoped>

</style>
