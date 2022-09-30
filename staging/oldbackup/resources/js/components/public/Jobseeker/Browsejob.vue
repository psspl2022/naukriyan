<template>
  <div id="browsejob">
    <main-header></main-header>
    <header class="masthead1 text-center text-white">
      <div class="masthead-content" id="form-container">
        <div class="container">
         
          <form>
            <div class="col-sm-12 mt-5" v-if="allProfile">
              <router-link :to="`/userinfo/pe`">
                <button class="btn transparent" type="button">
                  <i class="fa fa-file-invoice mr-2" aria-hidden="true"></i
                  >Upload Your CV
                </button>
              </router-link>
            </div>
            <div class="col-sm-12 mt-5" v-else>
              <button
                class="btn transparent"
                type="button"
                data-toggle="modal"
                data-target="#myJobseekerModal"
                aria-hidden="true"
                data-dismiss="modal"
              >
                <i class="fa fa-file-invoice mr-2" aria-hidden="true"></i>Upload
                Your CV
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>
    <section class="section pb-5">
      <div class="container">
        <div class="row">
          <!-- filter widget start -->
          <div class="col-sm-4">
            <div class="make-me-sticky">
              <div class="card">
                <div class="result-search-form-wrapper clearfix">
                  <h3 class="text-center">Keyword</h3>
                  <div class="inner">
                    <form action="" method="GET">
                      <div class="gap-10">
                        <div class="col-xs-12 col-sm-12">
                          <div class="form-group form-icon-right mb-10">
                            <input
                              name="q"
                              type="text"
                              id="txtgoingto"
                              placeholder="Search Keyword"
                              class="form-control mb-0 ui-autocomplete-input"
                              autocomplete="off"
                              v-model="search"
                            />
                          </div>
                          <strong>{{ error }}</strong>
                        </div>
                        <div class="col-sm-12 text-center">
                          <button
                            type="submit"
                            class="rounded-0 btn btn-block btn-primary btn-icon w-100"
                            v-if="loading"
                          >
                            Loading...
                          </button>
                          <button
                            @click.prevent="jobSearchByKeywords()"
                            type="submit"
                            class="rounded-0 btn btn-block btn-primary btn-icon w-100"
                            v-else
                          >
                            SUBMIT
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="heading mt-2">
                <span class="icon feather-icon">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-filter"
                  >
                    <polygon
                      points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"
                    ></polygon>
                  </svg>
                </span>
                Filter
              </div>

              <div class="card filter-card">
                <div class="card-header" id="Industry">
                  <h5 class="mb-0">
                    <a
                      class="btn btn-link"
                      data-toggle="collapse"
                      data-target="#Industry1"
                      aria-controls="Industry1"
                    >
                      Industry
                      <i class="fa fa-angle-up"></i>
                    </a>
                  </h5>
                </div>

                <div id="Industry1" class="collapse" aria-labelledby="Industry">
                  <div class="card-body">
                 <span class="select2-search select2-search--dropdown mb-3">
                  <input 
                        type="text" 
                        name="Search" 
                        class="select2-search__field" 
                        placeholder="Search here..." 
                        v-model="search_industry">
                </span>
                    <div class="filter-list">
                      <ul class="list-unstyled mb-0" id="ulstar">
                        <li
                          class="list-item"
                          v-for="inds in filteredListIndustry"
                          :key="inds.id"
                        >
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                v-bind:value="inds.id"
                                @click="jobFilter(inds.id)"
                                id="functionalid"
                                name="functionalid"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              {{ inds.category_name
                              }}<small>({{ inds.jobmanagers.length }})</small>
                            </label>
                          </div>
                        </li>

                        <input
                          type="checkbox"
                          checked="checked"
                          value="**"
                          class="custom-control-input"
                        />
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card filter-card">
                <div class="card-header" id="Functinal">
                  <h5 class="mb-0">
                    <a
                      class="btn btn-link"
                      data-toggle="collapse"
                      data-target="#Functinal1"
                      aria-controls="Functinal1"
                    >
                      Functional Area
                      <i class="fa fa-angle-up"></i>
                    </a>
                  </h5>
                </div>

                <div
                  id="Functinal1"
                  class="collapse"
                  aria-labelledby="Functinal"
                >
                  <div class="card-body">
                 <span class="select2-search select2-search--dropdown mb-3">
                  <input 
                        type="text" 
                        name="Search" 
                        class="select2-search__field" 
                        placeholder="Search here..." 
                        v-model="search_functional">
                </span>
                    <div class="filter-list">
                      <ul class="list-unstyled mb-0" id="ulstar">
                        <li
                          class="list-item"
                          v-for="functional in filteredListFunctional"
                          :key="functional.id"
                        >
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                v-bind:value="functional.id"
                                @click="jobFilter(functional.id)"
                                id="functionalid"
                                name="functionalid"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              {{ functional.subcategory_name
                              }}<small
                                >({{ functional.jobmanagers.length }})</small
                              >
                            </label>
                          </div>
                        </li>
                        <input
                          type="checkbox"
                          checked="checked"
                          value="**"
                          class="custom-control-input"
                        />
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card filter-card">
                <div class="card-header" id="Type">
                  <h5 class="mb-0">
                    <a
                      class="btn btn-link"
                      data-toggle="collapse"
                      data-target="#Type1"
                      aria-controls="Type1"
                    >
                      Job Type
                      <i class="fa fa-angle-up"></i>
                    </a>
                  </h5>
                </div>

                <div id="Type1" class="collapse" aria-labelledby="Type">
                  <div class="card-body">
                    <div class="filter-list">
                      <ul class="list-unstyled mb-0" id="ulstar">
                        <li
                          class="list-item"
                          v-for="jobtype in allDesignation"
                          :key="jobtype.id"
                        >
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                v-bind:value="jobtype.id"
                                @click="jobFilter(jobtype.id)"
                                id="jobtype.id"
                                name="jobtype.id"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              {{ jobtype.job_type
                              }}<small
                                >({{ jobtype.job_managers.length }})</small
                              >
                            </label>
                          </div>
                        </li>
                        <input
                          type="checkbox"
                          checked="checked"
                          value="**"
                          class="custom-control-input"
                        />
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card filter-card">
                <div class="card-header" id="exp">
                  <h5 class="mb-0">
                    <a
                      class="btn btn-link"
                      data-toggle="collapse"
                      data-target="#exp1"
                      aria-controls="exp1"
                    >
                      Experience
                      <i class="fa fa-angle-up"></i>
                    </a>
                  </h5>
                </div>

                <div id="exp1" class="collapse" aria-labelledby="exp">
                  <div class="card-body">
                    <div class="filter-list">
                      <ul class="list-unstyled mb-0" id="ulstar">
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="exp"
                                name="exp"
                                value="0"
                                @click="jobFilter(1)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              Fresher<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="exp"
                                name="exp"
                                value="0,1"
                                @click="jobFilter(1)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              < 1 year<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="exp"
                                name="exp"
                                value="1,3"
                                @click="jobFilter(1)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              1-3 year<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="exp"
                                name="exp"
                                value="3,5"
                                @click="jobFilter(1)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              3-5 year<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="exp"
                                name="exp"
                                value="5,7"
                                @click="jobFilter(1)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              5-7 year<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="exp"
                                name="exp"
                                value="7,10"
                                @click="jobFilter(1)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              7-10 year<small></small>
                            </label>
                          </div>
                        </li>
                        <input
                          type="checkbox"
                          checked="checked"
                          value="**"
                          class="custom-control-input"
                        />
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card filter-card">
                <div class="card-header" id="Qualification">
                  <h5 class="mb-0">
                    <a
                      class="btn btn-link"
                      data-toggle="collapse"
                      data-target="#Qualification1"
                      aria-controls="Qualification1"
                    >
                      Qualification
                      <i class="fa fa-angle-up"></i>
                    </a>
                  </h5>
                </div>

                <div
                  id="Qualification1"
                  class="collapse"
                  aria-labelledby="Qualification"
                >
                  <div class="card-body">
                    <div class="filter-list">
                      <ul class="list-unstyled mb-0" id="ulstar">
                        <li
                          class="list-item"
                          v-for="qualification in allRecruiter"
                          :key="qualification.id"
                        >
                          <div class="my-checkbox">
                            <label class="checkbox-inline">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                v-bind:value="qualification.id"
                                @click="jobFilter(qualification.id)"
                                id="qualification.id"
                                name="qualification.id"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              {{ qualification.qualification
                              }}<small
                                >({{ qualification.jobmanagers.length }})</small
                              >
                            </label>
                          </div>
                        </li>
                        <input
                          type="checkbox"
                          checked="checked"
                          value="**"
                          class="custom-control-input"
                        />
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card filter-card">
                <div class="card-header" id="Div2">
                  <h5 class="mb-0">
                    <a
                      class="btn btn-link"
                      data-toggle="collapse"
                      data-target="#collapse1"
                      aria-expanded="true"
                      aria-controls="collapse1"
                    >
                      Offered Salary
                      <i class="fa fa-angle-up"></i>
                    </a>
                  </h5>
                </div>

                <div id="collapse1" class="collapse" aria-labelledby="Div2">
                  <div class="card-body">
                    <div class="filter-list">
                      <ul class="list-unstyled mb-0" id="ulstar">
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline" for="upto_3lac">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="upto_3lac"
                                name="exp_sal"
                                value="0,300000"
                                @click="jobFilter(300000)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              0 - 3 Lakhs<small></small>
                            </label>
                          </div>
                        </li>

                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline" for="3_6lac">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="3_6lac"
                                name="exp_sal"
                                value="300000,600000"
                                @click="jobFilter(300000)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              3 - 6 Lakhs<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline" for="6_9lac">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="6_9lac"
                                name="exp_sal"
                                value="600000,900000"
                                @click="jobFilter(300000)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              6 - 9 Lakhs<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline" for="9_12lac">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="9_12lac"
                                name="exp_sal"
                                value="900000,1200000"
                                @click="jobFilter(300000)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              9 - 12 Lakhs<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline" for="12_15lac">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="12_15lac"
                                name="exp_sal"
                                value="1200000,1500000"
                                @click="jobFilter(300000)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              12 - 15 Lakhs<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline" for="15_18lac">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="15_18lac"
                                name="exp_sal"
                                value="1500000,1800000"
                                @click="jobFilter(300000)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              15 - 18 Lakhs<small></small>
                            </label>
                          </div>
                        </li>
                        <li class="list-item">
                          <div class="my-checkbox">
                            <label class="checkbox-inline" for="18_25lac">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="18_25lac"
                                name="exp_sal"
                                value="1800000,2500000"
                                @click="jobFilter(300000)"
                              />
                              <span class="checkbox-icon"
                                ><i class="fa fa-square" aria-hidden="true"></i>
                                <span class="check-icon">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </span>
                              </span>
                              18 - 25 Lakhs<small></small>
                            </label>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- filter widget end -->

          <!-- list start -->
          <div v-if="loading">
            <h3 class="text-center">Please wait while we loading jobs.</h3>
          </div>

          <div class="col-sm-8" v-else>
            <div id="result" v-if="allIndustry.length >= 1">
              <h4 class="fw-600 result-count">
                Showing <span>{{ allIndustry.length }}</span> Jobs
              </h4>
              <div
                class="list-item-box hotel-item vacation-item"
                v-for="joblist in allIndustry"
                :key="joblist.id"
              >
                <div class="list-item row mx-0">
                  <div class="list-description col-sm-9">
                    <div class="item-description">
                      <h4 class="item-name fs-17 fw-500">
                        <router-link :to="`/edit-viewjobs/${joblist.id}`">
                          <a href="#">{{ joblist.title }}</a>
                        </router-link>
                      </h4>
                      <p class="mb-2">
                        <b>(At {{ joblist.company_name }})</b>
                      </p>
                      <div class="duration fs-13">
                        <p>
                          <i
                            class="fa fa-building mr-2 orange"
                            aria-hidden="true"
                          ></i
                          >Industry: <b>{{ joblist.category_name }}</b>
                        </p>
                        <p>
                          <i
                            class="fa fa-pencil-alt mr-2 orange"
                            aria-hidden="true"
                          ></i
                          >Skills:

                          <span
                            :inner-html.prop="
                              joblist.job_skills | stringToSpanTag
                            "
                          ></span>
                        </p>
                        <p>
                          <i
                            class="fa fa-flask mr-2 orange"
                            aria-hidden="true"
                          ></i
                          >Experience:
                          <span
                            v-if="
                              joblist.main_exp === '0' &&
                              joblist.max_exp === '0'
                            "
                            >Fresher</span
                          >
                          <span v-else
                            >{{ joblist.main_exp + " Yr" }} -
                            {{ joblist.max_exp + " Yr" }}</span
                          >
                        </p>
                        <p>
                          <i
                            class="fa fa-map-marker mr-2 orange"
                            aria-hidden="true"
                          ></i
                          >Location: <span>{{ joblist.job_exp }}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="list-price col-sm-3 light-gray1">
                    <div class="mt-5" v-if="allProfile">
                      <a
                        href="#"
                        class="btn btn-success text-white btn-block"
                        @click.prevent="jobAlreadyApply()"
                        v-if="jobsID.includes(joblist.id) === true"
                        :class="
                          jobsID.includes(joblist.id) === true ? 'disabled' : ''
                        "
                        ><i class="fa fa-check-circle"></i> Applied</a
                      >
                      <a
                        href="#"
                        data-toggle="modal"
                        :data-id="joblist.id"
                        data-target=".mdupdate"
                        @click="openmd(joblist.id)"
                        class="btn btn-primary border-orange text-white btn-block"
                        v-else
                        >Apply Job</a
                      >
                    </div>
                    <div class="mt-5" v-else>
                      <a
                        href=""
                        data-toggle="modal"
                        data-target="#myJobseekerModal"
                        aria-hidden="true"
                        data-dismiss="modal"
                        class="btn btn-primary border-orange text-white btn-block"
                        >Apply Job</a
                      >
                    </div>
                    <div class="mt-2">
                      <router-link
                        :to="`/edit-viewjobs/${joblist.id}`"
                        class="btn border-orange btn-block"
                      >
                        View Job
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- list end -->
        </div>
      </div>
    </section>

    <main-footer></main-footer>
    <!-- The Modal Apply Job -->
    <div class="modal fade popupForm mdupdate" id="apply">
      <div class="modal-dialog">
        <div class="modal-content">
          <form
            role="form"
            method="post"
            @submit.prevent="ApplyJob(demo.id)"
            enctype="multipart/form-data"
          >
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Confirmation before Apply?</h4>
              <button type="button" class="close" data-dismiss="modal">
                &times;
              </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p><strong>Job Title</strong> :- {{ demo.title }}</p>
                  </div>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p><strong>Location</strong> :- {{ demo.location }}</p>
                  </div>
                </div>
              </div>
              <div class="form-group row inputBox">
                <div class="col-sm-12">
                  <div class="input text">
                    <p>
                      <strong>Company Name</strong> :- {{ demo.company_name }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="question">
                <p>
                  Do you have any of the relavant or Equivalent Qualification ?
                  ({{ demo.qualification }})
                </p>
                <fieldset class="mb-3">
                  <div class="form-group ask_question">
                    <div class="icheck-primary d-inline">
                      <input
                        type="radio"
                        id="radioPrimary1"
                        name="r1"
                        checked=""
                      />
                      <label for="radioPrimary1"> Yes </label>
                    </div>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary2" name="r1" />
                      <label for="radioPrimary2"> No </label>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="question">
                <p>
                  Do you have relevant experience of this job ?({{
                    demo.min_exp
                  }}Yr -{{ demo.max_exp }}Yr)
                </p>
                <fieldset class="mb-3">
                  <div class="form-group ask_question">
                    <div class="icheck-primary d-inline">
                      <input
                        type="radio"
                        id="radioPrimary3"
                        name="ex1"
                        checked=""
                      />
                      <label for="radioPrimary3"> Yes </label>
                    </div>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary4" name="ex1" />
                      <label for="radioPrimary4"> No </label>
                    </div>
                  </div>
                </fieldset>
              </div>

              <div class="question">
                <p>
                  Do you have relevant skill for this job ?({{
                    demo.job_skill
                  }})
                </p>
                <fieldset class="mb-3">
                  <div class="form-group ask_question">
                    <div class="icheck-primary d-inline">
                      <input
                        type="radio"
                        id="radioPrimary5"
                        name="sk1"
                        checked=""
                      />
                      <label for="radioPrimary5"> Yes </label>
                    </div>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary6" name="sk1" />
                      <label for="radioPrimary6"> No </label>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary">
                {{ TempApplyStatus ? "Please Wait...." : "Confirm Apply" }}
              </button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Browsejob",
  data() {
    return {
      TempApplyStatus: false,
      allIndustry: [],
      jobsID: [],
      search:'',
      search_industry: "",
      search_functional: "",
      error: "",
      loading: false,
      inputsearch:'',
      allFee:'',
      allFunctional:'',

      demo: new Form({
        id: "",
        title: "",
        location: "",
        qualification: "",
        min_exp: "",
        max_exp: "",
        job_skill: "",
        company_name: "",
      }),
    };
  },

  mounted() {
   // this.$store.dispatch("getAllFee", "/get-industries");
    //this.$store.dispatch("getAllState", "/get-functional-role");
    this.$store.dispatch("getAllRecruiter", "/get-qualification");
    this.$store.dispatch("getAllDesignation", "/get-job-type");
    this.$store.dispatch("getAllProfile", "/userprofile");
    this.getAllIndustries();
    this.getAllFunctionalRole();
    // if (localStorage.getItem("reloaded")) {
    // The page was just reloaded. Clear the value from local storage
    // so that it will reload the next time this page is visited.
    // localStorage.removeItem("reloaded");
    // } else {
    // Set a flag so that we know not to reload the page twice.
    // localStorage.setItem("reloaded", "1");
    // location.reload();
    // }
  },
  computed: {
    filteredListIndustry() {
            if(this.search_industry === '')
            return this.allFee
            return this.allFee.filter(inds => {
                return inds.category_name.toLowerCase().includes(this.search_industry.toLowerCase())
            })   
        },
        filteredListFunctional() {
            if(this.search_functional === '')
            return this.allFunctional
            return this.allFunctional.filter(functional => {
                return functional.subcategory_name.toLowerCase().includes(this.search_functional.toLowerCase())
            })   
        },
    // allFee() {
    //   return this.$store.getters.getAllFee;
    // },
    // allStates() {
    //   return this.$store.getters.getAllState;
    // },
    allRecruiter() {
      return this.$store.getters.getAllRecruiter;
    },
    allDesignation() {
      return this.$store.getters.getAllDesignation;
    },
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
  },
  methods: {
    getAllIndustries(){
      axios.get('/get-industries').then((response)=>{
        this.allFee =response.data.data;
      })
    },
    getAllFunctionalRole(){
      axios.get('/get-functional-role').then((response)=>{
        this.allFunctional =response.data.data;
      })
    },
    openmd: function (id) {
      axios.get("/get-applyjobdata/" + id).then((response) => {
        this.demo.id = response.data[0].id;
        this.demo.title = response.data[0].title;
        this.demo.location = response.data[0].job_exp;
        this.demo.qualification = response.data[0].qualification;
        this.demo.min_exp = response.data[0].main_exp;
        this.demo.max_exp = response.data[0].max_exp;
        this.demo.job_skill = response.data[0].job_skills;
        this.demo.company_name = response.data[0].company_name;
      });
    },
    ApplyJob: function (id) {
      this.TempApplyStatus = true;
      this.demo.post("/apply-job/" + id).then((response) => {
        this.checkUserApplyJobs();
        toast({
          type: "success",
          title: "Job Applied Successfully",
        });
        this.TempApplyStatus = false;
        $(".modal-backdrop").remove();
        $("#apply").modal("hide");
      });
    },
    getJobs(kw, location, experience, jobtype) {
      this.loading = true;
      axios
        .get(
          "jobs/search/" +
            kw +
            "/" +
            location +
            "/" +
            experience +
            "/" +
            jobtype
        )
        .then((response) => {
          this.loading = false;
          this.allIndustry = response.data.data;
        });
    },

    getAllJobs() {
      this.loading = true;
      axios.get("get-joblist").then((response) => {
        this.loading = false;
        this.allIndustry = response.data.data;
      });
    },

    checkUserApplyJobs() {
      const self = this;
      axios.get("check-user-apply-job").then((response) => {
        if (response.data.length >= 1) {
          $.each(response.data, function (key, value) {
            self.jobsID.push(value.job_id);
          });
        } else {
          this.jobsID.push(0);
        }
      });
    },
    jobAlreadyApply() {
      swal("Already Applied!", "You have already applied this job.", "warning");
    },
    jobFilter(v) {
      $("input:checkbox[name='exp']").on("click", function () {
        var $box = $(this);
        if ($box.is(":checked")) {
          // the name of the box is retrieved using the .attr() method
          // as it is assumed and expected to be immutable
          var group = "input:checkbox[name='" + $box.attr("name") + "']";
          // the checked state of the group/box on the other hand will change
          // and the current value is retrieved using .prop() method
          $(group).prop("checked", false);
          $box.prop("checked", true);
        } else {
          $box.prop("checked", false);
        }
      });
      var arr = [];
      $(":checkbox:checked").each(function (i) {
        arr[i] = $(this).val();
      });
      var q = arr.toString();
      this.loading = true;
      axios.get("jobs/filter/" + q).then((response) => {
        this.loading = false;
        this.allIndustry = response.data.data;
      });
    },
    jobSearchByKeywords() {
      let keyword = this.search;
      if (keyword === "") {
        this.error = "Please enter keyword";
      } else {
        this.error = "";
        this.loading = true;
        axios.get("jobs/search/" + this.search).then((response) => {
          this.loading = false;
          this.allIndustry = response.data.data;
        });
      }
    },
  },
  created: function () {
    this.checkUserApplyJobs();
    if (this.$route.params.kw) {
      this.getJobs(
        this.$route.params.kw,
        this.$route.params.location,
        this.$route.params.experience,
        this.$route.params.jobtype
      );
    } else {
      this.getAllJobs();
    }
  },
  filters: {
    stringToSpanTag: function (string) {
      let result = "";
      if(string === null) return '';
      let arrStr = string.split(",");
      let strLength = arrStr.length;
      for (let i = 0; i < strLength; i++) {
        //result += ""+arrStr[i]+"";
        result += '<span class="tag-item">' + arrStr[i] + "</span>";
      }
      return result;
    },
  },
};
</script>

<style scoped>
.ask_question {
  margin: 0;
  padding: 0;
  margin-top: 10px;
  margin-left: -15px;
}
.make-me-sticky {
  position: sticky;
  top: 14%;
  width: 100%;
  float: left;
}
</style>
