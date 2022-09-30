<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Job Posted Type</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Job Posted Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="Jobposted()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="jobposted_category"> Category Name</label>
                                  <input type="text" class="form-control" id="jobposted_category" placeholder="Add Job Category Name" v-model="form.jobposted_category" name="jobposted_category" :class="{ 'is-invalid': form.errors.has('jobposted_category') }">
                                    <has-error :form="form" field="jobposted_category"></has-error>
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
                jobposted_category:'',
               
             })
         }
     },
      
        methods:{
          
            Jobposted(){
                this.form.post('/add-jobpostedtype')
                    .then(()=>{
                        this.$router.push('/job-posted-type')
                        toast({
                            type: 'success',
                            title: 'Job Category Added successfully'
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