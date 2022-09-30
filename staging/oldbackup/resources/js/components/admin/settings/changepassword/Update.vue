<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Password</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header gr">
                            <h3 class="card-title">Change Password</h3>
                        </div>  {{editData}} 
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updatePassword()">
                            <div class="card-body">
                                <div class="form-group">
                                  <label for="new_password">New Password</label>
                                  <input type="password" class="form-control" id="new_password" placeholder="New Password" v-model="form.new_password" name="new_password" :class="{ 'is-invalid': form.errors.has('new_password') }">
                                    <has-error :form="form" field="new_password"></has-error>
                                </div>
                                <div class="form-group">
                                  <label for="confirm_password">Confirm Password</label>
                                  <input type="text" class="form-control" id="confirm_password" placeholder="Confirm Password" v-model="form.confirm_password" name="confirm_password" :class="{ 'is-invalid': form.errors.has('confirm_password') }">
                                    <has-error :form="form" field="confirm_password"></has-error>
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
        name: "Update",
        data(){
            return {
                form: new Form({
                    new_password:'',
                	confirm_password:'',
                })
            }
        },
        mounted(){
           
            //this.$store.dispatch('getEditData',`/get-password/${this.$route.params.passwordid}`)
       },
        computed:{
          
          // editData(){
          //   this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          // }
          
        },
        methods:{
            updatePassword(){
                this.form.post(`/update-password`)
                    .then((response)=>{
                        console.log(response);
                        //this.$router.push('/')
                        toast({
                            type: 'success',
                            title: 'Password Updated successfully'
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