<template>
    <div id="home-about-bestb" class="container pt-3">
        <div class="component-title">
            <h2 class="pt-5 pb-3">VỀ BESTB ACADEMY</h2>
            <p>Là đơn vị tiên phong xây dựng mô hình Quỹ đầu tư đổi mới sáng tạo Việt, BestB Capital mong muốn cung cấp cho cộng đồng những kiến thức về đầu tư doanh nghiệp. Từ những kiến thức này, những nhà đầu tư sẽ có những kế hoạch phân bổ vốn đầu tư chắc thắng hơn và các chủ doanh nghiệp cũng được trang bị những kiến thức để tiến hành huy động vốn chuyên nghiệp hiệu quả hơn</p>
        </div>
        <div class="row home-about-bestb-list pt-5">
            <AboutBestbItem v-for="(item,index) in items" :item="item" :key="index"></AboutBestbItem>
        </div>
    </div>
</template>

<script>
    import AboutBestbItem from "./AboutBestbItem";
    export default {
        name: "AboutBestb",
        components: {AboutBestbItem},
        data() {
            return {
                items:[
                    {
                        id:1,
                        icon:"/frontend/img/WEB ACADEMY-03.png",
                        title:"Khóa học offline",
                        content:"Khóa học Offline được tổ chức hàng tháng tại Hà Nội"
                    },
                    {
                        id:2,
                        icon:"/frontend/img/1-03.png",
                        title:"lộ trình bài bản ",
                        content:"Nội dung đào tạo được thiết kế trong 4 buổi CHUYÊN SÂU về phân tích tài chính, định giá doanh nghiệp và kiến thức về đầu tư"
                    },
                    {
                        id:3,
                        icon:"/frontend/img/2-03.png",
                        title:"Môi trường học tập",
                        content:"Môi trường học tập cởi mở, thân thiện: Lấy học viên là trung tâm, giảng viên là người hướng dẫn, dẫn dắt các hoạt động, đem lại cho học viên một môi trường học tập cũng như giao lưu, trau dồi, học hổi tốt nhất"
                    },

                ]
            }
        },
    }
</script>

<style scoped>

</style>
