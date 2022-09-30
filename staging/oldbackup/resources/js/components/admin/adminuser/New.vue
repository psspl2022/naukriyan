<template>
    <section class="content">
        <div class="container-fluid">
        <div class="row mb-2">
         <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add AdminUser</li>
            </ol>
          </div>
        </div>
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-11">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New AdminUser</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" @submit.prevent="addAdminuser()">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nameId">Name</label>
                                    <input type="text" class="form-control" id="nameId" placeholder="Name" v-model="form.name" name="name" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="designationId">Designation</label>
                                    <input type="text" class="form-control" id="designationId" placeholder="Designation" v-model="form.designation" name="designation" :class="{ 'is-invalid': form.errors.has('designation') }">
                                    <has-error :form="form" field="designation"></has-error>
                                </div>

                                <div class="form-group">
                                    <label for="emailId">Email</label>
                                    <input type="email" class="form-control" id="emailId" placeholder="Email" v-model="form.email" name="email" :class="{ 'is-invalid': form.errors.has('email') }">
                                    <has-error :form="form" field="email"></has-error>
                                </div>

                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" v-model="form.password" name="password" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                              </div>

                                <div class="form-group">
                                    <label for="phoneId">Mobile</label>
                                    <input type="number" class="form-control" id="phoneId" placeholder="Mobile" v-model="form.phone" name="phone" :class="{ 'is-invalid': form.errors.has('phone') }">
                                    <has-error :form="form" field="phone"></has-error>
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
            return {
                form: new Form({
                    name:'',
                    designation:'',
                    email:'',
                    password: '',
                    phone:'',
                })
            }
        },
        methods:{
            addAdminuser(){
                this.form.post('/add-adminuser')
                    .then(()=>{
                       this.$router.push('/adminuser-list')
                        toast({
                            type: 'success',
                            title: 'Admin User Added successfully'
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