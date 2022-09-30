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
          <div class="col-sm-3">
            <div class="card card-dashboard">
              <div class="card-body">
                <div class="position-search-bar">
                  <div class="inner">
                    <form action="" method="GET">
                      <div class="gap-10">
                        <div class="">
                          <div class="form-group form-icon-right mb-10">
                            <div class="text-center">
                              <button
                                  type="submit"
                                  class="rounded-0 btn btn-block btn-primary btn-icon w-100"
                              >
                                Manage JD (S)
                              </button>
                            </div>
                            <input
                                name="q"
                                type="text"
                                id="txtgoingto"
                                placeholder="Search Positions"
                                class="form-control mb-0 ui-autocomplete-input"
                                autocomplete="off"
                            />
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <hr/>
                <div id="accordion" class="myaccordion1">
                  <div class="card border-0">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button
                            class="d-flex align-items-center justify-content-between btn btn-link accordion-toggle"
                            data-toggle="collapse"
                            data-target="#collapseOne"
                            aria-expanded="false"
                            aria-controls="collapseOne"
                        >
                          Active
                        </button>
                      </h2>
                    </div>
                    <div
                        id="collapseOne"
                        class="collapse"
                        aria-labelledby="headingOne"
                        data-parent="#accordion"
                    >
                      <div class="card-body"></div>
                    </div>
                  </div>

                  <div class="card border-0">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0">
                        <button
                            class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                            data-toggle="collapse"
                            data-target="#collapseThree"
                            aria-expanded="false"
                            aria-controls="collapseThree"
                        >
                          InActive
                        </button>
                      </h2>
                    </div>
                    <div
                        id="collapseThree"
                        class="collapse"
                        aria-labelledby="headingThree"
                        data-parent="#accordion"
                    >
                      <div class="card-body"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-9">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-md-3">
                    <select class="form-control" v-model="filters.industry_id">
                      <option value="">Select Industry</option>
                      <option :value="industriesList.id" v-for="industriesList in industriesLists"
                              :key="industriesList.id">{{ industriesList.category_name }}
                      </option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select class="form-control" v-model="filters.state_id">
                      <option value="">Select Location</option>
                      <option :value="state.id" v-for="state in states">{{ state.states_name }}</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <select class="form-control" v-model="filters.company_id">
                      <option value="">Select Company</option>
                      <option :value="company.id" v-for="company in companies">{{ company.company_name }}</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <button class="btn btn-primary" type="submit" @click.prevent="getConsultantJobs()"
                            :disabled="filterStatus">Filter
                    </button>
                    <button class="btn btn-primary" @click.prevent="resetFilter()">Reset</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card mt-3">
              <div class="card-body text-center" v-if="filterStatus">
                <p>Loading Please wait...</p>
              </div>
              <div class="card-body" v-else>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">Client Name</div>
                      <div class="col">Position</div>
                      <div class="col">Location</div>
                      <div class="col">CTC</div>
                      <div class="col">Avg. Rating</div>
                      <div class="col">Action</div>
                    </div>
                  </div>
                </div>

                <div class="card mt-3 job-card-info" v-for="post in posts.data.data" :key="post.id">
                  <router-link :to="`/jobs/position/${post.id}`">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">{{ post.companies.company_name }}</div>
                        <div class="col">{{ post.job_role }}</div>
                        <div class="col">{{ post.job_exp }}</div>
                        <div class="col">{{ post.job_ctc }}</div>
                        <div class="col">{{
                            post.companies.ratings.length > 0 ? ((post.companies.ratings[0].avg_rating / 5) + '/' + 5) : 'N/A'
                          }}
                        </div>
                        <div class="col">
                          <button class="btn btn-success text-white btn-block" v-if="jobsID.includes(post.id) === true"
                                  disabled><i class="fa fa-check-circle"></i>
                            Applied
                          </button>
                          <a data-toggle="modal" data-target="#agreementModel"
                             class="btn btn-primary border-orange text-white btn-block" v-else
                             v-on:click="getCommissionAndJobLastDate(post.id)">Apply Job</a></div>
                      </div>
                    </div>
                  </router-link>
                </div>
              </div>
            </div>

            <div class="job-pagination mt-3">
              <pagination :data="posts.data" @pagination-change-page="getConsultantJobs"></pagination>
            </div>

            <!-- Agreement Model -->
            <div class="modal fade" id="agreementModel" tabindex="-1" role="dialog"
                 aria-labelledby="agreementModelLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="agreementModelLabel">Client Commercials</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            v-on:click="clearAjaxRequest()">Close
                    </button>
                    <button type="button" class="btn btn-primary"
                            v-on:click.prevent="acceptJob(detailsOnModel.job_id, (status = 'accept'))"
                            :disabled="applyStatus">{{ applyStatus ? 'Applying' : 'Apply' }}
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
      industriesLists: null,
      states: null,
      companies: null,
      detailsOnModel: {
        'commission': '',
        'job_id': '',
        'job_last_date': ''
      },
      commissionStatus: false,
      applyStatus: false,

      filters: {
        industry_id: '',
        company_id: '',
        state_id: ''
      },

      filterStatus: false
    };
  },

  mounted() {
    // get industries
    axios.get('/get-industries').then(response => {
      this.industriesLists = response.data.data;
    });

    // get state
    axios.get('/get-states').then(response => {
      this.states = response.data.data;
    });

    // get companies
    axios.get('/get-companies').then(response => {
      this.companies = response.data;
    });

    this.getConsultantJobs()
  },

  created() {
    this.checkUserApplyJobs();
    this.getConsultantJobs();
  },

  methods: {
    getCommissionAndJobLastDate(post_id) {
      this.commissionStatus = true;
      axios.get('get-commission-last-date/' + post_id).then(response => {
        this.commissionStatus = false;
        this.detailsOnModel.commission = response.data.consultant_commission;
        this.detailsOnModel.job_id = response.data.job_id;
        this.detailsOnModel.job_last_date = response.data.job_last_date;
      })
    },

    clearAjaxRequest() {
      this.detailsOnModel.commission = '';
      this.detailsOnModel.job_id = '';
      this.detailsOnModel.job_last_date = '';
    },

    getConsultantJobs(page = 1) {
      this.filterStatus = true;
      axios.get("/get-consultant-jobs",
          {
            params: {
              'page': page,
              'industry_id': this.filters.industry_id,
              'company_id': this.filters.company_id,
              'state_id': this.filters.state_id
            }
          }).then((response) => {
        this.filterStatus = false;
        if (response.data) {
          this.posts = response;
        }
      }).catch(error => {
        this.filterStatus = false;
        console.log('error');
      });
    },

    resetFilter(page = 1) {
      axios.get("/get-consultant-jobs",
          {
            params: {
              'page': page,
              'industry_id': this.filters.industry_id = '',
              'company_id': this.filters.company_id = '',
              'state_id': this.filters.state_id = ''
            }
          }).then((response) => {
        this.filterStatus = false;
        if (response.data) {
          this.posts = response;
        }
      }).catch(error => {
        this.filterStatus = false;
        console.log('error');
      });
    },

    checkUserApplyJobs() {
      const self = this;
      axios.get('get-accepted-consultant-jobs').then(response => {
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.jobsID.push(value.jobmanager_id);
          });
        } else {
          this.jobsID.push(0);
        }
      })
    },

    acceptJob(jobId, status) {
      this.applyStatus = true;
      axios.get(`/consultant-job?status=${status}&job_id=${jobId}`).then((response) => {
        this.applyStatus = false;
        if (response.data.status === "success" && response.data.type === "accept") {
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
      }).catch((error) => {
        this.applyStatus = false;
        swal("Something went wrong. Please try again.");
      });
    },

    rejectJob(jobId, status) {
      this.acceptJob(jobId, status);
    }
  }
};
</script>

<style scoped>
.job-card-info {
  border-radius: 0 !important;
  -webkit-transition: box-shadow .6s ease-out;
  box-shadow: .8px .9px 3px grey;
}

.job-card-info:hover {
  box-shadow: 1px 8px 20px grey;
  -webkit-transition: box-shadow .6s ease-in;
}
</style>