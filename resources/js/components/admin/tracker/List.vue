<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tracker Candidate Data</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-header">
              <a
                href=""
                @click.prevent="exportjobseekers()"
                type="button"
                class="btn btn-success btn-xl"
                >Complete Data Export in Excel</a
              >
            </div>
            <!-- KEyword Search -->
            <div class="card-header">
              <div class="row">
                <div class="col-md-4">
                  <label>Keyword</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="keyword"
                      class="form-control"
                      v-model="keyword"
                      placeholder="Enter Keywords"
                    />
                  </div>
                </div>

                <div class="col-md-4">
                  <label>Keywords(Exact match)</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="multikeyword"
                      class="form-control"
                      v-model="multikeyword"
                      placeholder="Enter Multiple Keywords Separated by Comma"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="card-header">
              <div class="row">
                <div class="col-md-2">
                  <label>Added By</label>
                  <div class="form-group">
                    <select
                      name="source"
                      class="form-control"
                      v-model="added_by"
                    >
                      <option value="">Select User</option>
                      <option
                        :value="added.added_by"
                        v-for="(added, index) in AddedByList"
                        :key="index"
                        class="text-capitalize"
                      >
                        {{ added.fname }} {{ added.lname }} ({{
                          added.email
                        }})({{ added.company_name }})
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Source</label>
                  <div class="form-group">
                    <select name="source" class="form-control" v-model="source">
                      <option value="">Select Source</option>
                      <option
                        :value="source"
                        v-for="(source, index) in sourceList"
                        :key="index"
                        class="text-capitalize"
                      >
                        {{ source }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Location</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="location"
                      class="form-control"
                      v-model="location"
                      placeholder="Enter Location"
                    />
                  </div>
                </div>

                <div class="col-md-2">
                  <label>Skills</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="skills"
                      class="form-control"
                      v-model="skills"
                      placeholder="Enter Skills"
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
                  <label></label>
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

            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <b>Showing :</b>
                  {{ resultInfo.from ? resultInfo.from : 0 }} –
                  {{ resultInfo.to ? resultInfo.to : 0 }} of
                  {{ resultInfo.total ? resultInfo.total : 0 }} Candidate.
                </div>
                <div class="col-md-8">
                  <pagination
                    :data="myData"
                    :limit="10"
                    @pagination-change-page="getFilterData"
                  ></pagination>
                </div>
              </div>

              <div class="card-header">
                <span><b>Total Checked :</b> {{ checkedNames.length }}</span>

                <a
                  href=""
                  type="button"
                  @click.prevent="exportjobseekerchecked()"
                  class="btn btn-success btn-xl"
                  id="checkboxsButton"
                  v-if="checkedNames.length > 0"
                  >Export</a
                >
                <a
                  href=""
                  type="button"
                  @click.prevent="checkedDelete()"
                  class="btn btn-danger btn-xl"
                  id="checkboxsButton"
                  v-if="checkedNames.length > 0"
                  >Delete</a
                >
              </div>
              <table
                id="example1"
                class="
                  table table-bordered table-hover
                  dt-responsive
                  table-striped table-responsive
                "
              >
                <thead>
                  <tr>
                    <th>
                      #
                      <input
                        type="checkbox"
                        v-model="selectAll"
                        @click="select"
                      />
                    </th>

                    <th>Name / Email / Contact</th>
                    <th>Added By</th>
                    <th>Skill Sets</th>

                    <th>Resume</th>
                    <th>Source</th>

                    <th>Action</th>
                    <th>Upload Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(resumes, index) in myData.data" :key="index">
                    <td>
                      <input
                        type="checkbox"
                        name="emp_check"
                        :value="resumes.id"
                        v-model="checkedNames"
                      />
                      {{ index + 1 }}
                    </td>

                    <td>
                      {{ resumes.name }} / {{ resumes.email }} /
                      {{ resumes.contact }}
                    </td>
                    <td>
                      {{ resumes.company_name }}
                    </td>
                    <td>{{ resumes.key_skills }}</td>
                    <td v-if="resumes.resume">
                      <a
                        v-if="resumes.resume !== null"
                        href="#"
                        @click="opendoc(resumes.resume)"
                        data-toggle="modal"
                        data-target="#addNewLocation"
                        class="badge badge-warning"
                      >
                        <i class="fas fa-eye mr-2"></i>View Resume</a
                      >

                      <a
                        :href="'tracker/resume/' + resumes.resume"
                        target="_blank"
                        v-if="resumes.resume"
                        class="badge badge-success"
                      >
                        <i class="fa fa-download mr-2" aria-hidden="true"></i>
                        Download
                      </a>
                    </td>
                    <td v-else>Not Uploaded</td>
                    <td class="text-capitalize">{{ resumes.reference }}</td>

                    <td>
                      <a
                        href=""
                        @click="openmd(resumes.id)"
                        :data-id="resumes.id"
                        class="badge badge-primary text-white"
                        data-toggle="modal"
                        data-target=".editSubUser"
                        ><i class="fas fa-edit mr-2"></i>View</a
                      >
                    </td>
                    <td>{{ resumes.created_at | timeformat }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <pagination
                :data="myData"
                :limit="10"
                @pagination-change-page="getFilterData"
              ></pagination>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-----------Resume Modal------------------------------>
    <div class="modal fade popupForm custom-model-width" id="addNewLocation">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Resume</h4>

            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->

            <iframe
              id="resume_iframe"
              src=""
              style="width: 450px; height: 400px"
              frameborder="0"
            ></iframe>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <!----------------------Resume Modal Close-------------------->

    <!-----------Video Resume Modal------------------------------>

    <!----------------------Video Resume Modal Close-------------------->
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
              View Details of {{ trackerDetails.name }}
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
                  <th scope="col">Name</th>
                  <td>{{ trackerDetails.name }}</td>
                  <th scope="col">Contact</th>
                  <td>{{ trackerDetails.contact }}</td>
                </tr>

                <tr>
                  <th scope="col">Email</th>
                  <td>{{ trackerDetails.email }}</td>
                  <th scope="col">Gender</th>
                  <td>{{ trackerDetails.gender }}</td>
                </tr>

                <tr>
                  <th scope="col">Designation</th>
                  <td>{{ trackerDetails.designation }}</td>
                  <th scope="col">Preffered Location</th>
                  <td>{{ trackerDetails.preferred_location }}</td>
                </tr>

                <tr>
                  <th scope="col">Current Location</th>
                  <td>{{ trackerDetails.current_location }}</td>
                  <th scope="col">Experience(Yr)</th>
                  <td>{{ trackerDetails.experience }}</td>
                </tr>

                <tr>
                  <th scope="col">Notice Period</th>
                  <td>{{ trackerDetails.notice_period }}</td>
                  <th scope="col">Current Salary</th>
                  <td>{{ trackerDetails.current_salary }}</td>
                </tr>
                <tr>
                  <th scope="col">Expected Salary</th>
                  <td>{{ trackerDetails.expected_salary }}</td>
                  <th scope="col">Source</th>
                  <td>{{ trackerDetails.reference }}</td>
                </tr>

                <tr>
                  <th>Skill Sets</th>
                  <td colspan="3">{{ trackerDetails.key_skills }}</td>
                </tr>

                <tr>
                  <th>Remarks</th>
                  <td colspan="3">{{ trackerDetails.remarks }}</td>
                </tr>
                <tr>
                  <th>Added By</th>
                  <td colspan="3">
                    {{ trackerDetails.fname }}
                    {{ trackerDetails.lname }} /
                    {{ trackerDetails.emp_email }} of
                    <b style="color: red">{{ trackerDetails.company_name }}</b>
                  </td>
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
export default {
  name: "List",
  data() {
    return {
      checkedNames: [],
      checkedName: true,
      from_date: "",
      to_date: "",
      myData: [],
      resultInfo: "",
      video: "",
      name: "",
      source: "",
      sourceList: [],
      keyword: "",
      multikeyword: "",
      location: "",
      skills: "",
      selectAll: false,
      checkedData: "",
      added_by: "",
      AddedByList: [],
      trackerDetails: "",
    };
  },
  mounted() {
    this.getUniqueSource();
  },
  methods: {
    select() {
      this.checkedNames = [];

      if (!this.selectAll) {
        for (let resumes in this.checkedData) {
          this.checkedNames.push(this.checkedData[resumes].id);
        }
      }
    },

    getFilterData: function (page = 1) {
      const self = this;
      axios
        .get(
          "/get/data/tracker?&from_date=" +
            this.from_date +
            "&to_date=" +
            this.to_date +
            "&page=" +
            page +
            "&source=" +
            this.source +
            "&keyword=" +
            this.keyword +
            "&multikeyword=" +
            this.multikeyword +
            "&location=" +
            this.location +
            "&skills=" +
            this.skills +
            "&added_by=" +
            this.added_by
        )
        .then(function (response) {
          self.myData = response.data.data;
          self.resultInfo = response.data.data;
          self.checkedData = response.data.data.data;
        });
    },
    getUniqueSource() {
      axios
        .get("/getUniqueSource/tracker")
        .then((response) => {
          this.sourceList = response.data.data;
          this.AddedByList = response.data.addedBy;
        })
        .catch(function (error) {});
    },

    exportjobseekers() {
      swal
        .fire({
          title: "Are you sure want export all data?",
          text: "Bulk details!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, export it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire("Data Export!", "Data Exported successfully.", "success");
            window.open("/export-tracker", "_blank");
          }
        });
    },
    exportjobseekerchecked() {
      if (!this.checkedNames.length) {
        alert("Please select at least one row");
      } else {
        swal
          .fire({
            title:
              "Are you sure want to export " +
              this.checkedNames.length +
              " Data ?",
            text: "Bulk details!",
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
                "/export-tracker-checked/" + this.checkedNames,
                "_blank"
              );
            }
          });
      }
    },
    opendoc($doc) {
      //document.getElementById("resume_iframe").src = "";
      //let res="http://infolab.stanford.edu/pub/papers/google.pdf";
      if ($doc) {
        var appUrl = "https://naukriyan.com";
        var link =
          "https://docs.google.com/gview?url=" +
          appUrl +
          "/tracker/resume/" +
          $doc +
          "&embedded=true";
        document.getElementById("resume_iframe").src = link;
      }
      if (!$doc) {
        var appUrl = "https://naukriyan.com";
        var link =
          "https://docs.google.com/gview?url=" +
          appUrl +
          "/resume/default.pdf&embedded=true";
      }
    },
    checkedDelete() {
      if (!this.checkedNames.length) {
        alert("Please select at least one row");
      } else {
        swal
          .fire({
            title:
              "Are you sure want to Delete " +
              this.checkedNames.length +
              " Data ?",
            text: "Delete!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
          })
          .then((result) => {
            if (result.value) {
              swal.fire("Deleted!", "Data Deleted successfully.", "success");
              axios.get("/delete-tracker-checked/" + this.checkedNames);
              this.getFilterData();
            }
          });
      }
    },
    openmd: function (id) {
      axios.get("/get-trackerdata/" + id).then((response) => {
        this.trackerDetails = response.data.data;
      });
    },
  },
  created: function () {
    //this.getAllJobs();
    this.getFilterData();
  },
};
</script>

<style scoped>
</style>
