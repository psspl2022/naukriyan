<template>
  <div id="managePositionList">
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
                  <li class="active">Manage Position</li>
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
            <div class="card mt-3 card-dashboard">
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
                          Clients
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
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button
                            class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                            data-toggle="collapse"
                            data-target="#collapseTwo"
                            aria-expanded="false"
                            aria-controls="collapseTwo"
                        >
                          End Clients
                        </button>
                      </h2>
                    </div>
                    <div
                        id="collapseTwo"
                        class="collapse"
                        aria-labelledby="headingTwo"
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
                          Positions
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

                  <div class="card border-0">
                    <div class="card-header" id="headingFour">
                      <h2 class="mb-0">
                        <button
                            class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                            data-toggle="collapse"
                            data-target="#collapseFour"
                            aria-expanded="false"
                            aria-controls="collapseFour"
                        >
                          Locations
                        </button>
                      </h2>
                    </div>
                    <div
                        id="collapseFour"
                        class="collapse"
                        aria-labelledby="headingFour"
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
            <div class="card mt-3">
              <div class="card-body">
                <ul class="nav positions-list-tabs">
                  <li class="nav-item">
                    <a
                        class="nav-link active fs-12"
                        data-toggle="tab"
                        href="#AppliedJob"
                    >Applied Job</a>
                  </li>
                  <li class="nav-item">
                    <a
                        class="nav-link fs-12"
                        data-toggle="tab"
                        href="#Active"
                    >Active</a>
                  </li>
                  <li class="nav-item">
                    <a
                        class="nav-link fs-12"
                        data-toggle="tab"
                        href="#InActive"
                    >InActive</a
                    >
                  </li>
                </ul>

                <div class="tab-content">

                  <!-- Accepted_JDs tab start -->
                  <div id="AppliedJob" class="tab-pane fade active show">
                    <table class="table table-bordered mt-2">
                      <thead>
                      <tr>
                        <th>Client Name</th>
                        <th>Position</th>
                        <th>Location</th>
                        <th>CTC</th>
                        <th>Commission</th>
                        <th>Avg. Rating</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr v-if="loadingStatus">
                        <td colspan="7" class="text-center">
                          <p>Loading Please wait...</p>
                        </td>
                      </tr>

                      <tr v-for="appliedJob in appliedJobs" :key="appliedJob.id" v-else>
                        <td>
                          {{ appliedJob.jobmanager.companies.company_name }}
                        </td>
                        <td>{{ appliedJob.jobmanager.job_role }}</td>
                        <td>{{ appliedJob.jobmanager.job_exp }}</td>
                        <td>{{ appliedJob.jobmanager.job_ctc }}</td>
                        <td>{{ appliedJob.percentage ? appliedJob.percentage + '%' : 'N/A' }}</td>
                        <td>{{ appliedJob.jobmanager.companies.ratings.length > 0 ? ((appliedJob.jobmanager.companies.ratings[0].avg_rating / 5)+ '/' +5) : 'N/A' }}</td>
                        <td>
                          <span class="badge badge-success" v-if="appliedJob.assigned === 'Yes'">Assigned</span>
                          <span class="badge badge-warning" v-else-if="appliedJob.assigned === 'No'">Not assigned</span>
                          <span class="badge badge-danger" v-else>Rejected</span>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Accepted_JDs tab end -->

                  <!-- Active tab start -->
                  <div id="Active" class="tab-pane show">
                    <table class="table table-bordered mt-2">
                      <thead>
                      <tr>
                        <th>Client Name</th>
                        <th>Position</th>
                        <th>Location</th>
                        <th>CTC</th>
                        <th>Commission</th>
                        <th>Avg. Rating</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr
                          v-for="activeJob in applyJobActive"
                          :key="activeJob.id"
                      >
                        <td>
                          {{ activeJob.jobmanager.companies.company_name }}
                        </td>
                        <td>{{ activeJob.jobmanager.job_role }}</td>
                        <td>{{ activeJob.jobmanager.job_exp }}</td>
                        <td>{{ activeJob.jobmanager.job_ctc }}</td>
                        <td>{{ activeJob.percentage ? activeJob.percentage + '%' : 'N/A' }}</td>
                        <td>{{ activeJob.jobmanager.companies.ratings.length > 0 ? ((activeJob.jobmanager.companies.ratings[0].avg_rating / 5)+ '/' +5) : 'N/A' }}</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- Active tab end -->

                  <!-- InActive tab start -->
                  <div id="InActive" class="tab-pane fade">
                    <table class="table table-bordered mt-2">
                      <thead>
                      <tr>
                        <th>Client Name</th>
                        <th>Position</th>
                        <th>Location</th>
                        <th>CTC</th>
                        <th>Avg. Rating</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr
                          v-for="inactiveJob in applyJobInactive"
                          :key="inactiveJob.id"
                      >
                        <td>
                          {{ inactiveJob.jobmanager.companies.company_name }}
                        </td>
                        <td>{{ inactiveJob.jobmanager.job_role }}</td>
                        <td>{{ inactiveJob.jobmanager.job_exp }}</td>
                        <td>{{ inactiveJob.jobmanager.job_ctc }}</td>
                        <td>{{ inactiveJob.jobmanager.companies.ratings.length > 0 ? ((inactiveJob.jobmanager.companies.ratings[0].avg_rating / 5)+ '/' +5) : 'N/A' }}</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!--InActive tab end -->
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
  name: "ManagePositionList",

  data() {
    return {
      applyJobActive: null,
      applyJobInactive: null,
      appliedJobs: null,

      loadingStatus: false,
    };
  },

  created() {
    this.getAppliedActiveJobs();
    this.getAppliedInactiveJobs();
    this.appliedJobByConsultant();
  },

  methods: {
    getAppliedActiveJobs() {
      axios.get("/get-applied-active-jobs").then((response) => {
        this.applyJobActive = response.data.data;
      });
    },

    getAppliedInactiveJobs() {
      axios.get("/get-applied-inactive-jobs").then((response) => {
        this.applyJobInactive = response.data.data;
      });
    },

    appliedJobByConsultant() {
      this.loadingStatus = true;
      axios.get("/get-accepted-consultant-jobs").then((response) => {
        this.loadingStatus = false;
        if (response.data) {
          this.appliedJobs = response.data;
        }
      }).catch(error => {
        this.loadingStatus = false;
        console.log('not loading');
      });
    },
  },
};
</script>

<style scoped>
  .img-loading {
    width: 100px!important;
  }
</style>