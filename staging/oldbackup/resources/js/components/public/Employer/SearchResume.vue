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
          <div class="col-sm-8">
            <div class="panel-group mt-3" id="accordion">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                      <span class="glyphicon glyphicon-file">
                      </span>Advance search</a>
                  </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse show">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <form>
                          <label for="exampleFormControlSelect1">Total Experience</label>
                          <div class="row">
                            <div class="col-5">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>Min</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <b>To</b>
                            </div>
                            <div class="col-5">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>Max</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Current Location</label>
                            <select class="form-control">
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>
                        </form>
                      </div>
                      <!--  2nd row -->
                      <div class="col-md-6">
                        <form>
                          <label for="exampleFormControlSelect1">Annual salary</label>
                          <div class="row">
                            <div class="col-5">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>₹</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <b>To</b>
                            </div>
                            <div class="col-5">
                              <div class="form-group">
                                <select class="form-control">
                                  <option>₹</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span
                        class="glyphicon glyphicon-th-list">
                     </span>Employment Details</a>
                  </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Functional area</label>
                          <select class="form-control">
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Industry</label>
                          <select class="form-control">
                            <input type="checkbox" class="custom-control-input">
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Name</label>
                          <input class="form-control" type="text" placeholder="Name of Employer">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Designation</label>
                          <input class="form-control" type="text" placeholder="Designation">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Exclude Employers</label>
                          <input class="form-control" type="text" placeholder="Excluded Employers">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Notice Period</label>
                          <select class="form-control">
                            <input type="checkbox" class="custom-control-input">
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span
                        class="glyphicon glyphicon-th-list">
                     </span>Educational Details</a>
                  </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="">
                      <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">UG Qualification</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">PG Qualification</a>
                            </li>
                           
                      </ul>

                          <!-- Tab panes -->
                          <div class="tab-content mt-3">
                            <div role="tabpanel" class="tab-pane fade in active show" id="profile">
                              <form>
                                <div class="form-group">
                                  <label for="">Institute Name</label>
                                  <input class="form-control" type="text" placeholder="Name of Institute">
                                </div>

                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Education Type</label>
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                    <option>Full time</option>
                                    <option>Part time </option>
                                    <option>Correspondence</option>
                                    <option>5</option>
                                  </select>
                                </div>

                                <label for="exampleFormControlSelect1">Years of Graduation</label>
                                <div class="row">
                                  <div class="col-sm-5">
                                     <div class="form-group">
                                  
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                   
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                  </select>
                                </div>
                               
                                  </div>
                                  <div class="col-sm-2">
                                    <center><b>To</b></center> 
                                  </div>
                                  <div class="col-sm-5">
                                     <div class="form-group">
                                  
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                    
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                  </select>
                                </div>
                                  </div>
                                </div>

                              </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="buzz">
                               <form>
                                <div class="form-group">
                                  <label for="">Institute Name</label>
                                  <input class="form-control" type="text" placeholder="Name of Institute">
                                </div>

                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Education Type</label>
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                    <option>Full time</option>
                                    <option>Part time </option>
                                    <option>Correspondence</option>
                                    <option>5</option>
                                  </select>
                                </div>

                                 <label for="exampleFormControlSelect1">Show Candidate Seeking</label>
                                <div class="row">
                                  <div class="col-sm-6">
                                     <div class="form-group">
                                  
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                   
                                    <option>Job type</option>
                                    <option>Permanent Job </option>
                                    <option>Temporary job/Contract Job</option>
                                    <option>Any</option>
                                  </select>
                                </div>
                               
                                  </div>
                                 
                                  <div class="col-sm-6">
                                     <div class="form-group">
                                  
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                    
                                     <option>Employment type</option>
                                    <option>Full Time Job </option>
                                    <option>Part Time job</option>
                                    <option>Any</option>
                                  </select>
                                </div>
                                  </div>
                                </div>

                              </form>
                            </div>
                            
                          </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span
                        class="glyphicon glyphicon-th-list">
                     </span>Additional Details</a>
                  </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                  <div class="panel-body">
                    
                             <form>                        
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Candidate Category</label>
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                    <option>General</option>
                                    <option>OBC </option>
                                    <option>SC</option>
                                    <option>ST</option>
                                  </select>
                                </div>

                              <div class="form-group">
                                <label for="exampleFormControlSelect1">Differently-abled Candidates Diversity</label><br>
                                 <label class="checkbox-inline"><input type="checkbox" value=""> All</label>
                                <label class="checkbox-inline"><input type="checkbox" value=""> Male</label>
                                <label class="checkbox-inline"><input type="checkbox" value=""> Female</label> 
                              </div>
                               <label for="exampleFormControlSelect1">Candidate Age</label>
                                <div class="row">
                                  <div class="col-sm-5">
                                     <div class="form-group">
                                  
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                   
                                    <option>Min</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                  </select>
                                </div>
                               
                                  </div>
                                  <div class="col-sm-2">
                                    <center><b>To</b></center> 
                                  </div>
                                  <div class="col-sm-5">
                                     <div class="form-group">
                                  
                                  <select class="form-control">
                                    <input type="checkbox" class="custom-control-input">
                                    
                                    <option>Max</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                  </select>
                                </div>
                                  </div>
                                </div>
                              </form>

                         
                    
                  </div>
                </div>
              </div>

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span
                        class="glyphicon glyphicon-th-list">
                     </span>Display Details</a>
                  </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                  <div class="panel-body">
                    <form>
                       <div class="form-group">
                                <label for="exampleFormControlSelect1">Show</label><br>
                                 <label class="checkbox-inline"><input type="checkbox" value=""> All Candidates</label>
                                <label class="checkbox-inline"><input type="checkbox" value=""> New Registrations</label>
                                <label class="checkbox-inline"><input type="checkbox" value=""> Modified Candiates</label> 
                              </div>
                      </form>   
                       <form>
                       <div class="form-group">
                                <label for="exampleFormControlSelect1">Show Only Candidates with</label><br>
                                 <label class="checkbox-inline"><input type="checkbox" value=""> Verified Mobile Number</label>
                                <label class="checkbox-inline"><input type="checkbox" value=""> Verified Email ID</label>
                                <label class="checkbox-inline"><input type="checkbox" value=""> Attached Resume</label> 
                              </div>
                      </form> 
                      
                  </div>
                </div>
              </div>

              <div class="submit-search">
               <router-link :to ="`/resumeview`"><button class="btn btn-primary">Search</button></router-link> 
              </div>

            </div>
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
        {day: 1, value: "1 Day"},
        {day: 5, value: "5 Day"},
        {day: 10, value: "10 Day"},
        {day: 15, value: "15 Day"},
        {day: 20, value: "20 Day"},
        {day: 25, value: "25 Day"},
        {day: 30, value: "30 Day"},
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
          .post("/add-new-tag", {tag: this.tag})
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

.panel-heading {
  background-color: #007bff;
  color: #fff;
  padding: 2px;
  margin-bottom: 1rem;
}

.form-control {
  border-radius: 0px !important;
  padding: 11px 10px 11px 10px !important;
  font-size: 12px !important;
  border-width: 2px !important;
  height: 42px !important;
}

.panel-heading {
  background-color: #007bff;
  color: #fff;
  padding: 2px;
  margin-bottom: 1rem;
  border-radius: 4px;
  box-shadow: 0px 5px 6px #e6e4e4;
}

.panel-title {
  /* color: #fff; */
  margin: 0;
  padding: 5px;
  font-size: 19px;
}

.panel-heading .panel-title a {
  color: #fff !important;
}

.panel-body {
  background-color: #fff;
  padding: 20px 15px;
  border: 1px solid #ededed;
  margin-bottom: 1rem;
}
.panel-collapse{
  height: auto !important;
}
.checkbox-inline {
    color: #888888;
    padding-right: 10px;
}
</style>