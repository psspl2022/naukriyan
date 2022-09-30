<template>
  <div>
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Consolidate Data</h3>
              <div class="card-tools">
                <button class="btn btn-primary">
                  <router-link style="color: #fff" to="/upload-consolidate-data"
                    >Upload</router-link
                  >
                </button>
              </div>
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
            <center>
              -------------------------------------------------OR------------------------------------------------------
            </center>
            <div class="card-header">
              <div class="row">
                <!-- <div class="col-md-2">
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
                </div> -->

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
                  <label>Source</label>
                  <div class="form-group">
                    <select name="source" class="form-control" v-model="source">
                      <option value="">Select Source</option>
                      <option
                        :value="source"
                        v-for="(source, index) in sourceList"
                        :key="index"
                      >
                        {{ source }}
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
              </div>
              <table
                id="example1"
                class="
                  table table-bordered table-hover
                  dt-responsive
                  table-striped
                  table-responsive
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
                    <th>Source</th>
                    <th>Name / Email / Contact</th>
                    <th>Designation</th>
                    <th>Current / Preffered Location</th>
                    <th>Experience / Fresher</th>
                    <th>Skill Sets</th>
                    <th>Annual Salary</th>
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

                    <td>{{ resumes.source }}</td>
                    <td>
                      {{ resumes.name }} / {{ resumes.email }} /
                      {{ resumes.mobile_no }}
                    </td>
                    <td>{{ resumes.designation }}</td>
                    <td>
                      {{ resumes.current_location }} /
                      {{ resumes.preferred_location }}
                    </td>
                    <td>{{ resumes.work_experience }}</td>
                    <td>{{ resumes.key_skills }}</td>
                    <td>
                      {{ resumes.annual_salary }}
                    </td>

                    <td>{{ resumes.created_at }}</td>
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
      source: "",
      sourceList: [],
      keyword: "",
      multikeyword: "",
      location: "",
      skills: "",
      selectAll: false,
      checkedData: "",
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
    // uncheck: function (id) {
    //   this.checkedName = !this.checkedName;
    //   let cv = document.getElementById("checkvalue").value;
    //   document.getElementById("checkvalue").value = id + "," + cv;
    // },

    getFilterData: function (page = 1) {
      const self = this;
      axios
        .get(
          "/bulk-data?&from_date=" +
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
            this.skills
        )
        .then(function (response) {
          self.myData = response.data.data;
          self.resultInfo = response.data.data;
          self.checkedData = response.data.data.data;
        });
    },
    getUniqueSource() {
      axios
        .get("/getUniqueSource")
        .then((response) => {
          this.sourceList = response.data.data;
        })
        .catch(function (error) {});
    },

    // getAllJobs: function () {
    //   axios.get("get-jobs-list").then(
    //     function (response) {
    //       this.jobs = response.data;
    //     }.bind(this)
    //   );
    // },

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
            window.open("/export-data", "_blank");
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
                "/export-data-checked/" + this.checkedNames,
                "_blank"
              );
            }
          });
      }
    },
  },
  created: function () {
    //this.getAllJobs();
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
