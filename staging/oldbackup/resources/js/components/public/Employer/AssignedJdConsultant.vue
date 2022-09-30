<template>
  <div id="assignedJDConsultant">
    <Emp-header></Emp-header>
    <section class="top-adjust pt-5 pb-5">
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Assigned JD Consultant</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line"> <i class="fa fa-headphones mr-1 Phone is-animating"
                                        aria-hidden="true"></i> <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411
                                        </a>  </p>
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
              <h2 class="hk-pg-title">Assigned JD Consultant</h2>
              <!-- <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addQuestionnaires"><i class="fas fa-plus mr-2"></i>Add Questionnaires</a> -->
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="tab-content">
                  <!------------------------------------------------------------------------------------------------------------------>

                  <!-- consultant tab start -->

                  <div id="Cons" class="tab-pane fade show active">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-2">
                        <thead>
                          <tr>
                            <th>Posiion Title</th>
                            <th>Expiry</th>
                            <th>Status</th>
                            <th>No.of Request(Consultant)</th>
                            <th>View</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Account Executive</td>
                            <td>5/2/2020</td>
                            <td>
                              <span class="badge badge-success">Active</span>
                            </td>
                            <td
                              class="text-danger"
                              style="cursor: pointer"
                              data-toggle="collapse"
                              data-target="#demo"
                            >
                              0 Request
                              <i
                                class="fa fa-plus-circle"
                                aria-hidden="true"
                              ></i>
                            </td>

                            <td>5</td>
                            <td>
                              <a
                                href=""
                                class="btn btn-sm btn-primary text-white"
                              >
                                <i class="fas fa-eye"></i>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div id="demo" class="collapse">
                        <table class="table custom-table mt-2">
                          <thead>
                            <tr>
                              <th>Posiion Title</th>
                              <th>Expiry</th>
                              <th>Status</th>
                              <th>No.of Request(Consultant)</th>
                              <th>View</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Account Executive</td>
                              <td>5/2/2020</td>
                              <td>
                                <span class="badge badge-success">Active</span>
                              </td>
                              <td class="text-danger">
                                0 Request
                                <i
                                  class="fa fa-plus-circle"
                                  aria-hidden="true"
                                ></i>
                              </td>

                              <td>5</td>
                              <td>
                                <a
                                  href=""
                                  class="btn btn-sm btn-primary text-white"
                                >
                                  <i class="fas fa-eye"></i>
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
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
  name: "AssignedJDConsultant",
  data() {
    return {
      total_application: "",
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/jobs-by-sessionuser");
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
  },
  methods: {
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
</style>