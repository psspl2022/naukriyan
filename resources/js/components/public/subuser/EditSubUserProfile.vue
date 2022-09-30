<template>
  <div id="editsubprofile">
    <subuser-header></subuser-header>
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
                  <li class="active">Edit Profile</li>
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
            <!-- <div class="cms-pg-header">
                <h2 class="hk-pg-title">Edit Profile</h2>
            </div> -->

            <div class="card">
              <div class="card-body">
                <form method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="profile-head">
                        <h5>
                          {{ consultantForm.fname }}
                          {{ consultantForm.lname }}
                        </h5>
                        <h6>
                          {{ consultantForm.designation }}
                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a
                              class="nav-link active"
                              id="home-tab"
                              data-toggle="tab"
                              href="#home"
                              role="tab"
                              aria-controls="home"
                              aria-selected="true"
                              >Personal</a
                            >
                          </li>
                          <li class="nav-item">
                            <a
                              class="nav-link"
                              id="profile-tab"
                              data-toggle="tab"
                              href="#profile"
                              role="tab"
                              aria-controls="profile"
                              aria-selected="false"
                              >Change Password</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="profile-img">
                        <img
                          :src="
                            'subuser_profile_image/' +
                            consultantForm.profile_image
                          "
                          alt=""
                          width="300"
                          height="300"
                          v-if="consultantForm.profile_image"
                        />
                        <img
                          :src="'subuser_profile_image/default_image.png'"
                          alt=""
                          width="300"
                          height="300"
                          v-else
                        />

                        <img
                          src="https://i.gifer.com/ZZ5H.gif"
                          alt=""
                          id="loader-hide"
                          :class="
                            profileChangeLoading ? 'loader loader-show' : ''
                          "
                        />

                        <div class="file btn btn-lg btn-primary">
                          Upload Photo
                          <input
                            type="file"
                            id="file"
                            @change="handleFileUpload"
                            accept="image/*"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="tab-content profile-tab" id="myTabContent">
                        <!-- Personal tab start -->

                        <div
                          id="home"
                          class="tab-pane fade show active popupForm"
                        >
                          <form
                            method="post"
                            role="form"
                            @submit.prevent="updateConsultantInfo()"
                          >
                            <fieldset>
                              <legend>Personal Information</legend>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">
                                    First Name</label
                                  >
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Your First Name"
                                    name="fname"
                                    v-model="consultantForm.fname"
                                  />
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""
                                    >Last Name</label
                                  >
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Your Last Name"
                                    name="lname"
                                    v-model="consultantForm.lname"
                                  />
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""
                                    >Email</label
                                  >
                                  <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Enter Your Email ID"
                                    name="email"
                                    v-model="consultantForm.email"
                                    :disabled="consultantForm.email != null"
                                  />
                                </div>
                              </div>

                              <div class="form-group row mb-2">
                                <div class="col-sm-4">
                                  <label class="col-form-label" for="">
                                    Contact No.</label
                                  >
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Your Contact No."
                                    name="contact"
                                    v-model="consultantForm.contact"
                                  />
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""
                                    >Current Designation</label
                                  >
                                  <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Your Current Designation"
                                    v-model="consultantForm.designation"
                                  />
                                </div>
                                <div class="col-sm-4">
                                  <label class="col-form-label" for=""
                                    >Gender</label
                                  >
                                  <select
                                    class="form-control custom-select"
                                    v-model="consultantForm.gender"
                                  >
                                    <option value="">
                                      ---Select gender---
                                    </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>
                              </div>
                            </fieldset>

                            <div class="form-group row mb-2 mt-2">
                              <div class="col-sm-12">
                                <button
                                  type="submit"
                                  class="btn btn-primary"
                                  :disabled="updateStatus"
                                >
                                  {{ updateStatus ? "Updating.." : "Update" }}
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <!-- Personal tab end -->

                        <!-- Company tab start -->

                        <div id="profile" class="tab-pane fade popupForm">
                          <fieldset>
                            <legend>Change Password</legend>
                            <form
                              action=""
                              class="form"
                              role="form"
                              @submit.prevent="updatePasswordConsultant()"
                            >
                              <div class="formgroup">
                                <input
                                  type="password"
                                  id="new_password"
                                  v-model="form.new_password"
                                  name="new_password"
                                  :class="{
                                    'form-control is-invalid':
                                      form.errors.has('new_password'),
                                  }"
                                />
                                <label for="new_password"
                                  ><br />New Password</label
                                >
                                <span>enter your new password</span>
                                <has-error
                                  :form="form"
                                  field="new_password"
                                ></has-error>
                              </div>
                              <div class="formgroup">
                                <input
                                  type="password"
                                  id="confirm_password"
                                  v-model="form.confirm_password"
                                  name="confirm_password"
                                  :class="{
                                    'form-control is-invalid':
                                      form.errors.has('confirm_password'),
                                  }"
                                />
                                <label for="confirm_password"
                                  ><br />
                                  Confirm New Password</label
                                >
                                <span>confirm new password</span>
                                <has-error
                                  :form="form"
                                  field="confirm_password"
                                ></has-error>
                              </div>

                              <button id="login-btn" type="submit">
                                Change Password
                              </button>
                            </form>
                          </fieldset>
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
    <subuser-footer></subuser-footer>
  </div>
</template>

<script>
export default {
  name: "EditSubProfile",
  data() {
    return {
      userDetails: null,

      consultantForm: new Form({
        fname: "",
        lname: "",
        email: "",
        contact: "",
        profile_image: "",
        gender: "",
        designation: "",
        image: "",
      }),

      form: new Form({
        new_password: "",
        confirm_password: "",
      }),

      updateStatus: false,
      profileChangeLoading: false,
      image: "",
    };
  },

  mounted() {
    this.getSessionUser();
  },

  methods: {
    getSessionUser() {
      axios.get("/get-subuser-profile").then((response) => {
        if (response.data) {
          this.consultantForm.fill(response.data.data);
        }
      });
    },
    handleFileUpload(event) {
      this.profileChangeLoading = true;
      var formData = new FormData();
      var imagefile = document.querySelector("#file");
      console.log(imagefile.files[0]);
      formData.append("image", imagefile.files[0]);
      axios
        .post("update/subuser/profileimage", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((response) => {
          this.getSessionUser();
          this.$router.push("/update-subuser");
          toast({
            type: "success",
            title: "Upload Successfully",
          });
          this.profileChangeLoading = false;
          //window.location.reload();
        })
        .catch((error) => {
          toast({
            type: "error",
            text: "Failed",
          });
          this.profileChangeLoading = false;
        });
    },

    updateConsultantInfo() {
      this.updateStatus = true;
      axios
        .post("/update/subuser/profile", {
          fname: this.consultantForm.fname,
          lname: this.consultantForm.lname,
          contact: this.consultantForm.contact,
          gender: this.consultantForm.gender,
          designation: this.consultantForm.designation,
        })
        .then((response) => {
          this.updateStatus = false;
          if (response.status === 200 && response.data.status === "success") {
            toast({
              type: "success",
              title: response.data.message,
            });
          } else if (
            response.status === 201 &&
            response.data.status === "error"
          ) {
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
        })
        .catch((error) => {
          this.updateStatus = false;
          console.log("error");
        });
    },

    updatePasswordConsultant() {
      this.form
        .post(`/update/password/subuser`)
        .then((response) => {
          if (response.status === 200) {
            axios.get("/consultant-logout").then((response) => {
              this.$router.push(
                "/subuser-login?success=true&ref=change-password"
              );
              //window.location.reload();
              toast({
                type: "success",
                title:
                  "Password has been updated.Please Login again to continue",
              });
            });
          }
        })
        .catch(() => {});
    },
  },
};
</script>

<style scoped>
.loader {
  height: 40px !important;
  width: 40px !important;
  position: absolute !important;
  left: 165px !important;
  top: 50px !important;
}

#loader-hide {
  display: none;
}
.loader-show {
  display: block !important;
}
</style>
