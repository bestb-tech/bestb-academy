export default {
    setCourseType(state,courseType){
        state.courseType = courseType;
    },
    setListCourseType(state,listCourseType){
        state.listCourseType = listCourseType;
    },
    setCourse(state,course){
        state.course = course;
    },
    setListCourses(state,listCourses){
        state.listCourses = listCourses;
    },
    setListNewestCourses(state,listNewestCourses){
        state.listNewestCourses = listNewestCourses;
    },
    setListTeacher(state,listTeacher){
        state.listTeacher = listTeacher;
    },
    setTeacher(state, teacher){
        state.teacher = teacher;
    },
    setListCourseByTeacher(state,listCourseByTeacher){
        state.listCourseByTeacher = listCourseByTeacher;
    },
    setListNews(state,listNews){
        state.listNews = listNews;
    },
    setNews(state,news){
        state.news = news;
    },
    FETCH_COURSES(state,listCourses){
        return state.listCourses = listCourses;
    },

}
