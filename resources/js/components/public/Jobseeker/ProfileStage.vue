<template>
  <div class="row">
    <div class="col-sm-12">
      <!-- <i class="fa fa-info" aria-hidden="true"></i
      ><span style="color: red"> Name,Email,Contact No</span> -->
      <form
        class="popupForm"
        role="form"
        method="post"
        @submit.prevent="addemployeejob()"
      >
        <fieldset>
          <legend>Profile Details</legend>
          <div class="row mb-2">
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                First Name
                <span style="color: red"> *</span
                ><span
                  :style="
                    valid.fname
                      ? 'color: red; font-weight: 500; font-size: 10px;display:none'
                      : 'color: red; font-weight: 500; font-size: 10px'
                  "
                  >{{ errMsg.fname }}</span
                ></label
              >
              <input
                type="text"
                class="form-control"
                name="fname"
                :style="valid.fname ? '' : 'border-color:red !important'"
                v-on:keyup="nameCheck"
                placeholder="Enter First Name"
                v-model="form.fname"
              />
              <has-error :form="form" field="fname"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                Last Name
                <span style="color: red"> *</span>
                <span
                  :style="
                    valid.lname
                      ? 'color: red; font-weight: 500; font-size: 10px;display:none'
                      : 'color: red; font-weight: 500; font-size: 10px'
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
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                Email
                <span style="color: red"> *</span>
                <span
                  :style="
                    valid.email
                      ? 'color: red; font-weight: 500; font-size: 10px;display:none'
                      : 'color: red; font-weight: 500; font-size: 10px'
                  "
                >
                  {{ errMsg.email }}
                </span></label
              >
              <input
                type="email"
                class="form-control"
                name="email"
                :style="valid.email ? '' : 'border-color:red !important'"
                v-on:keyup="emailCheck"
                placeholder="Enter Email"
                title="Enter Vaild Mail"
                v-model="form.email"
                :class="{ 'is-invalid': form.errors.has('email') }"
              />
              <has-error :form="form" field="email"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                Contact No.
                <span style="color: red"> * </span>
                <span
                  :style="
                    valid.contact
                      ? 'color: red; font-weight: 500; font-size: 10px;display:none'
                      : 'color: red; font-weight: 500; font-size: 10px'
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
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Gender</label
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
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Date Of Birth</label
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
                      <option v-for="exper in experiences" :key="exper" :value="exper">
                        {{ exper }}
                      </option>
                    </select>
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
                      <option v-for="exper in experiences" :key="exper" :value="exper">
                        {{ exper }}
                      </option>
                    </select>
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

            <div class="col-sm-4">
              <label class="col-form-label" for="">
                Preferred Location <span style="color: red"> * </span>
                <span
                  :style="
                    valid.location
                      ? 'color: red; font-weight: 500; font-size: 10px;display:none'
                      : 'color: red; font-weight: 500; font-size: 10px'
                  "
                >
                  {{ errMsg.location }}
                </span></label
              >
              <treeselect
                v-model="form.preferred_loc"
                :multiple="true"
                :options="source"
                :limit="5"
                :disabled="true"
                :flat="true"
                :select="checkLocation"
                :show-count="true"
                :disable-branch-nodes="true"
                :max-height="200"
              />
              <treeselect-value :value="form.preferred_loc" />
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
          </div>
        </fieldset>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
      </form>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
import Treeselect from "@riophae/vue-treeselect";
export default {
  name: "ProfileStage",
  props: {
    startStage: { type: Function },
  },
  components: { Treeselect },
  data() {
    return {
      source2: [],
      source: [],
      menu: false,
      valid: { fname: true, lname: true, email: true, contact: true, location: true },
      errMsg: { fname: "", lname: "", email: "", contact: "", location: "" },
      form: new Form({
        id: "",
        fname: "",
        lname: "",
        email: "",
        contact_no: "",
        gender: "",
        date: new Date(),
        exp_year: "",
        exp_mon: "",
        job_industry_id: "",
        job_functional_role_id: "",
        preferred_loc: [],
      }),
      Days: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
      year: "",
      month: "",
      location: [],
      job_industry_id: [],
      preferred_loc: [],
      job_functional_role_id: [],
    };
  },
  created() {
    this.getAllLocation();
  },
  mounted() {
    this.getPersnol();
    this.getAllLocation();
    this.$store.dispatch("getAllData", "/getindustry/master2");
    this.$store.dispatch("getAllLocation", "/getjobtype");
    this.$store.dispatch("getAllDesignation", "/getfunctionalrole2");
    this.setDob();
  },
  computed: {
    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },
    experiences() {
      const exp = 20;
      return Array.from({ length: exp - 0 }, (value, index) => 0 + index);
    },
    allIndustry() {
      return this.$store.getters.getAllData;
    },
    allLocation() {
      return this.$store.getters.getAllLocation;
    },
  },
  methods: {
    nameCheck() {
      let rgx = /^[a-zA-Z\s]{1,}$/g;
      if (this.form.fname.length < 2) {
        this.valid.fname = false;
        this.errMsg.fname = "First Name Should be Min 2 Letter";
      } else {
        if (rgx.test(this.form.fname)) {
          this.valid.fname = true;
        } else {
          this.valid.fname = false;
          this.errMsg.fname = "First Name only contain Alphabet and Space";
        }
      }
      // let check =
    },
    lnameCheck() {
      let rgx = /^[a-zA-Z\s]{1,}$/g;
      // let check =
      if (this.form.lname.length < 2) {
        this.valid.lname = false;
        this.errMsg.lname = "Last Name Should be Min 2 Letter";
      } else {
        if (rgx.test(this.form.lname)) {
          this.valid.lname = true;
        } else {
          this.valid.lname = false;
          this.errMsg.lname = "Last Name only contain Alphabet and Space";
        }
      }
    },
    emailCheck() {
      var pattern = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
      if (!pattern.test(this.form.email)) {
        this.valid.email = false;
        this.errMsg.email = "Email is not vaild";
      } else {
        axios.get(`/check-email/${this.form.email}`).then((response) => {
          if (response.data > 0) {
            this.valid.email = false;
            this.errMsg.email = "Email already exist";
          } else {
            this.valid.email = true;
          }
        });
      }
    },
    contactCheck() {
      var pattern = /^[6-9][0-9]{9}$/;
      if (!pattern.test(this.form.contact_no)) {
        this.valid.contact = false;
        this.errMsg.contact = "Number is not vaild";
      } else {
        axios.get(`/check-mobile/${this.form.contact_no}`).then((response) => {
          if (response.data > 0) {
            this.valid.contact = false;
            this.errMsg.contact = "Number already exist";
          } else {
            this.valid.contact = true;
          }
        });
      }
    },
    checkLocation() {
      console.log(this.form.preferred_loc);
      // if (this.form.preferred_loc.length < 5) {
      //   this.valid.location = false;
      //   this.errMsg.location = "Minimume 5 location should be selected";
      // } else {
      //   this.valid.location = true;
      // }
    },
    getAllLocation() {
      axios.get("/master/location/group").then((response) => {
        this.location = response.data.data;
        this.location.map((i, key) => {
          var children = [];
          i.location.map((j, index2) => {
            children[index2] = { label: j.location, id: j.id };
          });
          this.source2[key] = { label: i.state, id: "parent" + key, children: children };
        });
        this.source = this.source2;
        // console.log("new", this.source2);
      });
    },
    updatesrc() {
      this.source = this.source2;
    },
    addemployeejob() {
      let date = new Date();
      // console.log(this.form.exp_year);
      // console.log(this.form.exp_mon);
      // console.log(this.form.preferred_loc);
      if (
        this.form.fname == "" ||
        this.form.lname == "" ||
        this.form.email == "" ||
        this.form.contact_no == "" ||
        this.form.job_industry_id == "" ||
        this.form.job_functional_role_id == "" ||
        this.form.preferred_loc == "" ||
        this.form.gender == "" ||
        this.form.date == date
      ) {
        swal("Please fill all mandatory fields");
      } else {
        this.form.total = this.i;
        this.form.post("/persnol-save").then((response) => {
          // this.getAllProfessinal();

          this.updatepStage();
          toast({
            type: "success",
            title: `Persnol Detail added successfully`,
          });
        });
      }
    },
    getPersnol() {
      // alert("hello");
      axios.get("/persnol-get").then((response) => {
        // console.log(response.data.length);
        const data = response.data;
        if (data.length > 0) {
          data.map((i, x) => {
            this.form.fname = i.fname;
            this.form.lname = i.lname;
            this.form.email = i.email;
            this.form.contact_no = i.contact;
            this.form.exp_year = i.exp_year == null ? "" : i.exp_year;
            this.form.exp_mon = i.exp_month == null ? "" : i.exp_month;
            this.form.job_industry_id = i.industry_id == null ? "" : i.industry_id;
            this.form.job_functional_role_id =
              i.functionalrole_id == null ? "" : i.functionalrole_id;
            this.form.preferred_loc =
              i.preferred_location == (null || "") ? [] : i.preferred_location.split(",");
            this.form.gender = i.gender;
            this.form.date = i.dob;
            if (this.form.preferred_loc.length > 0) {
              var newloc = [];
              this.form.preferred_loc.map((i, k) => {
                newloc[k] = parseInt(i);
              });
              this.form.preferred_loc = newloc;
            }
          });
        }
      });
    },
    updatepStage() {
      let stage = 1;
      // console.log("hello");
      axios.get(`/skip-stage/${stage}`).then((response) => {
        this.startStage();
      });
    },
  },
  watch: {
    source2: "updatesrc",
    menu(val) {
      val && setTimeout(() => (this.$refs.menu.$refs.agenda.mode = "year"));
    },
  },
};
</script>
<style src="@riophae/vue-treeselect/dist/vue-treeselect.min.css"></style>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap");

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
</style>
