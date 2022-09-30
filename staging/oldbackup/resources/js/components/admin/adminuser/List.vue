<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin User List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-adminuser" style="color:#fff"> Add Admin User</router-link>
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
                                      <th>Email</th>
                                      <th>Mobile</th>
                                      <th>Date</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr v-for="(admin,index) in alldata" :key="admin.id">
                                    <td>{{index+1}}</td>
                                    <td>{{admin.name}}</td>
                                    <td>{{admin.email}}</td>
                                    <td>{{admin.mobile}}</td>
                                    <td>{{admin.created_at | timeformat}}</td>
                                    <td>
                                    <router-link :to="`/edit-adminuser/${admin.id}`"><i class="far fa-edit"></i></router-link>
                                    <a href="" @click.prevent = "deleteadminuser(admin.id)"><i class="far fa-trash-alt"></i></a>
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
          this.$store.dispatch('getAllData','/adminuser')
        },

        computed:{
          alldata(){
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