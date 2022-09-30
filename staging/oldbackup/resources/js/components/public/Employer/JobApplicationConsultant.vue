<template>
  <div id="jobapplicationconsultant">
    <Emp-header></Emp-header>
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
                  <li><a href="#">Employer Dashboard</a></li>
                  <li class="active">Job Application Consultant</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line"> <i class="fa fa-headphones mr-1 Phone is-animating"
                                        aria-hidden="true"></i> <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411
                                        </a>  </p>
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
              <h2 class="hk-pg-title">Job Application</h2>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <ul class="nav nav-tabs nav-fill">
                      <li class="nav-item">
                        <a class="nav-link active fs-12" data-toggle="tab" href="#All" v-on:click="getCandidateLists((tabValue = ''))">All</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-12 border-right-0" data-toggle="tab" href="#tabData" v-on:click="getCandidateLists((tabValue = 'new candidate'))">New Candidate</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-12 border-right-0" data-toggle="tab" href="#tabData" v-on:click="getCandidateLists((tabValue = 'shortlisted'))">Shortlisted</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-12 border-right-0" data-toggle="tab" href="#tabData" v-on:click="getCandidateLists((tabValue = 'rejected'))">Rejected</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-12 border-right-0" data-toggle="tab" href="#tabData" v-on:click="getCandidateLists((tabValue = 'interview'))">Interview Scheduled</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-12 border-right-0" data-toggle="tab" href="#tabData" v-on:click="getCandidateLists((tabValue = 'offer'))">Offer</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link fs-12 border-right-0" data-toggle="tab" href="#tabData" v-on:click="getCandidateLists((tabValue = 'joining'))">Joining</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="tab-content">

                  <!-- all tab start -->
                  <div id="tabData" class="tab-pane fade show active">
                    <p v-if="onChangeStatus" class="mt-3 text-center">
                      <strong>Loading...</strong>
                    </p>
                    <div class="table-responsive custom-height" v-else>
                      <table id="example1" class="table custom-table mt-2">
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Gender</th>
                          <th>Resume</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr v-for="candidateList in candidateLists" :key="candidateList.id">
                            <td>{{ candidateList.name }}</td>
                            <td>{{ candidateList.email }}</td>
                            <td>{{ candidateList.mobile }}</td>
                            <td>{{ candidateList.gender }}</td>
                            <td>{{ candidateList.resume_url }}</td>
                            <td>{{ candidateList.status }}</td>
                            <td>
                              <select v-on:change.prevent="updateCandidateStatus($event , candidateList.id)">
                                <option value="">Choose Status</option>
                                <option value="pending">Pending</option>
                                <option value="interview">Interview</option>
                                <option value="shortlisted">Shortlisted</option>
                                <option value="offer">Offer</option>
                                <option value="joined">Joined</option>
                                <option value="offer rejected">Offer Rejected</option>
                                <option value="cv rejected">CV Rejected</option>
                                <option value="interview schedule">Interview Scheduled</option>
                                <option value="screening pending">Screening Pending</option>
                                <option value="screening rejected">Screening Rejected</option>
                                <option value="backout after join">BackOut after joined</option>
                              </select>
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
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>

    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "JobApplicationConsultant",

  data() {
    return {
      job_id: this.$route.params.postid,
      candidateLists: null,
      onChangeStatus: false
    }
  },

  mounted() {
    this.getCandidateLists();
  },
  methods: {
    getCandidateLists(tabValue) {
      this.onChangeStatus = true;
      axios
          .get("/consultant-job-application/" +this.job_id+ "/" +tabValue)
          .then((response) => {
            
            this.candidateLists = response.data;
            this.onChangeStatus = false;
          })
          .catch((error) => {
            
            this.onChangeStatus = false;
          });
    },

    updateCandidateStatus(event, candidate_id) {
      let status_id = event.target.value;
      axios
          .get("/update-consultant-candidate", {
            params: { status: status_id, can_id: candidate_id, job_manager_id: this.job_id },
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
  }
};
</script>

<style scoped>
</style>