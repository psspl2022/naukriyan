<template>
  <div class="row stage-main-div">
    <div class="col-sm-12">
      <i class="fa fa-info" aria-hidden="true"></i
      ><span style="color: red">  Qualification should be in higher to lower order</span>
      <form class="popupForm" role="form" method="post" @submit.prevent="addEducation()">
        <fieldset class="mt-2" v-for="(i,index) in i" :key="index">
          <legend v-if="i == 1">Education</legend>
          <div class="row mb-2">
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Qualification</label
              >

              <select
                class="form-control custom-select"
                :name="'degree' + i"
                v-model="form.degree[i - 1]"
                :class="{
                  'is-invalid': form.errors.has('degree'),
                }"
              >
                <option value="" disabled>Select Qualification</option>
                <option
                  :value="education.qualification"
                  v-for="(education, index) in allQualification"
                  :key="index"
                >
                  {{ education.qualification }}
                </option>
              </select>
              <has-error :form="form" field="degree"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">Course Type</label
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
                <option value="Distance Learning Program">
                  Distance Learning Program
                </option>
                <option value="Executive Program">Executive Program</option>
              </select>
              <has-error :form="form" field="course_type"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                Percentage(%)</label
              >                      
                    <!-- <span
                    :class="valid_per[i] ? 'validation-msg' : 'reomve-validation-msg'"
                  >
                    {{ valid_msg[i] }} -->
                  </span>
              <input
                type="number"
                class="form-control"
                :name="'percentage' + i"
                min="0"
                step="0.01"
                :style="valid.percentage ? '' : 'border-color:red !important'"
                :key="'percentage'+i"
                v-model="form.percentage[i - 1]"
                placeholder="Enter Percentage"
                v-on:keyup="percentageCheck(form.percentage[i - 1],i)"
                :class="{ 'is-invalid': form.errors.has('percentage') }"
              />
              <has-error :form="form" field="percentage"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Passing Year</label
              >
              <!-- <date-picker
                v-bind:style="{ width: '325px' }"
                id="app"
                value-type="YYYY"
                v-model="form.pass_year[i - 1]"
                placeholder="Select Passing Year"
                type="year"
                :name="'pass_year' + i"
                :class="{ 'is-invalid': form.errors.has('pass_year') }"
              >
              </date-picker> -->

              <select
                class="form-control custom-select"
                :name="'pass_year' + i"
                v-model="form.pass_year[i - 1]"
                :class="{
                  'is-invalid': form.errors.has('pass_year'),
                }"
                
              >
              <option value="">Select Year</option>
              <option v-for="year in years" key: year :value="year">{{year}}</option>
              </select>

              <!-- <VueDatePicker
                v-model="form.pass_year"
                min-date="1980"
                max-date="2022"
                type="year"
              /> -->
              <has-error :form="form" field="pass_year"></has-error>
            </div>

            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Board / University / College / Institute </label
              >
              <input
                type="text"
                class="form-control"
                :name="'ins_name' + i"
                placeholder="Enter Board / University / College / Institute Name"
                v-model="form.ins_name[i - 1]"
                :class="{ 'is-invalid': form.errors.has('ins_name') }"
                list="institute_list"
                @keyup="
                  () => {
                    initItems(form.ins_name[i - 1]);
                  }"
              />
              <datalist id="institute_list">
                <option v-for="(institute, index) in institute_list" :key="index" :value="institute">{{ institute }}</option>
              </datalist>
              <has-error :form="form" field="ins_name"></has-error>
            </div>

            <div class="col-sm-4">
              <label class="col-form-label" for="">Institute Location</label
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
          <span
            v-on:click="remove(form.index[i - 1], i - 1)"
            v-if="x > 1"
            class="btn btn-primary mt-3"
          >
            Remove
          </span>
        </fieldset>
        <span v-on:click="addMore(i)" class="btn btn-primary mt-3">Add More</span>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
      </form>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";
export default {
  components: { DatePicker },
  props: {
    startStage: { type: Function },
  },
  
  data() {
    return {
      i: 1,
      x: 1,
      props: {
        startStage: { type: Function },
      },
      valid_per:[""],
      valid_msg:[""],
      valid: { percentage: [""]},
      errMsg: { percentage: [""]},
      form: new Form({
        id: "",
        index: [""],
        ins_name: [""],
        pass_year: [""],
        course_type: [""],
        degree: [""],
        ins_loc: [""],
        percentage: [""],
      }),
      years: ['pursuing'],
      institute_list: [],
    };
  },
  watch: {
    i: "updatex",
  },
  created() {
    this.getAllEducation();
    this.allYears();
  },
  mounted() {
    this.$store.dispatch("getAllQualification", "/qualification-get");
  },
  computed: {
    allQualification() {
      return this.$store.getters.getAllQualification;
    },
    
    // allD
  },
  methods: {
    updatex() {
      this.x = this.i;
    },
    updatepStage() {
      let stage = 2;
      // console.log("hello");
      axios.get(`/skip-stage/${stage}`).then((response) => {
        this.startStage();
      });
    },

    
    initItems(institute) {
      console.log(institute)
      const url = `get-allinstitutes/` + institute;
      axios
        .get(url)
        .then((response) => {
          this.institute_list = response.data.data.map((a) => {
            return a.name;
          });
        })
      console.log(this.institute_list)
    },

    allYears(){
      for(var i=new Date().getFullYear(); i>=1980; i--){
        this.years.push(i);
      }
      console.log(this.years);
    },

    addEducation() {
      if (
        this.form.ins_name.includes("") ||
        this.valid.percentage.includes(false) ||
        this.form.pass_year.includes(this.date) ||
        this.form.degree.includes("") ||
        this.form.percentage.includes("")
      ) {
        swal("Please fill all mandatory fields");
      } else {
        this.form.total = this.i;
        this.form.post("/add-education-detail").then(() => {
          this.updatepStage();
          toast({
            type: "success",
            title: "Education Detail Added successfully",
          });
        });
      }
    },

    getAllEducation() {
      axios.get("/get-education-detail").then((response) => {
        // console.log(response.data.length);
        const data = response.data;
        if (data.length > 0) {
          this.i = data.length;
          this.form.ins_name = [];
          this.form.pass_year = [];
          this.form.course_type = [];
          this.form.ins_loc = [];
          this.form.degree = [];
          this.form.percentage = [];
          this.form.index = [];
          data.map((i, x) => {
            this.form.ins_name.push(i.institute_name);
            this.form.pass_year.push(i.passing_year);
            this.form.course_type.push(i.course_type);
            this.form.ins_loc.push(i.institute_location);
            this.form.degree.push(i.degree_name);
            this.form.percentage.push(i.percentage_grade);
            // this.form.degree.push(3);
            this.form.index.push(i.id);
            this.valid_per.push(true);
            this.valid_msg.push("");
          });
        }
      });
    },

    addMore(i) {
      this.i = ++i;
      this.form.index.push("");
      this.form.ins_name.push("");
      this.form.pass_year.push("");
      this.form.course_type.push("");
      this.form.ins_loc.push("");
      this.form.degree.push("");
      this.form.percentage.push("");      
      // this.valid.percentage.push(true);
      // this.errMsg.percentage.push("");
      this.valid.percentage.push(true);
      this.errMsg.percentage.push("");
    },
    remove(i, index) {
      this.i = --this.i;
      this.form.ins_name.splice(index, 1);
      this.form.pass_year.splice(index, 1);
      this.form.course_type.splice(index, 1);
      this.form.ins_loc.splice(index, 1);
      this.form.degree.splice(index, 1);
      this.form.percentage.splice(index, 1);
      this.valid.percentage.splice(index+1 , 1);
      this.errMsg.percentage.splice(index+1 , 1);

      if (i != "") {
        axios.get(`/delete-education-detail/${i}`).then((response) => {});
      }
    },

    percentageCheck(percentage, i) {
      let pattern = /^\d(\d(\.(\d\d?|0))?)?$/;
      if (!pattern.test(percentage)) {
        // this.valid.percentage[i] = false;      
        // this.errMsg.percentage[i]  = percentage+"Percentage should be less than 100";
        this.valid_per[i] = false;      
        this.valid_msg[i]  = percentage+"Percentage should be less than 100";
      }else{
        // this.valid.percentage[i]  = true;
        // this.errMsg.percentage[i]  = "";
        this.valid_per[i] = true;      
        this.valid_msg[i]= " ";
      }
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
