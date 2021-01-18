<template>
    <div id="home-hinhanh-hocvien" class="container">
        <div class="text-center title py-5">
            <h2>Hình ảnh học viên</h2>
            <div class="title-border-bottom w-25"></div>
        </div>
        <div class="flex-row d-flex">
            <div class="d-flex flex-column">
                <img v-for="(item,index) in items[0]" :key="index" v-bind:src="item" alt="" class="w-100 p-1" v-on:click="show_modal(item)" v-b-modal.modal-1>
            </div>
            <div class="d-flex flex-column">
                <img v-for="(item,index) in items[1]" :key="index" v-bind:src="item" alt="" class="w-100 p-1" v-on:click="show_modal(item)" v-b-modal.modal-1>
            </div>
            <div class="d-flex flex-column">
                <img v-for="(item,index) in items[2]" :key="index" v-bind:src="item" alt="" class="w-100 p-1" v-on:click="show_modal(item)" v-b-modal.modal-1>
            </div>
            <b-modal id="modal-1" size="xl">
                <img v-bind:src="modal_src" alt="" class="w-100">
            </b-modal>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HinhAnhHocVien",
        data(){
            return {
                items:[
                    [
                        "/frontend/img/a97625dae95e15004c4f.jpg",
                    ],
                    [
                        "/frontend/img/Untitled-1-03.jpg",
                    ],
                    [
                        "/frontend/img/Untitled-1-01.jpg",
                    ],
                ],
                modal_src:null,
            }
        },
        methods:{
            show_modal(src){
                console.log('here');
                this.modal_src = src;
            }
        }
    }
</script>

<style scoped>

</style>
