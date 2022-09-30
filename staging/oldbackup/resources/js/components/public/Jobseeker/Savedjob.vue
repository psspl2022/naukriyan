<template>
  <div id="savedjob">
    <jobseeker-header></jobseeker-header>
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
                  <li><a href="#">Jobseeker Dashboard</a></li>
                  <li class="active">Saved Job</li>
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
    <section class="mt-3 mb-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="interview">
              <h2 class="interview">Saved Job</h2>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover custom-table">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Title</th>
                      <th>Company</th>
                      <th>Location</th>
                      <th>Job Type</th>
                      <th>Experience</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(saved, index) in alldata" :key="saved.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ saved.title }}</td>
                      <td>{{ saved.company_name }}</td>
                      <td>{{ saved.job_exp }}</td>
                      <td>{{ saved.job_type }}</td>
                      <td>{{ saved.main_exp }} Yr - {{ saved.max_exp }} Yr</td>
                      <td>
                        <a
                          href="#"
                          data-toggle="modal"
                          :data-id="saved.id"
                          data-target=".mdupdate"
                          @click="openmd(saved.id)"
                          class="btn btn-primary border-orange text-white btn-block"
                          >Apply Job</a
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <main-footer></main-footer>

    <!-- The Modal Apply Job -->
    <div class="modal fade popupForm mdupdate" id="apply">
      <div class="modal-dialog">
        <div class="modal-content">
          <form role="form" method="post" @submit.prevent="ApplyJob(demo.id)">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Confirmation before Apply?</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p>
                      Job Title :- <strong>{{ demo.title }}</strong>
                    </p>
                  </div>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p>
                      Location :- <strong>{{ demo.location }}</strong>
                    </p>
                  </div>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p>
                      Company Name :- <strong>{{ demo.company_name }}</strong>
                    </p>
                  </div>
                </div>
              </div>
              <fieldset class="pl-2 pr-2 mb-3">
                <legend class="fs-15">
                  <b
                    >Do you have any of the relevant or Equivalent Qualification
                    ? ({{ demo.qualification }})</b
                  >
                </legend>
                <div class="form-group row mb-0">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="radio-inline">
                        <input type="radio" name="rel_qualification" /> Yes
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="rel_qualification" checked />
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="pl-2 pr-2 mb-3">
                <legend class="fs-15">
                  <b
                    >Do you have relevant experience of this job ?({{
                      demo.min_exp
                    }}Yr - {{ demo.max_exp }} Yr)</b
                  >
                </legend>
                <div class="form-group row mb-0">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="radio-inline">
                        <input type="radio" name="rel_exp" /> Yes
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="rel_exp" checked /> No
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <fieldset class="pl-2 pr-2 mb-3">
                <legend class="fs-15">
                  <b
                    >Do you have relevant skill for this job ?({{
                      demo.job_skill
                    }})</b
                  >
                </legend>
                <div class="form-group row mb-0">
                  <div class="col-sm-12">
                    <label class="radio-inline">
                      <input type="radio" name="rel_skill" /> Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="rel_skill" checked /> No
                    </label>
                  </div>
                </div>
              </fieldset>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary">
                {{ applyJobStatus ? "Applying..." : "Confirm Apply" }}
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Savedjob",
  data() {
    return {
      applyJobStatus: false,
      alldata: [],
      demo: new Form({
        id: "",
        title: "",
        location: "",
        qualification: "",
        min_exp: "",
        max_exp: "",
        job_skill: "",
        company_name: "",
      }),
    };
  },

  methods: {
    getSavedJobs() {
      axios.get("/get-saved-job").then((response) => {
        this.alldata = response.data.data;
      });
    },

    openmd: function (id) {
      axios.get("/get-applyjobdata/" + id).then((response) => {
        this.demo.id = response.data[0].id;
        this.demo.title = response.data[0].title;
        this.demo.location = response.data[0].job_exp;
        this.demo.qualification = response.data[0].qualification;
        this.demo.min_exp = response.data[0].main_exp;
        this.demo.max_exp = response.data[0].max_exp;
        this.demo.job_skill = response.data[0].job_skills;
        this.demo.company_name = response.data[0].company_name;
      });
    },

    ApplyJob: function (id) {
      this.applyJobStatus = true;
      this.demo
        .post("/apply-job/" + id)
        .then((response) => {
          this.applyJobStatus = false;
          this.getSavedJobs();
          toast({
            type: "success",
            title: "Job Apply Successfully",
          });
        })
        .catch((error) => {
          toast({
            type: "warning",
            title: "Something went wrong",
          });
          this.applyJobStatus = false;
        });
    },
  },
  created() {
    this.getSavedJobs();
  },
};
</script>

<style scoped>
</style>
