<template>
  <div class="row stage-main-div">
    <div class="col-sm-12">
      <!-- <i class="fa fa-info" aria-hidden="true"></i
      ><span class="validation-msg"> Name,Email,Contact No</span> -->
      <form class="popupForm" role="form" method="post" @submit.prevent="addPersnol()">
        <fieldset>
          <legend>Profile Details</legend>
          <div class="row mb-2">
            <div class="col-sm-3">
              <div class="profile-pic m-0">
                <label
                  for="file-input"
                  style="display: flex; justify-content: center; align-items: center"
                >
                  <img
                    id="previewImg"
                    :src="'/jobseeker_profile_image/' + form.profile_pic_thumb"
                    style="width: 150px; height: 140px; border: 1px solid #002256"
                    v-if="form.profile_pic_thumb"
                  />
                  <img
                    id="previewImg"
                    src="default_images/no_image_available.png"
                    style="width: 150px; height: 150px; border: 1px solid orange"
                    v-else
                  />
                  <i class="fas fa-camera " id="cam"></i>
                </label>
                <input
                  class="d-none"
                  id="file-input"
                  type="file"
                  accept="image/*"
                  @change="onProfileChanged"
                />
                <button @click="onUploadImg" ref="myBtnImg" class="d-none">
                  Upload!
                </button>
              </div>
              <has-error :form="form" field="fname"></has-error>
            </div>
            <div class="col-sm-9 d-sm-flex m-0 p-0">
              <div class="col-sm-6 m-0 p-0">
                <div class="col-sm-12">
                  <label class="col-form-label" for="">                    
                    <span class="validation-msg"> *</span>
                    First Name
                    <span
                      :class="
                        valid.fname
                          ? 'remove-validation-msg'
                          : 'validation-msg'
                      "
                      >{{ errMsg.fname }}</span
                    ></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    name="fname"
                    :class="valid.fname ? '' : 'border-color-red'"
                    v-on:keyup="nameCheck"
                    placeholder="Enter First Name"
                    v-model="form.fname"
                  />
                  <has-error :form="form" field="fname"></has-error>
                </div>
                <div class="col-sm-12">
                  <label class="col-form-label" for="">                    
                    <span class="validation-msg"> *</span>
                    Email
                    <span
                      :class="
                        valid.email
                          ? 'remove-validation-msg'
                          : 'validation-msg'
                      "
                    >
                      {{ errMsg.email }}
                    </span></label
                  >
                  <input
                    type="email"
                    class="form-control"
                    :class="[{ 'is-invalid': form.errors.has('email') },valid.email ? '' : 'border-color-red']"
                    
                    name="email"
                    v-on:keyup="emailCheck"
                    placeholder="Enter Email"
                    title="Enter Vaild Mail"
                    v-model="form.email"
                    
                  />
                  <has-error :form="form" field="email"></has-error>
                </div>
              </div>
              <div class="col-sm-6 m-0 p-0">
                <div class="col-sm-12">
                  <label class="col-form-label" for="">                    
                    <span class="validation-msg"> *</span>
                    Last Name
                    <span
                      :class="
                        valid.lname
                          ? 'remove-validation-msg'
                          : 'validation-msg'
                      "
                    >
                      {{ errMsg.lname }}
                    </span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    name="lname"
                    placeholder="Enter Last Name"
                    :style="valid.lname ? '' : 'border-color:red !important'"
                    v-on:keyup="lnameCheck"
                    v-model="form.lname"
                    :class="{ 'is-invalid': form.errors.has('lname') }"
                  />
                  <has-error :form="form" field="lname"></has-error>
                </div>
                
               
                <div class="col-sm-12">
                  <label class="col-form-label" for="">
                    <span class="validation-msg"> * </span>
                    Contact No.                  
                    <span
                      :class="
                        valid.contact
                          ? 'reomve-validation-msg'
                          : 'validation-msg'
                      "
                    >
                      {{ errMsg.contact }}
                    </span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    name="contact_no"
                    :style="valid.contact ? '' : 'border-color:red !important'"
                    v-on:keyup="contactCheck"
                    placeholder="Enter Full Contact No"
                    v-model="form.contact_no"
                    :class="{ 'is-invalid': form.errors.has('contact_no') }"
                  />
                  <has-error :form="form" field="contact_no"></has-error>
                </div>
              </div>
            </div>
          
            <div class="col-sm-4">
              <label class="col-form-label" for="">Designation</label>
              <input
                    type="text"
                    class="form-control"
                    name="designation"
                    placeholder="Enter Designation"
                    v-model="form.designation"
                  />
              <has-error :form="form" field="designation"></has-error>
            </div>

            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span class="validation-msg"> * </span>
                Date Of Birth</label
              >
              <VueDatePicker
                v-model="form.date"
                ref="menu"
                placeholder="YYYY-MM-DD"
                :max-date="new Date().toISOString().substr(0, 10)"
                min-date="1980-01-01"
                @onOpen="menu = true"
                @onClose="menu = false"
              />

              <has-error :form="form" field="gender"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span class="validation-msg"> * </span>
                 Gender</label
              >
              <select
                class="form-control custom-select"
                name="gender"
                v-model="form.gender"
                :class="{
                  'is-invalid': form.errors.has('gender'),
                }"
              >
                <option value="" disabled>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
              </select>
              <has-error :form="form" field="gender"></has-error>
            </div>
         
            <div class="col-sm-4">
              <div class="">
                <div class="row">
                  <div class="col-sm-6">
                    <label class="col-form-label" for="">Experience</label>
                    <select
                      class="form-control"
                      name="exp_year"
                      v-model="form.exp_year"
                      :class="{
                        'is-invalid': form.errors.has('exp_year'),
                      }"
                    >
                      <option value="" disabled>Year</option>
                      <option v-for="exper in experienceYear" :key="exper" :value="exper">
                        {{ exper }}
                      </option>
                      <option value="20+">
                        19+ 
                      </option>
                    </select>
                  <span class="experience-span">year(s)</span>
                    <has-error :form="form" field="exp_year"></has-error>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label" style="visibility: hidden" for=""
                      >Month</label
                    >
                    <select
                      class="form-control"
                      name="exp_mon"
                      v-model="form.exp_mon"
                      :class="{
                        'is-invalid': form.errors.has('exp_mon'),
                      }"
                    >
                      <option value="" disabled>Month</option>
                      <option v-for="exper in experienceMonth" :key="exper" :value="exper">
                        {{ exper }}
                      </option>
                    </select>
                  <span class="experience-span">month(s)</span>
                    <has-error :form="form" field="exp_mon"></has-error>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">Select Industry</label>
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
              <has-error :form="form" field="job_industry_id"></has-error>
            </div>

            <div class="col-sm-4">
              <label class="col-form-label" for="">Select Functional area</label>
              <select
                class="form-control custom-select"
                name="job_functional_role_id"
                v-model="form.job_functional_role_id"
                :class="{
                  'is-invalid': form.errors.has('job_functional_role_id'),
                }"
              >
                <option disabled value="">Select Functional area</option>
                <option
                  :value="functional.id"
                  v-for="functional in allDesignation"
                  :key="functional.id"
                >
                  {{ functional.subcategory_name }}
                </option>
              </select>
              <has-error :form="form" field="job_functional_role_id"></has-error>
            </div>
            <div class="col-sm-2">
                <label class="col-form-label w-100" for="">
                  <!-- <span class="validation-msg"> * </span> -->
                    Current Salary(LPA)
                <span
                      :class="
                        valid.salary.current
                          ? 'reomve-validation-msg'
                          : 'validation-msg'
                      "
                      > {{ errMsg.salary.current }}</span></label>
                <input
                    type="number"
                    class="form-control"
                    name="curr_sal"
                    placeholder="Enter Current Salary"
                    v-on:keyup="salaryCheck(form.curr_sal, 'current')"
                    v-model="form.curr_sal"
                      min="0"
                    step="0.01"
                  />
                <has-error :form="form" field="curr_sal"></has-error>
            </div>
            <div class="col-sm-2">
                <label class="col-form-label w-100" for="">
                  <!-- <span class="validation-msg"> * </span> -->
                  Expected Salary(LPA)<span
                      :class="
                        valid.salary.expected
                          ? 'reomve-validation-msg'
                          : 'validation-msg'
                      "> {{ errMsg.salary.expected }}
                    </span></label>
                <input
                    type="number"
                    class="form-control"
                    name="exp_sal"
                    v-on:keyup="salaryCheck(form.exp_sal, 'expected')"
                    placeholder="Enter Expected Salary"
                    v-model="form.exp_sal"
                    min="0"
                    step="0.01"
                  />
                <has-error :form="form" field="exp_sal"></has-error>
            </div>

            <div class="col-sm-4">
              <label class="col-form-label" for="">Select Notice Period</label>
              <select
                class="form-control custom-select"
                name="notice_period"
                v-model="form.notice_period"
                :class="{
                  'is-invalid': form.errors.has('notice_period'),
                }"
              >
                <option disabled value="">Select Notice Period</option>
                <option value="Currently Serving">Currently Serving</option>
                <option value="1-15 Days">1-15 Days</option>
                <option value="1 Month">1 Month</option>
                <option value="2 Months">2 Months</option>
                <option value="3 Months">3 Months</option>
              </select>
              <has-error :form="form" field="notice_period"></has-error>
            </div>
            
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span class="validation-msg"> * </span>
                Preferred Location 
                <span
                  :class="
                    valid.location
                      ? 'remove-validation-msg'
                      : 'validation-msg'
                  "
                >
                  {{ errMsg.location }}
                </span></label
              >
              <treeselect
                v-model="locationlist"
                :multiple="true"
                :options="source"
                :flat="true"
                @input="checkLocation"
                :show-count="true"
                :disable-branch-nodes="true"
                :max-height="200"
              />

              <!-- <select
                class="form-control custom-select"
                v-model="form.preferred_loc"
                :style="valid.location ? '' : 'border-color:red !important'"
                name="preferred_loc"
                multiple
                style="height: 150px"
                id="location"
              >
                <optgroup :label="st.state" v-for="st in location" :key="st">
                  <option
                    v-for="(loc, index) in st.location"
                    :key="index"
                    v-on:click="checkLocation(this)"
                    :value="loc.location"
                    :selected="form.preferred_loc.includes(loc.location)"
                  >
                    {{ loc.location }}
                  </option>
                </optgroup>
              </select> -->

              <has-error :form="form" field="job_exp"></has-error>
            </div>

            <div class="col-sm-4">
              <label class="col-form-label" for="">
                Linkedin Profile Link</label>
              <input
                type="text"
                class="form-control"
                name="linkedin"
                placeholder="Enter Linkedin Link"
                v-model="form.linkedin"
              />
              <has-error :form="form" field="linkedin"></has-error>
            </div>
            
          </div>          
        </fieldset>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
      </form>
    </div>
  </div>
</template>

<script>
import Treeselect from "@riophae/vue-treeselect";
export default {
  name: "ProfileStage",
  props: {
    startStage: { type: Function },
  },
  components: { Treeselect },
  data() {
    return {
      locationlist: [],
      source2: [],
      source: [],
      menu: false,
      valid: { salary:{current:"", expected:""}, fname: true, lname: true, email: true, contact: true, location: true },
      errMsg: { salary:{current:"", expected:""}, fname: "", lname: "", email: "", contact: "", location: "" },
      validation_msg: { salary:{current:false, expected:false}, fname: true, lname: true, email: true, contact: true, location: true },
      form: new Form({
        id: "",
        fname: "",
        lname: "",
        email: "",
        contact_no: "",
        linkedin: "",
        gender: "",
        date: new Date(),
        exp_year: "",
        exp_mon: "",
        job_industry_id: "",
        job_functional_role_id: "",
        preferred_loc: [],
        profile_pic_thumb: "",
        curr_sal:"",
        exp_sal:"",
        notice_period: "",
        designation: ""
      }),
      progress: "",
      selectedImage: null,
      location: [],
      job_industry_id: [],
      preferred_loc: [],
      job_functional_role_id: [],
      profile1: "",
    };
  },
  created() {
    this.getAllLocation();
  },
  mounted() {
    this.getPersnol();
    this.getAllLocation();
    this.$store.dispatch("getAllData", "/getindustry/master2");
    this.$store.dispatch("getAllDesignation", "/getfunctionalrole2");
  },
  computed: {
    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },
    experienceYear() {
      var exp = 20;
      return Array.from({ length: exp - 0 }, (value, index) => 0 + index);
    },
    experienceMonth() {
      var exp = 13;
      return Array.from({ length: exp - 0 }, (value, index) => 0 + index);
    },
    allIndustry() {
      return this.$store.getters.getAllData;
    },
  },
  watch: {
    source2: "updatesrc",
    // locationlist: "checkLocation",
    profile1: "updatesrc",
  },
  methods: {
    // Updating stage step
    updatepStage() {
      let stage = 1;
      axios.get(`/skip-stage/${stage}`).then((response) => {
        this.startStage();
      });
    },
    // update option value
    updatesrc() {
      this.source = this.source2;
      this.form.profile_pic_thumb = this.profile1;
    },
    // Name Validation Function
    nameCheck() {
      let rgx = /^[a-zA-Z\s]{1,}$/g;
      if (this.form.fname.length < 2) {
        this.valid.fname = false;
        this.errMsg.fname = "First Name Should be Min 2 Letter";
        this.validation_msg.fname = false;
      } else {
        if (rgx.test(this.form.fname)) {
          this.valid.fname = true;
          this.validation_msg.fname = true;
        } else {
          this.valid.fname = false;
          this.errMsg.fname = "First Name only contain Alphabet and Space";
          this.validation_msg.fname = false;
        }
      }
    },
    // Last Name validation function
    lnameCheck() {
      let rgx = /^[a-zA-Z\s]{1,}$/g;
      if (this.form.lname.length < 2) {
        this.valid.lname = false;
        this.errMsg.lname = "Last Name Should be Min 2 Letter";
        this.validation_msg.lname = false;
      } else {
        if (rgx.test(this.form.lname)) {
          this.valid.lname = true;
          this.validation_msg.lname = true;
        } else {
          this.valid.lname = false;
          this.errMsg.lname = "Last Name only contain Alphabet and Space";
          this.validation_msg.lname = false;
        }
      }
    },
    // Email Validation function
    emailCheck() {
      var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
      if (!pattern.test(this.form.email)) {
        this.valid.email = false;
        this.errMsg.email = "Email is not vaild";
        this.validation_msg.email = false;
      } else {
        axios.get(`/check-email/${this.form.email}`).then((response) => {
          if (response.data > 0) {
            this.valid.email = false;
            this.errMsg.email = "Email already exist";
            this.validation_msg.email = false;
          } else {
            this.valid.email = true;
            this.validation_msg.email = true;
          }
        });
      }
    },
    salaryCheck(salary, index) {
      // let pattern = /^\d(\d(\.(\d\d?|0))?)?$/;
      let pattern = /^\d{0,2}(\.\d{1,2})?$/;

      // var pattern = new RegExp("^\d{0,2}\.\d{0,2}$");
      if (!pattern.test(salary)) {
        this.valid.salary[index] = false;      
        this.errMsg.salary[index] = "Salary should be less than 1 Cr.";
        this.validation_msg.salary[index] = false;
      }else{
        this.valid.salary[index] = true;
        this.errMsg.salary[index] = "";
        this.validation_msg.salary[index] = true;
      }
    },
    // Contact Validation function
    contactCheck() {
      var pattern = /^[6-9][0-9]{9}$/;
      if (!pattern.test(this.form.contact_no)) {
        this.valid.contact = false;
        this.errMsg.contact = "Number is not vaild";
        this.validation_msg.contact = true;
      } else {
        axios.get(`/check-mobile/${this.form.contact_no}`).then((response) => {
          if (response.data > 0) {
            this.valid.contact = false;
            this.errMsg.contact = "Number already exist";
            this.validation_msg.contact = false;
          } else {
            this.valid.contact = true;
            this.validation_msg.contact = true;
          }
        });
      }
    },
    checkLocation() {
      // console.log(e.value());
      if (this.locationlist.length >= 5) {  
        this.locationlist = this.locationlist.slice(0,5);  
        this.valid.location = false;
        this.errMsg.location = "(Select Max 5 locations)";
        // this.validation_msg.location = false;   
      } else {
        this.valid.location = true;
        this.errMsg.location = "";    
        // this.validation_msg.location = true;
      }
    },
    // getting all location
    getAllLocation() {
      axios.get("/master/location/group").then((response) => {
        this.location = response.data.data;
        this.location.map((i, key) => {
          var children = [];
          i.location.map((j, index2) => {
            children[index2] = { label: j.location, id: j.location };
          });
          this.source2[key] = { label: i.state, children: children };
        });
        this.source = this.source2;
      });
    },
    // adding data in persnol
    addPersnol() {
      let date = new Date();
      this.form.preferred_loc = this.locationlist;
      if(!this.validation_msg.fname ||
        !this.validation_msg.lname ||
        !this.validation_msg.email ||
        !this.validation_msg.contact ||
        !this.validation_msg.salary.current ||
        !this.validation_msg.salary.expected ){
        swal("Please check all the fields validation");
      }
      else if (
        !this.valid.fname ||
        !this.valid.lname ||
        !this.valid.email ||
        !this.valid.contact ||
        !this.valid.salary.current ||
        !this.valid.salary.expected ||
        this.form.job_industry_id == "" ||
        this.form.job_functional_role_id == "" ||
        this.form.preferred_loc.length == 0 ||
        this.form.gender == "" ||
        this.form.date == date
      ) {
        swal("Please fill all mandatory fields");
      } else {
        this.form.total = this.i;
        this.form.post("/persnol-save").then(() => {
          this.getPersnol();
          this.updatepStage();
          toast({
            type: "success",
            title: `Persnol Detail added successfully`,
          });
        });
      }
    },
    // getting persnol data dynamic
    getPersnol() {
      axios.get("/persnol-get").then((response) => {
        const data = response.data;
        if (data.length > 0) {
          data.map((i, x) => {
            this.form.fname = i.fname;
            this.form.lname = i.lname;
            this.form.email = i.email;
            this.form.contact_no = i.contact;
            this.form.linkedin = i.linkedin;
            this.form.exp_year = i.exp_year == null ? "" : i.exp_year;
            this.form.exp_mon = i.exp_month == null ? "" : i.exp_month;
            this.form.job_industry_id = i.industry_id == null ? "" : i.industry_id;
            this.form.job_functional_role_id =
              i.functionalrole_id == null ? "" : i.functionalrole_id;
            this.locationlist =
              i.preferred_location == null || i.preferred_location == ""
                ? []
                : i.preferred_location.split(",");
            this.form.profile_pic_thumb = null ? "" : i.profile_pic_thumb;
            this.form.gender = i.gender;
            this.form.date = i.dob;
            this.form.curr_sal = i.current_salary  == null ? "" :i.current_salary;
            this.form.exp_sal = i.expected_salary == null ? "" : i.expected_salary;
            this.form.notice_period = i.notice_period  == null ? "" :i.notice_period;
            this.form.designation = i.designation  == null ? "" :i.designation;
            this.valid.salary.current = "true";
            this.valid.salary.expected = "true";
            this.validation_msg.salary.current = "true";
            this.validation_msg.salary.expected = "true";
          });
        }
      });
    },
    onProfileChanged(event) {
      this.selectedImage = event.target.files[0];
      this.onUploadImg();
      // const elem = this.$refs.myBtnImg;
      // elem.click();
    },
    onUploadImg() {
      if (this.selectedImage) {
        const formData = new FormData();
        formData.append("image", this.selectedImage, this.selectedImage.name);
        axios
          .post("file-upload/profile", formData, {
            onUploadProgress: (uploadEvent) => {
              this.progress = Math.round(uploadEvent.total / uploadEvent.total) * 100;
            },
          })
          .then((res) => {
            this.profile1 = res.data;
            // console.log(this.profile1);
            toast({
              type: "success",
              title: "Profile Uploaded Successfully",
            });
          })
          .catch((error) => {
            toast({
              type: "error",
              text: "Something Went wrong",
            });
          });
      }
    },

  
  },
};
</script>
<style src="@riophae/vue-treeselect/dist/vue-treeselect.min.css"></style>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");



.vd-picker__input input{
    border: none !important;
    border-bottom: 1px solid #F26F31 !important;
    }
body {
  box-sizing: border-box;
  background: #f2f2f2;
  font-family: "Roboto", sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
}

.container {
  background: #fff;
  width: 100%;
  padding: 1rem;
}

.title {
  font-size: 24px;
  line-height: 28px;
  font-weight: bold;
  color: #374151;
  padding-bottom: 11px;
  border-bottom: 1px solid #d7dbdf;
}

.form-group {
  margin-top: 25px;
  display: flex;
  flex-direction: column;
}

.textarea-group label,
.form-group label {
  color: #374151;
  font-size: 16px;
  line-height: 19px;
  margin-bottom: 10px;
}

.form-group [type],
.textarea-group textarea {
  border: 1px solid #d2d6db;
  border-radius: 6px;
  padding: 15px;
}

.form-group [type]:hover,
.textarea-group textarea:hover {
  border-color: #a8afb9;
}

.form-group [type]:focus,
.textarea-group textarea:focus {
  border-color: #5850eb;
}

.textarea-group {
  margin-top: 24px;
}

.textarea-group textarea {
  resize: none;
  width: 100%;
  margin-top: 10px;
  height: calc(100% - 59px);
}

.checkbox-group {
  margin-top: 25px;
}

.checkbox-group label {
  display: flex;
}

.checkbox-group label::before {
  content: "\0020";
  display: flex;
  align-items: center;
  justify-content: center;
  width: 16px;
  height: 16px;
  margin-right: 8px;
  border: 1px solid #d2d6db;
  border-radius: 6px;
  transition: background 0.1s ease-in;
}

.checkbox-group input[type="checkbox"] {
  /* ici on ne doit pas mettre de display: none afin de pouvoir "tabber" */
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}

.checkbox-group input[type="checkbox"]:focus + label:before {
  border-color: #5850eb;
}

.checkbox-group input[type="checkbox"]:checked + label:before {
  color: #fff;
  content: "\2713";
  background: #5850eb;
  border-color: #5850eb;
}

.button {
  font-weight: bold;
  line-height: 19px;
  background: #5850eb;
  border: none;
  padding: 15px 25px;
  border-radius: 6px;
  color: white;
  width: 100%;
  margin-top: 24px;
}

.button:hover {
  background: #6e67ee;
}

.button:focus {
  background: #4239e8;
}

@media screen and (min-width: 768px) {
  body {
    align-items: center;
    justify-content: center;
  }

  .container {
    margin: 2rem;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
    max-width: 32rem;
    padding: 2rem;
  }
}

@media screen and (min-width: 1024px) {
  .container {
    max-width: 80%;
    width: 100%;
  }

  .checkboxes {
    display: flex;
  }

  .checkboxes > :not(:first-child) {
    margin-left: 1rem;
  }

  .grid {
    display: grid;
    grid-gap: 24px;
    grid-template-columns: 1fr 1fr 1fr;
    grid-auto-rows: 1fr;
  }

  .email-group {
    grid-column: 1;
    grid-row: 2;
  }

  .phone-group {
    grid-column: 2;
    grid-row: 2;
  }

  .textarea-group {
    grid-column: 3;
    grid-row: span 2;
    margin-right: 2rem;
  }

  .button-container {
    text-align: right;
  }

  .button {
    /* bon, bon, bon
		c'est pas tout mais j'ai faim moi ^^
		*/
    width: auto;
  }
}
#cam {
  position: absolute;
  background: transparent;
  bottom: 20%;
  /* left: 42%; */
  font-size: 25px;
  color: #a9a5a5;
}
.profile-pic {
  background-color: #fff;
  padding: 1rem;
  position: relative;
}
</style>
