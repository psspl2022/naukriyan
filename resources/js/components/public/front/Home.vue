<template>
  <div id="home">
    <main-header></main-header>
    <div class="multi-action">
      <a href="/online-registration" target="_blank" class="action-button"
        ><i class="fas fa-hand-pointer"></i>&nbsp; Online Registration</a
      >
    </div>

    <header class="masthead text-center text-white">
      <div class="masthead-content">
        <div class="container">
          <h1 id="looking" class="masthead-heading mb-0" @click="filterStatus = false">
            I Am Looking For !!
          </h1>
        </div>
      </div>

      <div class="masthead-content" id="form-container">
        <div class="container">
          <form>
            <div class="form-group row">
              <div class="col-sm-4 pr-0 p-1 bg-white tag-input-con">
                <vue-tags-input
                  class="input-tag"
                  placeholder="Skills, Designation, Companies"
                  v-model="tag"
                  @keyup="
                    () => {
                      placeholder = ' ';
                    }
                  "
                  :separators="[';', ',']"
                  :add-on-key="[13, ',', ';']"
                  :tags="tags"
                  :autocomplete-items="autocompleteItems"
                 
                  @tags-changed="update"
                />
                <i class="fa fa-pencil-alt search-icons" aria-hidden="true" required></i>
                <div style="background-color: white">
                  <ul class="filter-keyword" v-if="filteredKeywords && filterStatus">
                    <li
                      v-for="(filterKeyword, index) in filteredKeywords.slice(0, 9)"
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
                <i class="fa fa-location-arrow search-icons" aria-hidden="true"></i>
              </div>

              <div class="col-sm-2">
                <div class="">
                  <select
                    id="experience"
                    class="form-control rounded-0"
                    v-model="experience"
                  >
                    <option disabled value="">Experience</option>
                    <option :value="index" v-for="(experience, index) in experiences">
                      {{ experience }}
                    </option>
                  </select>
                  <i class="fa fa-graduation-cap search-icons" aria-hidden="true"></i>
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
                <router-link
                  :to="{
                    path: '/browsejob',
                    query: {
                      keyword: this.handlers.toString(),
                      location: this.location,
                      experience: this.experience,
                      jobtype: this.jobtype,
                    },
                  }"
                  ><button class="btn search-btn">
                    <i class="fa fa-search mr-2" aria-hidden="true"></i>Search
                  </button></router-link
                >
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
              v-else-if="allProfile != null && allProfile.user_type === 'Jobseeker'"
            >
              <router-link :to="`/userinfo/pe`"
                ><a>
                  <button class="btn transparent">
                    <i class="fa fa-file-invoice mr-2" aria-hidden="true"></i>Upload Your
                    CV
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
                  <i class="fa fa-file-invoice mr-2" aria-hidden="true"></i>Upload Your CV
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
                  <i class="fa fa-user-plus mr-2" aria-hidden="true"></i>Register Here
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
                              job.location ? job.location : "Not available" | capitalize
                            }}
                          </td>
                          <td v-if="job.main_exp === '0' && job.max_exp === '0'">
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
                                class="btn btn-primary apply font-weight-bold"
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
          <button class="btn font-weight-bold" type="button">View All</button>
        </router-link>
      </div>
    </section>

    <!-- Resume start -->
    <div class="col-10 mx-auto mar-5rem video_resume">
      <h3 class="custom heading">How to make Video Resume</h3>
      <div
        class="accordion"
        id="faqExample"
        :class="tabValue === 'samplevideoresume' ? 'show-form' : 'hide-form'"
      >
        <div class="card mb-2">
          <div class="card-header pt-1 pb-1" id="samplevideoresume">
            <h4 class="mb-0">
              <button
                class="btn btn-link"
                type="button"
                data-toggle="collapse"
                data-target="#collapseThree"
                aria-expanded="true"
                aria-controls="collapseThree"
              >
                Sample Video Resume
              </button>
            </h4>
          </div>

          <div
            id="collapseThree"
            class="collapse show"
            aria-labelledby="samplevideoresume"
            data-parent="#faqExample"
          >
            <div class="card-body">
              <div class="form-group row">
                <div
                  class="col-sm-4 mb-2"
                  v-for="(res, index) in videoResumes"
                  :key="res.id"
                >
                  <video-embed
                    css="embed-responsive-4by3"
                    :src="res.resume_video_link"
                  ></video-embed>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Resume End -->

    <!-- Business Clients -->
    <div class="col-11 col-md-10 mx-auto mar-5rem business_clients">
      <h3 class="custom heading mb-4">Our Business Clients</h3>
      <carousel
        :autoplay="true"
        :nav="false"
        :items="5"
        :dots="true"
        :margin="15"
        :responsive="{ 0: { items: 3 }, 600: { items: 4 }, 1000: { items: 5 } }"
      >
        <img :src="'client_logo/logo1.png'" />
        <img :src="'client_logo/logo3.png'" />
        <img :src="'client_logo/logo4.png'" />
        <img :src="'client_logo/logo5.png'" />
        <img :src="'client_logo/logo8.png'" />
        <img :src="'client_logo/logo9.png'" />
        <img :src="'client_logo/logo10.png'" />
        <img :src="'client_logo/logo11.png'" />
        <img :src="'client_logo/logo12.png'" />
        <img :src="'client_logo/logo13.png'" />
        <img :src="'client_logo/logo14.png'" />
        <img :src="'client_logo/logo15.png'" />
        <img :src="'client_logo/logo16.png'" />
        <img :src="'client_logo/logo17.png'" />
        <img :src="'client_logo/logo18.png'" />
        <img :src="'client_logo/logo20.png'" />
        <img :src="'client_logo/logo23.png'" />
        <img :src="'client_logo/logo24.png'" />
        <img :src="'client_logo/logo25.png'" />
        <img :src="'client_logo/logo26.png'" />
        <img :src="'client_logo/logo27.png'" />
        <img :src="'client_logo/logo28.png'" />
        <img :src="'client_logo/logo29.png'" />
        <img :src="'client_logo/logo31.png'" />
        <img :src="'client_logo/logo32.png'" />
        <img :src="'client_logo/logo33.png'" />
        <img :src="'client_logo/logo34.png'" />
        <img :src="'client_logo/logo35.png'" />
        <img :src="'client_logo/logo36.png'" />
        <img :src="'client_logo/logo37.png'" />
        <img :src="'client_logo/logo38.png'" />
        <img :src="'client_logo/logo40.png'" />
        <img :src="'client_logo/logo41.png'" />
        <img :src="'client_logo/logo42.png'" />
        <img :src="'client_logo/logo43.png'" />
        <img :src="'client_logo/logo44.png'" />
        <img :src="'client_logo/logo45.png'" />
        <img :src="'client_logo/logo46.png'" />
        <img :src="'client_logo/logo47.png'" />
      </carousel>
    </div>
    <!-- End Business Clients -->

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
import carousel from "vue-owl-carousel";
import $ from "jquery";
import VueTagsInput from "@johmun/vue-tags-input";
export default {
  components: { carousel },

  name: "Home",
  components: {
    VueTagsInput,
  },
  data() {
    return {
      tag: "",
      tags: [],
      handlers: [],
      autocompleteItems: [],
      debounce: null,
      keyword: "",
      location: "",
      experience: "",
      jobtype: "",
      resume_per_page: "",
      keywords: [],
      filteredKeywords: [],
      filterStatus: false,
      sectors: [],
      jobs: [],
      topEmp: [],
      loading: false,
      sec: [],
      videoResumes: [],
      moment: moment,
      experiences: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
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
    this.getVideoResume();
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
    update(newTags) {
      this.autocompleteItems = [];
      this.tags = newTags.map((a) => {
        return a.text;
      });
      this.handlers = this.tags.toString();
      // this.keyword = this.tags.toString();
      // console.log(this.tags);
    },
    initItems() {
      if (this.tag.length < 2) return;
      const url = `get-allskills/` + this.tag;

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
    isDuplicate(tags, tag) {
      return tags.map((t) => t.text).indexOf(tag.text) !== -1;
    },
    getFilteredKeyword() {
      if (this.keyword.length == 0) {
        this.filteredKeywords = this.keywords;
      }
      this.filteredKeywords = this.keywords.filter((el) => {
        return el.toLowerCase().startsWith(this.keyword.toLowerCase());
      });
    },

    setkeyword(keyword) {
      this.keyword = "keyword";
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

    getVideoResume() {
      axios.get("/get-video-resume").then((response) => {
        this.videoResumes = response.data.data;
        console.log(this.videoResumes);
      });
    },
  },

  watch: {
    tag: "initItems",
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
.tag-input-con {
  height: 45px;
}
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

/* Registration Button */
.multi-action {
  display: inline-block;
  position: absolute;
  bottom: 20%;
  right: 0px;
  z-index: 100;
  /* margin: 300px 0 0 -28px; */
}
.action-button {
  border: 0;
  outline: 0;
  /* background: #5b36a9bd; */
  background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
  background-size: 400% 400%;
  animation: gradient 1s ease infinite;
  font-size: 20px;
  color: white !important;
  padding: 5px 10px;
  z-index: 2;
  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16), 0 2px 5px 0 rgba(0, 0, 0, 0.26);
  transition: all 0.3s;
}
.action-button:hover {
  background: #5200ff;
}
.nav-tabs .nav-link {
  font-weight: 600;
}
.custom-table td {
  font-weight: bold;
}
.custom-sub-heading {
  font-weight: bold;
}
.mar-5rem {
  margin: 5rem 0px;
}
@media (max-width: 700px) {
  .video_resume .custom.heading,
  .business_clients .custom.heading {
    font-size: 25px;
  }
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

</style>
