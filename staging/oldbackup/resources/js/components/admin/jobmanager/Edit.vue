<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Job Manager</li>
            </ol>
          </div>
        </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Job Manager</h3>
                        </div>{{editData}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updatejob()">
                            <div class="card-body">
                                <div class="form-row">

                                <div class="form-group col-md-4 mb-3">
                                  <label for="company_id"> Company</label>
                                  <input type="number" class="form-control" id="company_id" placeholder="Enter Company Name" v-model="form.company_id" name="company_id" :class="{ 'is-invalid': form.errors.has('company_id') }">
                                    <has-error :form="form" field="company_id"></has-error>
                                </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label for="description">Description</label>
                                  <input type="text" class="form-control" id="description" placeholder="Enter Description" v-model="form.description" name="description" :class="{ 'is-invalid': form.errors.has('description') }">
                                    <has-error :form="form" field="description"></has-error>
                                  </div>
                                    <div class="form-group col-md-4 mb-3">
                                    <label for="responsibility">Responsibility</label>
                                  <input type="text" class="form-control" id="responsibility" placeholder="Enter Responsibility" v-model="form.responsibility" name="responsibility" :class="{ 'is-invalid': form.errors.has('responsibility') }">
                                    <has-error :form="form" field="responsibility"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_sector_id"> Sector</label>
                                  <input type="number" class="form-control" id="job_sector_id" placeholder="Enter Job sector" v-model="form.job_sector_id" name="job_sector_id" :class="{ 'is-invalid': form.errors.has('job_sector_id') }">
                                    <has-error :form="form" field="job_sector_id"></has-error>
                                  </div>
                                   <div class="form-group col-md-4 mb-3">
                                    <label for="is_deleted">Is Deleted</label>
                                  <input type="text" class="form-control" id="is_deleted" placeholder="responsibility" v-model="form.is_deleted" name="is_deleted" :class="{ 'is-invalid': form.errors.has('is_deleted') }">
                                    <has-error :form="form" field="is_deleted"></has-error>
                                  </div>

                                  <div class="form-group col-md-4 mb-3">
                                    <label for="responsibility"> Address</label>
                                  <input type="text" class="form-control" id="job_address" placeholder="Enter  Address" v-model="form.job_address" name="job_address" :class="{ 'is-invalid': form.errors.has('job_address') }">
                                    <has-error :form="form" field="job_address"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="responsibility">City</label>
                                  <input type="number" class="form-control" id="job_city_id" placeholder="Enter City" v-model="form.job_city_id" name=" job_city_id" :class="{ 'is-invalid': form.errors.has('  job_city_id') }">
                                    <has-error :form="form" field="job_city_id"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_state_id"> State</label>
                                  <input type="number" class="form-control" id="job_state_id" placeholder="responsibility" v-model="form.job_state_id" name="job_state_id" :class="{ 'is-invalid': form.errors.has('job_state_id') }">
                                    <has-error :form="form" field="job_state_id"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_posted_type_id"> Posted</label>
                                  <input type="number" class="form-control" id="job_posted_type_id" placeholder="" v-model="form.job_posted_type_id" name="job_posted_type_id" :class="{ 'is-invalid': form.errors.has('job_posted_type_id') }">
                                    <has-error :form="form" field="job_posted_type_id"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="responsibility">Expiry Date</label>
                                  <input type="date" class="form-control" id="expiry_date" placeholder="responsibility" v-model="form.expiry_date" name="expiry_date" :class="{ 'is-invalid': form.errors.has('expiry_date') }">
                                    <has-error :form="form" field="expiry_date"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="last_apply_date">Last Apply Date</label>
                                  <input type="date" class="form-control" id="last_apply_date" placeholder="responsibility" v-model="form.last_apply_date" name="last_apply_date" :class="{ 'is-invalid': form.errors.has('last_apply_date') }">
                                    <has-error :form="form" field="last_apply_date"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_questionnarie_id"> Questioner</label>
                                  <input type="number" class="form-control" id="job_questionnarie_id" placeholder="responsibility" v-model="form.job_questionnarie_id" name="job_questionnarie_id" :class="{ 'is-invalid': form.errors.has('job_questionnarie_id') }">
                                    <has-error :form="form" field="job_questionnarie_id"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_keywords">Keywords</label>
                                  <input type="text" class="form-control" id="job_keywords" placeholder="responsibility" v-model="form.job_keywords" name="job_keywords" :class="{ 'is-invalid': form.errors.has('job_keywords') }">
                                    <has-error :form="form" field="responsibility"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_benefits_id">Benefits</label>
                                  <input type="number" class="form-control" id="job_benefits_id" placeholder="responsibility" v-model="form.job_benefits_id" name="job_benefits_id" :class="{ 'is-invalid': form.errors.has('job_benefits_id') }">
                                    <has-error :form="form" field="job_benefits_id"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_preference">Preference</label>
                                  <input type="text" class="form-control" id="job_preference" placeholder="responsibility" v-model="form.job_preference" name="job_preference" :class="{ 'is-invalid': form.errors.has('job_preference') }">
                                    <has-error :form="form" field="job_preference"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_shift">Shift</label>
                                  <input type="text" class="form-control" id="job_shift" placeholder="responsibility" v-model="form.job_shift" name="job_shift" :class="{ 'is-invalid': form.errors.has('job_shift') }">
                                    <has-error :form="form" field="job_shift"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_role">Role</label>
                                  <input type="number" class="form-control" id="responsibility" placeholder="job_role" v-model="form.job_role" name="job_role" :class="{ 'is-invalid': form.errors.has('job_role') }">
                                    <has-error :form="form" field="job_role"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_carreer_level">Carrer Level</label>
                                  <input type="text" class="form-control" id="job_carreer_level" placeholder="responsibility" v-model="form.job_carreer_level" name="job_carreer_level" :class="{ 'is-invalid': form.errors.has('job_carreer_level') }">
                                    <has-error :form="form" field="job_carreer_level"></has-error>
                                  </div>
                                   <div class="form-group col-md-4 mb-3">
                                    <label for="job_skills">Job Skills</label>
                                  <input type="text" class="form-control" id="job_skills" placeholder="responsibility" v-model="form.job_skills" name="job_skills" :class="{ 'is-invalid': form.errors.has('job_skills') }">
                                    <has-error :form="form" field="job_skills"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_type_id">Job Type</label>
                                  <input type="number" class="form-control" id="job_type_id" placeholder="responsibility" v-model="form.job_type_id" name="job_type_id" :class="{ 'is-invalid': form.errors.has('job_type_id') }">
                                    <has-error :form="form" field="job_type_id"></has-error


                                      >
                                  </div>
                                 <!--  <div class="form-group col-md-4 mb-3">
                                    <label for="grad_start_year">Graduation Year</label>
                                  <input type="text" class="form-control" id="grad_start_year" placeholder="responsibility" v-model="form.grad_start_year" name="grad_start_year" :class="{ 'is-invalid': form.errors.has('grad_start_year') }">
                                    <has-error :form="form" field="job_carreer_level"></has-error>
                                  </div> -->
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="grad_start_year">Graduation Start Year</label>
                                  <input type="date" class="form-control" id="grad_start_year" placeholder="responsibility" v-model="form.grad_start_year" name="grad_start_year" :class="{ 'is-invalid': form.errors.has('grad_start_year') }">
                                    <has-error :form="form" field="grad_start_year"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="grad_end_year">Gaduation End Year</label>
                                  <input type="date" class="form-control" id="grad_end_year" placeholder="responsibility" v-model="form.grad_end_year" name="grad_end_year" :class="{ 'is-invalid': form.errors.has('grad_end_year') }">
                                    <has-error :form="form" field="grad_end_year"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_vaccancy">Vaccancy</label>
                                  <input type="text" class="form-control" id="job_vaccancy" placeholder="responsibility" v-model="form.job_vaccancy" name="job_vaccancy" :class="{ 'is-invalid': form.errors.has('job_vaccancy') }">
                                    <has-error :form="form" field="job_vaccancy"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_qualification">Job Qualification</label>
                                  <input type="text" class="form-control" id="job_qualification" placeholder="responsibility" v-model="form.job_qualification" name="job_qualification" :class="{ 'is-invalid': form.errors.has('job_qualification') }">
                                    <has-error :form="form" field="job_qualification"></has-error>
                                  </div>
                                        <div class="form-group col-md-4 mb-3">
                                    <label for="  job_exp">Experience</label>
                                  <input type="text" class="form-control" id="job_exp" placeholder="responsibility" v-model="form.job_exp" name=" job_exp" :class="{ 'is-invalid': form.errors.has('job_exp') }">
                                    <has-error :form="form" field=" job_exp"></has-error>
                                  </div>
                                    <div class="form-group col-md-4 mb-3">
                                    <label for="sal_disclosed">Salary Disclosed</label>
                                  <input type="number" class="form-control" id="sal_disclosed" placeholder="responsibility" v-model="form.sal_disclosed" name="sal_disclosed" :class="{ 'is-invalid': form.errors.has('sal_disclosed') }">
                                    <has-error :form="form" field="sal_disclosed"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="offered_sal_min">Offered Salary Minimum</label>
                                  <input type="text" class="form-control" id="offered_sal_min" placeholder="responsibility" v-model="form.offered_sal_min" name="offered_sal_min" :class="{ 'is-invalid': form.errors.has('offered_sal_min') }">
                                    <has-error :form="form" field="offered_sal_min"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="offered_sal_max">Offered Salary Maximum</label>
                                  <input type="text" class="form-control" id="offered_sal_max" placeholder="responsibility" v-model="form.offered_sal_max" name="offered_sal_max" :class="{ 'is-invalid': form.errors.has('offered_sal_max') }">
                                    <has-error :form="form" field="offered_sal_max"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_industry_id">Industry</label>
                                  <input type="number" class="form-control" id="job_industry_id" placeholder="responsibility" v-model="form.job_industry_id" name="job_industry_id" :class="{ 'is-invalid': form.errors.has('job_industry_id') }">
                                    <has-error :form="form" field="job_industry_id"></has-error>
                                  </div>
                                   <div class="form-group col-md-4 mb-3">
                                    <label for="job_functional_role_id">Functional Role</label>
                                  <input type="number" class="form-control" id="job_functional_role_id" placeholder="responsibility" v-model="form.job_functional_role_id" name="job_functional_role_id" :class="{ 'is-invalid': form.errors.has('job_functional_role_id') }">
                                    <has-error :form="form" field="job_functional_role_id"></has-error>
                                  </div>
                                   <div class="form-group col-md-4 mb-3">
                                    <label for="job_position">Position</label>
                                  <input type="text" class="form-control" id="job_position" placeholder="responsibility" v-model="form.job_position" name="job_position" :class="{ 'is-invalid': form.errors.has('job_position') }">
                                    <has-error :form="form" field="job_position"></has-error>
                                  </div>
                                   <div class="form-group col-md-4 mb-3">
                                    <label for="main_exp">Total Experince</label>
                                  <input type="text" class="form-control" id="main_exp" placeholder="responsibility" v-model="form.main_exp" name="main_exp" :class="{ 'is-invalid': form.errors.has('main_exp') }">
                                    <has-error :form="form" field="main_exp"></has-error>
                                  </div>
                                   <div class="form-group col-md-4 mb-3">
                                    <label for="max_exp">Maximum Experince</label>
                                  <input type="text" class="form-control" id="max_exp" placeholder="responsibility" v-model="form.max_exp" name="max_exp" :class="{ 'is-invalid': form.errors.has('max_exp') }">
                                    <has-error :form="form" field="max_exp"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_ctc"> CTC</label>
                                  <input type="text" class="form-control" id="job_ctc" placeholder="responsibility" v-model="form.job_ctc" name="job_ctc" :class="{ 'is-invalid': form.errors.has('job_ctc') }">
                                    <has-error :form="form" field="job_ctc"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_for">job for</label>
                                  <input type="text" class="form-control" id="job_for" placeholder="responsibility" v-model="form.job_for" name="job_for" :class="{ 'is-invalid': form.errors.has('job_for') }">
                                    <has-error :form="form" field="job_for"></has-error>
                                  </div>
                                  <div class="form-group col-md-4 mb-3">
                                    <label for="job_for">Counstraint payment</label>
                                  <input type="text" class="form-control" id="counstraint_payment" placeholder="responsibility" v-model="form.counstraint_payment" name="counstraint_payment" :class="{ 'is-invalid': form.errors.has('counstraint_payment') }">
                                    <has-error :form="form" field="counstraint_payment"></has-error>
                                  </div>
                                   <div class="form-group col-md-4 mb-3">
                                    <label for="reject_reason">Reject reason</label>
                                  <input type="text" class="form-control" id="reject_reason" placeholder="responsibility" v-model="form.reject_reason" name="reject_reason" :class="{ 'is-invalid': form.errors.has('reject_reason') }">
                                    <has-error :form="form" field="reject_reason"></has-error>
                                  </div>

                                 
                                  
                                  
                                 

                              </div><!-- form row -->
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
    name: "Edit",
     data(){
        //let now = new Date()
        return {
          
              form: new Form({

               
                company_id:'',
                description:'',
                  responsibility:'',
                  job_sector_id:'',
                is_deleted:'',
                  job_address:'',
                job_city_id:'',
                job_state_id:'',
                  job_preference:'',
               job_posted_type_id:'',
                expiry_date:'',
                last_apply_date:'',
                job_questionnarie_id:'',
                job_keywords:'',
                  job_benefits_id:'',
               job_skills:'',
               job_shift:'',
                job_role:'',
                job_carreer_level:'',
                job_type_id:'',
                 grad_start_year:'',
               grad_end_year:'',
               job_vaccancy:'',
                job_qualification:'',
                job_exp:'',
                sal_disclosed:'',
               offered_sal_min:'',
               offered_sal_max:'',
                job_industry_id:'',
               job_functional_role_id:'',
               job_position:'',
               main_exp:'',
               max_exp:'',
               job_ctc:'',
               job_for:'',
               counstraint_payment:'',
               reject_reason:'',
                
                
                
             })
         }
     },
     mounted(){

          this.$store.dispatch('getAllData','/job')
           this.$store.dispatch('getEditData',`/edit-job/${this.$route.params.jobmanagerid}`)
        },
        computed:{
          
          allCountry(){
            return this.$store.getters.getAllData
          },
           editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          }
          
        },
      
        methods:{
          
            updatejob(){
                this.form.post(`/update-job/${this.$route.params.jobmanagerid}`)
               
                    .then((response)=>{
                        this.$router.push('/jobmanager-list')
                        toast({
                            type: 'success',
                            title: 'Post Job Updated Successfully'
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