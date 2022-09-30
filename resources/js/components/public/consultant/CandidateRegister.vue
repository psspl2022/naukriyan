<template>
  <div id="consultantDashboard">
    <consultant-header></consultant-header>
    <section class="top-adjust pt-5 pb-5">
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Consultant Dashboard</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i>
                  <a href="tel:919711999999">Hot Line: +91 9711 99 99 99</a>
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
          <div class="col-sm-4">
            <div class="card mt-3 card-dashboard">
              <div class="card-body">
                <div class="app-sidebar__user clearfix active">
                  <div class="dropdown user-pro-body">
                    <div class="" v-if="user.profile_img">
                      <img alt="user-img" class="avatar avatar-xl brround mCS_img_loaded"
                           :src="'/storage/consultant_profile_image/'+ user.profile_img">
                      <span class="avatar-status profile-status bg-green"></span>
                    </div>
                    <div class="" v-else>
                      <img alt="user-img" class="avatar avatar-xl brround mCS_img_loaded"
                           :src="'assets/public/asset/img/profile-img.jpg'">
                      <span class="avatar-status profile-status bg-green"></span>
                    </div>
                    <div class="user-info">
                      <h4 class="font-weight-semibold mt-3 mb-0">{{user.first_name}} {{user.last_name}}</h4>
                      <span class="mb-0 text-muted">{{user.designation}}</span>
                    </div>
                  </div>
                </div>
                <hr />
                <div class="row progress-r">
                  <div class="col-md-6">
                    <div class="d-flex align-items-center pb-2">
                      <p class="mb-0">Screening Ratio</p>
                    </div>
                    <h4 class="font-weight-bold mb-2">{{ countData.screening_ratio_in_percentage }}</h4>
                    <div class="progress progress-style progress-sm">
                      <div
                          class="progress-bar bg-primary-gradient wd-80p"
                          role="progressbar"
                          aria-valuenow="78"
                          aria-valuemin="0"
                          aria-valuemax="78"
                      ></div>
                    </div>
                  </div>
                  <div class="col-md-6 mt-4 mt-md-0">
                    <div class="d-flex align-items-center pb-2">
                      <p class="mb-0">Shortlisting Ratio</p>
                    </div>
                    <h4 class="font-weight-bold mb-2">{{ countData.shortlisting_ratio_in_percentage }}</h4>
                    <div class="progress progress-style progress-sm">
                      <div
                          class="progress-bar bg-danger-gradient wd-75"
                          role="progressbar"
                          aria-valuenow="45"
                          aria-valuemin="0"
                          aria-valuemax="45"
                      ></div>
                    </div>
                  </div>
                </div>
                <hr />
                <h6 class="card-title">Here are your actions for the day</h6>

                <div class="list-group mt-3">
                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Uploaded CV</p><span class="badge badge-primary">{{countData.pending}}</span>
                    </div>
                  </a></router-link>
                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Screening Pending</p><span class="badge badge-primary">{{countData.screening_pending}}</span>
                    </div>
                  </a></router-link>
                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Post Interview Follow Up</p><span class="badge badge-primary">{{countData.interview}}</span>
                    </div>
                  </a></router-link>

                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Interview Done</p><span class="badge badge-secondary">{{countData.interview_scheduled}}</span>
                    </div>
                  </a></router-link>
                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Shortlisted</p><span class="badge badge-success">{{countData.shortlisted}}</span>
                    </div>
                  </a></router-link>

                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Joined</p><span class="badge badge-secondary">{{countData.joined}}</span>
                    </div>
                  </a></router-link>

                  <router-link :to="'/consultant-dashboard'"><a href="">
                    <div class="list-group-item">
                      <p>Rejected</p><span class="badge badge-danger">{{countData.cv_rejected}}</span>
                    </div>
                  </a></router-link>

                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="card mt-3">
              <div class="card-header">
                <strong>Candidate Register</strong>
              </div>
              <div class="card-body">
                <form method="post" @submit.prevent="storeRegisterFormData()">
                  <div class="row form-group">
                    <div class="col-md-12">
                      <label for="name">Candidate Name</label>
                      <input
                        type="text"
                        v-model="registerForm.name"
                        class="form-control"
                        placeholder="Enter Candidate Name"
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="email">Email</label>
                      <input
                        type="email"
                        v-model="registerForm.email"
                        class="form-control"
                        placeholder="Enter Email ID"
                      />
                    </div>
                    <div class="col-md-6">
                      <label for="mobile">Mobile</label>
                      <input
                        type="number"
                        v-model="registerForm.mobile"
                        class="form-control"
                        placeholder="XX-XXXXXXXXXX"
                      />
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="gender">Gender</label>
                      <select
                        v-model="registerForm.gender"
                        class="form-control"
                      >
                        <option value="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="mobile">Resume</label>
                      <input
                        type="file"
                        class="form-control"
                        @change="onFileChange($event)"
                      />
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="company">Company</label>
                      <select
                        v-model="registerForm.company_id"
                        class="form-control"
                        v-on:change="getPositionOnCompanyChange($event)"
                      >
                        <option value="">Select Company</option>
                        <option
                          :value="company.id"
                          v-for="company in companies"
                        >
                          {{ company.jobmanager.companies.company_name }}
                        </option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="position">Title (Job Position)</label>
                      <select
                        v-model="registerForm.jobmanager_id"
                        class="form-control"
                      >
                        <option value="">Select Job</option>
                        <option
                          :value="jobPosition.id"
                          v-for="jobPosition in jobPositions"
                          :key="jobPosition.id"
                        >
                          {{ jobPosition.title }} ({{ jobPosition.job_role }})
                        </option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary" :disabled="storeBtn">
                        {{ storeBtn ? "Submitting..." : "Submit" }}
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <consultant-footer></consultant-footer>
  </div>
</template>

<script>
export default {
  name: "ConsultantDashboard",

  data() {
    return {
      registerForm: {
        name: "",
        email: "",
        mobile: "",
        gender: "",
        jobmanager_id: "",
        company_id: "",
        resume_url: "",
      },
      jobPositions: [],
      companies: {},
      storeBtn: false,
      user: [],
      countData: []
    };
  },

  mounted() {
    // Get companies list
    axios.get("/get-job-position-company").then((response) => {
      console.log(response)
      this.companies = response.data;
    });

    this.getCountData();
    this.getSessionUser();
  },

  methods: {
    getSessionUser() {
      axios.get("/get-consultant-profile").then((response) => {
        if (response.data) {
          this.user = response.data.data;
        }
      });
    },

    getCountData() {
      axios.get("/count-data").then((response) => {
        if (response.data) {
          this.countData = response.data.data;
        }
      });
    },

    storeRegisterFormData() {
      this.storeBtn = true;
      axios
        .post("/store-candidate-register", { data: this.registerForm })
        .then((response) => {
          if (response.data.success === true) {
            toast({
              type: "success",
              title: "Candidate Registration Successfully.",
            });
            this.storeBtn = false;
          } else {
            toast({
              type: "warning",
              title: "Candidate Registration Failed.",
            });
            this.storeBtn = false;
          }
        })
        .catch((error) => {
          toast({
            type: "warning",
            title: "Something went wrong.",
          });
          this.storeBtn = false;
        });
    },

    getPositionOnCompanyChange(event) {
      let company_id = event.target.value;
      // Get job position list
      axios
        .get("/get-job-position-list/" + company_id)
        .then((response) => {
          console.log(response);
          console.log(response.data);
          this.jobPositions = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    onFileChange(event) {
      let file = event.target.files[0];
      if (file.size > 3000000) {
        swal({
          type: "error",
          title: "Oops...",
          text: "File size too large!",
        });
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.registerForm.resume_url = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
  },
};
</script>

<style scoped>
</style>
