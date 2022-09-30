<template>
  <div id="accountexicutive">
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
                  <li class="active" v-if="alldata.length > 0">
                    {{ alldata[0].applied_for }}
                  </li>
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
              <h2 class="hk-pg-title" v-if="alldata.length > 0">
                {{ alldata[0].applied_for }}
              </h2>
            </div>
            <div class="card mt-3">
              <div class="card-body">
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <ul class="nav nav-tabs nav-fill">
                      <li class="nav-item">
                        <a
                          class="nav-link active fs-12"
                          data-toggle="tab"
                          href="#All"
                          >All</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link fs-12 border-right-0"
                          data-toggle="tab"
                          href="#NewApplied"
                          >New Applied</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link fs-12 border-right-0"
                          data-toggle="tab"
                          href="#Shortlisted"
                          >Shortlisted</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link fs-12 border-right-0"
                          data-toggle="tab"
                          href="#Rejected"
                          >Rejected</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link fs-12 border-right-0"
                          data-toggle="tab"
                          href="#InterviewScheduled"
                          >Interview Scheduled</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link fs-12 border-right-0"
                          data-toggle="tab"
                          href="#Offer"
                          >Offer</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link fs-12 border-right-0"
                          data-toggle="tab"
                          href="#Hire"
                          >Joining</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link fs-12 border-right-0"
                          data-toggle="tab"
                          href="#SaveForFuture"
                          >Save / Hold For Future</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="tab-content">
                  <!-- all tab start -->

                  <div id="All" class="tab-pane fade show active">
                    <div class="table-responsive">
                      <table class="table custom-table mt-5">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Applied On</th>
                            <th>Exp.</th>
                            <th>Current Desig.</th>
                            <th>Exp. Salary</th>
                            <th>Notice Period</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="data in alldata" :key="data.id">
                            <td>
                              {{ data.fname }}
                              {{ data.lname ? data.lname : "" }}
                              <p>
                                <a
                                  v-if="data.resume !== null"
                                  :href="'resume/' + data.resume"
                                  target="_blank"
                                  download
                                  >Download Resume</a
                                >
                              </p>
                            </td>
                            <td>{{ data.created_at | timeformat }}</td>
                            <td>{{ data.exp_year }} - {{ data.exp_month }}</td>
                            <td>{{ data.designation }}</td>
                            <td>{{ data.expected_salary }}</td>
                            <td>{{ data.notice_period }}</td>

                            <td>{{ data.status | applyJobStatus }}</td>
                            <td>
                              <div class="social-icons">
                                <a
                                  class="social-icon social-icon--codepen"
                                  @click="Shortlist(data.id)"
                                >
                                  <i class="fas fa-check"></i>
                                  <div class="tooltip">Shortlist</div>
                                </a>
                                <a
                                  class="social-icon social-icon--github"
                                  @click="Rejected(data.id)"
                                >
                                  <i class="fas fa-times"></i>
                                  <div class="tooltip">Reject</div>
                                </a>
                                <a
                                  class="social-icon social-icon--twitter"
                                  data-toggle="modal"
                                  data-target="#interviewsc"
                                  @click="getInterviewScheduledID(data.id)"
                                >
                                  <i class="fas fa-clock"></i>
                                  <div class="tooltip">Interview Schedule</div>
                                </a>
                                <a
                                  class="social-icon social-icon--dribbble"
                                  @click="Offer(data.id)"
                                >
                                  <i class="fas fa-file-archive"></i>
                                  <div class="tooltip">Offer Letter</div>
                                </a>
                                <a
                                  class="social-icon social-icon--instagram"
                                  @click="Hire(data.id)"
                                >
                                  <i class="fas fa-thumbs-up"></i>
                                  <div class="tooltip">Hire</div>
                                </a>

                                <a
                                  class="social-icon social-icon--facebook"
                                  @click="Save(data.id)"
                                >
                                  <i class="fas fa-star"></i>
                                  <div class="tooltip">Save For Future</div>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- All tab end -->

                  <!-- NewApplied tab start -->
                  <div id="NewApplied" class="tab-pane fade">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-5" id="example1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Applied On</th>
                            <th>Experience</th>
                            <th>Current Designation</th>
                            <th>Expected Salary</th>
                            <th>Notice Period</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-if="data.status == '1'"
                            v-for="data in alldata"
                            :key="data.id"
                          >
                            <td>
                              {{ data.fname }}
                              {{ data.lname ? data.lname : "" }}
                              <p>
                                <a
                                  v-if="data.resume !== null"
                                  :href="'resume/' + data.resume"
                                  target="_blank"
                                  download
                                  >Download Resume</a
                                >
                              </p>
                            </td>
                            <td>{{ data.created_at | timeformat }}</td>
                            <td>{{ data.exp_year }} - {{ data.exp_month }}</td>
                            <td>{{ data.designation }}</td>
                            <td>{{ data.expected_salary }}</td>
                            <td>{{ data.notice_period }}</td>
                            <td>
                              <div class="social-icons">
                                <a
                                  class="social-icon social-icon--codepen"
                                  @click="Shortlist(data.id)"
                                >
                                  <i class="fas fa-check"></i>
                                  <div class="tooltip">Shortlist</div>
                                </a>
                                <a
                                  class="social-icon social-icon--github"
                                  @click="Rejected(data.id)"
                                >
                                  <i class="fas fa-times"></i>
                                  <div class="tooltip">Reject</div>
                                </a>
                                <a
                                  class="social-icon social-icon--twitter"
                                  data-toggle="modal"
                                  data-target="#interviewsc"
                                  @click="getInterviewScheduledID(data.id)"
                                >
                                  <i class="fas fa-clock"></i>
                                  <div class="tooltip">Interview Schedule</div>
                                </a>
                                <a
                                  class="social-icon social-icon--dribbble"
                                  @click="Offer(data.id)"
                                >
                                  <i class="fas fa-file-archive"></i>
                                  <div class="tooltip">Offer Letter</div>
                                </a>
                                <a
                                  class="social-icon social-icon--instagram"
                                  @click="Hire(data.id)"
                                >
                                  <i class="fas fa-thumbs-up"></i>
                                  <div class="tooltip">Hire</div>
                                </a>

                                <a
                                  class="social-icon social-icon--facebook"
                                  @click="Save(data.id)"
                                >
                                  <i class="fas fa-star"></i>
                                  <div class="tooltip">Save For Future</div>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- NewApplied tab end -->

                  <!-- Shortlisted tab start -->
                  <div id="Shortlisted" class="tab-pane fade">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-5" id="example1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Applied On</th>
                            <th>Experience</th>
                            <th>Current Designation</th>
                            <th>Expected Salary</th>
                            <th>Notice Period</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-if="data.status == '3'"
                            v-for="data in alldata"
                            :key="data.id"
                          >
                            <td>
                              {{ data.fname }}
                              {{ data.lname ? data.lname : "" }}
                              <p>
                                <a
                                  v-if="data.resume !== null"
                                  :href="'resume/' + data.resume"
                                  target="_blank"
                                  download
                                  >Download Resume</a
                                >
                              </p>
                            </td>
                            <td>{{ data.created_at | timeformat }}</td>
                            <td>{{ data.exp_year }} - {{ data.exp_month }}</td>
                            <td>{{ data.designation }}</td>
                            <td>{{ data.expected_salary }}</td>
                            <td>{{ data.notice_period }}</td>
                            <td>
                              <div class="social-icons">
                                <a
                                  class="social-icon social-icon--codepen"
                                  @click="Shortlist(data.id)"
                                >
                                  <i class="fas fa-check"></i>
                                  <div class="tooltip">Shortlist</div>
                                </a>
                                <a
                                  class="social-icon social-icon--github"
                                  @click="Rejected(data.id)"
                                >
                                  <i class="fas fa-times"></i>
                                  <div class="tooltip">Reject</div>
                                </a>
                                <a
                                  class="social-icon social-icon--twitter"
                                  data-toggle="modal"
                                  data-target="#interviewsc"
                                  @click="getInterviewScheduledID(data.id)"
                                >
                                  <i class="fas fa-clock"></i>
                                  <div class="tooltip">Interview Schedule</div>
                                </a>
                                <a
                                  class="social-icon social-icon--dribbble"
                                  @click="Offer(data.id)"
                                >
                                  <i class="fas fa-file-archive"></i>
                                  <div class="tooltip">Offer Letter</div>
                                </a>
                                <a
                                  class="social-icon social-icon--instagram"
                                  @click="Hire(data.id)"
                                >
                                  <i class="fas fa-thumbs-up"></i>
                                  <div class="tooltip">Hire</div>
                                </a>

                                <a
                                  class="social-icon social-icon--facebook"
                                  @click="Save(data.id)"
                                >
                                  <i class="fas fa-star"></i>
                                  <div class="tooltip">Save For Future</div>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- Shortlisted tab end -->

                  <!-- Rejected tab start -->
                  <div id="Rejected" class="tab-pane fade">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-5" id="example1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Applied On</th>
                            <th>Experience</th>
                            <th>Current Designation</th>
                            <th>Expected Salary</th>
                            <th>Notice Period</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-if="data.status == '4'"
                            v-for="data in alldata"
                            :key="data.id"
                          >
                            <td>
                              {{ data.fname }}
                              {{ data.lname ? data.lname : "" }}
                              <p>
                                <a
                                  v-if="data.resume !== null"
                                  :href="'resume/' + data.resume"
                                  target="_blank"
                                  download
                                  >Download Resume</a
                                >
                              </p>
                            </td>
                            <td>{{ data.created_at | timeformat }}</td>
                            <td>{{ data.exp_year }} - {{ data.exp_month }}</td>
                            <td>{{ data.designation }}</td>
                            <td>{{ data.expected_salary }}</td>
                            <td>{{ data.notice_period }}</td>
                            <td>
                              <div class="social-icons">
                                <a
                                  class="social-icon social-icon--codepen"
                                  @click="Shortlist(data.id)"
                                >
                                  <i class="fas fa-check"></i>
                                  <div class="tooltip">Shortlist</div>
                                </a>
                                <a
                                  class="social-icon social-icon--github"
                                  @click="Rejected(data.id)"
                                >
                                  <i class="fas fa-times"></i>
                                  <div class="tooltip">Reject</div>
                                </a>
                                <a
                                  class="social-icon social-icon--twitter"
                                  data-toggle="modal"
                                  data-target="#interviewsc"
                                  @click="getInterviewScheduledID(data.id)"
                                >
                                  <i class="fas fa-clock"></i>
                                  <div class="tooltip">Interview Schedule</div>
                                </a>
                                <a
                                  class="social-icon social-icon--dribbble"
                                  @click="Offer(data.id)"
                                >
                                  <i class="fas fa-file-archive"></i>
                                  <div class="tooltip">Offer Letter</div>
                                </a>
                                <a
                                  class="social-icon social-icon--instagram"
                                  @click="Hire(data.id)"
                                >
                                  <i class="fas fa-thumbs-up"></i>
                                  <div class="tooltip">Hire</div>
                                </a>

                                <a
                                  class="social-icon social-icon--facebook"
                                  @click="Save(data.id)"
                                >
                                  <i class="fas fa-star"></i>
                                  <div class="tooltip">Save For Future</div>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- Rejected tab end -->

                  <!-- InterviewScheduled tab start -->

                  <div id="InterviewScheduled" class="tab-pane fade">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-5" id="example1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Applied On</th>
                            <th>Experience</th>
                            <th>Current Designation</th>
                            <th>Expected Salary</th>
                            <th>Notice Period</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-if="data.status == '2'"
                            v-for="data in alldata"
                            :key="data.id"
                          >
                            <td>
                              {{ data.fname }}
                              {{ data.lname ? data.lname : "" }}
                              <p>
                                <a
                                  v-if="data.resume !== null"
                                  :href="'resume/' + data.resume"
                                  target="_blank"
                                  download
                                  >Download Resume</a
                                >
                              </p>
                            </td>
                            <td>{{ data.created_at | timeformat }}</td>
                            <td>{{ data.exp_year }} - {{ data.exp_month }}</td>
                            <td>{{ data.designation }}</td>
                            <td>{{ data.expected_salary }}</td>
                            <td>{{ data.notice_period }}</td>
                            <td>
                              <div class="social-icons">
                                <a
                                  class="social-icon social-icon--codepen"
                                  @click="Shortlist(data.id)"
                                >
                                  <i class="fas fa-check"></i>
                                  <div class="tooltip">Shortlist</div>
                                </a>
                                <a
                                  class="social-icon social-icon--github"
                                  @click="Rejected(data.id)"
                                >
                                  <i class="fas fa-times"></i>
                                  <div class="tooltip">Reject</div>
                                </a>
                                <a
                                  class="social-icon social-icon--twitter"
                                  data-toggle="modal"
                                  data-target="#interviewsc"
                                  @click="getInterviewScheduledID(data.id)"
                                >
                                  <i class="fas fa-clock"></i>
                                  <div class="tooltip">Interview Schedule</div>
                                </a>
                                <a
                                  class="social-icon social-icon--dribbble"
                                  @click="Offer(data.id)"
                                >
                                  <i class="fas fa-file-archive"></i>
                                  <div class="tooltip">Offer Letter</div>
                                </a>
                                <a
                                  class="social-icon social-icon--instagram"
                                  @click="Hire(data.id)"
                                >
                                  <i class="fas fa-thumbs-up"></i>
                                  <div class="tooltip">Hire</div>
                                </a>

                                <a
                                  class="social-icon social-icon--facebook"
                                  @click="Save(data.id)"
                                >
                                  <i class="fas fa-star"></i>
                                  <div class="tooltip">Save For Future</div>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- InterviewScheduled tab end -->

                  <!-- Offer tab start -->

                  <div id="Offer" class="tab-pane fade">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-5" id="example1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Applied On</th>
                            <th>Experience</th>
                            <th>Current Designation</th>
                            <th>Expected Salary</th>
                            <th>Notice Period</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-if="data.status == '5'"
                            v-for="data in alldata"
                            :key="data.id"
                          >
                            <td>
                              {{ data.fname }}
                              {{ data.lname ? data.lname : "" }}
                              <p>
                                <a
                                  v-if="data.resume !== null"
                                  :href="'resume/' + data.resume"
                                  target="_blank"
                                  download
                                  >Download Resume</a
                                >
                              </p>
                            </td>
                            <td>{{ data.created_at | timeformat }}</td>
                            <td>{{ data.exp_year }} - {{ data.exp_month }}</td>
                            <td>{{ data.designation }}</td>
                            <td>{{ data.expected_salary }}</td>
                            <td>{{ data.notice_period }}</td>
                            <td>
                              <div class="social-icons">
                                <a
                                  class="social-icon social-icon--codepen"
                                  @click="Shortlist(data.id)"
                                >
                                  <i class="fas fa-check"></i>
                                  <div class="tooltip">Shortlist</div>
                                </a>
                                <a
                                  class="social-icon social-icon--github"
                                  @click="Rejected(data.id)"
                                >
                                  <i class="fas fa-times"></i>
                                  <div class="tooltip">Reject</div>
                                </a>
                                <a
                                  class="social-icon social-icon--twitter"
                                  data-toggle="modal"
                                  data-target="#interviewsc"
                                  @click="getInterviewScheduledID(data.id)"
                                >
                                  <i class="fas fa-clock"></i>
                                  <div class="tooltip">Interview Schedule</div>
                                </a>
                                <a
                                  class="social-icon social-icon--dribbble"
                                  @click="Offer(data.id)"
                                >
                                  <i class="fas fa-file-archive"></i>
                                  <div class="tooltip">Offer Letter</div>
                                </a>
                                <a
                                  class="social-icon social-icon--instagram"
                                  @click="Hire(data.id)"
                                >
                                  <i class="fas fa-thumbs-up"></i>
                                  <div class="tooltip">Hire</div>
                                </a>

                                <a
                                  class="social-icon social-icon--facebook"
                                  @click="Save(data.id)"
                                >
                                  <i class="fas fa-star"></i>
                                  <div class="tooltip">Save For Future</div>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- Offer tab end -->

                  <!-- hire tab start -->

                  <div id="Hire" class="tab-pane fade">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-5" id="example1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Applied On</th>
                            <th>Experience</th>
                            <th>Current Designation</th>
                            <th>Expected Salary</th>
                            <th>Notice Period</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-if="data.status == '6'"
                            v-for="data in alldata"
                            :key="data.id"
                          >
                            <td>
                              {{ data.fname }}
                              {{ data.lname ? data.lname : "" }}
                              <p>
                                <a
                                  v-if="data.resume !== null"
                                  :href="'resume/' + data.resume"
                                  target="_blank"
                                  download
                                  >Download Resume</a
                                >
                              </p>
                            </td>
                            <td>{{ data.created_at | timeformat }}</td>
                            <td>{{ data.exp_year }} - {{ data.exp_month }}</td>
                            <td>{{ data.designation }}</td>
                            <td>{{ data.expected_salary }}</td>
                            <td>{{ data.notice_period }}</td>
                            <td>
                              <div class="social-icons">
                                <a
                                  class="social-icon social-icon--codepen"
                                  @click="Shortlist(data.id)"
                                >
                                  <i class="fas fa-check"></i>
                                  <div class="tooltip">Shortlist</div>
                                </a>
                                <a
                                  class="social-icon social-icon--github"
                                  @click="Rejected(data.id)"
                                >
                                  <i class="fas fa-times"></i>
                                  <div class="tooltip">Reject</div>
                                </a>
                                <a
                                  class="social-icon social-icon--twitter"
                                  data-toggle="modal"
                                  data-target="#interviewsc"
                                  @click="getInterviewScheduledID(data.id)"
                                >
                                  <i class="fas fa-clock"></i>
                                  <div class="tooltip">Interview Schedule</div>
                                </a>
                                <a
                                  class="social-icon social-icon--dribbble"
                                  @click="Offer(data.id)"
                                >
                                  <i class="fas fa-file-archive"></i>
                                  <div class="tooltip">Offer Letter</div>
                                </a>
                                <a
                                  class="social-icon social-icon--instagram"
                                  @click="Hire(data.id)"
                                >
                                  <i class="fas fa-thumbs-up"></i>
                                  <div class="tooltip">Hire</div>
                                </a>

                                <a
                                  class="social-icon social-icon--facebook"
                                  @click="Save(data.id)"
                                >
                                  <i class="fas fa-star"></i>
                                  <div class="tooltip">Save For Future</div>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- Hire tab end -->

                  <!-- saveforfuture tab start -->
                  <div id="SaveForFuture" class="tab-pane fade">
                    <div class="table-responsive custom-height">
                      <table class="table custom-table mt-5" id="example1">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Applied On</th>
                            <th>Experience</th>
                            <th>Current Designation</th>
                            <th>Expected Salary</th>
                            <th>Notice Period</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-if="data.status == '7'"
                            v-for="data in alldata"
                            :key="data.id"
                          >
                            <td>
                              {{ data.fname }}
                              {{ data.lname ? data.lname : "" }}
                              <p>
                                <a
                                  v-if="data.resume !== null"
                                  :href="'resume/' + data.resume"
                                  target="_blank"
                                  download
                                  >Download Resume</a
                                >
                              </p>
                            </td>
                            <td>{{ data.created_at | timeformat }}</td>
                            <td>{{ data.exp_year }} - {{ data.exp_month }}</td>
                            <td>{{ data.designation }}</td>
                            <td>{{ data.expected_salary }}</td>
                            <td>{{ data.notice_period }}</td>
                            <td>
                              <div class="social-icons">
                                <a
                                  class="social-icon social-icon--codepen"
                                  @click="Shortlist(data.id)"
                                >
                                  <i class="fas fa-check"></i>
                                  <div class="tooltip">Shortlist</div>
                                </a>
                                <a
                                  class="social-icon social-icon--github"
                                  @click="Rejected(data.id)"
                                >
                                  <i class="fas fa-times"></i>
                                  <div class="tooltip">Reject</div>
                                </a>
                                <a
                                  class="social-icon social-icon--twitter"
                                  data-toggle="modal"
                                  data-target="#interviewsc"
                                  @click="getInterviewScheduledID(data.id)"
                                >
                                  <i class="fas fa-clock"></i>
                                  <div class="tooltip">Interview Schedule</div>
                                </a>
                                <a
                                  class="social-icon social-icon--dribbble"
                                  @click="Offer(data.id)"
                                >
                                  <i class="fas fa-file-archive"></i>
                                  <div class="tooltip">Offer Letter</div>
                                </a>
                                <a
                                  class="social-icon social-icon--instagram"
                                  @click="Hire(data.id)"
                                >
                                  <i class="fas fa-thumbs-up"></i>
                                  <div class="tooltip">Hire</div>
                                </a>

                                <a
                                  class="social-icon social-icon--facebook"
                                  @click="Save(data.id)"
                                >
                                  <i class="fas fa-star"></i>
                                  <div class="tooltip">Save For Future</div>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- SaveForFuture tab end -->
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>

    <!-- Mail Send Model -->
    <div
      class="modal fade sendMailModel"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
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
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- mail send close -->

    <!-- Interview Scheduled -->
    <div class="modal fade" id="interviewsc">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <center>
              <span class="modal-title">
                <h3>Interview Details</h3>
              </span>
            </center>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-div">
              <form
                role="form"
                method="post"
                @submit.prevent="InterviewScheduled"
              >
                <div class="form-group">
                  <label>Choose Date & time</label>
                  <input
                    type="datetime-local"
                    v-model="form.inteviewdate"
                    class="form-control"
                    id="datetime"
                  />
                </div>
                <div class="form-group">
                  <label>Complete Details</label>
                  <ckeditor
                    :editor="editor"
                    v-model="form.editorData"
                  ></ckeditor>
                </div>
                <button
                  type="submit"
                  class="btn btn-warning btn-block mybtn"
                  :class="TempApplyStatus === true ? 'disabled' : ''"
                >
                  {{ TempApplyStatus ? "Scheduling...." : "Schedule" }}
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <main-footer></main-footer>
  </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  name: "Accountexicutive",
  data() {
    return {
      TempApplyStatus: false,
      editor: ClassicEditor,
      interviewScheduledId: "",
      form: new Form({
        inteviewdate: "",
        editorData: "",
      }),
    };
  },
  mounted() {
    this.$store.dispatch(
      "getAllData",
      `/jobs-application/${this.$route.params.jobid}`
    );
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
  },

  methods: {
    getInterviewScheduledID(id) {
      console.log(id);
      this.interviewScheduledId = id;
    },

    InterviewScheduled() {
      if (this.form.inteviewdate == "" && this.form.editorData == "") {
        toast({
          type: "error",
          title: "Please enter information",
        });
      } else {
        this.TempApplyStatus = true;
        axios
          .get("/interview-scheduled", {
            params: {
              id: this.interviewScheduledId,
              interview_schedule_date: this.form.inteviewdate,
              interview_info: this.form.editorData,
            },
          })
          .then(() => {
            this.TempApplyStatus = false;
            this.$store.dispatch(
              "getAllData",
              `/jobs-application/${this.$route.params.jobid}`
            );
            toast({
              type: "success",
              title: "Candidate Interview Scheduled",
            });
          })
          .catch(() => {
            this.TempApplyStatus = false;
          });
      }
    },

    Shortlist(id) {
      axios
        .get("/shortlisted/" + id)
        .then(() => {
          this.$store.dispatch(
            "getAllData",
            `/jobs-application/${this.$route.params.jobid}`
          );
          toast({
            type: "success",
            title: "Candidate Shortlisted",
          });
        })
        .catch(() => {});
    },

    Rejected(id) {
      axios
        .get("/rejected/" + id)
        .then(() => {
          this.$store.dispatch(
            "getAllData",
            `/jobs-application/${this.$route.params.jobid}`
          );
          toast({
            type: "success",
            title: "Candidate Rejected",
          });
        })
        .catch(() => {});
    },

    Offer(id) {
      axios
        .get("/offer/" + id)
        .then(() => {
          this.$store.dispatch(
            "getAllData",
            `/jobs-application/${this.$route.params.jobid}`
          );
          toast({
            type: "success",
            title: "Offer Letter Send",
          });
        })
        .catch(() => {});
    },

    Hire(id) {
      axios
        .get("/hire/" + id)
        .then(() => {
          this.$store.dispatch(
            "getAllData",
            `/jobs-application/${this.$route.params.jobid}`
          );
          toast({
            type: "success",
            title: "Candidate Joining Successfully",
          });
        })
        .catch(() => {});
    },

    Save(id) {
      axios
        .get("/save/" + id)
        .then(() => {
          this.$store.dispatch(
            "getAllData",
            `/jobs-application/${this.$route.params.jobid}`
          );
          toast({
            type: "success",
            title: "Candidate Save or hold successfully",
          });
        })
        .catch(() => {});
    },
  },

  filters: {
    applyJobStatus: function (value) {
      if (!value) return "";
      switch (value) {
        case 1:
          return "Applied";
          break;
        case 2:
          return "Interview Scheduled";
          break;

        case 3:
          return "Shortlisted";
          break;

        case 4:
          return "Rejected";
          break;

        case 5:
          return "Offer Letter";
          break;

        case 6:
          return "Joining";
          break;

        case 7:
          return "Save / Hold";
          break;

        default:
          return "N/A";
          break;
      }
    },
  },
};
</script>

<style scoped>
.social-icons {
  display: flex;
  padding: 5px;
}
.social-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  width: 32px;
  height: 32px;
  background-color: #f95602;
  margin: 0 0.2rem;
  border-radius: 50%;
  cursor: pointer;
  font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
  font-size: 2.5rem;
  text-decoration: none;
  transition: all 0.15s ease;
}
.social-icon:hover {
  color: #fff;
}
.social-icon:hover .tooltip {
  visibility: visible;
  opacity: 1;
  transform: translate(-50%, -150%);
}
.social-icon:active {
  box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5) inset;
}
.social-icon--linkedin {
  color: #fff;
}
.social-icon--linkedin .tooltip {
  background: #000000;
  color: #fff;
}
.social-icon--linkedin .tooltip:after {
  border-top-color: #000;
}
.social-icon--twitter {
  color: #fff;
}
.social-icon--twitter .tooltip {
  background: #000000;
  color: #fff;
}
.social-icon--twitter .tooltip:after {
  border-top-color: #000;
}
.social-icon--codepen {
  color: #fff;
}
.social-icon--codepen .tooltip {
  background: #000000;
  color: #fff;
}
.social-icon--codepen .tooltip:after {
  border-top-color: #000;
}
.social-icon--facebook {
  color: #fff;
}
.social-icon--facebook .tooltip {
  background: #000000;
  color: #fff;
}
.social-icon--facebook .tooltip:after {
  border-top-color: #000;
}
.social-icon--instagram {
  color: #fff;
}
.social-icon--instagram .tooltip {
  background: #000000;
  color: #fff;
}
.social-icon--instagram .tooltip:after {
  border-top-color: #000;
}
.social-icon--dribbble {
  color: #fff;
}
.social-icon--dribbble .tooltip {
  background: #000000;
  color: #fff;
}
.social-icon--dribbble .tooltip:after {
  border-top-color: #000;
}
.social-icon--github {
  color: #fff;
}
.social-icon--github .tooltip {
  background: #000000;
  color: #fff;
}
.social-icon--github .tooltip:after {
  border-top-color: #000;
}
.social-icon i {
  position: relative;
  top: 1px;
  border: 0;
  font-size: 17px;
  color: #fff;
  line-height: 57px;
}
/* Tooltips */
.tooltip {
  display: block;
  position: absolute;
  top: 14px;
  left: 50%;
  padding: 0.3rem 0.5rem;
  border-radius: 40px;
  font-size: 12px;
  font-weight: bold;
  opacity: 0;
  pointer-events: none;
  text-transform: uppercase;
  -webkit-transform: translate(-50%, -100%);
  transform: translate(-50%, -100%);
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  z-index: 1;
}
.tooltip:after {
  display: block;
  position: absolute;
  bottom: 1px;
  left: 50%;
  width: 0;
  height: 0;
  content: "";
  border: solid;
  border-width: 10px 10px 0 10px;
  border-color: transparent;
  transform: translate(-50%, 100%);
}
</style>