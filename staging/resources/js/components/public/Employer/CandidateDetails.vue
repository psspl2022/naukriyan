<template>
  <div id="EmpDashboard">
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
                  <li class="active">Candidate details</li>
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
    <section class="text-center section top-adjust mt-2 mb-5">
      <div class="container">
      <div class="row">
      <div class="col-sm-8">
        <div class="candidate-detail">
        <!--  Personal info start-->
          <div class="greyed">Information</div>
           <div class="row">
             <div class="col-6 mt-4">
               <div class="title">Date of Birth</div>
               <div class="desc elps" title="">{{jsInfos.dob ? jsInfos.dob:'Not Available'}}</div>
             </div>
             <div class="col-6 mt-4">
               <div class="title">Gender</div>
               <div class="desc elps" title="">{{jsInfos.gender |capitalize}}</div>
             </div>
             <div class="col-6 mt-4">
               <div class="title">Current Working Location</div>
               <div class="desc elps" title="">{{jsInfos.currentWorkingLocation ? jsinfos.currentWorkingLocation :'Not Available'}}</div>
             </div>
             <div class="col-6 mt-4">
               <div class="title">Preffered Location</div>
               <div class="desc elps" title="">{{jsInfos.preferred_location ? jsInfos.preferred_location:'Not Available'}}</div>
             </div>
             <div class="col-6 mt-4">
               <div class="title">Notice Period</div>
               <div class="desc elps" title="">{{jsInfos.notice_period ? jsInfos.notice_period:'Not Available'}}</div>
             </div>


           </div>
          <!--  Personal info end-->
          <!--  education info start-->
          <div class="greyed mt-4">Educational Information</div>
          <table class="table table-bordered  mt-3">
            <tbody>
            <tr class="table-info">
              <th>Year of Completion</th>
              <th>Qualification</th>
              <th>Degree/Stream Name	</th>
              <th>Institute Name
              </th>
              <th>Institute Location
              </th>
              <th>Percentage/Grade
              </th>
            </tr>
            </tbody>
            <tbody>
            <tr v-for="eds in educationalDetails" :key="eds.id">
              <td>{{eds.passing_year}}</td>
              <td>{{eds.qualification}}</td>
              <td>{{eds.degree_name}}</td>
              <td>{{eds.institute_name}}</td>
               <td>{{eds.institute_location}}</td>
               <td>{{eds.percentage_grade}}</td>
            </tr>
            </tbody>
          </table>
          <!--  education info end-->
          <!--professional qualification start-->
          <div class="greyed mt-4">Professional Information</div>
          <div class="row" v-for="prfs in professionalDetails" :key="prfs.id">
            <div class="col-6 mt-4">
              <div class="title">Designation</div>
              <div class="desc elps" title="">{{prfs.designations}}</div>
            </div>
            <div class="col-6 mt-4">
              <div class="title">Company Name</div>
              <div class="desc elps" title="">{{prfs.organisation}}</div>
            </div>
            <div class="col-6 mt-4">
              <div class="title">Experience(From-To)</div>
              <div class="desc elps" title="">{{moment(prfs.from_date).format("MMM Do YY") }} || {{moment(prfs.to_date).format("MMM Do YY")}}</div>
            </div>
            <div class="col-6 mt-4">
              <div class="title">Industry</div>
              <div class="desc elps" title="">{{prfs.industry_name}}</div>
            </div>
            <div class="col-6 mt-4">
              <div class="title">Functional Area
              </div>
              <div class="desc elps" title="">{{prfs.functional_role}}
              </div>
            </div>
            <div class="col-6 mt-4">
              <div class="title">Roles and Responsibility</div>
              <div class="desc elps" title="">{{prfs.responsibility}}</div>
            </div>
            <div class="col-6 mt-4">
              <div class="title">Job Type</div>
              <div class="desc elps" title="">{{prfs.job_type}}</div>
            </div> 
            <div style="border-bottom:1px solid #ddd;width:100%;margin-top:15px;"></div>

          </div>
         
          <!--professional qualification end-->
          <!--skills start-->
          <div class="greyed mt-4">Skills</div>
          <div class="skills-section">
            <div class="row">
              <div class="col-6" v-for="skl in skillInfo" :key="skl.id">
                <p>{{skl.skill}}</p>

                  <div class="skills beginner" v-if="skl.expert_level=='beginner'">33%</div>
                  <div class="skills moderate" v-if="skl.expert_level=='moderate'">66%</div>
                  <div class="skills expert" v-if="skl.expert_level=='expert'">100%</div>
                  

              </div>
            </div>


          </div>
          <!--skills end-->
        </div>
      </div>
        <!--side section-->
      <div class="col-sm-4">
        <div data-v-1c45bd0c="" class="card profile-card mt-0">
          <div data-v-1c45bd0c="" class="card-header">
            <img data-v-1c45bd0c="" :src="'/jobseeker_profile_image/' + jsInfos.profile_pic_thumb" class="" style="width:100px;" v-if="jsInfos.profile_pic_thumb">
            <img data-v-1c45bd0c="" src="default_images/no_image_available.png" class="" style="width:100px;" v-else>
            <br>

          </div>
          <div class="candidate-info">
          <h4>{{jsInfos.fname}} {{jsInfos.lname }}</h4>
          <p>{{jsInfos.designation ? jsInfos.designation:'Fresher'}}</p>

            <ul>
              <li><i class="fas fa-map-marker-alt"></i>&nbsp;{{jsInfos.address}}</li>
              <li><i class="far fa-envelope"></i>&nbsp;{{jsInfos.email}}</li>
              <li><i class="fas fa-phone"></i>&nbsp; {{jsInfos.contact}}</li>
            </ul>

          </div>
        </div>

     <!-- candidate resume-->
        <div class="resume-card mt-3" v-if="jsInfos.resume">
          <div class="candidate-resume">
            <b>{{jsInfos.resume}} </b><p>-  Uploaded on {{getHumanDate(jsInfos.resume_upload_date)}}</p>
            <!-- <button class="btn btn-primary mb-3">View resume</button><br> -->
            <a :href="'resume/' + jsInfos.resume" target="_blank" v-if="jsInfos.resume"><button class="btn btn-primary">Download resume <i class="fas fa-download"></i></button></a>
          </div>
        </div>
    <!--youtube resume-->
        <div class="video-resume mt-4" v-if="jsInfos.resume_video_link">
          <h4>Candidate's video resume </h4>
          
             <video-embed css="embed-responsive-4by3" :src="`${jsInfos.resume_video_link}`" ></video-embed>

        </div>
      </div>
      </div>
      </div>

    </section>
    <main-footer></main-footer>
  </div>
</template>

<script>
var moment = require("moment");
export default {
  name: "CandidateDetails",
  data() {
    return {
      jsID : this.$route.params.jsid,
      year: [],
      month: [],
      inputs: [],
      educationalDetails: [],
      professionalDetails: [],
      form: new Form({}),
      certInfos: "",
      skillInfo: "",
      jsInfos:"",
      moment: moment,
    };
  },
  mounted() {
  },
  computed: {
    
  },
   methods: {
     getStoreProfileBy(){
       axios.get("/store/profile/view/"+this.jsID).then((response) => {
         console.log(response);
      });
     },
     getJobseekerinfo(){
       axios.get("/jobseeker/personal/info/"+this.jsID).then((response) => {
        this.jsInfos = response.data.jsInfo;
      });
     },
    getCertInfo() {
      axios.get("/jobseeker/certificate/info/"+this.jsID).then((response) => {
        this.certInfos = response.data.userCertInfo;
      });
    },
    getSkillInformation() {
      axios.get("/jobseeker/skill/info/"+this.jsID).then((response) => {
        this.skillInfo = response.data.data;
      });
    },
    getEducationalInfo() {
      axios.get("/jobseeker/education/info/"+this.jsID).then((response) => {
        this.educationalDetails = response.data.educationalDetails;
      });
    },
    getProfessionalInfo() {
      axios.get("/jobseeker/proffesional/info/"+this.jsID).then((response) => {
        this.professionalDetails = response.data.data;
      });
    },
    getHumanDate: function (date) {
      return moment(date).fromNow();
    },
  },
   filters: {
    capitalize: function (val) {
      if (!val) return "";
      val = val.toString();
      return val.charAt(0).toUpperCase() + val.slice(1);
    },
  },
  created() {
    this.getSkillInformation();
    this.getCertInfo();
    this.getEducationalInfo();
    this.getProfessionalInfo();
    this.getJobseekerinfo();
    this.getStoreProfileBy();
  },
};
</script>

<style scoped>
.candidate-detail{
  background-color: #fff;
  padding: 15px 30px;
  text-align: start;
  font-weight: 500;
}
.candidate-info{
  margin-top: 10px;
  text-align: left;
  padding: 0 20px;
}
.candidate-resume{
  background-color: #fff;
  padding: 15px;
  border: 1px dashed #b1b1b1;
}
.resume-card{
  padding: 1rem;
  background-color: #fff;
}
.candidate-info p:first-child{

  text-align: left;
  padding: 0 20px;
}
.greyed {
  background-color: #ddd;
  width: 100%;
  text-align: center;
  font-family: 'Open Sans';
  font-size: 18px;
  letter-spacing: 6px;
  font-weight: 600;
  margin: auto;
  line-height: 28px;
}
.title{
  color: #a2a2a2;
  line-height: 1rem;
}
.beginner {
  width: 33%;
  background-color:  #f44336;
  padding: 0 11px;
  color: #fff;}
.moderate {width: 66%; background-color: #2196F3;padding: 0 11px;
  color: #fff}
.expert {width: 100%; background-color:#4CAF50;padding: 0 11px;
  color: #fff}


.skills {
  text-align: right;

  color: white;
}
.skills-section p{
  margin-top: 15px;
  margin-bottom: 5px;
  font-size: 19px;
  font-weight: 500;
}
.candidate-detail, .profile-card, .video-resume, .profile-card, .resume-card{
  box-shadow: 0px 1px 20px 0 rgb(222 221 221);
}
.profile-card .card-header {
  background-color: #28255a;
}
.video-resume{
  background-color: #fff;
  padding: 1rem;
}
.candidate-info ul li{
  list-style-type: none;
  line-height: 2;
}
.candidate-info ul{
  padding: 0;
}
.candidate-info p{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>