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
    <section class="top-adjust mt-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2>Job posted by employer</h2>
          </div>
        </div>

        <div class="row mt-4">
          <div
            class="col-sm-3 mb-2 d-grid"
            v-for="(job, index) in alldata.data"
            :key="index"
          >
            <div class="card job-card">
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
                    De-Active
                  </button>
                  <button
                    @click.prevent="activejob(job.id)"
                    class="btn btn-success"
                    v-if="job.status === 'Deactive'"
                    :disabled="status"
                  >
                    Active
                  </button>
                </div>
              </div>
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
    };
  },

  mounted() {
    this.getEmployerJob();
  },

  methods: {
    getEmployerJob(page = 1) {
      axios
        .get("/jobs-by-sessionuser", { params: { page: +page } })
        .then((response) => {
          this.alldata = response.data.data;
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
                swal.fire(
                  "Change status!",
                  "Your status has been changed.",
                  "success"
                );
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
                swal.fire(
                  "Change status!",
                  "Your status has been changed.",
                  "success"
                );
                this.status = false;
              }
              this.getEmployerJob();
            });
          }
        });
    },
  },
};
</script>

<style scoped>
.d-grid {
  display: grid;
}
</style>
