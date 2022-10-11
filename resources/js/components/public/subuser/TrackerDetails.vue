<template>
  <div id="trackerdetails">
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
                  <li class="active">Candidate Details</li>
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
              <h2 class="hk-pg-title">Candidate Details of {{ form.name }}</h2>
              <router-link :to="`/tracker-list`">
                <a href="" class="btn btn-primary text-white"
                  ><i class="fas fa-arrow-left mr-2"></i>Back</a
                >
              </router-link>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-7 mx-auto">
                      <i class="fa fa-info-circle" style="color: red" aria-hidden="true">
                        Name,Email,Contact No. and Reference are mandatory fields.</i
                      >
                      <form
                        method="post"
                        role="form"
                        class="consultant-signup"
                        @submit.prevent="updateTracker()"
                        autocomplete="off"
                      >
                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label>Name<span style="color: red"> * </span></label>
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                v-model="form.name"
                                placeholder="Enter Name"
                                required
                              />
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label>Email <span style="color: red"> * </span></label>
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
                              />
                            </div>
                          </div>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label>Contact No. <span style="color: red"> * </span></label>
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                id="contact"
                                v-model="form.contact"
                                required
                                maxlength="10"
                                onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                placeholder="Enter Contact No."
                              />
                            </div>
                            <span
                              id="e_contact_err"
                              style="color: red; font-size: 12px"
                            ></span>
                          </div>

                          <div class="col-sm-6">
                            <label>Experience </label>
                            <div class="input password">
                              <select
                                class="form-control"
                                placeholder="Enter Experience"
                                v-model="form.experience"
                              >
                                <option value="" disabled>Select From Here</option>
                                <option value="fresher">0-1 Yr (Also Fresher)</option>
                                <option value="1-2">1-2 Yr</option>
                                <option value="2-4">2-4 Yr</option>
                                <option value="4-5">4-5 Yr</option>
                                <option value="5-8">5-8 Yr</option>
                                <option value="8-10">8-10 Yr</option>
                                <option value="10-15">10-15 Yr</option>
                                <option value="15-20">15-20 Yr</option>
                                <option value="20-25">20-25 Yr</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row inputBox">
                          <div class="col-sm-12">
                            <label
                              >Key Skills (Use Multiple Skills Seperated By Comma(,))
                            </label>
                            <div class="input password">
                              <vue-tags-input
                                placeholder="Enter Skills (Multiple Skills Seperated by Comma(,)"
                                v-model="tag"
                                @keyup="
                                  () => {
                                    placeholder = ' ';
                                  }
                                "
                                :separators="[';', ',']"
                                :add-on-key="[13, ',', ';']"
                                :tags="tags"
                                :autocomplete-items="autocompleteItems"
                                @tags-changed="update"
                              />
                              <!-- <input
                                type="text"
                                id="password"
                                class="form-control"
                                placeholder="Enter Skills (Multiple Skills Seperated by Comma(,)"
                                v-model="form.key_skills"
                              /> -->
                            </div>
                          </div>
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
                                v-if="filteredKeywords && filterStatus && designation"
                              >
                                <li
                                  v-for="(filterKeyword, index) in filteredKeywords.slice(
                                    0,
                                    9
                                  )"
                                  :key="index"
                                  @click="setkeyword(filterKeyword)"
                                >
                                  {{ filterKeyword }}
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label>Select Gender </label>
                            <div class="input password">
                              <select class="form-control" v-model="form.gender">
                                <option value="" disabled="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                              </select>
                            </div>
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
                              />
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label>Expected CTC (Per Annum) </label>
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Enter Expected CTC"
                                v-model="form.expected_ctc"
                              />
                            </div>
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
                              />
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label>Preffered Location </label>
                            <div class="input text">
                              <input
                                type="text"
                                class="form-control"
                                placeholder="Enter Preffered Location"
                                v-model="form.preffered_location"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="form-group row inputBox">
                          <div class="col-sm-6">
                            <label>Notice Period </label>
                            <div class="input text">
                              <select class="form-control" v-model="form.notice_period">
                                <option value="" disabled="">Select From Here</option>
                                <option value="immediate">Immediate</option>
                                <option value="15">Within 15 days</option>
                                <option value="30">30 days</option>
                                <option value="45">45 days</option>
                                <option value="60">60 days</option>
                                <option value="90">90 days</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label>Reference <span style="color: red"> * </span> </label>
                            <div class="input text">
                              <select
                                class="form-control custom-select"
                                name="reference"
                                id="reference"
                                v-model="form.reference"
                              >
                                <option disabled value="">Select Reference Name</option>
                                <option
                                  :value="client.name"
                                  v-for="(client, index) in clientList"
                                  :key="index"
                                >
                                  {{ client.name }}
                                </option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="form-group row inputBox">
                          <div class="col-md-12">
                            <label>Remarks <span style="color: red"> * </span></label>
                            <textarea
                              class="form-control"
                              v-model="form.remarks"
                              rows="5"
                              cols="5"
                              placeholder="Enter Remarks Here"
                            ></textarea>
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
                                  ><i class="fa fa-square-o" aria-hidden="true"></i>
                                  <span class="check-icon">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                  </span>
                                </span>
                                All (<span style="color: red">*</span>) fields are
                                mandatory.
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <button
                            type="submit"
                            :disabled="filled"
                            id="sub_btn"
                            class="btn btn-outline-info btn-block my-4 waves-effect"
                          >
                            {{ registerStatus ? "Updating..." : "Update" }}
                          </button>
                        </div>
                      </form>
                    </div>
                    <div class="col-sm-5">
                      <div class="signup-info">
                        <div class="form-group row inputBox">
                          <div class="col-md-7">
                            <label>Add / Update Resume </label>
                            <input
                              type="file"
                              id="file"
                              @change="handleFileUpload"
                              accept="application/pdf,application/msword,
                              application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                              class="form-control"
                            />
                            <b v-if="progress > 0 && progress < 100" class="ml-2 mt-1">
                              Please Wait.........</b
                            >
                          </div>

                          <div class="col-md-5">
                            <label></label>
                            <a
                              class="btn btn-default btn-block btn-shadow mt-2"
                              v-if="form.resume !== null"
                              :href="'/tracker/resume/' + form.resume"
                              target="_blank"
                              download
                              ><i class="fas fa-download"></i> Resume</a
                            >
                          </div>
                        </div>
                        <button @click="onUpload" ref="myBtn" style="display: none">
                          Upload!
                        </button>
                        <hr />
                        <!-- <ul class="list-unstyled">
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
                        </ul> -->
                        <div v-if="form.resume">
                          <iframe
                            :src="`https://docs.google.com/gview?url=https://naukriyan.com/tracker/resume/${form.resume}&embedded=true`"
                            style="width: 450px; height: 600px"
                            frameborder="0"
                          ></iframe>
                        </div>
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

    <!-- The edit sub user end -->
    <subuser-footer></subuser-footer>
  </div>
</template>

<script>
//import $ from "jquery";
import VueTagsInput from "@johmun/vue-tags-input";
export default {
  name: "TrackerDetails",
  components: {
    VueTagsInput,
  },
  data() {
    return {
      tag: "",
      tags: [],
      handlers: [],
      autocompleteItems: [],
      debounce: null,
      userid: this.$route.params.trackid,
      // checked: false,
      form: new Form({
        name: "",
        gender: "",
        contact: "",
        email: "",
        experience: "",
        key_skills: "",
        current_ctc: "",
        expected_ctc: "",
        notice_period: "",
        remarks: "",
        resume: "",
        designation: "",
        preffered_location: "",
        current_location: "",
        reference: "",
      }),
      resume: "",
      designation: "",
      registerStatus: false,
      filled: false,
      keywords: [],
      filteredKeywords: [],
      filterStatus: false,
      selectedFile: null,
      progress: "",
      clientList: [],
    };
  },
  mounted() {
    this.getTrackerList();
    this.getFilteredKeyword();
    this.getFilterKeywords();
  },
  methods: {
    update(newTags) {
      this.autocompleteItems = [];
      this.tags = newTags.map((a) => {
        return a.text;
      });
      this.handlers = this.tags.toString();
      // this.keyword = this.tags.toString();
      // console.log(this.tags);
    },
    initItems() {
      if (this.tag.length < 2) return;
      const url = `get-allskills/` + this.tag;

      clearTimeout(this.debounce);
      this.debounce = setTimeout(() => {
        axios
          .get(url)
          .then((response) => {
            this.autocompleteItems = response.data.data.map((a) => {
              return { text: a.name };
            });
          })
          .catch(() => console.warn("Oh. Something went wrong"));
      }, 600);
    },
    getTrackerList() {
      axios.get("/tracker-details/" + this.userid).then((response) => {
        this.form = response.data.data;
        this.designation = response.data.data.designation;
        this.tags = this.form.key_skills.split(",");
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
    updateTracker() {
      $("#sub_btn").attr("disabled", "disabled");
      document.getElementById("sub_btn").innerHTML = "Please Wait.......";
      $.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/update-tracker",
        enctype: "multipart/form-data",
        method: "POST",
        data: {
          id: this.userid,
          name: this.form.name,
          gender: this.form.gender,
          contact: this.form.contact,
          email: this.form.email,
          experience: this.form.experience,
          key_skills: this.tags.toString(),
          current_ctc: this.form.current_ctc,
          expected_ctc: this.form.expected_ctc,
          notice_period: this.form.notice_period,
          remarks: this.form.remarks,
          designation: this.designation,
          preffered_location: this.form.preffered_location,
          current_location: this.form.current_location,
          reference: this.form.reference,
        },

        success: function (resp) {
          toast({
            type: "success",
            title: "Updated Successfully",
          });
          $("#sub_btn").removeAttr("disabled");
          document.getElementById("sub_btn").innerHTML = "Update";
          window.location.href = "/#/tracker-list";
        },
        error: function (req, status, err) {
          toast({
            type: "error",
            text: "Updation Failed",
          });
          $("#sub_btn").removeAttr("disabled");
          document.getElementById("sub_btn").innerHTML = "Update";
        },
      });
    },
    handleFileUpload(event) {
      //const file = event.target.files[0]
      this.selectedFile = event.target.files[0];
      if (
        this.selectedFile["type"] === "application/pdf" ||
        this.selectedFile["type"] === "application/msword" ||
        this.selectedFile["type"] ===
          "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
      ) {
        const elem = this.$refs.myBtn;
        elem.click();
      } else {
        toast({
          type: "warning",
          title: "Only PDF and Docx files are allowed",
        });
        this.$refs.myBtn.value = "";
        //this.$router.go("/userinfo/pe");
      }
    },
    onUpload() {
      if (this.selectedFile) {
        const formData = new FormData();
        formData.append("resume", this.selectedFile, this.selectedFile.name);
        formData.append("id", this.userid);
        axios
          .post("update-tracker/resume", formData, {
            onUploadProgress: (uploadEvent) => {
              this.progress = Math.round(uploadEvent.total / uploadEvent.total) * 100;
            },
          })
          .then((res) => {
            this.getTrackerList();

            toast({
              type: "success",
              title: "Resume Uploaded Successfully",
            });
            this.$router.push("/tracker-list");
          })
          .catch((error) => {
            toast({
              type: "error",
              text: "Something Went wrong",
            });
          });
      }
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
    tag: "initItems",
    designation() {
      this.getFilteredKeyword();
    },
  },
  created() {
    this.$forceUpdate();
    this.getClientList();
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
</style>
