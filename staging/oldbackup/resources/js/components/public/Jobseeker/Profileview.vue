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
        <div class="row" id="printProfile">
          <div class="col-md-4 pl-0">
            <div class="left-side">
              <div class="profile-info">
                <img
                  class="mini-photo rounded-circle"
                  :src="'/jobseeker_profile_image/' + alldata.profile_pic_thumb"
                  width="36"
                  height="36"
                  v-if="alldata.profile_pic_thumb"
                />

                <img
                  class="mini-photo rounded-circle"
                  src="default_images/no_image_available.png"
                  width="36"
                  height="36"
                  v-else
                />
                <h3>{{ alldata.fname }} {{ alldata.lname }}</h3>
                <span>{{ alldata.designation }}</span>
              </div>
              <h4 class="ltitle">Contact</h4>
              <div class="contact-box pb0">
                <div class="icon">
                  <i class="fas fa-phone"></i>
                </div>
                <div class="detail">
                  {{ alldata.contact }} <i class="fas fa-check-circle"></i
                  ><br />
                </div>
              </div>
              <div class="contact-box pb0">
                <div class="icon">
                  <i class="fas fa-globe-americas"></i>
                </div>
                <div class="detail">
                  {{ alldata.email }} <i class="fas fa-check-circle"></i><br />
                </div>
              </div>
              <div class="contact-box">
                <div class="icon">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="detail">
                  {{ alldata.address }}
                </div>
              </div>

              <h4 class="ltitle">Job Details</h4>

              <div class="refer-cov">
                <li>
                  <i class=""></i>Expected Salary-
                  {{ alldata.expected_salary }} / Year
                </li>
                <li>
                  <i class=""></i>Preferred Location -
                  {{ alldata.preferred_location }}
                </li>
                <li>
                  <i class=""></i>Notice Period - {{ alldata.notice_period }}
                </li>
                <li>
                  <i class=""></i>Current Salary- {{ alldata.current_salary }} /
                  Year
                </li>
                <li>
                  <i class=""></i>Experience- {{ alldata.exp_year }} Yr-{{
                    alldata.exp_month
                  }}
                  Month
                </li>
                <li><i class=""></i>Date of Birth - {{ alldata.dob }}</li>
              </div>

              <h4 class="ltitle">Profile</h4>

              <div class="refer-cov">
                <li>Personal <i class="fas fa-check-circle"></i></li>
                <li>Professional <i class="fas fa-check-circle"></i></li>
                <li>Skills <i class="fas fa-check-circle"></i></li>
                <li>Certification <i class="fas fa-check-circle"></i></li>
                <li>Education <i class="fas fa-check-circle"></i></li>
                <li>Resume <i class="fas fa-check-circle"></i></li>
              </div>
            </div>
          </div>
          <div class="col-md-8 rt-div">
            <div class="rit-cover">
              <div class="hotkey">
                <h1 class="">{{ alldata.fname }} {{ alldata.lname }}</h1>
                <small>{{ alldata.designation }}</small>
              </div>
              <h2 class="rit-titl"><i class="far fa-user"></i> Profile</h2>
              <div class="about">
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

              <h2 class="rit-titl">
                <i class="fas fa-briefcase"></i> Work Experience
              </h2>
              <div
                class="work-exp"
                v-for="professional in professionalDetails"
                :key="professional.id"
              >
                <h6>
                  {{ professional.designations
                  }}<span
                    >{{ professional.from_date }} -
                    {{ professional.to_date }}</span
                  >
                </h6>
                <i>{{ professional.organisation }}</i>
                <ul>
                  <li>
                    <i class="far fa-hand-point-right"></i>
                    {{ professional.functional_role }}
                  </li>
                  <li>
                    <i class="far fa-hand-point-right"></i>
                    {{ professional.responsibility }}
                  </li>
                </ul>
              </div>
              <h2 class="rit-titl">
                <i class="fas fa-certificate"></i> Certificates
              </h2>
              <div class="work-exp">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered">
                      <tbody>
                        <tr class="table-info">
                          <th>Duration</th>
                          <th>Certification Name</th>
                          <th>Certified By</th>
                          <th>Mode</th>
                        </tr>
                      </tbody>
                      <tbody>
                        <tr v-for="cert in certInfos" :key="'cert' + cert.id">
                          <td>
                            {{ cert.cert_from_date }} - {{ cert.cert_to_date }}
                          </td>
                          <td>{{ cert.course | capitalize }}</td>
                          <td>{{ cert.certificate_institute_name }}</td>
                          <td>{{ cert.certification_type | capitalize }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <h2 class="rit-titl">
                <i class="fas fa-graduation-cap"></i> Education
              </h2>
              <div class="education">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-bordered">
                      <tbody>
                        <tr class="table-info">
                          <th width="21%">Year of Completion</th>
                          <th>Qualification</th>
                          <th width="16%">Degree Name</th>
                          <th>Institute Name</th>
                        </tr>
                        <tr
                          v-for="educationalDetail in educationalDetails"
                          :key="'edu' + educationalDetail.id"
                        >
                          <td>{{ educationalDetail.passing_year }}</td>
                          <td>{{ educationalDetail.qualification }}</td>
                          <td>{{ educationalDetail.degree_name }}</td>
                          <td>{{ educationalDetail.institute_name }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <h2 class="rit-titl"><i class="fas fa-users-cog"></i> Skills</h2>
              <div class="profess-cover row no-margin">
                <div class="col-md-6" v-for="skl in skillInfo" :key="skl.id">
                  <div class="prog-row row">
                    <div class="col-sm-6">
                      {{ skl.skill }}
                    </div>
                    <div class="col-sm-6">
                      <div
                        class="progress"
                        v-if="skl.expert_level === 'beginner'"
                      >
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 33%"
                          aria-valuenow="25"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <div
                        class="progress"
                        v-if="skl.expert_level === 'moderate'"
                      >
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 66%"
                          aria-valuenow="25"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                      <div
                        class="progress"
                        v-if="skl.expert_level === 'expert'"
                      >
                        <div
                          class="progress-bar"
                          role="progressbar"
                          style="width: 100%"
                          aria-valuenow="25"
                          aria-valuemin="0"
                          aria-valuemax="100"
                        ></div>
                      </div>
                    </div>
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
  name: "Profileview",
  data() {
    return {
      year: [],
      month: [],
      inputs: [],
      educationalDetails: [],
      professionalDetails: [],
      form: new Form({}),
      certInfos: "",
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
      axios.get("get-certificate-info").then((response) => {
        this.certInfos = response.data.userCertInfo;
      });
    },
    getSkillInformation() {
      axios.get("get-user-skill").then((response) => {
        this.skillInfo = response.data.data;
      });
    },
    getEducationalInfo() {
      axios.get("get-educational-info").then((response) => {
        this.educationalDetails = response.data.educationalDetails;
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
    this.getEducationalInfo();
    this.getProfessionalInfo();
  },
};
</script>

<style>
.profile-box .left-side .contact-box .icon i {
  line-height: 20px;
}
</style>
