<template>
  <div id="editemployer">
    <Emp-header></Emp-header>
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
                  <li><a href="#">Employer Dashboard</a></li>
                  <li class="active">Edit Employer</li>
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
    <section class="top-adjust section mb-2 mt-2">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="cms-pg-header">
              <h2 class="hk-pg-title">Edit Employer</h2>
              <!-- <a href="" class="btn btn-primary text-white" data-toggle="modal" data-target="#addQuestionnaires"><i class="fas fa-plus mr-2"></i>Add Questionnaires</a> -->
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <ul class="nav nav-tabs nav-fill">
                      <li class="nav-item">
                        <a
                          class="nav-link active fs-12 border-right-0"
                          data-toggle="tab"
                          href="#Personal"
                          ><i class="fas fa-user mr-2" aria-hidden="true"></i
                          >Personal</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link fs-12 border-right-0"
                          data-toggle="tab"
                          href="#Company"
                          ><i
                            class="fas fa-building mr-2"
                            aria-hidden="true"
                          ></i
                          >Company</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="tab-content">
                  <!-- Personal tab start -->

                  <div
                    id="Personal"
                    class="tab-pane fade show active popupForm"
                  >
                    <fieldset>
                      <legend>Profile Image</legend>

                      <div class="col-sm-4">
                        <div class="custom-file custom-img-preview min-input">
                          <input
                            type="file"
                            class="custom-file-input"
                            id="emp_image"
                            name="emp_image"
                            accept="image/*"
                            @change="handleFileUpload"
                          />
                          <label class="custom-file-label" for="amenityIcon">
                            Upload Image</label
                          >
                        </div>
                      </div>
                    </fieldset>

                    <form
                      method="post"
                      role="form"
                      @submit.prevent="addPersonaldetail()"
                    >
                      <fieldset>
                        <legend>Personal Information</legend>
                        {{ editData }}

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              First Name<span style="color: red">
                                *
                              </span></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your First Name"
                              name="fname"
                              v-model="form.fname"
                              disabled=""
                            />
                            <has-error :form="form" field="fname"></has-error>
                          </div>

                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Last Name<span style="color: red">
                                *
                              </span></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Last Name"
                              name="lname"
                              v-model="form.lname"
                              disabled=""
                            />
                            <has-error :form="form" field="lname"></has-error>
                          </div>

                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Email<span style="color: red"> * </span></label
                            >
                            <input
                              type="email"
                              class="form-control"
                              placeholder="Enter Your Email ID"
                              name="email"
                              v-model="form.email"
                              disabled=""
                            />
                            <has-error :form="form" field="email"></has-error>
                          </div>
                        </div>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Contact No.<span style="color: red">
                                *
                              </span></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Contact No."
                              name="contact"
                              v-model="form.contact"
                              minlength="10"
                              maxlength="10"
                              onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                              disabled=""
                            />
                            <has-error :form="form" field="contact"></has-error>
                          </div>

                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Date of Birth<span style="color: red">
                                *
                              </span></label
                            >
                            <input
                              type="date"
                              class="form-control"
                              placeholder="Enter Your Date of Birth"
                              name="dob"
                              v-model="form.dob"
                            />
                            <has-error :form="form" field="dob"></has-error>
                          </div>

                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Gender<span style="color: red">*</span></label
                            >
                            <select
                              class="form-control custom-select"
                              name="gender"
                              v-model="form.gender"
                            >
                              <option>Male</option>
                              <option>Female</option>
                              <option>Others</option>
                            </select>
                            <has-error :form="form" field="gender"></has-error>
                          </div>
                        </div>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Aadhar No.<span style="color: red">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Adhaar No."
                              name="aadhar_no"
                              minlength="12"
                              maxlength="12"
                              onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                              v-model="form.aadhar_no"
                            />
                            <has-error
                              :form="form"
                              field="aadhar_no"
                            ></has-error>
                          </div>

                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Current Designation<span style="color: red"
                                >*</span
                              ></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Current Designation"
                              name="designation"
                              v-model="form.designation"
                            />
                            <has-error
                              :form="form"
                              field="designation"
                            ></has-error>
                          </div>

                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Select Industry<sub>
                                (Please select one)</sub
                              ></label
                            >
                            <select
                              class="form-control custom-select"
                              name="industry"
                              v-model="form.industry_id"
                            >
                              <option value="" disabled>Select Industry</option>
                              <option
                                :value="ind.id"
                                v-for="ind in allIndustry"
                                :selected="form.industry_id === ind.id"
                              >
                                {{ ind.category_name }}
                              </option>
                            </select>
                            <has-error
                              :form="form"
                              field="industry"
                            ></has-error>
                          </div>
                        </div>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Functional Area
                              <sub> (Please select one)</sub></label
                            >
                            <select
                              class="form-control custom-select"
                              name="functionalrole"
                              v-model="form.functionalrole_id"
                            >
                              <option value="" disabled>
                                Select Functional Role
                              </option>
                              <option
                                :value="fun.id"
                                v-for="fun in allDesignation"
                                :selected="form.functionalrole_id === fun.id"
                              >
                                {{ fun.subcategory_name }}
                              </option>
                            </select>
                            <has-error
                              :form="form"
                              field="functionalrole"
                            ></has-error>
                          </div>
                          <!-- <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Upload Profile Pic<span style="color: red"
                                >*</span
                              ></label
                            >
                            <div
                              class="custom-file custom-img-preview min-input"
                            >
                              <input
                                type="file"
                                class="custom-file-input"
                                name="profile_pic_thumb"
                                accept="image/*"
                                @change="changeProfile($event)"
                              />
                              <label
                                class="custom-file-label"
                                for="amenityIcon"
                              >
                                Upload Image</label
                              >
                              <has-error
                                :form="form"
                                field="profile_pic_thumb"
                              ></has-error>
                            </div>
                          </div> -->
                        </div>
                      </fieldset>

                      <fieldset class="mt-3">
                        <legend>Social Accounts</legend>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Facebook</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Facebook Link"
                              name="facebook_url"
                              v-model="form.facebook_url"
                            />
                            <has-error
                              :form="form"
                              field="facebook_url"
                            ></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">Twitter</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Twitter Link"
                              name="twitter_url"
                              v-model="form.twitter_url"
                            />
                            <has-error
                              :form="form"
                              field="twitter_url"
                            ></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >LinkedIn</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your LinkedIn Link"
                              name="linkedin_url"
                              v-model="form.linkedin_url"
                            />
                            <has-error
                              :form="form"
                              field="linkedin_url"
                            ></has-error>
                          </div>
                        </div>
                      </fieldset>
                      <div class="form-group row mb-2 mt-2">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary">
                            {{ updateStatus ? "Updating..." : "Update" }}
                          </button>
                          <button class="btn btn-danger">Cancel</button>
                        </div>
                      </div>
                    </form>
                    <span style="color: red">( * )</span> - All Fields are
                    Mandatory.
                  </div>

                  <!-- Personal tab end -->

                  <!-- Company tab start -->

                  <div id="Company" class="tab-pane fade popupForm">
                    <fieldset>
                      <legend>Company Logo & Banner</legend>
                      <div class="form-group row mb-2">
                        <div class="col-sm-4">
                          <div class="custom-file custom-img-preview min-input">
                            <input
                              type="file"
                              class="custom-file-input"
                              id="emp_logo"
                              name="emp_logo"
                              accept="image/*"
                              @change="logoUpload"
                            />
                            <label class="custom-file-label" for="amenityIcon">
                              Upload Logo</label
                            >
                          </div>
                        </div>
                        <div class="col-sm-2" v-if="form.company_logo">
                          <img
                            :src="'/company_logo/' + form.company_logo"
                            alt="No Image"
                            width="150"
                            height="50"
                          />
                        </div>

                        <div class="col-sm-4">
                          <div class="custom-file custom-img-preview min-input">
                            <input
                              type="file"
                              class="custom-file-input"
                              id="emp_banner"
                              name="emp_banner"
                              accept="image/*"
                              @change="bannerUpload"
                            />
                            <label class="custom-file-label" for="amenityIcon">
                              Upload Banner</label
                            >
                          </div>
                        </div>
                        <div class="col-sm-2" v-if="form.cover_image">
                          <img
                            :src="'/company_cover/' + form.cover_image"
                            alt="No Image"
                            width="150"
                            height="50"
                          />
                        </div>
                      </div>
                    </fieldset>
                    <form
                      method="post"
                      role="form"
                      @submit.prevent="addCompanydetail()"
                    >
                      <fieldset>
                        <legend>Company Information</legend>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Company Name<span style="color: red"
                                >*</span
                              ></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Company Name"
                              name="company_name"
                              v-model="form.company_name"
                              disabled=""
                            />
                            <has-error
                              :form="form"
                              field="company_name"
                            ></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Company Tagline</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Company Tagline"
                              name="tagline"
                              v-model="form.tagline"
                            />
                            <has-error :form="form" field="tagline"></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Select Industry<span style="color: red"
                                >*</span
                              ></label
                            >
                            <select
                              class="form-control custom-select"
                              name="com_industry"
                              v-model="form.com_industry"
                            >
                              <option
                                :value="ind.id"
                                v-for="ind in allIndustry"
                              >
                                {{ ind.category_name }}
                              </option>
                            </select>
                            <has-error
                              :form="form"
                              field="com_industry"
                            ></has-error>
                          </div>
                        </div>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Owner Name<span style="color: red"
                                >*</span
                              ></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Owner Name"
                              name="owner_name"
                              v-model="form.owner_name"
                            />
                            <has-error
                              :form="form"
                              field="owner_name"
                            ></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Company Email<span style="color: red"
                                >*</span
                              ></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Email ID"
                              name="com_email"
                              v-model="form.com_email"
                            />
                            <has-error
                              :form="form"
                              field="com_email"
                            ></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Company Contact No.<span style="color: red"
                                >*</span
                              ></label
                            >
                            <input
                              type="number"
                              class="form-control"
                              placeholder="Enter Your Contact No."
                              name="com_contact"
                              onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                              v-model="form.com_contact"
                            />
                            <has-error
                              :form="form"
                              field="com_contact"
                            ></has-error>
                          </div>
                        </div>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Website<span style="color: red">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Website Link"
                              name="website"
                              v-model="form.website"
                            />

                            <has-error :form="form" field="website"></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Employees</label
                            >
                            <select
                              class="form-control custom-select"
                              name="employee_no"
                              v-model="form.employee_no"
                            >
                              <option value="" disabled="">
                                Select Employeee
                              </option>
                              <option value="1-10">1-10</option>
                              <option value="11-100">11-100</option>
                              <option value="101-1000">101-1000</option>
                              <option value="1001-10000">1001-10000</option>
                              <option value="10001-100000">10001-100000</option>
                            </select>
                            <has-error
                              :form="form"
                              field="employee_no"
                            ></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Established Date <sub>Please Enter Year</sub
                              ><span style="color: red">*</span></label
                            >
                            <input
                              type="date"
                              class="form-control"
                              placeholder="Enter Establish Year"
                              name="established_year"
                              v-model="form.established_year"
                            />
                            <has-error
                              :form="form"
                              field="established_year"
                            ></has-error>
                          </div>
                        </div>

                        <!-- <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Upload Logo<span style="color: red"
                                >*</span
                              ></label
                            >
                            <div
                              class="custom-file custom-img-preview min-input"
                            >
                              <input
                                type="file"
                                class="custom-file-input"
                                name="logo"
                                accept="image/*"
                                @change="changeLogo($event)"
                              />
                              <label
                                class="custom-file-label"
                                for="amenityIcon"
                              >
                                Upload Image</label
                              >
                            </div>
                            <has-error :form="form" field="logo"></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Upload Banner Image<span style="color: red"
                                >*</span
                              ></label
                            >
                            <div
                              class="custom-file custom-img-preview min-input"
                            >
                              <input
                                type="file"
                                class="custom-file-input"
                                name="banner"
                                accept="image/*"
                                @change="changeBanner($event)"
                              />
                              <label
                                class="custom-file-label"
                                for="amenityIcon"
                              >
                                Upload Image</label
                              >
                            </div>
                            <has-error :form="form" field="banner"></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >View Image</label
                            >
                            <div
                              class="custom-file custom-img-preview min-input"
                            ></div>
                          </div>
                        </div> -->
                        <!-- view Image -->
                      </fieldset>

                      <fieldset class="mt-3">
                        <legend>Company Address</legend>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Address<span style="color: red">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Address"
                              name="address"
                              v-model="form.address"
                            />
                            <has-error :form="form" field="address"></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Country</label
                            >
                            <select
                              class="form-control custom-select"
                              name="country"
                              v-model="form.country"
                            >
                              <option value="" disabled="">
                                Select Country
                              </option>
                              <option :value="cnt.id" v-for="cnt in bloodgroup">
                                {{ cnt.country_name }}
                              </option>
                            </select>
                            <has-error :form="form" field="country"></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >State</label
                            >
                            <select
                              @change="StateId($event)"
                              class="form-control"
                              name="state"
                              v-model="form.state"
                            >
                              <option
                                :value="st.id"
                                v-for="st in allLocation"
                                :key="st.id"
                              >
                                {{ st.states_name }}
                              </option>
                            </select>
                            <has-error :form="form" field="state"></has-error>
                          </div>
                        </div>
                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >City</label
                            >
                            <select
                              class="form-control"
                              style="width: 100%"
                              name="city"
                              v-model="form.city"
                            >
                              <option value="" disabled>Select City</option>
                              <option
                                :value="ct.id"
                                v-for="ct in city_list"
                                :key="ct.id"
                              >
                                {{ ct.cities_name }}
                              </option>
                            </select>
                            <has-error :form="form" field="city"></has-error>
                          </div>

                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Revenue</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Revenue"
                              name="revenue"
                              v-model="form.revenue"
                            />
                            <has-error :form="form" field="revenue"></has-error>
                          </div>

                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Corporate Identification Number/License
                              Number<span style="color: red">*</span></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your CIN/License Number"
                              name="cin_no"
                              v-model="form.cin_no"
                            />
                            <has-error :form="form" field="cin_no"></has-error>
                          </div>
                        </div>
                      </fieldset>

                      <fieldset class="mt-3">
                        <legend>Social Accounts</legend>

                        <div class="form-group row mb-2">
                          <div class="col-sm-4">
                            <label class="col-form-label" for="">
                              Facebook</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Facebook Link"
                              name="com_facebook"
                              v-model="form.com_facebook"
                            />
                            <has-error
                              :form="form"
                              field="com_facebook"
                            ></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >Twitter</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your Twitter Link"
                              name="com_twitter"
                              v-model="form.com_twitter"
                            />
                            <has-error
                              :form="form"
                              field="com_twitter"
                            ></has-error>
                          </div>
                          <div class="col-sm-4">
                            <label class="col-form-label" for=""
                              >LinkedIn</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Enter Your LinkedIn Link"
                              name="com_linkedin"
                              v-model="form.com_linkedin"
                            />
                            <has-error
                              :form="form"
                              field="com_linkedin"
                            ></has-error>
                          </div>
                        </div>
                      </fieldset>

                      <fieldset class="mt-3">
                        <legend>Company Summary</legend>

                        <div class="form-group row mb-2">
                          <div class="col-sm-12">
                            <label class="col-form-label" for="">
                              About Company</label
                            >
                            <textarea
                              class="form-control"
                              placeholder="About Company............"
                              name="com_summary"
                              v-model="form.com_summary"
                            ></textarea>
                          </div>
                          <has-error
                            :form="form"
                            field="com_summary"
                          ></has-error>
                        </div>
                      </fieldset>

                      <fieldset class="mt-3">
                        <legend>Other Information</legend>

                        <div class="form-group row mb-2">
                          <div class="col-sm-12">
                            <label class="col-form-label" for=""
                              >Additional Information</label
                            >
                            <textarea
                              class="form-control"
                              placeholder="Enter Additional Information............"
                              name="additional"
                              v-model="form.additional"
                            ></textarea>
                          </div>
                          <has-error
                            :form="form"
                            field="additional"
                          ></has-error>
                        </div>
                      </fieldset>

                      <fieldset class="mt-3">
                        <legend>Youtube Video Link</legend>

                        <div class="form-group row mb-2">
                          <div class="col-sm-12">
                            <label class="col-form-label" for=""
                              >Video link</label
                            >
                            <input
                              type="text"
                              class="form-control"
                              name="company_video"
                              v-model="form.company_video"
                            />
                          </div>
                          <has-error
                            :form="form"
                            field="company_video"
                          ></has-error>
                        </div>
                      </fieldset>

                      <div class="form-group row mb-2 mt-3">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary">
                            {{ updateStatus ? "Updating..." : "Update" }}
                          </button>
                          <button class="btn btn-danger">Cancel</button>
                        </div>
                      </div>
                    </form>
                    <span style="color: red">( * )</span> - All Fields are
                    Mandatory.
                    <!-- Company tab end -->
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

    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "Editemployer",
  data() {
    return {
      city_list: {},
      updateStatus: false,
      form: new Form({
        fname: "",
        lname: "",
        email: "",
        contact: "",
        dob: "",
        gender: "",
        aadhar_no: "",
        designation: "",
        industry_id: "",
        functionalrole_id: "",
        profile: "",
        facebook_url: "",
        twitter_url: "",
        linkedin_url: "",
        //company details
        company_name: "",
        tagline: "",
        com_industry: "",
        owner_name: "",
        com_email: "",
        com_contact: "",
        website: "",
        employee_no: "",
        established_year: "",
        logo: "",
        company_logo: "",
        cover_image: "",
        banner: "",
        address: "",
        country: "",
        state: "",
        city: "",
        revenue: "",
        cin_no: "",
        com_facebook: "",
        com_twitter: "",
        com_linkedin: "",
        com_summary: "",
        additional: "",
        company_video: "",
        loading: false,
      }),
      emp_image: "",
      emp_logo: "",
      emp_banner: "",
    };
  },
  mounted() {
    this.$store.dispatch("getEditData", "/employer-profile");
    this.$store.dispatch("getAllQualification", "/getqualification");
    this.$store.dispatch("getAllJobtype", "/getjobtype");
    this.$store.dispatch("getAllJobshift", "/getjobshift");
    this.$store.dispatch("getAllOrganisations", "/getindustry");
    this.$store.dispatch("getAllDesignation", "/getfunctionalrole");
    this.$store.dispatch("getAllLocation", "/get-states");
    this.$store.dispatch("getAllApplied", "/get-cities");
    this.$store.dispatch("getAllBloodGroup", "/get-countries");
  },
  computed: {
    editData() {
      //this.loading = true;
      this.form.fill(this.$store.getters.getEditData); // Fill the form with the data
    },
    allQualification() {
      return this.$store.getters.getAllQualification;
    },
    allJobtype() {
      return this.$store.getters.getAllJobtype;
    },
    allJobshift() {
      return this.$store.getters.getAllJobshift;
    },
    allIndustry() {
      return this.$store.getters.getAllOrganisations;
    },
    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },
    allLocation() {
      return this.$store.getters.getAllLocation;
    },

    allApplied() {
      return this.$store.getters.getAllApplied;
    },
    bloodgroup() {
      return this.$store.getters.getAllBloodGroup;
    },
  },
  methods: {
    addPersonaldetail() {
      this.updateStatus = true;
      this.form
        .post("/add-personal-detail-employer")
        .then(() => {
          this.$router.push("/editemployer");
          //window.location.reload();
          toast({
            type: "success",
            title: "Employer Detail Updated successfully",
          });
          this.updateStatus = false;
        })
        .catch(() => {
          toast({
            type: "warning",
            title: "Somethings went wrong.Check Error(s)",
          });
          this.updateStatus = false;
        });
    },
    StateId(event) {
      let stateId = event.target.value;
      axios
        .get("/get-cities/data/" + stateId)
        .then((response) => {
          if (response.status === 200) {
            this.city_list = response.data.data;
          }
        })
        .catch(() => {});
    },
    addCompanydetail() {
      this.updateStatus = true;
      this.form
        .post("/add-company-detail-employer")
        .then(() => {
          //window.location.reload();
          toast({
            type: "success",
            title: "Company Detail Updated successfully",
          });
          this.updateStatus = false;
        })
        .catch(() => {
          toast({
            type: "warning",
            title: "Somethings went wrong.Check Error(s)",
          });
          this.updateStatus = false;
        });
    },
    updateImage() {
      let img = this.form.profile;
      //return  this.form.profile
      if (img.length > 100) {
        return this.form.profile;
      } else {
        return `emp_profile_image/${this.form.profile}`;
      }
    },
    handleFileUpload(event) {
      var formData = new FormData();
      var imagefile = document.querySelector("#emp_image");
      formData.append("emp_image", imagefile.files[0]);
      axios
        .post("update/employer/profileimage", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.$router.push("/editemployer");
          toast({
            type: "success",
            title: "Image Upload Successfully",
          });

          window.location.reload();
        })
        .catch((error) => {
          toast({
            type: "error",
            text: "Failed",
          });
        });
    },
    logoUpload(event) {
      var formData = new FormData();
      var imagefile = document.querySelector("#emp_logo");
      formData.append("emp_logo", imagefile.files[0]);
      axios
        .post("update/employer/logo", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.$router.push("/editemployer");
          toast({
            type: "success",
            title: "Logo Upload Successfully",
          });

          window.location.reload();
        })
        .catch((error) => {
          toast({
            type: "error",
            text: "Failed",
          });
        });
    },
    bannerUpload(event) {
      var formData = new FormData();
      var imagefile = document.querySelector("#emp_banner");
      formData.append("emp_banner", imagefile.files[0]);
      axios
        .post("update/employer/banner", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.$router.push("/editemployer");
          toast({
            type: "success",
            title: "Banner Upload Successfully",
          });

          window.location.reload();
        })
        .catch((error) => {
          toast({
            type: "error",
            text: "Failed",
          });
        });
    },
    // changeBanner(event) {
    //   let file = event.target.files[0];

    //   if (file.size > 1048576) {
    //     swal({
    //       type: "error",
    //       title: "Oops...",
    //       text: "File size too large!",
    //       footer: "<a href>Why do I have this issue?</a>",
    //     });
    //   } else {
    //     let reader = new FileReader();
    //     reader.onload = (event) => {
    //       this.form.banner = event.target.result;
    //     };
    //     reader.readAsDataURL(file);
    //   }
    // },
    // changeLogo(event) {
    //   let file = event.target.files[0];

    //   if (file.size > 1048576) {
    //     swal({
    //       type: "error",
    //       title: "Oops...",
    //       text: "File size too large!",
    //       footer: "<a href>Why do I have this issue?</a>",
    //     });
    //   } else {
    //     let reader = new FileReader();
    //     reader.onload = (event) => {
    //       this.form.logo = event.target.result;
    //     };
    //     reader.readAsDataURL(file);
    //   }
    // },
  },
};
</script>

<style scoped>
.loading-text {
  text-align: center !important;
}
.invalid-feedback {
  display: block;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #f44336;
}
.nav-tabs .nav-link {
  background-color: #ddd;
  color: #484848 !important;
  font-weight: 600;
}
.nav-tabs .nav-link.active {
  color: #fff !important;
}
/* image preview */
</style>