export default {
    state:{
        alldata:[], // All data 
        editdata:[],// Get Edit data
        allQualification:[],//get all advertisment 
        allRecruiter:[], //get all Recruiter 
        allJobtype:[], //get all Jobtype 
        allDesignation:[], //get all Designation
        allLocation:[], //get all Designation
        allOrganisations:[], //get all Designation
        allFee:[],
        category:[],
        profile:[],
        bloodgroup:[],
        allPost:[],
        jobshift:[],
        state:[],
        allApplied:[],
        reports:[],
        allCity:[],

       
    },
    getters:{
        //get all data
        getAllData(state){
            return state.alldata
        },
        //get edit data
        getEditData(state){
            return state.editdata
        },
        //get edit data attachment
         //get edit data advertisement
        getAllQualification(state){
            return state.allQualification
        },
        //get edit data recruiter
        getAllRecruiter(state){
            return state.allRecruiter
        },
        //get edit data jobtype
        getAllJobtype(state){
            return state.allJobtype
        },
        //get edit data designation
        getAllDesignation(state){
            return state.allDesignation
        },
        //get edit data location
        getAllLocation(state){
            return state.allLocation
        },
        //get edit data fee
        getAllFee(state){
            return state.allFee
        },
        //get edit data Organisations
        getAllOrganisations(state){
            return state.allOrganisations
        },
        getAllPost(state){
            return state.allPost
        },
        getAllCategory(state){
            return state.category
        },
        getAllCity(state){
            return state.allCity
        },
        getAllBloodGroup(state){
            return state.bloodgroup
        },
        getAllJobshift(state){
            return state.jobshift
        },
        getAllProfile(state){
            return state.profile
        },
        getAllState(state){
            return state.state
        },
        getAllApplied(state){
            return state.allApplied
        }

    },
    actions:{
        //get all data
        getAllData(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('alldata',response.data.data)
                })
        },
        //get edit data
        getEditData(context,api){
            axios.get(api)
            .then((response)=>{
                context.commit('editdata',response.data.data)
            })
        },
        //get all data advertisement
        getAllQualification(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('allQualification',response.data.data)
                })
        },
        //get all data recruiter
        getAllRecruiter(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('allRecruiter',response.data.data)
                })
        },
        //get all data jobtype
        getAllJobtype(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('allJobtype',response.data.data)
                })
        },
        //get all data designation
        getAllDesignation(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('allDesignation',response.data.data)
                })
        },
        //get all data location
        getAllLocation(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('allLocation',response.data.data)
                })
        },
        //get all data fee
        getAllFee(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('allFee',response.data.data)
                })
        },
        //get all data Organisations
        getAllOrganisations(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('allOrganisations',response.data.data)
                })
        },
        getAllPost(context,api){
            axios.get(api)
                .then((response)=>{
                   context.commit('allPost',response.data.data)
                })
        },
        getAllCategory(context,api){
            axios.get(api)
                .then((response)=>{
                    context.commit('categoreis',response.data.data)
                })
        },
        getAllCity(context,api){
            axios.get(api)
                .then((response)=>{
                    context.commit('allCity',response.data.data)
                })
        },
        getAllProfile(context,api){
            axios.get(api)
                .then((response)=>{
                    context.commit('profile',response.data.data)
                })
        },
        getAllJobshift(context,api){
            axios.get(api)
                .then((response)=>{
                    context.commit('jobshift',response.data.data)
                })
        },
        getAllState(context,api){
            axios.get(api)
                .then((response)=>{
                    context.commit('state',response.data.data)
                })
        },
        getAllApplied(context,api){
            axios.get(api)
                .then((response)=>{
                    context.commit('allApplied',response.data.data)
                })
        },
        getAllBloodGroup(context,api){
            axios.get(api)
                .then((response)=>{
                    context.commit('bloodgroup',response.data.data)
                })
        },
        
        SearchPost(context,payload){
            axios.get('/search?s='+payload)
                .then((response)=>{
                    context.commit('getSearchPost',response.data.data)
                })

        },
        SearchOrganisation(context,payload){
            axios.get('/searchorgs?s='+payload)
                .then((response)=>{
                    context.commit('getSearchOrg',response.data.data)
                })

        },
        SearchClosingDate(context,payload){
            axios.get('/searchclosingdate?s='+payload)
                .then((response)=>{
                    context.commit('getSearchClosingDate',response.data.data)
                })

        },
        SearchReports(context,adv_id,position_id,opening_date,closing_date,payment_status){
            axios.get('/search-reports?adv_id='+adv_id+'&position_id='+position_id+
                '&opening_date='+opening_date+'&closing_date='+closing_date+
                '&payment_status='+payment_status)
                .then((response)=>{
                    context.commit('getSearchReports',response.data.data)
                })

        },

       /* getReports(){
                this.form.post('/get-reports')
                    .then((response)=>{
                      console.log(response.data.data);
                        this.$router.push('/reports-applicationlist')
                        this.reportlist = response.data.data;
                        
                    })
                   
            }*/
        
       
    },
    mutations:{
        //get all data
        alldata(state,data){
            return state.alldata = data
        },
        //get edit data
        editdata(state,payload){
            return state.editdata = payload
        },
         //get all data advertisment
        allQualification(state,data){
            return state.allQualification = data
        },
        //get all data recruiter
        allRecruiter(state,data){
            return state.allRecruiter = data
        },
        //get all data jobtype
        allJobtype(state,data){
            return state.allJobtype = data
        },
         //get all data Designation
        allDesignation(state,data){
            return state.allDesignation = data
        },
        //get all data location
        allLocation(state,data){
            return state.allLocation = data
        },
        //get all data fee
        allFee(state,data){
            return state.allFee = data
        },
        //get all data Organisations
        allOrganisations(state,data){
            return state.allOrganisations = data
        },
        allPost(state,data){
            return state.allPost = data
        },
        categoreis(state,data){
            return state.category = data
        },
        allCity(state,data){
            return state.allCity = data
        },
        profile(state,data){
            return state.profile = data
        },
        jobshift(state,data){
            return state.jobshift = data
        },
        state(state,data){
            return state.state = data
        },
         allApplied(state,data){
            return state.allApplied = data
        },
        bloodgroup(state,data){
            return state.bloodgroup = data
        },
        getSearchPost(state,payload){
            state.alldata = payload
        },
        getSearchOrg(state,payload){
            state.alldata = payload
        },
        getSearchClosingDate(state,payload){
            state.alldata = payload
        },
        
        getSearchReports(state,payload){
            state.alldata = payload
        },

    }
}