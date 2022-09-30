<template>
  <div id="viewjob">

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

    <section class="js_fixedcontent detail-header">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-10 col-md-9">

                <h1>{{ alldata.company_name }} <sup class="review">
                                        <span class="review-star">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                  <span class="review-count fs-12">(324 reviews)</span>
                </sup>
                </h1>
                <p class="mb-0">{{ alldata.title }}</p>
                <div class="detail-tags">
                  <div class="destination">
                    <p class="mb-1"><span><a :href="`mailto:${alldata.com_email}`"><i
                        class="fa fa-envelope mr-2"></i>{{ alldata.com_email }}</a></span>
                    </p>
                    <p><span><a :href="`tel:${alldata.com_contact}`"><i
                        class="fa fa-headphones mr-2"></i>{{ alldata.com_contact }}</a></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-3">
                <div class="meta-option mt-4 pt-2">
                  <div class="price-wrapper p-0" v-if="allProfile.user_type==='Jobseeker'">

                    <a href="#" target="_blank" data-toggle="modal" data-target="#apply"
                       class="btn btn-primary text-white d-block pt-2 pb-2"><i
                        class="fa fa-thumbs-up mr-2"></i>Apply Job</a>


                    <a href="#" target="_blank" data-id="queryForm"
                       class="btn btn-danger text-white d-block pt-2 pb-2" @click.prevent="jobAlreadySaved()"
                       v-if="jobsID.includes(alldata.id) === true" disabled><i
                        class="fa fa-heart mr-2"></i>Saved</a>

                    <a href="#" target="_blank" data-id="queryForm"
                       class="btn btn-danger text-white d-block pt-2 pb-2" @click.prevent="savedjob(alldata.id)" v-else><i
                        class="fa fa-heart mr-2"></i>Save Job</a>

                    <a href="#" target="_blank" data-id="queryForm"
                       class="btn btn-danger text-white d-block pt-2 pb-2" @click.prevent="AlreadyFollowed()"
                       v-if="followID.includes(alldata.company_id) === true" disabled><i
                        class="fa fa-user-check mr-2"></i>Unfollow</a>
                    <a href="#"
                       class="btn btn-primary text-white d-block pt-2 pb-2"
                       @click.prevent="follow(alldata.company_id,alldata.id)" v-else><i
                        class="fa fa-user-plus mr-2"></i>Follow</a>
                  </div>
                  <div class="price-wrapper p-0" v-else>

                    <a href="#" target="_blank" data-toggle="modal" data-target="#myJobseekerModal" aria-hidden="true" data-dismiss="modal"
                       class="btn btn-primary text-white d-block pt-2 pb-2"><i
                        class="fa fa-thumbs-up mr-2"></i>Apply Job</a>

                    <a href="#" target="_blank" data-toggle="modal" data-target="#myJobseekerModal" aria-hidden="true" data-dismiss="modal"
                       class="btn btn-danger text-white d-block pt-2 pb-2"><i
                        class="fa fa-heart mr-2"></i>Save Job</a>

                    <a href="#" target="_blank" data-toggle="modal" data-target="#myJobseekerModal" aria-hidden="true" data-dismiss="modal"
                       class="btn btn-primary text-white d-block pt-2 pb-2"><i
                        class="fa fa-user-plus mr-2"></i>Follow</a>
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
                <p>{{ alldata.description }}</p>
              </div>
            </div>
            <div class="card mt-3">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Job Responsibility</h2>
                <p>{{ alldata.responsibility }}</p>
              </div>
            </div>
            <div class="card mt-3">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Skills</h2>
                <ul class="skills">
                  <li>{{ alldata.job_skills }}</li>
                </ul>
              </div>
            </div>

          </div>
          <div class="col-sm-4">
            <div class="card mt-3">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Job Overview</h2>
                <ul class="ove-detail-list p-0">
                  <li>
                    <i class="fa fa-wallet"></i>
                    <h5>Offered Salary</h5>
                    <span>{{ alldata.offered_sal_min }} - {{ alldata.offered_sal_max }}</span>
                  </li>

                  <li>
                    <i class="fa fa-user"></i>
                    <h5>Job Preference</h5>
                    <span>{{ alldata.job_preference }}</span>
                  </li>

                  <li>
                    <i class="fa fa-pen"></i>
                    <h5>Career Level</h5>
                    <span>{{ alldata.career_level }}</span>
                  </li>

                  <li>
                    <i class="fa fa-home"></i>
                    <h5>Industry</h5>
                    <span>{{ alldata.category_name }}</span>
                  </li>

                  <li>
                    <i class="fa fa-graduation-cap"></i>
                    <h5>Experience</h5>
                    <span>{{ alldata.main_exp }} - {{ alldata.max_exp }} </span>
                  </li>

                  <li>
                    <i class="fa fa-book"></i>
                    <h5>Qualification</h5>
                    <span>{{ alldata.qualification }}</span>
                  </li>

                </ul>
              </div>
            </div>

            <div class="card mt-3">

              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Share This Job</h2>

                <ul class="simple-list-sshare">
                  <li><a
                      :href="'https://www.facebook.com/sharer/sharer.php?u=https://naukriyan.com/view-job-bl/'+alldata.id"
                      target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                  <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
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
    <!-- The Modal -->
    <div class="modal fade popupForm" id="apply">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">


            <form method="post" accept-charset="utf-8" action="/homes/login-master">

              <div class="form-group row inputBox">
                <div class="col-sm-6">

                  <div class="input text"><input type="text" name="" class="form-control"
                                                 placeholder="Enter Job Title" required="required"/></div>

                </div>
                <div class="col-sm-6">

                  <div class="row">
                    <div class="col-sm-6">
                      <select class="form-control">
                        <option>Select Year</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control">
                        <option>Select Months</option>
                        <option>3</option>
                        <option>6</option>
                        <option>9</option>
                      </select>
                    </div>
                  </div>

                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-12">

                  <div class="input text"><input type="number" name="" class="form-control"
                                                 placeholder="Enter Location" required="required"/></div>

                </div>

              </div>
              <fieldset class="pl-2 pr-2 mb-3">
                <legend class="fs-15">
                  <b>Do you have any of the following or equivalent
                    qualification ?</b>
                </legend>
                <div class="form-group row mb-0">
                  <div class="col-sm-12">


                    <div class="row">
                      <div class="col-sm-3">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="Accomodation">
                            <input type="checkbox" class="custom-control-input"
                                   id="Accomodation" checked>
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span>Graduate
                          </label></div>
                      </div>
                      <div class="col-sm-3">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="Gratuity">
                            <input type="checkbox" class="custom-control-input"
                                   id="Gratuity">
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> Post Graduate
                          </label></div>
                      </div>
                      <div class="col-sm-3">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="Health_Insurance">
                            <input type="checkbox" class="custom-control-input"
                                   id="Health_Insurance">
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> 10th or 12th
                          </label></div>
                      </div>
                      <div class="col-sm-3">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="Incentive_Bonus">
                            <input type="checkbox" class="custom-control-input"
                                   id="Incentive_Bonus">
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> Diploma
                          </label></div>
                      </div>
                    </div>
                  </div>

                </div>
              </fieldset>
              <fieldset class="pl-2 pr-2 mb-3">
                <legend class="fs-15">
                  <b>Do you have work experience of development ?</b>
                </legend>
                <div class="form-group row mb-0">
                  <div class="col-sm-12">


                    <div class="form-group">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="r1" checked="">
                        <label for="radioPrimary1">
                          Yes
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="r1">
                        <label for="radioPrimary2">
                          No
                        </label>
                      </div>

                    </div>
                  </div>

                </div>
              </fieldset>
              <fieldset class="pl-2 pr-2 mb-3">
                <legend class="fs-15">
                  <b>Do you have following skills ?</b>
                </legend>
                <div class="form-group row mb-0">
                  <div class="col-sm-12">


                    <div class="row">
                      <div class="col-sm-2 pr-0">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="php">
                            <input type="checkbox" class="custom-control-input" id="php"
                                   checked>
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span>PHP
                          </label></div>
                      </div>
                      <div class="col-sm-2 pr-0">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="Vue">
                            <input type="checkbox" class="custom-control-input" id="Vue">
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> Vue JS
                          </label></div>
                      </div>
                      <div class="col-sm-2 pr-0">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="Laravel">
                            <input type="checkbox" class="custom-control-input"
                                   id="Laravel">
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> Laravel
                          </label></div>
                      </div>
                      <div class="col-sm-2 pr-0">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="HTML">
                            <input type="checkbox" class="custom-control-input" id="HTML">
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> HTML
                          </label></div>
                      </div>

                      <div class="col-sm-2 pr-0">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="CSS">
                            <input type="checkbox" class="custom-control-input" id="CSS">
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> CSS
                          </label></div>
                      </div>

                      <div class="col-sm-2 pr-0 pl-0">
                        <div class="my-checkbox">
                          <label class="checkbox-inline" for="Bootsrap">
                            <input type="checkbox" class="custom-control-input"
                                   id="Bootsrap">
                            <span class="checkbox-icon"><i class="fa fa-square"
                                                           aria-hidden="true"></i>
                                                            <span class="check-icon">
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            </span>
                                                        </span> Bootsrap
                          </label></div>
                      </div>
                    </div>
                  </div>

                </div>
              </fieldset>
            </form>


          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

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
      jobsID: [],
      alldata: [],
      followID: [],
    }
  },

  mounted() {
    //this.$store.dispatch('getAllData',`/viewjobs/${this.$route.params.viewjobsid}`)
    this.$store.dispatch('getAllProfile', '/userprofile')
  },

  computed: {
    allProfile() {
      return this.$store.getters.getAllProfile
    }
  },
  methods: {
    getAllJobs() {
      let u = window.location.href;
      let id = u.split('bl/')[1];
      axios.get('/get-joblistsingle/' + id).then(response => {
        this.loading = false;
        this.alldata = response.data.data;
      })
    },
    savedjob: function (id) {
      var uri = '/saved-job/' + id;
      swal("Job Saved Successfully!", "Check Saved section, isn't it?")
      axios.get(uri).then(response => {
        // this.$router.push('/viewjob')
        window.location.reload();
      });

    },
    checkUserSavedJobs() {
      const self = this;
      axios.get('/check-user-saved-job').then(response => {
        console.log(response);
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.jobsID.push(value.job_id);
          });
        } else {
          this.jobsID = 0;
        }
      })
    },
    jobAlreadySaved() {
      swal("Already Saved!", "You clicked the button!", "success")
    },
    follow(comp_id, job_id) {
      var uri = '/follow/' + comp_id + '/' + job_id;
      swal("Followed Successfully!", "")
      axios.get(uri).then(response => {
        // this.$router.push('/viewjob')
        window.location.reload();
      });

    },

    checkFollow() {
      const self = this;
      axios.get('/check-follow').then(response => {
        console.log(response);
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.followID.push(value.employer_id);
          });
        } else {
          this.followID.push = 0;
        }
      })
    },
    UnFollowed() {
      swal("Already Followed", "If You Unfollow this company then go to Companies following Section!", "success")
    },
    AlreadyFollowed() {
      swal("Already Followed", "If You unfollow this company then go to companies following section!", "warning")
    },

  },

  created: function () {
    this.checkUserSavedJobs();
    this.getAllJobs();
    this.checkFollow();
  }
}
</script>

<style scoped>

</style>
