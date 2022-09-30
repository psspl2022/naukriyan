<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Package Manager List</h3>

              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link to="/add-packagemanager" style="color:#fff"> Add Package Manager</router-link>
                </button>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th>S.no</th>
                  <th>Package Name</th>
                  <th>Type</th>
                  <th>Amount</th>
                  <th>Validity</th>
                  <th>Active</th>

                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(pack,index) in alldata" :key="pack.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ pack.package_name }}</td>
                  <td>{{ pack.package_for }}</td>
                  <td>{{ pack.package_price }}</td>
                  <td>{{ pack.validity }}</td>
                  <td>{{ pack.package_status }}</td>

                  <td>

                    <router-link :to="`/edit-packagemanager/${pack.id}`"><i class="far fa-edit"></i></router-link>
                    <a href="" @click.prevent="deletepackage(pack.id)"><i class="far fa-trash-alt"></i></a>
                    <a href="" @click.prevent="deactivepackage(pack.id)" v-if="pack.package_status==='Yes'">
                      <button name="status" type="button" value="" class="btn btn-danger btn-sm">De-Active</button>
                    </a>

                    <a href="" @click.prevent="activepackage(pack.id)" v-if="pack.package_status==='No'">
                      <button name="status" type="button" value="" class="btn btn-success btn-sm">Active</button>
                    </a>
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
    this.$store.dispatch('getAllData', '/package')
  },
  computed: {
    alldata() {
      setTimeout(() => $('#example1').DataTable(), 1000);
      return this.$store.getters.getAllData
    }
  },
  methods: {
    deactivepackage(id) {
      var uri = '/deactive-package/' + id;
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
            this.$store.dispatch('getAllData', '/package')
          });
        }
      });
    },
    /*deactivepackage(id){
          var uri = '/deactive-package/'+id;
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
                 this.$store.dispatch('getAllData','/package')
              });
            }
          });
    },*/
    activepackage(id) {
      var uri = '/active-package/' + id;
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
            this.$store.dispatch('getAllData', '/package')
          });
        }
      });
    },
    deletepackage(id) {
      var uri = '/package/' + id;
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
            this.$store.dispatch('getAllData', '/package')
          });
        }
      });
    }


  }
}
</script>

<style scoped>
</style>