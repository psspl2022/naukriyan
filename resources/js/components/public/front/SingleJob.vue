<template>
  <div id="career">
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
          <div class="col-md-7">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Careers</a></li>
                <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  {{ singleJob.post_name }}
                </li>
              </ol>
            </nav>
            <div class="job-info">
              <h2>{{ singleJob.post_name }}</h2>
              <p>{{ singleJob.post_short_desc }}</p>
              <div class="details">
                <span class="exp"
                  >Experience:
                  {{ singleJob.min_exp ? singleJob.min_exp : "00" }} -
                  {{ singleJob.max_exp ? singleJob.max_exp : "00" }} Year</span
                >
                <span class="count"
                  >Openings: {{ singleJob.total_opening }}</span
                >
                <span class="ctc">CTC: {{ singleJob.current_ctc }}</span>
                <p class="process">
                  Interview Process: {{ singleJob.interview_process }}
                </p>
              </div>
              <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#applyJob"
              >
                Apply Now
              </button>
              <!-- <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#shareJob"
              >
                Share Job
              </button> -->
            </div>
            <div class="role-info mt-3" v-html="singleJob.post_long_desc"></div>
          </div>
          <div class="col-md-5" id="ss">
            <div class="card job-card">
              <h2 class="text-left">{{ singleJob.post_name }}</h2>
              <table class="current-open">
                <tbody>
                  <tr class="row">
                    <td class="col">Experience</td>
                    <td class="col">
                      {{ singleJob.min_exp ? singleJob.min_exp : "00" }} -
                      {{ singleJob.max_exp ? singleJob.max_exp : "00" }} Years
                    </td>
                  </tr>
                  <tr class="row">
                    <td class="col">Openings</td>
                    <td class="col">{{ singleJob.total_opening }}</td>
                  </tr>
                  <tr class="row">
                    <td class="col">CTC</td>
                    <td class="col">{{ singleJob.current_ctc }}</td>
                  </tr>
                  <tr class="row">
                    <td class="col">Interview Process</td>
                    <td class="col">{{ singleJob.interview_process }}</td>
                  </tr>
                </tbody>
              </table>
              <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#applyJob"
              >
                Apply Now
              </button>
              <!-- <button
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#shareJob"
              >
                Share Job
              </button> -->
            </div>
          </div>
        </div>
        <div class="row">
          <div
            class="modal fade"
            id="applyJob"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog">
              <div class="modal-content modal-content-one">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">
                    General Information
                  </h4>
                  <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span
                    ><span class="sr-only">Close</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <form
                        action=""
                        method="post"
                        enctype="multipart/form-data"
                        @submit.prevent="applyJob()"
                      >
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Enter Name *"
                            v-model="form.full_name"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="email"
                            class="form-control"
                            placeholder="Enter Email *"
                            v-model="form.email"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="number"
                            class="form-control"
                            placeholder="Enter Phone Number *"
                            v-model="form.phone_num"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Enter Location *"
                            v-model="form.location"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Enter Experience *"
                            v-model="form.experience"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Enter Current CTC *"
                            v-model="form.current_ctc"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Enter Expected CTC *"
                            v-model="form.exp_ctc"
                          />
                        </div>
                        <div class="form-group">
                          <input
                            type="file"
                            class="form-control"
                            placeholder="Enter Expected CTC *"
                            v-on:change="onResumeChange"
                          />
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">
                            {{ applyStatus ? "Applying" : "Apply" }}
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- JOB SHARE MODEL -->
          <div
            class="modal fade"
            id="shareJob"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog">
              <div class="modal-content modal-content-one">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <a href="#" class="social-btn facebook-btn">Facebook</a>
                      <a href="#" class="social-btn twitter-btn">Twitter</a>
                      <a href="#" class="social-btn linkedin-btn">LinkedIn</a>
                    </div>
                  </div>
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
  name: "SingleJob",
  data() {
    return {
      jobSlug: this.$route.params.slug,
      singleJob: [],
      applyStatus: false,
      form: new Form({
        full_name: "",
        email: "",
        phone_num: "",
        location: "",
        experience: "",
        current_ctc: "",
        exp_ctc: "",
        resume: "",
        jobId: "",
      }),
    };
  },
  mounted() {
    this.$store.dispatch("getAllProfile", "/userprofile");
  },
  methods: {
    onResumeChange(event) {
      let file = event.target.files[0];
      if (file.size > 5242880) {
        swal({
          type: "error",
          title: "Oops...",
          text: "Your file size is too large.",
        });
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.resume = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
    applyJob() {
      this.applyStatus = true;
      axios
        .post("/apply-career-job", this.form)
        .then((response) => {
          this.applyStatus = false;
          if (response.status === 200) {
            this.form = "";
            toast({
              type: "success",
              title: "Job Applied successfully",
            });
          } else if (response.data.error !== "") {
            toast({
              type: "warning",
              title: response.data.error,
            });
          } else {
            toast({
              type: "warning",
              title: "Something went wrong.",
            });
          }
        })
        .catch((error) => {
          this.applyStatus = false;
          toast({
            type: "warning",
            title: "Something went wrong.",
          });
        });
    },
    getJobBySlug() {
      axios.get("/single-job/" + this.jobSlug).then((response) => {
        this.singleJob = response.data;
        this.form.jobId = response.data.id;
      });
    },
  },
  created() {
    this.getJobBySlug();
  },
  computed: {
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
  },
};
</script>

<style scoped>
.job-card p {
  float: left !important;
}
.current-open tr td {
  text-align: left;
}
table {
  width: 100% !important;
}

</style>