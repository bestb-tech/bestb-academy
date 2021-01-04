let getter = {
    courseType:state => {
        return state.courseType
    },
    listCourseType:state => {
        return state.listCourseType
    },
    course:state => {
        return state.course
    },
    listCourses:state => {
        return state.listCourses
    },
    listNewestCourses:state => {
        return state.listNewestCourses
    },
    listTeacher:state => {
        return state.listTeacher;
    },
    teacher:state => {
        return state.teacher
    },
    listCourseByTeacher:state => {
        return state.listCourseByTeacher
    },
    listNews:state=>{
        return state.listNews
    },
    breadCrumb:state => {
        return state.breadCrumb
    },
    news:state => {
        return state.news
    }
}

export default getter
