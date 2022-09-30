<template>
  <div id="videoresume">
    <jobseeker-header
      v-if="allProfile != null && allProfile.user_type === 'Jobseeker'"
    ></jobseeker-header>
    <Emp-header
      v-if="allProfile != null && allProfile.user_type === 'Employer'"
    ></Emp-header>
    <main-header v-if=""></main-header>
    <header class="masthead1 text-center text-white mt-5">
      <div class="masthead-content" id="form-container">
        <div class="container">
          <h1 id="looking" class="masthead-heading mb-0 pb-4">Video Resume</h1>
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
          <!-- Tab 1 start -->
          <div class="col-12 mx-auto">
            <div
              class="accordion"
              id="faqExample"
              :class="tabValue === 'howtomakeresume' ? 'show-form' : 'hide-form'"
            >
              <div class="card mb-2">
                <div class="card-header pt-1 pb-1" id="howtomakeresume">
                  <h4 class="mb-0">
                    <button
                      class="btn btn-link"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseOne"
                      aria-expanded="true"
                      aria-controls="collapseOne"
                    >
                      How to Make Resume
                    </button>
                  </h4>
                </div>

                <div
                  id="collapseOne"
                  class="collapse show"
                  aria-labelledby="howtomakeresume"
                  data-parent="#faqExample"
                >
                  <div class="card-body">
                    <p>
                      A video resume is a tool that you can use to help you get
                      your dream job. It&rsquo;s more than just transforming
                      your paper resume into a video format. It&rsquo;s a way
                      for you to showcase your personality, create a great first
                      impression, and emphasise your talent and skills.
                    </p>
                    <p>
                      Just like a paper resume, you need to cover the
                      essentials: Education Experience Interests Video resume
                      reflects your all round personality. It shows your
                      confidence, gestures, dressing sense, communication skills
                      etc. Let's see the steps to create a video resume and post
                      at Naukriyan.com
                    </p>
                    <p>
                      1. Shoot your video explaining yourself. Explain briefly
                      about your academics, experience, skills, achievements and
                      interest.
                    </p>
                    <p>
                      2. Upload your video on youtube with your personal id.
                      Make the video public or unlisted while uploading.
                    </p>
                    <p>
                      3. Copy your video url from youtube and paste it in
                      <b>Naukriyan</b> update profile video resume section.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Tab 1 End -->
          <!-- Tab 2 start -->
          <div class="col-12 mx-auto">
            <div
              class="accordion"
              id="faqExample"
              :class="tabValue === 'contentofvideoresume' ? 'show-form' : 'hide-form'"
            >
              <div class="card mb-2">
                <div class="card-header pt-1 pb-1" id="contentofvideoresume">
                  <h4 class="mb-0">
                    <button
                      class="btn btn-link"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseTwo"
                      aria-expanded="true"
                      aria-controls="collapseTwo"
                    >
                      Content Of Video Resume
                    </button>
                  </h4>
                </div>

                <div
                  id="headingTwo"
                  class="collapse show"
                  aria-labelledby="contentofvideoresume"
                  data-parent="#faqExample"
                >
                  <div class="card-body">
                    <p>
                      <strong
                        >For creating efficient video resume one should make
                        checklist of points to be covered. You can check below
                        points for your reference.</strong
                      >
                    </p>
                    <p><strong></strong></p>
                    <p><strong>Name of the Applicant</strong></p>
                    <p><strong>General Information</strong></p>
                    <ul>
                      <li>Father&rsquo;s Name</li>
                      <li>Qualification (Graduation)</li>
                      <li>Post-Graduation</li>
                      <li>Total Experience (Years + Months)</li>
                      <li>Relevant Experience (Y+M)</li>
                      <li>Currently Working / Not Working</li>
                      <li>Date of Birth (DD/MM/YYYY)</li>
                    </ul>
                    <p><strong>Educational Qualification</strong></p>
                    <ul>
                      <li>Post-Graduation</li>
                      <li>Graduation></li>
                      <li>Higher Secondary></li>
                      <li>Intermediate ></li>
                      <li>Extra Qualification</li>
                      <li>Diploma (If Any)</li>
                    </ul>
                    <p><strong>Employment Details</strong></p>
                    <p><strong>Employer with Name and Tenure </strong></p>
                    <p><strong>Designation </strong></p>
                    <ul>
                      <li><strong>Technology / Framework </strong></li>
                      <li>
                        <strong>Roles and Responsibilities in the Job </strong>
                      </li>
                    </ul>
                    <p><strong>Previous Employment Details</strong></p>
                    <ul>
                      <li>Previous Employer with Name and Tenure</li>
                      <li>Designation</li>
                      <li>Technology / Framework</li>
                      <li>Roles and Responsibilities in the Job></li>
                    </ul>
                    <p><strong>Strengths</strong></p>
                    <p><strong>Weaknesse </strong></p>
                    <p><strong>Hobbies </strong></p>
                    <p><strong>Any other Details</strong></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Tab 2 End -->

          <!-- Tab 3 start -->
          <div class="col-12 mx-auto">
            <div
              class="accordion"
              id="faqExample"
              :class="tabValue === 'samplevideoresume' ? 'show-form' : 'hide-form'"
            >
              <div class="card mb-2">
                <div class="card-header pt-1 pb-1" id="samplevideoresume">
                  <h4 class="mb-0">
                    <button
                      class="btn btn-link"
                      type="button"
                      data-toggle="collapse"
                      data-target="#collapseThree"
                      aria-expanded="true"
                      aria-controls="collapseThree"
                    >
                      Sample Video Resume
                    </button>
                  </h4>
                </div>

                <div
                  id="collapseThree"
                  class="collapse show"
                  aria-labelledby="samplevideoresume"
                  data-parent="#faqExample"
                >
                  <div class="card-body">
                    <div class="form-group row">
                      <div class="col-sm-4 mb-2">
                        <video-embed
                          css="embed-responsive-4by3"
                          src="https://youtu.be/XWJIK9CHC3g"
                        ></video-embed>
                      </div>
                      <div class="col-sm-4 mb-2">
                        <video-embed
                          css="embed-responsive-4by3"
                          src="https://youtu.be/-6xBXhrUZ-A"
                        ></video-embed>
                      </div>
                      <div class="col-sm-4 mb-2">
                        <video-embed
                          css="embed-responsive-4by3"
                          src="https://youtu.be/r6VrCiFBRwE"
                        ></video-embed>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Tab 3 End -->
        </div>
      </div>
    </section>
    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "VideoResume",
  data() {
    return {
      tabValue: "",
      tabId: this.$route.params.tabId,
    };
  },
  metaInfo: {
    title:
      "Top Recruitment Processing Outsourcing Technical jobs near me -Naukriyan",
    // Define meta tags here.
    meta: [
      {
        name: "keywords",
        content:
          "Recruitment Processing Outsourcing, Technical Recruiter jobs near me",
      },
      {
        name: "description",
        content:
          "Naukriyan is among the top recruitment outsourcing companies in Delhi, enabling our partner company with RPO jobs solutions designed to Know. ✓ Technical Job near me",
      },
    ],
  },
  mounted() {
    this.$store.dispatch("getAllProfile", "/userprofile");
    this.getURLParameters(this.tabId);
    //this.getWebsiteInfo();
  },
  computed: {
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
  },

  methods: {
    getURLParameters(tabId) {
      this.changeTabmode(tabId);
    },
    changeTabmode(id) {
      if (id == "howtomakeresume") {
        this.tabValue = id;
      } else if (id == "contentofvideoresume") {
        this.tabValue = id;
      } else if (id == "samplevideoresume") {
        this.tabValue = id;
      } else {
        this.tabValue = id;
      }
    },

    // getWebsiteInfo() {
    //   axios
    //     .get("get-web-info")
    //     .then((response) => {
    //       console.log(response);
    //       this.web_info = response.data.data[0];
    //     })
    //     .catch((error) => {
    //       console.log("error");
    //     });
    // },
  },
  created() {
    this.changeTabmode(this.tabId);
  },
};
</script>

<style scoped>
.show-form {
  display: block;
}
.hide-form {
  display: none;
}
</style>