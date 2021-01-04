<template>
    <div  id="introduction-page">
        <div class="banner-intro">
            <div class="introduction-form-banner container " style="min-height: 60vh">
<!--                <b-form  class="ml-auto" >-->
<!--                    <b-form-group-->
<!--                        id="input-group-1"-->
<!--                        label="Họ tên:"-->
<!--                        label-for="input-1"-->
<!--                    >-->
<!--                        <b-form-input-->
<!--                            id="input-1"-->
<!--                            v-model="form.name"-->
<!--                            type="text"-->
<!--                            required-->
<!--                        ></b-form-input>-->
<!--                    </b-form-group>-->

<!--                    <b-form-group-->
<!--                        id="input-group-2"-->
<!--                        label="Email"-->
<!--                        label-for="input-2"-->
<!--                    >-->
<!--                        <b-form-input-->
<!--                            id="input-2"-->
<!--                            v-model="form.email"-->
<!--                            type="email"-->
<!--                            required-->
<!--                        ></b-form-input>-->
<!--                    </b-form-group>-->

<!--                    <b-form-group-->
<!--                        id="input-group-3"-->
<!--                        label="Số điện thoại"-->
<!--                        label-for="input-3"-->
<!--                    >-->
<!--                        <b-form-input-->
<!--                            id="input-3"-->
<!--                            v-model="form.phone"-->
<!--                            type="text"-->
<!--                            required-->
<!--                        ></b-form-input>-->
<!--                    </b-form-group>-->

<!--                    <b-button type="submit" variant="danger">LIÊN HỆ CHÚNG TÔI NGAY</b-button>-->
<!--                </b-form>-->

            </div>
        </div>

        <div class="pt-5 container">
            <div class="title"></div>
            <b-row>
                <b-col cols="12" lg="6">
                    <img src="/frontend/img/Untitled-1-01.jpg" alt="" class="w-100">
                </b-col>
                <b-col cols="12" lg="6">
                    <div class="p-3">
                        <div class="intro-content-title text-uppercase">
                            <h3><b>đơn vị tiên phong</b></h3>
                        </div>
                        <div class="intro-content-content">
                            Là đơn vị tiên phong xây dựng mô hình Quỹ đầu tư đổi mới sáng tạo Việt, BestB Capital mong muốn cung cấp cho cộng đồng những kiến thức về đầu tư doanh nghiệp. Từ những kiến thức này, những nhà đầu tư sẽ có những kế hoạch phân bổ vốn đầu tư chắc thắng hơn và các chủ doanh nghiệp cũng được trang bị những kiến thức để tiến hành huy động vốn chuyên nghiệp hiệu quả hơn.
                        </div>
                    </div>
                </b-col>
            </b-row>

            <b-row class="pt-5">
                <b-col cols="12" lg="6">
                    <div class="p-3">
                        <div class="intro-content-title text-uppercase">
                            <h3><b>Giá trị mang lại</b></h3>
                        </div>
                        <div class="intro-content-content">
                            -	Nắm rõ về cách thức đánh giá, đầu tư, theo dõi hoạt động doanh nghiệp<br>
                            -	Hiểu rõ các bước để trở thành Nhà đầu tư chuyên nghiệp<br>
                            -	Chia sẻ những kênh đầu tư uy tín, thông tin, kiến thức về tình hình thị trường đầu tư doanh nghiệp.
                        </div>
                    </div>
                </b-col>
                <b-col cols="12" lg="6">
                    <img src="/frontend/img/a97625dae95e15004c4f.jpg" alt="" class="w-100">
                </b-col>
            </b-row>

            <b-row class="pt-5">
                <b-col cols="12" lg="6">
                    <img src="/frontend/img/Untitled-1-03.jpg" alt="" class="w-100">
                </b-col>
                <b-col cols="12" lg="6">
                    <div class="p-3">
                        <div class="intro-content-title text-uppercase">
                            <h3><b>đối tượng học viên</b></h3>
                        </div>
                        <div class="intro-content-content">
                            -	Các nhà đầu tư cá nhân muốn đầu tư vào doanh nghiệp.<br/>
                            -	Chủ doanh nghiệp muốn hiểu về định giá doanh nghiệp và quá trình gọi vốn chuyên nghiệp.<br/>
                            -	Cán bộ phụ trách hỗ trợ các chương trình đổi mới sáng tạo và khởi nghiệp, khơi thông nguồn vốn cho doanh nghiệp.<br/>
                            -	Cấp quản lý các công ty, tập đoàn phụ trách về đầu tư doanh nghiệp.

                        </div>
                    </div>
                </b-col>

            </b-row>
        </div>

        <div class="pt-5 mt-lg-5 introduction-info">
            <div class="container text-center text-white">
                <b-row>
                    <b-col cols="4" lg="4" class="introduction-info-item">
                        <div class="p-lg-5">
                            <p class="border-circle  d-inline-block"><span >10+</span></p>
                            <h3>KHÓA HỌC</h3>
                        </div>
                    </b-col>
                    <b-col cols="4" lg="4" class="introduction-info-item">
                        <div class="p-lg-5">
                            <p class="border-circle  d-inline-block"><span> 200+</span></p>
                            <h3>SỐ LƯỢNG HỌC VIÊN</h3>
                        </div>
                    </b-col>
                    <b-col cols="4" lg="4" class="introduction-info-item">
                        <div class="p-lg-5">
                            <p class="border-circle  d-inline-block"><span>98%</span></p>
                            <h3>ĐỘ HÀI LÒNG</h3>
                        </div>
                    </b-col>
                </b-row>
            </div>
        </div>

        <div class="py-lg-5 introduction-teacher bg-smoke">
            <div class="container">
                <b-row>
                    <b-col cols="12" lg="6" v-for="item in listTeacher.slice(0,2)" :item="item" >
                        <b-card class="h-100">
                            <b-card-img  v-bind:src="item.pathAvatar"></b-card-img>
                            <b-card-text class="text-center">
                                <h3 class="text-uppercase pt-lg-3">{{item.full_name}}</h3>
                                <p v-html="item.description">
                                    {{item.description}}
                                </p>
                            </b-card-text>
                        </b-card>
                    </b-col>
                </b-row>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "Introduction",
        data(){
            return {
                form:{
                    name:null,
                    email:null,
                    phone:null,
                }
            }
        },
        computed:{
            ...mapGetters([
                'listTeacher'
            ])
        },
        mounted() {
            this.$store.dispatch('fetchListTeacher');
        }
    }
</script>

<style lang="scss" scoped>
    .row{
        img{
            max-height: 360px;
            object-fit: cover;
        }
    }
</style>
