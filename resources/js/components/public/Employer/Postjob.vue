<template>
  <div id="postjob">
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
                  <li class="active">Post Job</li>
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
              <h2 class="hk-pg-title">Job Posted</h2>
              <div>
                <label
                  >Search (Title / Status / Client Name)
                  <input
                    type="text"
                    name="example1_length"
                    aria-controls="example1"
                    placeholder="Search here Title,Status,Client Name....."
                    v-model="keyword"
                    @keyup="getEmployerJob"
                    class="form-control form-control-sm"
                  />
                </label>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="cms-pg-header">
              <pagination
                :data="alldata"
                @pagination-change-page="getEmployerJob"
              ></pagination>
              <div class="dataTables_length" id="example1_length">
                <img
                  v-if="searchStatus"
                  src="https://i.gifer.com/ZZ5H.gif"
                  alt="Loder"
                  style="position: fixed; right: 50%; z-index: 999999999"
                  height="100"
                  width="100"
                />
              </div>
            </div>
          </div>

          <div class="col-sm-12">
            <b>Showing :</b>
            {{ countData.from ? countData.from : 0 }} –
            {{ countData.to ? countData.to : 0 }} of
            {{ countData.total ? countData.total : 0 }} Jobs.
          </div>
        </div>

        <div class="row mt-4">
          <div
            class="col-sm-3 mb-2 d-grid"
            v-for="(job, index) in alldata.data"
            :key="index"
          >
            <div class="card job-card">
              <div>
                <span
                  class="badge badge-pill badge-success"
                  v-if="job.status === 'Active'"
                  >Current Status :{{ job.status }}</span
                >
                <span
                  class="badge badge-pill badge-danger"
                  v-if="job.status === 'Deactive'"
                  >Current Status : {{ job.status }}</span
                >
              </div>
              <div class="card-body">
                <div class="card-block">
                  <router-link :to="`/editpostjob/${job.id}`">
                    <h4 class="card-title">{{ job.title }}</h4>
                  </router-link>
                  <p class="card-text">{{ job.job_exp }}</p>
                  <p class="card-text">
                    <small class="text-muted">{{
                      job.last_apply_date | timeformat
                    }}</small>
                  </p>
                  <button
                    @click.prevent="deactivejob(job.id)"
                    class="btn btn-danger"
                    v-if="job.status === 'Active'"
                    :disabled="status"
                  >
                    Deactivate
                  </button>
                  <button
                    @click.prevent="activejob(job.id)"
                    class="btn btn-success"
                    v-if="job.status === 'Deactive'"
                    :disabled="status"
                  >
                    Activate
                  </button>
                </div>
              </div>
            </div>
            <div>
              <span class="badge badge-pill badge-info"
                >Client name :{{ job.name ? job.name : "Not Specify" }}</span
              >
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-12">
            <pagination
              :data="alldata"
              @pagination-change-page="getEmployerJob"
            ></pagination>
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
  name: "Postjob",
  data() {
    return {
      alldata: [],
      status: false,
      sort: "",
      countData: "",
      keyword: "",
      searchStatus: false,
    };
  },
  // computed() {
  //   this.getEmployerJob();
  // },
  mounted() {
    this.getEmployerJob();
  },

  methods: {
    getEmployerJob(page = 1) {
      this.searchStatus = true;
      axios
        .get("jobs-by-sessionuser?&keyword=" + this.keyword + "&page=" + page)
        .then((response) => {
          this.alldata = response.data.data;
          this.countData = response.data.data;
          this.searchStatus = false;
        })
        .catch((error) => {
          console.log("Error: something went wrong.");
        });
    },

    deactivejob(id) {
      var uri = "/deactive-jobme/" + id;
      swal
        .fire({
          title: "Are you sure want to change?",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            this.status = true;
            axios.get(uri).then((response) => {
              if (response.status == 200) {
                swal.fire("Change status!", "Your status has been changed.", "success");
                this.status = false;
              }
              this.getEmployerJob();
            });
          }
        });
    },

    activejob(id) {
      var uri = "/active-jobme/" + id;
      swal
        .fire({
          title: "Are you sure want to change?",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, change it!",
        })
        .then((result) => {
          if (result.value) {
            this.status = true;
            axios.get(uri).then((response) => {
              if (response.status == 200) {
                swal.fire("Change status!", "Your status has been changed.", "success");
                this.status = false;
              }
              this.getEmployerJob();
            });
          }
        });
    },
    created() {
      //this.getEmployerJob();
    },
  },
};
</script>

<style scoped>
.d-grid {
  display: grid;
}
</style>
