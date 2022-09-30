<template>
  <div id="viewemployeeprofile">
    <Emp-header></Emp-header>
    <header class="masthead1 text-center text-white">
      <div class="masthead-content" id="form-container">
        <div class="container">
          <h1 id="looking" class="masthead-heading mb-5 pb-4">
            Employer Details
          </h1>
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
              <div class="col-lg-10 col-md-6">
                <h1>{{ allProfile.fname }}</h1>
                <p class="mb-0">
                  {{ allProfile.designation }} At {{ allProfile.company_name }}
                </p>
                <div class="detail-tags">
                  <div class="destination">
                    <p class="pt-2">
                      <span class="pb-2"
                        ><i class="fa fa-envelope mr-2" aria-hidden="true"></i
                        >{{ allProfile.email }}</span
                      ><span
                        ><i class="fa fa-phone mr-2" aria-hidden="true"></i
                        >{{ allProfile.contact }}</span
                      >
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-6">
                <div class="meta-option">
                  <div class="price-wrapper p-0">
                    <p class="price mb-2">
                      <span class="">Jobs</span>
                      <ins class="new-price text-danger">({{ allJobs }})</ins>
                    </p>
                    <p class="price mb-2">
                      <span class="">Active Jobs</span>
                      <ins class="new-price text-success"
                        >({{ activeJobs }})</ins
                      >
                    </p>
                    <p class="price mb-2">
                      <span class="">Followers</span>
                      <ins class="new-price text-primary"
                        >({{ followers }})</ins
                      >
                    </p>
                    <!-- <a href="www.prakharsoftwares.com" target="_blank" id="" data-id="queryForm"
                                            class="btn btn-primary text-white">Enquiry</a> -->
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
          <div class="col-sm-12">
            <div class="cms-pg-header">
              <h2 class="hk-pg-title">Job Posted</h2>
              <div class="dataTables_length" id="example1_length">
                <label
                  >All Jobs
                  <select
                    name="example1_length"
                    aria-controls="example1"
                    class="custom-select custom-select-sm form-control form-control-sm"
                  >
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </label>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-sm-3" v-for="job in allDesignation" :key="job.id">
            <div class="card job-card">
              <div class="card-body">
                <div class="card-block">
                  <router-link :to="`/editpostjob/${job.id}`">
                    <h4 class="card-title">{{ job.title }}</h4></router-link
                  >
                  <p class="card-text">{{ job.job_exp }}</p>
                  <p class="card-text">
                    <small class="text-muted">{{ job.last_apply_date }}</small>
                  </p>
                  <button
                    @click.prevent="deactivejob(job.id)"
                    class="btn btn-danger"
                    v-if="job.status === 'Active'"
                  >
                    De-Active
                  </button>
                  <button
                    @click.prevent="activejob(job.id)"
                    class="btn btn-success"
                    v-if="job.status === 'Deactive'"
                  >
                    Active
                  </button>
                </div>
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
  name: "Viewemployeeprofile",
  data() {
    return {
      city: [],
      allJobs: 0,
      activeJobs: 0,
      followers: 0,
    };
  },
  mounted() {
    this.$store.dispatch("getAllDesignation", "/getjob-employerid");
    this.$store.dispatch("getAllProfile", "/employer-profile");
  },
  computed: {
    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
  },
  methods: {
    countJobs() {
      axios.get("count-job").then((response) => {
        this.allJobs = response.data.data;
      });
    },

    countActiveJobs() {
      axios.get("count-active-job").then((response) => {
        this.activeJobs = response.data.data;
      });
    },

    countFollowers() {
      axios.get("count-followers").then((response) => {
        this.followers = response.data.data;
      });
    },

    deactivejob(id) {
      var uri = "/deactive-jobme/" + id;
      swal
        .fire({
          title: "Are you sure want to change?",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            axios.get(uri).then((response) => {
              swal.fire(
                "Change status!",
                "Your status has been changed.",
                "success"
              );
              this.$store.dispatch("getAllDesignation", "/getjob-employerid");
              this.countActiveJobs();
            });
          }
        });
    },

    activejob(id) {
      var uri = "/active-jobme/" + id;
      swal
        .fire({
          title: "Are you sure want to change?",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            axios.get(uri).then((response) => {
              swal.fire(
                "Change status!",
                "Your status has been changed.",
                "success"
              );
              this.$store.dispatch("getAllDesignation", "/getjob-employerid");
              this.countActiveJobs();
            });
          }
        });
    },
  },
  created: function () {
    this.countJobs();
    this.countActiveJobs();
    this.countFollowers();
  },
};
</script>

<style scoped>
</style>