<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Video Resume Profile List</h3>
            </div>
            
            <div class="card-body">
              <div class="col-md-12 row">
                <div class="col-md-3">
                  <b>Showing :</b>
                  <span
                    >{{ resultInfo.from ? resultInfo.from : 0 }} –
                    {{ resultInfo.to ? resultInfo.to : 0 }} of
                    {{ resultInfo.total ? resultInfo.total : 0 }} Video Profile.</span
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
                      :disabled="checkedNames.length > 3"
                      v-if="checkedNames.length > 0"
                      >Save</a
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
                      Check
                    </th>
                    <th>S.No</th>
                    <th>Application ID</th>
                    <th>Name / Email / Contact</th>
                    <th>Applied For</th>
                    <th>Client Name</th>
                    <th>Resume / Video Resume</th>
                    <th>Applied Date</th>
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
                    <td v-if="resumes.resume_video_link">
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
      console.log(this.checkedNames);
    },

    getFilterData: function (page = 1) {
      let self = this;
      axios
        .get(
          "/profile-by-video"
        )
        .then(function (response) {
          self.myData = response.data.data;
          self.resultInfo = response.data.data;
          self.checkedData = response.data.data.data;
        });
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
      }
      if(this.checkedNames.length > 3){
        swal.fire(
                "Error!",
                "Select Only 3 Video Resumes.",
                "error"
              );
      } else {
        swal
          .fire({
            title: "Are you sure you want to set data?",
            text: "Resume details!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, save it!",
          })
          .then((result) => {
            if (result.value) {
              swal.fire(
                "Data Saved!",
                "Data Saved successfully.",
                "success"
              );
              axios.get(
                "/set-video-resume/" + this.checkedNames
              )
            }
          });
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
    // this.getAllJobs();
    this.getFilterData();
  },
};

</script>

<style scoped>
</style>
