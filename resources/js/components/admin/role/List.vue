<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-adminuser-role" style="color:#fff">Assign User Role</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                           <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Job Title</th>
                                        <th>Menu</th>th>Date</th>
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(role,index) in alldata" :key="role.id">
                                        <td>{{index+1}}</td>
                                        <td>{{role.name}}</td>
                                        <td>{{role.role_name}}</td>
                                        <td>{{role.roles_assigned}}</td>
                                        <td>
                                        <router-link :to="`/edit-adminuser-role/${role.id}`"><i class="far fa-edit"></i></router-link>
                                        <a href="" @click.prevent = "deleteadminuser(role.id)"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        </tr>
                                        </tbody>
                            </table>
                            </div>
                          </div>
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
       
        mounted(){
          this.$store.dispatch('getAllData','/rolelist')
        },
        computed:{
        alldata(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
          }
        },
        methods:{
            deleteadminuser(id){
               axios.get('/adminuser/'+id)
                   .then(()=>{
                       this.$store.dispatch('getAllData','/adminuser')
                       toast({
                           type: 'success',
                           title: 'Admin User Deleted successfully'
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