<template>
  <div id="subuserheader">
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
        <router-link class="navbar-brand" :to="`/subuser-dashboard`"
          ><img :src="'assets/public/asset/img/naukriyana1.png'"
        /></router-link>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="nav navbar-nav ml-4 mr-auto">
            <router-link :to="`/subuser-dashboard`">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#">Dashboard</a>
              </li>
            </router-link>

            <router-link :to="`/tracker-list`">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#">Tracker</a>
              </li>
            </router-link>
          </ul>

          <ul class="nav navbar-nav ml-4">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                data-toggle="dropdown"
                role="button"
                aria-expanded="true"
              >
                <img
                  :src="'subuser_profile_image/' + user.profile_image"
                  alt=""
                  width="33"
                  height="36"
                  v-if="user.profile_image"
                />
                <img
                  class="mini-photo rounded-circle"
                  src="subuser_profile_image/default_image.png"
                  width="36"
                  height="36"
                  v-else
                />
              </a>
              <ul class="dropdown-menu user-menu">
                <div class="profile-highlight">
                  <img
                    :src="'subuser_profile_image/' + user.profile_image"
                    alt=""
                    width="36"
                    height="36"
                    v-if="user.profile_image"
                  />
                  <img
                    class="mini-photo rounded-circle"
                    src="subuser_profile_image/default_image.png"
                    width="36"
                    height="36"
                    v-else
                  />
                  <div class="details">
                    <div id="profile-name">
                      {{ user.fname }}
                    </div>
                    <div id="profile-footer">
                      {{ user.email }}
                    </div>
                  </div>
                </div>
                <li class="user-menu__item">
                  <router-link class="user-menu-link" to="/update-subuser">
                    <div><i class="fas fa-user-edit"></i>Profile/Password</div>
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
export default {
  name: "SubUserheader",
  data() {
    return {
      isActive: false,
      empNotifications: [],
      user: [],
    };
  },

  mounted() {},
  computed: {},
  created() {
    this.getSessionUser();
  },
  methods: {
    dropdownToggle() {
      this.isActive = !this.isActive;
    },
    getSessionUser() {
      axios.get("/get-subuser-profile").then((response) => {
        if (response.data) {
          this.user = response.data.data;
        }
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

                this.$router.push("/subuser-login");
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

  // filters: {
  //   countUnreadNotification: function (notifications) {
  //     if (!notifications) return "";

  //     var unreadNotificationLength = notifications.filter(
  //       (item) => item.read_notification == 0
  //     );
  //     return unreadNotificationLength.length;
  //   },
  // },
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
