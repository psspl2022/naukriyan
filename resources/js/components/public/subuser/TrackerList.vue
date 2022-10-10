

<template>
  <div id="trackerlist">
    <subuser-header></subuser-header>
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
              <router-link :to="`/add-tracker`">
                <a href="" class="btn btn-primary text-white"
                  ><i class="fas fa-plus mr-2"></i>Add Candidate</a
                >
              </router-link>
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
                      />
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label
                      >Skills
                      <small>
                        (Multiple Skills Seperated by comma(,))</small
                      ></label
                    >

                    <div class="form-group">
                      <input
                        type="text"
                        name="skills"
                        class="form-control form-control-sm"
                        v-model="skills"
                        placeholder="Enter Multiple Skills also Separated by Comma"
                      />
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

                  <div class="col-md-1">
                    <label></label>
                    <div class="form-group">
                      <button
                        type="submit"
                        name="submit"
                        class="btn btn-primary"
                        @click="getTrackerList"
                      >
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
                        <th>Notice Period</th>
                        <th>Resume</th>
                        <th>Remarks</th>
                        <th>Reference</th>
                        <th>Added On</th>
                        <th>Action</th>
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

                        <td>
                          <router-link :to="`/tracker-details/${track.id}`"
                            ><a class="text-capitalize">{{
                              track.name
                            }}</a></router-link
                          >
                        </td>
                        <td>{{ track.email }} /{{ track.contact }}</td>

                        <td>
                          {{ track.preffered_location }} /
                          {{ track.current_location }}
                        </td>
                        <td>{{ track.gender }}</td>
                        <td>{{ track.designation }}</td> 
                        <td>  
                          <text-highlight :queries="skillarr">{{ track.key_skills }}</text-highlight>
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
                          >
                        </td>
                        <td>{{ track.remarks }}</td>
                        <td class="text-capitalize">{{ track.reference }}</td>
                        <td>{{ track.created_at | timeformat }}</td>
                        <td>
                          <router-link :to="`/tracker-details/${track.id}`"
                            ><a class="badge badge-primary text-white"
                              ><i class="fa fa-eye" aria-hidden="true"></i>
                              View</a
                            ></router-link
                          >
                        </td>
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

    <!-- The edit sub user end -->
    <subuser-footer></subuser-footer>
  </div>
</template>

<script>
import Vue from 'vue';
import TextHighlight from 'vue-text-highlight';
//import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";

Vue.component('text-highlight', TextHighlight);

export default {
  
 
  name: "Trackerlist",
  
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
      skillarr: [],
      selectAll: false,
      uploadstatus: this.$route.query.uploadstatus,
      trackersCount: "",
      keyword: "",
      searchStatus: false,
    };
  },
  mounted() {
    this.getTrackerList();
    this.getSource();
  },

  methods: {
    resetUrl() {
      this.$router.replace("/tracker-list");
    },
    getTrackerList(page = 1) {
      this.skillarr=this.skills.split(',');
      this.searchStatus = true;
      const self = this;
      axios
        .get(
          "tracker-list?&from_date=" +
            this.from_date +
            "&to_date=" +
            this.to_date +
            "&source=" +
            this.source +
            "&location=" +
            this.location +
            "&skills=" +
            this.skills +
            "&uploadstatus=" +
            this.uploadstatus +
            "&keyword=" +
            this.keyword +
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
        .get("reference-list")
        .then((response) => {
          this.sourceList = response.data.data;
        })
        .catch(function (error) {});
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
            window.open("/export/tracker", "_blank");
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
                "/export/tracker-checked/" + this.checkedNames,
                "_blank"
              );
            }
          });
      }
    },
  },
 
};
</script>

<style scoped>
</style>