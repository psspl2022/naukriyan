<template>
    <div>
        <section class="content">
            <div class="row justify-content-around" >
                <div class="col-11 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Qualification List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-qualification" style="color:#fff"> Add Qualification</router-link>
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
                                        <th>Qualification</th>
                                        
                                        <th>Status</th>
                                        
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(qualification,index) in alldata" :key="qualification.id">
                                        <td>{{index+1}}</td>
                                        <td>{{qualification.qualification}}</td>
                                        
                                        <td v-if="qualification.status=='1'">Active</td>
                                        <td v-else="qualification.status=='0'">De-Active</td>
                                        
                                        <td>
                                        
                                        <router-link :to="`/edit-qualification/${qualification.id}`"><i class="far fa-edit"></i></router-link>
                                        <a href="" @click.prevent = "deletequalification(qualification.id)"><i class="far fa-trash-alt"></i></a>
                                        <a href="" @click.prevent = "deactivequalification(qualification.id)" v-if="qualification.status=='1'"><button name="status" type="button" value="" class="btn btn-danger btn-sm">De-Active</button></a>
                                        
                                       <a href="" @click.prevent = "activequalification(qualification.id)" v-if="qualification.status=='0'"><button name="status" type="button" value="" class="btn btn-success btn-sm">Active</button></a>
                                        
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
          this.$store.dispatch('getAllData','/qualification')
        },
        computed:{
        alldata(){
            setTimeout(() => $('#example1').DataTable(), 1000);
            return this.$store.getters.getAllData
          }
        },
        methods:{
            deactivequalification(id){
              var uri = '/deactive-qualification/'+id;
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
                     this.$store.dispatch('getAllData','/qualification')
                  });
                }
              });
        },
        
        activequalification(id){
              var uri = '/active-qualification/'+id;
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
                     this.$store.dispatch('getAllData','/qualification')
                  });
                }
              });
        },
            deletequalification(id){
              var uri = '/qualification/'+id;
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
                     this.$store.dispatch('getAllData','/qualification')
                  });
                }
              });
        }
        }
    }
</script>

<style scoped>
</style>