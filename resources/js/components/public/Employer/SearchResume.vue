<template>
  <div id="resumeview">
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
                  <li class="active">Resume View</li>
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
          <div class="col-sm-8">
            <form role="form" method="post">
              <div class="required">
                <div class="form-group">
                  <label for="">Requirement you are hiring for</label>
                  <input
                    class="form-control"
                    v-model="form.skill"
                    type="text"
                    placeholder="Enter Skills,position(optional) you are working for"
                  />
                </div>
              </div>
              <div class="panel-group mt-3" id="accordion">
                <div class="panel panel-default">
                  <a
                    data-toggle="collapse"
                    data-parent="#accordion"
                    href="#collapseOne"
                    @click="colapsarrow('1')"
                  >
                    <div
                      class="panel-heading d-flex justify-content-between align-items-center"
                    >
                      <h4 class="panel-title">
                        <span class="glyphicon glyphicon-file"> </span>Advance search
                      </h4>
                      <i
                        class="fas fa-angle-right rightArrow1"
                        style="font-size: 19px; display: none"
                      ></i>
                      <i
                        class="fas fa-angle-down rightArrow1"
                        style="font-size: 19px"
                      ></i>
                    </div>
                  </a>
                  <div id="collapseOne" class="panel-collapse collapse show">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Any Keywords</label>
                            <input
                              class="form-control"
                              type="text"
                              v-model="form.optional_keywords"
                              placeholder="Optional first name,last name,email,contact,designation role seperated by comma"
                            />
                          </div>
                          <label for="exampleFormControlSelect1">Experience</label>
                          <div class="row">
                            <div class="col-5">
                              <div class="form-group">
                                <select
                                  class="form-control custom-select"
                                  v-model="form.min_exp"
                                >
                                  <option value="">Min</option>
                                  <option
                                    v-for="exp in experiences"
                                    :value="exp"
                                    :key="exp"
                                  >
                                    {{ exp }}
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <b>To</b>
                            </div>
                            <div class="col-5">
                              <div class="form-group">
                                <select
                                  class="form-control custom-select"
                                  v-model="form.max_exp"
                                >
                                  <option value="">Max</option>
                                  <option
                                    v-for="exp in experiences"
                                    :value="exp"
                                    :key="exp"
                                  >
                                    {{ exp }}
                                  </option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Location</label>
                            <select
                              class="form-control custom-select"
                              v-model="form.current_location"
                            >
                              <optgroup
                                :label="st.state"
                                v-for="st in location"
                                :key="st.id"
                              >
                                <option
                                  v-for="loc in st.location"
                                  :key="loc.id"
                                  :value="loc.location"
                                >
                                  {{ loc.location }}
                                </option>
                              </optgroup>
                            </select>
                          </div>
                        </div>
                        <!--  2nd row -->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">All Keywords</label>
                            <input
                              class="form-control"
                              type="text"
                              v-model="form.mandate_keywords"
                              placeholder="Mandatory first name,last name,email,contact,designation role seperated by comma"
                            />
                          </div>
                          <label for="exampleFormControlSelect1">Salary</label>
                          <div class="row">
                            <div class="col-5">
                              <div class="form-group">
                                <input
                                  class="form-control"
                                  placeholder="From"
                                  v-model="form.from_salary"
                                />
                              </div>
                            </div>
                            <div class="col-2">
                              <b>To</b>
                            </div>
                            <div class="col-5">
                              <div class="form-group">
                                <input
                                  class="form-control"
                                  placeholder="To"
                                  v-model="form.to_salary"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Excluding Keywords</label>
                            <input
                              class="form-control"
                              type="text"
                              v-model="form.excluding_keywords"
                              placeholder="first name,last name,email,contact,Designation role seperated by comma"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <a
                    data-toggle="collapse"
                    data-parent="#accordion"
                    href="#collapseTwo"
                    @click="colapsarrow('2')"
                  >
                    <div
                      class="panel-heading d-flex justify-content-between align-items-center"
                    >
                      <h4 class="panel-title">
                        <span class="glyphicon glyphicon-th-list"> </span>Employment
                        Details
                      </h4>
                      <i
                        class="fas fa-angle-right rightArrow2"
                        style="font-size: 19px"
                      ></i>
                      <i
                        class="fas fa-angle-down rightArrow2"
                        style="font-size: 19px; display: none"
                      ></i>
                    </div>
                  </a>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Functional area</label>
                            <select
                              class="form-control custom-select"
                              v-model="form.functionalrole"
                            >
                              <option value="">Select Functional Area</option>
                              <option
                                v-for="functional in functionalinfo"
                                :value="functional.id"
                                :key="functional.id"
                              >
                                {{ functional.subcategory_name }}
                              </option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Industry</label>
                            <select
                              class="form-control custom-select"
                              v-model="form.industry"
                            >
                              <option value="">Select Industry</option>
                              <option
                                v-for="industry in industryinfo"
                                :value="industry.id"
                                :key="industry.id"
                              >
                                {{ industry.category_name }}
                              </option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Employers</label>
                            <input
                              type="text"
                              class="form-control"
                              @focus="filterStatus = true"
                              v-model="company_name"
                              placeholder="Type or select companies name"
                            />
                            <div style="background-color: white">
                              <ul
                                class="filter-keyword"
                                v-if="
                                  filteredKeywords && filterStatus && company_name !== ''
                                "
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
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Designation</label>
                            <input
                              class="form-control"
                              type="text"
                              v-model="form.designation"
                              placeholder="Designation"
                            />
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Exclude Employers</label>
                            <input
                              type="text"
                              class="form-control"
                              @focus="filterStatusEx = true"
                              v-model="exclude_company_name"
                              placeholder="Type or select companies name"
                            />
                            <div style="background-color: white">
                              <ul
                                class="filter-keyword"
                                v-if="
                                  filteredKeywordsEx &&
                                  filterStatusEx &&
                                  exclude_company_name !== ''
                                "
                              >
                                <li
                                  v-for="(
                                    filterKeywordEx, index
                                  ) in filteredKeywordsEx.slice(0, 9)"
                                  :key="index"
                                  @click="setkeywordEx(filterKeywordEx)"
                                >
                                  {{ filterKeywordEx }}
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Notice Period</label>
                            <select
                              class="form-control custom-select"
                              v-model="form.notice_period"
                            >
                              <option value="">Notice Period</option>
                              <option value="immediate">Immediate Joining</option>
                              <option value="less than 15 Days">Less than 15 Days</option>
                              <option value="15 Days">15 Days</option>
                              <option value="1 Month">1 Month</option>
                              <option value="2 Month">2 Month</option>
                              <option value="3 Month">3 Month</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <a
                    data-toggle="collapse"
                    data-parent="#accordion"
                    href="#collapseThree"
                    @click="colapsarrow('3')"
                  >
                    <div
                      class="panel-heading d-flex justify-content-between align-items-center"
                    >
                      <h4 class="panel-title">
                        <span class="glyphicon glyphicon-th-list"> </span>Educational
                        Details
                      </h4>
                      <i
                        class="fas fa-angle-right rightArrow3"
                        style="font-size: 19px"
                      ></i>
                      <i
                        class="fas fa-angle-down rightArrow3"
                        style="font-size: 19px; display: none"
                      ></i>
                    </div>
                  </a>
                  <div id="collapseThree" class="panel-collapse collapse collapseThree">
                    <div class="panel-body">
                      <div class="">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a
                              class="nav-link active"
                              href="#profile"
                              role="tab"
                              data-toggle="tab"
                              >Qualification</a
                            >
                          </li>
                          <!-- <li class="nav-item">
                              <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">PG Qualification</a>
                            </li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content mt-3">
                          <div
                            role="tabpanel"
                            class="tab-pane fade in active show"
                            id="profile"
                          >
                            <!-- <div class="form-group">
                                  <label for="">Qualification</label>
                                  <select class="form-control custom-select" v-model="form.ug_qualification_name">
                                    <option value="" >Select Here....</option>
                                  <option v-for="qual in allQual" :key="qual.id" :value="qual.id">{{qual.qualification}}</option>
                                  </select>
                                </div> -->
                            <div class="form-group">
                              <label for="">Qualification</label>
                              <select
                                class="form-control custom-select"
                                v-model="form.ug_qualification_name"
                              >
                                <optgroup
                                  :label="grp.group"
                                  v-for="grp in allQual"
                                  :key="grp.id"
                                >
                                  <option
                                    v-for="qual in grp.qualification"
                                    :key="qual.id"
                                    :value="qual.id"
                                  >
                                    {{ qual.qualification }}
                                  </option>
                                </optgroup>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="">Institute Name</label>
                              <input
                                class="form-control"
                                type="text"
                                @focus="filterStatusInstitute = true"
                                v-model="ug_institute_name"
                                placeholder="Name of Institute"
                              />
                              <div style="background-color: white">
                                <ul
                                  class="filter-keyword"
                                  v-if="
                                    filteredKeywordsInstitute &&
                                    filterStatusInstitute &&
                                    ug_institute_name !== ''
                                  "
                                >
                                  <li
                                    v-for="(
                                      filterKeywordInstitute, index
                                    ) in filteredKeywordsInstitute.slice(0, 9)"
                                    :key="index"
                                    @click="setkeywordInstitute(filterKeywordInstitute)"
                                  >
                                    {{ filterKeywordInstitute }}
                                  </li>
                                </ul>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="exampleFormControlSelect1"
                                >Education Type</label
                              >
                              <select
                                class="form-control custom-select"
                                v-model="form.ug_education_type"
                              >
                                <option value="">Select Education Type</option>
                                <option>Full time</option>
                                <option>Part time</option>
                                <option>Correspondence</option>
                                <option>Distance</option>
                              </select>
                            </div>

                            <label for="exampleFormControlSelect1"
                              >Passing Years Between</label
                            >
                            <div class="row">
                              <div class="col-sm-2">
                                <center><b>From</b></center>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <select
                                    class="form-control custom-select"
                                    v-model="form.start_graduation"
                                  >
                                    <option value="">From</option>
                                    <option
                                      v-for="year in years"
                                      :value="year"
                                      :key="year"
                                    >
                                      {{ year }}
                                    </option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <center><b>To</b></center>
                              </div>
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <select
                                    class="form-control custom-select"
                                    v-model="form.to_graduation"
                                  >
                                    <option value="">To</option>
                                    <option
                                      v-for="year in years"
                                      :value="year"
                                      :key="year"
                                    >
                                      {{ year }}
                                    </option>
                                  </select>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- <div role="tabpanel" class="tab-pane fade" id="buzz">
                              
                                 <div class="form-group">
                                  <label for="">PG Qualification</label>
                                  <select class="form-control custom-select" v-model="form.pg_qualification_name">
                                  <option value="" >Select Here....</option>
                                  <option v-for="qual in allQual" :key="qual.id" :value="qual.id">{{qual.qualification}}</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Institute Name</label>
                                  <input class="form-control" type="text" @focus="filterStatusInstitutePG=true" v-model="pg_institute_name" placeholder="Type or select Institute">
                                  <div style="background-color: white">
                                      <ul
                                        class="filter-keyword"
                                        v-if="filteredKeywordsInstitutePG && filterStatusInstitutePG && pg_institute_name!==''"
                                      >
                                        <li
                                          v-for="(filterKeywordInstitutePG, index) in filteredKeywordsInstitutePG.slice(
                                            0,
                                            9
                                          )"
                                          :key="index"
                                          @click="setkeywordInstitutePG(filterKeywordInstitutePG)"
                                        >
                                          {{ filterKeywordInstitutePG }}
                                        </li>
                                      </ul>
                                </div>
                                </div>

                                <div class="form-group">
                                  <label for="exampleFormControlSelect1">Education Type</label>
                                  <select class="form-control custom-select" v-model="form.pg_education_type">
                                    <option value="">Select Education Type</option>
                                    <option>Full time</option>
                                    <option>Part time </option>
                                    <option>Correspondence</option>
                                    <option>Distance</option>
                                  </select>
                                </div>

                                <label for="exampleFormControlSelect1">Passing Years Between</label>
                                <div class="row">
                                  <div class="col-sm-2">
                                    <center><b>From</b></center> 
                                  </div>
                                  <div class="col-sm-4">
                                     <div class="form-group">
                                  
                                  <select class="form-control custom-select" v-model="form.start_postgraduation">
                                    <option value="">From</option>
                                    <option v-for="year in years" :value="year" :key="year">
                                      {{ year }}
                                    </option>
                                  </select>
                                </div>
                               
                                  </div>
                                  <div class="col-sm-2">
                                    <center><b>To</b></center> 
                                  </div>
                                  <div class="col-sm-4">
                                     <div class="form-group">
                                  <select class="form-control custom-select" v-model="form.to_postgraduation">
                                    <option value="">To</option>
                                    <option v-for="year in years" :value="year" :key="year">
                                      {{ year }}
                                    </option>
                                  </select>
                                </div>
                                  </div>
                                </div>
                            </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <a
                    data-toggle="collapse"
                    data-parent="#accordion"
                    href="#collapseFour"
                    @click="colapsarrow('4')"
                  >
                    <div
                      class="panel-heading d-flex justify-content-between align-items-center"
                    >
                      <h4 class="panel-title">
                        <span class="glyphicon glyphicon-th-list"> </span>Additional
                        Details
                      </h4>
                      <i
                        class="fas fa-angle-right rightArrow4"
                        style="font-size: 19px"
                      ></i>
                      <i
                        class="fas fa-angle-down rightArrow4"
                        style="font-size: 19px; display: none"
                      ></i>
                    </div>
                  </a>
                  <div id="collapseFour" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Candidate Category</label>
                        <select class="form-control custom-select">
                          <option value="">Select Category</option>
                          <option>General</option>
                          <option>OBC</option>
                          <option>SC</option>
                          <option>ST</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1"
                          >Differently-abled Candidates Diversity</label
                        ><br />
                        <select class="form-control custom-select" v-model="form.gender">
                          <option value="" disabled>Select Here</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Others</option>
                        </select>
                      </div>
                      <label for="exampleFormControlSelect1"
                        >Candidate Age(In years)</label
                      >
                      <div class="row">
                        <div class="col-sm-2">
                          <center><b>From</b></center>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <input
                              type="text"
                              class="form-control"
                              v-model="form.min_age"
                            />
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <center><b>To</b></center>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <input
                              type="text"
                              class="form-control"
                              v-model="form.max_age"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <a
                    data-toggle="collapse"
                    data-parent="#accordion"
                    href="#collapseFive"
                    @click="colapsarrow('5')"
                  >
                    <div
                      class="panel-heading d-flex justify-content-between align-items-center"
                    >
                      <h4 class="panel-title">
                        <span class="glyphicon glyphicon-th-list"> </span>Display Details
                      </h4>
                      <i
                        class="fas fa-angle-right rightArrow5"
                        style="font-size: 19px"
                      ></i>
                      <i
                        class="fas fa-angle-down rightArrow5"
                        style="font-size: 19px; display: none"
                      ></i>
                    </div>
                  </a>
                  <div id="collapseFive" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Show</label><br />
                        <label class="checkbox-inline"
                          ><input
                            type="checkbox"
                            id="new"
                            value="new"
                            v-model="checkednew"
                          />
                          New Registrations</label
                        >
                        <label class="checkbox-inline"
                          ><input
                            type="checkbox"
                            id="modified"
                            value="modified"
                            v-model="checkedmodified"
                          />
                          Modified Candiates</label
                        >
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1"
                          >Show Only Candidates with</label
                        ><br />
                        <label class="checkbox-inline"
                          ><input type="checkbox" value="" /> Verified Mobile
                          Number</label
                        >
                        <label class="checkbox-inline"
                          ><input type="checkbox" value="" /> Verified Email ID</label
                        >
                        <label class="checkbox-inline"
                          ><input type="checkbox" value="" /> Attached Resume</label
                        >
                      </div>
                      <div class="row">
                        <div class="col-sm-3">
                          <b><label>Resume Per Page</label></b>
                        </div>
                        <div class="col-sm-2">
                          <div class="form-group">
                            <select
                              class="form-control custom-select"
                              v-model="form.resume_per_page"
                            >
                              <option value="">Select Here</option>
                              <option value="10">10</option>
                              <option value="20">20</option>
                              <option value="40">40</option>
                              <option value="60">60</option>
                              <option value="80">80</option>
                              <option value="160">160</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="submit-search card-footer border-light cart-panel-foo-fix">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-3">
                          <label for="exampleFormControlSelect1" style="line-height: 2"
                            >Active in</label
                          >
                        </div>
                        <div class="col-sm-4">
                          <select class="custom-select" v-model="form.active_in">
                            <option value="">Please Select</option>
                            <option value="1">1 Day</option>
                            <option value="3">3 Days</option>
                            <option value="7">7 days</option>
                            <option value="15">15 days</option>
                            <option value="30">1 Month</option>
                            <option value="60">2 Months</option>
                            <option value="90">3 Months</option>
                            <option value="120">4 Months</option>
                            <option value="180">6 Months</option>
                            <option value="365">1 Year</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 ml-auto">
                      <router-link
                        :to="{
                          path: '/resumeview',
                          query: {
                            display: this.checkedmodified[0],
                            skill: this.form.skill,
                            optional_keywords: this.form.optional_keywords,
                            mandate_keywords: this.form.mandate_keywords,
                            min_exp: this.form.min_exp,
                            max_exp: this.form.max_exp,
                            from_salary: this.form.from_salary,
                            to_salary: this.form.to_salary,
                            current_location: this.form.current_location,
                            excluding_keywords: this.form.excluding_keywords,
                            functionalrole: this.form.functionalrole,
                            industry: this.form.industry,
                            company_name: this.company_name,
                            designation: this.form.designation,
                            exclude_company_name: this.exclude_company_name,
                            notice_period: this.form.notice_period,
                            ug_qualification_name: this.form.ug_qualification_name,
                            ug_institute_name: this.ug_institute_name,
                            ug_education_type: this.form.ug_education_type,
                            start_graduation: this.form.start_graduation,
                            to_graduation: this.form.to_graduation,
                            active_in: this.form.active_in,
                            gender: this.form.gender,
                            resume_per_page: this.form.resume_per_page,
                          },
                        }"
                      >
                        <button class="btn btn-primary">
                          <i class="fas fa-search"></i> Search
                        </button>
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!-- close -->
          </div>
          <div class="col-sm-4">
            <aside>
              <!-- Save Search List -->

              <div class="card scroll-card mt-4">
                <article class="card-group-item">
                  <header class="card-header"><h6 class="title">Saved Search</h6></header>
                  <div class="filter-content">
                    <div v-if="!savesearchurl" class="text-center">
                      <h4>Loading...</h4>
                    </div>
                    <div class="list-group list-group-flush" v-else>
                      <a
                        class="list-group-item"
                        v-for="(saveurl, index) in savesearchurl"
                        :key="saveurl.id"
                        :href="saveurl.url"
                        >{{ index + 1 }}.{{ saveurl.search_name }}
                        <span class="float-right badge badge-light round">{{
                          getHumanDate(saveurl.created_at)
                        }}</span>
                      </a>
                    </div>
                    <!-- list-group .// -->
                  </div>
                </article>
                <!-- card-group-item.// -->
                <!-- card-group-item.// -->
              </div>
              <!-- card.// -->
            </aside>
          </div>
        </div>
      </div>
    </section>

    <main-footer></main-footer>
  </div>
</template>

<script>
var moment = require("moment");
export default {
  name: "Resumeview",
  data() {
    return {
      //form fields
      moment: moment,
      allQual: [],
      allCompanies: "",
      checkednew: [],
      checkedmodified: [],
      form: new Form({
        skill: "",
        optional_keywords: "",
        mandate_keywords: "",
        min_exp: "",
        max_exp: "",
        from_salary: "",
        to_salary: "",
        current_location: "",
        excluding_keywords: "",
        functionalrole: "",
        industry: "",
        designation: "",
        notice_period: "",
        ug_qualification_name: "",
        ug_education_type: "",
        start_graduation: "",
        to_graduation: "",

        pg_qualification_name: "",
        pg_education_type: "",
        start_postgraduation: "",
        to_postgraduation: "",
        min_age: "",
        max_age: "",
        active_in: 180,
        gender: "",
        resume_per_page: 60,
      }),

      //form fields close
      industryinfo: "",
      functionalinfo: "",
      company_name: "",
      exclude_company_name: "",
      ug_institute_name: "",
      pg_institute_name: "",
      keywords: [],
      filteredKeywords: [],
      filterStatus: false,
      filteredKeywordsEx: [],
      filterStatusEx: false,
      filteredKeywordsInstitute: [],
      filterStatusInstitute: false,
      savesearchurl: "",
      institutename: [],
      location: [],
    };
  },
  created() {
    this.getAllCompanies();
    this.getAllInstituteName();
  },
  mounted() {
    this.getAllIndustry();
    this.getAllFunctionalRole();
    this.getAllQualification();
    this.getFilteredCompanies();
    this.getFilteredCompaniesEx();
    this.getAllSearchUrl();
    this.getAllInstituteName();
    this.getFilteredInstituteUG();
    this.getAllLocation();
  },
  computed: {
    years() {
      const year = new Date().getFullYear();
      return Array.from({ length: year - 1960 }, (value, index) => 1960 + index + 1);
    },
    experiences() {
      const exp = 20;
      return Array.from({ length: exp - 0 }, (value, index) => 0 + index);
    },
  },
  methods: {
    getAllLocation() {
      axios.get("/master/location/group").then((response) => {
        this.location = response.data.data;
      });
    },
    getAllSearchUrl() {
      axios
        .get("/get/save/search")
        .then((response) => {
          this.savesearchurl = response.data.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },
    getAllIndustry() {
      axios
        .get("/get-industry")
        .then((response) => {
          this.industryinfo = response.data.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },
    getAllInstituteName() {
      axios.get("get/all/institutename/qualification").then((response) => {
        this.institutename = response.data;
      });
    },
    getFilteredInstituteUG() {
      if (this.ug_institute_name.length == 0) {
        this.filteredKeywordsInstitute = this.institutename;
      }
      this.filteredKeywordsInstitute = this.institutename.filter((el) => {
        if (el !== null) {
          return el.toLowerCase().startsWith(this.ug_institute_name.toLowerCase());
        }
      });
    },

    getAllCompanies() {
      axios.get("/master/companies/list").then((response) => {
        this.keywords = response.data;
      });
    },
    getFilteredCompanies() {
      if (this.company_name.length == 0) {
        this.filteredKeywords = this.keywords;
      }
      this.filteredKeywords = this.keywords.filter((el) => {
        if (el !== null) {
          return el.toLowerCase().startsWith(this.company_name.toLowerCase());
        }
      });
    },
    getFilteredCompaniesEx() {
      if (this.exclude_company_name.length == 0) {
        this.filteredKeywordsEx = this.keywords;
      }
      this.filteredKeywordsEx = this.keywords.filter((el) => {
        if (el !== null) {
          return el.toLowerCase().startsWith(this.exclude_company_name.toLowerCase());
        }
      });
    },
    setkeyword(company_name) {
      this.company_name = company_name;
      this.filterStatus = false;
    },
    setkeywordEx(exclude_company_name) {
      this.exclude_company_name = exclude_company_name;
      this.filterStatusEx = false;
    },
    setkeywordInstitute(ug_institute_name) {
      this.ug_institute_name = ug_institute_name;
      this.filterStatusInstitute = false;
    },

    getAllFunctionalRole() {
      axios
        .get("/get-functionalrole")
        .then((response) => {
          this.functionalinfo = response.data.data;
        })
        .catch((error) => {
          console.log("Error");
        });
    },
    getAllQualification() {
      axios.get("/qualification/name/group").then((response) => {
        this.allQual = response.data.data;
      });
    },
    getHumanDate: function (date) {
      return moment(date).fromNow();
    },
    colapsarrow(id) {
      $(".rightArrow" + id).toggle();
    },
  },
  watch: {
    company_name() {
      this.getFilteredCompanies();
    },
    exclude_company_name() {
      this.getFilteredCompaniesEx();
    },
    ug_institute_name() {
      this.getFilteredInstituteUG();
    },
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
.panel-heading {
  background-color: #007bff;
  color: #fff;
  padding: 2px;
  margin-bottom: 1rem;
}

.form-control {
  border-radius: 0px !important;
  padding: 11px 10px 11px 10px !important;
  font-size: 12px !important;
  border-width: 2px !important;
  height: 42px !important;
}

.panel-heading {
  background-color: #f95602;
  color: #fff;
  padding: 2px;
  margin-bottom: 1rem;
  border-radius: 4px;
  box-shadow: 0px 5px 6px #e6e4e4;
}

.panel-title {
  /* color: #fff; */
  margin: 0;
  padding: 5px;
  font-size: 19px;
}

.panel-heading .panel-title a {
  color: #fff !important;
}

.panel-body {
  background-color: #fff;
  padding: 20px 15px;
  border: 1px solid #ededed;
  margin-bottom: 1rem;
}
.panel-collapse {
  height: auto !important;
}
.checkbox-inline {
  color: #888888;
  padding-right: 10px;
}
.required {
  background-color: #fff;
  border: 1px solid #ededed;
  margin-bottom: 1rem;
  margin-top: 1rem;
  padding: 20px 15px;
}
.submit-search {
  background-color: #ededed;
  padding: 20px 15px;
  width: 100%;

  box-shadow: 0px 6px 6px #d9d9d9ad;
}
.submit-search a {
  float: right;
}
.scroll-card {
  height: 300px;
  overflow-y: scroll;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

/*Card Footer Fixed*/
@supports (box-shadow: 2px 2px 2px black) {
  .cart-panel-foo-fix {
    position: sticky;
    bottom: 0;
    z-index: 9;
  }
}

.btn-cust {
  background-color: #e96125 !important;
  color: #fff !important;
  font-size: 16px;
  padding: 8px 8px;
  min-width: 128px;
}
.btn-cust:hover {
  background-color: #c74b14 !important;
  color: #fff !important;
}
</style>
