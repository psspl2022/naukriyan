<template>
  <div id="browsejob">
    <main-header></main-header>
    <section
      class="top-adjust section pb-5 mt-2 pt-0 col-12"
      style="margin-top: 7rem !important"
    >
      <div class="container mx-auto">
        <div class="row">
          <div class="col-sm-12">
            <div
              class="cms-pg-header mt-0"
              style="justify-content: start !important"
              id="stage"
            >
              <span class="stage">Profile Details</span>
              <div class="stage-line"></div>
              <span class="stage">Profile Details</span>
              <div class="stage-line"></div>
              <span class="unstage">Profile Details</span>
              <div class="unstage-line"></div>
              <span class="unstage">Profile Details</span>
              <div class="unstage-line"></div>
              <span class="unstage">Profile Details</span>
              <div class="unstage-line"></div>
              <span class="unstage">Profile Details</span>
            </div>
            <div class="cms-pg-header mt-0" id="unstage">
              <h1 class="stage-heading">Profile Details</h1>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <ProfileStage />
          </div>
        </div>
      </div>
      <!-- open modal on page load start -->

      <!-- close modal on page load end -->

      <!-- /.row -->
    </section>
    <main-footer></main-footer>
  </div>
</template>

<script>
import $ from "jquery";
import ProfileStage from "./ProfileStage.vue";
export default {
  name: "MainStage",
  // props: ["keyword", "location", "experience", "jobtype"],
  components: {
    ProfileStage: ProfileStage,
  },
  data() {
    return {
      form: new Form({
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
.stage[data-v-8bed8e26] {
  display: inline-block;
  /* width: 10% !important; */
  max-width: 100%;
  padding: 0;
  margin-bottom: 0.5rem;
  font-size: 1rem;
  line-height: inherit;
  color: inherit;
  white-space: normal;
}
.stage {
  background-color: gray;
  color: white !important;
  width: auto !important;
  font-size: 15px !important;
  font-weight: 400 !important;
  padding: 3px 2px !important;
  text-align: center;
  border-radius: 20px;
  cursor: pointer;
}
.stage-line {
  border-top: 3px solid #374151;
  /* width: 7%; */
  padding: 0;
  max-width: 100%;
}
.unstage[data-v-8bed8e26] {
  display: inline-block;
  /* width: 10% !important; */
  max-width: 100%;
  padding: 0;
  margin-bottom: 0.5rem;
  font-size: 1rem;
  line-height: inherit;
  color: inherit;
  white-space: normal;
}
.unstage {
  background-color: rgb(249, 249, 249);
  border: 1px solid #374151;
  color: rgb(7, 7, 7) !important;
  width: auto !important;
  font-size: 14px !important;
  font-weight: 400 !important;
  padding: 3px 2px !important;
  text-align: center;
  border-radius: 20px;
  cursor: pointer;
}
.unstage-line {
  border-top: 1px solid #374151;
  padding: 0;
  max-width: 100%;
}
#unstage {
  display: none;
}
@media only screen and (min-width: 1198px) {
  .unstage[data-v-8bed8e26],
  .stage[data-v-8bed8e26] {
    width: 11% !important;
  }
  .unstage,
  .stage {
    font-size: 14px !important;
    font-weight: 400 !important;
    padding: 3px 4px !important;
    border-radius: 20px;
  }
  .unstage-line,
  .stage-line {
    width: 6%;
  }
}
@media only screen and (max-width: 1198px) and (min-width: 952px) {
  .unstage[data-v-8bed8e26],
  .stage[data-v-8bed8e26] {
    width: 12% !important;
  }
  .unstage,
  .stage {
    font-size: 14px !important;
    font-weight: 400 !important;
    padding: 3px 2px !important;
    border-radius: 20px;
  }
  .unstage-line,
  .stage-line {
    width: 5% !important;
  }
}
@media only screen and (max-width: 952px) and (min-width: 838px) {
  .unstage[data-v-8bed8e26],
  .stage[data-v-8bed8e26] {
    width: 14% !important;
  }
  .unstage,
  .stage {
    font-size: 14px !important;
    font-weight: 400 !important;
    padding: 3px 2px !important;
    border-radius: 20px;
  }
  .unstage-line,
  .stage-line {
    width: 3% !important;
  }
}
@media only screen and (max-width: 838px) and (min-width: 718px) {
  .unstage[data-v-8bed8e26],
  .stage[data-v-8bed8e26] {
    width: 15% !important;
  }
  .unstage,
  .stage {
    font-size: 14px !important;
    font-weight: 400 !important;
    padding: 3px 2px !important;
    border-radius: 20px;
  }
  .unstage-line,
  .stage-line {
    width: 2% !important;
  }
}
@media only screen and (max-width: 718px) and (min-width: 352px) {
  .unstage[data-v-8bed8e26],
  .stage[data-v-8bed8e26] {
    width: 15% !important;
  }
  .unstage,
  .stage {
    font-size: 13px !important;
    font-weight: 200 !important;
    padding: 3px 2px !important;
    border-radius: 20px;
  }
  .unstage-line,
  .stage-line {
    width: 1% !important;
  }
}
@media only screen and (max-width: 683px) {
  #stage {
    display: none;
  }
  #unstage {
    display: block !important;
  }
  .stage-heading {
    display: inline-block;
    width: 100% !important;
    max-width: 100%;
    padding: 0;
    margin-bottom: 0.5rem;
    font-size: 1rem;
    line-height: inherit;
    color: inherit;
    white-space: normal;
  }
  .stage-heading {
    background-color: gray;
    color: white !important;
    width: auto !important;
    font-size: 17px !important;
    font-weight: 400 !important;
    padding: 7px 17px !important;
    text-align: center;
    cursor: pointer;
  }
}
</style>
