<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Job Sector</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Job Sector</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updatejobsector()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="job_sector">Job Sector Name</label>
                                  <input type="text" class="form-control" id="job_sector" placeholder="Add Job Category Name" v-model="form.job_sector" name="job_sector" :class="{ 'is-invalid': form.errors.has('job_sector') }">
                                    <has-error :form="form" field="job_sector"></has-error>
                                </div>

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
                    job_sector:'',
                })
            }
        },
        mounted(){
           
            this.$store.dispatch('getEditData',`/edit-jobsector/${this.$route.params.jobsectorid}`)
       },
        computed:{
          
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          }
          
        },
        methods:{
            updatejobsector(){
                this.form.post(`/update-jobsector/${this.$route.params.jobsectorid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/job-sector')
                        toast({
                            type: 'success',
                            title: 'Job Category Updated successfully'
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