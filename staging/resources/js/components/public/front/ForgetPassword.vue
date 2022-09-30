g
<template>
  <div id="forgetpassword">
    <section class="section" id="forget">
      <div class="container-center">
        <form action="" class="form">
          <center>
            <img :src="'assets/public/asset/img/naukriyana1.png'" width="40%" />
          </center>
          <h2>Don't Worry !</h2>
          <h4>Just provide your email and we can do the rest</h4>
          <div class="formgroup">
            <select
              name="user_type"
              required="required"
              class="form-control"
              v-model="formData.role"
            >
              <option value="" disabled>---Select User type---</option>
              <option value="Employer">Employer</option>
              <option value="Jobseeker">Jobseeker</option>
              <option value="Consultant">Consultant</option>
            </select>
          </div>
          <div class="formgroup">
            <input type="email" id="email" v-model="formData.email" />
            <label for="email"><br />Email</label>
            <span>enter your email</span>
          </div>

          <button id="login-btn" @click.prevent="forgotPassword()">
            {{ forgetStatus ? "Please Wait..." : "Send Reset Link" }}
          </button>
        </form>
        <div class="text-center mt-4">
          <a href="/" class="btn btn-primary text-white"
            ><i class="fas fa-long-arrow-alt-left"></i>&nbsp; Go back to home</a
          >
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "Forgetpassword",
  data() {
    return {
      forgetStatus: false,
      messages: "",
      formData: {
        role: "",
        email: "",
      },
    };
  },
  methods: {
    forgotPassword() {
      if (this.formData.role === "") {
        toast({
          type: "warning",
          title: "Please select user type",
        });
      } else if (this.formData.email === "") {
        toast({
          type: "warning",
          title: "Email Field is Required",
        });
      } else {
        this.forgetStatus = true;
        axios
          .post("forget-password/user", {
            data: this.formData,
          })
          .then((response) => {
            if (response.data.status === "error") {
              this.forgetStatus = false;
              toast({
                type: "warning",
                title: "User " + response.data.messages + " is not register",
              });
            }

            if (response.data.status === "success") {
              this.forgetStatus = false;
              toast({
                type: "success",
                title:
                  "We have send password reset link to your email id " +
                  response.data.messages,
              });
            }
          });
      }
    },
  },
};
</script>

<style>
.cc {
  text-decoration: underline;
}
</style>
