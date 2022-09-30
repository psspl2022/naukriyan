<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Countries</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New Country</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addCountries()">
                            <div class="card-body">
                                
                              
                                <div class="form-group">
                                  <label for="country_name"> Country Name</label>
                                  <input type="text" class="form-control" id="country_name" placeholder="Add Country Name" v-model="form.country_name" name="country_name" :class="{ 'is-invalid': form.errors.has('country_name') }">
                                    <has-error :form="form" field="country_name"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="currency"> Currency</label>
                                  <input type="text" class="form-control" id="currency" placeholder="Currency Name" v-model="form.currency" name="currency" :class="{ 'is-invalid': form.errors.has('currency') }">
                                    <has-error :form="form" field="currency"></has-error>
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
                country_name:'',
                currency:'',
                
                
             })
         }
     },
      
        methods:{
          
            addCountries(){
                this.form.post('/add-countries')
                    .then(()=>{
                        this.$router.push('/countries-list')
                        toast({
                            type: 'success',
                            title: 'Country Added successfully'
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