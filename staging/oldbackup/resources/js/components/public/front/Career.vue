<template>
  <div id="career">
    <main-header></main-header>
    <header class="masthead1 text-center text-white mt-5">
      <div class="masthead-content" id="form-container">
        <div class="container">
          <h1 id="looking" class="masthead-heading mb-0 pb-4">Career</h1>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>

    <section class="section mb-5">
      <div class="container">
        <div class="row">
          <div class="col-12 mx-auto">
            <h1 class="custom heading pb-3">Work with us. Grow with us.</h1>
            <p class="text-center">
              Our mission is bold: “To be the most valued supplier of
              hospitality products, everywhere in the world.” It’s also moving
              full-throttle ahead. If you are interested in joining a team with
              an everyday commitment to meet the growing needs of customers in
              hospitality and its related markets, we want to meet
              you.Established in the United States of America, Start.ly has
              operations all over the world. Its regional headquarter is located
              in Dubai which serves as the hub of Western Asia. We have in place
              a wide network of our own international offices and affiliates
              dedicated around the world. Globally repurpose distinctive
              "outside the box" thinking and premium process improvements.
              Dynamically utilize flexible ideas after future-proof expertise.
              Progressively disseminate multidisciplinary relationships.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-2">
            <h5 class="custom heading pb-3 fs-25">Current Openings</h5>
          </div>
          <div
            class="col-md-4 mb-2"
            v-for="careerJob in careerJobs"
            :key="careerJob.id"
          >
            <router-link :to="`/job/${careerJob.slug}`" class="op-block">
              <div class="card job-card">
                <h5 class="op-name">{{ careerJob.post_name }}</h5>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </section>
    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "Career",
  data() {
    return {
      careerJobs: [],
    };
  },
  mounted() {
    this.$store.dispatch("getAllProfile", "/userprofile");
  },
  methods: {
    getJobLists() {
      axios.get("/get-career-jobs").then((response) => {
        this.careerJobs = response.data.data;
      });
    },
  },
  created() {
    this.getJobLists();
  },
  computed: {
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
  },
};
</script>

<style scoped>
.job-card {
  border-radius: 0 !important;
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}
.op-block {
  cursor: pointer;
}
.op-name {
  color: #64687a;
  font-weight: 400;
  font-size: 18px;
}
</style>