<template>
  <div id="consultant-header">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark navbar-custom" id="navbar-custom">
      <div class="container">
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navbarResponsive"><span
            class="navbar-toggler-icon"></span></button>
        <router-link :to="`/`"><img :src="'assets/public/asset/img/naukriyana1.png'" alt=""></router-link>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="nav navbar-nav ml-4 mr-auto">

            <router-link :to="`/consultant-dashboard`">
              <li class="nav-item" role="presentation"><a class="nav-link" href="#">Dashboard</a></li>
            </router-link>
            <li class="nav-item dropdown" role="presentation">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Positions</a>

              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <router-link :to="`/jobs/position`">
                  <li><a class="dropdown-item" href="#">New Position</a></li>
                </router-link>
                <router-link :to="`/jobs/manage-position`">
                  <li><a class="dropdown-item" href="#">Manage Position</a></li>
                </router-link>
              </ul>

            </li>
            <router-link :to="`/candidates`">
              <li class="nav-item" role="presentation"><a class="nav-link" href="#">Candidate</a></li>
            </router-link>

            <router-link :to="`/consultant-reports`">
              <li class="nav-item" role="presentation"><a class="nav-link" href="#">Reports</a></li>
            </router-link>

            <router-link :to="`/package-consultant`">
              <li class="nav-item" role="presentation"><a class="nav-link" href="#">Packages</a></li>
            </router-link>

            <!--  <router-link :to="`/package`"> <li class="nav-item" role="presentation"><a class="nav-link" href="#">Package</a></li></router-link> -->

          </ul>

          <ul class="nav navbar-nav float-right">

            <li class="dropdown dropdown-notification nav-item mt-2"><a class="nav-link nav-link-label"
                                                                        href="#" data-toggle="dropdown"><i class="fas fa-bell faa-ring animated"></i><span
                class="badge badge-pill badge-default badge-danger badge-default badge-up">{{ count}}</span></a>
              <ul class="dropdown-menu dropdown-menu-custom dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span>
                  </h6><span
                    class="notification-tag badge badge-default badge-danger float-right m-0">{{ count }}
                                        New</span>
                </li>
                <li class="scrollable-container media-list w-100 ps-container ps-theme-dark ps-active-y" data-ps-id="9ae5446f-1c20-119a-4be5-7fdad054eb0f">
                  <a href="javascript:void(0)" v-for="notification in userNotifications" :key="notification.id">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="fas fa-plus-square icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">{{ notification.message }}</h6>
                        <small><time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{ getHumanDate(notification.created_at) }}</time></small>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="dropdown dropdown-user nav-item"><a
                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"
                aria-expanded="false">
                <span class="avatar avatar-online" v-if="consultantProfile.profile_img">
                    <img :src="'/storage/consultant_profile_image/'+ consultantProfile.profile_img" alt="profile_img"
                         class="rounded-circle">
                </span>
              <span class="avatar avatar-online" v-else>
                  <img src="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/portrait/small/avatar-s-1.png" alt="profile_img" class="rounded-circle">
              </span>
              <span class="user-name">{{ consultantProfile.first_name }}</span></a>
              <div class="dropdown-menu dropdown-menu-custom dropdown-menu-right">
                <router-link :to="`/edit-profile-consultant`"><a class="dropdown-item" href="#"><i
                    class="fas fa-user"></i> Edit Profile</a></router-link>
                <router-link :to="`/change-cred-con`"><a class="dropdown-item" href="#"><i
                    class="fas fa-key"></i> Change Password</a></router-link>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"
                   @click.prevent="logout()"><i class="fas fa-power-off"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
var moment = require('moment');
export default {
  name: "consultant-header",

  data() {
    return {
      userNotifications: [],
      count: '',
      moment: moment,
      consultantProfile: '',
      profile_img:''
    }
  },
  mounted() {
    setInterval(() => {
      axios.get('get-notification').then(response => {
        this.userNotifications = response.data.data;
        this.count = response.data.count;
      });
    }, 5000)

    axios.get('consultant-profile').then(response => {
      this.consultantProfile = response.data;
    })

  },
  methods: {
    logout() {
      var uri = '/consultant-logout';
      swal.fire({
        title: 'Are you sure want to logout!!',
        text: "You would be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.value) {
          axios.get(uri).then(response => {
            if (response.status === 200) {
              swal({
                title: "Account Logout!",
                text: "Logout Successfully.",
                type: "success",
                allowOutsideClick: false
              }).then((ok) => {
                const self = this;
                self.$router.push('/consultant-login')
                window.location.reload();
              });
            }
          });
        }
      });
    },
    getHumanDate: function (date) {
      return moment(date).fromNow();
    }
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
    }
  }

}
</script>

<style scoped>

</style>