<template >
        <div class="bg-main-dark text-grey mt-3" id="footer">
            <b-container class="info pb-3">
                <b-row cols="1" cols-lg="4">
                    <b-col>
                        <img src="/frontend/img/logo.png" alt="" class="w-100">
                        <p>Chương trình đào tạo được xây dựng dựa trên những kiến thức và kinh nghiệm nhiều năm làm việc tại Quỹ đầu tư nước ngoài cùng nhiều năm hoạt động Vườn ươm doanh nghiệp, Quỹ đầu tư của chuyên gia đến từ Quỹ. Đồng thời cũng luôn bám sát vào quy định của Pháp luật hiện hành.
                        </p>
                    </b-col>
                    <b-col>
                        <div class="footer-title">
                            LIÊN HỆ
                            <div class="title-border-bottom w-100"></div>
                        </div>
                        <div>
                            <i class="fas fa-map-marker-alt text-yellow"></i>
                            <span class="text-white"> Địa chỉ:</span>
                            <span>
                            + Hà Nội: Tầng 6, 271 Quan Hoa, Cầu Giấy, Hà Nội <br>
                        </span>
                            <i class="fas fa-phone-square text-yellow"></i>
                            <span class="text-white"> Điện thoại:</span>
                            <span>
                                <a href="tel:+84834532398" class="text-grey text-active-yellow text-decoration-none">(+84) 83.453.2398</a>
                            <br>
                        </span>
                            <i class="fas fa-envelope text-yellow"></i>
                            <span class="text-white"> Email:</span>
                            <span>
                             bestb.academy@bestb.com.vn
                        </span>

                        </div>
                    </b-col>
                    <b-col>
                        <div class="footer-title">
                            KHÓA HỌC PHỔ BIẾN
                            <div class="title-border-bottom w-100"></div>
                        </div>
                        <khoa-hoc-hot-item-footer v-for="(item,index) in listNewestCourses" :item="item" :key="index"></khoa-hoc-hot-item-footer>
                    </b-col>
                    <b-col>
                        <div class="footer-title">
                            KẾT NỐI VỚI CHÚNG TÔI
                            <div class="title-border-bottom w-100"></div>
                        </div>
                        <div class="footer-social">
                            <a href="" class="btn p-0 text-white"><i class="fab fa-facebook-square  "></i></a>
                            <a href="" class="btn p-0 text-white"><i class="fab fa-youtube-square  "></i></a>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
            <div class="striker"></div>
            <b-container class="py-3">
                <span>Bestb Academy - Cung cấp cho cộng đồng những kiến thức về đầu tư doanh nghiệp</span>
                <a  v-on:click="scrollToTop" class="text-decoration-none text-active-yellow scrollTopBtn text-yellow"><i class="fas fa-caret-square-up"></i></a>
            </b-container>
        </div>
</template>

<script>
    import KhoaHocHotItemFooter from "../Home/KhoaHocHotItemFooter";
    import {mapGetters} from "vuex";
    export default {
        name: "vueFooter",
        components: {KhoaHocHotItemFooter},
        computed:{
            ...mapGetters([
                'listNewestCourses'
            ])
        },
        data(){
            return {
            }
        },
        methods:{
            scrollToTop:function(){
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        },
        mounted() {
            this.$store.dispatch('fetchListNewestCourse');
        }
    }
</script>

<style scoped>
    .scrollTopBtn{
        font-size: 3rem;
        position: fixed;
        bottom: 3rem;
        right: 3rem;
    }
</style>
