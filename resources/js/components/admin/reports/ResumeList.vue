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
                      placeholder="Enter Keywords"
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
              <b>Showing :</b>
              <span
                >{{ resultInfo.from ? resultInfo.from : 0 }} –
                {{ resultInfo.to ? resultInfo.to : 0 }} of
                {{ resultInfo.total ? resultInfo.total : 0 }} Resume.</span
              >
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
                    <th>Name / Email / Contact</th>
                    <th>Designation</th>
                    <th>Preffered Location</th>
                    <th>Experience / Fresher</th>
                    <th>Skill Sets</th>
                    <th>Resume / Video Resume</th>
                    <th>Upload Date</th>
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
                    <td>
                      {{ resumes.fname }} {{ resumes.lname }} /
                      {{ resumes.email }} / {{ resumes.contact }}
                    </td>
                    <td>
                      {{
                        resumes.designation
                          ? resumes.designation
                          : "Not Updated"
                      }}
                    </td>
                    <td>
                      {{
                        resumes.preferred_location
                          ? resumes.preferred_location
                          : "Not Updated"
                      }}
                    </td>
                    <td>
                      <span v-if="resumes.candidate_type === 'experienced'"
                        >{{ resumes.exp_year + "Yr" }} -
                        {{ resumes.exp_month + "M" }}</span
                      >
                      <span
                        class="text-uppercase"
                        v-if="resumes.candidate_type === 'fresher'"
                        >{{ resumes.candidate_type }}</span
                      >
                    </td>
                    <td>
                      <span v-for="(sk, index) in resumes.skills" :key="index"
                        >{{ sk.skill + "," }}
                      </span>
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
      keyword: "",
      selectAll: false,
      checkedData: "",
    };
  },
  computed: {},
  methods: {
    // uncheck: function (id) {
    //   this.checkedName = !this.checkedName;
    //   let cv = document.getElementById("checkvalue").value;
    //   document.getElementById("checkvalue").value = id + "," + cv;
    // },
    select() {
      this.checkedNames = [];

      if (!this.selectAll) {
        for (let resumes in this.checkedData) {
          this.checkedNames.push(this.checkedData[resumes].id);
        }
      }
    },

    getFilterData: function (page = 1) {
      let self = this;
      axios
        .get(
          "resume-filter-admin?&from_date=" +
            this.from_date +
            "&to_date=" +
            this.to_date +
            "&keyword=" +
            this.keyword +
            "&page=" +
            page
        )
        .then(function (response) {
          self.myData = response.data.data;
          self.resultInfo = response.data.data;
          self.checkedData = response.data.data.data;
        });
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
            window.open("/export-resume", "_blank");
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
                "/export-resume-checked/" + this.checkedNames,
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
      // } else {
      //   document.getElementById("resume_iframe").src = "";
      //   var link =
      //     "http://docs.google.com/gview?url=" +
      //     appUrl +
      //     "/resume/default.pdf&embedded=true";
      // }
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
/* #addNewLocation .modal-content {
  background: transparent;
  border: none;
} */
</style>
