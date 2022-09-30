<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cities List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="" style="color:#fff"> Add cities</router-link>
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
                                        <th>City Name</th>
                                        <th>State Name</th>
                                        <th>Active</th>
                                        
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(cities,index) in alldata" :key="cities.id">
                                        <td>{{index+1}}</td>
                                        <td>{{cities.cities_name}}</td>
                                         <td>{{cities.states_name}}</td>
                                        <td>{{cities.active}}</td>
                                         
                                          
                                        
                                        <td>
                                        <router-link :to="`/edit-cities/${cities.id}`"><i class="far fa-edit"></i></router-link>
                                        <a href="" @click.prevent = "deletecities(cities.id)"><i class="far fa-trash-alt"></i></a>
                                        <router-link :to="`/view-cities/${cities.id}`"><i class="far fa-eye"></i></router-link>
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
          this.$store.dispatch('getAllData','/cities')
          
        },
        computed:{
        alldata(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
            
          }
        },
        methods:{
            // deletecities(id){
            //    axios.get('/cities/'+id)
            //        .then(()=>{
            //            this.$store.dispatch('getAllData','/cities')
            //            toast({
            //                type: 'success',
            //                title: 'cities Deleted successfully'
            //            })
            //        })
            //        .catch(()=>{

            //        })
            // }
            deletecities(id){
              var uri = '/cities/'+id;
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
                     this.$store.dispatch('getAllData','/cities')
                  });
                }
              });
        }
        }
    }
</script>

<style scoped>
</style>