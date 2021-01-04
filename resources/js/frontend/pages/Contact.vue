<template>
    <div id="form-contact">
        <div id="banner">
            <img src="/frontend/img/banner-form-contact.jpg" alt="" class="w-100">
        </div>
        <div class="content container">
            <div class="content-title">
                <h3 class="text-center py-5">
                    TRỤ SỞ CHÍNH
                </h3>
                <b-row>
                    <b-col cols="12" lg="6">
                        <p class="title-contect-item "><b>Trụ sở chính</b></p>
<!--                        <img src="/frontend/img/banner-form-contact.jpg" alt="" class="w-100">-->
                        <div id="map_contact">
                            <div class="mapouter">
                                <div class="gmap_canvas mt-4">
                                    <iframe width="100%" height="300" id="gmap_canvas"
                                            src="https://maps.google.com/maps?q=bestb%20group&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                            frameborder="0"
                                            scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    <a href="https://www.whatismyip-address.com/nordvpn-coupon/"></a></div>
                            </div>
                        </div>
                    </b-col>
                    <b-col cols="12" lg="6">
                        <p class="title-contect-item"><b>Hỗ trợ</b></p>
                        <p>Hãy liên hệ với chúng tôi để có thể liên hệ trực tiếp với bạn</p>
                        <i class="fas fa-phone"></i>
                        0933 995 126 <br>
                        <i class="far fa-envelope"></i>
                        info@bestb.com.vn
                    </b-col>
                </b-row>
            </div>

            <div class="content-title">
                <h3 class="text-center py-5">
                    Gửi email cho chúng tôi
                </h3>
            </div>

            <b-form>
                <b-form-group
                    id="input-group-1"
                    label="Họ & tên:"
                    label-for="input-1"
                >
                    <p class="text-danger">{{error.name}}</p>
                    <b-form-input
                        id="input-1"
                        v-model="form.name"
                        type="text"
                        name="name"
                        required
                    ></b-form-input>
                </b-form-group>

                <b-form-group
                    id="input-group-2"
                    label="Email:"
                    label-for="input-2"
                >
                    <p class="text-danger">{{error.email}}</p>

                    <b-form-input
                        id="input-2"
                        v-model="form.email"
                        type="email"
                        name="email"
                        required
                    ></b-form-input>
                </b-form-group>

                <b-form-group
                    id="input-group-3"
                    label="Điện thoại:"
                    label-for="input-3"
                >
                    <p class="text-danger">{{error.phone}}</p>

                    <b-form-input
                        id="input-3"
                        v-model="form.phone"
                        type="text"
                        name="phone"
                        placeholder="Enter email"
                        required
                    ></b-form-input>
                </b-form-group>

                <b-form-group
                    id="input-group-4"
                    label="Tiêu đề email:"
                    label-for="input-4"
                >
                    <p class="text-danger">{{error.title}}</p>

                    <b-form-input
                        id="input-4"
                        v-model="form.title"
                        name="title"
                        type="text"
                        required
                    ></b-form-input>
                </b-form-group>

                <b-form-group
                    id="input-group-5"
                    label="Nội dung:"
                    label-for="input-5"
                >
                    <p class="text-danger">{{error.content}}</p>

                    <b-form-textarea
                        id="input-5"
                        v-model="form.content"
                        name="content"
                        rows="3"
                        max-rows="6"
                    ></b-form-textarea>
                </b-form-group>


                <b-button @click="onSubmit()" variant="danger">GỬI </b-button>
            </b-form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Contact",
        data(){
            return {
                form:{
                    name:'',
                    email:'',
                    phone:'',
                    title:'',
                    content:'',
                },
                error:{
                    name:'',
                    email:'',
                    phone:'',
                    title:'',
                    content:'',
                }
            }
        },
        methods:{
            onSubmit(){
                console.log('form submit');
                const formData = new FormData();
                for(var key in this.form){
                    formData.append(key,this.form[key]);
                }
                this.$store.dispatch('sendFormContact',formData)
                    .then((res)=>{
                        this.$toast.success('Gửi thông tin thành công! Bestb Academy sẽ liên hệ sớm với bạn.')
                    }).catch((err)=>{
                        let error = JSON.parse(JSON.stringify(err))
                        this.$toast.error('Xin thử lại');
                        console.log(error);
                        for(var key in this.error){
                            if(typeof error[key] !== 'undefined'){
                                this.error[key] = error[key][0];
                            }else{
                                this.error[key] = '';
                            }
                        }
                })
            }
        }
    }
</script>

<style scoped>

</style>
