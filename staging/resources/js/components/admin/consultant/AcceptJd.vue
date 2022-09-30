<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Accept Job by Consultant(need to remove this (under development))</h3>

                            <div class="card-tools">
                                <!-- <button class="btn btn-primary">
                                    <router-link to="/add-jobs" style="color:#fff"> Add Jobs</router-link>
                                </button> -->
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
                                        <th>Consultant Name</th>
                                        <th>For Post</th>
                                        <th>Status</th>
                                       
                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="data in demo" :key="data.id" >
                                        <td>1</td>
                                        <td>{{ data.consultant ? data.consultant.company_name : 'N/a' }}</td>
                                         <td>{{data.jobmanager.title}}</td>
                                       
                                        <td>{{data.status}}</td>
                                        
                                       
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
        name: "Acceptjd",

        data() {
            return {
                demo: []
            }
        },

        mounted(){
          this.$store.dispatch('getAllData','/acceptjd')

          axios.get('acceptjd').then(response => {
            console.log(response);

            this.demo = response.data.data;
          })
        },
        computed:{
        alldata(){
            return this.$store.getters.getAllData
          }
        },
       
    }
</script>

<style scoped>
</style>