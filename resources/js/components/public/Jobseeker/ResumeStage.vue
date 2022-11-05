<template>
  <div class="row">
    <div class="col-sm-12">
     
      <form
        class="popupForm"
        role="form"
        method="post"
        @submit.prevent="addResume()"
      >
        <fieldset v-for="i in i" :key="i">
          <legend  v-if="i==1">Resume</legend>
          <div class="row mb-2">
            <div class="col-sm-6">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Institute Name</label
              >
              <input
                type="file"
                class="form-control"
                :name="resume"
                :class="{ 'is-invalid': form.errors.has('resume') }"
              />
              <has-error :form="form" field="resume"></has-error>
            </div>
            <div class="col-sm-6">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Video Resume</label
              >
              <input
                type="text"
                class="form-control"
                :name="video"
                placeholder="Enter Video Resume Link"
                v-model="form.video"
                :class="{ 'is-invalid': form.errors.has('video') }"
              />
              <has-error :form="form" field="video"></has-error>
            </div>
            <div class="col-sm-12">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Cover Letter</label
              >
              <textarea
                type="text"
                class="form-control"
                :name="cover"
                placeholder="Enter Cover Letter"
                v-model="form.cover"
                :class="{ 'is-invalid': form.errors.has('cover') }"
              ></textarea>
              <has-error :form="form" field="cover"></has-error>
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
  name: "ResumeStage",
  // props: ["keyword", "location", "experience", "jobtype"],
  data() {
    return {
      i: 1,
      form: new Form({
        id: "",
        video: "",
        cover: "",
        resume: "",
      }),
    };
  },
  mounted() {
  },
  computed: {
  },
  methods: {
    addResume() {
  
    },
  }
    
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
