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
                  <li class="active">Follow Company Details</li>
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
              <h2 class="hk-pg-title">Follow Company Details</h2>
            </div>
            <div class="card mt-3">
              <div class="card-body">
                <div class="table-responsive custom-height">
                  <table
                    class="table table-head-fixed custom-table mt-2"
                    id="example1"
                  >
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(com, index) in allIndustry" :key="com.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ com.company_name }}</td>
                        <td>{{ com.com_email }}</td>
                        <td>{{ com.com_contact }}</td>
                        <td>
                          <a
                            href="#"
                            @click="unfollow(com.job_id, com.employer_id)"
                            class="btn btn-primary border-orange text-white btn-block"
                            >UnFollow</a
                          >
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
  name: "CompanyFollowing",
  data() {
    return {
      allIndustry: [],
    };
  },
  methods: {
    getAllFollow() {
      this.loading = true;
      axios.get("follow-list").then((response) => {
        this.loading = false;
        this.allIndustry = response.data.data;
      });
    },

    unfollow(job_id, comp_id) {
      $("body").css("cursor", "wait");
      let uri = "/unfollow-companies/" + job_id + "/" + comp_id;
      axios.get(uri).then((response) => {
        this.$router.push("/company-followings");
        toast({
          type: "success",
          title: "Company unfollow successfully",
        });
        Fire.$emit("afterUpdate");
        $("body").css("cursor", "default");
      });
    },
  },
  created: function () {
    this.getAllFollow();
    Fire.$on("afterUpdate", () => {
      this.getAllFollow();
    });
  },
};
</script>

<style scoped>
</style>