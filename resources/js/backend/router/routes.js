import home from "../pages/home";
import users from "../pages/users";

import DashboardLayout from "../pages/Layout/DashboardLayout.vue";

import Dashboard from "../pages/Dashboard.vue";
// import UserProfile from "../pages/UserProfile.vue";
// import TableList from "../pages/TableList.vue";
// import Typography from "../pages/Typography.vue";
// import Icons from "../pages/Icons.vue";
// import Maps from "../pages/Maps.vue";
// import Notifications from "../pages/Notifications.vue";
// import UpgradeToPRO from "../pages/UpgradeToPRO.vue";
import Teachers from "../pages/Teachers";
import ManageUsers from "../pages/ManageUsers";
import News from "../pages/News";
import Courses from "../pages/Courses";

const routes = [
    {
        path: "/admin/",
        redirect:'/admin/home',
        component: DashboardLayout,
        children: [
            {
                path: "home",
                name: "home",
                component: Dashboard
            },
            {
                path: "teachers",
                // name: "Quản lí giảng viên",
                component: Teachers
            },
            {
                path: "news",
                // name: "Quản lí tin tức",
                component: News
            },
            {
                path: "courses",
                // name: "Quản lí khóa học",
                component: Courses
            },
        ]

    },
    {
        // will match anything starting with `/user-`
        path: '/admin/*',
        redirect: '/admin/home',
    }
    // {
    //     path:'/admin/home/',
    //     name:'home',
    //     component:home,
    //
    // },
    // {
    //     path:'/admin/users/',
    //     name:'users',
    //     component:users,
    // },
    //
    // {
    //     path: "/admin/dashboard",
    //     name: "Dashboard",
    //     component: Dashboard
    // },
    // {
    //     path: "/admin/user",
    //     name: "User Profile",
    //     component: UserProfile
    // },
    // {
    //     path: "/admin/table",
    //     name: "Table List",
    //     component: TableList
    // },
    // {
    //     path: "/admin/typography",
    //     name: "Typography",
    //     component: Typography
    // },
    // {
    //     path: "/admin/icons",
    //     name: "Icons",
    //     component: Icons
    // },
    // {
    //     path: "/admin/maps",
    //     name: "Maps",
    //     meta: {
    //         hideFooter: true
    //     },
    //     component: Maps
    // },
    // {
    //     path: "/admin/notifications",
    //     name: "Notifications",
    //     component: Notifications
    // },
    // {
    //     path: "/admin/upgrade",
    //     name: "Upgrade to PRO",
    //     component: UpgradeToPRO
    // }

]

export default routes;
