<template>
  <div>
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-11">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Consutant</h3>

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
                  <div class="col-12 table-responsive">
                    <table
                      id="example1"
                      class="table table-bordered table-hover table-striped"
                    >
                      <thead>
                        <tr>
                          <th>S.no</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Company Name</th>
                          <th>Company Size</th>
                          <th>Specialization</th>
                          <th>Location</th>
                          <th>Status/Agreement</th>
                          <th>Status</th>
                          <th>Agreement</th>
                          <th>Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr
                          v-for="(data, index) in consultantLists"
                          :key="data.id"
                        >
                          <td>{{ index + 1 }}</td>
                          <td>{{ data.first_name }}</td>
                          <td>{{ data.email }}</td>

                          <td>{{ data.mobile }}</td>
                          <td>{{ data.company_name }}</td>
                          <td>{{ data.company_size }}</td>
                          <td>{{ data.specialization }}</td>
                          <td>{{ data.company_location }}</td>
                          <td>
                            <span class="badge" :class="data.status === 'Deactive' ? 'badge-danger': 'badge-success'">{{ data.status }}</span>
                            <span class="badge" :class="data.agreement_verified === 'No' ? 'badge-danger': 'badge-success'">{{ data.agreement_verified }}</span>
                          </td>
                          <td>
                            <select
                              name="status"
                              @change="updateConsultantStatus($event, data.id)"
                            >
                              <option value="">--Select--</option>
                              <option
                                value="Deactive"
                                v-if="data.status === 'Active'"
                                :selected="data.status === 'Deactive'"
                              >
                                De-Active
                              </option>
                              <option
                                value="Active"
                                :selected="data.status === 'Active'"
                                v-else
                              >
                                Active
                              </option>
                            </select>
                          </td>
                          <td>
                            <select
                              name="status"
                              @change="
                                updateConsultantagreement($event, data.id)
                              "
                            >
                              <option value="">--Select--</option>

                              <option
                                value="No"
                                v-if="data.agreement_verified === 'Yes'"
                                :selected="data.agreement_verified === 'No'"
                              >
                                Not Verify
                              </option>
                              <option
                                value="Yes"
                                :selected="data.agreement_verified === 'Yes'"
                                v-else
                              >
                                Verify
                              </option>
                            </select>
                          </td>
                          <td><textarea
                              name="rem"
                              :id="'rem' +data.id"
                              required
                              placeholder="Remarks"
                              cols="5"
                              :value="data.remarks"
                              style="width: 150px"
                          >
                            </textarea>

                            <button
                                type="submit"
                                @click.prevent="
                                addRemarks(data.id)
                              "
                            >
                              Remarks
                            </button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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
  name: "AllConsultant",
  data() {
    return {
      consultantLists: null,
      onChangeStatus: false,
    };
  },
  mounted() {
    this.getConsultantLists();
  },
  computed: {
  },
  methods: {
    getConsultantLists() {
      axios
        .get("/allconsultant")
        .then((response) => {
          //console.log(response);
          this.consultantLists = response.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    addRemarks(cons_id){
      let remarks =document.getElementById('rem' +cons_id).value;

      axios
          .get("/update-remarks", {
            params: { add_remarks: remarks, consultant_id: cons_id},
          })
          .then((response) => {
            if (response.data.status === true) {
              toast({
                type: "success",
                title: response.data.message,
              });
              this.getConsultantLists();
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
    updateConsultantStatus(event, consultant_id) {
      let status_id = event.target.value;

      console.log(event.target.value);
      axios
        .get("/update-consultant-status", {
          params: { status: status_id, can_id: consultant_id },
        })
        .then((response) => {
          if (response.data.status === true) {
            toast({
              type: "success",
              title: response.data.message,
            });
            this.getConsultantLists();
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
    updateConsultantagreement(event, consultant_id) {
      let status_id = event.target.value;

      //console.log(event.target.value);
      axios
        .get("/update-consultant-agreement", {
          params: { status: status_id, can_id: consultant_id },
        })
        .then((response) => {
          if (response.data.status === true) {
            toast({
              type: "success",
              title: response.data.message,
            });
            this.getConsultantLists();
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
</style>