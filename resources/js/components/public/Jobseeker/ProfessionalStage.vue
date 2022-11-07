<template>
  <div class="row">
    <div class="col-sm-12">
      <i class="fa fa-info" aria-hidden="true"></i><span style="color: red"> /</span>
      <form
        class="popupForm"
        role="form"
        method="post"
        @submit.prevent="getAllLocation()"
      >
        <fieldset class="mb-2" v-for="i in i" :key="i">
          <legend v-if="i == 1">Professional</legend>
          <div class="row mb-2">
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Designation</label
              >
              <input
                type="text"
                class="form-control"
                :name="'designation' + 1"
                placeholder="Enter Designation"
                v-model="form.designation[i - 1]"
                :class="{ 'is-invalid': form.errors.has('designation') }"
              />
              <input type="hidden" v-model="form.index[i - 1]" />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Organization Name</label
              >
              <input
                type="text"
                class="form-control"
                :name="'organization' + i"
                placeholder="Enter Organization Name"
                v-model="form.organization[i - 1]"
                :class="{ 'is-invalid': form.errors.has('organization') }"
              />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Job Type</label
              >
              <select
                class="form-control custom-select"
                :name="'jobtype' + i"
                v-model="form.jobtype[i - 1]"
                :class="{
                  'is-invalid': form.errors.has('jobtype'),
                }"
              >
                <option value="" selected>Select Job Type</option>
                <option value="1">Part Time</option>
                <option value="2">Full Time</option>
                <option value="3">Freelancer</option>
                <option value="4">Internship</option>
              </select>
              <has-error :form="form" field="gender"></has-error>
            </div>
            <div class="col-8">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Time Period</label
              >
              <div
                class="form-group flex-row text-center"
                style="margin-top: 2px !important"
              >
                <div class="col-12 col-lg-6 pt d-flex flex-row align-items-center">
                  <div class="col-4">From:</div>
                  <input
                    type="date"
                    class="form-control col-8"
                    v-model="form.fromdate[i - 1]"
                    placeholder="2022-11-01"
                    value="2022-11-01"
                  />
                </div>

                <div class="col-12 col-lg-6 d-flex flex-row align-items-center">
                  <div class="col-3">To:</div>
                  <input
                    type="date"
                    class="form-control col-9"
                    v-model="form.todate[i - 1]"
                    value="2022-11-01"
                    :min="form.fromdate[i - 1]"
                    placeholder="2020-11-01"
                  />
                </div>
              </div>
              <has-error :form="form" field="gender"></has-error>
            </div>
            <div class="col-sm-4">
              <div class="">
                <div class="row">
                  <div class="col-sm-12">
                    <label class="col-form-label" for="">
                      <span style="color: red"> * </span> Select Salary</label
                    >
                    <select
                      class="form-control"
                      :name="'salary' + i"
                      v-model="form.salary[i - 1]"
                      :class="{
                        'is-invalid': form.errors.has('main_exp'),
                      }"
                    >
                      <option value="" selected>Select Salary</option>
                      <option value="2" selected>Less then 3</option>
                      <option v-for="sal in 98" :key="sal" :value="sal">
                        {{ sal + 2 }}
                      </option>
                    </select>
                    <has-error :form="form" field="main_exp"></has-error>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <label class="col-form-label" for=""> Responsibility</label>
              <textarea
                type="text"
                class="form-control"
                :name="'responsibility' + i"
                placeholder="Enter Responsibility"
                v-model="form.responsibility[i - 1]"
                :class="{ 'is-invalid': form.errors.has('responsibility') }"
              ></textarea>
              <has-error :form="form" field="name"></has-error>
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
        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <span v-on:click="addMore(i)" class="btn btn-primary mt-3">Add More</span>
        <span v-on:click="updatepStage()" class="btn btn-primary mt-3">Skip</span>
      </form>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  name: "ProfessionalStage",
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
      form: new Form({
        index: [""],
        total: 1,
        id: "1",
        designation: [""],
        organization: [""],
        jobtype: [""],
        fromdate: [""],
        todate: [""],
        salary: [""],
        responsibility: [""],
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
  watch: {
    i: "updatex",
  },
  created() {
    this.getAllProfessinal();
  },
  // computed: {
  //   allDesignation() {
  //     return this.$store.getters.getAllDesignation;
  //   },
  //   experiences() {
  //     const exp = 20;
  //     return Array.from({ length: exp - 0 }, (value, index) => 0 + index);
  //   },
  //   allIndustry() {
  //     return this.$store.getters.getAllData;
  //   },
  //   allLocation() {
  //     return this.$store.getters.getAllLocation;
  //   },
  // },
  methods: {
    updatex() {
      this.x = this.i;
    },
    updatepStage() {
      let stage = 3;
      // console.log("hello");
      axios.get(`/skip-stage/${stage}`).then((response) => {
        this.startStage();
      });
    },
    getAllLocation() {
      // axios.post("/add-professional-detail", this.form).then((response) => {
      //   console.log(response);
      // });
      if (
        this.form.designation.includes("") ||
        this.form.organization.includes("") ||
        this.form.jobtype.includes("") ||
        this.form.fromdate.includes("") ||
        this.form.todate.includes("") ||
        this.form.salary.includes("")
      ) {
        swal("Please fill all mandatory fields");
      } else {
        this.form.total = this.i;
        this.form.post("/add-professional-detail-stage").then((response) => {
          this.getAllProfessinal();
          this.updatepStage();
          toast({
            type: "success",
            title: `Professinoal ${response.data.created} Added and ${response.data.update} Updated successfully`,
          });
        });
      }
    },
    getAllProfessinal() {
      // alert("hello");
      axios.get("/get-professional-detail-stage").then((response) => {
        // console.log(response.data.length);
        const data = response.data;
        if (data.length > 0) {
          this.i = data.length;
          this.form.designation = [];
          this.form.organization = [];
          this.form.jobtype = [];
          this.form.fromdate = [];
          this.form.todate = [];
          this.form.salary = [];
          this.form.responsibility = [];
          this.form.index = [];
          data.map((i, x) => {
            this.form.designation.push(i.designations);
            this.form.organization.push(i.organisation);
            this.form.jobtype.push(i.job_type);
            this.form.fromdate.push(i.from_date);
            this.form.todate.push(i.to_date);
            this.form.salary.push(3);
            this.form.index.push(i.id);
            this.form.responsibility.push(i.responsibility);
          });
        }
      });
    },
    addMore(i) {
      this.i = ++i;
      this.form.index.push("");
      this.form.designation.push("");
      this.form.organization.push("");
      this.form.jobtype.push("");
      this.form.fromdate.push("");
      this.form.todate.push("");
      this.form.salary.push("");
      this.form.responsibility.push("");
      // console.log(this.i);
    },
    remove(i, index) {
      this.i = --this.i;
      this.form.designation.splice(index, 1);
      this.form.organization.splice(index, 1);
      this.form.jobtype.splice(index, 1);
      this.form.fromdate.splice(index, 1);
      this.form.todate.splice(index, 1);
      this.form.salary.splice(index, 1);
      this.form.responsibility.splice(index, 1);
      this.form.index.splice(index, 1);
      if (i != "") {
        axios.get(`/delete-professional-detail-stage/${i}`).then((response) => {});
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
