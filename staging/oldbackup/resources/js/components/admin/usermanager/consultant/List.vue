<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Consultant List</h3>
            </div>
            <div class="card-header">
              <a href="" @click.prevent="exportconsultants()" type="button"
                 class="btn btn-success btn-xl">Data Export in Excel</a>
              <a href="" type="button" @click.prevent="exportconsultantchecked()"
                 class="btn btn-success btn-xl" id="checkboxsButton">Data Export with Checked Row</a>
              <button class="btn btn-primary gr">
                <router-link to="/add-consultant" style="color:#fff"> Add Consultant</router-link>
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
                    <select name="company_id" class="form-control" v-model="company_id">
                      <option value="" disabled="">-- Select Company --</option>
                      <option v-for='data in companies' :value='data.id'>{{ data.company_name }}
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
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select name="status" class="form-control" v-model="status">
                          <option value="" disabled="">Status</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
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
                  <th>Company name</th>
                  <th>Industry</th>
                  <th>Functional area</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(consultants,index) in myData.data" :key="consultants.id">
                  <td><input type="checkbox" :value="consultants.id"
                             @click="uncheck(consultants.id)" v-model="checkedNames"></td>
                  <td>{{ index + 1 }}</td>
                  <td>{{ consultants.fname }} {{ consultants.lname }}</td>

                  <td>{{ consultants.email }}</td>
                  <td>{{ consultants.contact }}</td>
                  <!--  <td>{{consultants.username}}</td> -->
                  <td>{{ consultants.company_name }}</td>
                  <td>{{ consultants.category_name }}</td>
                  <td>{{ consultants.subcategory_name }}</td>
<!--                  <td>{{ consultants.use_recruitment_service }}</td>-->
<!--                  <td><input @click.prevent="disableedit(consultants.id)"-->
<!--                             name="can_edit_company" type="checkbox"-->
<!--                             v-if="consultants.can_edit_company==='Yes'" checked>-->
<!--                    <input @click.prevent="enableedit(consultants.id)"-->
<!--                           name="can_edit_company" type="checkbox"-->
<!--                           v-if="consultants.can_edit_company==='No'">-->
<!--                  </td>-->
                  <td>{{ consultants.active }}</td>

                  <td>

                    <router-link :to="`/edit-consultant/${consultants.id}`"><i
                        class="far fa-edit"></i></router-link>
                    <!-- <a href="" @click.prevent = "deleteEmployer(consultants.id)"><i class="far fa-trash-alt"></i></a> -->
                    <a href="" @click.prevent="deactiveconsultant(consultants.id)"
                       v-if="consultants.active==='Yes'">
                      <button name="status" type="button" value=""
                              class="btn btn-danger btn-xs">De-Active
                      </button>
                    </a>

                    <a href="" @click.prevent="activeconsultant(consultants.id)"
                       v-if="consultants.active==='No'">
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
              <pagination :data="myData" @pagination-change-page="getFilterData"></pagination>
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
  data() {
    return {
      checkedNames: [],
      checkedName: true,
      industry: 0,
      industries: [],
      company: 0,
      companies: [],
      industry_id: '',
      company_id: '',
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
      axios.get('consultant-filter?industry_id=' + this.industry_id + '&company_id=' + this.company_id + '&email=' + this.email + '&status=' + this.status + '&page=' + page).then(function (response) {
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
    deactiveconsultant(id) {
      var uri = '/deactive-consultant/' + id;
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
            this.$store.dispatch('getAllData', '/consultant')
          });
        }
      });
    },
    activeconsultant(id) {
      var uri = '/active-consultant/' + id;
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
            this.$store.dispatch('getAllData', '/consultant')
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
            this.$router.push('/consultant-list')
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
            this.$router.push('/consultant-list')
            window.location.reload();
          });
        }
      });
    },
    exportconsultants() {
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
          window.open('/export-consultant', '_blank');
        }
      });
    },


    exportconsultantchecked() {
      if (!this.checkedNames.length) {
        alert('Please select at least one row.');
      } else {
        swal.fire({
          title: 'Are you sure want export data?',
          text: "Job consultant details!",
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
            window.open('/export-consultant-checked/' + this.checkedNames, '_blank');
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
