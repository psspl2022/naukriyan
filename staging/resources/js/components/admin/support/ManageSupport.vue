<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Support List</h3>

                            
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>Support ID</th>
                                        <th>Name/Email/User Type</th>
                                        <th>Comment</th>
                                        <th>Subject</th>
                                        <th>Current Status</th>
                                        <th>Opening/Closing Date</th>
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(pack,index) in alldata" :key="pack.id">
                                        <td>{{pack.support_id}}</td>
                                        <td>{{pack.support_fname}}-{{pack.support_lname}}/{{pack.support_email}}/{{pack.support_usertype}}</td>
                                        <td>{{pack.support_comment}}</td>
                                        <td v-if="pack.support_subject=='1'">Technical Enquiry</td>
					                      <td v-if="pack.support_subject=='2'">General Enquiry</td>
					                      <td v-if="pack.support_subject=='3'">Report An Issue</td>
					                      <td v-if="pack.support_subject=='4'">Feedback</td>
					                      <td v-if="pack.support_subject=='5'">Others</td>
                                         <td>{{pack.support_status}}</td>
                                          <td>{{pack.support_open_date}} / <span v-if="pack.support_close_date==NULL">Not Close</span>
											<span v-else="">{{pack.support_close_date}}</span>
                                          </td>
                                        
                                        <td>
                                        
                                        <router-link :to="`/view-support-conversation/${pack.id}`"><button class="btn btn-primary btn-xs" name="">View</button></router-link>
                                        </td>
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
                      <!-- The View Support user start -->
<div class="modal fade popupForm custom-model-width" id="viewsupport">
  <div class="modal-dialog">
    <div class="modal-content">
        <form class="popupForm" role="form" method="post" @submit.prevent="addsupport()">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Support</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
        <div class="modal-body">
        

           <div class="form-group row">
            <div class="col-sm-6">
                <label class="col-form-label" for="">Current Status - </label>
                
            </div>
            <div class="col-sm-6">
                <label class="col-form-label" for="">............ </label>
                
            </div>
        </div> 

         <div class="form-group row">
             
              <div class="col-sm-12">
                 <label class="col-form-label" for="">Change Status<em>(If required)</em></label>
              <select name="support_status" v-model="form.support_status"  :class="{ 'is-invalid': form.errors.has('support_status') }" class="form-control">
                <option disabled="">Select Status</option>
                <option value="Open">Open</option>
                <option value="Close">Close</option>
                <option value="Dropped">Dropped</option>
               
              </select>
            </div>
        </div>
         
        
        <div class="form-group row">
            <div class="col-sm-12">
                <label class="col-form-label" for=""> Description</label>
                <textarea type="text" class="form-control" name="support_coversation" v-model="form.support_coversation"  :class="{ 'is-invalid': form.errors.has('support_coversation') }" placeholder="Enter Your Description Here ....." id=""></textarea>
            </div>
        </div>
      
      </div>

      <!-- Modal footer -->
     <div class="modal-footer justify-content-center">
           <button type="submit" class="btn btn-primary text-white">Send</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
</form>
    </div>
  </div>
</div>
<!-- The add Enquiry user end -->
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
         data(){
        //let now = new Date()
        return {
              support_subject:[],
              form: new Form({
                support_status:'',
                support_coversation:''
                 
             }),
              demo: new Form({
                support_subject:'',
                support_comment:''
              }),
              
         }
     },
        mounted(){
          this.$store.dispatch('getAllData','/get-support-list')
        },
        computed:{
        alldata(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
          }
        },
        methods:{
          deactivepackage(id){
              var uri = '/deactive-package/'+id;
              swal.fire({
              title: 'Are you sure want to change?',
              text: "You would be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, change it!'
              }).then((result) => {
                if (result.value) {
                  swal.fire(
                    'Change status!',
                    'Your status has been changed.',
                    'success'
                  )
                    axios.get(uri).then(response => {
                     this.$store.dispatch('getAllData','/package')
                  });
                }
              });
        },
        
        activepackage(id){
              var uri = '/active-package/'+id;
              swal.fire({
              title: 'Are you sure want to change?',
              text: "You would be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, change it!'
              }).then((result) => {
                if (result.value) {
                  swal.fire(
                    'Change status!',
                    'Your status has been changed.',
                    'success'
                  )
                    axios.get(uri).then(response => {
                     this.$store.dispatch('getAllData','/package')
                  });
                }
              });
        },
     deletepackage(id){
              var uri = '/package/'+id;
              swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                  swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                    axios.get(uri).then(response => {
                     this.$store.dispatch('getAllData','/package')
                  });
                }
              });
        }
            
            
        }
    }
</script>

<style scoped>
</style>