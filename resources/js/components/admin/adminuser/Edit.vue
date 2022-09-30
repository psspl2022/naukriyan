<template>
    <section class="content">
        <div class="container-fluid">
             <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Admin User</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Admin User</h3>
                        </div>{{editData}}
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="updateAdminuser()">
                            <div class="card-body">
                                

                                <div class="form-group">
                                    <label for="nameId">Name</label>
                                    <input type="text" class="form-control" id="nameId" placeholder="Update Name" v-model="form.name" name="name" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="designationId">Designation</label>
                                    <input type="text" class="form-control" id="designationId" placeholder="Update Designation" v-model="form.job_title" name="job_title" :class="{ 'is-invalid': form.errors.has('job_title') }">
                                    <has-error :form="form" field="job_title"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="emailId">Email</label>
                                    <input type="email" class="form-control" id="emailId" placeholder="Update Email" v-model="form.email" name="email" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="phoneId">Mobile</label>
                                    <input type="number" class="form-control" id="phoneId" placeholder="Updated Mobile" v-model="form.mobile" name="mobile" :class="{ 'is-invalid': form.errors.has('mobile') }">
                                    <has-error :form="form" field="mobile"></has-error>
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
                    name:'',
                    job_title:'',
                    email:'',
                    mobile:'',
                })
            }
        },
      
        mounted(){
            this.$store.dispatch('getEditData',`/edit-adminuser/${this.$route.params.adminuserid}`)
        },
        computed:{
          editData(){
            this.form.fill(this.$store.getters.getEditData);// Fill the form with the data
          }
        },
        methods:{
            updateAdminuser(){
                this.form.post(`/update-adminuser/${this.$route.params.adminuserid}`)
                    .then((response)=>{
                        this.$router.push('/adminuser-list')

                        toast({
                            type: 'success',
                            title: 'Admin User Updated successfully'
                        })
                    })
                    .catch(()=>{

                    })

            }
        }
    }
</script>

<style scoped>

</style>