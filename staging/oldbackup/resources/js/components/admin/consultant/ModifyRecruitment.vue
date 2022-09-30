<template>
  <div>
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-11">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Modify Recruitment</h3>

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
                    <table
                      id="example1"
                      class="table table-bordered table-hover dt-responsive table-striped"
                    >
                      <thead>
                        <tr>
                          <th>S.no</th>
                          <th>Modify Recruitment Status</th>
                          <th>Company name</th>
                          <th>Title</th>
                          <th>job Role</th>
                          <th>Openings</th>
                          <th>Experience</th>
                          <th>Address</th>
                          <th>Skills</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(data, index) in alldata" :key="data.id">
                          <td>{{ index + 1 }}</td>
                          <td>
                            <router-link :to="`/change-recruit-status/${data.id}`"><i
                              class="fa fa-edit"
                              aria-hidden="true"
                              
                            ></i>
                            </router-link>
                            
                          </td>
                          <td>{{ data.companies.company_name }}</td>
                          <td>{{ data.title }}</td>
                          <td>{{ data.job_role }}</td>
                          <td>{{ data.job_vaccancy }}</td>
                          <td>{{ data.job_exp }}</td>
                          <td>{{ data.job_address }}</td>
                          <td>{{ data.job_skills }}</td>
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
  name: "ConsultantJobs",
  data() {
    return {
      consultantLists: null,
      
    };
  },

  mounted() {
    this.$store.dispatch("getAllData", "/jobsconsultant");
    
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
  },
  methods:{
    
  }
};
</script>

<style scoped>
</style>