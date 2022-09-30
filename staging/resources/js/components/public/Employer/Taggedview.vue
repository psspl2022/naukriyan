<template>
  <div id="taggedview">
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
                  <li class="active">Tagged View</li>
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
              <h2 class="hk-pg-title">Tagged View</h2>
              <!-- <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addEnquiry"><i class="fas fa-plus mr-2"></i>Add Enquiry</a> -->
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="search-bar">
                  <div class="form-group row">
                    <div class="col-sm-4">
                      <select class="form-control custom-select" id="tag">
                        <option disabled="">Select Tags</option>
                        <option v-for="(tag, index) in allTag" :value="tag.id">
                          {{ tag.tag }}
                        </option>
                      </select>
                    </div>
                    <div class="col-sm-8">
                      <button
                        type="button"
                        @click="getResume()"
                        class="btn btn-danger text-white"
                      >
                        Search
                      </button>
                      <button
                        type="button"
                        @click="reset()"
                        class="btn btn-danger text-white"
                      >
                        Reset
                      </button>
                    </div>
                  </div>
                </div>

                <div class="table-responsive custom-height">
                  <table
                    class="table table-head-fixed custom-table mt-2"
                    id="example1"
                  >
                    <thead>
                      <tr>
                        <th>Tagged Name</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(res, index) in res_list">
                        <td>{{ res.tag }}</td>
                        <td>{{ res.fname }}</td>
                        <td>{{ res.designation }}</td>
                        <td>
                          <a
                            v-if="res.resume != null"
                            href="#"
                            @click="opendoc(res.resume)"
                            data-toggle="modal"
                            data-target="#addNewLocation"
                            class="btn btn-primary text-white mr-2"
                          >
                            <i class="fas fa-eye mr-2"></i>View Resume
                          </a>
                          <a
                            v-if="res.resume != null"
                            :href="'resume/' + res.resume"
                            target="_blank"
                            download
                            class="btn btn-danger text-white"
                          >
                            <i class="fas fa-download mr-2"></i>Download Resume
                          </a>
                          <a
                            v-if="res.resume_video_link != null"
                            :href="`https://www.youtube.com/watch?v=${res.resume_video_link}`"
                            target="_blank"
                            class="btn btn-warning text-black mr-2"
                          >
                            <i class="fas fa-video mr-2"></i>Video Resume
                          </a>
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

    <!-----------Resume Modal------------------------------>
    <div class="modal fade popupForm custom-model-width" id="addNewLocation">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Resume</h4>

            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->

            <iframe
              id="resume_iframe"
              src=""
              style="width: 550px; height: 500px"
              frameborder="0"
            ></iframe>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <!----------------------Resume Modal Close-------------------->

    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "Taggedview",
  data() {
    return {
      res_list: [],

      demo: new Form({}),
    };
  },
  mounted() {
    this.$store.dispatch("getAllDesignation", "/get-tag");
  },
  computed: {
    allTag() {
      return this.$store.getters.getAllDesignation;
    },
  },

  methods: {
    opendoc($doc) {
      //let res="http://infolab.stanford.edu/pub/papers/google.pdf";
      if ($doc) {
        var link =
          "http://docs.google.com/gview?url=http://naukriyan.com/resume/" +
          $doc +
          "&embedded=true";
      } else {
        var link =
          "http://docs.google.com/gview?url=http://naukriyan.com/resume/default.pdf&embedded=true";
      }

      document.getElementById("resume_iframe").src = link;
    },
    reset() {
      axios.get("gettagresume").then((response) => {
        this.res_list = response.data.data;
      });
    },

    getAllResume() {
      this.loading = true;
      axios.get("gettagresume").then((response) => {
        this.loading = false;
        this.res_list = response.data.data;
      });
    },

    getResume() {
      let tag = document.getElementById("tag").value;
      axios.get("/searchtagresume/" + tag).then((response) => {
        this.res_list = response.data.data;
        //alert(response.data.pay_status);
      });
    },
  },
  created: function () {
    this.getAllResume();
  },
};
</script>


<style scoped>
</style>