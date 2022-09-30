<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Employer List</h3>
            </div>

            <div class="card-header">
              <a
                href=""
                @click.prevent="exportemployers()"
                type="button"
                class="btn btn-success btn-xl"
                >Data Export in Excel</a
              >

              <a
                href=""
                type="button"
                @click.prevent="exportcompanieschecked()"
                class="btn btn-success btn-xl"
                id="checkboxsButton"
                >Data Export with Checked Row</a
              >
              <button class="btn btn-primary gr">
                <router-link to="/add-employer" style="color: #fff">
                  Add Employer</router-link
                >
              </button>
            </div>
            <div class="card-header">
              <div class="row">
                <div class="col-md-2">
                  <label>Industry</label>
                  <div class="form-group">
                    <select
                      name="industry_id"
                      class="form-control"
                      v-model="industry_id"
                    >
                      <option value="">-- Select Industry Name --</option>
                      <option
                        v-for="data in industries"
                        :value="data.id"
                        :key="data.id"
                      >
                        {{ data.category_name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Company</label>
                  <div class="form-group">
                    <select
                      name="company_id"
                      class="form-control"
                      v-model="company_id"
                    >
                      <option value="">-- Select Company --</option>
                      <option
                        v-for="data in companies"
                        :value="data.id"
                        :key="data.id"
                      >
                        {{ data.company_name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Email</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="email"
                      class="form-control"
                      v-model="email"
                      placeholder="Enter Email ID"
                    />
                  </div>
                </div>
                <div class="col-md-2">
                  <label>From Date</label>
                  <div class="form-group">
                    <input
                      type="date"
                      name="from_date"
                      class="form-control"
                      v-model="from_date"
                      placeholder="Enter From Date"
                    />
                  </div>
                </div>
                <div class="col-md-2">
                  <label>To Date</label>
                  <div class="form-group">
                    <input
                      type="date"
                      name="to_date"
                      class="form-control"
                      v-model="to_date"
                      placeholder="Enter To Date"
                    />
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Status</label>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select
                          name="status"
                          class="form-control"
                          v-model="status"
                        >
                          <option value="">Active</option>
                          <option value="yes">Yes</option>
                          <option value="no">No</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <button
                          type="submit"
                          name="submit"
                          class="btn btn-primary"
                          @click="getFilterData()"
                        >
                          Search
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <b>Showing :</b>
              <span
                >{{ resultInfo.from ? resultInfo.from : 0 }} –
                {{ resultInfo.to ? resultInfo.to : 0 }} of
                {{ resultInfo.total ? resultInfo.total : 0 }} Jobs.</span
              >
              <table
                id="example1"
                class="
                  table table-bordered table-hover
                  dt-responsive
                  table-striped
                  mt-4
                "
              >
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
                  <tr
                    v-for="(employers, index) in myData.data"
                    :key="employers.id"
                  >
                    <td>
                      <input
                        type="checkbox"
                        name="emp_check"
                        :value="employers.id"
                        @click="uncheck(employers.id)"
                        v-model="checkedNames"
                      />
                    </td>
                    <td>{{ index + 1 }}</td>
                    <td>{{ employers.fname }} {{ employers.lname }}</td>

                    <td>{{ employers.email }}</td>
                    <td>{{ employers.contact }}</td>
                    <td>{{ employers.company_name }}</td>
                    <td>{{ employers.category_name }}</td>
                    <td>{{ employers.subcategory_name }}</td>

                    <td>{{ employers.active }}</td>

                    <td>
                      <router-link :to="`/edit-employer/${employers.id}`"
                        ><i class="far fa-edit"></i
                      ></router-link>

                      <a
                        href=""
                        @click.prevent="deactiveemployer(employers.id)"
                        v-if="employers.active === 'Yes'"
                      >
                        <button
                          name="status"
                          type="button"
                          value=""
                          class="btn btn-danger btn-xs"
                        >
                          De-Active
                        </button>
                      </a>

                      <a
                        href=""
                        @click.prevent="activeemployer(employers.id)"
                        v-if="employers.active === 'No'"
                      >
                        <button
                          name="status"
                          type="button"
                          value=""
                          class="btn btn-success btn-xs"
                        >
                          Active
                        </button>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <pagination
                :data="myData"
                @pagination-change-page="getFilterData"
              ></pagination>
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
var moment = require("moment");
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
      industry_id: "",
      company_id: "",
      email: "",
      status: "",
      from_date: "",
      to_date: "",
      myData: [],
      resultInfo: "",
    };
  },
  mounted() {},
  computed: {},
  methods: {
    uncheck: function (id) {
      this.checkedName = !this.checkedName;
      let cv = document.getElementById("checkvalue").value;
      let newcv = id + "," + cv;
      document.getElementById("checkvalue").value = newcv;
    },
    getFilterData: function (page = 1) {
      let self = this;
      if (this.$route.query.curdate) {
        this.from_date = moment().format("YYYY-MM-DD");
        this.$router.replace("/employer-list");
      }
      axios
        .get(
          "employer-filter?industry_id=" +
            this.industry_id +
            "&company_id=" +
            this.company_id +
            "&email=" +
            this.email +
            "&status=" +
            this.status +
            "&from_date=" +
            this.from_date +
            "&to_date=" +
            this.to_date +
            "&page=" +
            page
        )
        .then(function (response) {
          self.myData = response.data.data;
          self.resultInfo = response.data.data;
        });
    },
    getIndustries: function () {
      axios.get("get-industries-list").then(
        function (response) {
          this.industries = response.data;
        }.bind(this)
      );
    },
    getCompanies: function () {
      axios.get("get-companies-list").then(
        function (response) {
          this.companies = response.data;
        }.bind(this)
      );
    },

    deactiveemployer(id) {
      var uri = "/deactive-employer/" + id;
      swal
        .fire({
          title: "Are you sure want to change?",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire(
              "Change status!",
              "Your status has been changed.",
              "success"
            );
            axios.get(uri).then((response) => {
              this.$store.dispatch("getAllData", "/employer");
            });
          }
        });
    },
    activeemployer(id) {
      var uri = "/active-employer/" + id;
      swal
        .fire({
          title: "Are you sure want to change?",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire(
              "Change status!",
              "Your status has been changed.",
              "success"
            );
            axios.get(uri).then((response) => {
              this.$store.dispatch("getAllData", "/employer");
            });
          }
        });
    },
    enableedit(id) {
      var uri = "/company-edit-enable/" + id;
      swal
        .fire({
          title: "Are you sure want to change Status",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire(
              "Change status!",
              "Your status has been changed.",
              "success"
            );

            axios.get(uri).then((response) => {
              this.$router.push("/employer-list");
              window.location.reload();
            });
          }
        });
    },
    disableedit(id) {
      var uri = "/company-edit-disable/" + id;
      swal
        .fire({
          title: "Are you sure want to change Status",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire(
              "Change status!",
              "Your status has been changed.",
              "success"
            );
            axios.get(uri).then((response) => {
              this.$router.push("/employer-list");
              window.location.reload();
            });
          }
        });
    },
    exportemployers() {
      var uri = "/export-employer";
      swal
        .fire({
          title: "Are you sure want export all data?",
          text: "Companies details!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, export it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire("Data Export!", "Data Exported successfully.", "success");
            window.open("/export-employer", "_blank");
          }
        });
    },
    exportcompanieschecked() {
      if (!this.checkedNames.length) {
        alert("Please select at least one row");
      } else {
        swal
          .fire({
            title: "Are you sure want export data?",
            text: "Employer details!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, export it!",
          })
          .then((result) => {
            if (result.value) {
              swal.fire(
                "Data Export!",
                "Data Exported successfully.",
                "success"
              );
              window.open(
                "/export-employer-checked/" + this.checkedNames,
                "_blank"
              );
            }
          });
      }
    },
  },
  created: function () {
    this.getIndustries();
    this.getCompanies();
    this.getFilterData();
  },
};
</script>

<style scoped>
</style>
