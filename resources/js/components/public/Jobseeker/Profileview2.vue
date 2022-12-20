<template>
    <div id="profileview">
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
                    <li class="active">Profile</li>
                  </ol>
                </div>
  
                <div class="col-xs-12 col-sm-4 hidden-xs">
                  <p class="hot-line">
                    <i
                      class="fa fa-headphones mr-1 Phone is-animating"
                      aria-hidden="true"
                    ></i>
                    <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="pt">
        <div class="container profile-box">
            <div class="container">
                <div class="row" >
                <div class="col-md-5 lt-div">
                    <div>
                        <h1 class="" style="textAlign:left">{{ alldata.fname }} {{ alldata.lname }}</h1>
                        <h2 style="color: #002256;">{{ alldata.designation }}</h2>
                    </div>
                    <div>
                        <div class=" font-800 color-black;" style="font-size: 16px;" v-if="resumeInfos[0].cover_letter!==null">
                            {{resumeInfos[0].cover_letter}}
                        </div>
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div>
                        <img                      
                        class="mini-photo rounded-circle"
                        :src="'/jobseeker_profile_image/' + alldata.profile_pic_thumb"
                        width="150"
                        height="150"
                        v-if="alldata.profile_pic_thumb"
                    />
                    </div>
                </div>
                <div class="col-md-5 rt-div">
                    <div class="rit-cover">
                        <div class="contact-box pb-2">                        
                            <div class="detail text-right font-22 font-600 color-black ">
                                {{ alldata.contact }} <i  class="color-black fas fa-phone"></i><br />
                            </div>
                        </div>
                        <div class="contact-box pb-2">
                            <div class="detail text-right font-22 font-600 color-black ">
                                {{ alldata.email }}  <i  class=" color-black fas fa-globe-americas"></i><br />
                            </div>
                        </div>
                        <div class="contact-box pb-0 " v-if="alldata.linkedin !==null">
                        <div class="detail text-right">
                            <a :href="alldata.linkedin" class=" font-500 color-black;" target="_blank">
                            {{ alldata.linkedin }}
                            <i  class="font-22 font-600 color-black fab fa-linkedin-in"></i>
                            <br>
                            </a>
                        </div>
                    </div>
                    </div>
                </div> 
                </div>
                <div  class="about" id="print_no_buttons">
                  <div class="btn-ro row no-margin">
                    <ul class="btn-link">
                      <li>
                        <a
                          href="javascript.void(0)"
                          @click.prevent="printWindow()"
                          ><i class="fas fa-print"></i> Print Resume</a
                        >
                      </li>
  
                      <li v-if="alldata.resume">
                        <a :href="'/resume/' + alldata.resume" target="blank"
                          ><i class="fas fa-download"></i> Download Resume</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-5 ml-5">
                            <h2 class="bold-800 color-black">WORK EXPERINCE</h2>                   
                            <div class="my-3" v-for="professional in professionalDetails"
                            :key="professional.id">
                                <span style="background-color: #002256;
                                  padding: 8px 25px;
                                  position: relative;
                                  top: 29px;
                                  left: -78px;
                                  color : #002256;
                                  ">s</span>
                                <h2 class="bold-700 color-black">{{ alldata.designation }}</h2>
                                <h2 class="color-black">{{ professional.organisation }}</h2>
                                <span class="bold-600 font-20 color-blue" v-if="professional.currently_work_here != 1"
                                ><i>{{ professional.from_date }} to {{ professional.to_date }}</i>
                                </span>
                                <span class="bold-600 font-20 color-blue" v-else><i>{{ professional.from_date }} to Currently Working</i>
                                </span>
                                <ul>
                                    <li class="font-22 bold-500 color-black" v-if="professional.key_skill !==null">
                                    <i class="font-20 color-blue fa fa-circle"></i>
                                    <span class="font-weight-bold">Skills: </span>{{ professional.key_skill }}
                                    </li>
                                    <li class="font-22 bold-500 color-black" v-if="professional.responsibility !==null">
                                    <i class="font-20 color-blue fa fa-circle"></i>
                                    <span class="font-weight-bold">Responsibility: </span>{{ professional.responsibility }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="mt-5 ml-5">
                            <h2 class="bold-800 color-black">EDUCATION</h2>                   
                            <div class="mt-3"  v-for="educationalDetail in educationalDetails"
                                :key="'edu' + educationalDetail.id">
                                <span style="background-color: #000;
                                  padding: 8px 25px;
                                  position: relative;
                                  top: 29px;
                                  left: -78px;
                                  color : #000;
                                  ">s</span>
                                <h2 class="bold-600 color-black">{{ educationalDetail.degree_name }}</h2>
                                <h2 class=" color-black">({{ educationalDetail.institute_name }})  <span class="color-black">{{ educationalDetail.passing_year }}</span></h2>
                            </div>
                            
                        </div>
                    
                    
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="mt-5">
                                <h2 class="bold-800 color-black" >SKILLS</h2>     
                                <div>
                                    <span v-for="skl in skillInfo" :key="skl.id" class="profileview-skill-span mb-3"> {{ skl.skill }} </span>
                                    <!-- <span> <li v-for="skl in skillInfo" :key="skl.id">  {{ skl.skill }} <span v-if="skl.expert_level != ''">-</span> {{ skl.expert_level }}</li></span> -->
                                </div>
                            </div>                        
                        </div >
                        <div class="row " v-if="certInfos[0].certificate != 1">
                            <div class="mt-5">
                                <h2 class="bold-800 color-black" >CERTIFICATES</h2>     
                                <div v-for="cert in certInfos" :key="'cert' + cert.id">
                                    <span class="font-24 bold-600">{{ cert.course | capitalize }}</span><br>
                                    <span class="color-grey font-20 bold-600"><i>{{ cert.certificate_institute_name }} ({{ cert.cert_from_date }}  -  {{ cert.cert_to_date }})</i></span>
                                </div>
                            </div>                        
                        </div>
                        <div class="row " >
                            <div class="mt-5">
                                <h2 class="bold-800 color-black" >ADDITIONAL DETAILS</h2>     
                                <div>
                                    <!-- <span class="font-24 bold-600">{{ cert.course | capitalize }}</span><br>
                                    <span class="color-grey font-20 bold-600"><i>{{ cert.certificate_institute_name }} ({{ cert.cert_from_date }}  -  {{ cert.cert_to_date }})</i></span> -->
                                    <span class="mt-2 mb-1 font-24 bold-600 color-black">Experince :  <span class="bold-600 font-22 color-blue">{{ alldata.exp_year }} Yr {{
                                      alldata.exp_month}} Month </span></span><br>
                                    <span class="mt-2 mb-1 font-24 bold-600 color-black">Current Salary :  <span class="bold-600 font-22 color-blue">{{ alldata.current_salary }} LPA</span></span><br>
                                    <span class="mt-2 mb-1 font-24 bold-600 color-black">Expected Salary :  <span class="bold-600 font-22 color-blue">{{ alldata.expected_salary }} LPA</span></span><br>
                                    <span class="mt-2 mb-1 font-24 bold-600 color-black">Preferred Location :  <span class="bold-600 font-22 color-blue">{{ alldata.preferred_location }}</span></span><br>
                                    <span class="mt-2 mb-1 font-24 bold-600 color-black">Notice Period :  <span class="bold-600 font-22 color-blue">{{ alldata.notice_period ? alldata.notice_period : "Not Specified" }}</span></span><br>
                                  </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>          
        </div>
      </section>
      <main-footer></main-footer>
    </div>
  </template>
  
  <script>
  export default {
    name: "Profileview2",
    data() {
      return {
        year: [],
        month: [],
        inputs: [],
        educationalDetails: [],
        professionalDetails: [],
        form: new Form({}),
        certInfos: [],
        resumeInfos: [],
        skillInfo: "",
      };
    },
    mounted() {
      this.$store.dispatch("getAllData", "/jobseeker-profile");
      this.$store.dispatch("getAllProfile", "/userprofile");
    },
    computed: {
      alldata() {
        return this.$store.getters.getAllData;
      },
      allProfile() {
        return this.$store.getters.getAllProfile;
      },
    },
    methods: {
      printWindow() {
        var printContents = document.getElementById("pt").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
      },
      addPersonalDetail() {
        this.form
          .post("/add-personal-detail")
          .then(() => {
            this.$router.push("/userinfo");
            toast({
              type: "success",
              title: "Personal Detail Updated successfully",
            });
          })
          .catch(() => {});
      },
      getCertInfo() {
        axios.get("get-certification-detail").then((response) => {
          this.certInfos = response.data;
        });
      },
      getResumeInfo() {
        axios.get("get-resume-stage").then((response) => {
          this.resumeInfos = response.data;
        });
      },
      getSkillInformation() {
        axios.get("get-user-skill").then((response) => {
          this.skillInfo = response.data.data;
        });
      },
      getEducationalInfo() {
        axios.get("get-education-detail").then((response) => {
          this.educationalDetails = response.data;
        });
      },
      getProfessionalInfo() {
        axios.get("get-professional-detail").then((response) => {
          this.professionalDetails = response.data.data;
        });
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
      this.getResumeInfo();
      this.getEducationalInfo();
      this.getProfessionalInfo();
    },
  };
  </script>
  
  <style>
  .profileview-skill-span{
    padding: 5px 8px;
    background: #002256;
    color: white;
    border-radius: 5px;
    margin-left: 8px;
    font-size: 24px;
  }


  .bold-500{
    font-weight: 500!important;
  }

  .bold-600{
    font-weight: 600!important;
  }
  .bold-700{
    font-weight: 700!important;
  }
  .bold-800{
    font-weight: 800!important;
  }

  .font-24{
    font-size: 24px!important;
  }
  .font-22{
    font-size: 22px!important;
  }
  .font-20{
    font-size: 20px!important;
  }

  .color-black{
    color: #000!important;
  }
  .color-grey{
    color:grey;
  }
  .color-blue{
    color:#002256;
  }

  li{
    list-style-type: none!important;
  }

  hr{
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 2.5px solid #002256;
  }
  
  .profile-box .left-side .contact-box .icon i {
    line-height: 20px;
  }
  @media print{
      #print_no_buttons{
          display:none !important;
      }
  }
  </style>
  