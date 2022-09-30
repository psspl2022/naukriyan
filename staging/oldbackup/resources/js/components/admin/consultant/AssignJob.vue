<template>
  <div id="assignjob">
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-11">
          <div class="card">
            <div class="card-header card bg-primary text-white">
              <h3 class="card-title">Assign Job Details</h3>

              <div class="card-tools">
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
                      <thead id="demo" class="collapse">
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
                          <th>Total Openings</th>
                          <td>{{ empDetails.job_vaccancy }}</td>
                          <th>Assigned Openings</th>
                          <td
                            v-if="
                              AssignedVaccany.assigned_vaccancy.total_assigned
                            "
                          >
                            {{
                              AssignedVaccany.assigned_vaccancy.total_assigned
                            }}
                          </td>
                          <td v-else>0</td>
                          <th>Remaining Openings</th>
                          <td>{{ AssignedVaccany.remaining_vaccany }}</td>
                        </tr>
                        <tr aria-colspan="6">
                          <th>Description</th>
                          <td colspan="5">{{ empDetails.description }}</td>
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
                      <h3 class="card-title">
                        2.Consultant Details(Only Assigned Consultant)
                      </h3>
                    </div>
                    <div class="table-responsive">
                      <table
                        id="example1"
                        class="table table-bordered table-hover dt-responsive table-striped"
                      >
                        <thead>
                          <tr>
                            <th>No. of vaccany Assigned/Percentage</th>
                            <th>Consultant ID</th>
                            <th>Company Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Specialization</th>
                            <th>Job Profile</th>
                            <th>Industry</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="data in AssignedconsultantLists"
                            :key="data.id"
                          >
                            <td>
                              {{ data.assigned_no_of_vaccancy }} /
                              {{
                                data.percentage ? data.percentage + "%" : "N/a"
                              }}
                            </td>

                            <td>{{ data.consultant.unique_id }}</td>
                            <td>{{ data.consultant.company_name }}</td>
                            <td>
                              {{ data.consultant.first_name }}
                              {{ data.consultant.last_name }}
                            </td>
                            <td>{{ data.consultant.email }}</td>
                            <td>{{ data.consultant.mobile }}</td>
                            <td>{{ data.consultant.specialization }}</td>
                            <td>
                              {{ data.consultant.job_profile.job_sector }}
                            </td>
                            <td>
                              {{ data.consultant.industries.category_name }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Consultant List Close -->

            <!-- Consultant List Table 3 -->
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div class="card-header card bg-success text-white">
                      <h3 class="card-title">
                        3.All Consultant List(Which are not assigned any
                        vaccancy)
                      </h3>
                    </div>
                    <div class="table-responsive">
                      <table
                        id="example1"
                        class="table table-bordered table-hover dt-responsive table-striped"
                      >
                        <thead>
                          <tr>
                            <th>Vaccany</th>
                            <th>Consultant ID</th>
                            <th>Company Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Specialization</th>
                            <th>Job Profile</th>
                            <th>Industry</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="data in consultantLists" :key="data.id">
                            <td>
                              <input
                                name="input_vaccancy"
                                :id="'input_vaccancy' + data.consultant.id"
                                type="number"
                                required
                                placeholder="Input Vacancy"
                                size="5"
                                min="0"
                              />
                              <input
                                name="input_percentage"
                                :id="'input_percentage' + data.consultant.id"
                                type="number"
                                required
                                placeholder="Input percentage"
                                size="5"
                                min="0"
                              />
                              <button
                                type="submit"
                                @click.prevent="
                                  assignJob(job_id, data.consultant.id)
                                "
                              >
                                Assign
                              </button>
                            </td>

                            <td>{{ data.consultant.unique_id }}</td>
                            <td>{{ data.consultant.company_name }}</td>
                            <td>
                              {{ data.consultant.first_name }}
                              {{ data.consultant.last_name }}
                            </td>
                            <td>{{ data.consultant.email }}</td>
                            <td>{{ data.consultant.mobile }}</td>
                            <td>{{ data.consultant.specialization }}</td>
                            <td>
                              {{ data.consultant.job_profile.job_sector }}
                            </td>
                            <td>
                              {{ data.consultant.industries.category_name }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Consultant List Close table 3 -->
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
  name: "AssignJob",
  data() {
    return {
      job_id: this.$route.params.jobid,
      empDetails: null,
      consultantLists: {},
      AssignedconsultantLists: {},
      input_vaccancy: null,
      input_percentage: null,
      AssignedVaccany: {},
    };
  },

  mounted() {
    axios.get("/get-emp-details/" + this.job_id).then((response) => {
      this.empDetails = response.data;
    });
    this.getConsultantLists();
    this.getAssignedConsultantLists();
    this.getAssignedVaccany();
  },

  methods: {
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
      let input_vaccancy = document.getElementById("input_vaccancy" + cons_id)
        .value;
      let input_percentage = document.getElementById(
        "input_percentage" + cons_id
      ).value;
      if (input_vaccancy === "") {
        toast({
          type: "warning",
          title: "Please Input vaccany",
        });
      } else if (input_percentage === "") {
        toast({
          type: "warning",
          title: "Please Input Percentage",
        });
      } else {
        axios
          .get("/assign-job-consultant", {
            params: {
              cons_job_id: job_id,
              cons_id: cons_id,
              inp_vac: input_vaccancy,
              inp_per: input_percentage,
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

#input_percentage {
  width: 100px;
}
</style>