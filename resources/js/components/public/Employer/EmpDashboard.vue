<template>
  <div id="EmpDashboard">
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
                  <li class="active">Employer Dashboard</li>
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
    <section class="statis text-center section top-adjust mt-2 mb-2">
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <h1 class="masthead-heading text-uppercase dash">Dashboard</h1>
            <div class="card mt-4">
              <div class="card-body">
                <div class="row mt-4">
                  <div class="col-md-3">
                    <div class="box bg-primary">
                      <i class="fa fa-file"></i>
                      <h3>{{ countAll.active_jobs }}</h3>
                      <router-link :to="`/managejobs`">
                        <p class="lead">Active Jobs</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box danger">
                      <i class="fa fa-user"></i>
                      <h3>{{ countAll.job_posted_by_me }}</h3>
                      <router-link :to="`/postjob`">
                        <p class="lead">Job Posted By Me</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box warning">
                      <i class="fa fa-list"></i>
                      <h3>0</h3>
                      <router-link :to="`/resumeview`">
                        <p class="lead">View Resume</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box success">
                      <i class="fa fa-check-square"></i>
                      <h3>{{ countAll.scheduled_interview }}</h3>
                      <router-link :to="`/scheduled-interview`">
                        <p class="lead">Scheduled Interviews</p>
                      </router-link>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="box purple">
                      <i class="fa fa-calendar"></i>
                      <h3>{{ countAll.reports }}</h3>
                      <router-link :to="`/reports`">
                        <p class="lead">Reports</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box golden">
                      <i class="fa fa-flag"></i>
                      <h3>{{ countAll.package_subscription }}</h3>
                      <router-link :to="`/pricing`">
                        <p class="lead">Subscription</p>
                      </router-link>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="box midblue">
                      <i class="fa fa-envelope-open"></i>
                      <h3>{{ countAll.followers }}</h3>
                      <router-link :to="`/followdetails`">
                        <p class="lead">Followers</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box golden mb-0">
                      <i class="fa fa-flag"></i>
                      <h3>{{ countAll.helpdesk }}</h3>
                      <router-link :to="`/supportlist`">
                        <p class="lead">Helpdesk</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box success">
                      <i class="fa fa-check-square"></i>
                      <h3>{{ countAll.totalTrackercandidate }}</h3>
                      <router-link :to="`/emp/tracker-list`">
                        <p class="lead">Tracker Candidate</p>
                        <span>(Added by SubUser)</span>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box midblue">
                      <i class="fa fa-user"></i>
                      <h3>{{ countAll.totalSubuser }}</h3>
                      <router-link :to="`/subuserlist`">
                        <p class="lead">Sub User</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box golden">
                      <i class="fa fa-user"></i>
                      <h3>{{ countAll.totalClient }}</h3>
                      <router-link :to="`/emp/client-list`">
                        <p class="lead">Client</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3" v-if="countAll.consolidateData">
                    <div class="box danger">
                      <i class="fa fa-user"></i>
                      <h3>{{ countAll.consolidateData }}</h3>
                      <router-link :to="`/emp/consolidatedata-list`">
                        <p class="lead">Consolidate Data</p>
                      </router-link>
                    </div>
                  </div>
                </div>

                <div class="row"></div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card">
              <div class="card-header">
                <img
                  class="mini-photo rounded-circle"
                  :src="'/emp_profile_image/' + allProfile.profile_pic_thumb"
                  width="50"
                  height="50"
                  v-if="allProfile.profile_pic_thumb"
                />

                <img
                  class="mini-photo rounded-circle"
                  src="default_images/no_image_available.png"
                  width="50"
                  height="50"
                  v-else
                />
                <h3 class="mt-2">
                  {{ allProfile.fname }} {{ allProfile.lname }}
                </h3>
              </div>

              <ul class="list-group">
                <router-link :to="`/editemployer`">
                  <a href="#">
                    <li class="list-group-item">
                      <i class="fas fa-user-circle"></i>&nbsp;Edit Profile
                    </li>
                  </a>
                </router-link>

                <ul class="children-list">
                  <router-link :to="`/editemployer`">
                    <a href="">
                      <li class="list-group-item">
                        <i class="fas fa-chevron-right"></i>&nbsp;Add personal
                        details
                      </li></a
                    ></router-link
                  >
                  <router-link :to="`/editemployer`">
                    <a href="">
                      <li class="list-group-item">
                        <i class="fas fa-chevron-right"></i>&nbsp;Add company
                        details
                      </li></a
                    ></router-link
                  >
                </ul>

                <router-link :to="`/viewemployeeprofile`">
                  <a href="">
                    <li class="list-group-item">
                      <i class="fas fa-user-circle"></i>&nbsp;My Profile
                    </li></a
                  ></router-link
                >
                <router-link :to="`/vieworganization`">
                  <a href="">
                    <li class="list-group-item">
                      <i class="fas fa-sitemap"></i>&nbsp;Organization
                    </li></a
                  ></router-link
                >
                <router-link :to="`/emp-inbox`">
                  <a href="">
                    <li class="list-group-item">
                      <i class="fas fa-inbox"></i>&nbsp;Inbox
                    </li></a
                  ></router-link
                >
                <router-link :to="`/employer-changepassword`">
                  <a href="">
                    <li class="list-group-item">
                      <i class="fas fa-key"></i>&nbsp;Change Password
                    </li></a
                  ></router-link
                >

                <li class="list-group-item">
                  <a class="user-menu-link" href="#" @click.prevent="logout()">
                    <div><i class="fas fa-sign-out-alt"></i> Logout</div></a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-9">
            <h1 class="masthead-heading text-uppercase dash">SUBUSER DATA</h1>
            <div class="card mt-4">
              <div class="card-body">
                <div class="row mt-4">
                  <div
                    class="col-md-3"
                    v-for="(trackers, index) in trackersCount"
                    :key="index"
                  >
                    <div class="box midblue">
                      <i class="fa fa-user"></i>
                      <h3>{{ trackers.total }}</h3>
                      <router-link
                        :to="{
                          path: '/emp/tracker-list',
                          query: {
                            user: trackers.id,
                          },
                        }"
                      >
                        <p class="lead">
                          {{ trackers.fname }} {{ trackers.lname }}
                        </p>
                      </router-link>
                    </div>
                  </div>
                </div>

                <div class="row"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "EmpDashboard",
  data() {
    return {
      countAll: [],
      trackersCount: [],
    };
  },

  mounted() {
    this.$store.dispatch("getAllData", "/employer-profile");
    // this.$store.dispatch("getAllProfile", "/userprofile");
    axios.get("get-all-activity-count/count").then((response) => {
      this.countAll = response.data.data;
    });
    this.getCountTracker();
    this.checkProfileComplete();
  },

  computed: {
    allProfile() {
      return this.$store.getters.getAllData;
    },
  },
  methods: {
    checkProfileComplete() {
      axios.get("/check/empProfile/complete").then((response) => {
        if (
          response.data.data.com_email == null ||
          response.data.data.com_contact == null ||
          response.data.data.establish_date == null ||
          response.data.data.website == null ||
          response.data.data.cin_no == null ||
          response.data.data.owner_name == null ||
          response.data.data.address == null
        ) {
          swal.fire({
            icon: "error",
            title: "Profile Pending....",
            text: "Company and Personal Profile is Pending.Please Fill All Mandatory Fields",
          });
          this.$router.push("/editemployer");
        }
      });
    },
    getCountTracker() {
      axios.get("/get-subuser-activity").then((response) => {
        this.trackersCount = response.data.data;
      });
    },
    logout() {
      var uri = "/jobseeker-logout";
      swal
        .fire({
          title: "Are you sure want to logout!!",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes!",
        })
        .then((result) => {
          if (result.value) {
            axios.get(uri).then((response) => {
              console.log(response);
              if (response.status === 200) {
                toast({
                  type: "success",
                  title: "Logout success",
                });

                this.$router.push("/");
                window.location.reload();
              }
            });
          }
        })
        .catch((error) => {
          toast({
            type: "warning",
            title: "Something went wrong",
          });
        });
    },
  },
};
</script>

<style scoped>
.box {
  color: #fff;
  padding: 1rem;
  height: 135px;
}
.avatar {
  margin: auto;
  height: 100px;
  width: 100px;
}
.list-group a {
  color: #000;
}
.list-group-item {
  text-align: left;
}
.children-list li {
  color: #f95602;
  border: 0;
  border-bottom: 1px solid #ddd;
  padding-left: 35px;
  font-size: 14px;
}
.children-list {
  padding: 0;
}
.card-header h3 {
  color: #000;
}
</style>