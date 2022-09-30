<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Applied Candidate List {{'For '+job_title ? 'For '+job_title:'Not Available'}}</h3>

                            <div class="card-tools">
                                <!-- <button class="btn btn-primary">
                                    <router-link to="/add-jobmanager" style="color:#fff"> Add Job Manager</router-link>
                                </button> -->
                            </div>
                        </div>
                        <!-- <div class="card-header">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="company_id" class="form-control" v-model="company_id">
                                            <option value="">-- Select Company --</option>
                                            <option v-for='data in companies' :value='data.id'>{{ data.company_name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="status" class="form-control" v-model="status">
                                                    <option value="">Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Deactive">De-Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary"
                                                        @click="getFilterData()">Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Designation</th>
                                        <th>Current Salary/Expected Salary (Per annum)</th>
                                        <th>Experience(Year/Month)</th>
                                        <th>Status</th>

                                        <th>Resume</th>
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="demo==''"><td colspan="9">No data available</td></tr>

                                        <tr v-for="(job,index) in demo" :key="job.id">
                                        <td>{{index+1}}</td>
                                        <td>{{job.fname ? job.fname :'Not Available'}} {{job.lname ? job.lname :'Not Available'}} </td>
                                        <td>{{job.email ? job.email :'Not Available'}}</td>
                                        <td>{{job.contact ? job.contact :'Not Available'}}</td>
                                        <td>{{job.designation ? job.designation :'Not Available'}}</td>
                                        <td>{{'&#x20B9 -'+job.current_salary ? '&#x20B9- '+job.current_salary :'Not Available'}} / {{'&#x20B9- '+job.expected_salary ?'&#x20B9- ' +job.expected_salary :'Not Available'}}</td>
                                        <td>{{job.exp_year+' Yr'  ? job.exp_year+' Yr' :'Not Available'}} - {{job.exp_month+' M' ? job.exp_month+' M':'Not Available'}}</td>
                                         <td v-if="job.rec_status==1">Applied</td>
                                         <td v-if="job.rec_status==2">Interview Scheduled</td>
                                         <td v-if="job.rec_status==3">Shortlisted</td>
                                         <td v-if="job.rec_status==4">Rejected</td>
                                         <td v-if="job.rec_status==5">Offer Letter</td>
                                         <td v-if="job.rec_status==6">Join</td>
                                         <td v-if="job.rec_status==7">Backout After Joining</td>
                                         
                                  
                                        <td><a v-if="job.resume !== null" href="#" @click="opendoc(job.resume)" data-toggle="modal" data-target="#addNewLocation" class="btn btn-primary btn-sm btn-block text-white mr-2">
                                                        <i class="fas fa-eye mr-2"></i>View Resume</a>
                                                    <a v-if="job.resume !== null" :href="'resume/'+job.resume" target="_blank" download  class="btn btn-success btn-sm btn-block text-white">
                                                        <i class="fas fa-download mr-2"></i>Download Resume</a>
                                                    <a v-if="job.resume_video_link !== null" :href="`https://www.youtube.com/watch?v=${ job.resume_video_link }`" target="_blank" class="btn btn-warning btn-sm btn-block text-white">
                                                        <i class="fas fa-video mr-2"></i>Video Resume</a></td>
                                        
                                        </tr>
                                        </tbody>
                            </table>
                            </div>
                          </div>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
<!-----------Resume Modal------------------------------>
<div class="modal fade popupForm custom-model-width" id="addNewLocation">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Resume </h4>
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
        <div class="modal-body">
          <!-- form start -->

    <iframe id="resume_iframe" src="" style="width:550px; height:500px;" frameborder="0"></iframe>


    </div>
           
      <!-- Modal footer -->
     <div class="modal-footer justify-content-center">
           
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!----------------------Resume Modal Close-------------------->

</div>
</template> 

<script>
    export default {
        name: "AppliedCandidateList",
         data() {
            return {
              job_id: this.$route.params.jobmanagerid,
              demo:[],
              job_title:''

            }
        },
        mounted(){
          this.getAllAppliedCandidateList();
        },
        computed:{
        
        },
        methods:{
          getAllAppliedCandidateList(){
              let self =this;
              axios.get('get/all/applied/candidate/'+ this.job_id).then(function (response) {
                 console.log(response.data.data);
                    self.demo = response.data.data;
                    self.job_title = response.data.data[0].applied_for;
                });
          },
          
           opendoc($doc) {
                //let res="http://infolab.stanford.edu/pub/papers/google.pdf";
                if($doc)
                {
                   var link="http://docs.google.com/gview?url=https://naukriyan.com/resume/"+$doc+"&embedded=true";
                }
                else{
                    var link="http://docs.google.com/gview?url=https://naukriyan.com/resume/default.pdf&embedded=true";
                }
                
              document.getElementById('resume_iframe').src = link;
              },
     
            
            
        },
        
    }
</script>

<style scoped>
</style>