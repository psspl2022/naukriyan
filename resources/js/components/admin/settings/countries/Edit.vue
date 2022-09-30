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
                            <h3 class="card-title">Edit Country</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateCountries()">
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
                    country_name:'',
                	currency:'',
                })
            }
        },
        mounted(){
           
            this.$store.dispatch('getEditData',`/edit-countries/${this.$route.params.countriesid}`)
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
            updateCountries(){
                this.form.post(`/update-countries/${this.$route.params.countriesid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/countries-list')
                        toast({
                            type: 'success',
                            title: 'Country Updated successfully'
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