<template>
  <div id="addtracker">
    <subuser-header></subuser-header>
    <section>
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Add Candidate</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i>
                  <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411 </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="top-adjust section pb-5 mt-0 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="cms-pg-header">
              <h2 class="hk-pg-title">Add Candidate</h2>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-8 mx-auto">
                      <i
                        class="fa fa-info-circle"
                        style="color: red"
                        aria-hidden="true"
                      >
                        Name,Email,Contact No. and Reference are mandatory
                        fields.</i
                      >
                      <form
                        method="post"
                        role="form"
                        class="consultant-signup"
                        @submit.prevent="addTracker()"
                        autocomplete="off"
                      >
                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label
                              >Name<span style="color: red"> * </span></label
                            >
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                v-model="form.name"
                                placeholder="Enter Name"
                                required
                                :class="{
                                  'is-invalid': form.errors.has('name'),
                                }"
                              />
                            </div>
                            <has-error :form="form" field="name"></has-error>
                          </div>
                          <div class="col-sm-6">
                            <label
                              >Email <span style="color: red"> * </span></label
                            >
                            <div class="input text">
                              <input
                                type="email"
                                class="form-control"
                                v-model="form.email"
                                @blur="checkEmail($event)"
                                name="email"
                                id="email"
                                placeholder="Enter Email"
                                required
                                :class="{
                                  'is-invalid': form.errors.has('email'),
                                }"
                              />
                            </div>
                            <has-error :form="form" field="email"></has-error>
                          </div>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label
                              >Contact No.
                              <span style="color: red"> * </span></label
                            >
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                id="contact"
                                v-model="form.contact"
                                required
                                maxlength="10"
                                onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                :class="{
                                  'is-invalid': form.errors.has('contact'),
                                }"
                                placeholder="Enter Contact No."
                              />
                            </div>
                            <span
                              id="e_contact_err"
                              style="color: red; font-size: 12px"
                            ></span>
                            <has-error :form="form" field="contact"></has-error>
                          </div>

                          <div class="col-sm-6">
                            <label>Experience </label>
                            <div class="input password">
                              <select
                                class="form-control"
                                placeholder="Enter Experience"
                                v-model="form.experience"
                                :class="{
                                  'is-invalid': form.errors.has('experience'),
                                }"
                              >
                                <option value="" disabled>
                                  Select From Here
                                </option>
                                <option value="fresher">
                                  0-1 Yr (Also Fresher)
                                </option>
                                <option value="1-2">1-2 Yr</option>
                                <option value="2-4">2-4 Yr</option>
                                <option value="4-5">4-5 Yr</option>
                                <option value="5-8">5-8 Yr</option>
                                <option value="8-10">8-10 Yr</option>
                                <option value="10-15">10-15 Yr</option>
                                <option value="15-20">15-20 Yr</option>
                                <option value="20-25">20-25 Yr</option>
                              </select>
                              <!-- <input
                                type="text"
                                class="form-control"
                                placeholder="Enter Experience"
                                v-model="form.experience"
                                :class="{
                                  'is-invalid': form.errors.has('experience'),
                                }"
                              /> -->
                            </div>
                          </div>
                          <has-error
                            :form="form"
                            field="experience"
                          ></has-error>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-sm-12">
                            <label
                              >Key Skills (Use Multiple Skills Seperated By
                              Comma(,))
                            </label>
                            <div class="input password">
                              <vue-tags-input
                                placeholder="Enter Skills (Multiple Skills Seperated by Comma(,)"
                                v-model="tag"
                                :separators="[';', ',']"
                                :add-on-key="[13, ',', ';']"
                                :tags="tags"
                                @tags-changed="(newTags) => (tags = newTags)"
                              />
                              <!-- <input
                                type="text"
                                id="password"
                                class="form-control"
                                placeholder="Enter Skills (Multiple Skills Seperated by Comma(,)"
                                v-model="form.skills"
                                :class="{
                                  'is-invalid': form.errors.has('skills'),
                                }"
                              /> -->
                            </div>
                          </div>
                          <has-error :form="form" field="password"></has-error>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label>Designation </label>
                            <div class="input text">
                              <input
                                type="text"
                                @focus="filterStatus = true"
                                class="form-control"
                                id="keyword"
                                placeholder="Select or Input Designation"
                                v-model="designation"
                              />
                            </div>
                            <div style="background-color: white">
                              <ul
                                class="filter-keyword"
                                v-if="
                                  filteredKeywords &&
                                  filterStatus &&
                                  designation
                                "
                              >
                                <li
                                  v-for="(
                                    filterKeyword, index
                                  ) in filteredKeywords.slice(0, 9)"
                                  :key="index"
                                  @click="setkeyword(filterKeyword)"
                                >
                                  {{ filterKeyword }}
                                </li>
                              </ul>
                            </div>
                            <has-error
                              :form="form"
                              field="designation"
                            ></has-error>
                          </div>
                          <div class="col-sm-6">
                            <label>Select Gender </label>
                            <div class="input password">
                              <select
                                class="form-control"
                                :class="{
                                  'is-invalid': form.errors.has('gender'),
                                }"
                                v-model="form.gender"
                              >
                                <option value="" disabled="">
                                  Select Gender
                                </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                              </select>
                            </div>
                            <has-error :form="form" field="gender"></has-error>
                          </div>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label>Current CTC (Per Annum) </label>
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Enter Current CTC"
                                v-model="form.current_ctc"
                                :class="{
                                  'is-invalid': form.errors.has('current_ctc'),
                                }"
                              />
                            </div>
                            <has-error
                              :form="form"
                              field="current_ctc"
                            ></has-error>
                          </div>
                          <div class="col-sm-6">
                            <label>Expected CTC (Per Annum) </label>
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Enter Expected CTC"
                                v-model="form.expected_ctc"
                                :class="{
                                  'is-invalid': form.errors.has('expected_ctc'),
                                }"
                              />
                            </div>
                            <has-error
                              :form="form"
                              field="expected_ctc"
                            ></has-error>
                          </div>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label>Current Location </label>
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Enter Current Location"
                                v-model="form.current_location"
                                :class="{
                                  'is-invalid':
                                    form.errors.has('current_location'),
                                }"
                              />
                            </div>
                            <has-error
                              :form="form"
                              field="current_location"
                            ></has-error>
                          </div>
                          <div class="col-sm-6">
                            <label>Preffered Location </label>
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Enter Preffered Location"
                                v-model="form.preffered_location"
                                :class="{
                                  'is-invalid':
                                    form.errors.has('preffered_location'),
                                }"
                              />
                            </div>
                            <has-error
                              :form="form"
                              field="preffered_location"
                            ></has-error>
                          </div>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-md-12">
                            <label>Resume </label>
                            <input
                              type="file"
                              id="file"
                              ref="resume"
                              v-on:change="handleFileUpload()"
                              accept="application/pdf,application/msword,
                              application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                              class="form-control"
                            />
                            <has-error :form="form" field="resume"></has-error>
                          </div>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label>Notice Period </label>
                            <div class="input text">
                              <select
                                class="form-control"
                                :class="{
                                  'is-invalid':
                                    form.errors.has('notice_period'),
                                }"
                                v-model="form.notice_period"
                              >
                                <option value="" disabled="">
                                  Select From Here
                                </option>
                                <option value="immediate">Immediate</option>
                                <option value="15">Within 15 days</option>
                                <option value="30">30 days</option>
                                <option value="45">45 days</option>
                                <option value="60">60 days</option>
                                <option value="90">90 days</option>
                              </select>
                            </div>
                            <has-error
                              :form="form"
                              field="notice_period"
                            ></has-error>
                          </div>
                          <div class="col-sm-6">
                            <label class="col-form-label" for=""
                              ><span style="color: red"> * </span> Reference
                              <sub style="color: red"
                                >(Not in List ?? Select 'others' and add
                                new)</sub
                              ></label
                            >
                            <select
                              class="form-control custom-select"
                              name="reference"
                              id="reference"
                              @change="openClient"
                              v-model="form.reference"
                            >
                              <option disabled value="">
                                Select Reference Name
                              </option>
                              <option
                                :value="client.name"
                                v-for="(client, index) in clientList"
                                :key="index"
                              >
                                {{ client.name }}
                              </option>
                              <option value="add_reference">Others</option>
                            </select>

                            <em style="color: red"> </em>
                            <has-error
                              :form="form"
                              field="reference"
                            ></has-error>
                          </div>
                        </div>

                        <div class="form-group row inputBox">
                          <div class="col-md-12">
                            <label>Remarks </label>
                            <textarea
                              class="form-control"
                              v-model="form.remarks"
                              :class="{
                                'is-invalid': form.errors.has('remarks'),
                              }"
                              rows="5"
                              cols="5"
                              placeholder="Enter Remarks Here"
                            ></textarea>

                            <has-error :form="form" field="remarks"></has-error>
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="d-flex justify-content-between">
                            <div class="my-checkbox">
                              <label class="checkbox-inline" for="remember_me2">
                                <input
                                  type="checkbox"
                                  class="custom-control-input"
                                  id="remember_me2"
                                />
                                <span class="checkbox-icon"
                                  ><i
                                    class="fa fa-square-o"
                                    aria-hidden="true"
                                  ></i>
                                  <span class="check-icon">
                                    <i
                                      class="fa fa-check"
                                      aria-hidden="true"
                                    ></i>
                                  </span>
                                </span>
                                All (<span style="color: red">*</span>) fields
                                are mandatory.
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <button
                            type="submit"
                            :disabled="filled"
                            class="
                              btn btn-outline-info btn-block
                              my-4
                              waves-effect
                            "
                          >
                            {{ registerStatus ? "Adding..." : "Add" }}
                          </button>
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-4">
                      <div class="signup-info">
                        <h4 class="mb-3" style="font-size: 1.4em">
                          Recruitment Tracker
                        </h4>
                        <hr />
                        <ul class="list-unstyled">
                          <li>
                            A recruitment tracker is used to track job
                            applications, interviews, and candidate contact
                            details online.
                          </li>
                          <li>
                            Improve your recruitment process with this free
                            Recruitment Tracker table! Just enter candidate info
                            by hand, or link your online job application form
                            with your Recruitment Tracker to add new candidates
                            automatically! By adding interview notes to existing
                            candidates, you can compare strengths and weaknesses
                            to choose the right person for the job.
                          </li>
                        </ul>
                      </div>
                      <div class="already">
                        <p>
                          <router-link :to="`/tracker-list`">
                            <button
                              type="button"
                              class="btn btn-default btn-block btn-shadow mt-2"
                            >
                              <i class="fas fa-sign-in-alt"></i> Candidate List
                            </button>
                          </router-link>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- add reference -->
    <div class="modal fade popupForm custom-model-width" id="addSubUser">
      <div class="modal-dialog">
        <div class="modal-content">
          <form
            class="popupForm"
            role="demo"
            method="post"
            @submit.prevent="addReference()"
            id="addUserForm"
          >
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Reference</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-form-label" for="">Reference Name</label>
                  <input
                    type="text"
                    class="form-control"
                    required
                    placeholder="Enter Reference Name"
                    v-model="demo.reference_name"
                    name="reference_name"
                  />
                  <has-error :form="demo" field="reference_name"></has-error>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-form-label" for="">Description</label>
                  <textarea
                    class="form-control"
                    required
                    placeholder="Enter Description"
                    v-model="demo.description"
                    :class="{ 'is-invalid': demo.errors.has('description') }"
                    name="description"
                  >
                  </textarea>
                  <has-error :form="demo" field="description"></has-error>
                </div>
              </div>
              <i class="fa fa-info-circle" aria-hidden="true"></i
              ><span style="color: red"> All Fields are Mandatory</span>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary text-white">
                {{ createStatus ? "Saving..." : "Save" }}
              </button>
              <button
                type="button"
                class="btn btn-danger"
                data-dismiss="modal"
                @click="resetForm()"
              >
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- The add reference end -->
    <subuser-footer></subuser-footer>
  </div>
</template>

<script>
import $ from "jquery";
import VueTagsInput from "@johmun/vue-tags-input";

export default {
  name: "AddTracker",
  components: {
    VueTagsInput,
  },
  data() {
    return {
      tag: "",
      tags: [],
      checked: false,
      form: new Form({
        name: "",
        gender: "",
        contact: "",
        email: "",
        experience: "",
        skills: "",
        current_ctc: "",
        expected_ctc: "",
        notice_period: "",
        remarks: "",
        resume: "",
        preffered_location: "",
        current_location: "",
        reference: "",
      }),
      designation: "",
      registerStatus: false,
      filled: false,
      keywords: [],
      filteredKeywords: [],
      filterStatus: false,
      demo: new Form({
        reference_name: "",
        description: "",
      }),
      clientList: [],
      createStatus: false,
    };
  },
  mounted() {
    this.getFilteredKeyword();
    this.getFilterKeywords();
    if (localStorage.getItem("reloaded")) {
      // The page was just reloaded. Clear the value from local storage
      // so that it will reload the next time this page is visited.
      localStorage.removeItem("reloaded");
    } else {
      // Set a flag so that we know not to reload the page twice.
      localStorage.setItem("reloaded", "1");
      location.reload();
    }
  },
  methods: {
    handleFileUpload() {
      this.resume = this.$refs.resume.files[0];
    },
    openClient() {
      if (this.form.reference === "add_reference") {
        $("#addSubUser").modal("show");
      }
    },
    addTracker() {
      this.registerStatus = true;
      let formData = new FormData();
      this.form.skills = [];
      this.form.skills = [];
      this.tags.map((item) => this.form.skills.push(item.text));
      formData.append("resume", this.resume);
      formData.append("name", this.form.name);
      formData.append("email", this.form.email);
      formData.append("contact", this.form.contact);
      formData.append("designation", this.designation);
      formData.append("gender", this.form.gender);
      formData.append("experience", this.form.experience);
      formData.append("skills", this.form.skills);
      formData.append("current_ctc", this.form.current_ctc);
      formData.append("expected_ctc", this.form.expected_ctc);
      formData.append("notice_period", this.form.notice_period);
      formData.append("remarks", this.form.remarks);
      formData.append("preffered_location", this.form.preffered_location);
      formData.append("current_location", this.form.current_location);
      formData.append("reference", this.form.reference);

      axios
        .post("/add-tracker", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
        })
        .then((response) => {
          this.$router.push("/tracker-list");
          toast({
            type: "success",
            title: "Added Successfully",
          });
          //location.reload();
          this.registerStatus = false;
        })
        .catch((error) => {
          toast({
            type: "error",
            text: "Addition Failed",
          });
          this.registerStatus = false;
        });
    },
    addReference() {
      this.createStatus = true;
      this.demo.post("/add-reference").then(() => {
        toast({
          type: "success",
          title: "Reference Added Successfully",
        });
        Fire.$emit("afterUpdate");
        //window.location.reload();
        this.createStatus = false;
        $("#addSubUser").modal("hide");
      });
    },
    getClientList() {
      axios.get("/reference-list").then((response) => {
        this.clientList = response.data.data;
      });
    },
    getFilteredKeyword() {
      if (this.designation.length == 0) {
        this.filteredKeywords = this.keywords;
      }

      this.filteredKeywords = this.keywords.filter((el) => {
        return el.toLowerCase().startsWith(this.designation.toLowerCase());
      });
    },

    setkeyword(designation) {
      this.designation = designation;
      this.filterStatus = false;
    },

    getFilterKeywords() {
      axios
        .get("/get-designation")
        .then((response) => {
          this.keywords = response.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },
    checkEmail(event) {
      let email = event.target.value;
      axios
        .get("/checkemail-tracker/" + email)
        .then((response) => {
          if (response.data.data.email) {
            this.form.email = "";
            toast({
              type: "error",
              title: "Email ID. Already Exist",
            });
          }
        })
        .catch(() => {});
    },
  },
  watch: {
    designation() {
      this.getFilteredKeyword();
    },
  },
  created() {
    this.$forceUpdate();
    this.getClientList();
    Fire.$on("afterUpdate", () => {
      this.getClientList();
    });
  },
};
</script>

<style scoped>
.filter-keyword {
  list-style-type: none;
  padding: 0;
  text-align: left;
  z-index: 999;
  position: absolute;
  background-color: #fff;
  width: 100%;
  overflow-y: scroll;
  height: auto;
}
.filter-keyword li {
  color: gray;
  padding: 3px 13px;
  border-bottom: 1px solid #ebebeb;
}

.filter-keyword li:first-child {
  background-color: #ebebeb;
}
.vue-tags-input {
  width: 700px !important;
  max-width: 100% !important;
}
.vue-tags-input .ti-tag:after {
  transition: transform 0.2s;
  position: absolute;
  content: "";
  height: 2px;
  width: 108%;
  left: -4%;
  top: calc(50% - 1px);
  background-color: #000;
  transform: scaleX(0);
}
.vue-tags-input .ti-deletion-mark:after {
  transform: scaleX(1);
}
</style>