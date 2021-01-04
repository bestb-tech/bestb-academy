<template>
    <div>
        <md-dialog :md-active.sync="showDialog" >
            <md-dialog-title><h2>{{title}}</h2></md-dialog-title>
            <div class="md-layout">
                <div class="md-layout-item p-0">
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Tên khóa học</label>
                            <md-input v-model="courses.name" type="text" ref="name"></md-input>
                        </md-field>
                        <p class="text-error">{{error.name}}</p>
                    </div>
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Loại khóa học</label>
                            <md-select v-model="courses.course_type_id" name="course_type_id" id="course_type_id" md-dense >
                                <md-option v-bind:value="item.id" v-for="item in listCourseTypesExtracted">{{item.name}}</md-option>
                            </md-select>

                        </md-field>
                        <p class="text-error">{{error.course_type_id}}</p>
                    </div>

<!--                    ///////////////////////////-->
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Giảng viên</label>
                            <md-select v-model="courses.teacher_id" name="teacher_id" id="teacher_id" md-dense >
                                <md-option v-bind:value="item.id" v-for="item in listTeachers.data">{{item.full_name}}</md-option>
                            </md-select>

                        </md-field>
                        <p class="text-error">{{error.teacher_id}}</p>
                    </div>


                    <div class="md-layout-item" >
                        <md-field class="m-0">
                            <label>Trạng thái</label>
                            <md-select v-model="courses.status" name="status" id="status" md-dense >
                                <md-option v-bind:value="1" >Đang học</md-option>
                                <md-option v-bind:value="2" >Mở đăng kí</md-option>
                                <md-option v-bind:value="3" >Lớp đầy</md-option>
                            </md-select>
                        </md-field>
                        <p class="text-error">{{error.status}}</p>
                    </div>
                    <div class="md-layout-item">
                        <md-field class="m-0 md-focused">
                            <label>Ngày bắt đầu</label>
                            <md-input v-model="courses.release_at" type="date" ref="release_at"></md-input>
                        </md-field>
                        <p class="text-error">{{error.release_at}}</p>
                    </div>
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Điểm yêu cầu</label>
                            <md-input v-model="courses.pass_point" type="number" ref="pass_point"></md-input>
                        </md-field>
                        <p class="text-error">{{error.pass_point}}</p>
                    </div>
<!--                    ////////////////////////////-->



                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <p>Ảnh khóa học</p>
                            <input  type="file" id="input_image_upload1" ref="avatar" @change="previewImage('pathImg',$event)"/>
                        </md-field>
                    </div>
                    <div class="md-layout-item">
                        <img class="preview" :src="pathImg"  alt="Ảnh khóa học">
                        <p class="text-error">{{error.img}}</p>
                    </div>
                </div>
                <div class="md-layout-item p-0">

                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Giá gốc</label>
                            <md-input v-model="courses.base_price" type="text" ref="base_price"></md-input>
                        </md-field>
                        <p class="text-error">{{error.base_price}}</p>
                    </div>
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Giá bán</label>
                            <md-input v-model="courses.sell_price" type="text" ref="sell_price"></md-input>
                        </md-field>
                        <p class="text-error">{{error.sell_price}}</p>
                    </div>
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Google form</label>
                            <md-input v-model="courses.google_form_url" type="text" ref="google_form_url"></md-input>
                        </md-field>
                        <p class="text-error">{{error.google_form_url}}</p>

                    </div>
                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Google sheet</label>
                            <md-input v-model="courses.google_sheet_url" type="text" ref="google_sheet_url"></md-input>
                        </md-field>
                        <p class="text-error">{{error.google_sheet_url}}</p>

                    </div>

                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <label>Tên giấy chứng nhận</label>
                            <md-input v-model="courses.certificate_name" type="text" ref="certificate_name"></md-input>
                        </md-field>
                        <p class="text-error">{{error.certificate_name}}</p>

                    </div>

                    <div class="md-layout-item">
                        <md-field class="m-0">
                            <p>Ảnh bằng cấp</p>
                            <input  type="file" id="input_image_upload" ref="avatar" @change="previewImage('certificate_img_url',$event)"/>
                        </md-field>
                    </div>
                    <div class="md-layout-item">
                        <img class="preview" :src="certificate_img_url"  alt="certificate_img_url">
                        <p class="text-error">{{error.certificate_img_url}}</p>
                    </div>
                </div>
            </div>


            <div class="md-layout-item bb-ckeditor">
                <md-field class="m-0">
                    <label>Mô tả khóa học</label>
                    <!--                    <md-input v-model="description" type="text"></md-input>-->
                    <ckeditor v-model="courses.description" :config="globalCKeditorConfig" ></ckeditor>
                </md-field>
                <p class="text-error">{{error.description}}</p>
            </div>

            <div class="md-layout-item">
                <md-field class="m-0">
                    <label>Mô tả ngắn</label>
                    <md-input v-model="courses.short_description" type="text" ref="short_description"></md-input>
                </md-field>
                <p class="text-error">{{error.short_description}}</p>
            </div>
            <md-dialog-actions>
                <md-button class="md-primary" @click="submitCourse()">Save</md-button>
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
    import mixin from "../../mixins/genMixins";
    import {mapGetters} from "vuex";
    export default {
        name: "FormCourses",
        props:[
            'model','action'
        ],
        data(){
            return {
                globalCKeditorConfig:globalCKeditorConfig,
                courses:{
                    name: '',
                    course_type_id: '',
                    description: '',
                    short_description: '',
                    base_price: '',
                    sell_price: '',
                    google_form_url: '',
                    google_sheet_url: '',
                    certificate_name: '',
                    pass_point: '',
                    release_at: '',
                    status: '',
                    teachers: '',
                    img:'',
                    certificate_img_url:'',
                    pathImg:'',
                    teacher_id:'',
                    slug:'',
                },
                error:{
                    name: '',
                    course_type_id: '',
                    description: '',
                    short_description: '',
                    base_price: '',
                    sell_price: '',
                    google_form_url: '',
                    google_sheet_url: '',
                    certificate_name: '',
                    certificate_img_url: '',
                    pass_point: '',
                    release_at: '',
                    status: '',
                    teachers: '',
                    img:'',
                    teacher_id:'',
                    slug:''
                },
                pathImg:'',
                certificate_img_url:'',
                showDialog:false,
                isInputImageCertificate:false,
                isInputImage:false,
                arrayItem:[]

            }
        },
        created() {
            if(this.isActionAdd){
                this.pathImg = '/storage/undentified_image.png';
                this.certificate_img_url = '/storage/undentified_image.png';
            }else{
                this.courses = this.$props.model;
                this.pathImg = this.$props.model.pathImg;
                this.certificate_img_url = this.$props.model.path_certificate_img;
                this.courses['release_at'] = mixin.methods.formatShortDate(this.$props.model.release_at);
                this.courses['teacher_id'] = this.$props.model.teachers[0].id;
            }
        },
        computed:{
            ...mapGetters([
                'listCourseTypesExtracted','listCourseTypes','listTeachers'
            ]),
            title(){
                return (this.$props.action === 'ADD' ? 'THÊM KHÓA HỌC MỚI' : 'SỬA KHÓA HỌC')
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
            previewImage(id,event){
                const input = event.target;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        if(id === 'pathImg'){
                            this.pathImg = e.target.result;
                            this.isInputImage = true;
                        }else{
                            this.certificate_img_url = e.target.result;
                            this.isInputImageCertificate = true;
                        }
                    }
                    reader.readAsDataURL(input.files[0]);
                }
                if(id === 'pathImg'){
                    this.courses.img = event.target.files[0];
                }else{
                    this.courses.certificate_img_url = event.target.files[0];
                }
                // this.news.thumbnail = event.target.files[0];
            },
            submitCourse(){
                const formData = new FormData();
                for(var key in this.courses){
                    if(
                        ((key !== 'certificate_img_url' && key !== 'img')  ||
                         (key === 'certificate_img_url' && this.isInputImageCertificate) ||
                         (key === 'img' && this.isInputImage)
                        )&&
                        this.courses[key] !== null
                    ){
                        formData.append(key,this.courses[key]);
                    }

                }
                if(this.isActionAdd){
                    this.$store.dispatch('createCourse',formData)
                        .then((res) => {
                            this.$toast.success('Thêm khóa học thành công');
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
                    this.$store.dispatch('updateCourse', {formData,slug:this.courses.slug})
                        .then((res) => {
                            this.$toast.success('Sửa khóa học thành công');
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


            transformListCourseType(dataSource,level){
                if(dataSource.length >0){
                    dataSource.forEach(data => {
                        data.name = "-----".repeat(level) + data.name;
                        this.arrayItem.push(data);
                        if(data.course_type_children.length > 0) {
                            this.transformListCourseType(data.course_type_children,level+1);
                        }
                    });
                }
            },

            clearInput(){
                for(var key in this.courses){
                    this.courses[key] = '';
                    this.error[key] = '';
                }


                this.pathImg = '/storage/undentified_image.png';
                this.certificate_img_url = '/storage/undentified_image.png';
            }

        },

    }
</script>

<style lang="scss" scoped>
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
</style>
