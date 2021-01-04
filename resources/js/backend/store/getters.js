let getters = {
    users_admin: state => {
        return state.users_admin
    },
    listTeachers:state => {
        return state.listTeachers
    },
    listNews:state => {
        return state.listNews
    },
    currentUrl:state => {
        return state.currentUrl
    },
    listCourses:state=>{
        return state.listCourses
    },
    listCourseTypes:state=>{
        return state.listCourseTypes
    },
    listCourseTypesExtracted:state=>{
        return state.listCourseTypesExtracted
    },
    isLoading:state=>{
        return state.isLoading
    }
}

export default  getters
