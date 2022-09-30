<template>
  <div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="title">Job Manager List</h3>
              </div>

              <div class="card-header">

                <div class="card-tools">
                  <!-- <button class="btn btn-primary">
                      <router-link to="/add-jobmanager" style="color:#fff"> Add Job Manager</router-link>
                  </button> -->
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <select name="company_id" class="form-control" v-model="company_id">
                        <option value="">-- Select Company --</option>
                        <option v-for='data in companies' :value='data.id'>{{ data.company_name }}
                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <select name="status" class="form-control" v-model="status">
                            <option value="">Status</option>
                            <option value="Active">Active</option>
                            <option value="Deactive">De-Active</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <button type="submit" name="submit" class="btn btn-primary"
                                  @click="getFilterData()">Search
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-striped">
                  <thead>
                  <tr>
                    <th>Company Name</th>
                    <th>Job Title</th>
                    <th>Job For</th>
                    <th>Position/Role</th>
                    <th>Address/Location</th>
                    <th>Salary(per annum)/CTC</th>
                    <th>Start/End Apply Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                    <th>Resume Received</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(job,index) in myData.data" :key="job.id">
                    <td>{{ job.company_name ? job.company_name : 'Not Available' }}</td>
                    <td>{{ job.title }}</td>
                    <td>{{ job.job_for }}</td>
                    <td>{{ job.job_role ? job.job_role : 'Not Available' }} /
                      {{ job.job_position ? job.job_position : 'Not Available' }}
                    </td>
                    <td>{{ job.job_address ? job.job_address : 'Not Available' }} /
                      {{ job.job_exp ? job.job_exp : 'Not Available' }}
                    </td>
                    <td>
                      {{ job.offered_sal_min ? job.offered_sal_min : 'Not Available' }}-{{ job.offered_sal_max ? job.offered_sal_max : 'Not Available' }}/{{ job.job_ctc ? job.job_ctc : 'Not Available' }}
                    </td>
                    <td>{{ job.start_apply_date ? job.start_apply_date : 'Not Available' }}
                      /{{ job.last_apply_date ? job.last_apply_date : 'Not Available' }}
                    </td>
                    <td>{{ job.status }}</td>

                    <td>

                      <!-- <router-link :to="`/edit-jobmanager/${job.id}`"><i class="far fa-edit"></i></router-link> -->
                      <a href="" @click.prevent="deletejob(job.id)"><i class="far fa-trash-alt"></i></a>
                      <button @click.prevent="deactivejob(job.id)" v-if="job.status==='Active'" class="btn btn-danger btn-sm">De-Active</button>
                      <button @click.prevent="activejob(job.id)" v-if="job.status==='Deactive'" class="btn btn-success btn-sm">Active</button>

                    </td>
                    <td>
                      <router-link :to="`/view/apply/candidate/${job.id}`">
                        <button class="btn btn-default btn-sm">View</button>
                      </router-link>
                    </td>
                  </tr>
                  </tbody>
                </table>

              </div>

              <div class="card-footer">
                <pagination :data="myData" @pagination-change-page="getFilterData"></pagination>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
  name: "List",
  data() {
    return {
      industry: 0,
      industries: [],
      company: 0,
      companies: [],
      industry_id: '',
      company_id: '',
      email: '',
      status: '',
      myData: [],
      demo: [],
      totalVal: ''

    }
  },
  mounted() {
    //this.$store.dispatch('getAllData','/job')
  },
  computed: {
    // alldata(){
    //     setTimeout(() => $('#example1').DataTable(), 1000);
    //     return this.$store.getters.getAllData
    //   }
  },
  methods: {
    getFilterData: function (page = 1) {
      let self = this;
      axios.get('job-filter?&company_id=' + this.company_id + '&status=' + this.status + '&page=' + page).then(function (response) {
        console.log(response.data.data);
        self.myData = response.data.data;
      });
    },
    getIndustries: function () {
      axios.get('get-industries-list')
          .then(function (response) {
            this.industries = response.data;
          }.bind(this));
    },
    getCompanies: function () {
      axios.get('get-companies-list')
          .then(function (response) {
            this.companies = response.data;
          }.bind(this));
    },
    deactivejob(id) {
      var uri = '/deactive-job/' + id;
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
            this.$store.dispatch('getAllData', '/job')
          });
          this.getFilterData();
        }
      });
    },
    activejob(id) {
      var uri = '/active-job/' + id;
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
            this.$store.dispatch('getAllData', '/job')
          });
          this.getFilterData();
        }
      });
    },
    deletejob(id) {
      var uri = '/job/' + id;
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
            this.$store.dispatch('getAllData', '/job')
          });
        }
      });
    }


  },
  created: function () {
    this.getIndustries()
    this.getCompanies()
    this.getFilterData()
  }
}
</script>

<style scoped>
.search-list {
  padding: 1rem;
  background-color: #fff;
  border: 1px solid #ddd;
  margin-top: 1rem;
  margin-bottom: 1rem;
}
</style>