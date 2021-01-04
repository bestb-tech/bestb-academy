<template>
    <b-card no-body class="overflow-hidden pb-3" >
        <b-row no-gutters>
            <b-col cols="3">
                <b-card-img
                    v-bind:src="item.pathImg"
                    alt="Image"
                    class="rounded-0">
                </b-card-img>
            </b-col>
            <b-col cols="9">
                <b-card-body class="py-0">
                    <a class="m-0 text-yellow text-decoration-none" v-bind:href="'/courses/'+item.slug">{{item.name}}</a>
                    <p class="text-blue">{{item.sell_price === null ? '0': item.sell_price.toLocaleString()}} VND</p>
                </b-card-body>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
    export default {
        name: "KhoaHocHotItemFooter",
        props:['item']
    }
</script>

<style scoped>

</style>
