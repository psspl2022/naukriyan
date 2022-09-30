<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Functional Role List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-functionalrole" style="color:#fff"> Add Functional Role</router-link>
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
                                        <th>Functional Role Name</th>
                                        
                                        <th>Active</th>
                                        
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(functionalrole,index) in alldata" :key="functionalrole.id">
                                        <td>{{index+1}}</td>
                                        <td>{{functionalrole.subcategory_name}}</td>
                                         
                                        <td>{{functionalrole.active}}</td>
                                         
                                          
                                        
                                        <td>
                                        <router-link :to="`/edit-functionalrole/${functionalrole.id}`"><i class="far fa-edit"></i></router-link>
                                        <a href="" @click.prevent = "deletefunctionalrole(functionalrole.id)"><i class="far fa-trash-alt"></i></a>
                                        <router-link :to="`/view-functionalrole/${functionalrole.id}`"><i class="far fa-eye"></i></router-link>
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
          this.$store.dispatch('getAllData','/functionalrole')
          
        },
        computed:{
        alldata(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
            
          }
        },
        methods:{
            // deletefunctionalrole(id){
            //    axios.get('/functionalrole/'+id)
            //        .then(()=>{
            //            this.$store.dispatch('getAllData','/functionalrole')
            //            toast({
            //                type: 'success',
            //                title: 'functionalrole Deleted successfully'
            //            })
            //        })
            //        .catch(()=>{

            //        })
            // }
            deletefunctionalrole(id){
              var uri = '/functionalrole/'+id;
              swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.value) {
                  swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                    axios.get(uri).then(response => {
                     this.$store.dispatch('getAllData','/functionalrole')
                  });
                }
              });
        }
        }
    }
</script>

<style scoped>
</style>