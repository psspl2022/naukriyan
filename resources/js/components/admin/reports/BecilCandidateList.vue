<template>
    <div>
        <section class="container-fluid">
            
            <div class="row" >
              <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Becil Candidate List(Only Profile Completed)</h3>

                            <div class="card-tools">
                                
                    <button  class="btn btn-primary"  @click.prevent="exportjobseekers()"> Export (CSV)  </button>
                   
                      <button type="button" class="btn btn-primary mybtn " data-toggle="modal" data-target="#myModal">
                      Send Mail/SMS
                                  Selected Candidate</button> 
       
               

                


   <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <center>  <span class="modal-title"><h3>Send Message</h3></span></center>
            <button type="button" class="close"  data-dismiss="modal">×</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-div">
                    <form  role="form" method="post" @submit="formSubmit">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" v-model="location"  id="pwd" placeholder="Text here...." rows="4" cols="50">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="checkvalue" id="checkvalue" value="" v-model="checkedNames">
                        </div>
                        <button type="submit" class="btn btn-warning btn-block mybtn">{{ TempApplyStatus ? 'Please Wait....' : 'Send' }}</button>
                    </form>
                </div>
            </div>
                            
        </div>
    </div>
  </div>

           
                            </div>
                        </div>
                        <div class="card-body">

                          <div class="row">
        <div class="col-md-12 mt-3">
          <form role="form" @submit.prevent="filterReports()">
            <div class="row">
             
            

              <div class="col-md-2">
                <label>Select State</label>
                <select  class="form-control" v-model="statesearch" >
                 
                 
              
                  <option value="">Select State</option>
                  <option   v-for="state in states"  :key="state.id"  :value="state.id">  {{ state.states_name }} </option>
                  
             </select>
              </div> 
   
               <div class="col-md-2">
                <label>Gender</label>
                <select  class="form-control" v-model="gender" >
               
                  <option value="">Select Gender</option>
                  <option value="M" >Male </option>
                   <option value="F" >Female </option>
                  
                 
                 
                </select>
              </div>
               <div class="col-md-2">
                <label>Select qualification</label>
                <select  class="form-control" v-model="qualification" >
               
                  <option value="">Select qualification</option>
                 <option value="8th">8th</option>
                 <option value="10th">10th</option>
                 <option value="12th">12th</option>
                 <option value="diploma">Diploma</option>
                 <option value="ug">UG</option>
                  <option value="pg">PG</option>
                                    <option value="other">None of the Above</option>
                </select>
              </div>

            

             

              <div class="col-md-2">
                <label for="" class="invisible">Select qualification</label>
                <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <hr />

                        <!-- /.card-header -->
                        
                          
                          <div class="row">
                            <div class="col-12">
                              <table id="" class="table table-bordered table-hover dt-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                         <th>Email</th>
                                          <th>Gender</th>
                                          <th>State</th>
                                            <th>Highest Qualification</th>
                                            
                                            <th>Current Salary</th>
                                             <th>Resume</th>
                                       
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(user,index) in alldata" :key="user.id">
                                        <td>{{index+1}}</td>
                                        <td>{{user.fname}} {{user.mname}} {{user.lname}}</td>
                                        <td>{{user.mobile}}</td>
                                        <td>{{user.email1}}</td>
                                        <td>{{user.gender}}</td>
                                        <td>{{user.c_state_name }}</td>
                                        <td> {{user.higest_qualification }} </td>
                                         
                                        
                                        <td>{{user.home_salary_as_bank }}</td>
                                        <td><a v-if="user.resume" :href="'https://beciljobs.com/documents/resume/'+user.resume" target="_blank">Resume</a></td>
                                        
                                        </tr>
                                        </tbody>
                            </table>
                            </div>
                          
                        </div>
                        </div>
                        <!-- /.card-body -->
                    

                </div>
                <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "BecilCandidateList",
        data() {
    return {
      selectAll: false,
        TempApplyStatus:false,
      checkedNames:[],
        location: "",
         states: [],
         alldata:[],
         gender:"",
         qualification:"",
         statesearch:"",

     
    };
  },
       
        mounted(){

            // STATE
    axios
      .get("/states")
      .then((response) => {
        this.states = response.data.data;
      })
      .catch((error) => {
        console.log("error");
      });

       this.filterReports();



        },
        computed:{
      
        },
        methods:{

      filterReports() {
      axios
        .get("/get-all-becil-user-detail", {
          params: {
            statesearch: this.statesearch,
            gender: this.gender,
            qualification: this.qualification,
          },
        })
        .then((response) => {
          this.alldata = response.data.data;
        })
        .catch((error) => {
          console.log("error");
        });
    },


                     
              exportjobseekers() {
                swal.fire({
                    title: 'Are you sure want export all data?',
                    text: "Companies details!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, export it!'
                }).then((result) => {
                    if (result.value) {
                        swal.fire(
                            'Data Export!',
                            'Data Exported successfully.',
                            'success'
                        )
                        window.open('/becildata-exportuser', '_blank');
                    }
                });
            },
           
        }
    }
</script>

<style scoped>
</style>