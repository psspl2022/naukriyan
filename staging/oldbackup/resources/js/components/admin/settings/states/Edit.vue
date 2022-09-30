<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Country</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit States</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateStates()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="state_name"> State Name</label>
                                  <input type="text" class="form-control" id="state_name" placeholder="Add State Name" v-model="form.states_name" name="states_name" :class="{ 'is-invalid': form.errors.has('states_name') }">
                                    <has-error :form="form" field="states_name"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="country_id"> Country Name</label>
                                  <input type="text" class="form-control" id="country_id" placeholder="Country Name" v-model="form.country_id" name="country_id" :class="{ 'is-invalid': form.errors.has('country_id') }">
                                    <has-error :form="form" field="country_id"></has-error>
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
                    states_name:'',
                	country_id:'',
                })
            }
        },
        mounted(){
           
            this.$store.dispatch('getEditData',`/edit-states/${this.$route.params.statesid}`)
       },
        computed:{
          
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          }
          
        },
        methods:{
             changePdf(event){
                let file = event.target.files[0];

                if(file.size>8388608){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Why do I have this issue?</a>'
                    })
                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.attachment = event.target.result
                    };
                    reader.readAsDataURL(file);
                }

            },
            updateStates(){
                this.form.post(`/update-states/${this.$route.params.statesid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/states-list')
                        toast({
                            type: 'success',
                            title: 'States Updated successfully'
                        })
                    })
                    .catch(()=>{

                    })

            },
            
        }
    }
</script>

<style scoped>
textarea, input {
 
  -webkit-appearance: textfield; 
}
</style>