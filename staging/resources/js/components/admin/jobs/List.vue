<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Jobs List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-jobs" style="color:#fff"> Add Jobs</router-link>
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
                                        <th>Advertisement</th>
                                        <th>Designation</th>
                                        <th>No Vacancy</th>
                                        <th>Opening Date</th>
                                        <th>Closing Date</th>
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(jobs,index) in alldataJobs" :key="jobs.id">
                                        <td>{{index+1}}</td>
                                        <td v-if="jobs.advertisement">{{ jobs.advertisement.advertisement_no }}</td>
                                         <td v-else></td>
                                        <td v-if="jobs.designation">{{ jobs.designation.designation }}</td>
                                         <td v-else></td>
                                        <td>{{ jobs.no_of_vacancy }}</td>
                                        <td>{{ jobs.opening_date | timeformat }}</td>
                                        <td>{{ jobs.closing_date | timeformat }}</td>
                                        <td>
                                        
                                        <router-link :to="`/edit-jobs/${jobs.id}`"><i class="far fa-edit"></i></router-link>
                                        <a href="" @click.prevent = "deleteJobs(jobs.id)"><i class="far fa-trash-alt"></i></a>
                                        <router-link :to="`/view-jobs/${jobs.id}`"><i class="far fa-eye"></i></router-link>
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
          this.$store.dispatch('getAllData','/jobs')
        },
        computed:{
        alldataJobs(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
          }
        },
        methods:{
            // deleteJobs(id){
            //    axios.get('/jobs/'+id)
            //        .then(()=>{
            //            this.$store.dispatch('getAllData','/jobs')
            //            toast({
            //                type: 'success',
            //                title: 'Jobs Deleted successfully'
            //            })
            //        })
            //        .catch(()=>{

            //        })
            // }
            deleteJobs(id){
              var uri = '/jobs/'+id;
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
                     this.$store.dispatch('getAllData','/jobs')
                  });
                }
              });
        }
        }
    }
</script>

<style scoped>
</style>