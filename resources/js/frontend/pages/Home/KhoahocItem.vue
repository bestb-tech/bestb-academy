<template>
    <div class="col col-lg-3 mb-4">
        <div class="h-100">
            <b-card
                no-body
                style="max-width: 20rem;"
                class="h-100"
            >
                <a v-bind:href="'/courses/'+item.slug">
                    <b-card-img
                        v-bind:src="item.pathImg"
                    ></b-card-img>
                </a>
                <b-card-body >
                    <b-badge variant="primary">{{item.sell_price === null ? '0' :item.sell_price.toLocaleString()}} VND</b-badge>
                    <b-card-title><a v-bind:href="'/courses/'+item.slug" class="text-main-dark text-decoration-none d-inline-block text-active-yellow">{{item.name}}</a></b-card-title>
                    <div class="teach-info">
                        <img v-bind:src="item.teachers[0].pathAvatar" alt="" class="teacher-avata">
                        <a v-bind:href="'/teachers/'+item.teachers[0].slug" class="text-grey text-decoration-none d-inline-block text-active-yellow">{{item.teachers[0].full_name}}</a>

                    </div>
                </b-card-body>
                <b-card-footer>
<!--                    <i class="fas fa-users"></i>-->
<!--                    999-->
<!--                    <i class="far fa-comment-dots"></i>-->
<!--                    999-->
<!--                    rate:-->
<!--                    5-->
                    <a v-bind:href="item.google_form_url" class=" btn text-yellow text-decoration-none w-100 text-grey ">ĐĂNG KÍ NGAY</a>
                </b-card-footer>

            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        name: "KhoahocItem",
        props:['item']
    }
</script>

<style scoped>

</style>
