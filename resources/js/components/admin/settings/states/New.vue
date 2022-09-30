<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add States</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Add New States</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addStates()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label>Select Country</label>
                                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('country_name') }" v-model="form.country_name">
                                        <option disabled value="">Select One</option>
                                        <option :value="con_name.country_id" name="country_name" v-for="con_name in allCountry">{{con_name.country_name}} </option>

                                    </select>
                                    <has-error :form="form" field="country_name"></has-error>
                                </div>
                              
                                <div class="form-group">
                                  <label for="state_name"> State Name</label>
                                  <input type="text" class="form-control" id="state_name" placeholder="Add State Name" v-model="form.state_name" name="state_name" :class="{ 'is-invalid': form.errors.has('state_name') }">
                                    <has-error :form="form" field="state_name"></has-error>
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
          country_name:[],
              form: new Form({
                state_name:'',
                country_name:'',
                
                
             })
         }
     },
     mounted(){
          this.$store.dispatch('getAllData','/countries')
        },
        computed:{
          
          allCountry(){
            return this.$store.getters.getAllData
          },
          
        },
      
        methods:{
          
            addStates(){
                this.form.post('/add-states')
                    .then(()=>{
                        this.$router.push('/states-list')
                        toast({
                            type: 'success',
                            title: 'State Added successfully'
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