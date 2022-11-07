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
              <span
                :class="[
                  stage >= 1 ? 'stage' : stageSave >= 1 ? 'unstage' : 'unstage unsave',
                ]"
                v-on:click="setStage(1, stageSave)"
                >Personal Details</span
              >
              <div :class="[stage >= 1 ? 'stage-line' : 'unstage-line']"></div>
              <span
                :class="[
                  stage >= 2 ? 'stage' : stageSave >= 2 ? 'unstage' : 'unstage unsave',
                ]"
                v-on:click="setStage(2, stageSave)"
                >Education</span
              >
              <div :class="[stage >= 2 ? 'stage-line' : 'unstage-line']"></div>
              <span
                :class="[
                  stage >= 3 ? 'stage' : stageSave >= 3 ? 'unstage' : 'unstage unsave',
                ]"
                v-on:click="setStage(3, stageSave)"
                >Professional</span
              >
              <div :class="[stage >= 3 ? 'stage-line' : 'unstage-line']"></div>
              <span
                :class="[
                  stage >= 4 ? 'stage' : stageSave >= 4 ? 'unstage' : 'unstage unsave',
                ]"
                v-on:click="setStage(4, stageSave)"
                >Resume</span
              >
              <div :class="[stage >= 4 ? 'stage-line' : 'unstage-line']"></div>
              <span
                :class="[
                  stage >= 5 ? 'stage' : stageSave >= 5 ? 'unstage' : 'unstage unsave',
                ]"
                v-on:click="setStage(5, stageSave)"
                >Certifications</span
              >
              <div :class="[stage >= 5 ? 'stage-line' : 'unstage-line']"></div>
              <span
                :class="[
                  stage >= 6 ? 'stage' : stageSave >= 6 ? 'unstage' : 'unstage unsave',
                ]"
                v-on:click="setStage(6, stageSave)"
                >Skills</span
              >
            </div>
            <div class="cms-pg-header mt-0" id="unstage">
              <h1 class="stage-heading">Profile Details</h1>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <ProfileStage :startStage="startStage" v-if="stage == 1" />
            <EducationStage :startStage="startStage" v-if="stage == 2" />
            <ProfessionalStage :startStage="startStage" v-if="stage == 3" />
            <ResumeStage :startStage="startStage" v-if="stage == 4" />
            <CertificationStage :startStage="startStage" v-if="stage == 5" />
            <SkillStage :startStage="startStage" v-if="stage == 6" />
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
import EducationStage from "./EducationStage.vue";
import ProfessionalStage from "./ProfessionalStage.vue";
import ResumeStage from "./ResumeStage.vue";
import CertificationStage from "./CertificationStage.vue";
import SkillStage from "./SkillStage.vue";

export default {
  name: "MainStage",
  // props: ["keyword", "location", "experience", "jobtype"],
  components: {
    ProfileStage: ProfileStage,
    EducationStage: EducationStage,
    ProfessionalStage: ProfessionalStage,
    ResumeStage: ResumeStage,
    CertificationStage: CertificationStage,
    SkillStage: SkillStage,
  },
  data() {
    return {
      stage: 1,
      stageSave: 1,
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
  watch: {
    i: "updatex",
  },
  created() {
    this.getAllEducation();
    this.startStage();
  },
  mounted() {
    this.startStage();
  },
  computed: {},
  // watch: {
  //   stage: "startStage",
  // },
  methods: {
    startStage() {
      axios.get(`/get-stage-registration`).then((response) => {
        // console.log(response.data[0].savestage);
        this.stage = response.data[0].stage;
        this.stageSave = response.data[0].savestage;
      });
    },
    setStage(stage, stageSave) {
      if (stageSave >= stage) {
        axios.get(`/update-stage-registration/${stage}`).then((response) => {
          // console.log(response.data[0].savestage);
          this.stage = response.data[0].stage;
          // this.stageSave = response.data[0].savestage;
        });
        this.stage = stage;
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
