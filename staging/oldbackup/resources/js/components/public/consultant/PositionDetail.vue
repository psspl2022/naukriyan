<template>
  <div id="newPositionList">
    <consultant-header></consultant-header>
    <section class="top-adjust pt-5 pb-5">
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">New Positions</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i>
                  <a href="tel:919711999999">Hot Line: +91 9711 99 99 99</a>
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
          <!-- <div class="col-sm-3">
            <div class="card card-dashboard">
              <div class="card-body">
                {{ posts }}
              </div>
            </div>
          </div> -->
          <div class="col-sm-9">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-md-6">
                    <h1>
                      {{ posts.title }}
                      <span v-if="posts.job_role" class="text-small"
                        >({{ posts.job_role }})</span
                      >
                    </h1>
                    <p>
                      <strong>Company:</strong>
                      {{ posts.companies.company_name }}
                    </p>
                    <p>{{ posts.job_address }}</p>
                  </div>
                  <div class="col-md-6">
                    <p>
                      <strong>Offered Salary: </strong
                      >{{ posts.offered_sal_min }} - {{ posts.offered_sal_max }}
                    </p>
                    <p>
                      <strong>Experienced: </strong>{{ posts.main_exp }} -
                      {{ posts.max_exp }}
                    </p>
                    <p>
                      <strong>Career Level: </strong
                      >{{ posts.job_carreer_level | checkCareerLevel }}
                    </p>
                    <p><strong>Skills: </strong>{{ posts.job_skills }}</p>
                    <p><strong>Total Vacancies: </strong>{{ posts.job_vaccancy }}</p>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-12">
                    <h4>Job description</h4>
                    <p>{{ posts.description }}</p>
                  </div>

                  <div class="col-md-12">
                    <h4>Job responsibility</h4>
                    <p>{{ posts.responsibility }}</p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <button
                      class="btn btn-success text-white btn-block"
                      v-if="jobsID.includes(posts.id) === true"
                      disabled
                    >
                      <i class="fa fa-check-circle"></i>
                      Applied
                    </button>
                    <a
                      data-toggle="modal"
                      data-target="#agreementModel"
                      class="btn btn-primary border-orange text-white btn-block"
                      v-else
                      v-on:click="getCommissionAndJobLastDate(posts.id)"
                      >Apply Job</a
                    >
                  </div>
                </div>
              </div>
            </div>

            <!-- Agreement Model -->
            <div
              class="modal fade"
              id="agreementModel"
              tabindex="-1"
              role="dialog"
              aria-labelledby="agreementModelLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="agreementModelLabel">
                      Client Commercials
                    </h5>
                    <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p></p>
                    <table class="table">
                      <strong v-if="commissionStatus">Loading...</strong>
                      <tbody id="responseData" v-else>
                        <tr>
                          <th>Commission</th>
                          <td>{{ detailsOnModel.commission }}</td>
                        </tr>

                        <tr>
                          <th>Replacement Date</th>
                          <td>{{ detailsOnModel.job_last_date }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button
                      type="button"
                      class="btn btn-secondary"
                      data-dismiss="modal"
                      v-on:click="clearAjaxRequest()"
                    >
                      Close
                    </button>
                    <button
                      type="button"
                      class="btn btn-primary"
                      v-on:click.prevent="
                        acceptJob(detailsOnModel.job_id, (status = 'accept'))
                      "
                      :disabled="applyStatus"
                    >
                      {{ applyStatus ? "Applying" : "Apply" }}
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <consultant-footer></consultant-footer>
  </div>
</template>

<script>
export default {
  name: "NewPositionList",

  data() {
    return {
      posts: {},
      jobsID: [],
      detailsOnModel: {
        commission: "",
        job_id: "",
        job_last_date: "",
      },
      commissionStatus: false,
      applyStatus: false,
      routeJobId: this.$route.params.id,
    };
  },

  mounted() {
    this.getConsultantJobs();
  },

  created() {
    this.checkUserApplyJobs();
  },

  methods: {
    getCommissionAndJobLastDate(post_id) {
      this.commissionStatus = true;
      axios.get("get-commission-last-date/" + post_id).then((response) => {
        this.commissionStatus = false;
        this.detailsOnModel.commission = response.data.consultant_commission;
        this.detailsOnModel.job_id = response.data.job_id;
        this.detailsOnModel.job_last_date = response.data.job_last_date;
      });
    },

    clearAjaxRequest() {
      this.detailsOnModel.commission = "";
      this.detailsOnModel.job_id = "";
      this.detailsOnModel.job_last_date = "";
    },

    getConsultantJobs() {
      axios
        .get("/show-consultant-job-detail/" + this.routeJobId)
        .then((response) => {
          if (response.data) {
            this.posts = response.data;
          }
        })
        .catch((error) => {
          console.log("error");
        });
    },

    checkUserApplyJobs() {
      const self = this;
      axios.get("get-accepted-consultant-jobs").then((response) => {
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.jobsID.push(value.jobmanager_id);
          });
        } else {
          this.jobsID.push(0);
        }
      });
    },

    acceptJob(jobId, status) {
      this.applyStatus = true;
      axios
        .get(`/consultant-job?status=${status}&job_id=${jobId}`)
        .then((response) => {
          this.applyStatus = false;
          this.checkUserApplyJobs();
          if (
            response.data.status === "success" &&
            response.data.type === "accept"
          ) {
            toast({
              type: "success",
              title: response.data.message,
            });
            this.getConsultantJobs();
          } else if (response.data.status === "error") {
            toast({
              type: "error",
              title: response.data.message,
            });
          }
        })
        .catch((error) => {
          this.applyStatus = false;
          swal("Something went wrong. Please try again.");
        });
    },
  },

  filters: {
    checkCareerLevel: function (value) {
      let careerlevel = "";

      if (!value) return "-";

      if (value === "1") {
        return (careerlevel = "Entry Level");
      } else if (value === "2") {
        return (careerlevel = "Mid Level");
      } else {
        return (careerlevel = "Top Level");
      }
    },
  },
};
</script>

<style scoped>
.text-small {
  font-size: 13px;
}
.job-card-info {
  border-radius: 0 !important;
  -webkit-transition: box-shadow 0.6s ease-out;
  box-shadow: 0.8px 0.9px 3px grey;
}

.job-card-info:hover {
  box-shadow: 1px 8px 20px grey;
  -webkit-transition: box-shadow 0.6s ease-in;
}
</style>