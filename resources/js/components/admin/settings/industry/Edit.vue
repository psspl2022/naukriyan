<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Industry</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Industry</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateIndustry()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="category_name"> Industry Name</label>
                                  <input type="text" class="form-control" id="category_name" placeholder="Add Industry Name" v-model="form.category_name" name="category_name" :class="{ 'is-invalid': form.errors.has('category_name') }">
                                    <has-error :form="form" field="category_name"></has-error>
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
                    category_name:'',
                	
                })
            }
        },
        mounted(){
           
            this.$store.dispatch('getEditData',`/edit-industries/${this.$route.params.industryid}`)
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
            updateIndustry(){
                this.form.post(`/update-industries/${this.$route.params.industryid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/industry-list')
                        toast({
                            type: 'success',
                            title: 'Industry Updated successfully'
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