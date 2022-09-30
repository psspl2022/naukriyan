<template>
  <div id="questionnaires">
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
                  <li class="active">Questionnaires</li>
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
              <h2 class="hk-pg-title">Questionnaires</h2>
              <router-link :to="`/add-question-emp`">
                <a href="" class="btn btn-primary text-white"
                  ><i class="fas fa-plus mr-2"></i>Add Question</a
                >
              </router-link>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="search-bar">
                  <div class="form-group row">
                    <div class="col-sm-4">
                      <select class="form-control custom-select" id="tag">
                        <option disabled="">Select Questionnarie</option>
                        <option v-for="(tag, index) in allTag" :value="tag.id">
                          {{ tag.name }}
                        </option>
                      </select>
                    </div>
                    <div class="col-sm-8">
                      <button
                        type="button"
                        @click="getResume()"
                        class="btn btn-success text-white"
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
                  <table class="table custom-table mt-2" id="example1">
                    <thead>
                      <tr>
                        <th>Questionnaires Name</th>
                        <th>Question Title/Question Category</th>
                        <th>Question Name</th>
                        <th>Options</th>
                        <th>Questions Mode</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(res, index) in res_list">
                        <td>{{ res.name }}</td>
                        <td>{{ res.title }} / {{ res.question_category }}</td>
                        <td>{{ res.question_name }}</td>
                        <td>
                          {{ res.option1 }}/{{ res.option2 }}/{{
                            res.option3
                          }}/{{ res.option4 }}
                        </td>
                        <td>{{ res.question_mode }}</td>
                        <td>
                          <a
                            class="btn btn-sm btn-primary text-white"
                            @click.prevent="
                              deletequestion(res.questionnarie_questions_id)
                            "
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Delete"
                            ><i class="fas fa-trash"></i
                          ></a>
                          <a
                            class="btn btn-sm btn-primary text-white"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Add"
                            ><i class="fas fa-plus"></i
                          ></a>
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

    <!-- The add Questionnaires start -->
    <div class="modal fade popupForm custom-model-width" id="addQuestionnaires">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Questionnaires</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group row">
              <div class="col-sm-4">
                <label class="col-form-label" for=""> Questionnaires</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter Your Questionnaires"
                  id=""
                />
              </div>
              <div class="col-sm-4">
                <label class="col-form-label" for="">Submition Days</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="Enter Your Submition Days"
                  id=""
                />
              </div>
              <div class="col-sm-4">
                <label class="col-form-label" for="">Questions</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="Enter Questions"
                  id=""
                />
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-primary text-white">
              Save
            </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- The add Questionnaires end -->
    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "Questionnaires",
  data() {
    return {
      res_list: [],
      demo: new Form({}),
    };
  },
  mounted() {
    this.$store.dispatch("getAllDesignation", "/questionnarie-name_emp");
  },
  computed: {
    allTag() {
      return this.$store.getters.getAllDesignation;
    },
  },
  methods: {
    getAllResume() {
      this.loading = true;
      axios.get("getquestionnarie-question_emp").then((response) => {
        this.loading = false;
        this.res_list = response.data.data;
      });
    },
    getResume() {
      let tag = document.getElementById("tag").value;
      axios.get("/searchquestionnarie_emp/" + tag).then((response) => {
        this.res_list = response.data.data;
      });
    },
    reset() {
      window.location.reload();
    },
    deletequestion(id) {
      var uri = "/question-emp/" + id;
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!",
        })
        .then((result) => {
          if (result.value) {
            swal.fire("Deleted!", "Your file has been deleted.", "success");
            axios.get(uri).then((response) => {
              this.$store.push("getAllDesignation", "/questionnaries");
            });
          }
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