<template>
  <div class="row">
    <div class="col-sm-12">
      <i class="fa fa-info" aria-hidden="true"></i
      ><span style="color: red"> Name,Email,Contact No</span>
      <form class="popupForm" role="form" method="post" @submit.prevent="addEducation()">
        <fieldset v-for="i in i" :key="i">
          <legend v-if="i == 1">Education</legend>
          <div class="row mb-2">
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Degree</label
              >
              
              <select
                class="form-control custom-select"
                :name="'degree' + i"
                v-model="form.degree[i - 1]"
                :class="{
                  'is-invalid': form.errors.has('degree'),
                }"
              >
                <option value="" disabled>Select Degree</option>
                <option
                  :value="education.qualification"
                  v-for="education in allQualification"
                  :key="education"
                >
                  {{ education.qualification }}
                </option>
              </select>
              <has-error :form="form" field="degree"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Course Type</label
              >
              <select
                class="form-control custom-select"
                :name="'course_type' + i"
                v-model="form.course_type[i - 1]"
                :class="{
                  'is-invalid': form.errors.has('course_type'),
                }"
              >
                <option value="" disabled>Select Course Type</option>
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
                <option value="Distance Learning Program">Distance Learning Program</option>
                <option value="Executive Program">Executive Program</option>
                <option value="Certification">Certification</option>
              </select>
              <has-error :form="form" field="course_type"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Percentage / Grade</label
              >
              <input
                type="text"
                class="form-control"
                :name="'percentage' + i"
                placeholder="EnterPercentage / Grade"
                v-model="form.percentage[i - 1]"
                :class="{ 'is-invalid': form.errors.has('percentage') }"
              />
              <has-error :form="form" field="percentage"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Passing Year</label
              >   
              <date-picker 
              
              v-bind:style="{width: '325px'}"                
                id="app" 
                value-type=YYYY
                v-model="form.pass_year[i - 1]" 
                placeholder="Select Passing Year"
                type="year" 
                :name="'pass_year' + i"
                :class="{ 'is-invalid': form.errors.has('pass_year') }"
                >
              </date-picker>
            
              <!-- <VueDatePicker
                v-model="form.pass_year"
                min-date="1980"
                max-date="2020"
                type="year"
              /> -->
              <has-error :form="form" field="pass_year"></has-error>
            </div>

            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Institute Name</label
              >
              <input
                type="text"
                class="form-control"
                :name="'ins_name' + i"
                placeholder="Enter Institute Name"
                v-model="form.ins_name[i - 1]"
                :class="{ 'is-invalid': form.errors.has('ins_name') }"
              />
              <has-error :form="form" field="ins_name"></has-error>
            </div>

            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Institute Location</label
              >
              <input
                type="text"
                class="form-control"
                :name="'ins_loc' + i"
                placeholder="Enter Institute Location"
                v-model="form.ins_loc[i - 1]"
                :class="{ 'is-invalid': form.errors.has('ins_loc') }"
              />
              <has-error :form="form" field="ins_loc"></has-error>
            </div>
          </div>
        </fieldset>
        <span v-on:click="addMore(i)" class="btn btn-primary mt-3">Add More</span>
        <span v-if="i > 1" v-on:click="remove(i)" class="btn btn-primary mt-3"
          >Remove</span
        >
        <button type="submit" class="btn btn-primary mt-3">Save</button>
      </form>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
export default {
  components: { DatePicker },
  data() {
    return {
      i: 1,
      form: new Form({
        id: "",
        ins_name: [""],
        // pass_year: new Date(),
        pass_year: [""],
        course_type: [""],
        degree: [""],
        ins_loc: [""],
        percentage: [""]
      }),
    };
  },
  mounted() {    
    this.$store.dispatch("getAllQualification", "/qualification-get");
  },
  computed: {
    allQualification() {
      return this.$store.getters.getAllQualification;
    },
  },
  methods: {
    addEducation() {
      const date = new Date();
      console.log(this.form.pass_year)
      if(
        this.form.ins_name.includes("") ||
        this.form.pass_year.includes("") ||
        this.form.course_type.includes("") ||
        this.form.degree.includes("") ||
        this.form.ins_loc.includes("") ||
        this.form.percentage.includes("")
      ) {
        swal("Please fill all mandatory fields");
      } else {
        this.form.total = this.i;
        this.form.post("/add-education-detail").then(() => {
          toast({
            type: "success",
            title: "Education Detail Added successfully",
          });
        });
      }
    },

    getAllLocation() {
      axios.get("/master/location/group").then((response) => {
        this.location = response.data.data;
      });
    },
    addMore(i) {
      this.i = ++i;
      this.form.ins_name.push("");
      this.form.pass_year.push("");
      this.form.course_type.push("");
      this.form.ins_loc.push("");
      this.form.degree.push("");
      this.form.percentage.push("");
    },
    remove(i) {
      this.i = --i;
      this.form.ins_name.pop("");
      this.form.pass_year.pop("");
      this.form.course_type.pop("");
      this.form.ins_loc.pop("");
      this.form.degree.pop("");
      this.form.percentage.pop("");
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
