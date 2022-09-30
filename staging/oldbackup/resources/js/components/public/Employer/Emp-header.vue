<template>
  <div id="Emp-header">
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
            <router-link :to="`/empdashboard`">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#">Dashboard</a>
              </li>
            </router-link>

            <li class="nav-item dropdown" role="presentation">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                >Employer</a
              >

              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <router-link :to="`/postnewjob`">
                  <li><a class="dropdown-item">Post New Job</a></li>
                </router-link>
                <router-link :to="`/managejobs`">
                  <li><a class="dropdown-item" href="#">Manage Job</a></li>
                </router-link>
                <router-link :to="`/questionnaires`">
                  <li><a class="dropdown-item" href="#">Questionnaries</a></li>
                </router-link>
                <router-link :to="`/subuserlist`">
                  <li><a class="dropdown-item" href="#">Sub User</a></li>
                </router-link>
                <router-link :to="`/venues`">
                  <li><a class="dropdown-item" href="#">Venues</a></li>
                </router-link>
                <router-link :to="`/taggedview`">
                  <li>
                    <a class="dropdown-item" href="#">Tagged Candidates</a>
                  </li>
                </router-link>
              </ul>
            </li>
            <router-link :to="`/pricing`">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#">Packages</a>
              </li>
            </router-link>
            <router-link :to="`/SearchResume`">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#">Search Database</a>
              </li>
            </router-link>
            <li class="nav-item dropdown" role="presentation">
              <a
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                href="#"
                >Consultant</a
              >

              <ul
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <router-link :to="`/postnewjob`"
                  ><a class="dropdown-item" href="#"
                    >Post New JD(s)</a
                  ></router-link
                >
                <router-link :to="`/manage-jobs-consultant`"
                  ><a class="dropdown-item" href="#"
                    >Manage JD(s)</a
                  ></router-link
                >
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav ml-4 mr-auto">
            <li class="dropdown dropdown-notification nav-item mt-2">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"
                ><i class="fas fa-bell faa-ring animated"></i
                ><span
                  class="badge badge-pill badge-default badge-danger badge-default badge-up"
                  >{{ empNotifications | countUnreadNotification }}</span
                ></a
              >
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                  </h6>
                  <span
                    class="notification-tag badge badge-default badge-danger float-right m-0"
                  >
                    New</span
                  >
                </li>
                <li
                  class="scrollable-container media-list w-100 ps-container ps-theme-dark ps-active-y"
                  v-for="empNotification in empNotifications"
                  :key="empNotification.id"
                >
                  <a href="#">
                    <div class="media">
                      <div class="media-left align-self-center">
                        <i
                          class="fas fa-plus-square icon-bg-circle bg-cyan"
                        ></i>
                      </div>
                      <div
                        class="media-body"
                        :class="
                          empNotification.read_notification === 0
                            ? 'unread'
                            : 'read'
                        "
                      >
                        <h6 class="media-heading">
                          {{ empNotification.jobseeker_fname }}
                          {{ empNotification.jobseeker_lname }} applied for
                          {{ empNotification.title }}
                        </h6>
                        <small>
                          {{ empNotification.created_at | timeformat }}
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="dropdown-menu-footer">
                  <router-link :to="`/emp-notification`">
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
                  v-if="alldata.profile_pic_thumb"
                  class="mini-photo rounded-circle"
                  :src="'/emp_profile_image/' + alldata.profile_pic_thumb"
                  width="36"
                  height="36"
                />

                <img
                  v-else
                  class="mini-photo rounded-circle"
                  src="default_images/no_image_available.png"
                  width="36"
                  height="36"
                />
              </a>
              <ul class="dropdown-menu user-menu">
                <div class="profile-highlight">
                  <img
                    class="mini-photo rounded-circle"
                    :src="'/emp_profile_image/' + alldata.profile_pic_thumb"
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
                    <div id="profile-name">
                      {{ allProfile.fname }}
                    </div>
                    <div id="profile-footer">
                      {{ allProfile.email }}
                    </div>
                  </div>
                </div>
                <li class="user-menu__item">
                  <router-link class="user-menu-link" to="/editemployer">
                    <div><i class="fas fa-user-edit"></i> Edit profile</div>
                  </router-link>
                </li>

                <li class="user-menu__item">
                  <router-link class="user-menu-link" to="/viewemployeeprofile">
                    <div><i class="fas fa-user-circle"></i> My profile</div>
                  </router-link>
                </li>

                <li class="user-menu__item">
                  <router-link class="user-menu-link" to="/vieworganization">
                    <div><i class="fas fa-sitemap"></i> Organisation</div>
                  </router-link>
                </li>

                <li class="user-menu__item">
                  <router-link class="user-menu-link" to="/emp-inbox">
                    <div><i class="fas fa-inbox"></i> Inbox</div>
                  </router-link>
                </li>

                <li class="user-menu__item">
                  <router-link
                    class="user-menu-link"
                    to="/employer-changepassword"
                  >
                    <div><i class="fas fa-key"></i> Change password</div>
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
      <!-- Profile complete -->

      <!-- Profile Complete Close -->
    </nav>
  </div>
</template>

<script>
import notificationVue from "./notification.vue";
export default {
  name: "Emp-header",
  data() {
    return {
      isActive: false,
      empNotifications: [],
    };
  },

  mounted() {
    this.$store.dispatch("getAllData", "/employer-profile");
    this.$store.dispatch("getAllProfile", "/userprofile");
    axios.get("/employer-notification").then((response) => {
      this.empNotifications = response.data;
    });
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
    dropdownToggle() {
      this.isActive = !this.isActive;
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

  filters: {
    countUnreadNotification: function (notifications) {
      if (!notifications) return "";

      var unreadNotificationLength = notifications.filter(
        (item) => item.read_notification == 0
      );
      return unreadNotificationLength.length;
    },
  },
};
</script>

<style scoped>
.profile-user::after {
  margin-top: 17px;
}
.read {
  color: #fe8d52 !important;
}
</style>
