<template>
    <div id="view">
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                       <div class="card-header">
                            <h2 class="card-title">Jobs Details</h2>

                            <div class="card-tools">
                                
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <table class="table table-bordered table-hover dt-responsive table-striped">
                                <thead>
                                      
                           <tr> 
                                <th>Advertisement</th>
                                <td>{{ alldataJobs.advertisement_no }}</td>
                                 <th>Designation</th>
                                 <td>{{ alldataJobs.designation }}</td>
                            </tr>

                            <tr>
                                <th>Recruiter</th>
                                <td>{{ alldataJobs.recruiter }}</td> 
                                <th >Job Type</th>
                                <td >{{ alldataJobs.jobtype }}</td>
                                 
                            </tr>
                       
                           <tr>
                                <th>No Vacancy</th>
                                <td>{{ alldataJobs.no_of_vacancy }}</td> 
                                <th>Location</th>
                                <td>{{ alldataJobs.joblocation }}</td>
                                 
                            </tr>


                           <tr> 
                                <th>Opening Date</th>
                                <td>{{ alldataJobs.opening_date }}</td>
                                <th>Closing Date</th>
                                <td>{{ alldataJobs.closing_date }}</td>
                                
                             </tr>

                             <tr> 
                                <th>Description</th>
                                <td>{{ alldataJobs.description }}</td>
                                <th>Attachment</th>
                                <td><i class="fas fa-file-pdf"></i><a :href="'/uploadimage/' + alldataJobs.attachment" target="_blank"> View Attachment </a></td>
                                
                             </tr>

                                       
                                        </thead>
                                        
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
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "View",
         mounted(){
          this.$store.dispatch('getEditData',`/edit-jobs/${this.$route.params.jobsid}`)
        },
        computed:{
        alldataJobs(){
            return this.$store.getters.getEditData
          }
        }
    }
</script>

<style scoped>
</style>