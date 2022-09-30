<template>
  <div id="changerecruitmentstatus">
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-11">
          <div class="card">
            <div class="card-header card bg-primary text-white">
              <h3 class="card-title">Modify Status</h3>

              <div class="card-tools">
                <!-- <button class="btn btn-primary">
                                    <router-link to="/add-jobs" style="color:#fff"> Add Jobs</router-link>
                                </button> -->
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div
                      class="card-header card bg-success text-white"
                      style="cursor: pointer"
                      data-toggle="collapse"
                      data-target="#demo"
                    >
                      <h3 class="card-title">1.Employer Job details</h3>
                    </div>

                    <table
                      id="example1"
                      class="table table-bordered table-hover dt-responsive table-striped"
                    >
                      <thead id="" class="">
                        <tr>
                          <th>Company Name</th>
                          <td>{{ empDetails.companies.company_name }}</td>
                          <th>Title</th>
                          <td>{{ empDetails.title }}</td>
                          <th>Job Role</th>
                          <td>{{ empDetails.job_role }}</td>
                        </tr>
                        <tr>
                          <th>Industry</th>
                          <td>
                            {{ empDetails.allusers.industry.category_name }}
                          </td>
                          <th>Experience</th>
                          <td>
                            {{ empDetails.main_exp }} - {{ empDetails.max_exp }}
                          </td>
                          <th>Skills</th>
                          <td>{{ empDetails.job_skills }}</td>
                        </tr>

                        <tr>
                          <th>Total Vacancy</th>
                          <td>{{ empDetails.job_vaccancy }}</td>
                          <th>Assigned Vacancy</th>
                          <td v-if="AssignedVaccany.assigned_vaccancy != ''">{{ AssignedVaccany.assigned_vaccancy.total_assigned }}</td>
                          <th>Remaining Vacancy</th>
                          <td>{{ AssignedVaccany.remaining_vaccany }}</td>
                        </tr>
                        <tr>
                          <th>Description</th>
                          <td>{{ empDetails.description }}</td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Consultant List Table 2 -->
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div class="card-header card bg-success text-white">
                      <h3 class="card-title">2.Candidate Details</h3>
                    </div>
                    <table
                      id="example1"
                      class="table table-bordered table-hover dt-responsive table-striped"
                    >
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Modify Status</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact</th>
                          <th>Gender</th>
                          <th>Resume</th>
                          <th>Register For(Consultant ID)</th>
                          <th>Job Title/Position</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="(can_data, index) in candidateLists"
                          :key="can_data.id"
                        >
                          <td>
                            {{ index + 1 }}
                          </td>
                          <td>
                            <select
                              v-on:change.prevent="
                                updateCandidateStatus($event, can_data.id)
                              "
                            >
                              <option value="">Choose Status</option>
                              <option
                                value="pending"
                                :selected="can_data.status === 'pending'"
                              >
                                Pending
                              </option>
                              <option
                                value="interview"
                                :selected="can_data.status === 'interview'"
                              >
                                Interview
                              </option>
                              <option
                                value="shortlisted"
                                :selected="can_data.status === 'shortlisted'"
                              >
                                Shortlisted
                              </option>
                              <option
                                value="offer"
                                :selected="can_data.status === 'offer'"
                              >
                                Offer
                              </option>
                              <option
                                value="joined"
                                :selected="can_data.status === 'joined'"
                              >
                                Joined
                              </option>
                              <option
                                value="offer rejected"
                                :selected="can_data.status === 'offer rejected'"
                              >
                                Offer Rejected
                              </option>
                              <option
                                value="cv rejected"
                                :selected="can_data.status === 'cv rejected'"
                              >
                                CV Rejected
                              </option>
                              <option
                                value="interview schedule"
                                :selected="
                                  can_data.status === 'interview schedule'
                                "
                              >
                                Interview Scheduled
                              </option>
                              <option
                                value="screening pending"
                                :selected="
                                  can_data.status === 'screening pending'
                                "
                              >
                                Screening Pending
                              </option>
                              <option
                                value="screening rejected"
                                :selected="
                                  can_data.status === 'screening rejected'
                                "
                              >
                                Screening Rejected
                              </option>
                              <option
                                value="backout after join"
                                :selected="
                                  can_data.status === 'backout after join'
                                "
                              >
                                BackOut after joined
                              </option>
                            </select>
                          </td>

                          <td>{{ can_data.name }}</td>
                          <td>{{ can_data.email }}</td>
                          <td>
                            {{ can_data.mobile }}
                          </td>
                          <td>{{ can_data.gender }}</td>
                          <td>
                            {{ can_data.resume_url }}
                            <i
                              class="fa fa-download"
                              aria-hidden="true"
                              @click.prevent="download(can_data.resume_url)"
                            ></i>
                          </td>
                          <td>{{ can_data.consultant.unique_id }}</td>
                          <td>
                            {{ empDetails.title }}/{{ empDetails.job_role }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- Consultant List Close -->

            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
  name: "ChangeRecruitmentStatus",
  data() {
    return {
      job_id: this.$route.params.recjobid,
      empDetails: null,
      consultantLists: null,
      candidateLists: null,
      AssignedconsultantLists: null,
      input_vaccancy: null,
      AssignedVaccany: null,
    };
  },

  mounted() {
    axios.get("/get-emp-details/" + this.job_id).then((response) => {
      this.empDetails = response.data;
    });
    this.getConsultantLists();
    this.getAssignedConsultantLists();
    this.getAssignedVaccany();
    this.getCandidateLists();
  },

  computed: {},

  methods: {
    updateCandidateStatus(event, candidate_id) {
      let status_id = event.target.value;
      axios
        .get("/update-candidate-status", {
          params: {
            status: status_id,
            can_id: candidate_id,
            job_manager_id: this.job_id,
          },
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
    download(resume_name) {
      axios.get("/download-resume", {
        params: { name: resume_name },
      });
    },
    getCandidateLists() {
      axios
        .get("/only-candidate-list/" + this.job_id)
        .then((response) => {
          this.candidateLists = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getConsultantLists() {
      axios
        .get("/only-verified-consultant/" + this.job_id)
        .then((response) => {
          this.consultantLists = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getAssignedConsultantLists() {
      axios
        .get("/verified-consultant-list-assigned/" + this.job_id)
        .then((response) => {
          this.AssignedconsultantLists = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getAssignedVaccany() {
      axios
        .get("/get-remaining-vaccancy/" + this.job_id)
        .then((response) => {
          this.AssignedVaccany = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    assignJob(job_id, cons_id) {
      let input_vaccancy = document.getElementById("input_vaccancy").value;
      if (input_vaccancy == "") {
        toast({
          type: "warning",
          title: "Please Input vaccany",
        });
      } else {
        axios
          .get("/assign-job-consultant", {
            params: {
              cons_job_id: job_id,
              cons_id: cons_id,
              inp_vac: input_vaccancy,
            },
          })
          .then((response) => {
            if (response.status === 200 && response.data.status === "success") {
              toast({
                type: "success",
                title: response.data.message,
              });
              this.getConsultantLists();
              this.getAssignedConsultantLists();
              this.getAssignedVaccany();
            } else if (
              response.status === 201 &&
              response.data.status === "error"
            ) {
              toast({
                type: "error",
                title: response.data.message,
              });
            } else {
              toast({
                type: "error",
                title: "Something went wrong. Please try again",
              });
            }
          })
          .catch(() => {});
      }
    },
  },
};
</script>

<style scoped>
#input_vaccancy {
  width: 100px;
}
</style>