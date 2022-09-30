<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Job Shift</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Job Shift</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="Jobshift()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="job_shift">Job Shift</label>
                                  <input type="text" class="form-control" id="job_shift" placeholder="Add Job Shift Name" v-model="form.job_shift" name="job_shift" :class="{ 'is-invalid': form.errors.has('job_shift') }">
                                    <has-error :form="form" field="job_shift"></has-error>
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
                job_shift:'',
               
             })
         }
     },
      
        methods:{
          
            Jobshift(){
                this.form.post('/add-jobshift')
                    .then(()=>{
                        this.$router.push('/job-shift')
                        toast({
                            type: 'success',
                            title: 'Job Shift Added successfully'
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