<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Job Type</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Job Type</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="Jobtype()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="job_type"> Career level Name</label>
                                  <input type="text" class="form-control" id="job_type" placeholder="Add Job Type Name" v-model="form.job_type" name="job_type" :class="{ 'is-invalid': form.errors.has('job_type') }">
                                    <has-error :form="form" field="job_type"></has-error>
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
                job_type:'',
               
             })
         }
     },
      
        methods:{
          
            Jobtype(){
                this.form.post('/add-jobtype')
                    .then(()=>{
                        this.$router.push('/job-type')
                        toast({
                            type: 'success',
                            title: 'Job Type Added successfully'
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