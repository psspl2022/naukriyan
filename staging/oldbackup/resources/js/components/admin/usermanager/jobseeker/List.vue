<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">JobSeeker List</h3>
            </div>
            <div class="card-header">
              <a href="" @click.prevent="exportjobseekers()" type="button"
                 class="btn btn-success btn-xl">Data Export in Excel</a>
              <a href="" type="button" @click.prevent="exportjobseekerchecked()"
                 class="btn btn-success btn-xl" id="checkboxsButton">Data Export with Checked Row</a>

              <button class="btn btn-primary gr">
                <router-link to="/add-jobseeker" style="color:#fff"> Add JobSeeker</router-link>
              </button>

              <button class="btn btn-primary gr">
                <router-link to="/send-credential-to-jobseeker" style="color:#fff"> Send Credential to JobSeeker</router-link>
              </button>

            </div>
            <div class="card-header">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <select name="industry_id" class="form-control" v-model="industry_id">
                      <option value="" disabled="">-- Select Industry Name --</option>
                      <option v-for='data in industries' :value='data.id'>{{
                          data.category_name
                        }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="text" name="email" class="form-control" v-model="email"
                           placeholder="Enter Email ID">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <select name="status" class="form-control" v-model="status">
                      <option value="" disabled="">Status</option>
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary"
                            @click="getFilterData()">Search
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1"
                     class="table table-bordered table-hover dt-responsive table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>Industry</th>
                  <th>Functional area</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(jobseekers,index) in myData.data" :key="jobseekers.id">
                  <td><input type="checkbox" id="checkvalue" :value="jobseekers.id"
                             @click="uncheck(jobseekers.id)" v-model="checkedNames"></td>
                  <td>{{ index + 1 }}</td>
                  <td>{{ jobseekers.fname }} {{ jobseekers.lname }}</td>

                  <td>{{ jobseekers.email }}</td>
                  <td>{{ jobseekers.contact }}</td>
                  <td>{{ jobseekers.category_name }}</td>
                  <td>{{ jobseekers.subcategory_name }}</td>
                  <td>{{ jobseekers.active }}</td>
                  <td>

                    <router-link :to="`/edit-jobseeker/${jobseekers.id}`">
                      <i class="far fa-edit"></i></router-link>
                    <!-- <a href="" @click.prevent = "deleteEmployer(jobseeker.id)"><i class="far fa-trash-alt"></i></a> -->
                    <a href="" @click.prevent="deactivejobseeker(jobseekers.id)" v-if="jobseekers.active==='Yes'">
                      <button name="status" type="button" value="" class="btn btn-danger btn-xs">De-Active
                      </button>
                    </a>

                    <a href="" @click.prevent="activejobseeker(jobseekers.id)"
                       v-if="jobseekers.active==='No'">
                      <button name="status" type="button" value=""
                              class="btn btn-success btn-xs">Active
                      </button>
                    </a>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <pagination :data="myData" :limit="10" @pagination-change-page="getFilterData"></pagination>
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
  data() {
    return {
      checkedNames: [],
      checkedName: true,
      industry: 0,
      industries: [],
      company: 0,
      companies: [],
      industry_id: '',
      email: '',
      status: '',
      myData: []
    }
  },
  methods: {
    uncheck: function (id) {
      this.checkedName = !this.checkedName;
      let cv = document.getElementById("checkvalue").value;
      document.getElementById("checkvalue").value = id + "," + cv;
    },

    getFilterData: function (page = 1) {
      let self = this;
      axios.get('jobseeker-filter?industry_id=' + this.industry_id + '&email=' + this.email + '&status=' + this.status + '&page=' + page).then(function (response) {
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
    deactivejobseeker(id) {
      var uri = '/deactive-jobseeker/' + id;
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
            this.$store.dispatch('getAllData', '/jobseeker')
          });
        }
      });
    },
    activejobseeker(id) {
      var uri = '/active-jobseeker/' + id;
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
            this.$store.dispatch('getAllData', '/jobseeker')
          });
        }
      });
    },
    enableedit(id) {
      var uri = '/company-edit-enable/' + id;
      swal.fire({
        title: 'Are you sure want to change Status',
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
            this.$router.push('/employer-list')
            window.location.reload();
          });
        }
      });
    },
    disableedit(id) {
      var uri = '/company-edit-disable/' + id;
      swal.fire({
        title: 'Are you sure want to change Status',
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
            this.$router.push('/jobseeker-list')
            window.location.reload();
          });
        }
      });
    },
    exportjobseekers() {
      swal.fire({
        title: 'Are you sure want export all data?',
        text: "Companies details!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, export it!'
      }).then((result) => {
        if (result.value) {
          swal.fire(
              'Data Export!',
              'Data Exported successfully.',
              'success'
          )
          window.open('/export-jobseeker', '_blank');
        }
      });
    },
    exportjobseekerchecked() {
      if (!this.checkedNames.length) {
        alert('Please select at least one row');
      } else {
        swal.fire({
          title: 'Are you sure want export data?',
          text: "Job seeker details!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, export it!'
        }).then((result) => {
          if (result.value) {
            swal.fire(
                'Data Export!',
                'Data Exported successfully.',
                'success'
            )
            window.open('/export-jobseeker-checked/' + this.checkedNames, '_blank');
          }
        });
      }
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
</style>
