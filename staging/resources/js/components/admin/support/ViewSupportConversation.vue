<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" >Customer Details</h3>

                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            	<table class="table table-bordered">
							  <thead>
							    <tr>
							      <th scope="col" colspan="2">Support ID</th>
							      <td colspan="2">{{alldata.support_id}}</td>
							      
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							      <th>First Name</th>
							      <td>{{alldata.support_fname}}</td>
							      <th>Last name</th>
							      <td>{{alldata.support_lname}}</td>
							    </tr>
							    <tr>
							      <th scope="col">Email</th>
							      <td>{{alldata.support_email}}</td>
							      <th scope="col">Current Status</th>
							      <td>{{alldata.support_status}}</td>
							    </tr>
							    <tr>
							      <th scope="col">Subject</th>
							      <td v-if="alldata.support_subject=='1'">Technical Enquiry</td>
					                      <td v-if="alldata.support_subject=='2'">General Enquiry</td>
					                      <td v-if="alldata.support_subject=='3'">Report An Issue</td>
					                      <td v-if="alldata.support_subject=='4'">Feedback</td>
					                      <td v-if="alldata.support_subject=='5'">Others</td>
							      <th scope="col">User Type</th>
							      <td>{{alldata.support_usertype}}</td>
							    </tr>
							    <tr>
							      <th scope="col">Opening Data</th>
							      <td>{{alldata.support_open_date}}</td>
							      <th scope="col">Closing Date</th>
							      <td v-if="alldata.support_close_date==NULL">Not Close</td>
							    </tr>
							    
							    <tr>
							      <th scope="col" colspan="2">Initial Comment</th>
							      <td colspan="2">{{alldata.support_comment}}</td>
							    </tr>
							  </tbody>
							</table>
                          </div>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- //conversation -->
                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            	<table class="table table-bordered">
                            		<thead class="thead-dark">
							    <tr>
							      <th colspan="4">Previous Conversation</th>
							    </tr>
							  </thead>

							  
							  <tbody>
							    <tr>
							      <th>Me :</th>
							      <td></td>
							      <th>{{alldata.support_fname}}</th>
							      <td></td>
							    </tr>
							    
							  </tbody>
							</table>
                          </div>
                        </div>
                        </div>

                        <!-- //comment  reply -->
                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            	<table class="table table-bordered">
                            		<thead class="thead-dark">
							    <tr>
							      <th colspan="4">Reply to message</th>
							    </tr>
							  </thead>

							  
							  <tbody>
							    <tr>
							    <th>{{alldata.support_fname}}</th>
							      <td>{{alldata.support_comment}}</td>
							      <th>Me :</th>
							      <td><button class="btn btn-outline-success">Reply<i class="fa fa-reply"></i></button></td>
							      
							    </tr>
							    
							  </tbody>
							</table>
                          </div>
                        </div>
                        </div>
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
        name: "List",
         data(){
        //let now = new Date()
        return {
              support_close_date:NULL,
             
              
         }
     },
        mounted(){
			this.$store.dispatch('getAllData',`/view-support-conversation/${this.$route.params.conversationsid}`)        
		},
        computed:{
        alldata(){
            
            return this.$store.getters.getAllData
          }
        },
        methods:{
          
     
            
            
        }
    }
</script>

<style scoped>
</style>