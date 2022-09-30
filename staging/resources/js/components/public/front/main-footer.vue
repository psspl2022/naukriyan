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
                <li><a href="http://blog.naukriyan.com/" target="_blank">Blog</a></li>
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

              <a  :href="`${ socialLinks.twitter_links }`" target="_blank" class="icon-button twitter mt-4">
              <i class="fab fa-twitter icon-twitter"></i>
              <span></span></a>
              <a :href="`${ socialLinks.facebook_links }`" target="_blank" class="icon-button facebook">
              <i class="fab fa-facebook-f icon-facebook"></i>
              <span></span></a>
              <a :href="`${ socialLinks.linkedin_links }`" class="icon-button linkedin" target="_blank">
              <i class="fab fa-linkedin-in icon-linkedin"></i>
              <span></span></a>
               <a :href="`${ socialLinks.instagram_links }`"  target="_blank" class="icon-button instagram">
              <i class="fab fa-instagram icon-instagram"></i>
              <span></span></a>
              <a :href="`${ socialLinks.pinterest_links }`" target="_blank" class="icon-button pinterest">
             <i class="fab fa-pinterest icon-pinterest"></i>
              <span></span></a>
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
      socialLinks:[],
      form: new Form({
        news_email: "",
      }),
    };
  },
  mounted() {
    this.getGuestUser();
    axios.get("/get/sociallinks").then((response) => {
      console.log(response);
      this.socialLinks = response.data.data[0];
    });
  },
  methods: {
    // Redirect() {
    //   swal
    //     .fire({
    //       title: "Leave Current Website",
    //       text: "New website open in new tab!",
    //       type: "warning",
    //       showCancelButton: true,
    //       confirmButtonColor: "#3085d6",
    //       cancelButtonColor: "#d33",
    //       confirmButtonText: "Yes",
    //     })
    //     .then((result) => {
    //       if (result.value) {
    //         window.open("http://blog.naukriyan.com/", "_blank");
    //       }
    //     });
    // },
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

/* Wrapper */
.icon-button {
background-color: white;
    border-radius: 3.6rem;
    cursor: pointer;
    display: inline-block;
    font-size: 24px;
    height: 40px;
    /* line-height: 3px; */
    margin: 0 5px;
    position: relative;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    width: 40px;
}

/* Circle */
.icon-button span {
	border-radius: 0;
	display: block;
	height: 0;
	left: 50%;
	margin: 0;
	position: absolute;
	top: 50%;
	-webkit-transition: all 0.3s;
	   -moz-transition: all 0.3s;
	     -o-transition: all 0.3s;
	        transition: all 0.3s;
	width: 0;
}
.icon-button:hover span {
	width: 3.6rem;
	height: 3.6rem;
	border-radius: 3.6rem;
	margin: -1.8rem;
}
.twitter span {
	background-color: #4099ff;
}
.facebook span {
	background-color: #3B5998;
}
.linkedin span {
	background-color: #007bff;
}
.instagram span {
	background-color: #d6249f;
}
.pinterest span {
	background-color:#c8232c ;
}
/* Icons */
.icon-button i {
	    background: none;
    color: #7a7a7a;
    /* height: 3.6rem; */
    left: 9px;
    line-height: 42px;
    position: absolute;
    top: 0;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    z-index: 10;
}
.icon-button .icon-twitter {
	color: #4099ff;
}
.icon-button .icon-facebook {
	color: #3B5998;
}
.icon-button .icon-linkedin {
	color: #007bff;
}
.icon-button .icon-instagram {
	color:#d6249f;
}
.icon-button .icon-pinterest {
	color:#c8232c;
}

.icon-button:hover .icon-twitter,
.icon-button:hover .icon-facebook,
.icon-button:hover .icon-linkedin,
.icon-button:hover .icon-instagram,
.icon-button:hover .icon-pinterest {
	color: white;
}
</style>