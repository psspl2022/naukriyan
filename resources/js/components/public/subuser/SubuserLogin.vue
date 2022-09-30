<template>
  <div id="subuserSignup">
    <section class="signup-adjust section pb-5 pt-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 mx-auto">
            <div class="card">
              <h5
                class="
                  card-header
                  info-color
                  white-text
                  text-center
                  py-3
                  mb-4
                  form-header
                "
              >
                <strong>Sign in</strong>
              </h5>

              <!--Card content-->
              <div class="card-body px-lg-5 pt-0">
                <!-- Form -->
                <form
                  class="text-center"
                  style="color: #757575"
                  @submit.prevent="SubuserLogin()"
                  method="POST"
                >
                  <!-- Email -->
                  <div class="md-form">
                    <i class="fa fa-user icon-login-user"></i>
                    <input
                      type="email"
                      id="materialLoginFormEmail"
                      placeholder="Enter Email"
                      class="form-control"
                      v-model="form.email"
                      :class="{ 'is-invalid': form.errors.has('email') }"
                      autocomplete="off"
                    />
                  </div>
                  <has-error :form="form" field="email"></has-error>

                  <!-- Password -->
                  <div class="md-form">
                    <i class="fas fa-key icon-login-key"></i>
                    <input
                      type="password"
                      id="materialLoginFormPassword"
                      class="form-control"
                      placeholder="Enter Password"
                      v-model="form.password"
                      :class="{ 'is-invalid': form.errors.has('password') }"
                    />
                  </div>
                  <has-error :form="form" field="password"></has-error>

                  <div class="d-flex justify-content-between">
                    <!-- Remember me -->
                    <div class="form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="materialLoginFormRemember"
                      />
                      <label
                        class="form-check-label"
                        for="materialLoginFormRemember"
                        >Remember me</label
                      >
                    </div>

                    <!-- Forgot password -->
                    <!-- <router-link :to="`/forget-password`">
                      <a href="" class="forgot-link fw-700"
                        ><i class="fas fa-key mr-2"></i>Forgot Password?</a
                      >
                    </router-link> -->
                  </div>

                  <!-- Sign in button -->
                  <button
                    type="submit"
                    class="btn btn-outline-info btn-block my-4 waves-effect"
                    :disabled="loginStatus"
                  >
                    {{ loginStatus ? "Authenticating" : "Sign in" }}
                  </button>
                </form>

                <!-- Form -->
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="login-info">
              <h1 class="mb-3">Welcome to naukriyan!</h1>
              <!-- <div v-if="user">
                <h3>Want to ??</h3>
                <router-link :to="`/subuser-dashboard`">
                  <a
                    href=""
                    class="btn btn-primary btn-lg mt-3"
                    style="color: #fff !important"
                    ><i class="fas fa-home"></i>&nbsp; Go To Dashboard</a
                  >
                </router-link>
                <a
                  class="btn btn-primary btn-lg mt-3"
                  style="color: #fff !important"
                  href="#"
                  @click.prevent="logout()"
                >
                  <div><i class="fas fa-sign-out-alt"></i> Logout</div></a
                >
              </div> -->
              <!-- <router-link :to="`/`">
                <a
                  href=""
                  class="btn btn-primary btn-lg mt-3"
                  style="color: #fff !important"
                  ><i class="fas fa-home"></i>&nbsp; Back to home</a
                >
              </router-link> -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "SubuserLogin",
  data() {
    //let now = new Date()
    return {
      user: [],
      loginStatus: false,
      form: new Form({
        password: "",
        email: "",
      }),
    };
  },
  mounted() {
    //this.getSessionUser();
  },
  methods: {
    getSessionUser() {
      axios.get("/get-subuser-profile").then((response) => {
        if (response.data) {
          this.user = response.data.data;
          if (response.data.data) {
            this.$router.push("/subuser-dashboard");
          }
        }
      });
    },
    SubuserLogin() {
      this.loginStatus = true;
      this.form
        .post("/subuser-login")
        .then((response) => {
          if (response.status === 201) {
            this.loginStatus = false;
            toast({
              type: "error",
              title: response.data.message,
            });
            // this.$router.push({path: 'verify-otp', query: {email: this.form.email}});
          } else if (
            response.status === 200 &&
            response.data.status === "success"
          ) {
            this.loginStatus = false;
            toast({
              type: "success",
              title: response.data.message,
            });
            this.$router.push("/subuser-dashboard");
          }
          // } else if (
          //   response.status === 201 &&
          //   response.data.status === "error"
          // ) {
          //   this.loginStatus = false;
          //   toast({
          //     type: "error",
          //     title: response.data.message,
          //   });
          // }
          else {
            this.loginStatus = false;
            toast({
              type: "error",
              title: "Something went wrong. Please try again",
            });
          }
        })
        .catch(() => {
          this.loginStatus = false;
        });
    },
    logout() {
      var uri = "/jobseeker-logout";
      swal
        .fire({
          title: "Are you sure want to logout!!",
          text: "You would be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes!",
        })
        .then((result) => {
          if (result.value) {
            axios.get(uri).then((response) => {
              console.log(response);
              if (response.status === 200) {
                toast({
                  type: "success",
                  title: "Logout success",
                });

                this.$router.push("/subuser-login");
                window.location.reload();
              }
            });
          }
        })
        .catch((error) => {
          toast({
            type: "warning",
            title: "Something went wrong",
          });
        });
    },
  },
  created() {
    this.getSessionUser();
  },
};
</script>

<style scoped>
.login-info {
  padding: 100px 80px;
  text-align: center;
  box-shadow: 1px 2px 20px #eceaea;
}
</style>