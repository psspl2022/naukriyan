<template>
  <div id="contactus">
    <main-header></main-header>
    <header class="masthead1 text-center text-white mt-5">
      <div class="masthead-content" id="form-container">
        <div class="container">
          <h1 id="looking" class="masthead-heading pb-4">Contact Us</h1>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>

    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <iframe
              class="border mb-2"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.1426525698803!2d77.21302071455732!3d28.535431645220967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce1f700000001%3A0x68dca73f09d47c81!2sPrakhar%20Software%20Solutions%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1580276051518!5m2!1sen!2sin"
              width="100%"
              height="170"
              allowfullscreen=""
            ></iframe>
          </div>
          <div class="col-sm-8 mb-3">
            <form
              class="contact-form"
              method="post"
              role="form"
              action=""
              @submit.prevent="ContactUS()"
            >
              <h3 class="text-center">Get in touch</h3>

              <div class="form-group">
                <label>Your Name </label>
                <input
                  type="text"
                  class="form-control"
                  v-model="form.name"
                  placeholder="Enter your name"
                />
              </div>
              <div class="form-group">
                <label>Email Address</label>
                <input
                  type="email"
                  class="form-control"
                  v-model="form.email"
                  placeholder="Enter your email"
                />
              </div>

              <div class="form-group">
                <label>Phone No.</label>
                <input
                  type="number"
                  maxlength="10"
                  class="form-control"
                  v-model="form.contact_no"
                  placeholder="Type your phone number"
                />
              </div>
              <div class="form-group">
                <label>Your Massage</label>
                <textarea
                  class="form-control"
                  rows="3"
                  v-model="form.remarks"
                  placeholder="Enter your message here"
                ></textarea>
              </div>
              <button
                type="submit"
                class="btn btn-primary btn-block mb-2"
                :disabled="formStatus"
              >
                {{ formStatus ? "Sending" : "Submit" }}
              </button>
            </form>
          </div>
          <div class="col-sm-4">
            <div class="card mb-5">
              <div class="card-header">
                <h3 class="card-title">
                  <span>Contact Details</span>
                </h3>
              </div>
              <div class="card-body">
                <div class="contact-details">
                  <div class="contact-body">
                    <div class="media">
                      <div class="media-icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                      </div>
                      <div class="media-body">
                        <h5>Corporate Office</h5>

                        <address>
                          Plot No. B – 1/44 , Malviya Nagar (Near Aakash
                          Hospital), New Delhi – 110017
                        </address>
                      </div>
                    </div>
                    <hr />
                    <div class="media">
                      <div class="media-icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                      </div>
                      <div class="media-body">
                        <h5>Email ID</h5>

                        <p class="fs-14">
                          <a
                            class="text-black"
                            href="mailto:info@naukriyan.com"
                          >
                            info@naukriyan.com
                          </a>
                        </p>
                      </div>
                    </div>
                    <hr />
                    <div class="media">
                      <div class="media-icon">
                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                      </div>
                      <div class="media-body">
                        <h5>Contact Number</h5>
                        <p class="fs-14">
                          <a class="text-black" href="tel:+91-1179626411"
                            >+91-1179626411</a
                          >
                        </p>
                      </div>
                    </div>

                    <hr />

                    <div class="media">
                      <div class="media-icon">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                      </div>
                      <div class="media-body">
                        <h5>Website</h5>
                        <p class="fs-14">
                          <a
                            class="text-black"
                            href="http://naukriyan.com/"
                            target="_blank"
                            >www.naukriyan.com</a
                          >
                        </p>
                      </div>
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
export default {
  name: "Contactus",
  data() {
    return {
      form: new Form({
        name: "",
        email: "",
        contact_no: "",
        remarks: "",
      }),
      formStatus: false,
    };
  },
  mounted() {
    this.$store.dispatch("getAllProfile", "/userprofile");
  },
  computed: {
    allProfile() {
      return this.$store.getters.getAllProfile;
    },
  },
  methods: {
    ContactUS() {
      this.formStatus = true;
      this.form
        .post("/add-contactus-detail")
        .then(() => {
          this.formStatus = false;
          this.form = "";
          toast({
            type: "success",
            title:
              "Thanks for contacting us. Our support team contact within 24 hours",
          });
        })
        .catch((error) => {
          this.formStatus = false;
          toast({
            type: "warning",
            title: "Something went wrong.",
          });
        });
    },
  },
};
</script>

<style scoped>
.contact-form {
  background-color: #fff;
  border: 1px solid #eaeaea;
  padding: 2rem;
  -webkit-box-shadow: 1px 1px #ddd;
  box-shadow: 1px 3px 20px #e4e4e4;
}
.form-control {
  border-radius: 0;
}
</style>