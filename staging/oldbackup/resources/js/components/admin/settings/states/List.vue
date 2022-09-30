<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">States List</h3>
              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link to="/add-states" style="color:#fff"> Add States</router-link>
                </button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th>S.no</th>
                  <th>State Name</th>
                  <th>Active</th>

                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(states,index) in alldata" :key="states.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ states.states_name }}</td>
                  <td>{{ states.active }}</td>


                  <td>
                    <router-link :to="`/edit-states/${states.id}`"><i class="far fa-edit"></i></router-link>
                    <a href="" @click.prevent="deletestates(states.id)"><i class="far fa-trash-alt"></i></a>
                    <router-link :to="`/view-states/${states.id}`"><i class="far fa-eye"></i></router-link>
                  </td>
                </tr>
                </tbody>
              </table>
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
    this.$store.dispatch('getAllData', '/states')
  },
  computed: {
    alldata() {
      setTimeout(() => $('#example1').DataTable(), 1000);
      return this.$store.getters.getAllData
    }
  },
  methods: {
    // deletestates(id){
    //    axios.get('/states/'+id)
    //        .then(()=>{
    //            this.$store.dispatch('getAllData','/states')
    //            toast({
    //                type: 'success',
    //                title: 'states Deleted successfully'
    //            })
    //        })
    //        .catch(()=>{

    //        })
    // }
    deletestates(id) {
      var uri = '/states/' + id;
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
            this.$store.dispatch('getAllData', '/states')
          });
        }
      });
    }
  }
}
</script>

<style scoped>
</style>