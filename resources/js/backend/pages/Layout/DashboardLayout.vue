<template>
    <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
        <notifications></notifications>

        <side-bar
            :sidebar-item-color="sidebarBackground"
            :sidebar-background-image="sidebarBackgroundImage"
        >
            <mobile-menu slot="content"></mobile-menu>
            <sidebar-link to="/admin/teachers">
                <md-icon>supervisor_account</md-icon>
                <p>Quản lí giảng viên</p>
            </sidebar-link>
            <sidebar-link to="/admin/news">
                <md-icon>wysiwyg</md-icon>
                <p>Quản lí tin tức</p>
            </sidebar-link>

            <sidebar-link to="/admin/courses">
                <md-icon>library_books</md-icon>
                <p>Quản lí khóa học</p>
            </sidebar-link>
<!--            <sidebar-link to="/admin/logout" class="active-pro" v-on:click="window.location.href = '/admin/logout'">-->
<!--                <md-icon>wysiwyg</md-icon>-->
<!--                <p>Đăng xuất</p>-->
<!--            </sidebar-link>-->
        </side-bar>

        <div class="main-panel">
            <top-navbar></top-navbar>

            <fixed-plugin
                :color.sync="sidebarBackground"
                :image.sync="sidebarBackgroundImage"
            >
            </fixed-plugin>

            <dashboard-content></dashboard-content>

            <content-footer v-if="!$route.meta.hideFooter"></content-footer>
        </div>
    </div>
</template>

<script>
    import TopNavbar from "./TopNavbar.vue";
    import ContentFooter from "./ContentFooter.vue";
    import DashboardContent from "./Content.vue";
    import MobileMenu from "../../pages/Layout/MobileMenu.vue";
    import FixedPlugin from "./Extra/FixedPlugin.vue";

    export default {
        components: {
            TopNavbar,
            DashboardContent,
            ContentFooter,
            MobileMenu,
            FixedPlugin
        },
        data() {
            return {
                sidebarBackground: "green",
                sidebarBackgroundImage: require("../../assets/img/sidebar-2.jpg")
            };
        }
    };
</script>
