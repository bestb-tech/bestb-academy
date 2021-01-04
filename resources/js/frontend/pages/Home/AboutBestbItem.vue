<template>
    <div class="col-lg-4 col">
        <div class="title">
            <img v-bind:src="item.icon" alt="" class="pb-2">
            <h3 class="text-center text-uppercase">{{item.title}}</h3>
            <div class="title-border-bottom w-25"></div>
        </div>
        <p class="text-justify text-grey text-gr pt-3 text-">{{item.content}}</p>
    </div>
</template>

<script>
    export default {
        name: "AboutBestbItem",
        props:['item'],
    }
</script>

<style scoped>

</style>
