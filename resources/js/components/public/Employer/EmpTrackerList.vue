<template>
  <div id="emptracerlist">
    <Emp-header></Emp-header>
    <section>
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Candidate List</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i>
                  <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411 </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="top-adjust section pb-5 mt-0 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="cms-pg-header">
              <h2 class="hk-pg-title">Candidate List</h2>
            </div>

            <div class="card mt-1">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <label>Source</label>
                    <div class="form-group">
                      <select
                        name="source"
                        class="form-control form-control-sm"
                        v-model="source"
                      >
                        <option value="">Select Source</option>
                        <option
                          v-for="(source, index) in sourceList"
                          :value="source.name"
                          :key="index"
                          class="text-capitalize"
                        >
                          {{ source.name }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <label>Location<small> (Preff./Curr.)</small></label>
                    <div class="form-group">
                      <input
                        type="text"
                        name="location"
                        class="form-control form-control-sm"
                        v-model="location"
                        placeholder="Enter Location"
                        @keyup="getTrackerList"
                      />
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label
                      >Skills
                      <small>
                        (Multiple Skills)</small
                      ></label
                    >

                    <div class="form-group">
                      <vue-tags-input 
                      style="padding: 0;" 
                      class="input-tag form-control form-control-sm"
                      placeholder="Enter Multiple Skills" 
                      v-model="skills"
                      :add-on-key="[13, ',', ';']"
                      :tags="allSkill"
                      :autocomplete-items="autocompleteItems" 
                      @tags-changed="update" />
                      <!-- <input
                        type="text"
                        name="skills"
                        class="form-control form-control-sm"
                        v-model="skills"
                        placeholder="Enter Multiple Skills also Separated by Comma"
                        @keyup="getTrackerList"
                      /> -->
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label>From Date</label>
                    <div class="form-group">
                      <input
                        type="date"
                        name="from_date"
                        class="form-control form-control-sm"
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
                        class="form-control form-control-sm"
                        v-model="to_date"
                        placeholder="Enter To Date"
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label>Designation</label>
                    <div class="form-group">
                      <select
                        name="designation"
                        class="form-control form-control-sm"
                        v-model="designation"
                      >
                        <option value="">Select Designation</option>
                        <option
                          v-for="(source, index) in desList"
                          :value="source.designation"
                          :key="index"
                          class="text-capitalize"
                        >
                          {{ source.designation }}
                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label>Resume Upload</label>
                    <div class="form-group">
                      <select
                        name="resume_upload"
                        class="form-control form-control-sm"
                        v-model="resume_upload"
                      >
                        <option value="">All</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label>Experience</label>
                    <div class="form-group">
                      <select
                        name="experience"
                        class="form-control form-control-sm"
                        v-model="experience"
                      >
                        <option value="">Select Experience</option>
                        <option value="fresher">0-1 Yr (Also Fresher)</option>
                        <option value="1-2">1-2 Yr</option>
                        <option value="2-4">2-4 Yr</option>
                        <option value="4-5">4-5 Yr</option>
                        <option value="5-8">5-8 Yr</option>
                        <option value="8-10">8-10 Yr</option>
                        <option value="10-15">10-15 Yr</option>
                        <option value="15-20">15-20 Yr</option>
                        <option value="20-25">20-25 Yr</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label>Resume Per Page (Default 50)</label>
                    <div class="form-group">
                      <input
                        type="number"
                        name="view_per_page"
                        class="form-control form-control-sm"
                        v-model="view_per_page"
                        placeholder="Enter how Many Data Shows here....."
                        @keyup="getTrackerList"
                        min="0"
                      />
                    </div>
                  </div>

                  <div class="col-md-1">
                    <label></label>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary" @click="getTrackerList">
                        Search
                      </button>
                    </div>
                  </div>

                  <div class="col-md-1">
                    <label></label>
                    <div class="form-group">
                      <button
                        type="submit"
                        name="submit"
                        class="btn btn-success"
                        @click="resetUrl"
                      >
                        Reset
                      </button>
                    </div>
                  </div>
                </div>

                <div class="row mt-2 mb-2">
                  <div class="col-md-3" v-if="checkedNames.length === 0">
                    <a
                      href=""
                      @click.prevent="exportTrackers()"
                      type="button"
                      class="btn btn-success text-white"
                      ><i class="fas fa-file-export"></i> Complete Data Export
                    </a>
                  </div>
                  <div class="col-md-8" v-if="checkedNames.length > 0">
                    <span
                      ><b>Total Checked :</b> {{ checkedNames.length }}</span
                    >

                    <a
                      href=""
                      type="button"
                      @click.prevent="exportTrackersChecked()"
                      class="btn btn-success text-white"
                      id="checkboxsButton"
                      v-if="checkedNames.length > 0"
                      ><i class="fas fa-file-export"></i> Export</a
                    >
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="col-md-4">
                    <b>Showing :</b>
                    {{ trackersCount.from ? trackersCount.from : 0 }} –
                    {{ trackersCount.to ? trackersCount.to : 0 }} of
                    {{ trackersCount.total ? trackersCount.total : 0 }}
                    Candidate.
                  </div>
                  <div class="col-md-5">
                    <pagination
                      :data="trackersCount"
                      @pagination-change-page="getTrackerList"
                      :limit="1"
                    ></pagination>
                  </div>
                  <div class="col-md-1">
                    <img
                      v-if="searchStatus"
                      src="https://i.gifer.com/ZZ5H.gif"
                      alt=""
                      height="30"
                      width="30"
                    />
                  </div>
                  <div class="col-md-2">
                    <input
                      type="text"
                      placeholder="Search here......."
                      v-model="keyword"
                      @keyup="getTrackerList"
                      class="form-control form-control-sm"
                    />
                  </div>
                </div>

                <!-- <div class="card body">
                  <div class="row mt-2 g-3">
                    
                  </div>
                </div> -->

                <div class="table-responsive custom-height">
                  <table
                    class="table table-head-fixed custom-table mt-2"
                    id="datatable"
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

                        <th>Name</th>
                        <th>Email/Contact</th>
                        <th>Preffered/Current Location</th>
                        <th>Gender</th>
                        <th>Designation</th>
                        <th width="12%">Key Skills</th>
                        <th>Experience (in Yr)</th>
                        <th>Notice Period (days)</th>
                        <th>Resume</th>
                        <th>Remarks</th>
                        <th>Reference</th>
                        <th>Added On</th>
                        <th>Added By</th>
                      </tr>
                    </thead>
                    <tbody v-if="trackers">
                      <tr v-for="(track, index) in trackers" :key="track.id">
                        <td>
                          <input
                            type="checkbox"
                            name="emp_check"
                            :value="track.id"
                            v-model="checkedNames"
                          />
                          {{ index + 1 }}
                        </td>

                        <td class="text-capitalize">
                          {{ track.name }}
                        </td>
                        <td>{{ track.email }} /{{ track.contact }}</td>

                        <td>
                          {{ track.preffered_location }} /
                          {{ track.current_location }}
                        </td>
                        <td>{{ track.gender }}</td>
                        <td>{{ track.designation }}</td>
                        <!-- <td>{{ track.key_skills }}</td> -->
                        <td>
                          <text-highlight :queries="allSkill">{{ track.key_skills }}</text-highlight>
                        </td>
                        <td>{{ track.experience }}</td>
                        <td>{{ track.notice_period }}</td>
                        <td>
                          <a
                            v-if="track.resume !== null"
                            :href="'/tracker/resume/' + track.resume"
                            target="_blank"
                            class="badge badge-secondary badge-sm text-white"
                            ><i class="fa fa-download" aria-hidden="true"></i>
                            Resume</a
                          >&nbsp
                          <a
                            href=""
                            @click="openmd(track.id)"
                            :data-id="track.id"
                            class="badge badge-primary badge-sm text-white"
                            data-toggle="modal"
                            data-target=".editSubUser"
                            v-if="track.resume !== null"
                          >
                            <i class="fa fa-eye" aria-hidden="true"></i>View</a
                          >
                        </td>
                        <td>{{ track.remarks }}</td>
                        <td class="text-capitalize">{{ track.reference }}</td>
                        <td>{{ track.created_at | timeformat }}</td>
                        <td>{{ track.sub_fname }} {{ track.sub_lname }}</td>
                      </tr>
                    </tbody>
                    <tbody v-if="trackers.length == 0">
                      <tr>
                        <th colspan="10">No Data Found</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
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
            <h4 class="modal-title">View Resume of {{ resDetails.name }}</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <iframe
              :src="`https://docs.google.com/gview?url=https://naukriyan.com/tracker/resume/${resDetails.resume}&embedded=true`"
              style="width: 500px; height: 600px"
              frameborder="0"
            ></iframe>
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

    <main-footer></main-footer>
  </div>
</template>

<script>
import Vue from 'vue';
import TextHighlight from 'vue-text-highlight';
import $ from "jquery";
import VueTagsInput from "@johmun/vue-tags-input";
Vue.component('text-highlight', TextHighlight);

export default {
  name: "EmpTrackerList",

  components: {
    VueTagsInput,
  },

  data() {
    return {
      trackers: [],
      checkedNames: [],
      checkedName: true,
      from_date: "",
      to_date: "",
      myData: [],
      name: "",
      source: "",
      sourceList: [],
      location: "",
      skills: "",
      allSkill: [],
      handlers: [],
      autocompleteItems: [],
      selectAll: false,
      userid: this.$route.query.user,
      trackersCount: "",
      keyword: "",
      searchStatus: false,
      resDetails: "",
      desList: [],
      designation: "",
      view_per_page: "",
      resume_upload: "",
      experience: "",
      resData: "",
    };
  },
  mounted() {
    this.getTrackerList();
    this.getSource();
    this.getDesignationList();
  },
  watch: {
      skills: "initItems",

    },
  methods: {
    update(newTags) {
      this.autocompleteItems = [];
      this.allSkill = newTags.map((a) => {
        return a.text;
      });
      this.handlers = this.allSkill.toString();
    },
    initItems() {
      if (this.skills.length < 2) return;
      const url = `get-allskills/` + this.skills;

      clearTimeout(this.debounce);
      this.debounce = setTimeout(() => {
        axios
          .get(url)
          .then((response) => {
            this.autocompleteItems = response.data.data.map((a) => {
              return { text: a.name };
            });
          })
          .catch(() => console.warn("Oh. Something went wrong"));
      }, 600);
      
    },

    resetUrl() {
      this.$router.replace("/emp/tracker-list");
      window.location.reload();
    },
    getTrackerList(page = 1) {
      this.searchStatus = true;
      const self = this;
      axios
        .get(
          "emp/tracker-list?&from_date=" +
            this.from_date +
            "&to_date=" +
            this.to_date +
            "&source=" +
            this.source +
            "&location=" +
            this.location +
            "&skills=" +
            this.allSkill +
            "&userid=" +
            this.userid +
            "&keyword=" +
            this.keyword +
            "&designation=" +
            this.designation +
            "&view_per_page=" +
            this.view_per_page +
            "&resume_upload=" +
            this.resume_upload +
            "&experience=" +
            this.experience +
            "&page=" +
            page
        )
        .then((response) => {
          self.trackers = response.data.data.data;
          self.trackersCount = response.data.data;
          this.searchStatus = false;
        });
    },
    select() {
      this.checkedNames = [];
      if (!this.selectAll) {
        for (let track in this.trackers) {
          this.checkedNames.push(this.trackers[track].id);
        }
      }
    },
    getSource() {
      axios
        .get("emp/unique-source/tracker")
        .then((response) => {
          this.sourceList = response.data.data;
        })
        .catch(function (error) {});
    },
    getDesignationList() {
      axios.get("/get/emp/designation").then((response) => {
        this.desList = response.data.data;
      });
    },
    openmd: function (id) {
      axios.get("/get-resumedata/" + id).then((response) => {
        this.resDetails = response.data.data;
      });
    },
    exportTrackers() {
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
            window.open("emp/export/tracker", "_blank");
          }
        });
    },
    exportTrackersChecked() {
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
                "emp/export/tracker-checked/" + this.checkedNames,
                "_blank"
              );
            }
          });
      }
    },
  },
  created: function () {},
};
</script>

<style scoped>
</style>