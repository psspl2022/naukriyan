<template>
  <div id="consultantEditProfile">
    <consultant-header></consultant-header>
    <section class="top-adjust pt-5 pb-5">
      <div id="breadcrumb">
        <div class="breadcrumb-wrapper">

          <div class="container">

            <div class="row">

              <div class="col-xs-12 col-sm-8">
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-home mr-1"></i>Home</a></li>
                  <li class="active">Edit Profile</li>
                </ol>
              </div>

              <div class="col-xs-12 col-sm-4 hidden-xs">
                <p class="hot-line"><i class="fa fa-headphones mr-1 Phone is-animating"
                                       aria-hidden="true"></i> <a href="tel:919711999999">Hot Line: +91 9711 99 99
                  99</a></p>
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
            <!-- <div class="cms-pg-header">
                <h2 class="hk-pg-title">Edit Profile</h2>
            </div> -->

            <div class="card">
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="profile-img">
                        <img :src="'storage/consultant_profile_image/' +consultantForm.profile_img" alt=""/>
                        <img src="https://i.gifer.com/ZZ5H.gif" alt="" id="loader-hide" :class="profileChangeLoading ? 'loader loader-show' : ''">
                        <div class="file btn btn-lg btn-primary">
                          Change Photo
                          <input type="file" name="file" v-on:change="updateProfileImage($event)">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="profile-head">
                        <h5>
                          {{ consultantForm.first_name }} {{ consultantForm.last_name }}
                        </h5>
                        <h6>
                          {{ consultantForm.designation }}
                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab"
                               href="#home" role="tab" aria-controls="home"
                               aria-selected="true">Personal</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab"
                               href="#profile" role="tab" aria-controls="profile"
                               aria-selected="false">Company</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-8">
                      <div class="tab-content profile-tab" id="myTabContent">
                        <!-- Personal tab start -->

                        <div id="home" class="tab-pane fade show active popupForm">
                          <form method="post" role="form" @submit.prevent="updateConsultantInfo()">
                            <fieldset>
                              <legend> Personal Information</legend>


                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> First
                                    Name</label>
                                  <input type="text" class="form-control"
                                         placeholder="Enter Your First Name" name="fname"
                                         v-model="consultantForm.first_name"
                                         :disabled="consultantForm.first_name != null">
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Last
                                    Name</label>
                                  <input type="text" class="form-control"
                                         placeholder="Enter Your Last Name" name="lname"
                                         v-model="consultantForm.last_name"
                                         :disabled="consultantForm.last_name != null">
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Email</label>
                                  <input type="email" class="form-control"
                                         placeholder="Enter Your Email ID" name="email"
                                         v-model="consultantForm.email" :disabled="consultantForm.email != null">
                                </div>
                              </div>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> Contact
                                    No.</label>
                                  <input type="text" class="form-control"
                                         placeholder="Enter Your Contact No."
                                         name="contact"
                                         v-model="consultantForm.mobile" :disabled="consultantForm.mobile != null">
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Date of Birth</label>
                                  <input type="date" class="form-control" placeholder="Enter Your Date of Birth"
                                         v-model="consultantForm.dob">
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Gender</label>
                                  <select class="form-control custom-select" v-model="consultantForm.gender">
                                    <option value="">---Select gender---</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">ID Type</label>
                                  <select class="form-control custom-select" v-model="consultantForm.id_type">
                                    <option value="">---Select ID Type---</option>
                                    <option value="aadhar">Aadhar Card</option>
                                    <option value="dl">Driving Licence</option>
                                    <option value="voter_card">Voter Card</option>
                                    <option value="pan_card">PAN Card</option>
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> ID No.</label>
                                  <input type="text" class="form-control"
                                         placeholder="Enter Your Adhaar No." v-model="consultantForm.id_number">
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Current
                                    Designation</label>
                                  <input type="text" class="form-control" placeholder="Enter Your Current Designation"
                                         v-model="consultantForm.designation">
                                </div>
                              </div>

                            </fieldset>

                            <fieldset class="mt-3">
                              <legend>Social Accounts</legend>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> Facebook</label>
                                  <input type="text" class="form-control" placeholder="Enter Your Facebook Link"
                                         v-model="consultantForm.facebook_url">
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Twitter</label>
                                  <input type="text" class="form-control" placeholder="Enter Your Twitter Link"
                                         v-model="consultantForm.twitter_url">
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">LinkedIn</label>
                                  <input type="text" class="form-control" placeholder="Enter Your LinkedIn Link"
                                         v-model="consultantForm.linkedin_url">
                                </div>
                              </div>

                            </fieldset>
                            <div class="form-group row mb-2 mt-2">
                              <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" :disabled="updateStatus">{{ updateStatus ? 'Updating..' : 'Update' }}</button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <!-- Personal tab end -->

                        <!-- Company tab start -->

                        <div id="profile" class="tab-pane fade popupForm">
                          <form method="post" role="form" @submit.prevent="updateConsultantCompany()">
                            <fieldset>
                              <legend> Company Information</legend>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> Company Name</label>
                                  <input type="text" class="form-control" placeholder="Enter Your Company Name" disabled="" v-model="consultantCompanyForm.company_name">
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Company Tagline</label>
                                  <input type="text" class="form-control"
                                         placeholder="Enter Your Company Tagline" v-model="consultantCompanyForm.company_tagline"
                                  />
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Select Industry</label>
                                  <select class="form-control custom-select" v-model="consultantCompanyForm.industry_id">
                                    <option>Select Industry</option>
                                    <option :value="industry.id" v-for="industry in industries">{{ industry.category_name }}</option>
                                  </select>
                                </div>
                              </div>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Owner Name</label>
                                  <input type="text" class="form-control" placeholder="Enter Owner Name" v-model="consultantCompanyForm.company_owner_name"/>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Company Email</label>
                                  <input type="text" class="form-control" placeholder="Enter Email ID" v-model="consultantCompanyForm.company_email"/>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Company Contact No.</label>
                                  <input type="number" class="form-control" placeholder="Enter Your Contact No." v-model="consultantCompanyForm.company_contact"/>
                                </div>

                              </div>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> Website</label>
                                  <input type="text" class="form-control" placeholder="Enter Your Website Link" v-model="consultantCompanyForm.company_website"/>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Employees</label>
                                  <select class="form-control custom-select" v-model="consultantCompanyForm.company_size">
                                    <option value="" disabled="">Select Employee</option>
                                    <option value="1-10">1-10</option>
                                    <option value="11-100">11-100</option>
                                    <option value="101-1000">101-1000</option>
                                    <option value="1001-10000">1001-10000</option>
                                    <option value="10001-100000">10001-100000</option>
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Established Date</label>
                                  <input type="date" class="form-control" placeholder="Enter Establish Year" v-model="consultantCompanyForm.company_establishment"/>
                                </div>
                              </div>

                              <div class="form-group row mb-2">

                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Upload Logo</label>
                                  <div class="custom-file custom-img-preview min-input">
                                    <input type="file" class="custom-file-input" name="logo" accept="image/*" @change="companyLogo($event)">
                                    <label class="custom-file-label" for="amenityIcon">Upload Image</label>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Upload Banner Image</label>
                                  <div class="custom-file custom-img-preview min-input">
                                    <input type="file" class="custom-file-input" name="banner" accept="image/*" @change="companyBanner($event)">
                                    <label class="custom-file-label" for="amenityIcon">Upload Image</label>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">View Image</label>
                                  <div class="custom-file custom-img-preview min-input">

                                  </div>
                                </div>
                              </div>

                            </fieldset>

                            <fieldset class="mt-3">
                              <legend>Company Address</legend>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> Address</label>
                                  <input type="text" class="form-control" placeholder="Enter Your Address" v-model="consultantCompanyForm.corporate_address"/>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Country</label>
                                  <select class="form-control custom-select" v-model="consultantCompanyForm.country_id">
                                    <option value="" disabled="">Select Country</option>
                                    <option value="1">India</option>
                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">State</label>
                                  <select class="form-control" v-model="consultantCompanyForm.state_id">
                                    <option :value="state.id" v-for="state in states">{{ state.states_name }}</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">City</label>
                                  <select class="form-control" style="width: 100%" v-model="consultantCompanyForm.city_id">
                                    <option>City</option>
                                    <option value="2">Delhi</option>
                                  </select>
                                </div>

                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> Revenue</label>
                                  <input type="text" class="form-control" placeholder="Enter Your Revenue" v-model="consultantCompanyForm.revenue"/>
                                </div>

                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> Corporate Number</label>
                                  <input type="text" class="form-control" placeholder="Enter Your Corporate Number" v-model="consultantCompanyForm.cio_no"/>
                                </div>
                              </div>

                            </fieldset>

                            <fieldset class="mt-3">
                              <legend>Social Accounts</legend>
                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""> Facebook</label>
                                  <input type="text" class="form-control"
                                         placeholder="Enter Your Facebook Link" v-model="consultantCompanyForm.com_facebook"
                                  />
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">Twitter</label>
                                  <input type="text" class="form-control"
                                         placeholder="Enter Your Twitter Link" v-model="consultantCompanyForm.com_twitter"
                                  />
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">LinkedIn</label>
                                  <input type="text" class="form-control"
                                         placeholder="Enter Your LinkedIn Link" v-model="consultantCompanyForm.com_linkedin"
                                  />
                                </div>
                              </div>

                            </fieldset>

                            <div class="form-group row mb-2 mt-3">
                              <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" :disabled="updateStatus">{{ updateStatus ? 'Updating..' : 'Update' }}</button>
                              </div>
                            </div>
                          </form>
                          <!-- Company tab end -->

                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>

        </div>

      </div>
      <!-- /.row -->
    </section>
    <consultant-footer></consultant-footer>
  </div>
</template>

<script>
export default {
  name: "ConsultantEditProfile",
  data() {
    return {
      userDetails: null,
      industries: [],
      states: [],

      consultantForm: new Form({
        first_name: '',
        last_name: '',
        email: '',
        mobile: '',
        dob: '',
        profile_img: '',
        gender: '',
        id_type: '',
        id_number: '',
        designation: '',
        facebook_url: '',
        twitter_url: '',
        linkedin_url: '',
      }),

      consultantCompanyForm: new Form({
        company_name: '',
        company_tagline: '',
        industry_id: '',
        company_owner_name: '',
        company_email: '',
        company_contact: '',
        company_website: '',
        company_size: '',
        company_establishment: '',
        company_logo: '',
        company_banner: '',
        corporate_address: '',
        country_id: '',
        state_id: '',
        city_id: '',
        revenue: '',
        cio_no: '',
        com_facebook: '',
        com_twitter: '',
        com_linkedin: ''
      }),

      updateStatus: false,
      profileChangeLoading: false
    };
  },

  mounted() {
    this.getSessionUser();
    this.getConsultantCompanyInfo();
    this.getIndustry();
    this.getState();
  },

  methods: {
    getIndustry() {
      axios.get('/get-industries').then(response => {
        if (response.status === 200) {
          this.industries = response.data.data;
        }
      })
    },

    getState() {
      axios.get('/get-states').then(response => {
        console.log(response)
        if (response.status === 200) {
          this.states = response.data.data;
        }
      })
    },

    getCity() {
      axios.get('/get-city').then(response => {
        console.log(response);
      })
    },

    companyLogo(event) {
      console.log(event.target.files[0]);
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
        this.consultantCompanyForm.company_logo = event.target.result;
      };
      reader.readAsDataURL(file);
    },

    companyBanner(event) {
      console.log(event.target.files[0]);
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
        this.consultantCompanyForm.company_banner = event.target.result;
      };
      reader.readAsDataURL(file);
    },

    getSessionUser() {
      axios.get("/get-consultant-profile").then((response) => {
        if (response.data) {
          this.consultantForm.fill(response.data.data);
        }
      });
    },

    getConsultantCompanyInfo() {
      axios.get("/get-consultant-company-info").then((response) => {
        if (response.data) {
          this.consultantCompanyForm.fill(response.data);
        }
      });
    },

    updateProfileImage(event) {
      this.profileChangeLoading = true;
      console.log(event.target.files[0]);
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
        axios.post('/update-consultant-profile-image', { image: event.target.result }).then(response => {
          this.profileChangeLoading = false;
          if (response.status === 200 && response.data.status === 'success') {
            this.getSessionUser();
            toast({
              type: "success",
              title: response.data.message,
            });
          } else if(response.status === 201 && response.data.status === 'error') {
            toast({
              type: "error",
              title: response.data.message,
            });
          } else {
            toast({
              type: "error",
              title: 'Something went wrong. Try again',
            });
          }
        }).catch(error => {
          this.profileChangeLoading = false;
          toast({
            type: "error",
            title: 'Something went wrong. Try again',
          });
        })
      };
      reader.readAsDataURL(file);
    },

    updateConsultantInfo() {
      this.updateStatus = true;
      axios.post('/update-consultant-profile',
          {
            dob: this.consultantForm.dob,
            gender: this.consultantForm.gender,
            id_type: this.consultantForm.id_type,
            id_number: this.consultantForm.id_number,
            designation: this.consultantForm.designation,
            profile_img: this.consultantForm.profile_img,
            facebook_url: this.consultantForm.facebook_url,
            twitter_url: this.consultantForm.twitter_url,
            linkedin_url: this.consultantForm.linkedin_url,
          }
      ).then(response => {
        this.updateStatus = false;
        if(response.status === 200 && response.data.status === 'success') {
          toast({
            type: "success",
            title: response.data.message,
          });
        } else if (response.status === 201 && response.data.status === 'error') {
          toast({
            type: "error",
            title: response.data.message,
          });
        } else {
          toast({
            type: "error",
            title: response.data.message,
          });
        }
      }).catch(error => {
        this.updateStatus = false;
        console.log('error');
      })
    },

    updateConsultantCompany() {
      this.updateStatus = true;
      axios.post('/update-consultant-company',
          {
            tagline: this.consultantCompanyForm.company_tagline,
            com_industry: this.consultantCompanyForm.industry_id,
            owner_name: this.consultantCompanyForm.company_owner_name,
            com_email: this.consultantCompanyForm.company_email,
            com_contact: this.consultantCompanyForm.company_contact,
            website: this.consultantCompanyForm.company_website,
            employee_no: this.consultantCompanyForm.company_size,
            established_year: this.consultantCompanyForm.company_establishment,
            logo: this.consultantCompanyForm.company_logo,
            banner: this.consultantCompanyForm.company_banner,
            address: this.consultantCompanyForm.corporate_address,
            country: this.consultantCompanyForm.country_id,
            state: this.consultantCompanyForm.state_id,
            city: this.consultantCompanyForm.city_id,
            revenue: this.consultantCompanyForm.revenue,
            cin_no: this.consultantCompanyForm.cio_no,
            com_facebook: this.consultantCompanyForm.com_facebook,
            com_twitter: this.consultantCompanyForm.com_twitter,
            com_linkedin: this.consultantCompanyForm.com_linkedin
          }
      ).then(response => {
        this.updateStatus = false;
        if(response.status === 200 && response.data.status === 'success') {
          toast({
            type: "success",
            title: response.data.message,
          });
        } else if (response.status === 201 && response.data.status === 'error') {
          toast({
            type: "error",
            title: response.data.message,
          });
        } else {
          toast({
            type: "error",
            title: response.data.message,
          });
        }
      }).catch(error => {
        this.updateStatus = false;
        console.log('error');
      })
    }
  },
};
</script>

<style scoped>
.loader{
  height: 40px!important;
  width: 40px!important;
  position: absolute!important;
  left: 165px!important;
  top: 50px!important;
}

#loader-hide {
  display: none;
}
.loader-show {
  display: block!important;
}
</style>
