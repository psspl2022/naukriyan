<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Industry</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Industry</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addIndustry()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="industry_name"> Industry Name</label>
                                  <input type="text" class="form-control" id="industry_name" placeholder="Add Industry Name" v-model="form.industry_name" name="industry_name" :class="{ 'is-invalid': form.errors.has('industry_name') }">
                                    <has-error :form="form" field="industry_name"></has-error>
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
                industry_name:'',
                
                
                
             })
         }
     },
      
        methods:{
          
            addIndustry(){
                this.form.post('/add-industry')
                    .then(()=>{
                        this.$router.push('/industry-list')
                        toast({
                            type: 'success',
                            title: 'Industry Added successfully'
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