<template>
	<div class="container" id="home-khoahoc" >
        <h2 class="py-4">Khóa học </h2>
        <div class="row list-khoahoc" v-if="!(listCourses.length===0)">
            <KhoahocItem v-for="item in listCourses.slice(0,8)" :item="item" ></KhoahocItem>
        </div>
        <div v-else>
            <p>Hiện không có khóa học ...</p>
        </div>
    </div>
</template>

<script>
    import KhoahocItem from './KhoahocItem'
    import {mapGetters} from "vuex";
    export default {
        name: "Khoahoc",
        components:{
            KhoahocItem
        },
        computed:{
            ...mapGetters([
                'listCourses'
            ])
        },
        mounted() {
            this.$store.dispatch('fetchCourses');
        }
    }
</script>

<style scoped>

</style>
