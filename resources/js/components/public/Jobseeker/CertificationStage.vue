<template>
  <div class="row stage-main-div">
    <div class="col-sm-12">
      <form
        class="col-sm-3 ml-auto offset-sm-2"
        method="post"
        @submit.prevent="submitNocertificate()"
      >

        <div class="form-check" v-on:click="addNocertificate">
          <input
            class="form-check-input"
            v-model="form.certificate"
            type="checkbox"
            id="certificate"
          />
          <label class="form-check-label" for="certificate">
            I do not have any Certificate</label
          >
        </div>
        <button
          type="submit"
          v-if="form.certificate == true"
          class="btn btn-primary mt-3"
        >
          Save
        </button>
      </form>
      <form
        class="popupForm"
        role="form"
        method="post"
        @submit.prevent="addCertification()"
        v-if="form.certificate == false"
      >
        <fieldset class="mt-2" v-for="i in formIndex" :key="i">
          <legend v-if="i == 1">Certification</legend>
          <input type="hidden" v-model="form.index[i - 1]" />
          <div class="row mb-2">
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Course Name</label
              >
              <input
                type="text"
                class="form-control"
                :name="'courseName' + 1"
                placeholder="Enter Course Name"
                v-model="form.courseName[i - 1]"
                :class="{ 'is-invalid': form.errors.has('courseName') }"
              />
              <input type="hidden" v-model="form.index[i - 1]" />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span>Institute Name</label
              >
              <input
                type="text"
                class="form-control"
                :name="'instituteName' + i"
                placeholder="Enter Institute Name"
                v-model="form.instituteName[i - 1]"
                :class="{ 'is-invalid': form.errors.has('instituteName') }"
              />
              <has-error :form="form" field="name"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for=""> Certification Licence</label
              >
              <input
                type="text"
                class="form-control"
                :name="'score' + 1"
                placeholder="Enter Certification Licence"
                v-model="form.score[i - 1]"
                :class="{ 'is-invalid': form.errors.has('score') }"
              />
              <has-error :form="form" field="score"></has-error>
            </div>
            <div class="col-sm-4">
              <label class="col-form-label" for="">
                <span style="color: red"> * </span> Certification Type</label
              >
              <select
                class="form-control custom-select"
                :name="'certficationtype' + i"
                v-model="form.certficationtype[i - 1]"
                :class="{
                  'is-invalid': form.errors.has('certficationtype'),
                }"
              >
                <option value="" selected>Select Job Type</option>
                <option value="1">Offline</option>
                <option value="2">Online</option>
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
                    type="month"
                    class="form-control col-8"
                    v-model="form.fromdate[i - 1]"
                    placeholder="2022-11-01"
                    value="11"
                  />
                </div>

                <div class="col-12 col-lg-6 d-flex flex-row align-items-center">
                  <div class="col-3">To:</div>
                  <input
                    type="month"
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
              <label class="col-form-label" for=""> Certificate Link (Optional)</label>
              <input
                type="text"
                class="form-control"
                :name="'score' + 1"
                placeholder="Enter Certificate Link"
                v-model="form.certificate_link[i - 1]"
                :class="{ 'is-invalid': form.errors.has('score') }"
              />
              <has-error :form="form" field="score"></has-error>
            </div>
            <div class="col-sm-8">
              <label class="col-form-label" for=""> Description</label
              >
              <textarea
                type="text"
                class="form-control"
                :name="'description' + i"
                placeholder="Enter Description"
                v-model="form.description[i - 1]"
                :class="{ 'is-invalid': form.errors.has('description') }"
              ></textarea>
              <has-error :form="form" field="name"></has-error>
            </div>
          </div>
          <span
            v-on:click="remove(i - 1, form.index[i - 1])"
            v-if="formIndex > 1"
            class="btn btn-primary mt-3"
          >
            Remove
          </span>
        </fieldset>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
        <span v-on:click="addMore()" class="btn btn-primary mt-3">Add More</span>
        <span v-on:click="skipStage()" class="btn btn-primary mt-3">Skip</span>
      </form>
    </div>
  </div>
</template>

<script>
const date = new Date();
export default {
  name: "CertificationStage",
  props: {
    startStage: { type: Function },
  },

  data() {
    return {
      formIndex: 1,
      stage: 0,
      form: new Form({
        index: [""],
        total: 1,
        courseName: [""],
        instituteName: [""],
        certficationtype: [""],
        fromdate: [""],
        todate: [""],
        score: [""],
        description: [""],
        certificate_link: [""],
        certificate: false,
      }),
    };
  },
  created() {
    this.getAllCertification();
  },
  watch: {
    formIndex: "updatex",
  },
  methods: {
    // for update formindex value for previous added form
    updatex() {
      this.formIndex = this.formIndex;
    },
    addNocertificate() {
      this.form.post("/add-certification-detail2").then((response) => {
        // console.log(response.data);
        this.getAllCertification();
        this.startStage();
      });
    },
    submitNocertificate() {
      if (this.form.certificate) {
        toast({
          type: "success",
          title: `Certification Updated successfully`,
        });
        this.skipStage();
      }
    },
    /**for add certfication data */
    addCertification() {
      if (
        this.form.courseName.includes("") ||
        this.form.instituteName.includes("") ||
        this.form.certficationtype.includes("") ||
        this.form.fromdate.includes("") ||
        this.form.todate.includes("") 
      ) {
        swal("Please fill all mandatory fields");
      } else {
        this.form.total = this.formIndex;
        this.form.post("/add-certification-detail-stage").then((response) => {
          this.getAllCertification();
          this.skipStage();
          toast({
            type: "success",
            title: `Certification Updated successfully`,
          });
        });
      }
    },
    /** for get data from backend and also set data in model */
    getAllCertification() {
      axios.get("/get-certification-detail").then((response) => {
        const data = response.data;
        console.log(data);
        if (data == "1") {
          this.form.certificate = true;
        } else {
          if (data.length > 0) {
            this.formIndex = data.length;
            this.form.courseName = [];
            this.form.instituteName = [];
            this.form.certficationtype = [];
            this.form.certificate_link = [];
            this.form.fromdate = [];
            this.form.todate = [];
            this.form.score = [];
            this.form.description = [];
            this.form.index = [];
            data.map((i, x) => {
              this.form.index.push(i.id);
              this.form.courseName.push(i.course);
              this.form.instituteName.push(i.certificate_institute_name);
              this.form.certficationtype.push(i.certification_type);
              this.form.certificate_link.push(i.certificate_link);
              this.form.fromdate.push(i.cert_from_date);
              this.form.todate.push(i.cert_to_date);
              this.form.score.push(i.grade);
              this.form.description.push(i.description);
            });
          }
        }
      });
    },
    /** for increase the looping value for adding more form */
    addMore() {
      this.formIndex = ++this.formIndex;
      this.form.index.push("");
      this.form.courseName.push("");
      this.form.instituteName.push("");
      this.form.certficationtype.push("");
      this.form.fromdate.push("");
      this.form.todate.push("");
      this.form.score.push("");
      this.form.description.push("");
      this.form.certificate_link.push("");
    },
    /**
     * for remove specific form it will take index of form and from tha remove form array value by index
     * second parameter take id as input for delete the data from backend
     */
    remove(index, id) {
      this.formIndex = --this.formIndex;
      this.form.courseName.splice(index, 1);
      this.form.instituteName.splice(index, 1);
      this.form.certficationtype.splice(index, 1);
      this.form.fromdate.splice(index, 1);
      this.form.todate.splice(index, 1);
      this.form.score.splice(index, 1);
      this.form.description.splice(index, 1);
      this.form.certificate_link.splice(index, 1);
      this.form.index.splice(index, 1);
      if (id != "") {
        axios.get(`/delete-certification-detail-stage/${id}`).then((response) => {});
      }
    },
    /**for skip the stage it will update savestage without taking data from user*/
    skipStage() {
      this.stage = 5;
      axios.get(`/skip-stage/${this.stage}`).then((response) => {
        this.startStage();
      });
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
