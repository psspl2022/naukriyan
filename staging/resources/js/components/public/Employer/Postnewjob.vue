<template>
  <div id="postnewjob">
    <Emp-header></Emp-header>
    <section class="">
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li>
                    <a href="#"><i class="fa fa-home mr-1"></i>Home</a>
                  </li>
                  <li class="active">Post New Job</li>
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
              <h2 class="hk-pg-title">Post New Job</h2>
            </div>
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <form
                  class="popupForm"
                  role="form"
                  method="post"
                  @submit.prevent="addemployeejob()"
                >
                  <fieldset>
                    <legend>Job Post As</legend>
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Job For</label
                        >
                        <select
                          class="form-control custom-select"
                          id="job_for"
                          name="job_for"
                          v-model="form.job_for"
                          :class="{ 'is-invalid': form.errors.has('job_for') }"
                        >
                          <option value="" disabled="">Select Job For</option>
                          <option value="Jobseeker">Candidate/Jobseeker</option>
                          <option value="Consultant">Consultant</option>
                        </select>
                        <has-error :form="form" field="job_for"></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Job Sector</label
                        >
                        <select
                          class="form-control custom-select"
                          name="job_sector_id"
                          v-model="form.job_sector_id"
                          :class="{
                            'is-invalid': form.errors.has('job_sector_id'),
                          }"
                        >
                          <option disabled value="">Select job Sector</option>
                          <option
                            :value="sector.id"
                            v-for="sector in allFee"
                            v-if="sector.id !== 3"
                            :key="sector.id"
                          >
                            {{ sector.job_sector }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_sector_id"
                        ></has-error>
                      </div>
                      <!-- Government sector link -->
                      <!--                      <div class="col-sm-4">-->
                      <!--                        <label class="col-form-label" for=""-->
                      <!--                        >Enter Job Apply Link(Only For Government Sector)</label-->
                      <!--                        >-->
                      <!--                        <input-->
                      <!--                            type="text"-->
                      <!--                            class="form-control"-->
                      <!--                            name="government_apply_link"-->
                      <!--                            placeholder="Enter Apply Link or official Link"-->
                      <!--                            v-model="form.government_apply_link"-->
                      <!--                            :class="{ 'is-invalid': form.errors.has('government_apply_link') }"-->
                      <!--                        />-->
                      <!--                        <has-error-->
                      <!--                            :form="form"-->
                      <!--                            field="government_apply_link"-->
                      <!--                        ></has-error>-->
                      <!--                      </div>-->
                    </div>
                  </fieldset>
                  <fieldset class="mt-3">
                    <legend>General Information</legend>
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""> Job Title</label>
                        <input
                          type="text"
                          class="form-control"
                          name="title"
                          placeholder="Enter Job Title"
                          v-model="form.title"
                          :class="{ 'is-invalid': form.errors.has('title') }"
                        />
                        <has-error :form="form" field="title"></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Industry</label
                        >
                        <select
                          class="form-control custom-select"
                          name="job_industry_id"
                          v-model="form.job_industry_id"
                          :class="{
                            'is-invalid': form.errors.has('job_industry_id'),
                          }"
                        >
                          <option disabled value="">Select Industry</option>
                          <option
                            :value="industry.id"
                            v-for="industry in allIndustry"
                            :key="industry.id"
                          >
                            {{ industry.category_name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_industry_id"
                        ></has-error>
                      </div>

                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Functional area</label
                        >
                        <select
                          class="form-control custom-select"
                          name="job_functional_role_id"
                          v-model="form.job_functional_role_id"
                          :class="{
                            'is-invalid': form.errors.has(
                              'job_functional_role_id'
                            ),
                          }"
                        >
                          <option disabled value="">
                            Select Functional area
                          </option>
                          <option
                            :value="functional.id"
                            v-for="functional in allDesignation"
                            :key="functional.id"
                          >
                            {{ functional.subcategory_name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_functional_role_id"
                        ></has-error>
                      </div>
                    </div>
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Category</label
                        >

                        <select
                          class="form-control custom-select"
                          name="job_category_id"
                          v-model="form.job_category_id"
                          :class="{
                            'is-invalid': form.errors.has('job_category_id'),
                          }"
                        >
                          <option disabled value="">Select Category</option>
                          <option
                            :value="category.id"
                            v-for="category in allApplied"
                          >
                            {{ category.job_category }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_category_id"
                        ></has-error>
                      </div>

                      <div class="col-sm-4">
                        <label class="col-form-label" for="">Address</label>
                        <input
                          type="text"
                          name="job_address"
                          class="form-control"
                          placeholder="Enter Address"
                          v-model="form.job_address"
                          :class="{
                            'is-invalid': form.errors.has('job_address'),
                          }"
                        />
                        <has-error :form="form" field="job_address"></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for="">State</label>
                        <select
                          class="form-control custom-select"
                          name="job_state_id"
                          v-model="form.job_state_id"
                          :class="{
                            'is-invalid': form.errors.has('job_state_id'),
                          }"
                          @change="getCities()"
                        >
                          <option disabled value="">Select state</option>
                          <option :value="state.id" v-for="state in states">
                            {{ state.states_name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_state_id"
                        ></has-error>
                      </div>
                    </div>

                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""> City</label>
                        <select
                          class="form-control"
                          v-model="form.job_city_id"
                          :class="{
                            'is-invalid': form.errors.has('job_city_id'),
                          }"
                        >
                          <option value="">Select City</option>
                          <option :value="city.id" v-for="city in cities">
                            {{ city.cities_name }}
                          </option>
                        </select>
                        <has-error :form="form" field="p_city_id"></has-error>
                      </div>

                      <div class="col-sm-4">
                        <label class="col-form-label" for="">Posted</label>
                        <select
                          class="form-control custom-select"
                          name="job_posted_type_id"
                          v-model="form.job_posted_type_id"
                          :class="{
                            'is-invalid': form.errors.has('job_posted_type_id'),
                          }"
                        >
                          <option disabled value="">
                            Select job Post Type
                          </option>
                          <option :value="post.id" v-for="post in allJobtype">
                            {{ post.job_post_as }}
                          </option>
                        </select>
                        <has-error :form="form" field="job_post_as"></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for="">Preference</label>
                        <select
                          class="form-control custom-select"
                          name="job_preference"
                          v-model="form.job_preference"
                          :class="{
                            'is-invalid': form.errors.has('job_preference'),
                          }"
                        >
                          <option disabled value="">Select Preference</option>
                          <option value="All">All</option>
                          <option value="Men">Men</option>
                          <option value="women">Women</option>
                          <option value="Handicapped">Handicapped</option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_preference"
                        ></has-error>
                      </div>
                    </div>

                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <div class="">
                          <div class="row">
                            <div class="col-sm-12">
                              <label class="col-form-label" for=""
                                >Select Career Level</label
                              >
                              <select
                                class="form-control custom-select"
                                name="job_carreer_level"
                                v-model="form.job_carreer_level"
                                :class="{
                                  'is-invalid': form.errors.has(
                                    'job_carreer_level'
                                  ),
                                }"
                              >
                                <option disabled value="">
                                  Select Carrer Level
                                </option>
                                <option
                                  :value="carrer.id"
                                  v-for="carrer in category"
                                >
                                  {{ carrer.career_level }}
                                </option>
                              </select>
                              <has-error
                                :form="form"
                                field="job_carreer_level"
                              ></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for="">Role</label>
                        <input
                          type="text"
                          name="job_role"
                          class="form-control"
                          placeholder="Enter Your Role"
                          v-model="form.job_role"
                          :class="{ 'is-invalid': form.errors.has('job_role') }"
                        />
                        <has-error :form="form" field="job_role"></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >No. Of Vacancy</label
                        >
                        <input
                          type="text"
                          name="job_vaccancy"
                          class="form-control"
                          placeholder="Enter No. Of Vacancy"
                          id="job_vaccancy"
                          v-model="form.job_vaccancy"
                          :class="{
                            'is-invalid': form.errors.has('job_vaccancy'),
                          }"
                        />
                        <has-error
                          :form="form"
                          field="job_vaccancy"
                        ></has-error>
                      </div>
                    </div>
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <div class="">
                          <div class="row">
                            <div class="col-sm-6">
                              <label class="col-form-label" for="">
                                Select Experience</label
                              >
                              <select
                                class="form-control"
                                name="main_exp"
                                v-model="form.main_exp"
                                :class="{
                                  'is-invalid': form.errors.has('main_exp'),
                                }"
                              >
                                <option value="" disabled>
                                  Min Experience
                                </option>
                                <option
                                  v-for="exper in experiences"
                                  :value="exper"
                                >
                                  {{ exper }}
                                </option>
                              </select>
                              <has-error
                                :form="form"
                                field="main_exp"
                              ></has-error>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label invisible" for=""
                                >Select Career Level</label
                              >
                              <select
                                class="form-control"
                                name="max_exp"
                                v-model="form.max_exp"
                                :class="{
                                  'is-invalid': form.errors.has('max_exp'),
                                }"
                              >
                                <option value="" disabled>
                                  Max Experience
                                </option>
                                <option
                                  v-for="exper in experiences"
                                  :value="exper"
                                >
                                  {{ exper }}
                                </option>
                              </select>
                              <has-error
                                :form="form"
                                field="max_exp"
                              ></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Start Apply Date</label
                        >
                        <input
                          type="date"
                          class="form-control"
                          name="start_apply_date"
                          placeholder="Enter Start Apply date"
                          v-model="form.start_apply_date"
                          :min="disablefutureDate()"
                          :class="{
                            'is-invalid': form.errors.has('start_apply_date'),
                          }"
                        />
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Last Apply Date</label
                        >
                        <input
                          type="date"
                          class="form-control"
                          name="last_apply_date"
                          placeholder="Enter Apply Before"
                          v-model="form.last_apply_date"
                          :min="disablefutureDate()"
                          :class="{
                            'is-invalid': form.errors.has('last_apply_date'),
                          }"
                        />
                      </div>
                    </div>

                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <div class="">
                          <div class="row">
                            <div class="col-sm-6">
                              <label class="col-form-label" for=""
                                >Select Graduating Year
                              </label>
                              <select
                                class="form-control"
                                name="grad_start_year"
                                v-model="form.grad_start_year"
                                :class="{
                                  'is-invalid': form.errors.has(
                                    'grad_start_year'
                                  ),
                                }"
                              >
                                <option value="" disabled="">From</option>
                                <option v-for="year in years" :value="year">
                                  {{ year }}
                                </option>
                              </select>
                              <has-error
                                :form="form"
                                field="grad_start_year"
                              ></has-error>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label invisible" for=""
                                >Select Career Level</label
                              >
                              <select
                                class="form-control"
                                name="grad_end_year"
                                v-model="form.grad_end_year"
                                :class="{
                                  'is-invalid': form.errors.has(
                                    'grad_end_year'
                                  ),
                                }"
                              >
                                <option value="" disabled="">To</option>
                                <option v-for="year in years" :value="year">
                                  {{ year }}
                                </option>
                              </select>
                              <has-error
                                :form="form"
                                field="grad_end_year"
                              ></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Job Type</label
                        >
                        <select
                          class="form-control custom-select"
                          name="job_type_id"
                          v-model="form.job_type_id"
                          :class="{
                            'is-invalid': form.errors.has('job_type_id'),
                          }"
                        >
                          <option disabled value="">Select Job Type</option>
                          <option
                            :value="jobtypes.id"
                            v-for="jobtypes in allLocation"
                          >
                            {{ jobtypes.job_type }}
                          </option>
                        </select>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Job Shift</label
                        >

                        <select
                          class="form-control custom-select"
                          name="job_shift_id"
                          v-model="form.job_shift_id"
                          :class="{
                            'is-invalid': form.errors.has('job_shift_id'),
                          }"
                        >
                          <option disabled value="">Select Shift</option>
                          <option :value="shift.id" v-for="shift in jobshift">
                            {{ shift.job_shift }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_shift_id"
                        ></has-error>
                      </div>
                    </div>
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""> Location</label>
                        <select class="form-control custom-select"  v-model="form.job_exp">
                         <optgroup :label="st.state" v-for="st in location" :key="st">
                            <option v-for="(loc,index) in st.location" :key="index" :value="loc.location">{{loc.location}}</option>
                          </optgroup>
                        </select>
                        <!-- <input
                          type="text"
                          class="form-control"
                          name="job_exp"
                          placeholder="Enter Job Location"
                          v-model="form.job_exp"
                          :class="{ 'is-invalid': form.errors.has('job_exp') }"
                        /> -->
                        <has-error :form="form" field="job_exp"></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Select Qualification</label
                        >
                        <select
                          class="form-control custom-select"
                          name="job_qualification_id"
                          v-model="form.job_qualification_id"
                          :class="{
                            'is-invalid': form.errors.has(
                              'job_qualification_id'
                            ),
                          }"
                        >
                          <option disabled value="">
                            Select Qualification
                          </option>
                          <option
                            :value="qualifications.id"
                            v-for="qualifications in allQualification" :key="qualifications.id"
                          >
                            {{ qualifications.qualification }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_qualification_id"
                        ></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Salary Disclosed</label
                        >
                        <select
                          class="form-control custom-select"
                          name="sal_disclosed"
                          v-model="form.sal_disclosed"
                          :class="{
                            'is-invalid': form.errors.has('sal_disclosed'),
                          }"
                          @change="checkSalaryDisclose($event)"
                        >
                          <option disabled value="">
                            Select Salary Disclosed
                          </option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>

                        <has-error
                          :form="form"
                          field="sal_disclosed"
                        ></has-error>
                      </div>

                      
                    </div>
                   
                    <!-- For Input salary -->
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <div class="">
                          <div class="row">
                            <div class="col-sm-6">
                              <label class="col-form-label" for=""
                                >Select Salary <sub>(Per/Year)</sub>
                              </label>
                              <select
                                class="form-control"
                                name="offered_sal_min"
                                v-model="form.offered_sal_min"
                                :disabled="ctcEnableDisable"
                                :class="{
                                  'is-invalid': form.errors.has(
                                    'offered_sal_min'
                                  ),
                                }"
                              >
                                <option value="" disabled="">Select Min</option>
                                <option
                                  v-for="sal in allRecruiter"
                                  :key="sal.id"
                                >
                                  {{ sal.salary_in_annum }}
                                </option>
                              </select>
                              <has-error
                                :form="form"
                                field="offered_sal_min"
                              ></has-error>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label invisible" for=""
                                >Select Career Level</label
                              >
                              <select
                                class="form-control"
                                name="offered_sal_max"
                                v-model="form.offered_sal_max"
                                :disabled="ctcEnableDisable"
                                :class="{
                                  'is-invalid': form.errors.has(
                                    'offered_sal_max'
                                  ),
                                }"
                              >
                                <option value="" disabled="">Select Max</option>
                                <option
                                  v-for="sal in allRecruiter"
                                  :key="sal.id"
                                >
                                  {{ sal.salary_in_annum }}
                                </option>
                              </select>
                              <has-error
                                :form="form"
                                field="offered_sal_max"
                              ></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <div class="">
                          <div class="row">
                            <div class="col-sm-6">
                              <label class="col-form-label" for=""
                                >Select Salary <sub>(Per/Year)</sub>
                              </label>
                              <input type="number"
                                class="form-control"
                                name="offered_sal_min"
                                v-model="form.offered_sal_min"
                                placeholder="From"
                                min="0"
                                :disabled="ctcEnableDisable"
                                :class="{
                                  'is-invalid': form.errors.has(
                                    'offered_sal_min'
                                  ),
                                }"
                              >
                              <has-error
                                :form="form"
                                field="offered_sal_min"
                              ></has-error>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label invisible" for=""
                                >Select Career Level</label
                              >
                              <input type="number"
                                class="form-control"
                                name="offered_sal_max"
                                v-model="form.offered_sal_max"
                                min="0"
                                placeholder="To"
                                :disabled="ctcEnableDisable"
                                :class="{
                                  'is-invalid': form.errors.has(
                                    'offered_sal_max'
                                  ),
                                }"
                              >
                              <has-error
                                :form="form"
                                field="offered_sal_max"
                              ></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                  </fieldset>

                  <fieldset class="mt-3">
                    <legend>Job Description</legend>

                    <div class="form-group row mb-2">
                      <div class="col-sm-12">
                        <label class="col-form-label" for=""
                          >Job Description & Responsibility</label
                        >
                        <ckeditor
                          :editor="editor"
                          v-model="form.description"
                        ></ckeditor>
                        <!-- <textarea
                            id="desc"
                            class="form-control"
                            name="description"
                            placeholder="Enter Job Description............"
                            v-model="form.description"
                            :class="{
                            'is-invalid': form.errors.has('description'),
                          }"
                        ></textarea> -->
                        <has-error :form="form" field="description"></has-error>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="mt-3">
                    <legend>Skills</legend>

                    <div class="form-group row mb-2">
                      <div class="col-sm-12">
                        <label class="col-form-label"
                          >Skills (Separate by comma ( , ) for multiple
                          skills)</label
                        >

                        <input
                          type="text"
                          v-model="form.job_skills"
                          class="form-control"
                        />

                        <has-error :form="form" field="job_skills"></has-error>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="mt-3">
                    <legend>Keywords</legend>

                    <div class="form-group row mb-2">
                      <div class="col-sm-12">
                        <label class="col-form-label" for="">Keywords</label>
                        <input
                          type="text"
                          class="form-control"
                          name="job_keywords"
                          placeholder="Enter Your Keywords"
                          id="job_keywords"
                          v-model="form.job_keywords"
                          :class="{
                            'is-invalid': form.errors.has('job_keywords'),
                          }"
                        />
                      </div>
                    </div>
                  </fieldset>
                  <fieldset class="mt-3">
                    <legend>Questionnarie</legend>

                    <div class="form-group row mb-2">
                      <div class="col-sm-12">
                        <label class="col-form-label" for=""
                          >Do you want to add Questionnarie</label
                        >
                        <select
                          class="form-control"
                          name="questionnarie_add"
                          v-model="form.questionnarie_add"
                          :class="{
                            'is-invalid': form.errors.has('questionnarie_add'),
                          }"
                          @change="cascade"
                        >
                          <option value="" disabled="">Select Any One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <has-error
                          :form="form"
                          field="questionnarie_add"
                        ></has-error>
                      </div>
                    </div>
                  </fieldset>
                  <fieldset class="mt-3" v-if="show_questionnarie">
                    <legend>Add Questionnaire</legend>

                    <!-- questionnarie show -->
                    <div class="form-group row mb-2">
                      <div class="col-sm-12">
                        <select
                          class="form-control custom-select"
                          id="tag"
                          name="questionnarie_name"
                          v-model="form.questionnarie_name"
                        >
                          <option disabled value="">
                            Select Questionnaire
                          </option>
                          <option
                            v-for="(tag, index) in allpost"
                            :value="tag.id"
                          >
                            {{ tag.name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="questionnarie_name"
                        ></has-error>
                      </div>
                    </div>
                  </fieldset>

                  <button type="submit" class="btn btn-primary mt-3">
                    Save
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- open modal on page load start -->
      <div id="myModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Subscribe our Newsletter</h5>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>
            <div class="modal-body">
              <p>
                Subscribe to our mailing list to get the latest updates straight
                in your inbox.
              </p>
              <form>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Name" />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Email Address"
                  />
                </div>
                <button type="submit" class="btn btn-primary">Subscribe</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- close modal on page load end -->
      <!-- /.row -->
    </section>

    <main-footer></main-footer>
  </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
  name: "Postnewjob",

  data() {
    //let now = new Date()
    return {
      editor: ClassicEditor,
      show_questionnarie: false,
      ctcEnableDisable: true,
      job_industry_id: [],
      job_functional_role_id: [],
      job_state_id: [],
      job_sector_id: [],
      job_carreer_level: [],
      job_qualification_id: [],
      job_shift_id: [],
      job_benefits_id: [],
      job_posted_type_id: [],
      job_category_id: [],
      questionnarie_name: [],

      states: [],
      city: 0,
      cities: [],

      form: new Form({
        company_id: "",
        title: "",
        description: "",
        responsibility: "",
        job_sector_id: "",
        job_category_id: "",
        staticSelect: "",
        job_address: "",
        job_city_id: "",
        job_state_id: "",
        job_preference: "",
        job_posted_type_id: "",
        last_apply_date: "",
        job_questionnarie_id: "",
        job_keywords: "",
        job_benefits_id: [],
        job_shift_id: "",
        job_role: "",
        job_carreer_level: "",
        job_type_id: "",
        grad_start_year: "",
        grad_end_year: "",
        job_vaccancy: "",
        job_qualification_id: "",
        job_exp: "",
        sal_disclosed: "",
        offered_sal_min: "",
        offered_sal_max: "",
        job_industry_id: "",
        job_functional_role_id: "",
        job_position: "",
        main_exp: "",
        max_exp: "",
        job_ctc: "",
        job_for: "",
        job_skills: "",
        questionnarie_add: "",
        questionnarie_name: "",
        percentage: "",
        start_apply_date: "",
      }),
       location: [],
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/getindustry/master");
    this.$store.dispatch("getAllOrganisations", "/getcompanies");
    this.$store.dispatch("getAllDesignation", "/getfunctionalrole");
    this.$store.dispatch("getAllJobtype", "/getjobpostedtype");
    this.$store.dispatch("getAllFee", "/getjobsector");
    this.$store.dispatch("getAllCategory", "/getcareerlevel");
    this.$store.dispatch("getAllQualification", "/getqualification");
    this.$store.dispatch("getAllLocation", "/getjobtype");
    this.$store.dispatch("getAllJobshift", "/getjobshift");
    this.$store.dispatch("getAllBloodGroup", "/getjobbenefit");
    this.$store.dispatch("getAllApplied", "/getjobcategory");
    this.$store.dispatch("getAllProfile", "/employer-profile");
    this.$store.dispatch("getAllRecruiter", "/getsalaries");
    this.$store.dispatch("getAllPost", "/questionnarie-name_emp");
    this.getStates();
    if (localStorage.getItem("reloaded")) {
      // The page was just reloaded. Clear the value from local storage
      // so that it will reload the next time this page is visited.
      localStorage.removeItem("reloaded");
    } else {
      // Set a flag so that we know not to reload the page twice.
      localStorage.setItem("reloaded", "1");
      location.reload();
    }
    this.getAllLocation();
  },
  computed: {
    years() {
      const year = new Date().getFullYear();
      return Array.from(
        { length: year - 1960 },
        (value, index) => 1960 + index + 1
      );
    },
    experiences() {
      const exp = 20;
      return Array.from({ length: exp - 0 }, (value, index) => 0 + index);
    },
    allProfile() {
      return this.$store.getters.getAllProfile;
    },

    allIndustry() {
      return this.$store.getters.getAllData;
    },

    allOrganisations() {
      return this.$store.getters.getAllOrganisations;
    },

    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },

    allJobtype() {
      return this.$store.getters.getAllJobtype;
    },

    allFee() {
      return this.$store.getters.getAllFee;
    },

    category() {
      return this.$store.getters.getAllCategory;
    },

    allQualification() {
      return this.$store.getters.getAllQualification;
    },

    allLocation() {
      return this.$store.getters.getAllLocation;
    },

    jobshift() {
      return this.$store.getters.getAllJobshift;
    },

    bloodgroup() {
      return this.$store.getters.getAllBloodGroup;
    },

    allApplied() {
      return this.$store.getters.getAllApplied;
    },

    allRecruiter() {
      return this.$store.getters.getAllRecruiter;
    },

    allpost() {
      return this.$store.getters.getAllPost;
    },
  },

  created() {
    this.getStates();
  },

  methods: {
    getAllLocation(){
      axios.get('/master/location/group').then((response)=>{
        this.location = response.data.data;
      })
    },
    disablefutureDate(){
          var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var maxDate = year + '-' + month + '-' + day;

        return maxDate;
    },
    checkSalaryDisclose(event) {
      let salValue = event.target.value;
      if (salValue === "Yes") {
        return (this.ctcEnableDisable = false);
      } else {
        return (this.ctcEnableDisable = true);
      }
    },
    getStates() {
      axios.get('/getstates').then((response)=>{
        this.states =response.data.data;
      })
    },

    getCities: function () {
      axios
        .get("/get-cities", {
          params: {
            state_id: this.form.job_state_id,
          },
        })
        .then(
          function (response) {
            this.cities = response.data.data;
          }.bind(this)
        );
    },

    cascade: function (e) {
      this.show_questionnarie = e.target.value === "Yes";
    },

    addemployeejob() {
      if (this.form.title === "" || this.form.description === "") {
        swal("Please fill all mandatory fields");
      } else {
        this.form.post("/add-job-front").then(() => {
          this.$router.push("/postjob");
          toast({
            type: "success",
            title: "Job Added successfully",
          });
        });
      }
    },
  },
  created(){
    this.disablefutureDate();
  },
   
};
</script>

<style scoped>

</style>