<template>
    <div id="home-main" >
        <img src="/frontend/img/Untitled-1-01.jpg" alt="" class="w-100 home-banner" >
        <div class="bg-smoke">
            <about-bestb ></about-bestb>
        </div>
        <div>
            <khoahoc></khoahoc>
        </div>
        <div class="bg-smoke">
            <news></news>
        </div>
        <div>
<!--            <feed-back></feed-back>-->
<!--            <dich-vu-hot></dich-vu-hot>-->
        </div>
        <div class="bg-smoke">
            <div class="container pb-5">
                <div class="">
                    <h4 class="pt-5">Đăng ký nhận thông tin từ Bestb Academy</h4>
                    <p>Ưu đãi - Quà tặng khóa học Online, Offline tại Bestb Academy và các kiến thức về đầu tư doanh nghiệp. Đăng ký ngay!!!</p>
                </div>
            </div>
        </div>
        <div>
            <hinh-anh-hoc-vien></hinh-anh-hoc-vien>
        </div>
    </div>

</template>

<script>
    import AboutBestb from "./Home/AboutBestb";
    import Khoahoc from "./Home/Khoahoc";
    import News from "./Home/News";
    import FeedBack from "./Home/FeedBack";
    import DichVuHot from "./Home/DichVuHot";
    import HinhAnhHocVien from "./Home/HinhAnhHocVien";
    export default {
        name: "vueHome",
        components: {HinhAnhHocVien, DichVuHot, FeedBack, News, Khoahoc, AboutBestb},

    }
</script>

<style scoped>

</style>
