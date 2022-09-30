<template>
  <div id="jobseeker-footer">
    <!-- not in use -->
    <div class="footer-clean">
      <footer>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-4 col-md-3 item">
              <h3>CANDIDATE</h3>
              <ul>
                <li>
                  <a
                    href=""
                    data-toggle="modal"
                    data-target="#myModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >Search Jobs</a
                  >
                </li>
                <li>
                  <a
                    href=""
                    data-toggle="modal"
                    data-target="#myModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >My Account</a
                  >
                </li>
                <router-link :to="`/coming-soon`"
                  ><li>
                    <a
                      href=""
                      data-toggle="modal"
                      data-target="#myModal"
                      aria-hidden="true"
                      data-dismiss="modal"
                      >Find Employer</a
                    >
                  </li></router-link
                >
                <router-link :to="`/coming-soon`"
                  ><li><a href="#">Self Assessment</a></li></router-link
                >
                <router-link :to="`/coming-soon`"
                  ><li><a href="#">Video Resumes</a></li></router-link
                >
                <router-link :to="`/coming-soon`"
                  ><li><a href="#">Job Search Techniques</a></li></router-link
                >
                <router-link :to="`/coming-soon`"
                  ><li><a href="#">Premium Services</a></li></router-link
                >
              </ul>
            </div>
            <div class="col-sm-4 col-md-3 item">
              <h3>EMPLOYER</h3>
              <ul>
                <li>
                  <a
                    href=""
                    data-toggle="modal"
                    data-target="#myModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >Post jobs
                  </a>
                </li>
                <li><a href="#">Search for right candidate</a></li>
                <li><a href="#">Customized Job questionnaires</a></li>
                <li><a href="#">Video profile display</a></li>
                <li><a href="#">Subscription </a></li>
              </ul>
            </div>
            <div class="col-sm-4 col-md-3 item">
              <h3>QUICK LINKS</h3>
              <ul>
                <li>
                  <router-link :to="`/about-us`"
                    ><a href="">About Us</a></router-link
                  >
                </li>
                <li>
                  <router-link :to="`/advertise-with-us`"
                    ><a href="">Advertise with Us</a></router-link
                  >
                </li>
                <li>
                  <router-link :to="`/contact-us`"
                    ><a href="">Contact Us</a></router-link
                  >
                </li>
                <li>
                  <a href="http://blog.naukriyan.com/" target="_blank">Blog</a>
                </li>
                <li>
                  <router-link :to="`/faqs`"
                    ><a href="">Guidelines/FAQs</a></router-link
                  >
                </li>
                <li>
                  <router-link :to="`/terms-of-use`"
                    ><a href="">Terms &amp; Conditions</a></router-link
                  >
                </li>
                <li>
                  <router-link :to="`/privacy-policy`"
                    ><a href="">Privacy policy</a></router-link
                  >
                </li>
              </ul>
            </div>
            <div class="col-sm-4 col-md-3 item">
              <h3>NEWS LETTER</h3>
              <form
                role="form"
                method="post"
                @submit.prevent="newsletter()"
                enctype="multipart/form-data"
              >
                <div class="input-group">
                  <div class="input-group-prepend"></div>
                  <input
                    class="form-control"
                    id="news_email"
                    v-model="form.news_email"
                    name="news_email"
                    :class="{ 'is-invalid': form.errors.has('news_email') }"
                    type="email"
                    placeholder="Enter Email...."
                  />
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Go!</button>
                  </div>
                  <has-error :form="form" field="news_email"></has-error>
                </div>
              </form>
            </div>
          </div>
        </div>
      </footer>
      <div class="bottom-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <p class="text-center">
                © 2020 All Rights Reserved by Naukriyan. Design & Developed by
                <a href="http://prakharsoftwares.com/" target="_blank">
                  Prakhar softwares Solution Pvt Ltd
                  <i class="fa fa-heart ml-1"></i
                ></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "jobseeker-footer",
  data() {
    return {
      form: new Form({
        news_email: "",
      }),
    };
  },
  mounted() {},
  computed: {},
  methods: {
    newsletter() {
      this.form
        .post("/add-newsletter")
        .then(() => {
          this.$router.push("/");
          toast({
            type: "success",
            title:
              "Thank you for registered with us.You will get notification for any updated in this portal",
          });
        })
        .catch(() => {});
    },
  },
};
</script>

<style scoped>
</style>