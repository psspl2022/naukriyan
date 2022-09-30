<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Qualification</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Qualification</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="Qualification()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="qualification">Qualification</label>
                                  <input type="text" class="form-control" id="qualification" placeholder="Add Qualification Name" v-model="form.qualification" name="qualification" :class="{ 'is-invalid': form.errors.has('qualification') }">
                                    <has-error :form="form" field="qualification"></has-error>
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
                qualification:'',
               
             })
         }
     },
      
        methods:{
          
            Qualification(){
                this.form.post('/add-qualification')
                    .then(()=>{
                        this.$router.push('/qualification-list')
                        toast({
                            type: 'success',
                            title: 'Qualification Added successfully'
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