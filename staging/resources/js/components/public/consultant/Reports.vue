<template>
  <div id="Reports">
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
                  <li class="active">Consultant Report</li>
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
          <div class="col-sm-12">
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
                      class="nav-link fs-12"
                      data-toggle="tab"
                      href="#tabData"
                      v-on:click="getCandidateLists((tabValue = 'cv uploaded'))"
                      >CV Uploaded</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link fs-12 border-right-0"
                      data-toggle="tab"
                      href="#tabData"
                      v-on:click="
                        getCandidateLists((tabValue = 'screening pending'))
                      "
                      >Screened In pending</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link fs-12 border-right-0"
                      data-toggle="tab"
                      href="#tabData"
                      v-on:click="
                        getCandidateLists((tabValue = 'screening rejected'))
                      "
                      >Screened In Rejected</a
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
                      v-on:click="getCandidateLists((tabValue = 'interview'))"
                      >Interviews</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link fs-12 border-right-0"
                      data-toggle="tab"
                      href="#tabData"
                      v-on:click="getCandidateLists((tabValue = 'offer'))"
                      >Offers</a
                    >
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
  name: "Reports",
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
        .get("/get-candidate-report", { params: { status: tabValue } })
        .then((response) => {
          this.candidateLists = response.data;
          this.onChangeStatus = false;
        })
        .catch((error) => {
          console.log(error);
          this.onChangeStatus = false;
        });
    },
  },
};
</script>

<style scoped>
</style>
