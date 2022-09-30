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
                  <div class="col-md-2">
                    <label>Select Company</label>
                    <div class="form-group">
                      <select
                        name="company_id"
                        class="form-control"
                        v-model="company_id"
                        @change="getClientList(this.company_id)"
                      >
                        <option value="">-- Select Company --</option>
                        <option
                          v-for="(data, index) in companies"
                          :value="data.id"
                          :key="index"
                        >
                          {{ data.company_name }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Select Client</label>
                    <div class="form-group">
                      <select
                        name="client_id"
                        class="form-control"
                        v-model="client_id"
                      >
                        <option value="">-- Select Client --</option>
                        <option
                          v-for="(client, index) in clientData"
                          :value="client.id"
                          :key="index"
                        >
                          {{ client.name }}
                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                  <label>From Date</label>
                  <div class="form-group">
                    <input type="date" name="from_date"  class="form-control" v-model="from_date"
                           placeholder="Enter From Date">
                  </div>
                </div>

                <div class="col-md-2">
                  <label>To Date</label>
                  <div class="form-group">
                    <input type="date" name="to_date"  class="form-control" v-model="to_date"
                           placeholder="Enter To Date">
                  </div>
                </div>

                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Status</label>
                        <div class="form-group">
                          <select
                            name="status"
                            class="form-control"
                            v-model="status"
                          >
                            <option value="">Status</option>
                            <option value="Active">Active</option>
                            <option value="Deactive">De-Active</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label></label>
                        <div class="form-group">
                          <button
                            type="submit"
                            name="submit"
                            class="btn btn-primary"
                            @click="getFilterData()"
                          >
                            <i class="fas fa-search mr-1"></i>Search
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <b>Showing :</b>
                {{ resultInfo.from ? resultInfo.from : 0 }} –
                {{ resultInfo.to ? resultInfo.to : 0 }} of
                {{ resultInfo.total ? resultInfo.total : 0 }} Jobs.
                <table
                  id="example1"
                  class="table table-bordered table-hover table-striped"
                >
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Company Name</th>
                      <th>Job Title</th>
                      <th>Job For</th>
                      <th>No. of Applications</th>
                      <th>Client Name</th>
                      <th>Upload Date</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(job, index) in myData.data" :key="index">
                      <td>{{ index + 1 }}</td>
                      <td>
                        {{
                          job.company_name ? job.company_name : "Not Available"
                        }}
                      </td>
                      <td>{{ job.title }}</td>
                      <td>{{ job.job_for }}</td>
                      <td><router-link :to="{
                        path: '/resume-list-by-jobs',
                        query: { jobid: job.id },
                        }">
                        {{ job.total }}
                        </router-link>
                      </td>
                      <td>
                        {{ job.clientname ? job.clientname : "Not Specify" }}
                      </td>
                      <td>
                        {{job.created_at | timeformat}}
                      </td>
                      <td>
                        <a
                          v-if="job.status === 'Active'"
                          class="badge badge-danger text-white"
                        >
                          De-Active
                        </a>
                        <a
                          v-if="job.status === 'Deactive'"
                          class="badge badge-success text-white"
                        >
                          Active
                        </a>
                      </td>

                      <td>
                        <!-- <router-link :to="`/edit-jobmanager/${job.id}`"><i class="far fa-edit"></i></router-link> -->
                        <a href="" @click.prevent="deletejob(job.id)"
                          ><i class="far fa-trash-alt"></i
                        ></a>
                        <a
                          href=""
                          @click.prevent="deactivejob(job.id)"
                          v-if="job.status === 'Active'"
                          class="badge badge-danger text-white"
                        >
                          Deactivate
                        </a>
                        <a
                          href=""
                          @click.prevent="activejob(job.id)"
                          v-if="job.status === 'Deactive'"
                          class="badge badge-success"
                        >
                          Activate
                        </a>
                        <a
                          href=""
                          @click="openmd(job.id)"
                          :data-id="job.id"
                          class="badge badge-primary text-white"
                          data-toggle="modal"
                          data-target=".editSubUser"
                          >More Details</a
                        >
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
      </div>
    </section>
    <!-- The view more details start -->
    <div
      class="modal fade popupForm custom-model-width editSubUser"
      role="dialog"
    >
      <div class="modal-dialog trackDetails">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">
              View Details of {{ trackerDetails.title }}
            </h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <table
              class="
                table table-bordered table-striped table-responsive table-hover
              "
            >
              <thead></thead>
              <tbody>
                <tr>
                  <th scope="col">Job Title</th>
                  <td>{{ trackerDetails.title }}</td>
                </tr>

                <tr>
                  <th scope="col">Job Role</th>
                  <td>{{ trackerDetails.job_role }}</td>
                </tr>

                <tr>
                  <th scope="col">Job Description</th>
                  <td v-html="trackerDetails.description"></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button
              type="button"
              class="btn btn-danger"
              data-dismiss="modal"
              @click="resetForm()"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- The view more details end -->
    <!-- /.content -->
  </div>
</template>

<script>
var moment = require("moment");
import $ from "jquery";
export default {
  name: "List",
  data() {
    return {
      industry: 0,
      industries: [],
      moment: moment,
      company: 0,
      companies: [],
      industry_id: "",
      company_id: "",
      email: "",
      status: "",
      from_date: '',
      to_date: '',
      myData: [],
      demo: [],
      totalVal: "",
      resultInfo: "",
      trackerDetails: "",
      client_id: "",
      clientData: [],
    };
  },
  mounted() {
    this.getClientList();
    //this.$store.dispatch('getAllData','/job')
  },
  computed: {},
  methods: {
    getFilterData: function (page = 1) {
      let self = this;
      if(this.$route.query.curdate){
        this.from_date=moment().format("YYYY-MM-DD");
        this.$router.replace("/jobmanager-list");
      }
      axios
        .get(
          "job-filter?&company_id=" +
            this.company_id +
            "&status=" +
            this.status +
            "&client_id=" +
            this.client_id  + 
            '&from_date='+this.from_date +
            '&to_date=' + this.to_date +
            "&page=" +
            page
        )
        .then(function (response) {
          self.myData = response.data.data;
          self.resultInfo = response.data.data;
        });
    },
    getClientList(company_id) {
      axios
        .get("/getClientList",{
          params:{
            company_id:this.company_id
          }
        })
        .then((response) => {
          this.clientData = response.data.data;
        })
        .catch(function (error) {});
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
    openmd: function (id) {
      axios.get("/get-jobsdata/" + id).then((response) => {
        this.trackerDetails = response.data.data;
      });
    },
    deactivejob(id) {
      var uri = "/deactive-job/" + id;
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
              this.$store.dispatch("getAllData", "/job");
            });
            this.getFilterData();
          }
        });
    },
    activejob(id) {
      var uri = "/active-job/" + id;
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
              this.$store.dispatch("getAllData", "/job");
            });
            this.getFilterData();
          }
        });
    },
    deletejob(id) {
      var uri = "/job/" + id;
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire("Deleted!", "Your file has been deleted.", "success");
            axios.get(uri).then((response) => {
              this.$store.dispatch("getAllData", "/job");
            });
          }
        });
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
.search-list {
  padding: 1rem;
  background-color: #fff;
  border: 1px solid #ddd;
  margin-top: 1rem;
  margin-bottom: 1rem;
}
</style>