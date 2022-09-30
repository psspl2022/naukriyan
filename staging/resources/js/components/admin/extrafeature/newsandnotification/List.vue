<template>
    <div>
        <section class="content">
            <div class="row justify-content-around">
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Package Manager List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-newsandnotification" style="color:#fff"> Add News And
                                        Notification
                                    </router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <table id="example1"
                                               class="table table-bordered table-hover dt-responsive table-striped">
                                            <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>News Subject</th>
                                                <th>One liner(News)</th>
                                                <th>Description</th>
                                                <th>News For</th>
                                                <th>Attachment</th>
                                                <th>Active</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(pack,index) in alldata" :key="pack.id">
                                                <td>{{index+1}}</td>
                                                <td>{{pack.news_subject}}</td>
                                                <td>{{pack.one_liner_news}}</td>
                                                <td>{{pack.description}}</td>
                                                <td>{{pack.news_for}}</td>
                                                <td><img :src="'attachment/'+pack.attachment"
                                                         style="height:50px;width:50px;"></td>

                                                <td v-if="pack.status=='1'">Active</td>
                                                <td v-if="pack.status=='0'">De-Active</td>
                                                <td>

                                                    <router-link :to="`/edit-newsandnotification/${pack.id}`"><i
                                                            class="far fa-edit"></i></router-link>
                                                    <a href="" @click.prevent="deletepackage(pack.id)"><i
                                                            class="far fa-trash-alt"></i></a>
                                                    <a href="" @click.prevent="deactivepackage(pack.id)"
                                                       v-if="pack.status=='1'">
                                                        <button name="status" type="button" value=""
                                                                class="btn btn-danger btn-sm">De-Active
                                                        </button>
                                                    </a>

                                                    <a href="" @click.prevent="activepackage(pack.id)"
                                                       v-if="pack.status=='0'">
                                                        <button name="status" type="button" value=""
                                                                class="btn btn-success btn-sm">Active
                                                        </button>
                                                    </a>
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
        mounted() {
            this.$store.dispatch('getAllData', '/newsandnotification')
        },
        computed: {
            alldata() {
                return this.$store.getters.getAllData
            }
        },
        methods: {
            deactivepackage(id) {
                var uri = '/deactive-news/' + id;
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
                            this.$store.dispatch('getAllData', '/newsandnotification')
                        });
                    }
                });
            },

            activepackage(id) {
                var uri = '/active-news/' + id;
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
                            this.$store.dispatch('getAllData', '/newsandnotification')
                        });
                    }
                });
            },
            deletepackage(id) {
                var uri = '/newsandnotification/' + id;
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
                            this.$store.dispatch('getAllData', '/newsandnotification')
                        });
                    }
                });
            }


        }
    }
</script>

<style scoped>
</style>