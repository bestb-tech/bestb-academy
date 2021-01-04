let actions = {
    createUserAdmin({commit}, userAdmin) {
        axios
            .post('/api/users_admin', userAdmin)
            .then(res => {
                commit('CREATE_ADMIN_USER', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchUserAdmin({commit}) {
        axios
            .get('/api/users_admin')
            .then(res => {
                console.log(res.data.users)
                commit('FETCH_ADMIN_USERS', res.data.users)
            }).catch(err => {
                console.log(err)
            })
    },

    deleteUserAdmin({commit}, userAdmin) {
        axios
            .delete(`/api/posts/${userAdmin.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_ADMIN_USERS', userAdmin)
            }).catch(err => {
            console.log(err)
        })
    },

    //API for teacher
    fetchListTeacher({commit,state}){
        state.isLoading = true;
        axios
            .get('/api/backend/teachers')
            .then(res => {
                commit('FETCH_LIST_TEACHERS', res.data);
                commit('SET_CURRENT_URL','/api/backend/teachers');
                state.isLoading = false;
            }).catch(err => {
            console.log(err)
        })
    },
    fetchListTeacherByUrl({commit,state},url){
        axios
            .get(url)
            .then(res => {
                commit('FETCH_LIST_TEACHERS', res.data)
                commit('SET_CURRENT_URL',url);
            }).catch(err => {
            console.log(err)
        })
    },
    createTeacher({commit,dispatch},teacher){
        return new Promise((resolve,reject) => {
            axios
                .post('/api/backend/teachers',teacher,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                })
                .then(res => {
                    dispatch('fetchListTeacher');
                    resolve(res)
                }).catch((err) => {
                    reject(err.response.data.errors);
                    // console.log(err)
            })
        })
    },
    updateTeacher({dispatch,state},teacher){
        return new Promise((resolve,reject) => {
            axios
                .post('/api/backend/teachers/'+teacher.slug,teacher.formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    params:{
                        _method:'PUT'
                    }
                })
                .then(res => {
                    dispatch('fetchListTeacherByUrl',state.currentUrl);
                    resolve(res)
                }).catch((err) => {
                reject(err.response.data.errors);
                // console.log(err)
            })
        })
    },
    deleteTeacher({dispatch},slug){
        return new Promise((resolve,reject) => {
            axios
                .delete('/api/backend/teachers/'+slug)
                .then(res => {
                    dispatch('fetchListTeacher');
                    resolve(res)
                }).catch((err) => {
                reject(err.response.data.errors);
            })
        })
    },

    ///////////////////////////////////////////
    // GROUP ACTIONS FOR NEWS
    ///////////////////////////////////////////
    fetchListNewsByUrl({commit},url){
        axios
            .get(url)
            .then(res => {
                commit('FETCH_LIST_NEWS', res.data);
                commit('SET_CURRENT_URL',url);
            }).catch(err => {
            console.log('err:',err)
        })
    },
    fetchListNews({commit,state}){
        state.isLoading = true;
        return new Promise((resolve,reject) => {
            axios.get('/api/backend/news')
            .then(res => {
                commit('FETCH_LIST_NEWS', res.data);
                commit('SET_CURRENT_URL','/api/backend/news')
                resolve(res)
            }).catch(err => {
                console.log(err)
                reject(err.response.data.errors);
            }).finally(()=>{
                state.isLoading = false;
            })
        });

    },
    createNews({dispatch},news){
        return new Promise((resolve,reject) => {
            axios
                .post('/api/backend/news',news,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => {
                    dispatch('fetchListNews');
                    resolve(res)
                }).catch((err) => {
                reject(err.response.data.errors);
            })
        })

    },
    updateNews({dispatch,state},news){
        return new Promise((resolve,reject) => {
            axios
                .post('/api/backend/news/'+news.slug,news.formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    params:{
                        _method:"PUT"
                    }
                })
                .then(res => {
                    dispatch('fetchListNews',state.currentUrl);
                    resolve(res)
                }).catch((err) => {
                reject(err.response.data.errors);
            })
        })

    },
    deleteNews({dispatch,state},slug){
        return new Promise((resolve,reject) => {
            axios
                .delete('/api/backend/news/'+slug)
                .then(res => {
                    dispatch('fetchListNews',state.currentUrl);
                    resolve(res)
                }).catch((err) => {
                    console.log(err);
                    reject(err.response.data.errors);
            })
        })
    },
    ///////////////////////////////////////////
    // GROUP ACTIONS FOR COURSES
    ///////////////////////////////////////////
    fetchListCourses({commit,state}){
        state.isLoading = true;
        axios
            .get('/api/backend/courses')
            .then(res => {
                commit('SET_LIST_COURSES', res.data);
                commit('SET_CURRENT_URL','/api/backend/courses')
            }).catch(err => {
                console.log(err)
            }).finally(()=>{
                state.isLoading = false;
            })
    },

    fetchAllListCourseTypes({commit}){
        axios
            .get('/api/backend/course-types')
            .then(res => {
                commit('SET_LIST_COURSE_TYPES', res.data.data)
            }).catch(err => {
            console.log(err)
        })
    },

    fetchListCoursesByUrl({commit},url){
        axios
            .get(url)
            .then(res => {
                commit('SET_LIST_COURSES', res.data);
                commit('SET_CURRENT_URL',url)
            }).catch(err => {
            console.log(err)
        })
    },
    createCourse({dispatch},courses){
        return new Promise((resolve,reject) => {
            axios
                .post('/api/backend/courses',courses,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => {
                    dispatch('fetchListCourses');
                    resolve(res)
                }).catch((err) => {
                reject(err.response.data.errors);
            })
        })

    },
    updateCourse({dispatch,state,commit},courses){
        return new Promise((resolve,reject) => {
            axios
                .post('/api/backend/courses/'+courses.slug,courses.formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    params:{
                        _method:"PUT"
                    }
                })
                .then(res => {
                    // commit('UPDATE_COURSE', {slug:courses.slug, course:res.data.data});
                    dispatch('fetchListCoursesByUrl',state.currentUrl);
                    resolve(res)
                }).catch((err) => {
                    console.log("err",err);
                reject(err.response.data.errors);
            })
        })

    },
    deleteCourse({dispatch,state},slug){
        return new Promise((resolve,reject) => {
            axios
                .delete('/api/backend/courses/'+slug)
                .then(res => {
                    dispatch('fetchListCoursesByUrl',state.currentUrl);
                    resolve(res)
                }).catch((err) => {
                    console.log('err:',err);
                    reject(err.response.data.errors);
            })
        })
    },
    setIsLoading({commit},isLoading){
        commit("setIsLoading",isLoading);
    }
}

export default actions
