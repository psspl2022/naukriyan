<template>
  <div id="viewjob">
    <main-header></main-header>

    <header class="masthead1 text-center text-white mt-5">

      <div class="masthead-content" id="form-container">
        <div class="container">
          <h1 id="looking" class="masthead-heading mb-5 pb-4">Job Details</h1>
        </div>
      </div>

      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>

    <section class="js_fixedcontent detail-header" v-if="alldata.job_sector!=='Government'">
      <div class="container">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-sm-12">
              <div class="float-left">
            <h1>{{ alldata.title }}</h1>
              <span class="mb-0">
                <a :href="alldata.website | checkHTTPSInURL" target="_blank" v-if="alldata.website !== null">{{ alldata.company_name }}</a>
                <span v-else>{{ alldata.company_name }}</span>
              </span>
              <span class="review" id="t-rating">
                <span class="review-star" v-if="allProfile">
                  <i v-for="ratingStar in ratingStars" :key="ratingStar.id"
                  :class="ratingStar.id <=userRating.ratings ? 'fa fa-star active' : 'fa fa-star'"
                  @click="ratings(allProfile.id, ratingStar.id, alldata.company_id)"></i>
                </span>
                <span class="review-star" v-else data-toggle="modal" data-target="#myJobseekerModal" aria-hidden="true"
                         data-dismiss="modal">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </span>
                <span class="review-count fs-12" v-if="avgRating">Avg. {{ avgRating }} / 5</span>
              </span>
            </div>
            <div class="emp-social-icons">
              <ul>
                <li v-if="alldata.facebook_url != null">
                  <a :href="alldata.facebook_url" target="_blank"><i class="fab fa-facebook"></i></a>
                </li>
                <li v-if="alldata.twitter_url != null">
                  <a :href="alldata.twitter_url" target="_blank"><i class="fab fa-twitter"></i></a>
                </li>
                <li v-if="alldata.linkedin_url != null">
                  <a :href="alldata.linkedin_url" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </li>
              </ul>
            </div>
            </div>
            </div>

            <div class="row" v-if="alldata.about !== null">
              <div class="col-sm-12">
                <p>{{ alldata.about | excerpt }}</p>
              </div>
            </div>
          </div>


          <div class="card-body">
            <div class="row">
              <div class="col-lg-10 col-md-9">
                <div class="detail-tags">
                  <div class="destination">
                    <p class="mb-1"><span><a :href="`mailto:${alldata.com_email}`"><i
                        class="fa fa-envelope mr-2"></i>{{ alldata.com_email }}</a></span>
                    </p>
                    <p><span><a :href="`tel:${alldata.com_contact}`"><i
                        class="fa fa-headphones mr-2"></i>{{ alldata.com_contact }}</a></span>
                    </p>
                    <h5 class="">Job Location</h5>
                    <p><span><i
                        class="fa fa-home mr-2"></i>{{
                        alldata.job_address
                      }}</span><br><span><i>  </i>{{ alldata.cities_name }}, {{ alldata.states_name }}</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-3">
                <div class="meta-option mt-4 pt-2">
                  <div class="price-wrapper p-0">
                    <!-- div if -else apllied job open -->
                    <div v-if="allProfile">
                      <div v-if="applyID.includes(alldata.id) === true" id="t-apply" disabled>
                        <a href="#" class="btn btn-danger text-white btn-block" @click.prevent="jobAlreadyApply()"><i
                            class="fa fa-check-circle" aria-hidden="true"></i> Applied</a>
                      </div>

                      <div v-else-if="alldata.add_questionnarie === 'Yes'" id="t-apply">
                        <router-link :to="`/confirm-apply-view-questions/${alldata.id}`">
                          <a href="#" class="btn btn-primary text-white d-block pt-2 pb-2"><i
                              class="fa fa-thumbs-up mr-2">Apply Job</i></a>
                        </router-link>
                      </div>
                      <div v-else id="t-apply">
                        <a href="#" data-toggle="modal" :data-id="alldata.id" data-target=".mdupdate"
                           @click="openmd(alldata.id)" class="btn btn-primary border-orange text-white btn-block">
                          <i class="fa fa-thumbs-up mr-2"></i>Apply Job</a>
                      </div>
                    </div>
                    <div v-else id="t-apply">
                      <a href="" data-toggle="modal" data-target="#myJobseekerModal" aria-hidden="true"
                         data-dismiss="modal"
                         class="btn btn-primary border-orange text-white btn-block"><i
                          class="fa fa-thumbs-up mr-2"></i>Apply Job</a>
                    </div>
                    <br>
                    <!-- div if -else apllied job close -->
                    <div v-if="allProfile">
                      <a href="#" target="_blank" data-id="queryForm" id="t-saved"
                         class="btn btn-danger text-white d-block pt-2 pb-2" @click.prevent="jobAlreadySaved()"
                         v-if="jobsID.includes(alldata.id) === true"><i
                          class="fa fa-heart mr-2"></i>Saved</a>
                      <a href="#" target="_blank" data-id="queryForm" id="t-saved"
                         class="btn btn-primary text-white d-block pt-2 pb-2" @click.prevent="savedjob(alldata.id)"
                         v-else><i
                          class="fa fa-heart mr-2"></i>{{ jobSaveStatus ? 'Saving...' : 'Save Job' }}</a>
                    </div>
                    <div v-else id="t-saved">
                      <a href="#" data-toggle="modal" data-target="#myJobseekerModal" aria-hidden="true"
                         data-dismiss="modal"
                         class="btn btn-danger text-white d-block pt-2 pb-2"><i
                          class="fa fa-heart mr-2"></i>Save Job</a>
                    </div>

                    <div v-if="allProfile" class="mt-2">
                      <a href="#" target="_blank" data-id="queryForm" id="t-follow"
                         class="btn btn-danger text-white d-block pt-2 pb-2" @click.prevent="AlreadyFollowed()"
                         v-if="followID.includes(alldata.company_id) === true" disabled><i
                          class="fa fa-user-check mr-2"></i>Unfollow</a>

                      <a href="#"
                         class="btn btn-primary text-white d-block pt-2 pb-2" id="t-follow"
                         @click.prevent="follow(alldata.company_id,alldata.id)" v-else><i
                          class="fa fa-user-plus mr-2"></i>{{ followStatus ? 'Following' : 'Follow' }}</a>
                    </div>

                    <div v-else class="mt-2" id="t-follow">
                      <a href="#" data-toggle="modal" data-target="#myJobseekerModal" aria-hidden="true"
                         data-dismiss="modal"
                         class="btn btn-primary text-white d-block pt-2 pb-2"><i
                          class="fa fa-user-plus mr-2"></i>Follow</a>
                    </div>

                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- For Government job Sector Job -->
    <section class="js_fixedcontent detail-header" v-if="alldata.job_sector==='Government'">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-10 col-md-9">

                <h1>{{ alldata.title }}
                </h1>

                <p class="mb-0"></p>
                <div class="detail-tags">
                  <div class="destination">

                    <h5 class="">Job Location</h5>
                    <p v-if="alldata.job_sector !== 'Government'"><span><i
                        class="fa fa-home mr-2"></i>{{
                        alldata.job_address
                      }}</span><br><span><i>  </i>{{ alldata.cities_name }}, {{ alldata.states_name }}</span>
                    </p>

                    <p v-else><span><i class="fa fa-home mr-2"></i>{{ alldata.location }}</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-3" v-if="alldata.government_apply_link !== null">
                <div class="meta-option mt-4 pt-2">
                  <div class="price-wrapper p-0">
                    <div class="mt-2" id="t-follow">
                      <a :href="alldata.government_apply_link | checkHTTPSInURL" target="_blank"
                         class="btn btn-primary text-white d-block pt-2 pb-2"><i
                          class="fa fa-user-plus mr-2"></i>Apply Job</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="top-adjust section pb-5 mt-0 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="card mt-3">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Job Description</h2>
                <p v-html="alldata.description"></p>
              </div>
            </div>

            <div class="card mt-3" v-if="alldata.job_skills != null">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Skills</h2>
                <ul class="skills" :inner-html.prop="alldata.job_skills | stringToSpanTag">

                </ul>
              </div>
            </div>
            <!-- Other details -->
            <div class="card mt-3" v-if="alldata.job_sector==='Government'">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Others Details</h2>
                <ul class="skills">
                  <li>Application Start Date : {{ alldata.start_apply_date |timeformat }}</li>
                  <li>Application End Date : {{ alldata.last_apply_date |timeformat }}</li>
                </ul>
              </div>
            </div>

            <!-- /.card-body -->

            <!-- /.card-body -->
          </div>
          <div class="col-sm-4">
            <div class="card mt-3">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Job Overview</h2>
                <ul class="ove-detail-list p-0">
                  <li>
                    <i class="fa fa-wallet"></i>
                    <h5>Offered Salary(Per year)</h5>
                    <span v-if="alldata.offered_sal_min===null && alldata.offered_sal_max===null">Not Disclosed</span>
                    <span v-else>{{ ' &#8377 ' + alldata.offered_sal_min }} - {{
                        ' &#8377 ' + alldata.offered_sal_max
                      }}</span>

                  </li>

                  <li v-if="alldata.job_sector!=='Government'">
                    <i class="fa fa-user"></i>
                    <h5>Job Preference</h5>
                    <span>{{ alldata.job_preference }}</span>
                  </li>

                  <li v-if="alldata.job_sector!=='Government'">
                    <i class="fa fa-pen"></i>
                    <h5>Career Level</h5>
                    <span>{{ alldata.career_level }}</span>
                  </li>

                  <li v-if="alldata.job_sector !== 'Government'">
                    <i class="fa fa-home"></i>
                    <h5>Industry</h5>
                    <span>{{ alldata.category_name }}</span>
                  </li>

                  <li v-else>
                    <i class="fa fa-home"></i>
                    <h5>Department</h5>
                    <span>{{ alldata.department }}</span>
                  </li>

                  <li v-if="alldata.job_sector!=='Government'">
                    <i class="fa fa-graduation-cap"></i>
                    <h5>Experience</h5>
                    <span v-if="alldata.main_exp==='0' && alldata.max_exp ==='0'">Fresher</span>
                    <span v-else>{{ alldata.main_exp + ' Yr' }} - {{ alldata.max_exp + ' Yr' }}</span>
                  </li>

                  <li v-else>
                    <i class="fa fa-graduation-cap"></i>
                    <h5>Experience</h5>
                    <span v-if="alldata.main_exp !== null">{{ alldata.main_exp + ' Yr' }}</span>
                    <span v-else>N/A</span>
                  </li>

                  <li v-if="alldata.job_sector !== 'Government'">
                    <i class="fa fa-book"></i>
                    <h5>Qualification</h5>
                    <span>{{ alldata.qualification }}</span>
                  </li>

                  <li v-else>
                    <i class="fa fa-book"></i>
                    <h5>Qualification</h5>
                    <span>{{ alldata.qualification_for_gov }}</span>
                  </li>

                  <li v-if="alldata.job_sector === 'Government' && alldata.attachment !== null">
                    <i class="fa fa-download"></i>
                    <a :href="`${alldata.attachment}`" target="_blank">Download Notification</a>
                  </li>

                </ul>
              </div>
            </div>

            <div class="card mt-3">

              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Share This Job</h2>

                <ul class="simple-list-sshare">
                  <li><a
                      :href="'https://www.facebook.com/sharer/sharer.php?message=website&u=http://naukriyan.com/share-job/'+alldata.id"
                      target="_blank" rel="noopener" id="t-facebook"><i class="fab fa-facebook-square"></i></a></li>
                  <li><a
                      :href="'https://www.linkedin.com/sharing/share-offsite/?url=https%3A%2F%2Fwww.naukriyan.com/share-job/'+alldata.id"><i
                      class="fab fa-linkedin" target="_blank" rel="noopener" id="t-linkedin"></i></a></li>
                  <li><a
                      :href="'https://twitter.com/share?text='+alldata.title+' job in '+alldata.cities_name+' for detail click here&url=http://naukriyan.com/share-job/'+alldata.id+''"><i
                      class="fab fa-twitter-square" target="_blank" rel="noopener" id="t-twitter"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <div id="section">


    </div>

    <main-footer></main-footer>
    <!-- The Modal Apply Job -->
    <div class="modal fade popupForm mdupdate" id="apply">
      <div class="modal-dialog">
        <div class="modal-content">
          <form
            role="form"
            method="post"
            @submit.prevent="ApplyJob(demo.id)"
            enctype="multipart/form-data"
          >
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Confirmation before Apply?</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p><strong>Job Title</strong> :- {{ demo.title }}</p>
                  </div>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p><strong>Location</strong> :- {{ demo.location }}</p>
                  </div>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p>
                      <strong>Company Name</strong> :- {{ demo.company_name }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="question">
                <p>
                  Do you have any of the relavant or Equivalent Qualification ?
                  ({{ demo.qualification }})
                </p>
                <fieldset class="mb-3">
                  <div class="form-group ask_question">
                    <div class="icheck-primary d-inline">
                      <input
                        type="radio"
                        id="radioPrimary1"
                        name="r1"
                        checked=""
                      />
                      <label for="radioPrimary1"> Yes </label>
                    </div>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary2" name="r1" />
                      <label for="radioPrimary2"> No </label>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="question">
                <p>
                  Do you have relevant experience of this job ?({{
                    demo.min_exp
                  }}Yr -{{ demo.max_exp }}Yr)
                </p>
                <fieldset class="mb-3">
                  <div class="form-group ask_question">
                    <div class="icheck-primary d-inline">
                      <input
                        type="radio"
                        id="radioPrimary3"
                        name="ex1"
                        checked=""
                      />
                      <label for="radioPrimary3"> Yes </label>
                    </div>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary4" name="ex1" />
                      <label for="radioPrimary4"> No </label>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="question">
                <p>
                  Do you have relevant skill for this job ?({{
                    demo.job_skill
                  }})
                </p>
                <fieldset class="mb-3">
                  <div class="form-group ask_question">
                    <div class="icheck-primary d-inline">
                      <input
                        type="radio"
                        id="radioPrimary5"
                        name="sk1"
                        checked=""
                      />
                      <label for="radioPrimary5"> Yes </label>
                    </div>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary6" name="sk1" />
                      <label for="radioPrimary6"> No </label>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary">
                {{ applyJobStatus ? "Please Wait...." : "Confirm Apply" }}
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Viewjob",
  data() {
    return {
      user: "",
      jobsID: [],
      followID: [],
      applyID: [],
      rate: [],
      followStatus: false,
      jobSaveStatus: false,
      applyJobStatus: false,
      demo: new Form({
        id: "",
        title: "",
        location: "",
        qualification: "",
        min_exp: "",
        max_exp: "",
        job_skill: "",
        company_name: "",
      }),

      job_id_by_url: this.$route.params.viewjobsid,
      avgRating: "",
      userRating: "",
      page: "",

      ratingStars: [{ id: 1 }, { id: 2 }, { id: 3 }, { id: 4 }, { id: 5 }],
    };
  },

  mounted() {
    this.$store.dispatch(
      "getAllData",
      `/viewjobs/${this.$route.params.viewjobsid}`
    );
    this.$store.dispatch("getAllProfile", "/userprofile");
    // if (localStorage.getItem("reloaded")) {
    // The page was just reloaded. Clear the value from local storage
    // so that it will reload the next time this page is visited.
    //   localStorage.removeItem("reloaded");
    // } else {
    // Set a flag so that we know not to reload the page twice.
    //   localStorage.setItem("reloaded", "1");
    //   location.reload();
    // }
    this.checkUserApplyJobs();
    this.checkUserSavedJobs();
    this.checkFollow();
    this.getRatingsDetails();
    this.getGuestUser();
  },

  created() {
    this.getRatingsDetails();
  },

  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
  },
  methods: {
    getGuestUser() {
      axios.get("/checkuser").then((response) => {
        this.user = response.data.data.user_type;
      });
    },
    getRatingsDetails() {
      axios
        .get("/get-ratings?job_id=" + this.job_id_by_url)
        .then((response) => {
          this.avgRating = response.data.data.average_rating;
          this.userRating = response.data.data.user_rating;
        });
    },

    savedjob: function (id) {
      let uri = "/saved-job/" + id;
      this.jobSaveStatus = true;
      axios.get(uri).then((response) => {
        this.jobSaveStatus = false;
        this.checkUserSavedJobs();
        swal("Job Saved Successfully!");
      });
    },

    ratings(jobseeker_id, rt, company_id) {
      axios
        .get("/assign-ratings-company", {
          params: {
            js_id: jobseeker_id,
            rt_no: rt,
            cm_id: company_id,
          },
        })
        .then((response) => {
          this.getRatingsDetails();
          if (response.status === 200 && response.data.status === true) {
            // this.$router.push("/thanq");
            toast({
              type: "success",
              title: response.data.message,
            });
          } else if (
            response.status === 201 &&
            response.data.status === "error"
          ) {
            toast({
              type: "error",
              title: response.data.message,
            });
          } else {
            toast({
              type: "error",
              title: "Something went wrong. Please try again",
            });
          }
        });
    },

    checkUserSavedJobs() {
      const self = this;
      axios.get("/check-user-saved-job").then((response) => {
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.jobsID.push(value.job_id);
          });
        } else {
          this.jobsID.push(0);
        }
      });
    },

    checkUserApplyJobs() {
      const self = this;
      axios.get("check-user-apply-job").then((response) => {
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.applyID.push(value.job_id);
          });
        } else {
          this.applyID.push(0);
        }
      });
    },

    follow(comp_id, job_id) {
      var uri = "/follow/" + comp_id + "/" + job_id;
      this.followStatus = true;
      axios.get(uri).then((response) => {
        if (response.status === 200) {
          this.followStatus = false;
          this.checkFollow();
          swal("Company Followed");
        }
      });
    },

    checkFollow() {
      const self = this;
      axios.get("/check-follow").then((response) => {
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.followID.push(value.employer_id);
          });
        } else {
          this.followID.push(0);
        }
      });
    },

    jobAlreadyApply() {
      swal("Already Applied!", "You clicked the button!", "warning");
    },
    jobAlreadySaved() {
      swal("Already Saved!", "You have already saved the this job.", "warning");
    },
    UnFollowed() {
      swal(
        "Already Followed",
        "If You unfollow this company then go to Companies following Section!",
        "warning"
      );
    },
    AlreadyFollowed() {
      swal(
        "Already Followed",
        "If You unfollow this company then go to companies following section!",
        "warning"
      );
    },
    openmd: function (id) {
      axios.get("/get-applyjobdata/" + id).then((response) => {
        this.demo.id = response.data[0].id;
        this.demo.title = response.data[0].title;
        this.demo.location = response.data[0].job_exp;
        this.demo.qualification = response.data[0].qualification;
        this.demo.min_exp = response.data[0].main_exp;
        this.demo.max_exp = response.data[0].max_exp;
        this.demo.job_skill = response.data[0].job_skills;
        this.demo.company_name = response.data[0].company_name;
      });
    },
    ApplyJob: function (id) {
      this.applyJobStatus = true;
      this.demo.post("/apply-job/" + id).then((response) => {
        this.$router.push("/appliedjob");
        this.applyJobStatus = false;
        window.location.reload();
        toast({
          type: "success",
          title: "Job Applied Successfully",
        });
      });
    },
  },

  filters: {
    stringToSpanTag: function (string) {
      let result = "";
      let arrStr = string.split(",");
      let strLength = arrStr.length;
      for (let i = 0; i < strLength; i++) {
        result += "<li>" + arrStr[i] + "</li>";
      }
      return result;
    },

    checkHTTPSInURL(url) {
      let pattern = /^((http|https|ftp):\/\/)/;

      if (url == null) {
        return "";
      } else {
        if (!pattern.test(url)) {
          return "http://" + url;
        } else {
          return url;
        }
      }
    },

    excerpt(string) {
      if (string == null) return "";

      if (string.length > 100) {
        return string.substr(0, string.lastIndexOf(" ", 500));
      }
    },
  },
};
</script>

<style scoped>
.ask_question {
  margin: 0;
  padding: 0;
  margin-top: 10px;
  margin-left: -15px;
}
.review {
  margin-left: 15px;
}
.emp-social-icons {
  float: right;
}
.emp-social-icons li {
  list-style: none;
  display: inline-block;
  font-size: 20px;
  background: #d8d8d8;
  height: 35px;
  width: 32px;
  text-align: center;
  border-radius: 4px;
  line-height: 1.8;
  margin: 2px;
  color: #555;
}
.emp-social-icons li:hover {
  background-color: #b5b5b5e0;
}
.emp-social-icons ul {
  padding: 8px 0px;
}
</style>
