<template>
  <div class="row">
    <div class="col-sm-12">
      <i class="fa fa-info" aria-hidden="true"></i><span style="color: red"> /</span>
      <form class="popupForm" role="form" method="post" @submit.prevent="getAllLocation()">
        <fieldset v-for="i in i" :key="i">
          <legend>Professional</legend>
          <div class="row mb-2">
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Designation</label>
              <input type="text" class="form-control" :name="'designation' + 1" placeholder="Enter Designation"
                v-model="form.designation[i - 1]" :class="{ 'is-invalid': form.errors.has('designation') }" />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Organization Name</label>
              <input type="text" class="form-control" :name="'organization' + i" placeholder="Enter Organization Name"
                v-model="form.organization[i - 1]" :class="{ 'is-invalid': form.errors.has('organization') }" />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Job Type</label>
              <select class="form-control custom-select" :name="'jobtype' + i" v-model="form.jobtype[i - 1]" :class="{
                'is-invalid': form.errors.has('jobtype'),
              }">
                <option value="" selected>Select Job Type</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="others">Others</option>
              </select>
              <has-error :form="form" field="gender"></has-error>
            </div>
            <div class="col-8">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Time Period</label>
              <div class="form-group flex-row text-center" style="margin-top: 2px !important">
                <div class="col-12 col-lg-7 pt d-flex flex-row align-items-center">
                  <div class="col-3">From:</div>
                  <input type="date" class="form-control col-9" v-model="form.fromdate[i - 1]" placeholder="2022-11-01"
                    value="2022-11-01" />
                </div>

                <div class="col-12 col-lg-5 d-flex flex-row align-items-center">
                  <div class="col-3">To:</div>
                  <input type="date" class="form-control col-9" v-model="form.todate[i - 1]" value="2022-11-01"
                    placeholder="2020-11-01" />
                </div>
              </div>
              <has-error :form="form" field="gender"></has-error>
            </div>
            <div class="col-sm-4">
              <div class="">
                <div class="row">
                  <div class="col-sm-12">
                    <label class="col-form-label" for=""> Select Salary(Lakhs per annum)</label>
                    <select class="form-control" :name="'salary' + i" v-model="form.salary[i - 1]" :class="{
                      'is-invalid': form.errors.has('main_exp'),
                    }">
                    <!-- https://vuetifyjs.com/en/components/date-pickers/#active-picker -->
                      <option value="" selected="">Select</option>
                      <option value="2">
                        &lt;3 </option>
                      <option value="3">
                        3 </option>
                      <option value="4">
                        4 </option>
                      <option value="5">
                        5 </option>
                      <option value="6">
                        6 </option>
                      <option value="7">
                        7 </option>
                      <option value="8">
                        8 </option>
                      <option value="9">
                        9 </option>
                      <option value="10">
                        10 </option>
                      <option value="11">
                        11 </option>
                      <option value="12">
                        12 </option>
                      <option value="13">
                        13 </option>
                      <option value="14">
                        14 </option>
                      <option value="15">
                        15 </option>
                      <option value="16">
                        16 </option>
                      <option value="17">
                        17 </option>
                      <option value="18">
                        18 </option>
                      <option value="19">
                        19 </option>
                      <option value="20">
                        20 </option>
                      <option value="21">
                        21 </option>
                      <option value="22">
                        22 </option>
                      <option value="23">
                        23 </option>
                      <option value="24">
                        24 </option>
                      <option value="25">
                        25 </option>
                      <option value="26">
                        26 </option>
                      <option value="27">
                        27 </option>
                      <option value="28">
                        28 </option>
                      <option value="29">
                        29 </option>
                      <option value="30">
                        30 </option>
                      <option value="31">
                        31 </option>
                      <option value="32">
                        32 </option>
                      <option value="33">
                        33 </option>
                      <option value="34">
                        34 </option>
                      <option value="35">
                        35 </option>
                      <option value="36">
                        36 </option>
                      <option value="37">
                        37 </option>
                      <option value="38">
                        38 </option>
                      <option value="39">
                        39 </option>
                      <option value="40">
                        40 </option>
                      <option value="41">
                        41 </option>
                      <option value="42">
                        42 </option>
                      <option value="43">
                        43 </option>
                      <option value="44">
                        44 </option>
                      <option value="45">
                        45 </option>
                      <option value="46">
                        46 </option>
                      <option value="47">
                        47 </option>
                      <option value="48">
                        48 </option>
                      <option value="49">
                        49 </option>
                      <option value="50">
                        50 </option>
                      <option value="51">
                        51 </option>
                      <option value="52">
                        52 </option>
                      <option value="53">
                        53 </option>
                      <option value="54">
                        54 </option>
                      <option value="55">
                        55 </option>
                      <option value="56">
                        56 </option>
                      <option value="57">
                        57 </option>
                      <option value="58">
                        58 </option>
                      <option value="59">
                        59 </option>
                      <option value="60">
                        60 </option>
                      <option value="61">
                        61 </option>
                      <option value="62">
                        62 </option>
                      <option value="63">
                        63 </option>
                      <option value="64">
                        64 </option>
                      <option value="65">
                        65 </option>
                      <option value="66">
                        66 </option>
                      <option value="67">
                        67 </option>
                      <option value="68">
                        68 </option>
                      <option value="69">
                        69 </option>
                      <option value="70">
                        70 </option>
                      <option value="71">
                        71 </option>
                      <option value="72">
                        72 </option>
                      <option value="73">
                        73 </option>
                      <option value="74">
                        74 </option>
                      <option value="75">
                        75 </option>
                      <option value="76">
                        76 </option>
                      <option value="77">
                        77 </option>
                      <option value="78">
                        78 </option>
                      <option value="79">
                        79 </option>
                      <option value="80">
                        80 </option>
                      <option value="81">
                        81 </option>
                      <option value="82">
                        82 </option>
                      <option value="83">
                        83 </option>
                      <option value="84">
                        84 </option>
                      <option value="85">
                        85 </option>
                      <option value="86">
                        86 </option>
                      <option value="87">
                        87 </option>
                      <option value="88">
                        88 </option>
                      <option value="89">
                        89 </option>
                      <option value="90">
                        90 </option>
                      <option value="91">
                        91 </option>
                      <option value="92">
                        92 </option>
                      <option value="93">
                        93 </option>
                      <option value="94">
                        94 </option>
                      <option value="95">
                        95 </option>
                      <option value="96">
                        96 </option>
                      <option value="97">
                        97 </option>
                      <option value="98">
                        98 </option>
                      <option value="99">
                        99 </option>
                      <option value="100">
                        100 </option>
                      <option value="101">
                        100+ </option>
                    </select>
                    <has-error :form="form" field="main_exp"></has-error>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Responsibility</label>
              <input type="text" class="form-control" :name="'responsibility' + i" placeholder="Enter Designation"
                v-model="form.responsibility" :class="{ 'is-invalid': form.errors.has('responsibility') }" />
              <has-error :form="form" field="name"></has-error>
            </div>
          </div>
        </fieldset>

        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <span v-on:click="addMore(i)" class="btn btn-primary mt-3">Add More</span>
      </form>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  name: "ProfessionalStage",
  // props: ["keyword", "location", "experience", "jobtype"],
  data() {
    return {
      i: 1,
      form: new Form({
        id: "",
        designation: [],
        organization: [],
        jobtype: [""],
        fromdate: [],
        todate: [],
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
  mounted() {
    // this.getAllLocation();
    // this.$store.dispatch("getAllData", "/getindustry/master");
    // this.$store.dispatch("getAllLocation", "/getjobtype");
    // this.$store.dispatch("getAllDesignation", "/getfunctionalrole");
    // this.setDob();
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
      //   axios.get("/master/location/group").then((response) => {
      //   });
      console.log(this.form);
    },
    addMore(i) {
      this.i = ++i;
      this.form.jobtype.push("");
      this.form.salary.push("");
      // console.log(this.i);
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

.checkbox-group input[type="checkbox"]:focus+label:before {
  border-color: #5850eb;
}

.checkbox-group input[type="checkbox"]:checked+label:before {
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

  .checkboxes> :not(:first-child) {
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
