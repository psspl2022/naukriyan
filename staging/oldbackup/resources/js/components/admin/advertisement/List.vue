<template>
    <div>
        <section class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Advertisement List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-advertisement" style="color:#fff"> Add Advertisement
                                    </router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1"
                                 class="table table-bordered table-hover dt-responsive table-striped">
                            <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Title</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Ads For</th>
                              <th>Attachment</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(advertisement,index) in alldata" :key="advertisement.id">
                              <td>{{index+1}}</td>
                              <td>{{ advertisement.ads_title }}</td>

                              <td>{{ advertisement.ads_startdate }}</td>

                              <td>{{ advertisement.ads_enddate }}</td>
                              <td>{{ advertisement.ads_for }}</td>
                              <td><img :src="'adsimage/'+advertisement.ads_image"
                                       style="height:50px;width:50px;"></td>
                              <td>{{ advertisement.ads_status }}</td>
                              <td>

                                <router-link :to="`/edit-advertisement/${advertisement.id}`"><i
                                    class="far fa-edit"></i></router-link>
                                <a href="" @click.prevent="deleteadvertisement(advertisement.id)"><i
                                    class="far fa-trash-alt"></i></a>

                                <a href="" @click.prevent="deactiveadvertisement(advertisement.id)"
                                   v-if="advertisement.ads_status==='Active'">
                                  <button name="ads_status" type="button" value=""
                                          class="btn btn-danger btn-xs">De-Active
                                  </button>
                                </a>

                                <a href="" @click.prevent="activeadvertisement(advertisement.id)"
                                   v-if="advertisement.ads_status==='Not Active'">
                                  <button name="ads_status" type="button" value=""
                                          class="btn btn-success btn-xs">Active
                                  </button>
                                </a>
                              </td>
                            </tr>
                            </tbody>
                          </table>
                        </div>
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
        mounted() {
            this.$store.dispatch('getAllData', '/advertisement')
        },
        computed: {
            alldata() {
                return this.$store.getters.getAllData
            }
        },
        methods: {
            deleteadvertisement(id) {
                var uri = '/advertisement/' + id;
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
                        axios.get(uri).then(response => {
                            this.$store.dispatch('getAllData', '/advertisement')
                            swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        });
                    }
                });
            },
            deactiveadvertisement(id) {
                var uri = '/deactive-advertisement/' + id;
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
                        axios.get(uri).then(response => {
                            this.$store.dispatch('getAllData', '/advertisement')
                            swal.fire(
                                'Change status!',
                                'Your status has been changed.',
                                'success'
                            )
                        });
                    }
                });
            },
            activeadvertisement(id) {
                var uri = '/active-advertisement/' + id;
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
                        axios.get(uri).then(response => {
                            swal.fire(
                                'Change status!',
                                'Your status has been changed.',
                                'success'
                            )
                            this.$store.dispatch('getAllData', '/advertisement')
                        });
                    }
                });
            }
        }
    }
</script>

<style scoped>
</style>