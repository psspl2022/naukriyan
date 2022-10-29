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
<input type="hidden"  v-model="saveUrl">

    <section class="top-adjust section pb-5 mt-0 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="cms-pg-header">
              <h2 class="text-center">Resume View</h2>
              <hr />
            </div>

            <!-- <div>
                <label
                  >Search (Title / Status / Client Name)
                  <input
                    type="text"
                    name="example1_length"
                    aria-controls="example1"
                    placeholder="Search here Title,Status,Client Name....."
                    v-model="keyword"
                    @keyup=""
                    class="form-control form-control-sm"
                  />
                </label>
              </div> -->
            <div class="row my-3">
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
              <div class="col-sm-6">
                <div class="card resume-view bg-none">
              <div class="card-body">
                <form role="form" @submit.prevent="getResumeFilters">
                  <div class="search-bar">
                    

                    <div class="form-group row justify-content-center mb-1">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm mr-2"
                        data-toggle="modal"
                        data-target="#addSearch"
                      >
                        Save Search
                      </button>
                      <button
                        type="button"
                        data-toggle="modal"
                        data-target="#addTag"
                        title=""
                        data-original-title="Select One row"
                        class="btn btn-primary btn-sm mr-2"
                      >
                        Add Tagged
                      </button>
                      <button
                        @click.prevent="exportResume()"
                        type="button"
                        class="btn btn-primary btn-sm mr-2"
                      >
                        {{ exportStatus ? "Exporting" : "Export Excel" }}
                      </button>
                      <button
                        type="button"
                        data-toggle="modal"
                        data-target="#sendMail"
                        class="btn btn-primary btn-sm mr-2"
                      >
                        Send Email
                      </button>
                      <button
                        type="button"
                        data-toggle="modal"
                        data-target="#addMail"
                        class="btn btn-primary btn-sm mr-2"
                      >
                        Send SMS
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
              </div>
              <div class="col-sm-3 ml-auto" v-if="searchStatus == false">
                <h6 class="result-count">
                  Showing {{ res_list.from ? res_list.from:0 }} – {{ res_list.to ? res_list.to:0 }} of
                  {{ res_list.total ? res_list.total :0 }} results.
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
                        
                        <div class="row">
                            <div class="col-md-3" v-if="ven.exp_year !==null && ven.exp_month !==null"> <b><i class="fas fa-briefcase"></i></b> {{ ven.exp_year + " Year"  }} -
                              {{
                                ven.exp_month + " Month" 
                              }}</div>
                            <div class="col-md-3" v-if="ven.current_salary!==null"> <b><i class="fas fa-wallet"> </i></b> <span>&#8377</span> {{ ven.current_salary | currencyConvert }}</div>
                            <div class="col-md-3" v-if="ven.current_working_location!==null"><b><i class="fas fa-map-marker-alt"></i></b> {{ ven.current_working_location }}</div>
                        </div>
                        <ul class="mt-3">
                          <li v-if="ven.educations.length > 0">
                            <div class="row mt-2">
                              <div class="col-md-3 text-center">
                                <b><i class="fas fa-school"></i> Education </b>
                              </div>
                              <div class="col-sm-8 p-0">
                                <ul>
                                  <li v-for="edu in ven.educations" :key=edu.id>{{ edu.qualification }} from {{edu.institute_name}} in {{edu.passing_year}} </li>
                                </ul>

                              </div>
                            </div>
                          </li>
                          <li v-if="ven.professionals.length > 0">
                            <div class="row mt-2">
                              <div class="col-md-3 text-center">
                                <b><i class="fas fa-briefcase"></i> Work Details </b
                            >
                              </div>
                              <div class="col-sm-8 p-0">
                                <ul >
                                  <li v-for="prf in ven.professionals" :key=prf.id>{{prf.designations}}  at {{prf.organisation}} </li>
                                </ul>
                              </div>
                            </div>
                          </li>

                          
                          <li v-if="ven.skills.length > 0">
                            <div class="row">
                              <div class="col-md-3 text-center">
                                <b><i class="fas fa-cogs"></i> Key Skills </b
                            >
                              </div>
                              <div class="col-sm-8 p-0">
                                <span >
                                  <span v-for="sk in ven.skills" :key="sk.id" >{{sk.skill}} </span>
                                </span>

                              </div>
                            </div>
                          
                          </li>
                        </ul>
                      </router-link>
                    </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="image-preview text-center">
                          <i class="fas fa-check-circle float-right" style="color:green;font-size:23px" v-if="candID.includes(ven.js_id) === true"></i>
                          
                          
                          <img
                  class="mini-photo rounded-circle"
                  :src="'/jobseeker_profile_image/' + ven.profile_pic_thumb" style="width:100px;" v-if="ven.profile_pic_thumb" />
                          <img
                  class="mini-photo rounded-circle"
                  src="default_images/no_image_available.png"  style="width:100px;" v-else /><br>
                  <b>{{ven.designation ? ven.designation :'Fresher'}}</b><br>
                  <b v-for="sk in ven.skills" :key="sk.id">{{sk.skill + ' '}}</b><br>
                  
                  <br>
                        <div class="verify-section">
                          <span><i class="far fa-envelope"></i> Email <i class="fas fa-check verify-check"></i>  </span>|
                         <span><i class="fas fa-phone-volume"></i> Phone <i class="fas fa-times cross"></i> </span>
                        </div>
                        </div>
                      </div>
                    </div>
                   
                      <div class="comment-section">
                        <div class="row">
                          <div class="col-sm-8">
                            <span><i class="far fa-eye"> 0</i></span>
                            <span><i class="fas fa-download"></i> 0</span>
                            <span v-if="ven.resume !== null"><i class="fas fa-paperclip"></i> CV</span>
                            <span v-if="ven.last_login !== null">Active: {{getHumanDate(ven.last_login)}}</span>
                            <span v-if="ven.last_modified !== null">Last Modified: {{getHumanDate(ven.last_modified)}}</span>
                          </div>
                          
                          <div class="col-sm-4 ml-auto">
                           <span class="comment"> <i class="far fa-comment"  @click="comment(ven.js_id)"></i> </span>
                           <span></span>
                          </div>
                        </div>
                      </div>
                       <div class="post-comment-section" :class="commentShow == ven.js_id ? 'show-me' : 'hide-me'">
              <div class="form-group">
                <form method="post" action="">
                <label for="exampleFormControlTextarea1">Leave a comment</label>
                <div class="row">
                  <div class="col-sm-8">
                    
                    <textarea class="form-control" v-model="commentarea" required id="exampleFormControlTextarea1" placeholder="Maximum 250 Characters"></textarea>
                    </div>
                  <div class="col-sm-4">
                    <button class="btn btn-primary" type="submit" @click.prevent="saveComment(ven.js_id)">Post Comment</button>
                    </div>
                 
                </div>
                </form>
                <div class="row">
                  <hr>
                  <div class="col-sm-12">
                    <label>Your Comments</label>
                    <ol>
                      <li v-for="cmt in ven.comments" :key="cmt.id"> {{cmt.comment}}  || Time : {{getHumanDate(cmt.created_at)}}</li>
                  
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
    <div class="modal fade popupForm custom-model-width" id="sendMail">
      <div class="modal-dialog">
        <div class="modal-content tag-modal">
          <div class="modal-header">
            <h4 class="modal-title">Send Email</h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>

          <!-- Modal body -->
          <!-- form start -->
          <form role="form" method="post" action="">
          <div class="modal-body">
            <label>From Email <em>(You can change email from here)</em></label>
            <input type="text" class="form-control" v-model="empEmail" placeholder="Input Your Email ID">

            <label>Subject</label>
            <input type="text" class="form-control" v-model="input_subject"  placeholder="Keep it short and interesting" required>

            <label>Description</label>
            <ckeditor :editor="editor" v-model="description"></ckeditor>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-primary" @click.prevent="sendBulkMail()">
            {{ sendmail ? "Please Wait..." : "Send Email" }}
            </button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Close
            </button>
          </div>
          </form>
          <!-- form close -->
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
    <!-- SAve Sesrch -->
    <div class="modal fade popupForm custom-model-width" id="addSearch">
      <div class="modal-dialog">
        <div class="modal-content tag-modal">
          <form method="post" action>
          <div class="modal-header">
            Welcome To Save search
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <!-- form start -->
            <div class="form-group row">
              <div class="col-sm-8">
                
                  <div class="form-group">
                    <input
                      type="text"
                      class="form-control"
                      required
                      placeholder="Type Save Search Name"
                      v-model="saveSearch"
                    />
                  </div>
                
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer justify-content-center">
            <button
              type="button"
              @click="createSaveSearch"
              class="btn btn-primary"
            >
              Add
            </button>
            
          </div>
          </form>
        </div>
      </div>
    </div>
    <main-footer></main-footer>
  </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
var moment = require("moment");
export default {
  name: "Resumeview",
  props: [
    'display','skill', 'optional_keywords',
    'mandate_keywords','min_exp',
    'max_exp','from_salary',
    'to_salary','current_location',
    'excluding_keywords','functionalrole',
    'industry','designation','notice_period',
    'active_in','gender','resume_per_page','company_name',
    'exclude_company_name','ug_qualification_name','ug_institute_name',
    'ug_education_type','start_graduation','to_graduation'],
  data() {
    return {
      editor: ClassicEditor,
      candID:[],
      commentarea:'',
      saveSearch:'',
      saveUrl:'',
      moment: moment,
      commentShow:'',
      tagToggle: false,
      multiCheck: false,
      res_list: '',
      jobseeker_id: [],
      tags: [],
      tag: "",
      tag_id: "",
      exportStatus: false,
      searchStatus: false,
      sendmail:false,
      days: [
        { day: 1, value: "1 Day" },
        { day: 5, value: "5 Day" },
        { day: 10, value: "10 Day" },
        { day: 15, value: "15 Day" },
        { day: 20, value: "20 Day" },
        { day: 25, value: "25 Day" },
        { day: 30, value: "30 Day" },
      ],
      commentinfo:'',      
      input_subject:'',
      description:'',
      empEmail:'',
      keyword: "",
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/getresume");
    this.$store.dispatch("getAllOrganisations", "/get-industry");
    this.$store.dispatch("getAllCategory", "/get-functionalrole");
    this.getResumeFilters();
    this.getTags();
    this.getEmpUserEmail();
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
    getEmpUserEmail() {
      axios
        .get("/userprofile")
        .then((response) => {
          this.empEmail = response.data.data.email;
        })
        .catch((error) => {
          console.log("Error");
        });
    },

    getHumanDate: function (date) {
      return moment(date).fromNow();
    },

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

    createSaveSearch(){
      axios
        .post("/add/save/search", {
          params: {
            searchname: this.saveSearch,
            url: this.saveUrl
          },
        })
        .then((response) => {
           if (response.status === 201) {
            toast({
              type: response.data.status,
              title: response.data.message,
            });
          }
        })
        .catch((error) => {
          
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

    saveComment(jsid){
        axios
        .post("/save/comment/user", {
          params: {
            jsid: jsid,
            comment: this.commentarea
          },
        })
        .then((response) => {
           if (response.status === 201) {
             this.getResumeFilters();
             this.commentarea='';
            toast({
              type: response.data.status,
              title: response.data.message,
            });
          }
        })
        .catch((error) => {
          
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

    checkProfileVieworNot()
    {
      const self = this;
      axios.get("/check/profile/view").then((response) => {
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.candID.push(value.view_to);
          });
        } else {
          this.candID.push(0);
        }
      });
    },

    getResumeFilters(page = 1) {
      this.searchStatus = true;
      axios
        .get("resume/filter", {
          params: {
            skill: this.skill,
            min_exp: this.min_exp,
            max_exp: this.max_exp,
            from_salary: this.from_salary,
            to_salary: this.to_salary,
            current_location: this.current_location,
            optional_keywords: this.optional_keywords,
            mandate_keywords: this.mandate_keywords,
            excluding_keywords:this.excluding_keywords,
            functionalrole:this.functionalrole,
            industry:this.industry,
            designation:this.designation,
            notice_period:this.notice_period,
            active_in:this.active_in,
            gender:this.gender,
            resume_per_page:this.resume_per_page,
            company_name:this.company_name,
            exclude_company_name:this.exclude_company_name,
            notice_period :this.notice_period,
            ug_qualification_name:this.ug_qualification_name,
            ug_institute_name:this.ug_institute_name,
            ug_education_type:this.ug_education_type,
            start_graduation:this.start_graduation,
            to_graduation:this.to_graduation,
            display:this.display,
            page: page,
          },
        })
        .then((response) => {
          this.searchStatus = false;
          this.res_list = response.data;
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

    sendBulkMail(){
      if (!this.jobseeker_id.length) {
        swal(
          "Whoops, Please select at least one row to send email.",
          "You clicked the button!",
          "warning"
        );
      } 
      else{
        this.sendmail = true;
        axios.post("/send/bulk/mail",{
          params: {
            jobseeker_id: this.jobseeker_id,
            empEmail:this.empEmail,
            subject:this.input_subject,
            description:this.description
          }
        }).then((response) => {
          if (response.status === 200) {
            this.sendmail =false;
            toast({
              type: "success",
              title: "Mail Send Successfully",
            });
          }
        });
      }
    },

    comment(id){
      this.commentShow = id;
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
  created: function() {
    this.checkProfileVieworNot();
  const currentUrl = window.location.href;
  this.saveUrl = currentUrl;
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
  padding: 1rem;
}
.media-body ul {
  padding: 0;
}
.media-body ul li {
  list-style-type: none;
      color: #131313;
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
    border-bottom: 1px solid #ddd;
    padding-bottom: 8px;
    color: #4f4f4fdd;
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
 margin-bottom: 0;
 background-color:transparent !important;
  padding: 0;
  border: 0;
}
.resume-view {
  background-color:transparent;
  border: 0;
}
.result-count {
 
  float: right;
}
.card-content {
  /* border-left: 2px solid #f95602; */
}
.checkbox-all {
 
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
.hide-me {
  display: none;
}
.show-me {
  display: block;
}
.verify-check{
  color: green;
}
.cross{
  color: red;
}
.verify-section span{
      margin-right: 10px;
    margin-left: 10px;

}
.triangle-down{
    width: 0;
    height: 0;
    border-left: 50px solid transparent;
    border-right: 50px solid transparent;
    border-top: 100px solid #03c003;
    float: right;
    transform: skew(32deg,359deg);
    position: absolute;
    left: 22rem;
    bottom: 14rem;
}
</style>