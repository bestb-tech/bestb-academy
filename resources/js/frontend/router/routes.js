
import mainContent from '../pages/layouts/MainContent';
import vueHome from '../pages/Home';
import listCourse from '../pages/ListCourse/ListCourses';
import courseShow from '../pages/CourseShow';
import teacherShow from '../pages/Teacher/TeacherShow';
import listNews from '../pages/ListNews/ListNews'
import NewsShow from '../pages/NewsShow';
import Introduction from "../pages/Introduction";
import Contact from "../pages/Contact";
const routes = [
    {
        path: '/',
        component: mainContent,
        children: [
            {
                path: "/",
                name: "home",
                component: vueHome
            },
            {
                path: "/introduction",
                name: "Introduction",
                component: Introduction
            },
            {
                path: "/course-types/:courseType",
                name: "CourseType",
                component: listCourse,
                props:true
            },
            {
                path:"/courses/:courseSlug",
                name:"CourseShow",
                component: courseShow
            },
            {
                path:"/teachers/:teacherSlug",
                name:"TeacherShow",
                component: teacherShow,
            },
            {
                path:"/news",
                name:"ListNewsShow",
                component: listNews,
            },
            {
                path:"/news/:slug",
                name:"NewsShow",
                component: NewsShow,
            },
            {
                path:"/contact",
                name:"Contact",
                component: Contact,
            }
        ]
    }
]

export default routes;
