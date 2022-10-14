<template>
  <div id="subuserDashboard">
    <subuser-header></subuser-header>
    <section class="">
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Sub-User Dashboard</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i
                  ><a href="tel:+91 11 7962 6411"
                    >Hot Line: +91 11 7962 6411
                  </a>
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
            <!-- <div class="cms-pg-header">
                <h2 class="hk-pg-title">Account Executive</h2>
            </div> -->
            <div class="card mt-3 card-dashboard">
              <div class="card-body">
                <div class="app-sidebar__user clearfix active">
                  <div class="dropdown user-pro-body">
                    <!-- <div class="">
                      <img
                        alt="user-img"
                        class="avatar avatar-xl brround mCS_img_loaded"
                        :src="
                          '/storage/consultant_profile_image/' +
                          subuser.profile_img
                        "
                      />
                      <span
                        class="avatar-status profile-status bg-green"
                      ></span>
                    </div> -->
                    <div class="">
                      <img
                        alt="user-img"
                        class="avatar avatar-xl brround mCS_img_loaded"
                        :src="'subuser_profile_image/' + user.profile_image"
                        width="36"
                        height="36"
                        v-if="user.profile_image"
                      />
                      <img
                        alt="user-img"
                        class="avatar avatar-xl brround mCS_img_loaded"
                        src="subuser_profile_image/default_image.png"
                        width="36"
                        height="36"
                        v-else
                      />
                      <span
                        class="avatar-status profile-status bg-green"
                      ></span>
                    </div>
                    <div class="user-info">
                      <h4 class="font-weight-semibold mt-3 mb-0">
                        {{ user.fname }} {{ user.lname }}
                      </h4>
                      <span class="mb-0 text-muted"
                        >Working As a {{ user.designation }} in
                        {{ user.company_name }}</span
                      >
                    </div>
                  </div>
                </div>
                <hr />
                <!-- <div class="row progress-r">
                  <div class="col-md-12">
                    <div class="d-flex align-items-center pb-2">
                      <p class="mb-0">
                        
                      </p>
                    </div>
                    <h4 class="font-weight-bold mb-2"></h4>
                  </div>
                </div> -->
                <hr />
                <h6 class="card-title">Here are your actions details</h6>

                <div class="list-group mt-3">
                  <router-link :to="'/tracker-list'"
                    ><a href="">
                      <div class="list-group-item">
                        <p>Total Added:</p>
                        <span class="badge badge-primary">{{
                          countData["totalAdded"]
                        }}</span>
                      </div>
                    </a></router-link
                  >
                  <router-link
                    :to="{
                      path: 'tracker-list',
                      query: { uploadstatus: 'no' },
                    }"
                    ><a href="">
                      <div class="list-group-item">
                        <p>Resume Not Uploaded</p>
                        <span class="badge badge-danger">{{
                          countData["resumeNotUploaded"]
                        }}</span>
                      </div>
                    </a></router-link
                  >

                  <router-link
                    :to="{
                      path: 'tracker-list',
                      query: { uploadstatus: 'yes' },
                    }"
                    ><a href="">
                      <div class="list-group-item">
                        <p>Resume Uploaded</p>
                        <span class="badge badge-secondary">{{
                          countData["resumeUploaded"]
                        }}</span>
                      </div>
                    </a></router-link
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <subuser-footer></subuser-footer>
  </div>
</template>

<script>
export default {
  name: "SubuserDashboard",
  data() {
    return {
      user: [],
      countData: [],
    };
  },
  mounted() {
    // this.$router.push({ path: "tracker-list", query: { data: "resume_Not_uploaded" } });
  },


  created() {
    this.getSessionUser();
    this.getCountData();
  },

  methods: {
    getSessionUser() {
      axios.get("/get-subuser-profile").then((response) => {
        if (response.data) {
          this.user = response.data.data;
        }
      });
    },
    getCountData() {
      axios.get("/get/dashboard-data").then((response) => {
        if (response.data) {
          this.countData = response.data.data;
        }
      });
    },
  },
};
</script>

<style >
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>
