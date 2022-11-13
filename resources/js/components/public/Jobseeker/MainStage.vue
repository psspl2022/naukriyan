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
import ProfileStage from "./ProfileStage.vue";
import EducationStage from "./EducationStage.vue";
import ProfessionalStage from "./ProfessionalStage.vue";
import ResumeStage from "./ResumeStage.vue";
import CertificationStage from "./CertificationStage.vue";
import SkillStage from "./SkillStage.vue";

export default {
  name: "MainStage",
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
    };
  },
  watch: {
    i: "updatex",
  },
  created() {
    this.startStage();
  },
  methods: {
    startStage() {
      axios.get(`/get-stage-registration`).then((response) => {
        this.stage = response.data[0].stage;
        this.stageSave = response.data[0].savestage;
      });
    },
    setStage(stage, stageSave) {
      if (stageSave >= stage) {
        axios.get(`/update-stage-registration/${stage}`).then((response) => {
          this.stage = response.data[0].stage;
        });
        this.stage = stage;
      }
    },
  },
};
</script>
