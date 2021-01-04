<template>
    <div>
        <vueHeader></vueHeader>
        <notifications></notifications>
        <routerContent></routerContent>
        <vueFooter></vueFooter>
    </div>
</template>

<script>
    import notifications from "./Notifications";
    import vueFooter from "./Footer";
    import vueHeader from "./Header";
    import routerContent from "./RouterContent";

    export default {
        components:{
            notifications,
            vueFooter,
            vueHeader,
            routerContent
        },
        name: "mainContent"
    }
</script>

<style scoped>

</style>
