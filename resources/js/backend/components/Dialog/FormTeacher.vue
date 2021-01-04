<template>

    <div>
        <md-dialog :md-active.sync="showDialog" >
            <md-dialog-title><h2>{{title}}</h2></md-dialog-title>
            <div class="md-layout">
                <div class="md-layout-item p-0">
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Tên đăng nhập</label>
                            <md-input v-model="teacher.user_name" type="text" ref="user_name"></md-input>
                        </md-field>
                        <p class="text-error">{{error.user_name}}</p>
                    </div>
                    <label>
                        <input type="text" hidden value="" name="id">
                    </label>
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Họ tên</label>
                            <md-input v-model="teacher.full_name" type="text" ref="full_name"></md-input>
                        </md-field>
                        <p class="text-error">{{error.full_name}}</p>
                    </div>
                    <div class="md-layout-item" v-if="isActionAdd">
                        <md-field class="m-0">
                            <label>Mật khẩu</label>
                            <md-input v-model="teacher.password" type="text" ref="password"></md-input>
                        </md-field>
                        <p class="text-error">{{error.password}}</p>
                    </div>
                </div>
                <div class="md-layout-item p-0">

                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Email</label>
                            <md-input v-model="teacher.email" type="email" ref="email"></md-input>
                        </md-field>
                        <p class="text-error">{{error.email}}</p>
                    </div>
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Số điện thoại</label>
                            <md-input v-model="teacher.phone_number" type="text" ref="phone_number"></md-input>
                        </md-field>
                        <p class="text-error">{{error.phone_number}}</p>

                    </div>
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label></label>
<!--                            <md-file v-model="teacher.avatar" placeholder="Ảnh đại diện" id="input_image_upload" @change="previewImage"/>-->
                            <input  type="file" id="input_image_upload" ref="avatar" @change="previewImage"/>
                        </md-field>
                    </div>
                    <div class="md-layout-item">
                        <img class="preview" :src="imageData"  alt="Teacher's avatar ">
                        <p class="text-error">{{error.avatar}}</p>
                    </div>
                </div>
            </div>


            <div class="md-layout-item bb-ckeditor">
                <md-field class="m-0">
                    <label>Mô tả giảng viên</label>
<!--                    <md-input v-model="description" type="text"></md-input>-->
                    <ckeditor v-model="teacher.description" :config="globalCKeditorConfig" ></ckeditor>
                </md-field>
                <p class="text-error">{{error.description}}</p>
            </div>
            <md-dialog-actions>
                <md-button class="md-primary" @click="submitTeacher()">Save</md-button>
                <md-button class="md-primary" @click="showDialog = false">Close</md-button>
            </md-dialog-actions>
        </md-dialog>
        <md-button class="md-primary" @click="showDialog = true">
            {{btnTitle}}
        </md-button>
    </div>
</template>

<script>
    import mixin from '../../mixins/genMixins';
    import globalCKeditorConfig from "../../globalCKeditorConfig";
    export default {
        name: "FormTeacher",
        props:[
            'model','action'
        ],
        data() {
            return {
                globalCKeditorConfig:globalCKeditorConfig,
                active: false,
                value: '',
                teacher:{
                    id:'',
                    user_name: '',
                    full_name: '',
                    password: '',
                    email: '',
                    phone_number: '',
                    avatar: '',
                    description: '',
                    slug:'',
                },
                error:{
                    id:'',
                    user_name: '',
                    full_name: '',
                    password: '',
                    email: '',
                    phone_number: '',
                    avatar: '',
                    description: '',
                    slug:'',
                },
                showDialog: false,
                imageData:'/storage/avatar/teachers/unnamed.png' ,
                isInputImage:false,
            }
        },
        computed:{
            title(){
                return (this.$props.action === 'ADD' ? 'THÊM GIẢNG VIÊN MỚI' : 'SỬA THÔNG TIN GIẢNG VIÊN')
            },
            btnTitle(){
                return  this.isActionAdd ? 'THÊM' : 'SỬA';
            },
            isEmptyModel(){
                return  mixin.methods.isEmptyObject(this.$props.model);
            },
            isActionAdd(){
                return this.$props.action === 'ADD'
            }
        },
        methods:{
            previewImage(event){
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.imageData = e.target.result;
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                this.teacher.avatar = event.target.files[0];
                this.isInputImage = true;
            },
            submitTeacher(){
                const formData = new FormData();
                for(var key in this.teacher){
                    if(key !== 'avatar' || (key === 'avatar' && this.isInputImage) ){
                        formData.append(key,this.teacher[key]);
                    }
                }
                if(this.isActionAdd){
                    this.$store.dispatch('createTeacher',formData)
                        .then((res) => {
                            this.$toast.success('Thêm giảng viên thành công');
                            this.showDialog = false;
                            this.clearInput();
                        })
                        .catch((err) => {
                            let error = JSON.parse(JSON.stringify(err))
                            this.$toast.error('Xin thử lại');
                            for(var key in this.error){
                                if(typeof error[key] !== 'undefined'){
                                    this.error[key] = error[key][0];
                                }else{
                                    this.error[key] = '';
                                }
                            }
                        });
                }else{
                    this.$store.dispatch('updateTeacher', {formData,slug:this.teacher.slug})
                        .then((res) => {
                            this.$toast.success('Sửa giảng viên thành công');
                            this.showDialog = false;
                        })
                        .catch((err) => {
                            let error = JSON.parse(JSON.stringify(err))
                            this.$toast.error('Xin thử lại');
                            for(var key in this.error){
                                if(typeof error[key] !== 'undefined'){
                                    this.error[key] = error[key][0];
                                }else{
                                    this.error[key] = '';
                                }
                            }
                        });
                }

            },
            clearInput(){
                for(var key in this.error){
                    this.teacher[key] = '';
                    this.error[key] = '';
                }
                this.imageData='/storage/avatar/teachers/unnamed.png';
            }
        },
        created() {
            if(!this.isActionAdd){
                this.teacher = this.$props.model;
                this.imageData = this.$props.model.pathAvatar;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .md-dialog-fullscreen{
        width: 80% !important;
        overflow: scroll;
    }
    .bb-ckeditor>div{
        display: block;
    }
    .bb-ckeditor{
        label{
            position:static;
        }
    }
    .bb-ckeditor>div>div{
        width: 100%;
    }
    .preview{
        width: 300px;
    }
</style>

