<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Jobs</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Jobs</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addJobs()">
                            <div class="card-body">
                                <div class="form-group" >
                                    <label>Select Advertisement</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('adv_id') }" v-model="form.adv_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="advertisement.id" v-for="advertisement in allAdvt"> {{advertisement.advertisement_no}}</option>

                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>

                                  <div class="form-group" >
                                    <label>Select Recruiter</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('recruiter_id') }" v-model="form.recruiter_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="recruiter.id" v-for="recruiter in allRecruiter"> {{recruiter.recruiter}}</option>

                                    </select>
                                    <has-error :form="form" field="recruiter_id"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select Job Type</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('job_type_id') }" v-model="form.job_type_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="jobpost.id" v-for="jobpost in allJobtype"> {{jobpost.jobtype}}</option>

                                    </select>
                                    <has-error :form="form" field="job_type_id"></has-error>
                                </div>

                                 <div class="form-group" >
                                    <label>Select Designation</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('designation_id') }" v-model="form.designation_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="designation.id" v-for="designation in allDesignation"> {{designation.designation}}</option>

                                    </select>
                                    <has-error :form="form" field="designation_id"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select Organisations</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('org_id') }" v-model="form.org_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="organisation.id" v-for="organisation in allOrganisations"> {{organisation.organisation}}</option>

                                    </select>
                                    <has-error :form="form" field="org_id"></has-error>
                                </div>
                              
                                <div class="form-group">
                                  <label for="noofvacancyId"> No of Vacancy</label>
                                  <input type="text" class="form-control" id="noofvacancyId" placeholder="No of Vacancy" v-model="form.no_of_vacancy" name="no_of_vacancy" :class="{ 'is-invalid': form.errors.has('no_of_vacancy') }">
                                    <has-error :form="form" field="no_of_vacancy"></has-error>
                                </div>

                                <div class="form-group">   
                                <label for="openingdateId">Opening Date</label> 
                                 <input type="date" class="form-control" id="openingdateId" placeholder=" opening date" v-model="form.opening_date" name="opening_date" :class="{ 'is-invalid': form.errors.has('opening_date') }" autocomplete="off">
                                  <has-error :form="form" field="opening_date"></has-error>
                                </div>
                               

                                <div class="form-group">   
                                <label for="closingdateId">Closing Date</label> 
                                <input type="date" class="form-control" id="closingdateId" placeholder=" opening date" v-model="form.closing_date" name="closing_date" :class="{ 'is-invalid': form.errors.has('closing_date') }" autocomplete="off">
                                  <has-error :form="form" field="closing_date"></has-error>
                                </div>
                                
                                <div class="form-group shadow-textarea">
                                  <label for="exampleFormControlTextarea6"> Description</label>
                                  <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="4" placeholder="Write something here description..."  v-model="form.description" name="description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                                  <has-error :form="form" field="description"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select Location</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('location_id') }" v-model="form.location_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="location.id" v-for="location in allLocation"> {{location.joblocation}}</option>

                                    </select>
                                    <has-error :form="form" field="location_id"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select Fee For Sc/St/Ph</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('location_id') }" v-model="form.fee_sc_st_ph_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="fee.id" v-for="fee in allFee"> {{fee.fee}}</option>

                                    </select>
                                    <has-error :form="form" field="fee_sc_st_ph_id"></has-error>
                                </div>

                                <div class="form-group" >
                                    <label>Select Fee For Gen/Obc</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('location_id') }" v-model="form.fee_gen_obc_id">
                                        <option disabled value="">Select One</option>
                                        <option :value="fee.id" v-for="fee in allFee"> {{fee.fee}}</option>

                                    </select>
                                    <has-error :form="form" field="fee_gen_obc_id"></has-error>
                                </div>

                                 <div class="form-group" >
                                   <div class="input-group">
                                    <div class="custom-file">
                                    <input @change = "changePdf($event)" name="attachment" type="file" :class="{ 'is-invalid': form.errors.has('attachment') }" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Upload Pdf file</label>
                                    <img :src="form.attachment" alt="" width="80" height="80">
                                    <has-error :form="form" field="attachment"></has-error>
                                    </div>
                                  </div>
                                </div>
                                
                                  
                              </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
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
    name: "New",
     data(){
        //let now = new Date()
        return {
              form: new Form({
                adv_id:'',
                recruiter_id:'',
                job_type_id:'',
                designation_id:'',
                no_of_vacancy:'',
                opening_date: '',
                closing_date:'',
                description:'',
                location_id:'',
                org_id:'',
                attachment:'',
                fee_sc_st_ph_id:'',
                fee_gen_obc_id:'',
             })
         }
     },
        mounted(){
          this.$store.dispatch('getAllAdvert','/advertisement')
          this.$store.dispatch('getAllRecruiter','/recruiter')
          this.$store.dispatch('getAllJobtype','/jobtype')
          this.$store.dispatch('getAllDesignation','/designation')
          this.$store.dispatch('getAllLocation','/joblocation')
          this.$store.dispatch('getAllFee','/fee')
          this.$store.dispatch('getAllOrganisations','/joborganisation')
        },
        computed:{
          allAdvt(){
            return this.$store.getters.getAllAdvert
          },
          allRecruiter(){
            return this.$store.getters.getAllRecruiter
          },
          allJobtype(){
            return this.$store.getters.getAllJobtype
          },
          allDesignation(){
            return this.$store.getters.getAllDesignation
          },
          allLocation(){
            return this.$store.getters.getAllLocation
          },
          allFee(){
            return this.$store.getters.getAllFee
          },
          allOrganisations(){
            return this.$store.getters.getAllOrganisations
          },
        },
        methods:{
          changePdf(event){
                let file = event.target.files[0];

                 if(file.size>8388608){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 } else {
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.attachment = event.target.result
                         //console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }

            },
            addJobs(){
                this.form.post('/add-jobs')
                    .then(()=>{
                        this.$router.push('/jobs-list')
                        toast({
                            type: 'success',
                            title: 'Jobs Added successfully'
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