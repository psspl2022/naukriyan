<!--suppress ALL -->
<template>
  <div id="userinfo">
    <jobseeker-header></jobseeker-header>
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
                  <li><a href="#">Jobseeker Dashboard</a></li>
                  <li class="active">User Info</li>
                </ol>
              </div>
              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line">
                  <i
                    class="fa fa-headphones mr-1 Phone is-animating"
                    aria-hidden="true"
                  ></i>
                  <a href="tel:+91 11 7962 6411">Hot Line: +91 11 7962 6411</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section pb-5 top-adjust pt-0 mt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="interview mt-4">
              <h2 class="interview">Edit Profile</h2>
            </div>
          </div>
          <div class="col-sm-6">
            <profile-percentage></profile-percentage>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="card profile-card layout-fixed" id="profile-widget">
              <div class="card-header pb-0">
                <h4>Quick Links</h4>
              </div>
              <div class="card-body pt-0">
                <ul class="collection">
                  <li
                    class="collection-item"
                    id="pe"
                    @click="changeTabmode('pe')"
                    :class="tabValue === 'pe' ? 'tab-active' : ''"
                  >
                    <router-link :to="`/userinfo/pe`">
                      <span class="text">Personal / Resume</span>
                      <i class="fas fa-user-lock quick-i"></i>
                    </router-link>
                  </li>
                  <li
                    class="collection-item"
                    id="ed"
                    @click="changeTabmode('ed')"
                    :class="tabValue === 'ed' ? 'tab-active' : ''"
                  >
                    <router-link :to="`/userinfo/ed`">
                      <span class="text"
                        >Educational / Certificates / Skills</span
                      ><i class="fas fa-graduation-cap quick-i"></i>
                    </router-link>
                  </li>
                  <li
                    class="collection-item"
                    id="pr"
                    @click="changeTabmode('pr')"
                    v-if="form.candidate_type == 'experienced'"
                    :class="tabValue === 'pr' ? 'tab-active' : ''"
                  >
                    <router-link :to="`/userinfo/pr`">
                      <span class="text">Professional / Others</span
                      ><i class="fas fa-user-tie quick-i"></i>
                    </router-link>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Image Upload -->

            <!-- candidate resume-->
            <div class="resume-card mt-3">
              <center><h4>Resume</h4></center>
              <div class="candidate-resume">
                <p>- Uploaded on {{ getHumanDate(form.resume_upload_date) }}</p>
                <a
                  :href="'resume/' + form.resume"
                  target="_blank"
                  v-if="form.resume"
                  ><button class="btn btn-primary">
                    Download resume <i class="fas fa-download"></i></button
                ></a>
                <p class="mt-3">
                  <input
                    type="file"
                    @change="onFileChanged"
                    accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    id="file"
                    class="custom-file-input-re"
                  />
                </p>
                <p v-if="progress">
                  <b>Upload Percentage</b> -
                  <span class="btn btn-success btn-sm">{{ progress }} %</span>
                </p>
                <p>
                  <button @click="onUpload" ref="myBtn" style="display: none">
                    Upload!
                  </button>
                  <i class="fa fa-info-circle"></i
                  ><em> Only Pdf and Docx files are allowed.</em>
                </p>
              </div>
            </div>
            <!--youtube resume-->
            <div class="video-resume mt-4" v-if="form.resume_video_link">
              <center><h4>Video resume</h4></center>
              <video-embed
                css="embed-responsive-4by3"
                :src="`${form.resume_video_link}`"
              ></video-embed>
            </div>
          </div>

          <div class="col-sm-9">
            <div
              class="card profile-card"
              id="Personal"
              :class="tabValue === 'pe' ? 'show-form' : 'hide-form'"
            >
              <div class="card-header">
                <h4>Personal Information</h4>
              </div>
              {{ editData }}

              <div class="card-body pt-0">
                <div class="profile-pic col-sm-3">
                  <label for="file-input">
                    <img
                      id="previewImg"
                      :src="
                        '/jobseeker_profile_image/' + form.profile_pic_thumb
                      "
                      style="
                        width: 150px;
                        height: 150px;
                        border: 1px solid orange;
                      "
                      v-if="form.profile_pic_thumb"
                    />
                    <img
                      id="previewImg"
                      src="default_images/no_image_available.png"
                      style="
                        width: 150px;
                        height: 150px;
                        border: 1px solid orange;
                      "
                      v-else
                    />
                    <i class="fas fa-camera" id="cam"></i>
                  </label>
                  <input
                    id="file-input"
                    type="file"
                    accept="image/*"
                    @change="onProfileChanged"
                    style="display: none"
                  />
                  <button
                    @click="onUploadImg"
                    ref="myBtnImg"
                    style="display: none"
                  >
                    Upload!
                  </button>
                </div>

                <form
                  action=""
                  method="post"
                  class="p-2"
                  role="form"
                  @submit.prevent="addPersonalDetail($event)"
                >
                  <div class="form-group input-group row">
                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >First Name<span style="color: red"> * </span></label
                      >
                      <div class="input-group-prepend">
                        <span class="input-group-text"
                          ><i class="fas fa-user"></i
                        ></span>
                        <input
                          type="text"
                          name="fname"
                          v-model="form.fname"
                          class="form-control"
                          placeholder="Enter your first name"
                        />
                      </div>
                      <has-error :form="form" field="fname"></has-error>
                    </div>
                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >Last Name<span style="color: red"> * </span></label
                      >
                      <div class="input-group-prepend">
                        <span class="input-group-text"
                          ><i class="fas fa-user"></i
                        ></span>
                        <input
                          type="text"
                          name="lname"
                          v-model="form.lname"
                          class="form-control"
                          placeholder="Enter your last name"
                        />
                      </div>
                      <has-error :form="form" field="lname"></has-error>
                    </div>
                  </div>

                  <div class="form-group input-group row">
                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >Your Email<span style="color: red"> * </span></label
                      >
                      <div class="input-group-prepend">
                        <span class="input-group-text"
                          ><i class="fas fa-envelope"></i
                        ></span>
                        <input
                          type="email"
                          name="email"
                          v-model="form.email"
                          class="form-control"
                          placeholder="Enter your email"
                          disabled=""
                        />
                      </div>
                      <has-error :form="form" field="email"></has-error>
                    </div>
                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >Your Contact Number<span style="color: red">
                          *
                        </span></label
                      >
                      <div class="input-group-prepend">
                        <span class="input-group-text"
                          ><i class="fas fa-phone"></i
                        ></span>
                        <input
                          type="number"
                          name="contact"
                          v-model="form.contact"
                          class="form-control"
                          placeholder="Enter your Contact No."
                        />
                      </div>
                      <has-error :form="form" field="contact"></has-error>
                    </div>
                  </div>
                  <div class="form-group input-group row">
                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >Date of Birth<span style="color: red"> * </span></label
                      >
                      <div class="input-group-prepend">
                        <span class="input-group-text"
                          ><i class="fas fa-calendar"></i
                        ></span>
                        <input
                          type="date"
                          name="dob"
                          v-model="form.dob"
                          class="form-control datepicker"
                          placeholder="Enter your DOB"
                          :max="disablefutureDate()"
                        />
                      </div>
                      <has-error :form="form" field="dob"></has-error>
                    </div>
                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >Gender<span style="color: red"> * </span></label
                      >
                      <div class="input-group-prepend">
                        <span class="input-group-text"
                          ><i class="fas fa-user-check"></i
                        ></span>
                        <select
                          class="form-control"
                          name="gender"
                          v-model="form.gender"
                        >
                          <option>Select Gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="other">Others</option>
                        </select>
                      </div>
                    </div>
                    <has-error :form="form" field="gender"></has-error>
                  </div>

                  <div class="form-group inputBox row">
                    <div class="col-sm-6">
                            <label>Preffered Location </label>
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                          ><i class="fas fa-location-arrow"></i
                        ></span>
                        <select   
                          class="form-control"
                          v-model="form.preffered_location"
                        >
                        <option value="" disabled="">Select Preffered Location</option>
                          <optgroup
                            :label="st.state"
                            v-for="(st, index) in location"
                            :key="index"
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
                      </div>
                      
                            <has-error
                              :form="form"
                              field="preffered_location"
                            ></has-error>
                          </div>
                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >I am a <span style="color: red"> * </span></label
                      >

                      <div class="input-group-prepend">
                        <span class="input-group-text"
                          ><i class="fas fa-chart-bar"></i
                        ></span>
                        <select
                          class="form-control"
                          :class="{
                            'is-invalid': form.errors.has('candidate_type'),
                          }"
                          name="form.candidate_type"
                          v-model="form.candidate_type"
                          v-on:change="checkCandidateType($event)"
                        >
                          <option value="" disabled="disabled">
                            Select One
                          </option>
                          <option value="fresher">Fresher</option>
                          <option value="experienced">Experienced</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group input-group row">
                    <div class="col-sm-12">
                      <label class="col-form-label">Your Address</label>
                      <div class="input-group-prepend">
                        <span class="input-group-text"
                          ><i class="fas fa-users"></i
                        ></span>
                        <textarea
                          type="text"
                          name="address"
                          v-model="form.address"
                          class="form-control"
                          placeholder="Enter Address Here"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- <div v-if="uploadstatus">Please wait......</div>
                  <div class="form-group input-group row">
                    <label>Profile Image</label>
                    <div class="col-sm-12">
                      <input
                        type="file"
                        @change="changePhoto($event)"
                        class="custom-file-input"
                        name="pic"
                        accept="image/*"
                      />
                      <label class="custom-file-label" for="customFile"
                        >Choose Image(Only jpg/jpeg/png)</label
                      >
                      <has-error :form="form" field="photograph"></has-error>
                    </div>
                  </div> -->

                  <div class="form-group input-group row">
                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >Resume Video Link (Only YouTube)(<a href="#"
                          >How To Create ?</a
                        >)</label
                      >
                      <div class="input-group-prepend">
                        <input
                          type="text"
                          name="resume_video_link"
                          v-model="form.resume_video_link"
                          class="form-control"
                          placeholder="Enter your video resume link"
                        />
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label class="col-form-label"
                        >Resume Link (Only LinkedIn)</label
                      >
                      <div class="input-group-prepend">
                        <input
                          type="text"
                          name="linkedin_resume_link"
                          v-model="form.linkedin_resume_link"
                          class="form-control"
                          placeholder="Enter resume link"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button
                      type="submit"
                      class="btn btn-primary btn-block"
                      :disabled="uploadstatus"
                    >
                      {{ infoSaveStatus ? "Submitting..." : "Save and next" }}
                    </button>
                  </div>
                </form>
                <span style="color: red">( * )</span> - All Fields are
                mandatory.
              </div>
            </div>

            <div
              class="card profile-card"
              id="Educational"
              :class="tabValue === 'ed' ? 'show-form' : 'hide-form'"
            >
              <!-- for tabs start -->
              <div class="card-header">
                <h4>Multiple Stages Are Below</h4>
                <div id="tabs" class="container">
                  <div class="tabs text-center mt-3">
                    <a
                      v-on:click="activetab = 1"
                      v-bind:class="[activetab === 1 ? 'active' : '']"
                      >Education</a
                    >
                    <a
                      v-on:click="activetab = 2"
                      v-bind:class="[activetab === 2 ? 'active' : '']"
                      >Skills</a
                    >
                    <a
                      v-on:click="activetab = 3"
                      v-bind:class="[activetab === 3 ? 'active' : '']"
                      >Certificates</a
                    >
                  </div>

                  <div class="content">
                    <div v-if="activetab === 1" class="tabcontent">
                      <div class="card-header">
                        <h4>
                          Educational Information<span class="text-muted"
                            >(You Can add multiple educational information
                            here).</span
                          >
                        </h4>
                      </div>
                      <div class="card-header">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>SN#</th>
                              <th>Qualification</th>
                              <th>Degree</th>
                              <th>Institute Name</th>
                              <th>Passing year</th>
                              <th>CGPA</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr
                              v-for="(
                                educationalDetail, index
                              ) in educationalDetails"
                              :key="educationalDetail.id"
                            >
                              <td>{{ index + 1 }}</td>
                              <td>
                                {{
                                  educationalDetail.qualification | capitalize
                                }}
                              </td>
                              <td>{{ educationalDetail.degree_name }}</td>
                              <td>
                                {{
                                  educationalDetail.institute_name | capitalize
                                }}
                              </td>
                              <td>{{ educationalDetail.passing_year }}</td>
                              <td>{{ educationalDetail.percentage_grade }}</td>
                              <td>
                                <a
                                  href="javascript.void(0)"
                                  @click.prevent="
                                    deleteEducationalDetail(
                                      educationalDetail.id
                                    )
                                  "
                                  class="badge badge-danger skill-del-btn"
                                  >Delete</a
                                >
                                <a
                                  href="javascript.void(0)"
                                  @click.prevent="
                                    editEducationalDetail(educationalDetail.id)
                                  "
                                  class="badge badge-warning skill-del-btn"
                                  data-backdrop="static"
                                  data-keyboard="false"
                                  data-toggle="modal"
                                  data-target=".editEducationalInfo"
                                  >Edit</a
                                >
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="card-body pt-0">
                        <p class="info_heading">
                          Add Additional Education Information
                        </p>
                        <form
                          action=""
                          role="form"
                          method="post"
                          class="p-2"
                          @submit.prevent="addEducationDetail()"
                        >
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Educational Qualification</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-graduation-cap"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="education"
                                  v-model="educationForm.education"
                                  required
                                >
                                  <option disabled>Select Education</option>
                                  <option
                                    :value="education.id"
                                    v-for="education in allQualification"
                                    :key="education"
                                  >
                                    {{ education.qualification }}
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Degree/Stream Name</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-graduation-cap"></i
                                ></span>
                                <input
                                  type="text"
                                  name="degree_name"
                                  v-model="educationForm.degree_name"
                                  class="form-control"
                                  placeholder="Enter your Degree name"
                                  required
                                />
                              </div>
                            </div>
                          </div>
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >CGPA/Percentage</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-percentage"></i
                                ></span>
                                <input
                                  type="text"
                                  name="percentage_grade"
                                  v-model="educationForm.percentage_grade"
                                  class="form-control"
                                  placeholder="CGPA/Percentage"
                                />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Institute Name</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-building"></i
                                ></span>
                                <input
                                  type="text"
                                  name="institute_name"
                                  v-model="educationForm.institute_name"
                                  class="form-control"
                                  placeholder="Enter your Institute name"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label">Passing Year</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-calendar"></i
                                ></span>
                                <input
                                  type="text"
                                  name="passing_year"
                                  v-model="educationForm.passing_year"
                                  class="form-control"
                                  placeholder="Enter your passing out year"
                                />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Institute Location</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-calendar"></i
                                ></span>
                                <input
                                  type="text"
                                  name="institute_location"
                                  v-model="educationForm.institute_location"
                                  class="form-control"
                                  placeholder="Enter institute location"
                                />
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <button
                              type="submit"
                              class="btn btn-primary btn-block"
                            >
                              {{
                                infoSaveStatus ? "Saving..." : "Save and Next"
                              }}
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div v-if="activetab === 2" class="tabcontent">
                      <div class="card-header">
                        <h4>Skills Information</h4>
                      </div>
                      <div class="card-body pt-0">
                        <div class="col-md-12">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>SN#</th>
                                <th>Skill</th>
                                <th>Expert Level</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <thead>
                              <tr
                                v-for="(item, index) in skillInfo"
                                :key="index"
                              >
                                <td>{{ index + 1 }}</td>
                                <td>{{ item.skill | capitalize }}</td>
                                <td>{{ item.expert_level | capitalize }}</td>
                                <td>
                                  <a
                                    href="javascript.void(0)"
                                    @click.prevent="deleteSkillInfo(item.id)"
                                    class="badge badge-danger skill-del-btn"
                                    >Delete</a
                                  >
                                  <a
                                    href="javascript.void(0)"
                                    @click.prevent="editSkillInfo(item.id)"
                                    class="badge badge-warning skill-del-btn"
                                    data-backdrop="static"
                                    data-keyboard="false"
                                    data-toggle="modal"
                                    data-target=".editSkills"
                                    >Edit</a
                                  >
                                </td>
                              </tr>
                            </thead>
                          </table>

                          <!-- Edit Skill Model -->
                          <div
                            class="modal fade editSkills"
                            id="myModal"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="myModalLabel"
                          >
                            <div class="modal-dialog" role="document">
                              <form action="">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button
                                      type="button"
                                      class="close"
                                      data-dismiss="modal"
                                      aria-label="Close"
                                    >
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="col-md-12" v-if="errors">
                                      <p class="alert alert-danger">
                                        {{ errors }}
                                      </p>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label for="skills">Your Skill</label>
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i
                                              class="fas fa-graduation-cap"
                                            ></i
                                          ></span>
                                          <input
                                            v-model="editSkillInformation.skill"
                                            type="text"
                                            name="skill"
                                            class="form-control"
                                            placeholder="Enter your Skill"
                                          />
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="expert"
                                          >Your Expert Level</label
                                        >
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i class="fas fa-chart-line"></i
                                          ></span>
                                          <select
                                            class="form-control"
                                            name="skill_level"
                                            v-model="
                                              editSkillInformation.expert_level
                                            "
                                          >
                                            <option value="" disabled="">
                                              Select Expert Level
                                            </option>
                                            <option
                                              value="beginner"
                                              :selected="
                                                editSkillInformation.expert_level ===
                                                'beginner'
                                                  ? true
                                                  : false
                                              "
                                            >
                                              Beginners
                                            </option>
                                            <option
                                              value="moderate"
                                              :selected="
                                                editSkillInformation.expert_level ===
                                                'moderate'
                                                  ? true
                                                  : false
                                              "
                                            >
                                              Moderate
                                            </option>
                                            <option
                                              value="expert"
                                              :selected="
                                                editSkillInformation.expert_level ===
                                                'expert'
                                                  ? true
                                                  : false
                                              "
                                            >
                                              Expert
                                            </option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button
                                      type="button"
                                      class="btn btn-default"
                                      data-dismiss="modal"
                                    >
                                      Close
                                    </button>
                                    <button
                                      type="button"
                                      class="btn btn-primary"
                                      @click.prevent="
                                        updateSkillInfo(editSkillInformation.id)
                                      "
                                    >
                                      Save changes
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <form
                          action=""
                          method="post"
                          class="p-2"
                          @submit.prevent="addSkillInformation()"
                        >
                          <div class="col-md-12" v-if="errors">
                            <p class="alert alert-danger">{{ errors }}</p>
                          </div>
                          <div
                            class="form-group input-group row"
                            v-for="(input, index) in inputs"
                            :key="index"
                          >
                            <div class="col-sm-6">
                              <label for="skills">Your Skill</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-graduation-cap"></i
                                ></span>
                                <input
                                  type="text"
                                  name="skill"
                                  class="form-control"
                                  placeholder="Enter your Skill"
                                  v-model="input.skill"
                                  required
                                />
                              </div>
                            </div>

                            <div class="col-sm-6">
                              <label for="skills">Your Expert Level</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-chart-line"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="skill_level"
                                  v-model="input.skill_level"
                                >
                                  <option value="" disabled="">
                                    Select Expert Level
                                  </option>
                                  <option value="beginner">Beginners</option>
                                  <option value="moderate">Moderate</option>
                                  <option value="expert">Expert</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group text-center">
                            <input
                              type="button"
                              name="submit"
                              class="btn btn-primary"
                              @click="addItem"
                              value="Add"
                            />
                            <input
                              type="button"
                              name="submit"
                              class="btn btn-secondary"
                              @click="deleteRow()"
                              value="Remove"
                            />
                          </div>

                          <div class="form-group">
                            <button
                              type="submit"
                              class="btn btn-primary btn-block"
                            >
                              {{ infoSaveStatus ? "Saving..." : "Save" }}
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div v-if="activetab === 3" class="tabcontent">
                      <div class="card-header">
                        <h4>
                          Certificates Information
                          <span class="text-muted"
                            >(You Can add Multiple Certification Here).</span
                          >
                        </h4>
                      </div>
                      <div class="card-header">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>SN#</th>
                              <th>Course</th>
                              <th>Institute</th>
                              <th>Passing Year(From - To)</th>
                              <th>Certification Type</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr
                              v-for="(certInfo, index) in certInfos"
                              :key="index"
                            >
                              <td>{{ index + 1 }}</td>
                              <td>{{ certInfo.course | capitalize }}</td>
                              <td>
                                {{
                                  certInfo.certificate_institute_name
                                    | capitalize
                                }}
                              </td>
                              <td>
                                {{ certInfo.cert_from_date }} ||
                                {{ certInfo.cert_to_date }}
                              </td>
                              <td>
                                {{ certInfo.certification_type | capitalize }}
                              </td>
                              <td>
                                <a
                                  href="javascript.void(0)"
                                  @click.prevent="
                                    deleteCertificate(certInfo.id)
                                  "
                                  class="badge badge-danger skill-del-btn"
                                  >Delete</a
                                >
                                <a
                                  href="javascript.void(0)"
                                  @click.prevent="editCertificate(certInfo.id)"
                                  class="badge badge-warning skill-del-btn"
                                  data-backdrop="static"
                                  data-keyboard="false"
                                  data-toggle="modal"
                                  data-target=".editCertificate"
                                  >Edit</a
                                >
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <!-- Edit Certificate Model -->
                      <div
                        class="modal fade editCertificate"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="myModalLabel"
                      >
                        <div class="modal-dialog" role="document">
                          <form action="">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button
                                  type="button"
                                  class="close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                >
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <p class="modal-title">Modal title</p>
                              </div>
                              <div class="modal-body">
                                <div class="col-md-12" v-if="errors">
                                  <p class="alert alert-danger">{{ errors }}</p>
                                </div>
                                <div class="col-md-12">
                                  <form action="" method="post">
                                    <div class="form-group input-group row">
                                      <div class="col-sm-6">
                                        <label class="col-form-label"
                                          >Course Name</label
                                        >
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i class="fas fa-user"></i
                                          ></span>
                                          <input
                                            type="text"
                                            name="course"
                                            v-model="editCertInfo.course"
                                            class="form-control"
                                            placeholder="Enter your course"
                                            required
                                          />
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <label class="col-form-label"
                                          >Institute Name</label
                                        >
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i class="fas fa-building"></i
                                          ></span>
                                          <input
                                            type="text"
                                            name="certificate_institute_name"
                                            v-model="
                                              editCertInfo.certificate_institute_name
                                            "
                                            class="form-control"
                                            placeholder="Enter your Institute name"
                                            required
                                          />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group input-group row">
                                      <div class="col-sm-6">
                                        <label class="col-form-label"
                                          >Certification Type</label
                                        >
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i class="fas fa-user"></i
                                          ></span>
                                          <select
                                            class="form-control"
                                            name="certification_type"
                                            v-model="
                                              editCertInfo.certification_type
                                            "
                                          >
                                            <option>
                                              Select Certification type
                                            </option>
                                            <option value="parttime">
                                              Part Time
                                            </option>
                                            <option value="fulltime">
                                              Full Time
                                            </option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <label class="col-form-label"
                                          >Grade/Score</label
                                        >
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i class="fas fa-times-circle"></i
                                          ></span>
                                          <input
                                            type="text"
                                            name="grade"
                                            v-model="editCertInfo.grade"
                                            class="form-control"
                                            placeholder="Enter your Grade/Score"
                                          />
                                        </div>
                                      </div>
                                    </div>

                                    <div class="form-group input-group row">
                                      <div class="col-sm-6">
                                        <label class="col-form-label"
                                          >From</label
                                        >
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i class="fas fa-calendar"></i
                                          ></span>
                                          <input
                                            type="date"
                                            name="cert_from_date"
                                            v-model="
                                              editCertInfo.cert_from_date
                                            "
                                            class="form-control datepicker"
                                            placeholder="From"
                                          />
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <label class="col-form-label">To</label>
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i class="fas fa-calendar"></i
                                          ></span>
                                          <input
                                            type="date"
                                            name="cert_to_date"
                                            v-model="editCertInfo.cert_to_date"
                                            class="form-control"
                                            placeholder="To"
                                            :max="disablefutureDate()"
                                          />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group input-group row">
                                      <div class="col-sm-12">
                                        <label class="col-form-label"
                                          >Description</label
                                        >
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"
                                            ><i class="fas fa-users"></i
                                          ></span>
                                          <textarea
                                            type="text"
                                            name="description"
                                            v-model="editCertInfo.description"
                                            class="form-control"
                                            placeholder="Description"
                                          ></textarea>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button
                                  type="button"
                                  class="btn btn-default"
                                  data-dismiss="modal"
                                >
                                  Close
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-primary"
                                  @click.prevent="
                                    updateCertInfo(editCertInfo.id)
                                  "
                                >
                                  Save changes
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <div class="card-body pt-0">
                        <p class="info_heading">Add Additional Certification</p>
                        <form
                          action=""
                          role="form"
                          method="post"
                          class="p-2"
                          @submit.prevent="addCertificationDetail()"
                        >
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label">Course Name</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-user"></i
                                ></span>
                                <input
                                  type="text"
                                  name="course"
                                  v-model="certForm.course"
                                  class="form-control"
                                  placeholder="Enter your course"
                                  required
                                />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Institute Name</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-building"></i
                                ></span>
                                <input
                                  type="text"
                                  name="certificate_institute_name"
                                  v-model="certForm.certificate_institute_name"
                                  class="form-control"
                                  placeholder="Enter your Institute name"
                                  required
                                />
                              </div>
                            </div>
                          </div>
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Certification Type</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-user"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="certification_type"
                                  v-model="certForm.certification_type"
                                >
                                  <option>Select Certification type</option>
                                  <option value="parttime">Part Time</option>
                                  <option value="fulltime">Full Time</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label">Grade/Score</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-times-circle"></i
                                ></span>
                                <input
                                  type="text"
                                  name="grade"
                                  v-model="certForm.grade"
                                  class="form-control"
                                  placeholder="Enter your Grade/Score"
                                />
                              </div>
                            </div>
                          </div>

                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label">From</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-calendar"></i
                                ></span>
                                <input
                                  type="date"
                                  name="cert_from_date"
                                  v-model="certForm.cert_from_date"
                                  class="form-control datepicker"
                                  placeholder="From"
                                />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label">To</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-calendar"></i
                                ></span>
                                <input
                                  type="date"
                                  name="cert_to_date"
                                  v-model="certForm.cert_to_date"
                                  class="form-control"
                                  placeholder="To"
                                  :max="disablefutureDate()"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="form-group input-group row">
                            <div class="col-sm-12">
                              <label class="col-form-label">Description</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-users"></i
                                ></span>
                                <textarea
                                  type="text"
                                  name="description"
                                  v-model="certForm.description"
                                  class="form-control"
                                  placeholder="Description"
                                ></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <button
                              type="submit"
                              class="btn btn-primary btn-block"
                            >
                              {{ infoSaveStatus ? "Saving..." : "Save" }}
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Edit Educational Model -->
            <div
              class="modal fade editEducationalInfo editEducationalModel"
              tabindex="-1"
              role="dialog"
              aria-labelledby="myModalLabel"
            >
              <div class="modal-dialog" role="document">
                <form action="" method="post">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                      >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row education">
                        <div class="col-md-6">
                          <label class="col-form-label"
                            >Educational Qualification</label
                          >
                          <select
                            class="form-control"
                            name="education"
                            required
                            v-model="editEducationalInfo.education"
                          >
                            <option disabled>Select Education</option>
                            <option
                              :value="education.id"
                              v-for="education in allQualification"
                              :key="education.id"
                            >
                              {{ education.qualification }}
                            </option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="col-form-label"
                            >Degree/Stream name</label
                          >
                          <input
                            type="text"
                            name="degree_name"
                            v-model="editEducationalInfo.degree_name"
                            class="form-control"
                            placeholder="Enter your Degree name"
                            required
                          />
                        </div>
                        <div class="col-md-6">
                          <label class="col-form-label">CGPA/Percentage</label>
                          <input
                            type="text"
                            name="percentage_grade"
                            v-model="editEducationalInfo.percentage_grade"
                            class="form-control"
                            placeholder="CGPA/Percentage"
                          />
                        </div>
                        <div class="col-md-6">
                          <label class="col-form-label">Passing Year</label>
                          <input
                            type="text"
                            name="passing_year"
                            v-model="editEducationalInfo.passing_year"
                            class="form-control"
                            placeholder="Enter your passing out year"
                          />
                        </div>
                        <div class="col-md-12">
                          <label class="col-form-label">Institute Name</label>
                          <input
                            type="text"
                            name="institute_name"
                            v-model="editEducationalInfo.institute_name"
                            class="form-control"
                            placeholder="Enter your Institute name"
                          />
                        </div>
                        <div class="col-md-12">
                          <label class="col-form-label"
                            >Institute Location</label
                          >
                          <input
                            type="text"
                            name="institute_location"
                            v-model="editEducationalInfo.institute_location"
                            class="form-control"
                            placeholder="Enter Institute location"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                      >
                        Close
                      </button>
                      <button
                        type="button"
                        class="btn btn-primary"
                        @click.prevent="
                          updateEducationalInfo(editEducationalInfo.id)
                        "
                      >
                        Save changes
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div
              class="card profile-card"
              id="Professional"
              :class="tabValue === 'pr' ? 'show-form' : 'hide-form'"
            >
              <div id="tabs" class="tabs text-center mt-3">
                <h4 class="ml-5">Multiple Stages Are Below</h4>
                <div class="tabs">
                  <a
                    v-on:click="activetab = 1"
                    v-bind:class="[activetab === 1 ? 'active' : '']"
                    >Professional Tab</a
                  >
                  <a
                    v-on:click="activetab = 2"
                    v-bind:class="[activetab === 2 ? 'active' : '']"
                    >Others</a
                  >
                </div>

                <div class="content">
                  <div v-if="activetab === 1" class="tabcontent">
                    <div class="card-header">
                      <h4>
                        Professional Information
                        <span class="text-muted"
                          >(You Can add Multiple Professional experience
                          here).</span
                        >
                      </h4>
                    </div>
                    <div class="card-header">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>SN#</th>
                            <th>Designation</th>
                            <th>Organization</th>
                            <th>Job Type</th>
                            <th>Industry Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="(
                              professionalDetail, index
                            ) in professionalDetails"
                            :key="professionalDetail.id"
                          >
                            <td>{{ index + 1 }}</td>
                            <td>{{ professionalDetail.designations }}</td>
                            <td>{{ professionalDetail.designations }}</td>
                            <td>{{ professionalDetail.job_type }}</td>
                            <td>{{ professionalDetail.industry_name }}</td>
                            <td>{{ professionalDetail.from_date }}</td>
                            <td>{{ professionalDetail.to_date }}</td>
                            <td>
                              <a
                                href="javascript.void(0)"
                                @click.prevent="
                                  deleteProfessionalDetail(
                                    professionalDetail.id
                                  )
                                "
                                class="badge badge-danger skill-del-btn"
                                >Delete</a
                              >
                              <a
                                href="javascript.void(0)"
                                @click.prevent="
                                  editProfessionalDetail(professionalDetail.id)
                                "
                                class="badge badge-warning skill-del-btn"
                                data-backdrop="static"
                                data-keyboard="false"
                                data-toggle="modal"
                                data-target=".editProfessional"
                                >Edit</a
                              >
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <!-- Edit Professional Model -->
                    <div
                      class="modal fade editProfessional editProfessionalModel"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="myModalLabel"
                    >
                      <div class="modal-dialog" role="document">
                        <form action="" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                              >
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <p class="modal-title">
                                Edit Professional Detail
                              </p>
                            </div>
                            <div class="modal-body">
                              <div class="col-md-12" v-if="errors">
                                <p class="alert alert-danger">{{ errors }}</p>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group input-group row">
                                  <div class="col-sm-6">
                                    <label class="col-form-label"
                                      >Your Designation</label
                                    >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-user"></i
                                      ></span>
                                      <input
                                        type="text"
                                        name="designation"
                                        v-model="professionalForm.designation"
                                        class="form-control"
                                        placeholder="Enter your designation"
                                      />
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <label class="col-form-label"
                                      >Organization Name</label
                                    >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-building"></i
                                      ></span>
                                      <input
                                        type="text"
                                        name="organisation"
                                        v-model="professionalForm.organisation"
                                        class="form-control"
                                        placeholder="Enter your organization name"
                                      />
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group input-group row">
                                  <div class="col-sm-6">
                                    <label class="col-form-label"
                                      >Job Type</label
                                    >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-user"></i
                                      ></span>
                                      <select
                                        class="form-control"
                                        name="job_type"
                                        v-model="professionalForm.job_type"
                                      >
                                        <option value="" disabled="">
                                          Select Job type
                                        </option>
                                        <option
                                          :value="jt.id"
                                          v-for="jt in allJobtype"
                                          :key="jt.id"
                                        >
                                          {{ jt.job_type }}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <label class="col-form-label"
                                      >Job Shift</label
                                    >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-times-circle"></i
                                      ></span>
                                      <select
                                        class="form-control"
                                        name="job_shift"
                                        v-model="professionalForm.job_shift"
                                      >
                                        <option value="" disabled="">
                                          Select time
                                        </option>
                                        <option
                                          :value="js.id"
                                          v-for="js in allJobshift"
                                          :key="js.id"
                                        >
                                          {{ js.job_shift }}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group input-group row">
                                  <div class="col-sm-6">
                                    <label class="col-form-label"
                                      >Your Industry</label
                                    >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-building"></i
                                      ></span>
                                      <select
                                        class="form-control"
                                        name="industry_name"
                                        v-model="professionalForm.industry_name"
                                      >
                                        <option value="" disabled="">
                                          Select Industry
                                        </option>
                                        <option
                                          :value="ind.id"
                                          v-for="ind in allIndustry"
                                          :key="ind.id"
                                        >
                                          {{ ind.category_name }}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <label class="col-form-label"
                                      >Functional Area</label
                                    >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-window-restore"></i
                                      ></span>
                                      <select
                                        class="form-control"
                                        name="functional_role"
                                        v-model="
                                          professionalForm.functional_role
                                        "
                                      >
                                        <option value="" disabled="">
                                          Functional area
                                        </option>
                                        <option
                                          :value="fr.id"
                                          v-for="fr in allDesignation"
                                          :key="fr.id"
                                        >
                                          {{ fr.subcategory_name }}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group input-group row">
                                  <div class="col-sm-6">
                                    <label class="col-form-label">From</label>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-calendar"></i
                                      ></span>
                                      <input
                                        type="date"
                                        name="from_date"
                                        v-model="professionalForm.from_date"
                                        class="form-control datepicker"
                                        placeholder="From"
                                      />
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <label class="col-form-label">To</label>
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-calendar"></i
                                      ></span>
                                      <input
                                        type="date"
                                        name="to_date"
                                        v-model="professionalForm.to_date"
                                        class="form-control"
                                        placeholder="To"
                                        :max="disablefutureDate()"
                                      />
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group input-group row">
                                  <div class="col-sm-12">
                                    <label class="col-form-label"
                                      >Responsibility</label
                                    >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"
                                        ><i class="fas fa-users"></i
                                      ></span>
                                      <textarea
                                        type="text"
                                        name="responsibility"
                                        v-model="
                                          professionalForm.responsibility
                                        "
                                        class="form-control"
                                        placeholder="Roles & Resposibilities"
                                      ></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button
                                type="button"
                                class="btn btn-default"
                                data-dismiss="modal"
                              >
                                Close
                              </button>
                              <button
                                type="button"
                                class="btn btn-primary"
                                @click.prevent="
                                  updateProfessionalInfo(professionalForm.id)
                                "
                              >
                                Save changes
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="card-body pt-0">
                      <p class="info_heading">
                        Add Additional Professional Experience
                      </p>
                      <form
                        action=""
                        role="form"
                        method="post"
                        class="p-2"
                        @submit.prevent="addProfessionalDetail()"
                      >
                        <div class="form-group input-group row">
                          <div class="col-sm-6">
                            <label class="col-form-label"
                              >Your Designation</label
                            >
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-user"></i
                              ></span>
                              <input
                                type="text"
                                name="designation"
                                v-model="professionalInfo.designations"
                                class="form-control"
                                placeholder="Enter your designation"
                                required
                              />
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label class="col-form-label"
                              >Organization Name</label
                            >
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-building"></i
                              ></span>
                              <input
                                type="text"
                                name="organisation"
                                v-model="professionalInfo.organisation"
                                class="form-control"
                                placeholder="Enter your organization name"
                                required
                              />
                            </div>
                          </div>
                        </div>
                        <div class="form-group input-group row">
                          <div class="col-sm-6">
                            <label class="col-form-label">Job Type</label>
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-user"></i
                              ></span>
                              <select
                                class="form-control"
                                name="job_type"
                                v-model="professionalInfo.job_type"
                              >
                                <option>Select Job type</option>
                                <option
                                  :value="jt.id"
                                  v-for="jt in allJobtype"
                                  :key="jt.id"
                                >
                                  {{ jt.job_type }}
                                </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label class="col-form-label">Job Shift</label>
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-times-circle"></i
                              ></span>
                              <select
                                class="form-control"
                                name="job_shift"
                                v-model="professionalInfo.job_shift"
                              >
                                <option>Select time</option>
                                <option
                                  :value="js.id"
                                  v-for="js in allJobshift"
                                  :key="js.id"
                                >
                                  {{ js.job_shift }}
                                </option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group input-group row">
                          <div class="col-sm-6">
                            <label class="col-form-label">Your Industry</label>
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-building"></i
                              ></span>
                              <select
                                class="form-control"
                                name="industry_name"
                                v-model="professionalInfo.industry_name"
                              >
                                <option>Select Industry</option>
                                <option
                                  :value="ind.id"
                                  v-for="ind in allIndustry"
                                  :key="ind.id"
                                >
                                  {{ ind.category_name }}
                                </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label class="col-form-label"
                              >Functional Area</label
                            >
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-window-restore"></i
                              ></span>
                              <select
                                class="form-control"
                                name="functional_role"
                                v-model="professionalInfo.functional_role"
                              >
                                <option>Functional area</option>
                                <option
                                  :value="fr.id"
                                  v-for="fr in allDesignation"
                                  :key="fr.id"
                                >
                                  {{ fr.subcategory_name }}
                                </option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group input-group row">
                          <div class="col-sm-6">
                            <label class="col-form-label">From</label>
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-calendar"></i
                              ></span>
                              <input
                                type="date"
                                name="from_date"
                                v-model="professionalInfo.from_date"
                                class="form-control datepicker"
                                placeholder="From"
                              />
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label class="col-form-label">To</label>
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-calendar"></i
                              ></span>
                              <input
                                type="date"
                                name="to_date"
                                v-model="professionalInfo.to_date"
                                class="form-control"
                                placeholder="To"
                                :max="disablefutureDate()"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="form-group input-group row">
                          <div class="col-sm-12">
                            <label class="col-form-label">Responsibility</label>
                            <div class="input-group-prepend">
                              <span class="input-group-text"
                                ><i class="fas fa-users"></i
                              ></span>
                              <textarea
                                type="text"
                                name="responsibility"
                                v-model="professionalInfo.responsibility"
                                class="form-control"
                                placeholder="Roles & Resposibilities"
                              ></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <button
                            type="submit"
                            class="btn btn-primary btn-block"
                          >
                            {{ infoSaveStatus ? "Saving..." : "Save" }}
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <div v-if="activetab === 2" class="tabcontent">
                    <div class="card-header">
                      <h4>Other Information</h4>

                      <form
                        action=""
                        method="post"
                        class="p-2"
                        role="form"
                        @submit.prevent="addOthersDetail($event)"
                      >
                        <!-- only Experienced candidate div open -->
                        <div v-if="form.candidate_type == 'experienced'">
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <div class="">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <label class="col-form-label"
                                      >Experience(in year)</label
                                    >
                                    <select
                                      class="form-control"
                                      :disabled="candidateType"
                                      name="year"
                                      v-model="form.exp_year"
                                    >
                                      <option value="" disabled="disabled">
                                        Select Year
                                      </option>
                                      <option
                                        :value="index"
                                        v-for="(num, index) in 25"
                                        :key="index"
                                      >
                                        {{ index }} Yr
                                      </option>
                                    </select>
                                  </div>
                                  <div class="col-sm-6">
                                    <label class="col-form-label"
                                      >Experience(in month)</label
                                    >
                                    <select
                                      style="width: -webkit-fill-available"
                                      class="form-control"
                                      :disabled="candidateType"
                                      name="month"
                                      v-model="form.exp_month"
                                    >
                                      <option disabled="disabled">
                                        Select Months
                                      </option>
                                      <option
                                        :value="index"
                                        v-for="(num, index) in 12"
                                        :key="index"
                                      >
                                        {{ index }} Month
                                      </option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label">Designation</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-graduation-cap"></i
                                ></span>
                                <input
                                  type="text"
                                  name="designation"
                                  v-model="form.designation"
                                  class="form-control"
                                  placeholder="Enter your Current Designation"
                                />
                              </div>
                            </div>
                          </div>

                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Current Salary(per annum)</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-rupee-sign"></i
                                ></span>
                                <input
                                  type="number"
                                  name="current_salary"
                                  v-model="form.current_salary"
                                  class="form-control"
                                  placeholder="Enter your Current Salary(per annum)"
                                />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Expected Salary(per annum)</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-rupee-sign"></i
                                ></span>
                                <input
                                  type="number"
                                  name="expected_salary"
                                  v-model="form.expected_salary"
                                  class="form-control"
                                  placeholder="Enter your Expected Salary(per annum)"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Notice Period</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-calendar"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="notice_period"
                                  v-model="form.notice_period"
                                >
                                  <option value="" disabled>
                                    Select notice period
                                  </option>
                                  <option value="immediate">
                                    Immediate Joining
                                  </option>
                                  <option value="less than 15 Days">
                                    Less than 15 Days
                                  </option>
                                  <option value="15 Days">15 Days</option>
                                  <option value="1 Month">1 Month</option>
                                  <option value="2 Month">2 Month</option>
                                  <option value="3 Month">3 Month</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Current Working Location (if any)</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-location-arrow"></i
                                ></span>
                                <select
                                  class="form-control"
                                  v-model="form.current_working_location"
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
                              </div>
                            </div>
                          </div>

                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Aadhar Card Number</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-id-card"></i
                                ></span>
                                <input
                                  type="number"
                                  name="aadhar_no"
                                  v-model="form.aadhar_no"
                                  class="form-control"
                                  placeholder="Enter your Adhaar No."
                                />
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label">Job Type</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-envelope"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="job_type"
                                  v-model="form.job_type"
                                >
                                  <option value="" disabled>Job Type</option>
                                  <option
                                    :value="jt.id"
                                    v-for="jt in allJobtype"
                                  >
                                    {{ jt.job_type }}
                                  </option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label">Other ID</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-id-card"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="other_id_type"
                                  v-model="form.other_id_type"
                                >
                                  <option disabled>Select ID Type</option>
                                  <option
                                    value="pan_no"
                                    :selected="form.other_id_type === 'pan_no'"
                                  >
                                    PAN(Permanent Account Number).
                                  </option>
                                  <option
                                    value="voter_id"
                                    :selected="
                                      form.other_id_type === 'voter_id'
                                    "
                                  >
                                    VOTER ID
                                  </option>
                                  <option
                                    value="dl_no"
                                    :selected="form.other_id_type === 'dl_no'"
                                  >
                                    DRIVING LICENCE
                                  </option>
                                  <option
                                    value="passport_no"
                                    :selected="
                                      form.other_id_type === 'passport_no'
                                    "
                                  >
                                    PASSPORT NO.
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label">ID Number</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-id-card"></i
                                ></span>
                                <input
                                  type="text"
                                  name="id_number"
                                  v-model="form.id_number"
                                  class="form-control"
                                  placeholder="Enter ID Number"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label">Industry</label>
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-building"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="industry_id"
                                  v-model="form.industry_id"
                                >
                                  <option value="" disabled="">
                                    Select Industry
                                  </option>
                                  <option
                                    :value="ind.id"
                                    v-for="ind in allIndustry"
                                  >
                                    {{ ind.category_name }}
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Functional Area</label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-window-restore"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="functionalrole_id"
                                  v-model="form.functionalrole_id"
                                >
                                  <option value="" disabled="">
                                    Functional area
                                  </option>
                                  <option
                                    :value="fr.id"
                                    v-for="fr in allDesignation"
                                  >
                                    {{ fr.subcategory_name }}
                                  </option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="form-group input-group row">
                            <div class="col-sm-6">
                              <label class="col-form-label"
                                >Nationality<span style="color: red">
                                  *
                                </span></label
                              >
                              <div class="input-group-prepend">
                                <span class="input-group-text"
                                  ><i class="fas fa-flag-checkered"></i
                                ></span>
                                <select
                                  class="form-control"
                                  name="form.nationality"
                                  v-model="form.nationality"
                                >
                                  <option>Select Nationality</option>
                                  <option value="indian">Indian</option>
                                  <option value="other">Other</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- only experience div close-->

                        <div class="form-group">
                          <button
                            type="submit"
                            class="btn btn-primary btn-block"
                          >
                            {{ infoSaveStatus ? "Submitting..." : "Submit" }}
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
  name: "Userinfo",
  data() {
    return {
      percentage: "",
      uploadstatus: false,
      moment: moment,
      tabValue: "",
      maxDate: "",
      candidateType: false,
      infoSaveStatus: false,
      personal: true,
      professional: false,
      certificate: false,
      // resume: false,
      skill: false,
      educational: false,
      year: [],
      month: [],
      old_link: "",
      resumeLink: "",
      inputs: [
        {
          skill: "",
          skill_level: "",
        },
      ],
      errors: "",
      skillInfo: [],
      editSkillInformation: {
        id: "",
        skill: "",
        expert_level: "",
      },
      certInfos: [],
      editCertInfo: {
        id: "",
        course: "",
        certificate_institute_name: "",
        cert_from_date: "",
        cert_to_date: "",
        grade: "",
        certification_type: "",
        description: "",
      },
      editEducationalInfo: {
        id: "",
        education: "",
        degree_name: "",
        percentage_grade: "",
        institute_name: "",
        passing_year: "",
        institute_location: "",
      },
      educationalDetails: [],
      professionalDetails: [],
      professionalForm: new Form({
        id: "",
        designation: "",
        organisation: "",
        job_type: "",
        job_shift: "",
        industry_name: "",
        functional_role: "",
        from_date: "",
        to_date: "",
        responsibility: "",
      }),

      certForm: new Form({
        course: "",
        certificate_institute_name: "",
        certification_type: "",
        grade: "",
        cert_from_date: "",
        cert_end_date: "",
        description: "",
      }),
      educationForm: new Form({
        education: "",
        degree_name: "",
        percentage_grade: "",
        institute_name: "",
        passing_year: "",
        institute_location: "",
      }),
      professionalInfo: new Form({
        designation: "",
        organisation: "",
        job_type: "",
        job_shift: "",
        industry_name: "",
        functional_role: "",
        from_date: "",
        to_date: "",
        responsibility: "",
      }),
      form: new Form({
        fname: "",
        lname: "",
        email: "",
        contact: "",
        dob: "",
        gender: "",
        nationality: "",
        aadhar_no: "",
        designation: "",
        industry_id: "",
        functionalrole_id: "",
        exp_year: "",
        exp_month: "",
        current_salary: "",
        expected_salary: "",
        preferred_location: "",
        notice_period: "",
        current_working_location: "",
        address: "",
        course: "",
        certificate_institute_name: "",
        cert_from_date: "",
        cert_to_date: "",
        grade: "",
        certification_type: "",
        description: "",
        education: "",
        degree_name: "",
        percentage_grade: "",
        institute_name: "",
        passing_year: "",
        designations: "",
        organisation: "",
        job_type: "",
        job_shift: "",
        industry_name: "",
        functional_role: "",
        from_date: "",
        to_date: "",
        responsibility: "",
        resume_video_link: "",
        linkedin_resume_link: "",
        cover_letter: "",
        skill: "",
        skill_level: "",
        candidate_type: "",
        photograph: "",
        other_id_type: "",
        id_number: "",
        _profile_pic_thumb: "", //in table field
        get profile_pic_thumb() {
          return this._profile_pic_thumb;
        },
        set profile_pic_thumb(value) {
          this._profile_pic_thumb = value;
        },
        pic: "", //upload time
        resume: "", //in table field
        upload_resume: "", //upload time
        resume_upload_date: "",
      }),

      // ResumeForm : new Form({
      //   pdfresume:'',
      //   resume_video:'',
      //   linkedinresume:''
      // }),
      tabId: this.$route.params.tabId,
      isShowingEducation: false,
      isShowingCertificates: false,
      isShowingSkills: false,
      location: [],
      showPlusIcon: false,
      activetab: 1,
      selectedFile: null,
      progress: "",
      selectedImage: null,
    };
  },
  mounted() {
    this.$store.dispatch("getEditData", "/jobseeker-profile");
    this.$store.dispatch("getAllQualification", "/qualification-get");
    this.$store.dispatch("getAllJobtype", "/jobtype-get");
    this.$store.dispatch("getAllJobshift", "/jobshift-get");
    this.$store.dispatch("getAllOrganisations", "/industry-get");
    this.$store.dispatch("getAllDesignation", "/functionalrole-get");
    this.getCertInfo();
    this.getURLParameters(this.tabId);
    axios.get("get-resume-link").then((response) => {
      this.resumeLink = response.data.data.resume_video_link;
    });
    this.getProfilePercentage();
    this.getAllLocation();
  },
  computed: {
    editData() {
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
  },
  methods: {
    getAllLocation() {
      axios.get("/master/location/group").then((response) => {
        this.location = response.data.data;
      });
    },
    getProfilePercentage() {
      axios.get("/profile/percentage").then((response) => {
        this.percentage = response.data.percentage;
      });
    },

    changePhoto(event) {
      let file = event.target.files[0];

      let reader = new FileReader();
      this.uploadstatus = true;
      if (file["size"] < 1024000) {
        //1 MB
        reader.onload = (event) => {
          this.form.pic = event.target.result;
          this.uploadstatus = false;
        };
        reader.readAsDataURL(file);
      } else {
        swal({
          type: "error",
          title: "File size is too large.",
          text: "File size is less than 1 MB",
        });
      }
    },
    changeResume(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      this.uploadstatus = true;
      // if(file['type']==='pdf')

      if (file["size"] < 2048000) {
        //2 MB
        reader.onload = (event) => {
          this.form.upload_resume = event.target.result;
          this.uploadstatus = false;
        };
        reader.readAsDataURL(file);
      } else {
        swal({
          type: "error",
          title: "File size is too large.",
          text: "File size is less than 2 MB",
        });
      }
    },
    addPersonalDetail(e) {
      this.infoSaveStatus = true;
      this.form
        .post("/add-personal-detail")
        .then((response) => {
          this.$router.push("/userinfo/ed");
          toast({
            type: "success",
            title: "Personal Detail Updated successfully",
          });
          //location.reload();
          this.infoSaveStatus = false;
        })
        .catch((error) => {
          toast({
            type: "warning",
            text: "Some Fields are Empty.Check Error(s)",
          });
          this.infoSaveStatus = false;
        });
    },
    addEducationDetail() {
      $("body").css("cursor", "wait");
      this.infoSaveStatus = true;
      this.educationForm.post("/add-education-detail").then(() => {
        this.$router.push("/userinfo/ed");
        this.educationForm.reset();
        toast({
          type: "success",
          title: "Education Detail Added successfully",
        });
        Fire.$emit("afterSave");
        $("body").css("cursor", "default");
        this.infoSaveStatus = false;
      });
    },
    addSkillInformation() {
      for (let i = 0; i < this.inputs.length; i++) {
        let obj = this.inputs[i];
        if (obj.skill === "") {
          this.errors = "All fields are mandatory";
          return false;
        }
      }
      $("body").css("cursor", "wait");
      axios
        .post("add-skill-info", {
          data: this.inputs,
        })
        .then((response) => {
          toast({
            type: "success",
            title: "Skill Information Updated successfully",
          });
          this.$router.push("/userinfo/ed");
          Fire.$emit("afterSave");
          $("body").css("cursor", "default");
          this.inputs.reset();
        });
    },
    addOthersDetail(e) {
      this.infoSaveStatus = true;
      this.form
        .post("/add-others-detail")
        .then((response) => {
          this.$router.push("/userinfo");
          toast({
            type: "success",
            title: "Others Detail Updated successfully",
          });
          //location.reload();
          this.infoSaveStatus = false;
        })
        .catch((error) => {
          toast({
            type: "warning",
            text: "Something went wrong",
          });
          this.infoSaveStatus = false;
        });
    },
    getresumeData() {
      axios.get("get/resume/jobseeker").then((response) => {
        this.resumeData = response.data.data;
      });
    },
    checkCandidateType(event) {
      let candidateVal = event.target.value;
      if (candidateVal === "fresher") {
        return (this.candidateType = true);
      } else {
        return (this.candidateType = false);
      }
    },
    addItem() {
      this.inputs.push({
        skill: "",
        skill_level: "",
      });
    },

    getURLParameters(tabId) {
      this.changeTabmode(tabId);
    },
    changeTabmode(id) {
      if (id == "pe") {
        this.tabValue = id;
      } else if (id == "ed") {
        this.tabValue = id;
      } else {
        this.tabValue = id;
      }
    },

    deleteRow() {
      let count = this.inputs.length;
      if (count >= 2) {
        this.inputs.pop();
      } else {
        alert("You cant remove all fields");
      }
    },
    addProfessionalDetail() {
      this.infoSaveStatus = true;
      $("body").css("cursor", "wait");
      this.professionalInfo.post("/add-professional-detail").then(() => {
        this.$router.push("/userinfo/pr");
        this.professionalInfo.reset();
        toast({
          type: "success",
          title: "Professional Detail Added successfully",
        });
        Fire.$emit("afterSave");
        $("body").css("cursor", "default");
        this.infoSaveStatus = false;
      });
    },

    getProfessionalDetail() {
      axios.get("get-professional-detail").then((response) => {
        this.professionalDetails = response.data.data;
      });
    },

    editProfessionalDetail(id) {
      axios.get("edit-professional-info/" + id).then((response) => {
        this.professionalForm.id = response.data.data.id;
        this.professionalForm.designation = response.data.data.designations;
        this.professionalForm.organisation = response.data.data.organisation;
        this.professionalForm.job_type = response.data.data.job_type;
        this.professionalForm.job_shift = response.data.data.job_shift;
        this.professionalForm.industry_name = response.data.data.industry_name;
        this.professionalForm.functional_role =
          response.data.data.functional_role;
        this.professionalForm.from_date = response.data.data.from_date;
        this.professionalForm.to_date = response.data.data.to_date;
        this.professionalForm.responsibility =
          response.data.data.responsibility;
      });
    },

    updateProfessionalInfo(id) {
      let data = this.professionalForm;
      if (
        this.professionalForm.designation === "" &&
        this.professionalForm.organisation === "" &&
        this.professionalForm.job_type === "" &&
        this.professionalForm.job_shift === "" &&
        this.professionalForm.industry_name === "" &&
        this.professionalForm.functional_role === "" &&
        this.professionalForm.from_date &&
        this.professionalForm.to_date &&
        this.professionalForm.responsibility
      ) {
        this.errors = "All fields required";
      } else {
        $("body").css("cursor", "wait");
        axios
          .post("update-professional-detail", {
            professionalInfo: data,
          })
          .then((response) => {
            toast({
              type: "success",
              title: response.data.success,
            });
            $(".editProfessionalModel").modal("toggle");
            Fire.$emit("afterSave");
            $("body").css("cursor", "default");
          });
      }
    },

    deleteProfessionalDetail(id) {
      $("body").css("cursor", "wait");
      axios.get("delete-professional-detail/" + id).then((response) => {
        toast({
          type: "success",
          title: "User Professional Detail Deleted",
        });
        Fire.$emit("afterSave");
        $("body").css("cursor", "default");
      });
    },

    addCertificationDetail() {
      this.infoSaveStatus = true;
      $("body").css("cursor", "wait");
      this.certForm.post("/add-certification-detail").then(() => {
        this.$router.push("/userinfo/ed");
        this.certForm.reset();
        toast({
          type: "success",
          title: "Certification Detail Successfully Added",
        });
        Fire.$emit("afterSave");
        $("body").css("cursor", "default");
        this.infoSaveStatus = false;
      });
    },

    getCertInfo() {
      axios.get("get-certificate-info").then((response) => {
        this.certInfos = response.data.userCertInfo;
      });
    },

    editCertificate(id) {
      axios.get("edit-certificate-info/" + id).then((response) => {
        this.editCertInfo.id = response.data.data.id;
        this.editCertInfo.course = response.data.data.course;
        this.editCertInfo.certificate_institute_name =
          response.data.data.certificate_institute_name;
        this.editCertInfo.cert_from_date = response.data.data.cert_from_date;
        this.editCertInfo.cert_to_date = response.data.data.cert_to_date;
        this.editCertInfo.grade = response.data.data.grade;
        this.editCertInfo.certification_type =
          response.data.data.certification_type;
        this.editCertInfo.description = response.data.data.description;
      });
    },

    deleteCertificate(id) {
      axios.get("delete-user-certificate/" + id).then((response) => {
        toast({
          type: "success",
          title: "User Certification Detail Deleted",
        });
        window.location.reload();
      });
    },

    updateCertInfo: function (id) {
      let data = this.editCertInfo;
      if (
        this.editCertInfo.course === "" &&
        this.editCertInfo.description === "" &&
        this.editCertInfo.grade === "" &&
        this.editCertInfo.certificate_institute_name === "" &&
        this.editCertInfo.cert_from_date === "" &&
        this.editCertInfo.cert_to_date === "" &&
        this.editCertInfo.certification_type
      ) {
        this.errors = "All fields required";
      } else {
        axios
          .post("update-user-cert", {
            certInfo: data,
          })
          .then((response) => {
            toast({
              type: "success",
              title: response.data.success,
            });
            window.location.reload();
          });
      }
    },

    getSkillInformation() {
      axios.get("get-user-skill").then((response) => {
        this.skillInfo = response.data.data;
      });
    },

    editSkillInfo: function (id) {
      axios.get("edit-user-skill/" + id).then((response) => {
        this.editSkillInformation.id = response.data.data.id;
        this.editSkillInformation.skill = response.data.data.skill;
        this.editSkillInformation.expert_level =
          response.data.data.expert_level;
      });
    },

    updateSkillInfo: function (id) {
      let data = this.editSkillInformation;
      if (this.editSkillInformation.skill === "") {
        this.errors = "All fields required";
      } else if (this.editSkillInformation.expert_level === "") {
        this.errors = "All fields required";
      } else {
        axios
          .post("update-user-skill", {
            skillInfo: data,
          })
          .then((response) => {
            toast({
              type: "success",
              title: response.data.success,
            });
            window.location.reload();
          });
      }
    },

    deleteSkillInfo: function (id) {
      axios.post("delete-user-skill/" + id).then((response) => {
        toast({
          type: "success",
          title: response.data.success,
        });
        this.getSkillInformation();
      });
    },

    getEducationalInfo: function () {
      axios.get("get-educational-info").then((response) => {
        this.educationalDetails = response.data.educationalDetails;
      });
    },

    deleteEducationalDetail(id) {
      $("body").css("cursor", "wait");
      axios.get("delete-educational-detail/" + id).then((response) => {
        toast({
          type: "success",
          title: "User Educational Detail Deleted",
        });
        Fire.$emit("afterSave");
        $("body").css("cursor", "default");
      });
    },

    editEducationalDetail(id) {
      axios.get("edit-educational-info/" + id).then((response) => {
        this.editEducationalInfo.id = response.data.educationalDetails.id;
        this.editEducationalInfo.education =
          response.data.educationalDetails.education;
        this.editEducationalInfo.degree_name =
          response.data.educationalDetails.degree_name;
        this.editEducationalInfo.percentage_grade =
          response.data.educationalDetails.percentage_grade;
        this.editEducationalInfo.institute_name =
          response.data.educationalDetails.institute_name;
        this.editEducationalInfo.passing_year =
          response.data.educationalDetails.passing_year;
        this.editEducationalInfo.institute_location =
          response.data.educationalDetails.institute_location;
      });
    },
    updateEducationalInfo: function (id) {
      let data = this.editEducationalInfo;
      if (
        this.editEducationalInfo.education === "" &&
        this.editEducationalInfo.degree_name === "" &&
        this.editEducationalInfo.percentage_grade === "" &&
        this.editEducationalInfo.institute_name === "" &&
        this.editEducationalInfo.passing_year === "" &&
        this.editEducationalInfo.institute_location === ""
      ) {
        this.errors = "All fields required";
      } else {
        $("body").css("cursor", "wait");
        axios
          .post("update-educational-info", {
            editEducationalData: data,
          })
          .then((response) => {
            toast({
              type: "success",
              title: response.data.success,
            });
            $(".editEducationalModel").modal("toggle");
            Fire.$emit("afterSave");
            $("body").css("cursor", "default");
          });
      }
    },
    disablefutureDate() {
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if (month < 10) month = "0" + month.toString();
      if (day < 10) day = "0" + day.toString();

      var maxDate = year + "-" + month + "-" + day;

      return maxDate;
    },
    getHumanDate: function (date) {
      return moment(date).fromNow();
    },
    onFileChanged(event) {
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
    onProfileChanged(event) {
      this.selectedImage = event.target.files[0];
      const elem = this.$refs.myBtnImg;
      elem.click();
    },

    onUpload() {
      if (this.selectedFile) {
        const formData = new FormData();
        formData.append("resume", this.selectedFile, this.selectedFile.name);
        axios
          .post("file-upload", formData, {
            onUploadProgress: (uploadEvent) => {
              this.progress =
                Math.round(uploadEvent.total / uploadEvent.total) * 100;
            },
          })
          .then((res) => {
            this.$router.go("/userinfo/pe");
            toast({
              type: "success",
              title: "Resume Uploaded Successfully",
            });
          })
          .catch((error) => {
            toast({
              type: "error",
              text: "Something Went wrong",
            });
          });
      }
    },
    onUploadImg() {
      if (this.selectedImage) {
        const formData = new FormData();
        formData.append("image", this.selectedImage, this.selectedImage.name);
        axios
          .post("file-upload/profile", formData, {
            onUploadProgress: (uploadEvent) => {
              this.progress =
                Math.round(uploadEvent.total / uploadEvent.total) * 100;
            },
          })
          .then((res) => {
            this.$router.go("/userinfo/pe");
            toast({
              type: "success",
              title: "Profile Uploaded Successfully",
            });
          })
          .catch((error) => {
            toast({
              type: "error",
              text: "Something Went wrong",
            });
          });
      }
    },
  },

  filters: {
    capitalize: function (val) {
      if (!val) return "";
      val = val.toString();
      return val.charAt(0).toUpperCase() + val.slice(1);
    },
  },

  created() {
    this.changeTabmode(this.tabId);
    this.getSkillInformation();
    this.getCertInfo();
    this.getEducationalInfo();
    this.getProfessionalDetail();
    Fire.$on("afterSave", () => {
      this.getEducationalInfo();
      this.getProfessionalDetail();
      this.getCertInfo();
      this.getSkillInformation();
    });
    this.disablefutureDate();
  },
};
</script>

<style scoped>
.skill-del-btn {
  color: white !important;
}

#tt {
  color: red;
}

.select.form-control {
  height: 28px;
}
.invalid-feedback {
  display: block;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #f44336;
}
.collection li .text {
  color: #000;
}
.collection li.collection-item {
  padding: 10px;
}
.quick-i {
  font-size: 20px;

  float: right;
  color: #717171;
}
.embed-responsive-4by3 {
  height: 100%;
}
.tabs a.active {
  background-color: #007bff;
  color: #fff !important;
  padding: 7px;
  border-radius: 4px;
  margin: 5px;
}
.tabs a {
  margin: 4px;
  border: 1px solid #ddd;
  padding: 7px;
  border-radius: 4px;
  cursor: pointer;
}
.show-form {
  display: block;
}
.hide-form {
  display: none;
}
.tab-active {
  background: #007bff !important;
}
.tab-active span,
.tab-active i {
  color: #fff !important;
}
.candidate-resume {
  background-color: #fff;
  padding: 15px;
  border: 1px dashed #b1b1b1;
  text-align: center;
}
.resume-card {
  padding: 1rem;
  background-color: #fff;
}
.video-resume {
  background-color: #fff;
  padding: 1rem;
}
.profile-pic {
  background-color: #fff;
  padding: 1rem;
  position: relative;
}
#cam {
  position: absolute;
  background: transparent;
  bottom: 17%;
  left: 40%;
}
.corner-div {
  background-color: #fff;
  padding: 1rem;
  margin-top: 1rem;
}
/* checkbox */

.dropdown-check-list .anchor {
  position: relative;
  cursor: pointer;
  padding: 5px 50px 5px 10px;
}

.dropdown-check-list .anchor:after {
  position: absolute;
  content: "";
  border-left: 2px solid black;
  border-top: 2px solid black;
  padding: 5px;
  right: -183px;
  top: 20%;
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}

.dropdown-check-list .anchor:active:after {
  right: 8px;
  top: 21%;
}

.dropdown-check-list ul.items {
  padding: 10px;
  margin: 0;
  border: 1px solid #ccc;
  /* border-top: none; */
  list-style: none;
  z-index: 999;
  background-color: #fff;
  position: absolute;
  right: -12px;
  top: 72px;
  width: 100%;
  height: 300px;
  overflow: auto;
}
.location-check {
  list-style: none;
  padding-left: 20px;
  margin: 5px 6px 8px;
}
.location-check input {
  margin-right: 8px;
}
.skill-del-btn {
  margin: 4px;
  border: 1px solid #ddd;
  padding: 7px;
  border-radius: 4px;
  cursor: pointer;
}
/* upload file */
/*custom inpu file*/
.custom-file-input-re {
  color: transparent;
  margin-left: 20px;
}
.custom-file-input-re::-webkit-file-upload-button {
  visibility: hidden;
}

.custom-file-input-re::before {
  content: "▲ Upload Resume";
  color: #fff;
  display: inline-block;
  background: #f39c12;
  padding: 10px 22px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  font-weight: 400;
  border-radius: 2px;
  outline: none;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12),
    0 3px 1px -2px rgba(0, 0, 0, 0.2);
}
.custom-file-input-re:focus {
  outline: none !important;
}
.custom-file-input-re:active::before {
  transform: scale(0.9) translate(0px, 2px);
  box-shadow: inset 4px 4px 5px 0px rgba(0, 0, 0, 0.2);
}
</style>
