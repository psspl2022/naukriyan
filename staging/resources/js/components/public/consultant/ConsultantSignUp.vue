<template>
  <div id="consultantSignup">
    <section class="signup-adjust section pb-5 pt-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 mx-auto">
            <form
              method="post"
              role="form"
              class="consultant-signup"
              @submit.prevent="addConsultant()"
            >
              <div class="form-group row inputBox">
                <div class="col-sm-6">
                  <label>First Name<span style="color: red"> * </span></label>
                  <div class="input text">
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.fname"
                      placeholder="Enter First Name"
                      :class="{ 'is-invalid': form.errors.has('fname') }"
                    />
                  </div>
                  <has-error :form="form" field="fname"></has-error>
                </div>
                <div class="col-sm-6">
                  <label>Last Name <span style="color: red"> * </span></label>
                  <div class="input text">
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.lname"
                      placeholder="Enter Last Name"
                      :class="{ 'is-invalid': form.errors.has('lname') }"
                    />
                  </div>
                  <has-error :form="form" field="lname"></has-error>
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
                      :class="{ 'is-invalid': form.errors.has('contact') }"
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
                  <label>Email <span style="color: red"> * </span></label>
                  <div class="input text">
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      placeholder="Enter Email"
                      v-model="form.email"
                      :class="{ 'is-invalid': form.errors.has('email') }"
                      autocomplete="off"
                    />
                  </div>
                  <span
                    id="e_email_err"
                    style="color: red; font-size: 12px"
                  ></span>
                </div>
                <has-error :form="form" field="email"></has-error>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-6">
                  <label>Password <span style="color: red"> * </span></label>
                  <div class="input password">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      placeholder="Enter Password"
                      v-model="form.password"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                    />
                  </div>
                </div>
                <has-error :form="form" field="password"></has-error>
                <div class="col-sm-6">
                  <label
                    >Confirm Password <span style="color: red"> * </span></label
                  >
                  <div class="input password">
                    <input
                      type="password"
                      id="confirm_password"
                      class="form-control"
                      placeholder="Enter Password"
                      v-model="form.confirm_password"
                      :class="{
                        'is-invalid': form.errors.has('confirm_password'),
                      }"
                    />
                  </div>
                </div>
                <has-error :form="form" field="confirm_password"></has-error>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-6">
                  <label>Designation <span style="color: red"> * </span></label>
                  <div class="input text">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Enter Designation"
                      v-model="form.designation"
                      :class="{ 'is-invalid': form.errors.has('designation') }"
                    />
                  </div>
                  <has-error :form="form" field="designation"></has-error>
                </div>
                <div class="col-sm-6">
                  <label
                    >Select Gender <span style="color: red"> * </span></label
                  >
                  <div class="input password">
                    <select
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('gender') }"
                      v-model="form.gender"
                    >
                      <option value="" disabled="">Select Gender</option>
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
                  <label>Job Profile <span style="color: red"> * </span></label>
                  <div class="input password">
                    <select
                      v-model="form.job_profile"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('job_profile') }"
                    >
                      <option disabled="" value="">-----Select------</option>
                      <option
                        :value="job_sec.id"
                        v-for="job_sec in allLocation"
                      >
                        {{ job_sec.job_sector }}
                      </option>
                    </select>
                  </div>
                  <has-error :form="form" field="job_profile"></has-error>
                </div>
                <div class="col-sm-6">
                  <label>Industry <span style="color: red"> * </span></label>
                  <div class="input password">
                    <select
                      v-model="form.industry"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('industry') }"
                    >
                      <option disabled="" value="">-----Select------</option>
                      <option :value="ind.id" v-for="ind in industries">
                        {{ ind.category_name }}
                      </option>
                    </select>
                  </div>
                  <has-error :form="form" field="industry"></has-error>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-6">
                  <label
                    >Company Name <span style="color: red"> * </span></label
                  >
                  <div class="input password">
                    <input
                      type="text"
                      id="company_name"
                      class="form-control"
                      placeholder="Enter Company Name"
                      v-model="form.company_name"
                      :class="{ 'is-invalid': form.errors.has('company_name') }"
                    />
                  </div>
                  <has-error :form="form" field="company_name"></has-error>
                </div>
                <div class="col-sm-6">
                  <label
                    >Company Size <span style="color: red"> * </span></label
                  >
                  <div class="input password">
                    <select
                      v-model="form.company_size"
                      class="form-control"
                      :class="{ 'is-invalid': form.errors.has('company_size') }"
                    >
                      <option disabled="" value="">-----Select------</option>
                      <option value="1-50">1-50</option>
                      <option value="51-100">51-100</option>
                      <option value="101-1000">101-1000</option>
                      <option value="1001-10000">1001-10000</option>
                      <option value="above 10000">>10000</option>
                    </select>
                  </div>
                  <has-error :form="form" field="company_size"></has-error>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-6">
                  <label
                    >Company location <span style="color: red"> * </span></label
                  >
                  <input
                    type="text"
                    id="company_location"
                    class="form-control"
                    v-model="form.company_location"
                    placeholder="Enter Company location"
                    :class="{
                      'is-invalid': form.errors.has('company_location'),
                    }"
                  />
                  <has-error :form="form" field="company_location"></has-error>
                </div>
                <div class="col-md-6">
                  <label
                    >Area of Specialization
                    <span style="color: red"> * </span></label
                  >
                  <vue-tags-input
                    v-model="form.tag"
                    :class="{
                      'is-invalid': form.errors.has('specialization'),
                    }"
                    :tags="form.tags"
                    @tags-changed="(newTags) => (form.specialization = newTags)"
                  />
                  <has-error :form="form" field="specialization"></has-error>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-md-12">
                  <label
                    >Company Corporate Address
                    <span style="color: red"> * </span></label
                  >
                  <textarea
                    class="form-control"
                    v-model="form.address"
                    :class="{ 'is-invalid': form.errors.has('address') }"
                    rows="5"
                    cols="5"
                    placeholder="Type Full Address here"
                  ></textarea>

                  <has-error :form="form" field="address"></has-error>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-md-12">
                  <div class="form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="agree"
                      name="agree"
                      value="agree"
                      v-model="checked"
                    />
                    <label class="form-check-label" for="c_agreement">
                      <strong
                        >Accept our Agreements and T&C (<span class="required"
                          >*</span
                        >)</strong
                      >
                    </label>
                    <label
                      ><a
                        href=""
                        data-toggle="modal"
                        data-target="#exampleModal"
                        >View</a
                      ></label
                    >
                  </div>
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
                  <router-link :to="`/forget-password`">
                    <a href="" class="forgot-link fw-700"
                      ><i class="fas fa-key mr-2"></i>Forgot Password?</a
                    ></router-link
                  >
                </div>
              </div>
              <div class="form-group">
                <button
                  type="submit"
                  :disabled="!checked"
                  class="btn btn-outline-info btn-block my-4 waves-effect"
                >
                  {{ registerStatus ? "Registering..." : "Sign Up" }}
                </button>
              </div>
            </form>
          </div>
          <div class="col-sm-4">
            <div class="signup-info">
              <h4 class="mb-3" style="font-size: 1.4em">
                Create an account to unlock these features
              </h4>
              <hr />
              <ul class="list-unstyled">
                <li>
                  See similar job titles and skills to help you make your next
                  move
                </li>
                <li>
                  Upload a resume and become visible to Hiring Managers and
                  Employers
                </li>
                <li>
                  Compare Salary Information to see where you stand amongst your
                  peers
                </li>
                <li>Easily Quick Apply to jobs with just one click!</li>
              </ul>
            </div>
            <div class="already">
              <span> Already have an account? </span>
              <p>
                <router-link :to="`/consultant-login`">
                  <button
                    type="button"
                    class="btn btn-default btn-block btn-shadow mt-2"
                  >
                    <i class="fas fa-sign-in-alt"></i> Login
                  </button>
                </router-link>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Terms and Conditions
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueTagsInput from "@johmun/vue-tags-input";

export default {
  name: "ConsultantSignup",
  components: {
    VueTagsInput,
  },
  data() {
    return {
      checked: false,
      form: new Form({
        fname: "",
        lname: "",
        designation: "",
        password: "",
        gender: "",
        confirm_password: "",
        company_location: "",
        company_name: "",
        company_size: "",
        contact: "",
        email: "",
        address: "",
        job_profile: "",
        industry: "",
        specialization: [],
        tag: "",
        tags: [],
      }),
      industries: [],
      registerStatus: false,
    };
  },
  mounted() {
    this.$store.dispatch("getAllLocation", "/get-job-sector");
    this.getIndustries();
  },
  computed: {
    allLocation() {
      return this.$store.getters.getAllLocation;
    },
  },
  methods: {
    getIndustries() {
      axios
        .get("/get-industries")
        .then((response) => {
          this.industries = response.data.data;
        })
        .catch((error) => {
          console.log("error");
        });
    },

    addConsultant() {
      this.registerStatus = true;
      this.form
        .post("/consultant-registration")
        .then((response) => {
          if (response.status === 200 && response.data.status === "success") {
            this.$router.push("/thanq");
            this.registerStatus = false;
            // this.$router.push({ path: 'verify-otp', query: { email: this.form.email, contact: this.form.contact }});
            toast({
              type: "success",
              title: response.data.message,
            });
          } else if (
            response.status === 201 &&
            response.data.status === "error"
          ) {
            this.registerStatus = false;
            toast({
              type: "error",
              title: response.data.message,
            });
          } else {
            this.registerStatus = false;
            toast({
              type: "error",
              title: "Something went wrong. Please try again",
            });
          }
        })
        .catch(() => {
          this.registerStatus = false;
        });
    },
  },
};
</script>

<style scoped>
.invalid-feedback {
  display: block;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #e3342f;
}

.signup-info {
  background-color: #fff;
  padding: 50px 50px;
  box-shadow: 1px 1px 20px #f7f7f7;
}

.signup-info ul li:before {
  content: "\F00C";
  font-family: "Font Awesome 5 Free";
  margin-right: 5px;
  font-weight: 600;
  color: #f95602;
  padding: 7px;
  border-radius: 50%;
}

.signup-info ul li {
  display: flex;
  line-height: 25px;
  margin-bottom: 10px;
}

.already {
  padding: 2rem;
  background-color: #f95602;
  margin-top: 1rem;
  text-align: center;
}

.already span {
  font-size: 20px;
  color: #fff;
  font-weight: 600;
}
</style>