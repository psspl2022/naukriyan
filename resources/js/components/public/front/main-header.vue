<template>
  <div id="main-header">
    <div id="wrapper">
      <nav
        class="
          navbar navbar-dark navbar-expand-lg
          fixed-top
          bg-dark
          navbar-custom
        "
        id="navbar-custom"
      >
        <div class="container">
          <button
            data-toggle="collapse"
            class="navbar-toggler"
            data-target="#navbarResponsive"
          >
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
          </button>
          <router-link :to="`/`" class="navbar-brand">
            <img :src="'assets/public/asset/img/naukriyana1.png'" />
          </router-link>
          <div
            class="collapse navbar-collapse justify-content-center"
            id="navbarResponsive"
          >
            <ul class="nav navbar-nav ml-3 mr-3">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item dropdown" role="presentation">
                <a
                  class="nav-link dropdown-toggle"
                  data-toggle="dropdown"
                  href="#"
                  >Jobs</a
                >

                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <!-- <li><a class="dropdown-item" href="#">Skill Development</a></li> -->
                  <router-link
                    v-for="(metro, index) in topcities"
                    :key="index"
                    :to="{
                      path: '/browsejob',
                      query: {
                        location: 'Jobs-in-'+metro.location,
                      },
                    }"
                    ><li class="dropdown-submenu">
                      <a class="dropdown-item" href="#"
                        >Jobs in {{ metro.location }}</a
                      >
                    </li>
                  </router-link>
                </ul>
              </li>

              <li class="nav-item" role="presentation">
                <a
                  class="nav-link"
                  href="http://blog.naukriyan.com/"
                  target="_blank"
                  >Blog</a
                >
              </li>

              <li class="nav-item dropdown" role="presentation">
                <a
                  class="nav-link dropdown-toggle"
                  data-toggle="dropdown"
                  href="#"
                  >Career Services</a
                >

                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                  <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#"
                      >Video Resume</a
                    >
                    <ul class="dropdown-menu">
                      <router-link :to="`/video-resume/howtomakeresume`">
                        <a class="dropdown-item" href="#"
                          >How to make Video Resume</a
                        ></router-link
                      >
                      <router-link :to="`/video-resume/contentofvideoresume`">
                        <a class="dropdown-item" href="#"
                          >Content of Video Resume</a
                        ></router-link
                      >
                      <router-link :to="`/video-resume/samplevideoresume`">
                        <a class="dropdown-item" href="#"
                          >Sample Video Resume</a
                        >
                      </router-link>
                    </ul>
                  </li>
                  <li class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#"
                      >How to make Effective Resume</a
                    >
                    <ul class="dropdown-menu">
                      <a
                        class="dropdown-item"
                        href="http://blog.naukriyan.com/category/articles/"
                        target="_blank"
                        >Articles</a
                      >
                    </ul>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Interview Preparation</a>
                  </li>
                </ul>
              </li>

              <li class="nav-item dropdown" role="presentation">
                <a
                  class="nav-link dropdown-toggle"
                  data-toggle="dropdown"
                  href="#"
                  >Workshop</a
                >

                <ul
                  class="dropdown-menu"
                  aria-labelledby="navbarDropdownMenuLink"
                >
                <router-link :to="`/resume-building-workshop`">
                        <a class="dropdown-item" href="#"
                          >Resume Building Workshop</a
                        ></router-link>
                </ul>
              </li>
            </ul>

            <!-- For Employer -->
            <ul
              class="nav navbar-nav ml-auto"
              v-if="allProfile != null && allProfile.user_type === 'Employer'"
            >
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link menu-btn"
                  href="#"
                  @click.prevent="logout()"
                  style="color: white !important"
                  ><i
                    class="fas fa-power-off-in-alt mr-2"
                    aria-hidden="true"
                  ></i
                  >Log out</a
                >
              </li>
              <router-link :to="`/empdashboard`">
                <li class="nav-item" role="presentation">
                  <a class="nav-link" href="#">Go to Dashboard</a>
                </li>
              </router-link>
            </ul>

            <!-- For jobseeker -->
            <ul
              class="nav navbar-nav ml-auto"
              v-else-if="
                allProfile != null && allProfile.user_type === 'Jobseeker'
              "
            >
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link menu-btn"
                  href="#"
                  @click.prevent="logout()"
                  style="color: white !important"
                  ><i
                    class="fas fa-power-off-in-alt mr-2"
                    aria-hidden="true"
                  ></i
                  >Log out</a
                >
              </li>
              <router-link :to="`/dashboard`">
                <li class="nav-item" role="presentation">
                  <a class="nav-link" href="/dashboard"> Go to Dashboard</a>
                </li>
              </router-link>
            </ul>

            <ul class="nav navbar-nav" v-else>
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link menu-btn"
                  href="#"
                  data-toggle="modal"
                  data-target="#myModal"
                  style="color: white !important"
                  ><i class="fas fa-sign-in-alt mr-2" aria-hidden="true"></i>Log
                  In</a
                >
              </li>
              <li class="nav-item" role="presentation">
                <a
                  class="nav-link menu-btn"
                  href="#"
                  data-toggle="modal"
                  data-target="#myModal1"
                  style="color: white !important"
                  ><i class="fa fa-user-plus mr-2" aria-hidden="true"></i>Sign
                  Up</a
                >
              </li>
              <router-link :to="`/consultant-signup`">
                <li class="nav-item" role="presentation">
                  <a
                    class="nav-link menu-btn"
                    href="#"
                    style="color: white !important"
                    ><i class="fa fa-users mr-2" aria-hidden="true"></i
                    >Consultant</a
                  >
                </li></router-link
              >
            </ul>
          </div>
        </div>
      </nav>

      <!-- Full Height Modal Right -->
      <div
        class="modal fade right"
        id="fullHeightModalRight"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
      >
        <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-full-height modal-right" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title w-100" id="myModalLabel">
                Upload your resume
              </h4>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01"
                    >Upload</span
                  >
                </div>
                <div class="custom-file">
                  <input
                    type="file"
                    class="custom-file-input"
                    id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01"
                  />
                  <label class="custom-file-label" for="inputGroupFile01"
                    >Choose file</label
                  >
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-primary">
                Save changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "main-header",
  data() {
    return {
      user: "",
      location: "",
      topcities: "",
    };
  },
  mounted() {
    this.getGuestUser();
    this.$store.dispatch("getAllProfile", "/userprofile");
    this.getTopMetroCities();
  },
  computed: {
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
    getTopMetroCities() {
      axios.get("/master/location").then((response) => {
        this.topcities = response.data.data;
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
        });
    },
  },
};
</script>

<style>
#navbar-custom .navbar-nav .nav-item .nav-link{
  font-weight: bold;
}
.buttonDiv {
  padding: 10px 15px 10px 15px;
  border-radius: 5px 0 5px 5px;
  color: white !important;
}
.buttonDiv:hover {
  background: white;
  transition: margin 500ms;
  margin-left: 3px;
}
.fixed {
  position: fixed;
  top: 20px;
  right: 0;
  width: 155px;
  height: 200px;
  z-index: 999999;
}
.bg-b-orange {
  background: #f95602;
}
.bg-b-orange:hover {
  background: #f95602;
}
.resume-gif {
  position: absolute;
  z-index: 999;
  right: 1rem;
  top: 15%;
}
.alert {
  animation: fadeInTopRight;
  animation-duration: 2s;

  position: relative;
}
@media screen and (max-width: 320px) {
  .alert {
    width: 100% !important;
  }
}
</style>