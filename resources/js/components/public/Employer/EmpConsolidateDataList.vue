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
                  <li class="active">Consolidate Data Candidate List</li>
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
              <h2 class="hk-pg-title">Consolidate Data Candidate List</h2>
            </div>

            <div class="card mt-1">
              <div class="card-body">
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
                <center>
                  -------------------------------------------------OR------------------------------------------------------
                </center>
                <br>
                <div class="row">
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
                      class="form-control"
                      v-model="skills"
                      placeholder="Enter Skills"
                    /> -->
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

                <div class="row mt-2 mb-2">
                  <div class="col-md-3" v-if="checkedNames.length === 0">
                  <a
                    href=""
                    @click.prevent="exportjobseekers()"
                    type="button"
                    class="btn btn-success text-white"
                    >Complete Data Export in Excel</a
                  >
                  </div>
                  <div class="col-md-8" v-if="checkedNames.length > 0">
                    <span
                      ><b>Total Checked :</b> {{ checkedNames.length }}</span
                    >

                    <a
                      href=""
                      type="button"
                      @click.prevent="exportjobseekerchecked()"
                      class="btn btn-success text-white"
                      id="checkboxsButton"
                      v-if="checkedNames.length > 0"
                      >Export</a>
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="col-md-4">
                    <b>Showing :</b>
                    {{ resultInfo.from ? resultInfo.from : 0 }} –
                    {{ resultInfo.to ? resultInfo.to : 0 }} of
                    {{ resultInfo.total ? resultInfo.total : 0 }} Candidate.
                  </div>
                  <div class="col-md-5">
                    <pagination
                      :data="myData"
                      :limit="10"
                      @pagination-change-page="getFilterData"
                    ></pagination>
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
                        <!-- <td>{{ resumes.key_skills }}</td> -->
                        <td>
                          <text-highlight :queries="allSkill">{{ resumes.key_skills }}</text-highlight>
                        </td>
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
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    

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
  name: "List",
  
  components: {
    VueTagsInput,
  },

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
      allSkill: [],
      handlers: [],
      autocompleteItems: [],
      selectAll: false,
      checkedData: "",
    };
  },
  mounted() {
    this.getUniqueSource();
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
          "/bulk-data1?&from_date=" +
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
            this.allSkill
        )
        .then(function (response) {
          self.myData = response.data.data;
          self.resultInfo = response.data.data;
          self.checkedData = response.data.data.data;
        });
    },
    getUniqueSource() {
      axios
        .get("/getUniqueSource1")
        .then((response) => {
          this.sourceList = response.data.data;
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
            window.open("/export-data1", "_blank");
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
                "/export-data-checked1/" + this.checkedNames,
                "_blank"
              );
            }
          });
      }
    },
  },
  created: function () {
    this.getFilterData();
  },
};
</script>
