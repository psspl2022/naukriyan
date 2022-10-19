text/x-generic Managejobs.vue ( HTML document, ASCII text, with CRLF line terminators )
<template>
  <div id="accountexicutive">
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
                  <li class="active">Manage Job</li>
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
              <h2 class="hk-pg-title">Manage Job</h2>
              <div class="col-md-4 mt-3 ml-auto">
                <form action="" method="get">
                  <div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Search job"
                          v-model="jobSearchInput"
                        />
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <button
                          type="button"
                          class="btn btn-primary text-white"
                          @click.prevent="searchJob()"
                        >
                          {{ searchStatus ? "Searching..." : "Search" }}
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <table class="table custom-table mt-2" id="example1">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Expiry</th>
                      <th>Status</th>
                      <th>Application</th>
                      <th>Shortlist</th>
                      <th>Interview</th>
                      <th>Offer</th>
                      <th>Save For Future</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody :class="loading ? 'response-loader' : ''">
                    <img src="default_images/ajax-loader.gif" v-if="loading" />
                    <tr v-for="job in jobsBySession.data" :key="job.id">
                      <td>{{ job.title }}</td>
                      <td>{{ job.last_apply_date }}</td>
                      <td>
                        <span
                          class="badge badge-success"
                          v-if="job.status === 'Active'"
                          >{{ job.status }}</span
                        >
                        <span
                          class="badge badge-danger"
                          v-if="job.status === 'Deactive'"
                          >{{ job.status }}</span
                        >
                      </td>
                      <td :id="'app' + job.id">{{ application(job.id) }}</td>
                      <td :id="'shortlist' + job.id">
                        {{ shortlist(job.id) }}
                      </td>
                      <td :id="'interview' + job.id">
                        {{ interview(job.id) }}
                      </td>
                      <td :id="'offer' + job.id">{{ offer(job.id) }}</td>
                      <td :id="'save' + job.id">{{ save(job.id) }}</td>
                      <td>
                        <router-link :to="`/jobapplication/${job.id}`">
                          <a href="" class="btn btn-sm btn-primary text-white"
                            ><i class="fa fa-eye"></i
                          ></a>
                        </router-link>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div class="pagination-links">
                  <pagination
                    :data="jobsBySession"
                    @pagination-change-page="getJobsBySessionUser"
                  ></pagination>
                </div>
              </div>
            </div>
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
  name: "Managejobs",
  data() {
    return {
      jobSearchInput: "",
      total_application: "",
      jobsBySession: [],
      loading: false,
      searchStatus: false,
    };
  },
  mounted() {
    this.getJobsBySessionUser();
  },

  methods: {
    searchJob(page = 1) {
      let jobTxt = this.jobSearchInput;
      this.searchStatus = true;
      this.loading = true;
      // console.log(jobTxt);
      axios
        .get("/jobs-by-sessionuser", {
          params: { page: +page, jobTitle: jobTxt },
        })
        .then((response) => {
          this.jobsBySession = response.data.data;
          this.searchStatus = false;
          this.loading = false;
        })
        .catch((error) => {
          console.log("Error");
          this.loading = false;
        });
    },
    getJobsBySessionUser(page = 1, jobSearchInput = this.jobSearchInput) {
      this.loading = true;
      axios
        .get("/jobs-by-sessionuser", {
          params: { page: +page, jobTitle: jobSearchInput },
        })
        .then((response) => {
          this.loading = false;
          this.jobsBySession = response.data.data;
        })
        .catch((error) => {
          console.log("Error");
          this.loading = false;
        });
    },

    application(id) {
      let tag_content = "";
      axios.get("count-applyjob/" + id).then((response) => {
        tag_content += response.data;
        var td = "app" + id;
        document.getElementById(td).innerHTML = tag_content;
      });
    },

    shortlist(id) {
      let tag_content = "";
      axios.get("count-shortlist/" + id).then((response) => {
        tag_content += response.data;
        var td = "shortlist" + id;
        document.getElementById(td).innerHTML = tag_content;
      });
      return tag_content;
    },

    interview(id) {
      let tag_content = "";
      axios.get("count-interview/" + id).then((response) => {
        //this.loading = false;
        tag_content += response.data;
        var td = "interview" + id;
        document.getElementById(td).innerHTML = tag_content;
      });
      return tag_content;
    },

    offer(id) {
      let tag_content = "";
      axios.get("count-offer/" + id).then((response) => {
        tag_content += response.data;
        var td = "offer" + id;
        document.getElementById(td).innerHTML = tag_content;
      });
      return tag_content;
    },

    save(id) {
      let tag_content = "";
      axios.get("count-save/" + id).then((response) => {
        tag_content += response.data;
        var td = "save" + id;
        document.getElementById(td).innerHTML = tag_content;
      });
      return tag_content;
    },
  },
};
</script>

<style scoped>
.response-loader {
  opacity: 0.6;
  margin-left: auto;
  margin-right: auto;
  background-color: white;
  position: relative;
}
.response-loader img {
  position: fixed;
  top: 45%;
  left: 50%;
  width: 40px;
}
</style>
