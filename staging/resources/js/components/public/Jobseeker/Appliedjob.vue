<template>
  <div id="appliedjob">
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
                  <li class="active">Applied Job</li>
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
    <section class="top-adjust section pb-5 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-body">
                <div class="interview">
                  <div class="row">
                    <div class="col-sm-6">
                       <h2 class="interview">Applied Job</h2>
                    </div>
                 
                  <div class="col-sm-3 ml-auto">
                   <div class="d-flex">
                      <input style="border-radius:0;"
                              name="q"
                              type="text"
                              id="txtgoingto"
                              placeholder="Search Keyword"
                              class="form-control mb-0 ui-autocomplete-input"
                              autocomplete="off"
                              v-model="search"
                            /><i class="fa fa-search searchButton"></i>
                   </div>
                  </div>
                   </div>         
                </div>
                <table class="table table-hover custom-table" id="example1">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Application ID</th>
                      <th>Jobs Title</th>
                      <th>Company Name</th>
                      <th>Applied Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr :key="applied.id" v-for="(applied, index) in alldata">
                      <td>{{ index + 1 }}</td>
                      <td>{{ applied.application_id }}</td>
                      <td>{{ applied.title }}</td>
                      <td>{{ applied.company_name }}</td>
                      <td>{{ applied.created_at }}</td>
                      <td v-if="applied.status === 1">Applied</td>
                      <td v-if="applied.status === 2">Interview Scheduled</td>
                      <td v-if="applied.status === 3">Shortlisted</td>
                      <td v-if="applied.status === 4">Rejected</td>
                      <td v-if="applied.status === 5">Offer Letter</td>
                      <td v-if="applied.status === 6">Joining</td>
                      <td v-if="applied.status === 7">Backout after joining</td>
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
  </div>
</template>

<script>
export default {
  name: "Appliedjob",
  data() {
    return {
      loading: false,
    };
  },

  mounted() {
    this.$store.dispatch("getAllData", "/jobseeker-apply-job");
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
  },
  methods: {},
};
</script>

<style scoped>
.searchButton{
     width: 40px;
    height: 36px;
    /* border: 1px solid #00B4CC; */
    background: #ccc;
    text-align: center;
    color: #727272;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
    line-height: 1.8;
}

</style>
