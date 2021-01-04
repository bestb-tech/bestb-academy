let actions = {
    fetchCourses({commit}){
        return new Promise((resolve, reject) => {
            axios.get('/api/backend/courses')
            .then(res => {
                commit('FETCH_COURSES',res.data.data)
                resolve(res)
            }).catch(err => {
                console.log(err);
                reject(err);
            })
        })
    },
    fetchListCoursesByType({commit},courseTypeSlug){
        return new Promise((resolve, reject) => {
            axios.get('/api/backend/course-types/' + courseTypeSlug)
            .then(res => {
                commit('FETCH_COURSES',res.data.data.courses)
                resolve(res)
            }).catch(err => {
                console.log(err);
                reject(err);
            })
        })
    },
    fetchListCourseTypes({commit}){
        axios
            .get('/api/backend/course-types')
            .then(res => {
                commit('setListCourseType',res.data.data)
            }).catch(err => {
            console.log(err);
        })
    },
    fetchListNewestCourse({commit}){
        axios
            .get('/api/backend/courses/newest')
            .then(res => {
                commit('setListNewestCourses',res.data.data)
            }).catch(err => {
            console.log(err);
        })
    },
    fetchListTeacher({commit}){
        axios
            .get('/api/backend/teachers')
            .then(res => {
                commit('setListTeacher',res.data.data)
            }).catch(err => {
            console.log(err);
        })
    },
    fetchTeacher({commit},teacherSlug){
        return new Promise((resolve, reject) => {
            axios
                .get('/api/backend/teachers/' + teacherSlug)
                .then(res => {
                    commit('setTeacher',res.data.data)
                    resolve(res);
                }).catch(err => {
                    console.log(err);
                    reject(err);
            })
        })

    },
    fetchListCourseByTeacher({commit},teacherSlug){
        return new Promise((resolve, reject) => {
            axios.get('/api/backend/teachers/' + teacherSlug + '/courses')
                .then(res => {
                    console.log('fetchListCourseByTeacher:',res.data.data);
                    commit('setListCourseByTeacher',res.data.data)
                    resolve(res);
                }).catch(err => {
                    console.log(err);
                    reject(err);
            })
        })
    },
    fetchListNews({commit}){
        return new Promise(((resolve, reject) => {
            axios
                .get('/api/backend/news')
                .then(res => {
                    commit('setListNews',res.data.data)
                    resolve(res);
                }).catch(err => {
                    console.log(err);
                    reject(err);
            })
        }))
    },
    getCourseBySlug({commit},courseSlug){
        return new Promise((resolve, reject) => {
            axios.get('/api/backend/courses/' + courseSlug)
                .then(res => {
                    commit('setCourse',res.data.data)
                    resolve(res)
                }).catch(err => {
                    console.log(err);
                    reject(err)
            })
        })

    },
    getNewsBySlug({commit},slug){
        return new Promise((resolve, reject) => {
            axios.get('/api/backend/news/' + slug)
            .then(res => {
                commit('setNews',res.data.data)
                resolve(res);
            }).catch(err => {
                console.log(err);
                reject(err);
            })
        })
    },
    sendFormContact({commit},form){
        return new Promise((resolve, reject) => {
            axios
            .post('/api/frontend/contact_form',form,{
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
            }).then((res) => {
                resolve(res);
            })
            .catch((err) => {
                reject(err.response.data.errors);
                console.log('err:',err);
            })
        })
    }
}

export default actions
