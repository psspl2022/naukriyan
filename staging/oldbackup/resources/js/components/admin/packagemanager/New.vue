<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
          <ol class="breadcrumb float-sm-left">
              <button class="btn btn-primary">
                <router-link to="/packagemanager-list" style="color:#fff">Package Manager List</router-link>
              </button>
            </ol>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Package Manager</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Package Manager</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addpackage()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="package_name"> Package Name</label>
                                  <input type="text" class="form-control" id="package_name" placeholder="Add Package Name" v-model="form.package_name" name="package_name" :class="{ 'is-invalid': form.errors.has('package_name') }">
                                    <has-error :form="form" field="package_name"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="package_description">Package Description</label>
                                  <textarea class="form-control" id="package_description" placeholder="Add package description" v-model="form.package_description" name="package_description" :class="{ 'is-invalid': form.errors.has('package_description') }"></textarea>
                                    <has-error :form="form" field="package_description"></has-error>
                                </div>

                                <!-- <div class="form-group">
                                  <label for="package_description"> Description</label>
                                  <input type="text" class="form-control" id="package_description" placeholder="Add package description" v-model="form.package_description" name="package_description" :class="{ 'is-invalid': form.errors.has('package_description') }">
                                    <has-error :form="form" field="package_description"></has-error>
                                </div> -->
                                <div class="form-group">
                                  <label for="package_price">Price</label>
                                  <input type="number" class="form-control" id="package_price" placeholder="Add Package price" v-model="form.package_price" name="package_price" :class="{ 'is-invalid': form.errors.has('package_price') }"min="0">
                                    <has-error :form="form" field="package_price"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="package_total_jobs"> Total Jobs</label>
                                  <input type="number" class="form-control" id="package_total_jobs" placeholder="Add Total Jobs" v-model="form.package_total_jobs" name="package_total_jobs" :class="{ 'is-invalid': form.errors.has('package_total_jobs') }"min="0">
                                    <has-error :form="form" field="package_total_jobs"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="package_total_resume_downloads">Total Resume Download</label>
                                  <input type="number" class="form-control" id="package_total_resume_downloads" placeholder="Resume Downloads" v-model="form.package_total_resume_downloads" name="package_total_resume_downloads" :class="{ 'is-invalid': form.errors.has('package_total_resume_downloads') }"min="0">
                                    <has-error :form="form" field="package_total_resume_downloads"></has-error>
                                </div>


                                <div class="form-group">
                                  <label for="package_total_excel_export">Total Excel Export</label>
                                  <input type="number" class="form-control" id="package_total_excel_export" placeholder="Add Total Excel Export" v-model="form.package_total_excel_export" name="package_total_excel_export" :class="{ 'is-invalid': form.errors.has('package_total_excel_export') }" min="0">
                                    <has-error :form="form" field="package_total_excel_export"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="package_total_resume_views"> Total Resume View</label>
                                  <input type="number" class="form-control" id="package_total_resume_views" placeholder="Total Resume View" v-model="form.package_total_resume_views" name="package_total_resume_views" :class="{ 'is-invalid': form.errors.has('package_total_resume_views') }" min="0">
                                    <has-error :form="form" field="package_total_resume_views"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="package_total_resume_forward">Total  Resume Forward</label>
                                  <input type="number" class="form-control" id="package_total_resume_forward" placeholder="Add Total Resume Forward" v-model="form.package_total_resume_forward" name="package_total_resume_forward" :class="{ 'is-invalid': form.errors.has('package_total_resume_forward') }" min="0">
                                    <has-error :form="form" field="package_total_resume_forward"></has-error>
                                </div>
                                

                                <div class="form-group">
                                  <label for="state_name">Total Resume search </label>
                                  <input type="number" class="form-control" id="package_total_resume_search" placeholder="Add State Name" v-model="form.package_total_resume_search" name="package_total_resume_search" :class="{ 'is-invalid': form.errors.has('package_total_resume_search') }" min="0">
                                    <has-error :form="form" field="package_total_resume_search"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="package_total_email">Total Email </label>
                                  <input type="number" class="form-control" id="package_total_email" placeholder="Add Total Email " v-model="form.package_total_email" name="package_total_email" :class="{ 'is-invalid': form.errors.has('package_total_email') }" min="0">
                                    <has-error :form="form" field="package_total_email"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="package_total_sms">Total  sms </label>
                                  <input type="number" class="form-control" id="package_total_sms" placeholder="Add total Sms" v-model="form.package_total_sms" name="package_total_sms" :class="{ 'is-invalid': form.errors.has('package_total_sms') }" min="0">
                                    <has-error :form="form" field="package_total_sms"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="validity">Validity </label>
                                  <input type="number" class="form-control" id="validity" placeholder="Add Validity (in Days)" v-model="form.validity" name="validity" :class="{ 'is-invalid': form.errors.has('validity') }" min="0" maxlength="3">
                                    <has-error :form="form" field="validity"></has-error>
                                </div>

                                <!-- <div class="form-group">
                                  <label for="package_status">Status </label>
                                  <input type="text" class="form-control" id="package_status" placeholder="Total SMS" v-model="form.package_status" name="package_status" :class="{ 'is-invalid': form.errors.has('package_status') }">
                                    <has-error :form="form" field="package_status"></has-error>
                                </div> -->


                                <div class="form-group">
                                  <label for="package_recruitment_service">Recruitment Service </label>
                                  <select class="form-control" :class="{ 'is-invalid': form.errors.has('package_recruitment_service') }" v-model="form.package_recruitment_service">
                                        <option disabled value="">Select One</option>
                                        <option value="no"  v-for="">No </option>
                                        <option value="yes"  v-for="">Yes </option>
                                        

                                    </select>
                                    <has-error :form="form" field="package_recruitment_service"></has-error>
                                </div>
                                  <div class="form-group">
                                  <label>Package For</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('package_for') }" v-model="form.package_for">
                                        <option disabled value="">Select One</option>
                                        <option value="All">All </option>
                                        <option value="Jobseeker">Job Seeker </option>
                                        <option value="Consultant">Consultant</option>
                                        <option value="Employer">Employer</option>

                                    </select>
                                    <has-error :form="form" field="package_for"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="basic_job">Basic Job </label>
                                  <input type="text" class="form-control" id="basic_job" placeholder="Add Basic Job" v-model="form.basic_job" name="basic_job" :class="{ 'is-invalid': form.errors.has('basic_job') }">
                                    <has-error :form="form" field="basic_job"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="hot_job">Hot Job </label>
                                  <input type="text" class="form-control" id="hot_job" placeholder="Add Hot Job" v-model="form.hot_job" name="hot_job" :class="{ 'is-invalid': form.errors.has('hot_job') }">
                                    <has-error :form="form" field="hot_job"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="premium_job">Premium Job </label>
                                  <input type="text" class="form-control" id="premium_job" placeholder="Add Premium Job" v-model="form.premium_job" name="premium_job" :class="{ 'is-invalid': form.errors.has('premium_job') }">
                                    <has-error :form="form" field="premium_job"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="package_service"> Service </label>
                                  <input type="text" class="form-control" id="package_service" placeholder="Add Package Service" v-model="form.package_service" name="package_service" :class="{ 'is-invalid': form.errors.has('package_service') }">
                                    <has-error :form="form" field="package_service"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="service_name">Service Name </label>
                                  <input type="text" class="form-control" id="service_name" placeholder="Add Service Name" v-model="form.service_name" name="service_name" :class="{ 'is-invalid': form.errors.has('service_name') }">
                                    <has-error :form="form" field="service_name"></has-error>
                                </div>

                                <div class="form-group">
                                  <label for="service_description">Service Description </label>
                                  <textarea class="form-control" id="service_description" placeholder="Add Service Description" v-model="form.service_description" name="service_description" :class="{ 'is-invalid': form.errors.has('service_description') }"></textarea>
                                    <has-error :form="form" field="service_description"></has-error>
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

               
                package_description:'',
                package_price:'',
                package_total_jobs:'',
                package_total_resume_downloads:'',
                package_total_excel_export:'',
                package_total_resume_views:'',
                package_total_resume_forward:'',
                package_total_resume_search:'',
                package_total_email:'',
                package_total_sms:'',
                package_status:'',
                package_recruitment_service:'',
                package_for:'',
                basic_job:'',
                hot_job:'',
                premium_job:'',
                validity:'',
                package_service:'',
                service_name:'',
                service_description:'',
                
                
                
             })
         }
     },
     mounted(){
          this.$store.dispatch('getAllData','/package')
        },
        computed:{
          
          allCountry(){
            return this.$store.getters.getAllData
          },
          
        },
      
        methods:{
          
            addpackage(){
                this.form.post('/add-package')
                    .then(()=>{
                        this.$router.push('/packagemanager-list')
                        toast({
                            type: 'success',
                            title: 'Package Added successfully'
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