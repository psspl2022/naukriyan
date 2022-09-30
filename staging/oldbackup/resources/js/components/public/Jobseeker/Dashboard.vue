<template>
  <div id="dashboard">
    <jobseeker-header></jobseeker-header>
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
                  <li class="active">Jobseeker Dashboard</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i>
                  <a data-v-47b1e035="" href="tel:+91 11 7962 6411"
                    >Hot Line: +91 11 7962 6411
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="text-center section">
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <h1 class="masthead-heading text-uppercase dash text-center">
              Dashboard
            </h1>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="box bg-primary" id="t-apply">
                      <h3>{{ countAll.applied_jobs }}</h3>
                      <router-link :to="`/appliedjob`">
                        <p class="lead">Applied Jobs</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box danger" id="t-resume">
                      <h3>0</h3>
                      <p class="lead">Resume Format</p>
                      <!-- <router-link :to="`/resume-format-list`">
                        <p class="lead">Resume Format</p>
                      </router-link> -->
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box warning" id="t-recommended">
                      <h3>{{ countAll.recommended_jobs }}</h3>
                      <router-link :to="`/recommended-jobs`">
                        <p class="lead">Recommended Jobs</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box golden" id="t-following">
                      <h3>{{ countAll.following }}</h3>
                      <router-link :to="`/company-followings`">
                        <p class="lead">Companies Following</p>
                      </router-link>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="box cyan" id="t-saved">
                      <h3>{{ countAll.saved_jobs }}</h3>
                      <router-link :to="`/savedjob`">
                        <p class="lead">Saved Jobs</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box midblue" id="t-message">
                      <h3>{{ countAll.recruiterMessages }}</h3>
                      <router-link :to="`/inbox`">
                        <p class="lead">Recruiter Message</p>
                      </router-link>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box golden mb-0" id="t-helpdesk">
                      <h3>0</h3>
                      <router-link :to="`/support-list`">
                        <p class="lead">Helpdesk</p>
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card">
              <div class="card-header">
                <img
                  class="mini-photo rounded-circle avatar"
                  :src="'/jobseeker_profile_image/' + alldata.profile_pic_thumb"
                  v-if="alldata.profile_pic_thumb"
                />

                <img
                  class="mini-photo rounded-circle avatar"
                  src="default_images/no_image_available.png"
                  v-else
                />
                <h3 class="mt-2">{{alldata.fname }} {{alldata.lname}}</h3>
              </div>
              <ul class="list-group">
                <li class="list-group-item">
                  <profile-percentage></profile-percentage>
                  </li>
                <li class="list-group-item">
                  <router-link :to="`/userinfo/pe`"
                    ><i class="fas fa-user-circle"></i> Personal / Resume</router-link
                  >
                </li>
                <li class="list-group-item">
                  <router-link :to="`/userinfo/ed`"
                    ><i class="fas fa-book-open"></i> Educations/Skills/Certificates</router-link
                  >
                </li>
                <li class="list-group-item" v-if="alldata.candidate_type=='experienced'">
                  <router-link :to="`/userinfo/pr`"
                    ><i class="fas fa-user-tie"></i> Professional / Others</router-link
                  >
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <main-footer></main-footer>
  </div>
</template>

<script>
import ProfileCompletePercentage from './ProfileCompletePercentage.vue';
export default {
  components: { ProfileCompletePercentage },
  name: "Dashboard",
  data() {
    return {
      countAll: [],
      percentage:''
    };
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
  },
  mounted() {
    this.$store.dispatch("getAllData", "/jobseeker-profile");
    axios.get("get-all-activity-count/count/jobseeker").then((response) => {
      this.countAll = response.data.data;
    });
    this.getProfilePercentage();
  },
  methods:{
      getProfilePercentage(){
          axios.get("/profile/percentage").then((response) => {
        this.percentage = response.data.percentage;
      });
      }
  }
};
</script>

<style scoped>
.box {
  color: #fff;
  padding: 1rem;
  height: 135px;
  transition: 0.3s ease all;
}
.box:hover {
  box-shadow: 2px 2px 20px #c8c8c8;
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
</style>
