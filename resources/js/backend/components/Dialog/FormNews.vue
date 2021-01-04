<template>
    <div>
        <md-dialog :md-active.sync="showDialog" >
            <md-dialog-title><h2>{{title}}</h2></md-dialog-title>
            <label>
                <input type="text" hidden value="" name="id">
            </label>
            <div class="md-layout-item">
                <md-field class="m-0">
                    <label></label>
                    <input  type="file" id="input_image_upload" ref="avatar" @change="previewImage"/>
                </md-field>
            </div>
            <div class="md-layout-item">
                <img class="preview" :src="imageData"  alt="avata">
                <p class="text-error">{{error.thumbnail}}</p>
            </div>
            <div class="md-layout-item">
                <md-field class="m-0">
                    <label>Tiêu đề tin tức</label>
                    <md-input v-model="news.name" type="text" ref="user_name"></md-input>
                </md-field>
                <p class="text-error">{{error.name}}</p>
            </div>


            <div class="md-layout-item bb-ckeditor">
                <md-field class="m-0">
                    <label>Nội dung tin tức</label>
                    <!--                    <md-input v-model="description" type="text"></md-input>-->
                    <ckeditor v-model="news.content" :config="globalCKeditorConfig" ></ckeditor>
                </md-field>
                <p class="text-error">{{error.content}}</p>
            </div>
            <md-dialog-actions>
                <md-button class="md-primary" @click="submitNews()">Save</md-button>
                <md-button class="md-primary" @click="showDialog = false">Close</md-button>
            </md-dialog-actions>
        </md-dialog>
        <md-button class="md-primary" @click="showDialog = true">
            {{btnTitle}}
        </md-button>
    </div>
</template>

<script>
    import globalCKeditorConfig from "../../globalCKeditorConfig";
    import mixin from '../../mixins/genMixins';

    export default {
        name: "FormNews",
        props:[
            'model','action'
        ],
        data(){
            return {
                globalCKeditorConfig:globalCKeditorConfig,
                news:{
                    thumbnail: '',
                    content: '',
                    name:'',
                    slug:'',
                },
                error:{
                    thumbnail: '',
                    content: '',
                    name: '',
                    slug:''
                },
                imageData:'',
                showDialog:false,
                isInputImage:false,

            }
        },
        computed:{
            title(){
                return (this.$props.action === 'ADD' ? 'THÊM TIN TỨC MỚI' : 'SỬA TIN TỨC')
            },
            btnTitle(){
                return  this.isActionAdd ? 'THÊM' : 'SỬA';
            },
            isEmptyModel(){
                return  mixin.methods.isEmptyObject(this.$props.model);
            },
            isActionAdd(){
                return this.$props.action === 'ADD'
            },
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
                this.news.thumbnail = event.target.files[0];
                this.isInputImage = true;
            },
            submitNews(){
                const formData = new FormData();
                for(var key in this.news){
                    if(key !== 'thumbnail' || (key === 'thumbnail' && this.isInputImage)){
                        formData.append(key,this.news[key]);
                    }
                }
                if(this.isActionAdd){
                    this.$store.dispatch('createNews',formData)
                        .then((res) => {
                            this.$toast.success('Thêm tin tức thành công');
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

                    this.$store.dispatch('updateNews', {formData,slug:this.news.slug})
                        .then((res) => {
                            this.$toast.success('Sửa tin tức thành công');
                            this.showDialog = false;
                            this.clearInput();
                        })
                        .catch((err) => {
                            let error = JSON.parse(JSON.stringify(err))
                            console.log(err);
                            this.$toast.error('Xin thử lại' + err);
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
                    this.error[key] = '';
                    if(this.isActionAdd){
                        this.news[key] = '';
                    }
                }
            }
        },
        created() {
            if(this.isActionAdd){
                this.imageData = '/storage/news/thumb/unnews.jpg';
            }else{
                this.news = this.$props.model;
                this.imageData =  this.$props.model.path_thumbnail;
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
