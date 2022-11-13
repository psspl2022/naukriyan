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
      certInfos: [],
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
        this.professionalDetails = response.data;
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
