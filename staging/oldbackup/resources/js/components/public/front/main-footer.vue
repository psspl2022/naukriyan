<template>
  <div id="main-footer">
    <div class="footer-clean">
      <footer>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-4 col-md-3 item" v-if="user === 'guest'">
              <h3>CANDIDATE</h3>
              <ul>
                <li>
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#myJobseekerModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >Search Jobs</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#myJobseekerModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >My Account</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#myJobseekerModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >Find Employer</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#myJobseekerModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >Video Resumes</a
                  >
                </li>
                <li>
                  <router-link :to="`/faqs`">Job Search Techniques</router-link>
                </li>
                <li>
                  <router-link :to="`/something-new`"
                    >Premium Services</router-link
                  >
                </li>
              </ul>
            </div>
            <div class="col-sm-4 col-md-3 item" v-if="user === 'Jobseeker'">
              <h3>CANDIDATE</h3>
              <ul>
                <li>
                  <router-link :to="`/browsejob`">Search Jobs</router-link>
                </li>
                <li><router-link :to="`/userinfo`">My Account</router-link></li>
                <li><a href="#">Find Employer</a></li>
                <li>
                  <router-link :to="`/userinfo`">Video Resumes</router-link>
                </li>
                <li>
                  <router-link :to="`/faqs`">Job Search Techniques</router-link>
                </li>
                <li>
                  <router-link :to="`/something-new`"
                    >Premium Services</router-link
                  >
                </li>
              </ul>
              <!-- <ul>
                                <router-link :to="`/coming-soon`"><li><a href="#">Search Jobs</a></li></router-link>
                                <router-link :to="`/coming-soon`"><li><a href="#">My Account</a></li></router-link>
                                <router-link :to="`/coming-soon`"><li><a href="#">Find Employer</a></li></router-link>
                                <router-link :to="`/coming-soon`"><li><a href="#">Self Assessment</a></li></router-link>
                                <router-link :to="`/coming-soon`"><li><a href="#">Video Resumes</a></li></router-link>
                                <router-link :to="`/coming-soon`"><li><a href="#">Job Search Techniques</a></li></router-link>
                                <router-link :to="`/coming-soon`"><li><a href="#">Premium Services</a></li></router-link>
                            </ul> -->
            </div>
            <div class="col-sm-4 col-md-3 item" v-if="user === 'guest'">
              <h3>EMPLOYER</h3>
              <ul>
                <li>
                  <a
                    href=""
                    data-toggle="modal"
                    data-target="#myEmployerModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >Post jobs
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#myEmployerModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >Search for right candidate</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    data-toggle="modal"
                    data-target="#myEmployerModal"
                    aria-hidden="true"
                    data-dismiss="modal"
                    >Customized Job questionnaires</a
                  >
                </li>
                <li>
                  <router-link to="/subscription">Subscription</router-link>
                </li>
              </ul>
            </div>
            <div class="col-sm-4 col-md-3 item" v-if="user === 'Employer'">
              <h3>EMPLOYER</h3>
              <ul>
                <router-link :to="`/postnewjob`"
                  ><li><a href="">Post jobs </a></li></router-link
                >
                <router-link :to="`/resumeview`"
                  ><li>
                    <a href="#">Search for right candidate</a>
                  </li></router-link
                >
                <router-link :to="`/questionnaires`"
                  ><li>
                    <a href="#">Customized Job questionnaires</a>
                  </li></router-link
                >
                <li>
                  <router-link to="/subscription">Subscription</router-link>
                </li>
              </ul>
            </div>
            <div class="col-sm-4 col-md-3 item">
              <h3>QUICK LINKS</h3>
              <ul>
                <li>
                  <router-link :to="`/about-us`">About Us</router-link>
                </li>
                <li>
                  <router-link :to="`/advertise-with-us`"
                    >Advertise with Us</router-link
                  >
                </li>
                <li>
                  <router-link :to="`/contact-us`">Contact Us</router-link>
                </li>
                <li><a href="#" @click="Redirect()">Blog</a></li>
                <li>
                  <router-link :to="`/faqs`">Guidelines/FAQs</router-link>
                </li>
                <li>
                  <router-link :to="`/terms-of-use`"
                    >Terms &amp; Conditions</router-link
                  >
                </li>
                <li>
                  <router-link :to="`/privacy-policy`"
                    >Privacy policy</router-link
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
                <div class="input-group md-form form-sm form-2 pl-0">
                  <input
                    class="form-control my-0 py-1"
                    placeholder="Enter your email"
                    id="news_email"
                    v-model="form.news_email"
                    name="news_email"
                    :class="{ 'is-invalid': form.errors.has('news_email') }"
                    type="email"
                    aria-label="Search"
                    style="width: 50% !important"
                  />
                  <div class="input-group-append">
                    <button
                      class="input-group-text search-input"
                      type="submit"
                      id="basic-text1"
                    >
                      Go
                    </button>
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
                  Prakhar Software Solution Pvt Ltd
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
  name: "main-footer",
  data() {
    return {
      user: "",
      form: new Form({
        news_email: "",
      }),
    };
  },
  mounted() {
    this.getGuestUser();
  },
  methods: {
    Redirect() {
      swal
        .fire({
          title: "Leave Current Website",
          text: "New website open in new tab!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes",
        })
        .then((result) => {
          if (result.value) {
            window.open("http://blog.naukriyan.com/", "_blank");
          }
        });
    },
    getGuestUser() {
      axios.get("/checkuser").then((response) => {
        this.user = response.data.data.user_type;
      });
    },
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