 <template>
  <div id="Editpostjob">
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
              <h2 class="hk-pg-title">Edit Post New Job</h2>
              {{ editData }}
            </div>
          </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-sm-12">
                <form
                  class="popupForm"
                  role="form"
                  method="post"
                  @submit.prevent="updateemployeejob()"
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
                          <option :value="sector.id" v-for="sector in allFee">
                            {{ sector.job_sector }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_sector_id"
                        ></has-error>
                      </div>
                      <div class="col-sm-4">
                        <label class="col-form-label" for=""
                          >Client Name
                          <sub style="color: red"
                            >(Not in List ?? Select 'others' and add new)</sub
                          ></label
                        >
                        <select
                          class="form-control custom-select"
                          name="client_id"
                          id="client_id"
                          @change="openClient"
                          v-model="form.client_id"
                          :class="{
                            'is-invalid': form.errors.has('client_id'),
                          }"
                        >
                          <option disabled value="">Select Client Name</option>
                          <option
                            :value="client.id"
                            v-for="(client, index) in clientList"
                            :key="index"
                          >
                            {{ client.name }}
                          </option>
                          <option value="add_client">Others</option>
                        </select>

                        <em style="color: red"> </em>
                        <has-error :form="form" field="client_name"></has-error>
                      </div>
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
                        <label class="col-form-label" for=""> Company</label>
                        <select
                          class="form-control custom-select"
                          name="company_id"
                          v-model="form.company_id"
                          :class="{
                            'is-invalid': form.errors.has('company_id'),
                          }"
                          disabled=""
                        >
                          <option disabled value="">Select Company</option>
                          <option
                            :value="companies.id"
                            v-for="companies in allOrganisations"
                          >
                            {{ companies.company_name }}
                          </option>
                        </select>
                        <has-error
                          :form="form"
                          field="job_state_id"
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
                          @change="StateId($event)"
                        >
                          <option disabled value="">Select state</option>
                          <option :value="states.id" v-for="states in state">
                            {{ states.states_name }}
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
                          class="form-control custom-select select-box"
                          name="job_city_id"
                          v-model="form.job_city_id"
                          :class="{
                            'is-invalid': form.errors.has('job_city_id'),
                          }"
                        >
                          <option disabled value="">Select City</option>
                          <option :value="city.id" v-for="city in percity">
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
                            <div class="col-sm-6">
                              <label class="col-form-label" for=""
                                >Select Category</label
                              >

                              <select
                                class="form-control custom-select"
                                name="job_category_id"
                                v-model="form.job_category_id"
                                :class="{
                                  'is-invalid':
                                    form.errors.has('job_category_id'),
                                }"
                              >
                                <option disabled value="">
                                  Select Category
                                </option>
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
                            <div class="col-sm-6">
                              <label class="col-form-label" for=""
                                >Select Career Level</label
                              >
                              <select
                                class="form-control custom-select"
                                name="job_carreer_level"
                                v-model="form.job_carreer_level"
                                :class="{
                                  'is-invalid':
                                    form.errors.has('job_carreer_level'),
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
                          type="number"
                          name="job_vaccancy"
                          class="form-control"
                          placeholder="Enter No. Of Vacancy"
                          id="job_vaccancy"
                          v-model="form.job_vaccancy"
                          :class="{
                            'is-invalid': form.errors.has('job_vaccancy'),
                          }"
                          min="0"
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
                                <option>Min Experience</option>
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
                                <option>Max Experience</option>
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
                          placeholder="Enter Start Apply Date"
                          v-model="form.start_apply_date"
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
                                  'is-invalid':
                                    form.errors.has('grad_start_year'),
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
                                  'is-invalid':
                                    form.errors.has('grad_end_year'),
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
                          <option
                            :value="shift.id"
                            v-for="shift in jobshift"
                            :key="shift.id"
                          >
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
                        <label class="col-form-label" for="">Location</label>
                        <select
                          class="form-control custom-select"
                          v-model="form.job_exp"
                        >
                          <optgroup
                            :label="st.state"
                            v-for="st in location"
                            :key="st"
                          >
                            <option
                              v-for="(loc, index) in st.location"
                              :key="index"
                              :value="loc.location"
                            >
                              {{ loc.location }}
                            </option>
                          </optgroup>
                        </select>
                        <!-- <input
                          type="text"
                          class="form-control"
                          name="job_exp"
                          placeholder="Enter Job Prefernce"
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
                            v-for="qualifications in allQualification"
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
                          @change="checkSalaryDisclose($event)"
                          v-model="form.sal_disclosed"
                          :class="{
                            'is-invalid': form.errors.has('sal_disclosed'),
                          }"
                        >
                          <option disabled value="">
                            Select Salary Disclosed
                          </option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                      <!-- <div class="col-sm-4">
                                                <label class="col-form-label" for="">CTC</label>
                                                <input type="text" class="form-control" name="job_ctc" placeholder="Enter CTC"
                                                     v-model="form.job_ctc"  :class="{ 'is-invalid': form.errors.has('job_ctc') }" />
                                                     <has-error :form="form" field="job_ctc"></has-error>
                                            </div> -->
                    </div>
                    <div class="form-group row mb-2">
                      <div class="col-sm-4">
                        <div class="">
                          <div class="row">
                            <div class="col-sm-6">
                              <label class="col-form-label" for=""
                                >Select Salary <sub>(Per/Year)</sub>
                              </label>
                              <input
                                type="number"
                                min="0"
                                class="form-control"
                                name="offered_sal_min"
                                placeholder="From"
                                v-model="form.offered_sal_min"
                                :disabled="ctcEnableDisable"
                                :class="{
                                  'is-invalid':
                                    form.errors.has('offered_sal_min'),
                                }"
                              />
                              <has-error
                                :form="form"
                                field="offered_sal_min"
                              ></has-error>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label invisible" for=""
                                >Select Career Level</label
                              >
                              <input
                                type="number"
                                min="0"
                                class="form-control"
                                name="offered_sal_max"
                                placeholder="To"
                                v-model="form.offered_sal_max"
                                :disabled="ctcEnableDisable"
                                :class="{
                                  'is-invalid':
                                    form.errors.has('offered_sal_max'),
                                }"
                              />

                              <has-error
                                :form="form"
                                field="offered_sal_max"
                              ></has-error>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </fieldset>

                  <!-- <fieldset class="mt-3">
                                            <legend>Responsibility</legend>
                                           
                                                <div class="form-group row mb-2">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label" for="">Responsibility</label>
                                                        <textarea class="form-control" name="responsibility"
                                                            placeholder="Enter Responsibility............" v-model="form.responsibility"  :class="{ 'is-invalid': form.errors.has('responsibility') }"></textarea>
                                                             <has-error :form="form" field="responsibility"></has-error>
                                                    </div>
                                                </div>


                                           
                                        </fieldset> -->

                  <fieldset class="mt-3">
                    <legend>Job Description and Responsibility</legend>

                    <div class="form-group row mb-2">
                      <div class="col-sm-12">
                        <label class="col-form-label" for=""
                          >Job Description</label
                        >
                        <ckeditor
                          :editor="editor"
                          v-model="form.description"
                        ></ckeditor>
                        <!-- <textarea class="form-control" name="description"
                                                            placeholder="Enter Job Description............" v-model="form.description"  :class="{ 'is-invalid': form.errors.has('description') }"></textarea> -->
                        <has-error :form="form" field="description"></has-error>
                      </div>
                    </div>
                  </fieldset>

                  <fieldset class="mt-3">
                    <legend>Skills</legend>

                    <div class="form-group row mb-2">
                      <div class="col-sm-12">
                        <label class="col-form-label" for="">Skills</label>
                        <textarea
                          class="form-control"
                          name="job_skills"
                          placeholder="Enter Skills And Requirements............"
                          v-model="form.job_skills"
                          :class="{
                            'is-invalid': form.errors.has('job_skills'),
                          }"
                        ></textarea>
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
                          name="add_questionnarie"
                          v-model="form.add_questionnarie"
                          :class="{
                            'is-invalid': form.errors.has('add_questionnarie'),
                          }"
                          @change="cascade"
                        >
                          <option value="" disabled="">Select Any One</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                        <has-error
                          :form="form"
                          field="add_questionnarie"
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
                          name="job_questionnarie_id"
                          v-model="form.job_questionnarie_id"
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
                          field="job_questionnarie_id"
                        ></has-error>
                      </div>
                    </div>
                  </fieldset>
                  <button type="submit" class="btn btn-primary mt-4">
                    {{ jobPostUpdateStatus ? "Updating..." : "Update" }}
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <div class="modal fade popupForm custom-model-width" id="addSubUser">
      <div class="modal-dialog">
        <div class="modal-content">
          <form
            class="popupForm"
            role="demo"
            method="post"
            @submit.prevent="addsubuser()"
            id="addUserForm"
          >
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Client</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Client Name</label>
                  <input
                    type="text"
                    class="form-control"
                    required
                    placeholder="Enter Client Name"
                    v-model="demo.client_name"
                    :class="{ 'is-invalid': demo.errors.has('client_name') }"
                    name="client_name"
                  />
                  <has-error :form="demo" field="client_name"></has-error>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    required
                    placeholder="Enter Your Email"
                    v-model="demo.email"
                    :class="{ 'is-invalid': demo.errors.has('email') }"
                    name="email"
                    id="email"
                  />
                  <has-error :form="demo" field="email"></has-error>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Contact No.</label>
                  <input
                    type="text"
                    class="form-control"
                    required
                    placeholder="Enter Your Contact No."
                    v-model="demo.contact"
                    maxlength="10"
                    minlength="10"
                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                    :class="{ 'is-invalid': demo.errors.has('contact') }"
                    name="contact"
                    id="contact"
                  />
                  <has-error :form="demo" field="contact"></has-error>
                </div>
                <div class="col-sm-6">
                  <label class="col-form-label" for="">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    required
                    placeholder="Enter Address"
                    v-model="demo.address"
                    :class="{ 'is-invalid': demo.errors.has('address') }"
                    name="address"
                  />
                  <has-error :form="demo" field="address"></has-error>
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

    <main-footer></main-footer>
  </div>
</template>

<script>
import $ from "jquery";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  name: "Editpostjob",

  data() {
    //let now = new Date()
    return {
      editor: ClassicEditor,
      ctcEnableDisable: "",
      jobPostUpdateStatus: false,
      show_questionnarie: false,
      company_id: [],
      job_industry_id: [],
      job_functional_role_id: [],
      job_state_id: [],
      job_sector_id: [],
      job_carreer_level: [],
      job_qualification_id: [],
      job_shift_id: [],
      job_benefits_id: [],
      percity: [],
      job_posted_type_id: [],
      job_category_id: [],
      job_questionnarie_id: [],

      form: new Form({
        company_id: "",
        title: "",
        description: "",
        responsibility: "",
        job_sector_id: "",
        job_category_id: "",
        job_address: "",
        job_city_id: "",
        job_state_id: "",
        job_preference: "",
        job_posted_type_id: "",
        last_apply_date: "",
        job_questionnarie_id: "",
        job_keywords: "",
        job_benefits_id: "",
        job_skills: "",
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
        add_questionnarie: "",
        start_apply_date: "",
        government_apply_link: "",
        client_id: "",
      }),
      demo: new Form({
        client_name: "",
        email: "",
        contact: "",
        address: "",
      }),
      createStatus: false,
      location: [],
      allIndustry: [],
      clientList: [],
    };
  },
  mounted() {
    this.$store.dispatch("getAllData", "/jobse");
    this.$store.dispatch(
      "getEditData",
      `/editpostjoby/${this.$route.params.jobid}`
    );
    this.$store.dispatch("getAllCity", "/get-cities");
    //this.$store.dispatch("getAllData", "/getindustry/master");
    this.$store.dispatch("getAllState", "/getstates");
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
    this.$store.dispatch("getAllRecruiter", "/getsalaries");
    this.$store.dispatch("getAllPost", "/questionnarie-name_emp");
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
    this.getAllIndustry();
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
    editData() {
      this.form.fill(this.$store.getters.getEditData); // Fill the form with the data
    },
    // allIndustry() {
    //   return this.$store.getters.getAllData;
    // },
    allStates() {
      return this.$store.getters.getAllState;
    },
    allCity() {
      return this.$store.getters.getAllCity;
    },
    allOrganisations() {
      return this.$store.getters.getAllOrganisations;
    },
    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },
    state() {
      return this.$store.getters.getAllState;
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
    language() {
      return this.$store.getters.getAllLanguage;
    },
    bloodgroup() {
      return this.$store.getters.getAllBloodGroup;
    },
    allRecruiter() {
      return this.$store.getters.getAllRecruiter;
    },
    allApplied() {
      return this.$store.getters.getAllApplied;
    },
    allpost() {
      return this.$store.getters.getAllPost;
    },
  },
  methods: {
    openClient() {
      if (this.form.client_id === "add_client") {
        $("#addSubUser").modal("show");
      }
    },
    addsubuser() {
      this.createStatus = true;
      this.demo.post("/add-client").then(() => {
        toast({
          type: "success",
          title: "Client Added Successfully",
        });
        Fire.$emit("afterUpdate");
        //window.location.reload();
        this.createStatus = false;
        $("#addSubUser").modal("hide");
      });
    },
    getAllIndustry() {
      axios.get("/getindustry/master").then((response) => {
        this.allIndustry = response.data.data;
      });
    },
    getClientList() {
      axios.get("/client-list").then((response) => {
        this.clientList = response.data.data;
      });
    },
    getAllLocation() {
      axios.get("/master/location/group").then((response) => {
        this.location = response.data.data;
      });
    },
    checkSalaryDisclose(event) {
      let salValue = event.target.value;
      if (salValue === "Yes") {
        return (this.ctcEnableDisable = false);
      }
    },
    StateId(event) {
      let stateId = event.target.value;
      axios.get("/get-cities/data/" + stateId).then((response) => {
        if (response) {
          this.percity = response.data.data;
        }
      });
    },
    cascade: function (e) {
      this.show_questionnarie = e.target.value === "Yes";
    },
    updateemployeejob() {
      this.jobPostUpdateStatus = true;
      this.form
        .post(`/update-jobs-front/${this.$route.params.jobid}`)
        .then((response) => {
          this.$router.push("/postjob");
          toast({
            type: "success",
            title: "Post Job Updated Successfully",
          });
          this.jobPostUpdateStatus = false;
        });
    },
  },
  created() {
    this.getClientList();
    Fire.$on("afterUpdate", () => {
      this.getClientList();
    });
  },
};
</script>

<style scoped>
</style> 