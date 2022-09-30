<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Enquiry List</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1"
                     class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Enquiry type</th>
                  <th>Message</th>
                  <th>Date & Time</th>
                  <th>User Type</th>
                  <th>Current Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(enquiry,index) in alldata" :key="enquiry.id">
                  <td>{{ index + 1 }}</td>
                  <td>{{ enquiry.enq_name }}</td>

                  <td>{{ enquiry.enq_email }}</td>
                  <td v-if="enquiry.enq_type==='1'">Technical Enquiry</td>
                  <td v-if="enquiry.enq_type==='2'">General Enquiry</td>
                  <td v-if="enquiry.enq_type==='3'">Report An Issue</td>
                  <td v-if="enquiry.enq_type==='4'">Feedback</td>
                  <td v-if="enquiry.enq_type==='5'">Others</td>
                  <td>{{ enquiry.enq_message }}</td>
                  <td>{{ enquiry.enquiry_open_date }}</td>
                  <td>{{ enquiry.enq_usertype }}</td>

                  <td>{{ enquiry.enq_status }}</td>

                  <td>

                    <router-link :to="`/edit-enquiry/${enquiry.id}`">
                      <button class="btn btn-primary btn-xs" name="">Update</button>
                    </router-link>
                    <!-- <a href="" @click.prevent = "viewenquiry(enquiry.id)"><button name="view" type="button" value="" class="btn btn-success btn-xs">View</button></a>  -->
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
    this.$store.dispatch('getAllData', '/enquiry')
  },
  computed: {
    alldata() {
      setTimeout(() => $('#example1').DataTable(), 1000);
      return this.$store.getters.getAllData
    }
  },
  methods: {
    viewenquiry(id) {
      var uri = '/enquiry/' + id;
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
            this.$store.dispatch('getAllData', '/enquiry')
          });
        }
      });
    }
  }
}
</script>

<style scoped>
</style>