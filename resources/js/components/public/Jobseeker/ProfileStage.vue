<template>
  <div class="row">
    <div class="col-sm-12">
      <i class="fa fa-info" aria-hidden="true"></i
      ><span style="color: red"> Name,Email,Contact No</span>
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
                <span style="color: red"> * </span> Name</label
              >
              <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Enter Full Name"
                v-model="form.name"
                :class="{ 'is-invalid': form.errors.has('name') }"
              />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Email</label
              >
              <input
                type="email"
                class="form-control"
                name="email"
                placeholder="Enter Email"
                v-model="form.email"
                :class="{ 'is-invalid': form.errors.has('email') }"
              />
              <has-error :form="form" field="email"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Contact No.</label
              >
              <input
                type="text"
                class="form-control"
                name="contact_no"
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
                    <label class="col-form-label" for=""> Minimum Experience</label>
                    <select
                      class="form-control"
                      name="min_exp"
                      v-model="form.min_exp"
                      :class="{
                        'is-invalid': form.errors.has('min_exp'),
                      }"
                    >
                      <option value="" disabled>Min Experience</option>
                      <option v-for="exper in experiences" :value="exper">
                        {{ exper }}
                      </option>
                    </select>
                    <has-error :form="form" field="min_exp"></has-error>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label" for=""> Maximum Experience</label>
                    <select
                      class="form-control"
                      name="max_exp"
                      v-model="form.max_exp"
                      :class="{
                        'is-invalid': form.errors.has('max_exp'),
                      }"
                    >
                      <option value="" disabled>Max Experience</option>
                      <option v-for="exper in experiences" :value="exper">
                        {{ exper }}
                      </option>
                    </select>
                    <has-error :form="form" field="max_exp"></has-error>
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
              <label class="col-form-label" for=""> Location</label>
              <select
                class="form-control custom-select"
                v-model="form.job_exp"
                name="preferred_loc"
                multiple
              >
                <optgroup :label="st.state" v-for="st in location" :key="st">
                  <option
                    v-for="(loc, index) in st.location"
                    :key="index"
                    :value="loc.location"
                  >
                    {{ loc.location }}
                  </option>
                </optgroup>
              </select>

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

export default {
  name: "ProfileStage",
  // props: ["keyword", "location", "experience", "jobtype"],
  data() {
    return {
      menu: false,
      form: new Form({
        date: new Date(),
        id: "",
        name: "",
        email: "",
        contact_no: "",
        gender: "",
        dd: "",
        mm: "",
        yyyy: "",
        min_exp: "",
        max_exp: "",
        job_skill: "",
        company_name: "",
        job_industry_id: "",
        preferred_loc: "",
        job_functional_role_id: "",
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
  mounted() {
    this.getAllLocation();
    this.$store.dispatch("getAllData", "/getindustry/master");
    this.$store.dispatch("getAllLocation", "/getjobtype");
    this.$store.dispatch("getAllDesignation", "/getfunctionalrole");
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
    getAllLocation() {
      axios.get("/master/location/group").then((response) => {
        this.location = response.data.data;
      });
    },
    setDob() {
      var option = '<option value="day">day</option>';
      var selectedDay = "day";
      for (var i = 1; i <= this.Days[0]; i++) {
        //add option days
        option += '<option value="' + i + '">' + i + "</option>";
      }
      $("#day").append(option);
      $("#day").val(selectedDay);

      var option = '<option value="month">month</option>';
      var selectedMon = "month";
      for (var i = 1; i <= 12; i++) {
        option += '<option value="' + i + '">' + i + "</option>";
      }
      $("#month").append(option);
      $("#month").val(selectedMon);

      var option = '<option value="month">month</option>';
      var selectedMon = "month";
      for (var i = 1; i <= 12; i++) {
        option += '<option value="' + i + '">' + i + "</option>";
      }
      $("#month2").append(option);
      $("#month2").val(selectedMon);

      var d = new Date();
      var option = '<option value="year">year</option>';
      selectedYear = "year";
      for (var i = 1930; i <= d.getFullYear(); i++) {
        // years start i
        option += '<option value="' + i + '">' + i + "</option>";
      }
      $("#year").append(option);
      $("#year").val(selectedYear);
    },
    isLeapYear() {
      year = parseInt(this.year);
      if (year % 4 != 0) {
        return false;
      } else if (year % 400 == 0) {
        return true;
      } else if (year % 100 == 0) {
        return false;
      } else {
        return true;
      }
    },
    change_year() {
      if (isLeapYear(this.year)) {
        this.Days[1] = 29;
      } else {
        this.Days[1] = 28;
      }
      if ($("#month").val() == 2) {
        var day = $("#day");
        var val = $(day).val();
        $(day).empty();
        var option = '<option value="day">day</option>';
        for (var i = 1; i <= this.Days[1]; i++) {
          //add option days
          option += '<option value="' + i + '">' + i + "</option>";
        }
        $(day).append(option);
        if (val > this.Days[month]) {
          val = 1;
        }
        $(day).val(val);
      }
    },
    change_month() {
      var day = $("#day");
      var val = $(day).val();
      $(day).empty();
      var option = '<option value="day">day</option>';
      var month = parseInt(this.month) - 1;
      for (var i = 1; i <= this.Days[month]; i++) {
        //add option days
        option += '<option value="' + i + '">' + i + "</option>";
      }
      $(day).append(option);
      if (val > this.Days[month]) {
        val = 1;
      }
      $(day).val(val);
    },
  },
  watch: {
    menu(val) {
      val && setTimeout(() => (this.$refs.menu.$refs.agenda.mode = "year"));
    },
  },
};
</script>

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
