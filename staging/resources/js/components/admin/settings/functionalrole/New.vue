<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Functional role</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Functional role</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addFunctionalrole()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="functionalrole"> Functional role Name</label>
                                  <input type="text" class="form-control" id="functionalrole" placeholder="Add Functional Role Name" v-model="form.functionalrole" name="functionalrole" :class="{ 'is-invalid': form.errors.has('functionalrole') }">
                                    <has-error :form="form" field="functionalrole"></has-error>
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
                functionalrole:'',
                
                
                
             })
         }
     },
      
        methods:{
          
            addFunctionalrole(){
                this.form.post('/add-functionalrole')
                    .then(()=>{
                        this.$router.push('/functionalrole-list')
                        toast({
                            type: 'success',
                            title: 'Functionalrole Added successfully'
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