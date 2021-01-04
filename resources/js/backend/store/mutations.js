function transformListCourseType(dataIn, level,dataOut) {
    if(dataIn.length >0){
        dataIn.forEach(data => {
            data.name = "-----".repeat(level) + data.name;
            dataOut.push(data);
            if(data.course_type_children.length > 0) {
                transformListCourseType(data.course_type_children,level+1,dataOut);
            }
        });
    }
}



export default {
    setUser(state, user) {
        state.user = user;
    },
    CREATE_ADMIN_USER(state,users_admin){
        state.posts.unshift(users_admin)
    },
    FETCH_ADMIN_USERS(state,users_admin){
        return state.users_admin = users_admin
    },
    FETCH_LIST_TEACHERS(state,listTeachers){
        return state.listTeachers = listTeachers
    },
    ADD_LIST_TEACHER(state,teacher){
        state.listTeachers.push(teacher)
    },
    FETCH_LIST_NEWS(state,listNews){
        state.listNews = listNews
    },
    SET_CURRENT_URL(state,currentUrl){
        state.currentUrl = currentUrl
    },
    DELETE_ADMIN_USERS(state, users_admin) {
        let index = state.users_admin.findIndex(item => item.id === users_admin.id)
        state.users_admin.splice(index, 1)
    },
    SET_LIST_COURSES(state,listCourses){
        state.listCourses = listCourses
    },
    UPDATE_COURSE(state, {slug, course}){
        console.log("course",course);
        let index = state.listCourses.data.findIndex(item => item.slug === slug);
        state.listCourses.data[index] = course;
    },
    SET_LIST_COURSE_TYPES(state,listCourseTypes){
        state.listCourseTypes = listCourseTypes;
        let data = [];
        transformListCourseType(listCourseTypes,0,data);
        state.listCourseTypesExtracted = data;
    },
    setIsLoading(state,isLoading){
        state.isLoading = isLoading;
    }

}
