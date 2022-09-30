<script>
export default {
  data() {
    return {
      count: 0
    }
  }
}
</script>

<template>
<div class="services-offered">
  <Emp-header></Emp-header>
  <section class="">
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Services Offered</li>
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
              <h2 class="hk-pg-title">Candidate Detail Form</h2>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <!-- <i class="fa fa-info" aria-hidden="true"></i
                ><span style="color: red">
                  Job Title,Job for,Job Sector and Job description are
                  Mandatory</span
                > -->
                <form
                  class="popupForm"
                  role="form"
                  method="post"
                  @submit.prevent="addregistration()"
                >
                  <fieldset class="mt-3">
                    <legend>General Information</legend>
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <label class="col-form-label" for="">
                          Name<span style="color: red"> * </span> </label
                        >
                        <input
                          type="text"
                          class="form-control"
                          name="name"
                          placeholder="Enter Full Name"
                          v-model="form.name"
                          :class="{ 'is-invalid': form.errors.has('title') }"
                        />
                        <has-error :form="form" field="title"></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for="">
                          Email<span style="color: red"> * </span> </label
                        >
                        <input
                          type="email"
                          class="form-control"
                          name="email"
                          placeholder="Enter Email Address"
                          v-model="form.email"
                          :class="{ 'is-invalid': form.errors.has('email') }"
                        />
                        <has-error :form="form" field="email"></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for="">Services<span style="color: red"> * </span> </label>
                        <select
                          class="form-control custom-select"
                          name="services_id"
                          v-model="form.services_id"
                          :class="{
                            'is-invalid': form.errors.has('services_id'),
                          }"
                        >
                          <option disabled value="">Select Services</option>
                          <option 
                          :value="service.id" 
                          v-for="service in allServices"
                          :key="service.id"
                          >
                            {{ service.name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="services_id"
                        ></has-error>
                      </div>

                      
                    </div>
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Industry</label
                        >
                        <select
                          class="form-control custom-select"
                          name="job_industry_id"
                          v-model="form.job_industry_id"
                          :class="{
                            'is-invalid': form.errors.has('job_industry_id'),
                          }"
                        >
                          <option disabled value="">Select Industry</option>
                          <option
                            :value="industry.id"
                            v-for="industry in allIndustry"
                            :key="industry.id"
                          >
                            {{ industry.category_name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_industry_id"
                        ></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Functional area</label
                        >
                        <select
                          class="form-control custom-select"
                          name="job_functional_role_id"
                          v-model="form.job_functional_role_id"
                          :class="{
                            'is-invalid': form.errors.has(
                              'job_functional_role_id'
                            ),
                          }"
                        >
                          <option disabled value="">
                            Select Functional area
                          </option>
                          <option
                            :value="functional.id"
                            v-for="functional in allDesignation"
                            :key="functional.id"
                          >
                            {{ functional.subcategory_name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_functional_role_id"
                        ></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Category</label
                        >

                        <select
                          class="form-control custom-select"
                          name="job_category_id"
                          v-model="form.job_category_id"
                          :class="{
                            'is-invalid': form.errors.has('job_category_id'),
                          }"
                        >
                          <option disabled value="">Select Category</option>
                          <option
                            :key="category.id"
                            :value="category.id"
                            v-for="category in allApplied"
                          >
                            {{ category.job_category }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_category_id"
                        ></has-error>
                      </div>

                      
                    </div>

                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <label class="col-form-label" for="">State</label>
                        <select
                          class="form-control custom-select"
                          name="job_state_id"
                          v-model="form.job_state_id"
                          :class="{
                            'is-invalid': form.errors.has('job_state_id'),
                          }"
                          @change="getCities()"
                        >
                          <option disabled value="">Select state</option>
                          <option :value="state.id" v-for="state in states"
                            :key="state.id">
                            {{ state.states_name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_state_id"
                        ></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""> City</label>
                        <select
                          class="form-control"
                          name="job_city_id"
                          v-model="form.job_city_id"
                          :class="{
                            'is-invalid': form.errors.has('job_city_id'),
                          }"
                        >
                          <option value="">Select City</option>
                          <option :value="city.id" v-for="city in cities"
                          :key="city.id">
                            {{ city.cities_name }}
                          </option>
                        </select>
                        <has-error :form="form" field="p_city_id"></has-error>
                      </div>

                      <div class="col-sm-4">
                        <label class="col-form-label" for="">Address</label>
                        <textarea
                          name="job_address"
                          class="form-control"
                          placeholder="Enter Address"
                          v-model="form.job_address"
                          :class="{
                            'is-invalid': form.errors.has('job_address'),
                          }"
                        ></textarea>
                        <has-error :form="form" field="job_address"></has-error>
                      </div>
                      
                    </div>
                  </fieldset>
                  

                  <button type="submit" class="btn btn-primary mt-3">
                    Save
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- open modal on page load start -->

      <!-- close modal on page load end -->

      <!-- /.row -->
    </section>
  <!-- <button @click="count++">You clicked me {{ count }} times.</button> -->
</div>
</template>

<script>
import $ from "jquery";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
  name: "ServicesOffered",

  data() {
    //let now = new Date()
    return {
      editor: ClassicEditor,
      show_questionnarie: false,
      ctcEnableDisable: true,
      job_industry_id: [],
      job_functional_role_id: [],
      job_state_id: [],
      job_sector_id: [],
      job_carreer_level: [],
      job_qualification_id: [],
      job_shift_id: [],
      job_benefits_id: [],
      job_posted_type_id: [],
      job_category_id: [],
      services_id: [],

      states: [],
      city: 0,
      cities: [],

      form: new Form({
        company_id: "",
        title: "",
        email: "",
        job_category_id: "",
        staticSelect: "",
        job_address: "",
        job_city_id: "",
        job_state_id: "",
        job_role: "",
        job_type_id: "",
        job_industry_id: "",
        job_functional_role_id: "",
        services_id: "",
      }),
      demo: new Form({
        client_name: "",
        email: "",
        contact: "",
        address: "",
      }),
      empProfile: new Form({
        com_contact: "",
        com_email: "",
      }),
      createStatus: false,
      updateStatus: false,
      location: [],
      clientList: [],
      resData: "",
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/getindustry/master");
    this.$store.dispatch("getAllOrganisations", "/getcompanies");
    this.$store.dispatch("getAllDesignation", "/getfunctionalrole");
    this.$store.dispatch("getAllJobtype", "/getjobpostedtype");
    this.$store.dispatch("getAllFee", "/getjobsector");
    this.$store.dispatch("getAllCategory", "/getcareerlevel");
    this.$store.dispatch("getAllQualification", "/getqualification");
    this.$store.dispatch("getAllLocation", "/getjobtype");
    this.$store.dispatch("getAllJobshift", "/getjobshift");
    this.$store.dispatch("getAllBloodGroup", "/getjobbenefit");
    this.$store.dispatch("getAllApplied", "/getjobcategory");
    this.$store.dispatch("getAllProfile", "/employer-profile");
    this.$store.dispatch("getAllRecruiter", "/getsalaries");
    this.$store.dispatch("getAllServices", "/get-services");
    this.getStates();
    if (localStorage.getItem("reloaded")) {
      // The page was just reloaded. Clear the value from local storage
      // so that it will reload the next time this page is visited.
      localStorage.removeItem("reloaded");
    } else {
      // Set a flag so that we know not to reload the page twice.
      localStorage.setItem("reloaded", "1");
      location.reload();
    }
    this.getAllLocation();
  },
  computed: {
    years() {
      const year = new Date().getFullYear();
      return Array.from(
        { length: year - 1960 },
        (value, index) => 1960 + index + 1
      );
    },
    experiences() {
      const exp = 20;
      return Array.from({ length: exp - 0 }, (value, index) => 0 + index);
    },
    allProfile() {
      return this.$store.getters.getAllProfile;
    },

    allIndustry() {
      return this.$store.getters.getAllData;
    },

    allOrganisations() {
      return this.$store.getters.getAllOrganisations;
    },

    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },

    allJobtype() {
      return this.$store.getters.getAllJobtype;
    },

    allFee() {
      return this.$store.getters.getAllFee;
    },

    category() {
      return this.$store.getters.getAllCategory;
    },

    allQualification() {
      return this.$store.getters.getAllQualification;
    },

    allLocation() {
      return this.$store.getters.getAllLocation;
    },

    jobshift() {
      return this.$store.getters.getAllJobshift;
    },

    bloodgroup() {
      return this.$store.getters.getAllBloodGroup;
    },

    allApplied() {
      return this.$store.getters.getAllApplied;
    },

    allRecruiter() {
      return this.$store.getters.getAllRecruiter;
    },

    allpost() {
      return this.$store.getters.getAllPost;
    },

    allServices() {
      return this.$store.getters.getAllServices;
    },
  },

  created() {
    this.getStates();
  },

  methods: {
    checkProfileComplete() {
      axios.get("/check/empProfile/complete").then((response) => {
        this.resData = response.data.data;
        if (
          response.data.data.com_email == null ||
          response.data.data.com_email == "" ||
          response.data.data.com_contact == null ||
          response.data.data.com_contact == ""
        ) {
          $("#updateEmpProfile").modal("show");
          // swal.fire({
          //   icon: "error",
          //   title: "Profile Pending....",
          //   text: "Company and Personal Profile is Pending.Please Fill All Mandatory Fields",
          // });
          //this.$router.push("/editemployer");
        }
      });
    },
    updateEmpUser() {
      this.updateStatus = true;
      this.empProfile.post("/post/job/update-employer").then(() => {
        toast({
          type: "success",
          title: "Successfully Updated",
        });

        this.updateStatus = false;
        $("#updateEmpProfile").modal("hide");
        window.location.reload();
        //this.$router.push("/postnewjob");
      });
    },
    openClient() {
      if (this.form.client_name === "add_client") {
        $("#addSubUser").modal("show");
      }
    },
    addsubuser() {
      this.createStatus = true;
      this.demo.post("/add-client").then(() => {
        toast({
          type: "success",
          title: "Client Added Successfully",
        });
        Fire.$emit("afterUpdate");
        //window.location.reload();
        this.createStatus = false;
        $("#addSubUser").modal("hide");
      });
    },
    getAllLocation() {
      axios.get("/master/location/group").then((response) => {
        this.location = response.data.data;
      });
    },
    getClientList() {
      axios.get("/client-list").then((response) => {
        this.clientList = response.data.data;
      });
    },
    disablefutureDate() {
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if (month < 10) month = "0" + month.toString();
      if (day < 10) day = "0" + day.toString();

      var maxDate = year + "-" + month + "-" + day;

      return maxDate;
    },
    checkSalaryDisclose(event) {
      let salValue = event.target.value;
      if (salValue === "Yes") {
        return (this.ctcEnableDisable = false);
      } else {
        return (this.ctcEnableDisable = true);
      }
    },
    getStates() {
      axios.get("/getstates").then((response) => {
        this.states = response.data.data;
      });
    },

    getCities: function () {
      axios
        .get("/get-cities", {
          params: {
            state_id: this.form.job_state_id,
          },
        })
        .then(
          function (response) {
            this.cities = response.data.data;
          }.bind(this)
        );
    },

    cascade: function (e) {
      this.show_questionnarie = e.target.value === "Yes";
    },

    addregistration() {
      if (
        this.form.name === "" ||
        this.form.email === "" ||
        this.form.services_id === ""
      ) {
        swal("Please fill all mandatory fields");
      } else {
        this.form.post("/add-services-registration").then(() => {
          // this.$router.push("/postjob"); 
          toast({
            type: "success",
            title: "Registration Done successfully",
          });
        });
      }
    },
  },
  created() {
    this.disablefutureDate();
    this.getClientList();
    this.checkProfileComplete();
    Fire.$on("afterUpdate", () => {
      this.getClientList();
    });
  },
};
</script>

<style scoped>
</style>