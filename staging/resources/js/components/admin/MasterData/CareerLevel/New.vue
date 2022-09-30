<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Career Level</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Career Level</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="CareerLevel()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="career_level"> Career level Name</label>
                                  <input type="text" class="form-control" id="career_level" placeholder="Add Career Level Name" v-model="form.career_level" name="career_level" :class="{ 'is-invalid': form.errors.has('career_level') }">
                                    <has-error :form="form" field="career_level"></has-error>
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
                career_level:'',
               
             })
         }
     },
      
        methods:{
          
            CareerLevel(){
                this.form.post('/add-careerlevel')
                    .then(()=>{
                        this.$router.push('/career-level')
                        toast({
                            type: 'success',
                            title: 'Career Level Added successfully'
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