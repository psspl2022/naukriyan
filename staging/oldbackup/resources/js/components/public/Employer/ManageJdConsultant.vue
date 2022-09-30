<template>
  <div id="managejdconsultant">
    <Emp-header></Emp-header>

    <section>
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Manage JD Consultant</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i>
                  <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411 </a>
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
            <div class="cms-pg-header">
              <h2 class="hk-pg-title">Manage JD Consultant</h2>
              <!-- <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addQuestionnaires"><i class="fas fa-plus mr-2"></i>Add Questionnaires</a> -->
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="tab-content">
                  <!-- consultant tab start -->

                  <div id="Cons" class="tab-pane fade show active">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-2">
                        <thead>
                          <tr>
                            <th>Position Title</th>
                            <th>Job Role</th>
                            <th>Expiry</th>
                            <th>Assigned(Yes/No)</th>
                            <th>status</th>
                            <th>Application</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="post in posts" :key="post.id">
                            <td>{{ post.title }}</td>
                            <td>{{ post.job_role }}</td>
                            <td>{{ post.last_apply_date }}</td>
                            <td>
                              <span
                                class="badge badge-success"
                                v-if="
                                  post.consultant_job.length > 0 &&
                                  post.consultant_job[0].assigned === 'Yes'
                                "
                                >Yes</span
                              >
                              <span class="badge badge-danger" v-else>No</span>
                            </td>
                            <td>
                              <span
                                class="badge badge-success"
                                v-if="post.status === 'Active'"
                                >Active</span
                              >
                              <span class="badge badge-danger" v-else
                                >De-Active</span
                              >
                            </td>
                            <td class="text-danger">
                              <router-link
                                :to="`/jobapplication-consultant/${post.id}`"
                              >
                                <a
                                  href=""
                                  class="btn btn-sm btn-primary text-white"
                                >
                                  {{
                                    post.consultant_candidates.length
                                  }}
                                  Application
                                </a>
                              </router-link>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- consultant tab end -->
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
  name: "ManageJdConsultant",
  data() {
    //let now = new Date()
    return {
      posts: null,
    };
  },
  created() {
    this.getConsultantJobs();
  },
  methods: {
    getConsultantJobs() {
      axios.get("/consultant-job-session").then((response) => {
        if (response.data) {
          this.posts = response.data;
        }
      });
    },
  },
};
</script>

<style scoped>
</style>