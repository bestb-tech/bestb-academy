<template>
    <div class="col col-lg-3 mb-4 khoahoc-item">
        <div class="h-100">
            <b-card
                no-body
                style="max-width: 20rem;"

                img-top
                class="h-100"
            >
                <template #header >
                    <a v-bind:href="pathIndex">
                        <img v-bind:src="item.pathImg" alt="" class="w-100">
                    </a>
                </template>
                <b-card-body >
                    <b-badge variant="primary">{{item.sell_price === null ? '0' : item.sell_price.toLocaleString()}} VND</b-badge>
                    <b-card-title >
                        <a v-bind:href="pathIndex" class="text-main-dark text-decoration-none text-active-yellow">{{item.name}}</a>
                    </b-card-title>
                    <div class="teach-info">
                        <img v-bind:src="item.teachers[0].pathAvatar" alt="" class="teacher-avata">
                        <span><a v-bind:href="pathTeacherIndex" class="text-grey text-decoration-none text-active-yellow">{{item.teachers[0].full_name}}</a>
                        </span>
                    </div>
                </b-card-body>
                <b-card-footer>
<!--                    <i class="fas fa-users"></i>-->
<!--                    {{item.countMembers}}-->
<!--                    <i class="far fa-comment-dots"></i>-->
<!--                    {{item.countComments}}-->
<!--                    rate:-->
<!--                    {{item.starRate}}-->
                    <a v-bind:href="item.google_form_url" class=" btn text-yellow text-decoration-none w-100 text-grey ">ĐĂNG KÍ NGAY</a>
                </b-card-footer>

            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        name: "KhoahocItem",
        props:['item'],
        computed:{
            pathIndex(){
                return '/courses/' + this.item.slug;
            },
            pathTeacherIndex(){
                return '/teachers/' + this.item.teachers[0].slug;
            }
        }
    }
</script>

<style scoped>

</style>
