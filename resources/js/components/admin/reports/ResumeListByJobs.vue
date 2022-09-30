<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Resume List</h3>
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
            <div class="card-header">
              <div class="row">
                <div class="col-md-2">
                  <label>Keyword</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="keyword"
                      class="form-control"
                      v-model="keyword"
                      @keyup="getFilterData"
                      placeholder="Enter Keywords"
                    />
                  </div>
                </div>
                <div class="col-md-3">
                  <label>Job Title</label>
                  <div class="form-group">
                    <select
                      @change="getFilterData"
                      name="job_title"
                      class="form-control"
                      v-model="job_title"
                    >
                      <option value="" disabled="">
                        -- Select From Here(Title / Applied Count / Client Name)
                        --
                      </option>
                      <option
                        v-for="data in jobs"
                        :value="data.id"
                        :key="data.id"
                      >
                        {{ data.title }}
                        ({{ data.total }}) ({{ data.client_name }})
                      </option>
                    </select>
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
                      @keyup="getFilterData"
                      @change="getFilterData"
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
                      @keyup="getFilterData"
                      @change="getFilterData"
                      placeholder="Enter To Date"
                    />
                  </div>
                </div>
                <div class="col-md-2">
                  <label>Status</label>
                  <div class="form-group">
                    <select
                      name="status"
                      class="form-control"
                      v-model="status"
                      @change="getFilterData"
                    >
                      <option value="" disabled="">Status</option>
                      <option value="Active">Active</option>
                      <option value="Deactive">Deactive</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-2">
                  <label></label>
                  <div class="form-group">
                    <button
                      type="submit"
                      name="submit"
                      class="btn btn-primary"
                      @click="resetUrl()"
                    >
                      <i class="fas fa-redo mr-1"></i>
                      Reset
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="col-md-12 row">
                <div class="col-md-3">
                  <b>Showing :</b>
                  <span
                    >{{ resultInfo.from ? resultInfo.from : 0 }} –
                    {{ resultInfo.to ? resultInfo.to : 0 }} of
                    {{ resultInfo.total ? resultInfo.total : 0 }} Resume.</span
                  >
                  <div class="card-header">
                    <span
                      ><b>Total Checked :</b> {{ checkedNames.length }}</span
                    >

                    <a
                      href=""
                      type="button"
                      @click.prevent="exportjobseekerchecked()"
                      class="btn btn-success btn-xl"
                      id="checkboxsButton"
                      v-if="checkedNames.length > 0"
                      >Export</a
                    >
                  </div>
                </div>

                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                  <pagination
                    :data="myData"
                    :limit="10"
                    @pagination-change-page="getFilterData"
                  ></pagination>
                </div>
              </div>

              <table
                id="example1"
                class="
                  table table-bordered table-hover
                  dt-responsive
                  table-striped
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
                      Check all
                    </th>
                    <th>S.No</th>
                    <th>Application ID</th>
                    <th>Name / Email / Contact</th>
                    <th>Applied For</th>
                    <th>Client Name</th>
                    <th>Resume / Video Resume</th>
                    <th>Applied Date</th>
                    <th>Job Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(resumes, index) in myData.data" :key="resumes.id">
                    <td>
                      <input
                        type="checkbox"
                        id="checkvalue"
                        :value="resumes.id"
                        v-model="checkedNames"
                      />
                    </td>
                    <td>{{ index + 1 }}</td>
                    <td>{{ resumes.application_id }}</td>
                    <td>
                      {{ resumes.fname ? resumes.fname : "Not available" }}
                      {{ resumes.lname ? resumes.lname : "Not available" }} /
                      {{ resumes.email ? resumes.email : "Not available" }} /
                      {{ resumes.contact ? resumes.contact : "Not available" }}
                    </td>

                    <td>{{ resumes.title }} ({{ resumes.job_role }})</td>
                    <td>
                      {{
                        resumes.clientname
                          ? resumes.clientname
                          : "Not Specify Client Name (May be Internal Requirement)"
                      }}
                    </td>
                    <td v-if="resumes.resume || resumes.resume_video_link">
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
                        v-if="resumes.resume_video_link !== null"
                        href="#"
                        @click="
                          openvideo(resumes.resume_video_link, resumes.fname)
                        "
                        data-toggle="modal"
                        data-target="#video-resume"
                        class="badge badge-primary"
                      >
                        <i class="fa fa-video mr-2"></i>Play Video</a
                      >
                      <a
                        :href="'resume/' + resumes.resume"
                        target="_blank"
                        v-if="resumes.resume"
                        class="badge badge-success"
                      >
                        <i class="fa fa-download mr-2" aria-hidden="true"></i>
                        Download
                      </a>
                      <!-- <a
                        :href="resumes.resume_video_link"
                        target="_blank"
                        v-if="resumes.resume_video_link"
                        class="badge badge-primary"
                      >
                        <i class="fa fa-video" aria-hidden="true"></i>
                        Play
                      </a> -->
                    </td>
                    <td v-else>Not Uploaded</td>
                    <td>{{ resumes.created_at | timeformat }}</td>
                    <td>{{ resumes.status }}</td>
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
    <div class="modal fade popupForm custom-model-width" id="video-resume">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">{{ name }} Video Resume</h4>

            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->

            <video-embed
              css="embed-responsive-4by3"
              :src="video"
              id="video_iframe"
            ></video-embed>
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
    <!----------------------Video Resume Modal Close-------------------->
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
      checkedNames: [],
      checkedName: true,
      moment: moment,
      industry: 0,
      jobs: [],
      job_title: "",
      email: "",
      status: "",
      from_date: "",
      to_date: "",
      myData: [],
      resultInfo: "",
      video: "",
      name: "",
      keyword: "",
      selectAll: false,
      checkedData: "",
    };
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
    // uncheck: function (id) {
    //   this.checkedName = !this.checkedName;
    //   let cv = document.getElementById("checkvalue").value;
    //   document.getElementById("checkvalue").value = id + "," + cv;
    // },

    getFilterData: function (page = 1) {
      let self = this;
      if (this.$route.query.curdate) {
        this.from_date = moment().format("YYYY-MM-DD");
        this.$router.replace("resume-list-by-jobs");
      }
      if (this.$route.query.jobid) {
        this.job_title = this.$route.query.jobid;
        this.$router.replace("resume-list-by-jobs");
      }
      axios
        .get(
          "resume-filter/byJobs?job_title=" +
            this.job_title +
            "&from_date=" +
            this.from_date +
            "&to_date=" +
            this.to_date +
            "&keyword=" +
            this.keyword +
            "&status=" +
            this.status +
            "&page=" +
            page
        )
        .then(function (response) {
          self.myData = response.data.data;
          self.resultInfo = response.data.data;
          self.checkedData = response.data.data.data;
        });
    },

    resetUrl() {
      this.$router.replace("resume-list-by-jobs");
      window.location.reload();
    },

    getAllJobs: function () {
      axios.get("get-jobs-list").then(
        function (response) {
          this.jobs = response.data;
        }.bind(this)
      );
    },

    exportjobseekers() {
      swal
        .fire({
          title: "Are you sure want export all data?",
          text: "Resume details!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, export it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire("Data Export!", "Data Exported successfully.", "success");
            window.open("/export-resume-jobs", "_blank");
          }
        });
    },
    exportjobseekerchecked() {
      if (!this.checkedNames.length) {
        alert("Please select at least one row");
      } else {
        swal
          .fire({
            title: "Are you sure want export data?",
            text: "Resume details!",
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
                "/export-resume-jobs-checked/" + this.checkedNames,
                "_blank"
              );
            }
          });
      }
    },
    opendoc($doc) {
      if ($doc) {
        var appUrl = "https://naukriyan.com";
        var link =
          "https://docs.google.com/gview?url=" +
          appUrl +
          "/resume/" +
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
    openvideo($video, $name) {
      if ($video) {
        this.video = $video;
        this.name = $name;
        //document.getElementById("video_iframe").src = video;
      }
    },
  },
  created: function () {
    this.getAllJobs();
    this.getFilterData();
  },
};
</script>

<style scoped>
</style>
