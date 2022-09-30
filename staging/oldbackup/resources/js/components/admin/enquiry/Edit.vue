<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Enquiry</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Enquiry</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateQuestion()">
                            <div class="card-body">
                                <div class="form-row">

                                <div class="form-group col-md-4 mb-3">
                                  <label for="enq_name">Name</label>
                                  <input type="text" disabled="" class="form-control" id="enq_name" placeholder="Name" v-model="form.enq_name" name="enq_name" :class="{ 'is-invalid': form.errors.has('enq_name') }">
                                    <has-error :form="form" field="enq_name"></has-error>
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                  <label for="enq_email">Email</label>
                                  <input type="text" disabled=""class="form-control" id="enq_email" placeholder="Email" v-model="form.enq_email" name="enq_email" :class="{ 'is-invalid': form.errors.has('enq_email') }">
                                    <has-error :form="form" field="enq_email"></has-error>
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                  <label for="enq_contact">Contact</label>
                                  <input type="text" disabled class="form-control" id="enq_contact" placeholder="Contact" v-model="form.enq_contact" name="enq_contact" :class="{ 'is-invalid': form.errors.has('enq_contact') }">
                                    <has-error :form="form" field="enq_contact"></has-error>
                                </div>
                                
                                <div class="form-group col-md-4 mb-3">
                                    <label>Select Enquiry Type</label>
                                    <select class="form-control" disabled="" :class="{ 'is-invalid': form.errors.has('enq_type') }" v-model="form.enq_type">
                                        <option disabled value="">Select One</option>
                                        <option  :value="1">Technical Enquiry</option>
                                        <option  :value="2">General Enquiry</option>
                                        <option  :value="3">Report an Issue</option>
                                        <option  :value="4">Feedback</option>
                                        <option  :value="5">Others</option>

                                    </select>
                                    <has-error :form="form" field="enq_type"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                  <label for="enq_message">Message</label>
                                  <textarea class="form-control" :class="{ 'is-invalid': form.errors.has('enq_message') }" v-model="form.enq_message" disabled=""></textarea>
                                    <has-error :form="form" field="enq_message"></has-error>
                                </div>

                                <div class="form-group col-md-4 mb-3">
                                    <label>Update Enquiry Status </label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('enq_status') }" v-model="form.enq_status">
                                        <option disabled value="">Select One</option>
                                        <option value="Open">Open</option>
                                        <option value="Close">Close</option>
                                        <option value="Dropped">Dropped</option>

                                    </select>
                                    <has-error :form="form" field="enq_status"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label>User type </label>
                                    
                                  <input type="text" disabled="" class="form-control" id="enq_usertype" placeholder="Contact" v-model="form.enq_usertype" name="enq_usertype" :class="{ 'is-invalid': form.errors.has('enq_usertype') }">
                                    <has-error :form="form" field="enq_usertype"></has-error>
                                   
                                  </div>
                                 
                                  

                                  

                                

                              </div><!-- form row -->

                                

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        name: "Edit",
        data(){
            return {
                
                form: new Form({
                	enq_name:'',
                  enq_email:'',
                  enq_contact:'',
                  enq_type:'',
                  enq_message:'',
                  enq_status:'',
                  enq_usertype:'',

                })
            }
        },
        mounted(){
           this.$store.dispatch('getAllData','/enquiry')
            this.$store.dispatch('getEditData',`/edit-enquiry/${this.$route.params.enquiryid}`)
            
       },
        computed:{
          allStatus(){
            return this.$store.getters.getAllData
          },
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          },
          
          
        },
        methods:{
           
            updateQuestion(){
                this.form.post(`/update-enquiry/${this.$route.params.enquiryid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/enquiry-list')
                        toast({
                            type: 'success',
                            title: 'Enquiry Updated successfully'
                        })
                    })
                    .catch(()=>{

                    })

            }
            
            
        }
    }
</script>

<style scoped>
textarea, input {
 
  -webkit-appearance: textfield; 
}
</style>