<template>
  <div id="home">
    <main-header></main-header>
    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1
            id="looking"
            class="masthead-heading mb-0"
            @click="filterStatus = false"
          >
            I Am Looking For !!
          </h1>
        </div>
      </div>
      <div class="masthead-content" id="form-container">
        <div class="container">
          <form>
            <div class="form-group row">
              <div class="col-sm-4 pr-0">
                <input
                  type="text"
                  placeholder="Skills, Designation, Companies"
                  class="form-control"
                  id="keyword"
                  v-model="keyword"
                  @focus="filterStatus = true"
                />
                <i
                  class="fa fa-pencil-alt search-icons"
                  aria-hidden="true"
                  required
                ></i>
                <div style="background-color: white">
                  <ul
                    class="filter-keyword"
                    v-if="filteredKeywords && filterStatus"
                  >
                    <li
                      v-for="(filterKeyword, index) in filteredKeywords.slice(
                        0,
                        9
                      )"
                      :key="index"
                      @click="setkeyword(filterKeyword)"
                    >
                      {{ filterKeyword }}
                    </li>
                  </ul>
                </div>
              </div>

              <div class="col-sm-2">
                <input
                  type="text"
                  id="location"
                  placeholder="Location"
                  class="form-control"
                  v-model="location"
                />
                <i
                  class="fa fa-location-arrow search-icons"
                  aria-hidden="true"
                ></i>
              </div>

              <div class="col-sm-2">
                <div class="">
                  <select id="experience" class="form-control rounded-0" v-model="experience">
                    <option disabled value="">Experience</option>
                    <option
                      :value="index"
                      v-for="(experience, index) in experiences"
                    >
                      {{ experience }}
                    </option>
                  </select>
                  <i
                    class="fa fa-graduation-cap search-icons"
                    aria-hidden="true"
                  ></i>
                </div>
              </div>

              <div class="col-sm-2">
                <div class="">
                  <select id="jobtype" class="form-control rounded-0" v-model="jobtype">
                    <option disabled value="">Job Type</option>
                    <option
                      v-for="jobtype in allDesignation"
                      :key="jobtype.id"
                      :value="`${jobtype.id}`"
                    >
                      {{ jobtype.job_type }}
                    </option>
                  </select>
                  <i class="fa fa-job-sign search-icons" aria-hidden="true"></i>
                </div>
              </div>

              <div class="col-sm-2">
                <router-link :to ="{path :'/browsejob',
               query: {
                 keyword:this.keyword,
                location: this.location,
                experience: this.experience,
                jobtype:this.jobtype
                
                }
                }"><button class="btn search-btn">
                  <i class="fa fa-search mr-2" aria-hidden="true"></i>Search
                </button></router-link >
              </div>
            </div>
            <!-- session user ='' -->
            <div
              class="col-sm-12 mt-5"
              v-if="allProfile != null && allProfile.user_type === 'Employer'"
            >
              <router-link :to="`/postnewjob`"
                ><a>
                  <button class="btn transparent">
                    <i
                      class="fa fa-address-book mr-2"
                      aria-hidden="true"
                      data-dismiss="modal"
                    ></i
                    >Post A Job for Free
                  </button>
                </a></router-link
              >
            </div>
            <div
              class="col-sm-12 mt-5"
              v-else-if="
                allProfile != null && allProfile.user_type === 'Jobseeker'
              "
            >
              <router-link :to="`/userinfo/pe`"
                ><a>
                  <button class="btn transparent">
                    <i class="fa fa-file-invoice mr-2" aria-hidden="true"></i
                    >Upload Your CV
                  </button>
                </a></router-link
              >
            </div>
            <div class="col-sm-12 mt-5" v-else>
              <a
                href=""
                data-toggle="modal"
                data-target="#myJobseekerModal"
                aria-hidden="true"
                data-dismiss="modal"
              >
                <button class="btn transparent">
                  <i class="fa fa-file-invoice mr-2" aria-hidden="true"></i
                  >Upload Your CV
                </button>
              </a>

              <a
                href=""
                data-toggle="modal"
                data-target="#myEmployerModal"
                aria-hidden="true"
                data-dismiss="modal"
              >
                <button class="btn transparent">
                  <i
                    class="fa fa-address-book mr-2"
                    aria-hidden="true"
                    data-dismiss="modal"
                  ></i
                  >Post A Job for Free
                </button>
              </a>

              <a href="" data-toggle="modal" data-target="#myModal1">
                <button class="btn transparent">
                  <i class="fa fa-user-plus mr-2" aria-hidden="true"></i
                  >Register Here
                </button>
              </a>
            </div>
          </form>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>
    <div class="">
      <marquee
        behavior="scroll"
        direction="left"
        onmouseover="this.stop();"
        onmouseout="this.start();"
      >
        <ul class="marquee-list">
          <li v-for="news in alldata" :key="news.id">
            {{ news.one_liner_news }}
          </li>
        </ul>
      </marquee>
    </div>
    <section class="section mb-3">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">
            <h1 class="custom heading">Latest Job</h1>
            <p class="custom-sub-heading">Find Your Dream Jobs</p>
            <div>
              <ul class="nav nav-tabs">
                <li class="nav-item" v-for="sector in sectors" :key="sector.id">
                  <a
                    class="nav-link"
                    :class="sector.id === 1 ? 'active' : ''"
                    role="tab"
                    data-toggle="tab"
                    @click.prevent="getJobsBySectorId(sector.id)"
                    >{{ sector.job_sector }}</a
                  >
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" id="tab-1">
                  <div class="table-responsive">
                    <table class="table custom-table table-hover">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <!-- <th>Company Name</th> -->
                          <th>Location</th>
                          <th v-if="jobs.length && jobs[0].job_sector_id === 3">
                            Last Apply Date
                          </th>
                          <th v-else>Experience</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr v-for="job in jobs.slice(0, 10)" :key="job.id">
                          <td>{{ job.title }}</td>
                          <!-- <td>{{ job.company_name }}</td> -->
                          <td v-if="job.job_sector_id !== 3">
                            {{ job.job_exp | capitalize }}
                          </td>
                          <td v-else>
                            {{
                              job.location
                                ? job.location
                                : "Not available" | capitalize
                            }}
                          </td>
                          <td
                            v-if="job.main_exp === '0' && job.max_exp === '0'"
                          >
                            Fresher
                          </td>
                          <td v-else-if="job.job_sector_id === 3">
                            {{ job.last_apply_date | changeDateFormat }}
                          </td>
                          <td v-else>
                            {{ job.main_exp + " Yr" }}
                            <span v-if="job.max_exp !== null"
                              >- {{ job.max_exp + " Yr" }}
                            </span>
                          </td>
                          <td>
                            <router-link :to="`/edit-viewjobs/${job.id}`">
                              <button
                                class="btn btn-primary apply"
                                type="button"
                              >
                                View Job
                              </button>
                            </router-link>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="view">
        <router-link :to="`/browsejob`" v-if="jobs.length > 0">
          <button class="btn" type="button">View All</button>
        </router-link>
      </div>
    </section>
    <section class="section pb-5" id="clients" v-if="topEmp.length > 0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col">
            <h1 class="custom heading">Top Employers</h1>

            <p class="custom-sub-heading"></p>
          </div>

          <infinite-slide-bar>
            <div class="slide">
              <div v-for="top_emp in topEmp" :key="top_emp.id">
                <div class="f-left pd-t-8px mg-r-10px">
                  <a :href="top_emp.company_name"
                    ><img
                      :src="'company_logo/' + top_emp.company_logo"
                      :alt="top_emp.company_name"
                  /></a>
                </div>
              </div>
            </div>
          </infinite-slide-bar>
        </div>
      </div>
    </section>

    <main-footer></main-footer>
  </div>
</template>

<script>
import moment from "moment";
export default {
  
  name: "Home",
  data() {
    return {
      keyword: "",
      location:'',
      experience:'',
      jobtype:'',
      resume_per_page:'',
      keywords: [],
      filteredKeywords: [],
      filterStatus: false,
      sectors: [],
      jobs: [],
      topEmp: [],
      loading: false,
      sec: [],
      moment: moment,
      experiences: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12,13,14,15,16,17],
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/newsandnotification");
    this.$store.dispatch("getAllProfile", "/checkuser");
    this.$store.dispatch("getAllDesignation", "/get-job-type");
    this.getTopEmployers();
    this.getSector();
    this.getJobsBySectorId(1);
    this.getFilteredKeyword();
    this.getFilterKeywords();
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },
  },

  methods: {
    getFilteredKeyword() {
      if (this.keyword.length == 0) {
        this.filteredKeywords = this.keywords;
      }

      this.filteredKeywords = this.keywords.filter((el) => {
        return el.toLowerCase().startsWith(this.keyword.toLowerCase());
      });
    },

    setkeyword(keyword) {
      this.keyword = keyword;
      this.filterStatus = false;
    },

    getFilterKeywords() {
      axios
        .get("/get-keywords")
        .then((response) => {
          this.keywords = response.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },

    getSector() {
      let self = this;
      axios.get("/get-job-sectors").then((response) => {
        this.sectors = response.data;
        $.each(response.data, function (key, value) {
          self.sec.push(value.job_sector);
        });
      });
    },

    getJobsBySectorId(id) {
      axios
        .get("/get-jobs-by-category", { params: { sector_id: +id } })
        .then((response) => {
          this.jobs = response.data;
        });
    },

    getTopEmployers() {
      axios.get("get-top-employers").then((response) => {
        if (response.data.status === "Success") {
          this.topEmp = response.data.data;
        }
      });
    },

  },

  watch: {
    keyword() {
      this.getFilteredKeyword();
    },
  },

  filters: {
    capitalize: function (value) {
      if (!value) return "";
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    },
    uppercase: function (value) {
      if (!value) return "";
      return value.toUpperCase();
    },
    changeDateFormat(value) {
      if (value) {
        return moment(String(value)).format("LL");
      }
    },
  },
};
</script>

<style scoped>
.filter-keyword {
list-style-type: none;
    padding: 0;
    text-align: left;
    z-index: 999;
    position: absolute;
    background-color: #fff;
    width: 100%;
    overflow-y: scroll;
    height: auto;
}
.filter-keyword li {
  color: gray;
  padding: 3px 13px;
  border-bottom: 1px solid #ebebeb;
}

.filter-keyword li:first-child {
  background-color: #ebebeb;
}

.loading-text {
  text-align: center !important;
}

.slide {
  display: flex;
  justify-content: space-around;
}
</style>
