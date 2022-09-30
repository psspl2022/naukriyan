<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Countries List</h3>
              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link to="/add-countries" style="color:#fff"> Add Countries</router-link>
                </button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th>S.no</th>
                  <th>Country Name</th>
                  <th>Currency</th>
                  <th>Status</th>

                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(countries,index) in alldata" :key="countries.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ countries.country_name }}</td>

                  <td>{{ countries.currency }}</td>
                  <td></td>

                  <td>

                    <router-link :to="`/edit-countries/${countries.id}`"><i class="far fa-edit"></i></router-link>
                    <a href="" @click.prevent="deletecountries(countries.id)"><i class="far fa-trash-alt"></i></a>
                    <router-link :to="`/view-countries/${countries.id}`"><i class="far fa-eye"></i></router-link>
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
    this.$store.dispatch('getAllData', '/countries')
  },
  computed: {
    alldata() {
      setTimeout(() => $('#example1').DataTable(), 1000);
      return this.$store.getters.getAllData
    }
  },
  methods: {
    // deletecountries(id){
    //    axios.get('/countries/'+id)
    //        .then(()=>{
    //            this.$store.dispatch('getAllData','/countries')
    //            toast({
    //                type: 'success',
    //                title: 'countries Deleted successfully'
    //            })
    //        })
    //        .catch(()=>{

    //        })
    // }
    deletecountries(id) {
      var uri = '/countries/' + id;
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
            this.$store.dispatch('getAllData', '/countries')
          });
        }
      });
    }
  }
}
</script>

<style scoped>
</style>