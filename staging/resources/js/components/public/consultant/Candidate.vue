<template>
  <div id="candidates">
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
                  <li class="active">Candidates</li>
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
          <div class="col-md-3">
            <router-link
              :to="`/candidate-register`"
              class="rounded-0 btn-block color-white btn btn-primary btn-icon"
            >
              Register Candidate
            </router-link>
          </div>
        </div>

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
                <hr />
                <div id="accordion1" class="myaccordion1">
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
                      data-parent="#accordion1"
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
            <div class="card mt-3">
              <div class="card-body">
                <ul class="nav positions-list-tabs">
                  <li class="nav-item">
                    <a
                      class="nav-link active fs-12"
                      data-toggle="tab"
                      href="#tabData"
                      v-on:click="getCandidateLists((tabValue = ''))"
                      >All</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                        class="nav-link fs-12 border-right-0"
                        data-toggle="tab"
                        href="#tabData"
                        v-on:click="getCandidateLists((tabValue = 'new candidate'))"
                    >New Candidate</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link fs-12 border-right-0"
                      data-toggle="tab"
                      href="#tabData"
                      v-on:click="getCandidateLists((tabValue = 'shortlisted'))"
                      >Shortlisted</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                        class="nav-link fs-12 border-right-0"
                        data-toggle="tab"
                        href="#tabData"
                        v-on:click="getCandidateLists((tabValue = 'rejected'))"
                    >Rejected</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link fs-12 border-right-0"
                      data-toggle="tab"
                      href="#tabData"
                      v-on:click="getCandidateLists((tabValue = 'interview'))"
                      >Interview Schedule</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                        class="nav-link fs-12 border-right-0"
                        data-toggle="tab"
                        href="#tabData"
                        v-on:click="getCandidateLists((tabValue = 'offer'))"
                    >Offer</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link fs-12 border-right-0"
                      data-toggle="tab"
                      href="#tabData"
                      v-on:click="getCandidateLists((tabValue = 'joined'))"
                      >Joined</a
                    >
                  </li>

                  
                </ul>

                <div class="tab-content">
                  <!-- All tab start -->
                  <div id="tabData" class="tab-pane show active">
                    <p v-if="onChangeStatus" class="mt-3 text-center">
                      <strong>Loading...</strong>
                    </p>
                    <div class="table-responsive custom-height" v-else>
                      <table
                        class="table table-head-fixed positions-list-table mt-2"
                      >
                        <thead>
                          <tr>
                            <th>Candidate Name</th>
                            <th>Client Name</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Gender</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="candidateList in candidateLists"
                            :key="candidateList.id"
                          >
                            <td>{{ candidateList.name }}</td>
                            <td>
                              {{
                                candidateList.jobmanager.companies.company_name
                              }}
                            </td>
                            <td>{{ candidateList.jobmanager.job_role }}</td>
                            <td>{{ candidateList.status }}</td>
                            <td class="media">
                              <img
                                v-if="candidateList.gender === 'male'"
                                class="avatar-lg rounded-circle img-thumbnail"
                                src="https://img2.pngio.com/men-profile-icon-png-image-free-download-searchpngcom-male-profile-png-715_657.png"
                                alt="Image description"
                              />

                              <img
                                v-else
                                class="avatar-lg rounded-circle img-thumbnail"
                                src="https://www.nicepng.com/png/full/52-521023_download-free-icon-female-vectors-blank-facebook-profile.png"
                                alt="Image description"
                              />
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- All tab end -->

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
  name: "Candidates",

  data() {
    return {
      candidateLists: null,
      onChangeStatus: false,
    };
  },

  mounted() {
    this.getCandidateLists();
  },

  methods: {
    getCandidateLists(tabValue) {
      this.onChangeStatus = true;
      axios
        .get("/get-candidate-lists", { params: { status: tabValue } })
        .then((response) => {
          this.candidateLists = response.data;
          this.onChangeStatus = false;
        })
        .catch((error) => {
          console.log(error);
          this.onChangeStatus = false;
        });
    },

    updateCandidateStatus(event, candidate_id) {
      let status_id = event.target.value;
      axios
        .get("/update-consultant-candidate", {
          params: { status: status_id, can_id: candidate_id },
        })
        .then((response) => {
          if (response.data.status === true) {
            toast({
              type: "success",
              title: response.data.message,
            });
            this.getCandidateLists();
          } else {
            toast({
              type: "warning",
              title: response.data.message,
            });
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
.color-white {
  color: white !important;
}
</style>