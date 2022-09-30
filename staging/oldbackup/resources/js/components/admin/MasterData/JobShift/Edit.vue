<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Job Shift</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Job Shift</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updatejobshift()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="job_shift">Career Level Name</label>
                                  <input type="text" class="form-control" id="job_shift" placeholder="Add Job Category Name" v-model="form.job_shift" name="job_shift" :class="{ 'is-invalid': form.errors.has('job_shift') }">
                                    <has-error :form="form" field="job_shift"></has-error>
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
                    job_shift:'',
                })
            }
        },
        mounted(){
           
            this.$store.dispatch('getEditData',`/edit-jobshift/${this.$route.params.jobshiftid}`)
       },
        computed:{
          
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          }
          
        },
        methods:{
            updatejobshift(){
                this.form.post(`/update-jobshift/${this.$route.params.jobshiftid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/job-shift')
                        toast({
                            type: 'success',
                            title: 'Job Shift Updated Successfully'
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