<template>
  <div id="otpauthenticate">
    <section
        class="signup-adjust section pb-5 pt-5"
        style="
        background-image: url('https://www.investopedia.com/thmb/6cANcPdhi5w8g-sYI_Tc1hEBsP0=/2119x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-815165952-352474d31efb4d44967695dc81f2ee2a.jpg');
      "
    >
      <div class="container">
        <div class="row">
          <div class="col-sm-6 mx-auto">
            <div class="otp-form">
              <form @submit.prevent="emailOTPVerify()">
                <div class="form-group row inputBox">
                  <div class="col-sm-12">
                    <label>Email One Time Password(OTP) <span style="color: red"> * </span></label>
                    <div class="input text">
                      <input
                          id="email_otp"
                          v-model="form.email"
                          autocomplete="off"
                          class="form-control"
                          placeholder="Enter OTP sent to Email"
                          type="text"
                      />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-block btn-lg btn-primary" type="submit" :disabled="checkVerified === true">
                    {{ checkVerified ? 'Validating' : 'Validate' }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "OtpAuthenticate",
  data() {
    //let now = new Date()
    return {
      form: new Form({
        email: "",
      }),
      checkVerified: false,
    };
  },
  mounted() {
    this.sendOTPMessage();
  },

  methods: {
    sendOTPMessage() {
      axios.get('/verify-email-consultant', { params: { email: this.$route.query.email }}).then(response => {
        console.log(response);

        if (response.status === 200 && response.data.status === 'success') {
          toast({
            type: "success",
            title: response.data.message,
          });
        } else {
          toast({
            type: "success",
            title: response.data.message,
          });
        }
      })
    },

    emailOTPVerify() {
      this.checkVerified = true;
      axios.post('/consultant-email-verify', { params:
            {
              emailOTP: this.form.email,
              email: this.$route.query.email
            }
      }).then(response => {
        this.checkVerified = false;
        if (response.status === 200 && response.data.status === 'success') {
          this.$router.push("/consultant-login");
          toast({
            type: "success",
            title: response.data.message,
          });
        } else if(response.status === 201 && response.data.status === 'error') {
          this.checkVerified = false;
          toast({
            type: "error",
            title: response.data.message,
          });
        } else {
          this.checkVerified = false;
          toast({
            type: "error",
            title: 'Something went wrong.',
          });
        }
      }).catch(error => {
        this.checkVerified = false;
        toast({
          type: "error",
          title: 'Something went wrong.',
        });
      })
    },
  },
};
</script>

<style scoped>
.otp-form {
  background: white!important;
  padding: 15px;
  border-radius: 5px;
}
</style>