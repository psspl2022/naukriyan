<template>
  <div id="resumeview">
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
                  <li class="active">Resume View</li>
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
              <h2 class="text-center">Resume View</h2>
              <hr />
            </div>

            <div class="card resume-view mt-3 mb-4">
              <div class="card-body">
                <form role="form" @submit.prevent="getResumeFilters">
                  <div class="search-bar">
                    <div class="form-group row">
                      <div class="col-sm-3">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Keyword"
                          id="keyword"
                          v-model="searchTxt.keyword"
                        />
                      </div>
                      <div class="col-sm-3">
                        <select
                          class="form-control custom-select"
                          id="gender"
                          v-model="searchTxt.gender"
                        >
                          <option value="">Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Other</option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Designation"
                          id="designation"
                          v-model="searchTxt.designation"
                        />
                      </div>
                      <div class="col-sm-3">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Location"
                          id="location"
                          v-model="searchTxt.location"
                        />
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3">
                        <select
                          class="form-control custom-select"
                          id="industry"
                          v-model="searchTxt.industry"
                        >
                          <option value="">Select Industry</option>
                          <option
                            v-for="industry in allIndustry"
                            :value="industry.id"
                          >
                            {{ industry.category_name }}
                          </option>
                        </select>
                      </div>

                      <div class="col-sm-3">
                        <select
                          class="form-control custom-select"
                          id="functionalrole"
                          v-model="searchTxt.functional_area"
                        >
                          <option value="">Select Functional Area</option>
                          <option
                            v-for="fnr in allfunctionalrole"
                            :value="fnr.id"
                          >
                            {{ fnr.subcategory_name }}
                          </option>
                        </select>
                      </div>

                      <div class="col-sm-3">
                        <input
                          type="number"
                          name="experience"
                          id="exp"
                          min="0"
                          placeholder="Experience in Year"
                          class="form-control"
                          v-model="searchTxt.experience_year"
                        />
                      </div>

                      <div class="col-md-3">
                        <select
                          class="form-control custom-select"
                          id="profile_update"
                          v-model="searchTxt.profile_update"
                        >
                          <option value="">Profile Modified In</option>
                          <option v-for="day in days" :value="day.day">
                            {{ day.value }}
                          </option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-3">
                        <input
                          type="number"
                          name="salary"
                          id="salary"
                          placeholder="Salary Per Annum"
                          min="0"
                          class="form-control"
                          v-model="searchTxt.salary"
                        />
                      </div>
                    </div>

                    <div class="form-group row justify-content-center">
                      <button
                        type="submit"
                        class="btn btn-primary text-white mr-2"
                      >
                        {{ searchStatus ? "Searching" : "Search" }}
                      </button>
                      <button
                        type="button"
                        data-toggle="modal"
                        data-target="#addTag"
                        title=""
                        data-original-title="Select One row"
                        class="btn btn-secondary text-white mr-2"
                      >
                        Add Tags
                      </button>
                      <button
                        @click.prevent="exportResume()"
                        type="button"
                        class="btn btn-danger text-white mr-2"
                      >
                        {{ exportStatus ? "Exporting" : "Export Excel" }}
                      </button>
                      <button
                        type="button"
                        data-toggle="modal"
                        data-target="#addMail"
                        class="btn btn-success text-white mr-2"
                      >
                        Send Mail
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-check checkbox-all">
                  <label class="form-check-label">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      @click="checkAll"
                      v-model="multiCheck"
                    />Select All
                  </label>
                </div>
              </div>
              <div class="col-sm-3 ml-auto" v-if="searchStatus == false">
                <h6 class="result-count">
                  Showing {{ res_list.from }} – {{ res_list.to }} of
                  {{ res_list.total }} results.
                </h6>
              </div>
            </div>

            <div v-if="searchStatus" class="text-center">
              <h2>Loading...</h2>
            </div>

            <div
              class="card candidate-card overflow-hidden mb-3"
              v-for="ven in res_list.data"
              :key="ven.id"
              v-else
            >
              <div class="card-content">
                <div class="card-body cleartfix">
                  <div class="">
                   
                    <div class="row">
                      <div class="col-8">
                        <div class="media-body">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          v-model="jobseeker_id"
                          :value="ven.js_id"
                        />
                      </div>
                      <router-link :to="`/candidate-details/${ven.js_id}`">
                        <h4 class="candidate-name">
                          {{ ven.fname | capitalizedWord }}
                          {{ ven.lname | capitalizedWord }}
                        </h4>
                        <hr />
                        <div class="row">
                            <div class="col-md-3"> <b><i class="fas fa-briefcase"></i></b> {{ ven.exp_year ? +ven.exp_year + " Year" : "" }}
                              {{
                                ven.exp_year !== null && ven.exp_month !== null
                                  ? "-"
                                  : ""
                              }}
                              {{
                                ven.exp_month ? +ven.exp_month + " Month" : ""
                              }}</div>
                            <div class="col-md-3"> <b><i class="fas fa-wallet"></i></b> {{ "&#8377 "+ ven.current_salary }}</div>
                            <div class="col-md-3"><b><i class="fas fa-map-marker-alt"></i></b> {{ ven.current_working_location }}</div>
                        </div>
                        <ul>
                          <li>
                            <b><i class="fas fa-industry"></i> Education :</b
                            ><span></span>
                          </li>
                          <li>
                            <b><i class="fas fa-cogs"></i> Current :</b
                            ><span></span>
                          </li>
                          <li>
                            <b><i class="fas fa-briefcase"></i> Previous :</b>
                            <span>
                              
                            </span>
                          </li>
                          <li>
                            <b
                              ><i class="fas fa-rupee-sign"></i> Key Skills
                              : </b
                            ><span></span>
                          </li>
                        </ul>
                      </router-link>
                    </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="image-preview text-center">
                          <span class="float-right" style="color:green;"><i class="far fa-check-circle"></i></span>
                          <img
                  class="mini-photo rounded-circle"
                  src="default_images/no_image_available.png" width="100" height="100" /><br>
                  <b>Laravel, PHP, CSS, Bootstrap</b><br>
                  <button class="btn btn-outline-primary btn-block">&nbsp; Call to action <i class="fas fa-phone-alt"></i></button>
                        </div>
                      </div>
                    </div>
                   
                      <div class="comment-section">
                        <div class="row">
                          <div class="col-sm-8">
                            <span><i class="far fa-eye"></i> 20</span>
                            <span><i class="fas fa-download"></i> 20</span>
                            <span><i class="fas fa-paperclip"></i> 20</span>
                            <span>Active: 30 jan 2021</span>
                          </div>
                          
                          <div class="col-sm-4 ml-auto">
                           <span class="comment"> <i class="far fa-comment"></i></span>
                          </div>
                        </div>
                      </div>
                       <div class="post-comment-section">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Leave a comment</label>
                <div class="row">
                  <form role="form" method="post" action="">
                  <div class="col-sm-8"><textarea class="form-control" required id="exampleFormControlTextarea1" rows="3" placeholder="Maximum 250 Characters"></textarea></div>
                  <div class="col-sm-4"><button class="btn btn-primary ">Post Comment</button></div>
                  </form>
                </div>
                <div class="row">
                  <hr>
                  <div class="col-sm-12">
                    <label>1 Comments</label>
                    <ol>
                      <li> Your Comments</li>
                  
                    </ol>
                  </div>
                </div>
                
            </div>
            </div>
                    
                  </div>
                </div>
              </div>
            </div>

           
            <pagination
              v-if="searchStatus == false"
              :data="res_list"
              @pagination-change-page="getResumeFilters"
              :limit="5"
            ></pagination>
          </div>
        </div>
      </div>
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

    <!-----------Tag Modal------------------------------>
    <div class="modal fade popupForm custom-model-width" id="addTag">
      <div class="modal-dialog">
        <div class="modal-content tag-modal">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->
            <div class="form-group row">
              <div class="col-sm-8">
                <select
                  class="custom-select mb-3"
                  :disabled="tagToggle == true"
                  v-model="tag_id"
                >
                  <option value="">Select tag</option>
                  <option :value="tag.id" v-for="tag in tags" :key="tag.id">
                    {{ tag.tag }}
                  </option>
                </select>
                <form v-if="tagToggle">
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Type Tag Name"
                      v-model="tag"
                    />
                  </div>
                </form>
              </div>

              <div class="col-sm-4">
                <button class="btn btn-primary" @click="tagToggle = !tagToggle">
                  <i class="fas fa-plus"></i> Add new tag
                </button>
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button
              type="button"
              @click="createTagGroup"
              class="btn btn-primary"
              v-if="tagToggle == false"
            >
              Add
            </button>
            <button
              type="button"
              @click.prevent="createTag"
              class="btn btn-primary"
              v-else
            >
              Create Tag
            </button>
          </div>
        </div>
      </div>
    </div>
    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "Resumeview",
  data() {
    return {
      tagToggle: false,
      multiCheck: false,
      res_list: [],
      jobseeker_id: [],
      tags: [],
      tag: "",
      tag_id: "",
      exportStatus: false,
      searchStatus: false,
      days: [
        { day: 1, value: "1 Day" },
        { day: 5, value: "5 Day" },
        { day: 10, value: "10 Day" },
        { day: 15, value: "15 Day" },
        { day: 20, value: "20 Day" },
        { day: 25, value: "25 Day" },
        { day: 30, value: "30 Day" },
      ],
      searchTxt: {
        keyword: "",
        gender: "",
        designation: "",
        location: "",
        industry: "",
        functional_area: "",
        experience_year: "",
        salary: "",
        profile_update: "",
      },
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/getresume");
    this.$store.dispatch("getAllOrganisations", "/get-industry");
    this.$store.dispatch("getAllCategory", "/get-functionalrole");
    this.getResumeFilters();
    this.getTags();
  },
  computed: {
    profile() {
      return this.$store.getters.getAllData;
    },
    allIndustry() {
      return this.$store.getters.getAllOrganisations;
    },
    allfunctionalrole() {
      return this.$store.getters.getAllCategory;
    },
  },

  methods: {
    createTagGroup() {
      axios
        .post("/add-resume-tag", {
          tag_id: this.tag_id,
          jobseeker_id: this.jobseeker_id,
        })
        .then((response) => {
          if (response.status === 201) {
            (this.jobseeker_id = ""),
              (this.multiCheck = false),
              toast({
                type: response.data.status,
                title: response.data.message,
              });
          }
        })
        .catch((error) => {
          console.log("Error");
        });
    },

    getTags() {
      axios
        .get("/get-tag")
        .then((response) => {
          this.tags = response.data.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },

    createTag() {
      axios
        .post("/add-new-tag", { tag: this.tag })
        .then((response) => {
          if (response.status === 201) {
            this.tagToggle = false;
            this.tag = "";
            this.getTags();
            toast({
              type: response.data.status,
              title: response.data.message,
            });
          }
        })
        .catch((error) => {
          console.log("Error");
          this.tagToggle = true;
        });
    },

    checkAll() {
      this.jobseeker_id = [];
      if (!this.multiCheck) {
        for (let can_id in this.res_list.data) {
          this.jobseeker_id.push(this.res_list.data[can_id].js_id);
        }
      }
    },

    getResumeFilters(page = 1) {
      this.searchStatus = true;
      axios
        .get("/resume-filters", {
          params: {
            keyword: this.searchTxt.keyword,
            gender: this.searchTxt.gender,
            designation: this.searchTxt.designation,
            location: this.searchTxt.location,
            industry: this.searchTxt.industry,
            functional_area: this.searchTxt.functional_area,
            experience_year: this.searchTxt.experience_year,
            salary: this.searchTxt.salary,
            profile_update: this.searchTxt.profile_update,
            page: page,
          },
        })
        .then((response) => {
          this.searchStatus = false;
          this.res_list = response.data.data;
        })
        .catch((error) => {
          this.searchStatus = false;
          console.log("Something went wrong");
        });
    },

    opendoc($doc) {
      //let res="http://infolab.stanford.edu/pub/papers/google.pdf";
      if ($doc) {
        var link =
          "http://docs.google.com/gview?url=https://naukriyan.com/resume/" +
          $doc +
          "&embedded=true";
      } else {
        var link =
          "http://docs.google.com/gview?url=https://naukriyan.com/resume/default.pdf&embedded=true";
      }

      document.getElementById("resume_iframe").src = link;
    },

    exportResume() {
      if (!this.jobseeker_id.length) {
        swal(
          "Whoops, Please select at least one row to export resume.",
          "You clicked the button!",
          "warning"
        );
      } else {
        this.exportStatus = true;
        axios.get("/export-resumes/" + this.jobseeker_id).then((response) => {
          if (response.status === 200) {
            this.exportStatus = false;
            toast({
              type: "success",
              title: "Resume Exported Successfully",
            });
            window.open("/export-resumes/" + this.jobseeker_id, "_blank");
          }
        });
      }
    },

    openmail() {
      var x = "";
      var msg = $("#mail").val();
      var cboxes = document.getElementsByName("check[]");
      var len = cboxes.length;
      for (var i = 0; i < len; i++) {
        //alert(i + (cboxes[i].checked?' checked ':' unchecked ') + cboxes[i].value);
        if (cboxes[i].checked) {
          x = x + "," + cboxes[i].value;
        }
      }
      axios.post("resumeview-sendmail/" + msg + "/" + x).then((response) => {
        if (response) {
          toast({
            type: "success",
            title: "Mail  Send Successfully",
          });
        }
      });
    },
  },
};
</script>

<style scoped>
.form-control {
  border-radius: 0px !important;
  padding: 11px 10px 11px 10px !important;
  font-size: 12px !important;
  border-width: 2px !important;
  height: 42px !important;
}
.form-control:focus {
  box-shadow: none !important;
  border-color: #333333 !important;
}
.loading-text {
  text-align: center;
  margin-top: 30px;
  margin-bottom: 30px;
}
.resume-btn {
  display: grid;
  margin: 1rem;
  margin-top: 37px;
}
.resume-btn button {
  margin-bottom: 5px;
  transition: 0.3s ease-in all;
}
.resume-btn button:hover {
  box-shadow: 1px 1px 20px #b9b9b9;
}
.media-body i {
  font-size: 17px;
  padding-right: 5px;
}
.media-body b {
  color: #a2a2a2;
}
.media-body {
  line-height: 2;
  padding: 30px 18px;
}
.media-body ul {
  padding: 0;
}
.media-body ul li {
  list-style-type: none;
}
.media-body span {
  padding-left: 4px;
}
.card-body {
  padding: 0;
}
.candidate-card {
  border: 0;
  cursor: pointer;
  transition: 0.3s ease all;
}
.candidate-card:hover {
  -webkit-box-shadow: 1px 2px 20px #c3c3c3;
  box-shadow: 1px 2px 20px #dadada;
  border-left: 2px solid #f95602;
}
.candidate-name {
  padding-left: 22px;
}
.tag-modal .modal-header {
  background-color: #f0f8ff !important;
  padding: 4px 25px !important;
  border: 0;
}
.close {
  font-size: 41px;
  font-weight: 400;
}
.tag-modal {
  background-color: aliceblue;
}
.tag-modal i {
  position: initial !important;
  color: #fff !important;
  font-size: 16px !important;
}
.tag-modal .modal-body {
  padding: 1rem !important;
}
.search-bar {
  background-color: #fff;
  padding: 0;
  border: 0;
}
.resume-view {
  box-shadow: 1px 1px 20px #e6e6e6;
  border: 0;
}
.result-count {
  margin-top: 15px;
  float: right;
}
.card-content {
  /* border-left: 2px solid #f95602; */
}
.checkbox-all {
  margin-left: 26px;
  margin-top: 15px;
}
.image-preview{
     background-color: #f6f6f6;
    padding: 18px 20px;
    height: 100%;
}
.image-preview img{
  margin-bottom: 1rem;
}
.image-preview b {
    font-size: 16px;
    padding-bottom: 1rem;
}
.image-preview button{
  margin-top: 1rem;
}
.comment-section{
    padding: 6px 19px;
    background-color: #efefef;
    color: #959595;
}
.comment-section span{
  margin-right: 1.5rem;
}
.comment-section .comment{
float: right;
}
.post-comment-section{
  background-color: #fff;
  padding: 1rem;
  border:1px solid #ededed;
}
.post-comment-section ol{
  padding-left: 1rem;
  margin-top: 1rem;
}
</style>