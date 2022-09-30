<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Job Walkins List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-jobwalkins" style="color:#fff"> Add Job Walkins</router-link>
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
                                        <th>Walkins name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        
                                        
                                        <th>Status</th>
                                        
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(jobwalkins,index) in alldata" :key="jobwalkins.id">
                                        <td>{{index+1}}</td>
                                        <th>{{jobwalkins.walking_name}}</th>
                                        <th>{{jobwalkins.start_date}}</th>
                                        <th>{{jobwalkins.end_date}}</th>
                                        <th>{{jobwalkins.time_from}}</th>
                                         <th>{{jobwalkins.time_to}}</th>
                                        
                                        <td v-if="jobwalkins.status=='1'">Active</td>
                                        <td v-else="jobwalkins.status=='0'">De-Active</td>
                                        
                                        <td>
                                        
                                        <router-link :to="`/edit-jobwalkins/${jobwalkins.id}`"><i class="far fa-edit"></i></router-link>
                                        <a href="" @click.prevent = "deletejobwalkins(jobwalkins.id)"><i class="far fa-trash-alt"></i></a>
                                        <a href="" @click.prevent = "deactivejobwalkins(jobwalkins.id)" v-if="jobwalkins.status=='1'"><button name="status" type="button" value="" class="btn btn-danger btn-sm">De-Active</button></a>
                                        
                                       <a href="" @click.prevent = "activejobwalkins(jobwalkins.id)" v-if="jobwalkins.status=='0'"><button name="status" type="button" value="" class="btn btn-success btn-sm">Active</button></a>
                                        
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
          this.$store.dispatch('getAllData','/jobwalkins')
        },
        computed:{
        alldata(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
          }
        },
        methods:{
            deactivejobwalkins(id){
              var uri = '/deactive-jobwalkins/'+id;
              swal.fire({
              title: 'Are you sure want to change?',
              text: "You would be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, change it!'
              }).then((result) => {
                if (result.value) {
                  swal.fire(
                    'Change status!',
                    'Your status has been changed.',
                    'success'
                  )
                    axios.get(uri).then(response => {
                     this.$store.dispatch('getAllData','/jobwalkins')
                  });
                }
              });
        },
        
        activejobwalkins(id){
              var uri = '/active-jobwalkins/'+id;
              swal.fire({
              title: 'Are you sure want to change?',
              text: "You would be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, change it!'
              }).then((result) => {
                if (result.value) {
                  swal.fire(
                    'Change status!',
                    'Your status has been changed.',
                    'success'
                  )
                    axios.get(uri).then(response => {
                     this.$store.dispatch('getAllData','/jobwalkins')
                  });
                }
              });
        },
            deletejobwalkins(id){
              var uri = '/jobwalkins/'+id;
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
                     this.$store.dispatch('getAllData','/jobwalkins')
                  });
                }
              });
        }
        }
    }
</script>

<style scoped>
</style>