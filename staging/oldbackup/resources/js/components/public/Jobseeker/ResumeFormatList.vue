<template>
  <div id="companyfollowing">
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
                  <li class="active">Resume Format List</li>
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
              <h2 class="hk-pg-title">Resume Format List</h2>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <table class="table table-head-fixed custom-table mt-2">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact No.</th>
                      <th>Sample Format</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>{{ user.fname }} {{ user.lname }}</td>
                      <td>{{ user.email }}</td>
                      <td>{{ user.contact }}</td>
                      <td>
                        <router-link :to="`/resume-sample-1`"
                          ><button type="button" class="btn btn-info">
                            View
                          </button></router-link
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
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
  name: "ResumeFormatList",
  data() {
    return {
      user: {},
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/follow-list");
    axios.get("user-info").then((response) => {
      this.user = response.data.userInfo;
    });
  },
  computed: {
    allIndustry() {
      return this.$store.getters.getAllData;
    },
  },
};
</script>

<style scoped>
</style>