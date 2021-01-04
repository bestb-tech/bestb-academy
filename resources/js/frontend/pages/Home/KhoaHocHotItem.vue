<template>
    <b-card no-body class="overflow-hidden pt-3" >
        <b-row no-gutters>
            <b-col md="3">
                <b-card-img
                    v-bind:src="item.pathImg"
                    alt="Image"
                    class="rounded-0">
                </b-card-img>
            </b-col>
            <b-col md="9">
                <b-card-body >
                    <a class="m-0 text-active-yellow" >{{item.name}}</a>
                    <p class="text-blue">{{item.sell_price.toLocaleString()}} VND</p>
                    <div class="teach-info">
                        <img v-bind:src="item.teachers[0].pathAvatar" alt="" class="teacher-avata">
                        <span><a href="" class="text-grey text-decoration-none text-active-yellow">{{item.teachers[0].full_name}}</a>
                        </span>
                    </div>
                </b-card-body>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
    export default {
        name: "KhoaHocHotItem",
        props:['item']
    }
</script>

<style scoped>

</style>
