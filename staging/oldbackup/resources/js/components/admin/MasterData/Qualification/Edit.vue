<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Qualification</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Edit Qualification</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updatequalification()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="qualification">Career Level Name</label>
                                  <input type="text" class="form-control" id="qualification" placeholder="Add Qualification Name" v-model="form.qualification" name="qualification" :class="{ 'is-invalid': form.errors.has('qualification') }">
                                    <has-error :form="form" field="qualification"></has-error>
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
                    qualification:'',
                })
            }
        },
        mounted(){
           
            this.$store.dispatch('getEditData',`/edit-qualification/${this.$route.params.qualificationid}`)
       },
        computed:{
          
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          }
          
        },
        methods:{
            updatequalification(){
                this.form.post(`/update-qualification/${this.$route.params.qualificationid}`)
                    .then((response)=>{
                        console.log(response);
                        this.$router.push('/qualification-list')
                        toast({
                            type: 'success',
                            title: 'Qualification Updated Successfully'
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