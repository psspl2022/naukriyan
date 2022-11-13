<template>
  <div id="jobseeker-header">
    <!-- not in use -->
    <nav
      class="navbar navbar-dark navbar-expand-lg bg-dark navbar-custom"
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
        <router-link class="navbar-brand" :to="`/`"
          ><img :src="'assets/public/asset/img/naukriyana1.png'"
        /></router-link>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="nav navbar-nav ml-4 mr-auto">
            <router-link :to="`/dashboard`">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#">Dashboard</a>
              </li>
            </router-link>
            <li class="nav-item dropdown" role="presentation">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                >Candidate</a
              >

              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <li><a class="dropdown-item" href="#">Skill Development</a></li>

                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#"
                    >Career Services</a
                  >
                  <ul class="dropdown-menu">
                    <a class="dropdown-item" href="#"
                      >Audio Resumes/ Video Resumes</a
                    >
                    <a class="dropdown-item" href="#"
                      >Resume Development (Premium)</a
                    >
                    <a class="dropdown-item" href="#">Career Advice</a>
                    <a class="dropdown-item" href="#">Interview Preparation</a>
                    <a class="dropdown-item" href="#">Job Search Techniques</a>
                    <a class="dropdown-item" href="#">Job Questionaires</a>
                    <a class="dropdown-item" href="#"
                      >Tips For Fresher/MBA/Non-IT</a
                    >
                  </ul>
                </li>
              </ul>
            </li>
            <router-link :to="`/browsejob`">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#">Browse Jobs</a>
              </li>
            </router-link>
          </ul>

          <ul class="nav navbar-nav ml-4">
            <li class="dropdown dropdown-notification nav-item mt-2">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"
                ><i class="fas fa-bell faa-ring animated"></i
                ><span
                  class="badge badge-pill badge-default badge-danger badge-default badge-up"
                  >{{ userNotifications.length }}</span
                ></a
              >
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span
                    class="notification-tag badge badge-default badge-danger float-right m-0"
                    >{{ userNotifications.length }} New</span
                  >
                </li>
                <li
                  class="scrollable-container media-list w-100 ps-container ps-theme-dark ps-active-y"
                  data-ps-id="9ae5446f-1c20-119a-4be5-7fdad054eb0f"
                >
                  <a
                    href="javascript:void(0)"
                    v-for="notification in userNotifications"
                    :key="notification.id"
                  >
                    <div class="media">
                      <div class="media-left align-self-center">
                        <i
                          class="fas fa-plus-square icon-bg-circle bg-cyan"
                        ></i>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading">
                          {{ notification.status | jobProcessStatus }}
                        </h6>
                        <small>
                          <time
                            class="media-meta text-muted"
                            datetime="2015-06-11T18:29:20+08:00"
                            >{{ getHumanDate(notification.created_at) }}
                          </time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer">
                  <router-link :to="`/jobseeker-notification`">
                    <a
                      class="dropdown-item text-muted text-center"
                      href="javascript:void(0)"
                      >Read all notifications</a
                    ></router-link
                  >
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                data-toggle="dropdown"
                role="button"
                aria-expanded="true"
              >
                <img
                  class="mini-photo rounded-circle"
                  :src="'/jobseeker_profile_image/' + alldata.profile_pic_thumb"
                  width="36"
                  height="36"
                  v-if="alldata.profile_pic_thumb"
                />

                <img
                  class="mini-photo rounded-circle"
                  src="default_images/no_image_available.png"
                  width="36"
                  height="36"
                  v-else
                />
              </a>
              <ul class="dropdown-menu user-menu">
                <div class="profile-highlight">
                  <img
                    class="mini-photo rounded-circle"
                    :src="
                      '/jobseeker_profile_image/' + alldata.profile_pic_thumb
                    "
                    width="36"
                    height="36"
                    v-if="alldata.profile_pic_thumb"
                  />

                  <img
                    class="mini-photo rounded-circle"
                    src="default_images/no_image_available.png"
                    width="36"
                    height="36"
                    v-else
                  />
                  <div class="details">
                    <div id="profile-name">{{ allProfile.fname }}</div>
                    <div id="profile-footer">
                      {{ allProfile.email }}
                    </div>
                  </div>
                </div>
                <li class="user-menu__item">
                  <router-link class="user-menu-link" to="/userinfo/pe">
                    <div><i class="fas fa-user-edit"></i> Edit profile</div>
                  </router-link>
                </li>

                <li class="user-menu__item">
                  <router-link class="user-menu-link" to="/profileview">
                    <div><i class="fas fa-user-circle"></i> My profile</div>
                  </router-link>
                </li>

                <!-- <li class="user-menu__item">
                  <router-link class="user-menu-link" to="/inbox">
                    <div><i class="fas fa-inbox"></i> Inbox</div>
                  </router-link>
                </li> -->

                <li class="user-menu__item">
                  <router-link
                    class="user-menu-link"
                    to="/jobseeker-changepassword"
                  >
                    <div><i class="fas fa-key"></i> Change Password</div>
                  </router-link>
                </li>

                <li class="user-menu__item">
                  <a class="user-menu-link" href="#" @click.prevent="logout()">
                    <div><i class="fas fa-sign-out-alt"></i> Logout</div></a
                  >
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
var moment = require("moment");
export default {
  name: "jobseeker-header",
  data() {
    return {
      userNotifications: [],
      countNotification: [],
      moment: moment,
      allProfile: [],
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/jobseeker-profile");

    setInterval(() => {
      axios.get("user-notifications").then((response) => {
        this.userNotifications = response.data.data.notifications;
      });
    }, 5000);
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
  },
  
  beforeCreate () {
    // if(!sessionStorage.hasOwnProperty("jobseeker")){
    //   this.$router.push("/");
    // }
  },

  methods: {
    userprofile() {
      axios
        .get("/userprofile")
        .then((response) => {
          this.allProfile = response.data.data;
        })
        .catch((error) => {
          console.log("something went wrong");
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

                sessionStorage.clear();
                this.$router.push("/");
                window.location.reload();
              }
            });
          }
        });
    },
    getHumanDate: function (date) {
      return moment(date).fromNow();
    },
  },
  created() {
    this.userprofile();
  },

  filters: {
    jobProcessStatus(value) {
      if (value === 3) {
        return "You have been shortlisted for job";
      } else if (value === 4) {
        return "You have been rejected";
      } else if (value === 5) {
        return "You have been got an offer letter.";
      } else if (value === 6) {
        return "You have been hired.";
      } else {
        return "your resume have been saved for future jobs.";
      }
    },
  },
};
</script>

<style scoped>
</style>
