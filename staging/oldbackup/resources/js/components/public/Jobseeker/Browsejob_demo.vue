<template>
    <div id="browsejob">
        
        <jobseeker-header></jobseeker-header>
        
       
        
        <header class="masthead1 text-center text-white mt-5">

            <div class="masthead-content" id="form-container">
                <div class="container">
                       <form>
                    
                        <div class="col-sm-12 mt-5">
                            <button class="btn transparent"><i class="fa fa-file-invoice mr-2" aria-hidden="true"></i>Upload Your CV</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>

        </header>
        <section class="section pb-5">

            <div class="container">
                <div class="row">
                    <!-- filter widget start -->
                    <div class="col-sm-4">
                        <div class="card">

                            <div class="result-search-form-wrapper clearfix">

                                <h3 class="text-center">Keyword</h3>
                                <div class="inner">
                                    <form action="" method="GET">
                                        <div class="gap-10">
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="form-group form-icon-right mb-10">
                                                    <input name="q" type="text" id="txtgoingto"
                                                        placeholder="Search Keyword"
                                                        class="form-control mb-0 ui-autocomplete-input" autocomplete="off" v-model="search" />
                                                </div>
                                                <strong>{{ error }}</strong>
                                            </div>
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" class="rounded-0 btn btn-block btn-primary btn-icon w-100" v-if="loading">Loading...</button>
                                                <button @click.prevent="jobSearchByKeywords()" type="submit" class="rounded-0 btn btn-block btn-primary btn-icon w-100" v-else="">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="heading mt-2">
                            <span class="icon feather-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-filter">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                </svg>
                            </span>
                            Filter
                        </div>
                        <div class="card filter-card mt-0">
                            <div class="card-header" id="Div2">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapse1"
                                        aria-expanded="true" aria-controls="collapse1">
                                        Offered Salary
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="collapse1" class="collapse show" aria-labelledby="Div2">
                                <div class="card-body">
                                    <div class="filter-list">
                                        <ul class="list-unstyled mb-0" id="ulstar">

                                            <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="upto_3lac">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="upto_3lac" checked>
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 0 - 3 Lakhs<small>(791)</small>
                                                    </label> </div>
                                            </li>
                                            <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="3_6lac">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="3_6lac">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 3 - 6 Lakhs<small>(3891)</small>
                                                    </label> </div>
                                            </li>
                                            <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="6_9lac">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="6_9lac">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 6 - 9 Lakhs<small>(7912)</small>
                                                    </label> </div>
                                            </li>
                                           <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="9_12lac">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="9_12lac">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 9 - 12 Lakhs<small>(7912)</small>
                                                    </label>
                                                </div>
                                            </li>
                                             <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline" for="12_15lac">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="12_15lac">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 12 - 15 Lakhs<small>(7912)</small>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card filter-card">
                            <div class="card-header" id="Industry">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#Industry1"
                                        aria-controls="Industry1">
                                        Industry
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="Industry1" class="collapse" aria-labelledby="Industry">
                                <div class="card-body">
                                    <div class="filter-list">
                                        <ul class="list-unstyled mb-0" id="ulstar">

                                            <li class="list-item" v-for="industry in alldata" :key="industry.id">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="industry.id" name="industry.id">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> {{industry.category_name}}<small>({{industry.jobmanagers.length}})</small>
                                                    </label>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card filter-card">
                            <div class="card-header" id="Functinal">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#Functinal1"
                                        aria-controls="Functinal1">
                                        Functional Area
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="Functinal1" class="collapse" aria-labelledby="Functinal">
                                <div class="card-body">
                                    <div class="filter-list">
                                        <ul class="list-unstyled mb-0" id="ulstar">

                                            <li class="list-item" v-for="functional in allStates" :key="functional.id">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="functional.id" name="functional.id">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> {{functional.subcategory_name}}<small>({{functional.jobmanagers.length}})</small>
                                                    </label>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card filter-card">
                            <div class="card-header" id="Type">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#Type1"
                                        aria-controls="Type1">
                                        Job Type
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="Type1" class="collapse" aria-labelledby="Type">
                                <div class="card-body">
                                    <div class="filter-list">
                                        <ul class="list-unstyled mb-0" id="ulstar">

                                            <li class="list-item" v-for="jobtype in allDesignation" :key="jobtype.id">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="jobtype.id" name="jobtype.id">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> {{jobtype.job_type}}<small>({{jobtype.job_managers.length}})</small>
                                                    </label>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card filter-card">
                            <div class="card-header" id="exp">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#exp1"
                                        aria-controls="exp1">
                                        Experience
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="exp1" class="collapse" aria-labelledby="exp">
                                <div class="card-body">
                                    <div class="filter-list">
                                        <ul class="list-unstyled mb-0" id="ulstar">

                                            <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="fresher" name="fresher">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> Fresher<small>(79)</small>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="upto_1year" name="upto_1year">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> < 1 year<small>(79)</small>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="1-3year" name="1-3year">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 1-3 year<small>(79)</small>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="3-5year" name="3-5year">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 3-5 year<small>(79)</small>
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-item">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="5-7year" name="5-7year">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 5-7 year<small>(79)</small>
                                                    </label>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card filter-card">
                            <div class="card-header" id="Qualification">
                                <h5 class="mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#Qualification1"
                                        aria-controls="Qualification1">
                                        Qualification
                                        <i class="fa fa-angle-up"></i>
                                    </a>
                                </h5>
                            </div>

                            <div id="Qualification1" class="collapse" aria-labelledby="Qualification">
                                <div class="card-body">
                                    <div class="filter-list">
                                        <ul class="list-unstyled mb-0" id="ulstar">

                                            <li class="list-item" v-for="qualification in allRecruiter" :key="qualification.id">
                                                <div class="my-checkbox">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="qualification.id" name="qualification.id">
                                                        <span class="checkbox-icon"><i class="fa fa-square"
                                                                aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> {{qualification.qualification}}<small>({{qualification.jobmanagers.length}})</small>
                                                    </label>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- filter widget end -->


                    <!-- list start -->
                    <div v-if="loading"><h3 class="text-center">Please wait while we loading jobs.</h3></div>
                    <div class="col-sm-8" v-else="">
                        <div id="result" v-if="allIndustry.length >= 1">
                            <h4 class="fw-600 result-count">Showing <span>{{ allIndustry.length }}</span> Jobs</h4>
                            <div class="list-item-box hotel-item vacation-item" v-for="joblist in allIndustry" :key="joblist.id" >
                                <div class="list-item row mx-0">

                                    <div class="list-description col-sm-9">
                                        <div class="item-description">

                                            <h4 class="item-name fs-17 fw-500">
                                                <router-link :to="`/edit-viewjobs/${joblist.id}`">
                                                    <a href="#">{{joblist.title}} </a>
                                                </router-link>
                                            </h4>
                                            <p class="mb-2"><b>(At {{joblist.company_name}})</b></p>
                                            <div class="duration fs-13">
                                                <p><i class="fa fa-building mr-2 orange"
                                                        aria-hidden="true"></i>Industry: <b>{{joblist.category_name}}</b></p>
                                                <p><i class="fa fa-pencil-alt mr-2 orange" aria-hidden="true"></i>Skills:
                                                     
                                                    <span class="tag-item" >{{ joblist.job_skills | stringToSpanTag }}</span>
                                                     
                                                    </p>
                                                <p><i class="fa fa-flask mr-2 orange" aria-hidden="true"></i>Experience:
                                                    <span>{{joblist.main_exp}} - {{joblist.max_exp}}</span></p>
                                                <p><i class="fa fa-map-marker mr-2 orange"
                                                        aria-hidden="true"></i>Location: <span>{{joblist.job_exp}}</span></p>

                                            </div>


                                        </div>

                                    </div>
                                    <div class="list-price col-sm-3 light-gray1">
                                        <div class="mt-5">
                                            <a href="#" class="btn btn-primary border-orange text-white btn-block" @click.prevent="jobAlreadyApply()" v-if="jobsID.includes(joblist.id) == true" disabled>Already Applied</a>
                                            <a href="#" data-toggle="modal" :data-id="joblist.id" data-target=".mdupdate" @click="openmd(joblist.id)" class="btn btn-primary border-orange text-white btn-block" v-else="">Job Apply</a>
                                            
                                                <router-link :to="`/edit-viewjobs/${joblist.id}`">
                                                    <a href="#" class="btn border-orange btn-block">
                                                            View Job</a>
                                                 </router-link>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- list end -->
                </div>
            </div>

        </section>
         
        <main-footer></main-footer>
        <!-- The Modal Apply Job -->
        <div class="modal fade popupForm mdupdate" id="apply">
            <div class="modal-dialog">
                <div class="modal-content">
                 <form role="form" method="post" @submit.prevent="ApplyJob(demo.id)" enctype="multipart/form-data">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation before Apply??</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">


                       

                            
                            <div class="form-group row inputBox">
                                <div class="col-sm-12">

                                    <div class="input text">
                                        <p>Job Title :-  <strong>{{demo.title}}</strong></p>
                                     </div>

                                </div>

                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-12">

                                    <div class="input text">
                                        <p>Location :- <strong>{{demo.location}}</strong></p>
                                     </div>

                                </div>

                            </div>
                            <div class="form-group row inputBox">
                                <div class="col-sm-12">

                                    <div class="input text">
                                        <p>Company Name :- <strong>{{demo.company_name}}</strong></p>
                                     </div>

                                </div>

                            </div>
                           <fieldset class="pl-2 pr-2 mb-3">
                                <legend class="fs-15">
                                    <b>Do you have any of the relavant or Equivalent Qualification ? ({{demo.qualification}})</b>
                                </legend>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-12">


                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary1" name="r1" checked="">
                                                <label for="radioPrimary1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary2" name="r1">
                                                <label for="radioPrimary2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                            <fieldset class="pl-2 pr-2 mb-3">
                                <legend class="fs-15">
                                    <b>Do you have relavant experience of this job ?({{demo.min_exp}}Yr -{{demo.max_exp}}Yr)</b>
                                </legend>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-12">


                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary3" name="ex1" checked="">
                                                <label for="radioPrimary3">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio"id="radioPrimary4"  name="ex1">
                                                <label for="radioPrimary4">
                                                    No
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                            <fieldset class="pl-2 pr-2 mb-3">
                                <legend class="fs-15">
                                    <b>Do you have relavant skill for this job ?({{demo.job_skill}})</b>
                                </legend>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-12">


                                        <div class="form-group">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary5"  name="sk1" checked="">
                                                <label for="radioPrimary5">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary6" name="sk1">
                                                <label for="radioPrimary6">
                                                    No
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                            
                        


                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary">Confirm Apply</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Browsejob",
        data() {
            return {
                allIndustry: [],
                jobsID: [],
                search: '',
                error: '',
                loading: false,

                demo: new Form({
                  id: '',
                  title: '',
                  location: '',
                  qualification: '',
                  min_exp: '',
                  max_exp: '',
                  job_skill: '',
                  company_name:'',
              }),
                name1: '',
              mydata:[],
              
            }
        },

        mounted(){
          this.$store.dispatch('getAllData','/get-industries')
          this.$store.dispatch('getAllState','/get-functional-role')
          // this.$store.dispatch('getAllJobtype','/get-joblist')
          this.$store.dispatch('getAllRecruiter','/get-qualification')
          this.$store.dispatch('getAllDesignation','/get-job-type')
          this.$store.dispatch('getAllProfile','/userprofile')  
        },
        computed:{
            alldata(){
                return this.$store.getters.getAllData;
            },
            allStates(){
                return this.$store.getters.getAllState
            },
            // allIndustry(){
            //     return this.$store.getters.getAllJobtype;
            // },
            allRecruiter(){
                return this.$store.getters.getAllRecruiter
            },
            allDesignation(){
                return this.$store.getters.getAllDesignation
            },
            allProfile(){
                return this.$store.getters.getAllProfile
            }
        },
        methods: {
            openmd: function(id){
             axios.get('/get-applyjobdata/'+id).then(response => {
                     console.log(response.data[0].title);
                     //this.mydata=response.data;
                     //console.log(response.data.title);
                     this.demo.id = response.data[0].id;
                      this.demo.title = response.data[0].title;
                      this.demo.location = response.data[0].job_exp;
                      this.demo.qualification =response.data[0].qualification;
                      this.demo.min_exp =response.data[0].main_exp;
                      this.demo.max_exp =response.data[0].max_exp;
                      this.demo.job_skill =response.data[0].job_skills;
                      this.demo.company_name =response.data[0].company_name;

                    
                     
                  })
           },
           ApplyJob: function(id){
                this.demo.post('/apply-job/'+id).then((response)=>{
                        console.log(response);
                        this.$router.push('/browsejob')
                        window.location.reload();
                        toast({
                            type: 'success',
                            title: 'Job Apply Successfully'
                        })
                    })
                    .catch(()=>{

                    })

            },
            tags(tags){
                let tag_content  = '';
                if ( tags !== '') {
                    tags = tags.split(',');
                    tag_content = '';
                    for (let i = 0; i < tags.length; i++) {
                        tag_content += ' <span class="tags tag-item">' + tags[i] + '</span>' ;
                    }
                }
                return tag_content;
            },
            getJobs(kw,location,experience,jobtype) {

              this.loading = true;
              axios.get('jobs/search/'+kw+'/'+location+'/'+experience+'/'+jobtype).then(response => {
                        this.loading = false;
                        this.allIndustry = response.data.data;
                        console.log(response.data.data);
                    })
            },

            getAllJobs() {
                
              this.loading = true;
              axios.get('get-joblist').then(response => {
                  this.loading = false;
                  this.allIndustry = response.data.data;
              })
            },
            checkUserApplyJobs() {
                const self = this;
                axios.get('check-user-apply-job').then(response => {
                    console.log(response.data.length);
                    if (response.data.length >= 1) {
                        $.each(response.data, function(key, value) {
                            self.jobsID.push(value.job_id);
                        });
                    } else {
                        this.jobsID.push(0);
                    }
                })
            },
            jobAlreadyApply() {
                // 
                swal("Already Applied!", "You clicked the button!", "success")
            },
            jobSearchByKeywords() {
                let keyword = this.search;
                if( keyword == "") {
                    this.error = 'Please enter keyword';
                } else {
                    this.error = '';
                    this.loading = true;
                    axios.get('jobs/search/'+this.search).then(response => {
                        this.loading = false;
                        this.allIndustry = response.data.data;
                        console.log(response.data.data);
                    })
                }
            }
        },
        created: function() { 
            this.checkUserApplyJobs();
            if(this.$route.params.kw)
            { this.getJobs(this.$route.params.kw,this.$route.params.location,this.$route.params.experience,this.$route.params.jobtype); }
            else { this.getAllJobs(); }
            
        },
        filters: {
        stringToSpanTag: function(string) {
        let result = '';
        let arrStr = string.split(',');
        let strLength = arrStr.length;
        for(let i = 0; i < strLength; i++ ){
            result += ""+arrStr[i]+"";
            // result += "<span class='tag-item'>"+arrStr[i]+"</span>";

        }
        return result;
    }
}

    }
</script>

<style scoped>

</style>
