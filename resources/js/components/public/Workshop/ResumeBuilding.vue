<template>
  <div id="home">
    <main-header></main-header>
    <!-- Resume start -->
    <!-- <div class="col-10 mx-auto mar-5rem video_resume"> -->
    <!-- Header section starts from here -->
    <section class="masthead1 header header-content">
      <h2 class="main-heading text-center">
        Resume Building Workshop <span>1 Hour</span>
      </h2>
      <div class="container1 pt-0">
        <div class="row1">
          <div class="col-md-6">
            <div class="col header-content">
              <h3 class="subheading">
                Join the Workshop
              </h3>
              <div class="host-feature list-design">
                <i class="fas fa-arrow-circle-right"></i>
                <!-- <i class='bx' style="margin-top:6px;"></i> -->
                <h5 class="feature-name text-white" style="padding-left: 0.8rem;">Are you still using
                  backdated resume
                  format that makes
                  your job search miserable?</h5>
              </div>
              <div class="host-feature list-design">
                <i class="fas fa-arrow-circle-right"></i>
                <!-- <i class='bx' style="margin-top:6px;"></i> -->
                <h5 class="feature-name text-white" style="padding-left: 0.8rem;">Are you not Getting
                  Interview calls
                  despite
                  applying for multiple jobs?</h5>
              </div>
              <div class="host-feature list-design">
                <i class="fas fa-arrow-circle-right"></i>
                <!-- <i class='bx' style="margin-top:6px;"></i> -->
                <h5 class="feature-name text-white" style="padding-left: 0.8rem;">Are you confident your
                  resume is
                  relevant to the position you are applying for?</h5>
              </div>
              <div class="host-feature list-design">
                <i class="fas fa-arrow-circle-right"></i>
                <!-- <i class='bx' style="margin-top:6px;"></i> -->
                <h5 class="feature-name text-white" style="padding-left: 0.8rem;">Are you not able to craft
                  an ATS proof Resume that leads you to the Interview table?</h5>
              </div>
              <div class="host-feature list-design">
                <i class="fas fa-arrow-circle-right"></i>
                <!-- <i class='bx' style="margin-top:6px;"></i> -->
                <h5 class="feature-name text-white" style="padding-left: 0.8rem;">Are you ready to learn how
                  to showcase your strengths, talent, and capabilities to the recruiter?</h5>
              </div>
              <p class="para-line white">
                If the Answer to any of the questions above makes you think twice about the need to makeover
                your Resume, this workshop is for you!!
              </p>
            </div>
          </div>
          <div class="col header-form">
            <div class="form-area">
              <h2 class="form-heading">
                Grab Your Seat
              </h2>

              <hr>
              <form
                role="form"
                method="post"
                @submit.prevent="registerUser()"
                class="booking-form">
                <div class="form-row">
                  <div class="col">
                    <div class="input-field">
                      <label for="firstName">Full Name</label>
                      <input
                        type="text"
                        class="form-control"
                        required
                        placeholder="Enter Full Name"
                        name="name"
                        v-model="form.name"
                      />
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-field">
                      <label for="lastName">Contact No.</label>
                      <input
                        type="text"
                        class="form-control"
                        required
                        placeholder="Enter Your Contact No."
                        maxlength="10"
                        minlength="10"
                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                        name="contact"
                        id="contact"
                        v-model="form.contact"
                      />
                    </div>
                  </div>
                </div>
                <div class="input-field">
                  <label for="emailId">Email address</label>
                  <input
                    type="email"
                    class="form-control"
                    required
                    placeholder="Enter Your Email Address"
                    name="email"
                    id="email"
                    v-model="form.email"
                  />
                </div>
                <div class="input-field">
                  <button type="submit" class="btn1 topics-btn1 font-weight-bold">
                    <!-- <input type="submit" class="font-weight-bold btn-style" value="Book Now"> -->
                      Book now
                    <!-- </a> -->
                  </button>
                </div>
              </form>
                <div class="inner-row">
                  <div class="col">
                    <h3 class="date text-dark">
                      <i class="fas fa-calendar-alt"></i> 7th November 2022
                    </h3>
                  </div>
                  <div class="col">
                    <h3 class="time text-dark">
                      <i class="fa fa-solid fa-hourglass-start"></i> 2:00 PM
                    </h3>
                  </div>
                </div>
              <!-- </form> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="topics">
      <div class="container1">
        <!-- <h3 class="subheading">
				Topics Covered
			</h3> -->
        <h2 class="heading-new">
          What will you learn?
        </h2>


        <div class="row1">
          <div class="col-md-6">
            <div class="col host-content-col">
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Biggest mistakes made by Jobseekers
                  while
                  creating a Resume.</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Learn about the different parts of a
                  resume and their purpose</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Discover your own unique features and
                  identify how you can take benefits out of them.</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Learn about different types of
                  resumes
                  and discover the one best suited to develop your own individual resume.</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Blueprint to create ATS proof Resume.
                </h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Craft your resume with specific
                  marketing
                  purposes in mind.</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Create a resume that is tailored to
                  the
                  needs of an organization</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Construct powerful accomplishment
                  statements.</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Use action words that present you as
                  a
                  doer and an achiever.</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Learn about the tools that will help
                  you
                  in checking competency of your Resume</h5>
              </div>
              <div class="host-feature list-design">
                <i class='bx' style="margin-top:6px;"></i>
                <h5 class="feature-name" style="padding-left: 0.8rem;">Prepare effective cover and follow-up
                  letters.</h5>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col host-profile-col">
              <img src="assets/public/asset/img/resume-build.png" alt="" class="resume-image">
            </div>
          </div>
        </div>

        <span class="topic-btn1-area">
          <button class="btn1 topics-btn1 white" onclick="topFunction()">
            <a class="font-weight-bold" href="#">Grab your seat</a>
          </button>
        </span>
      </div>
    </section>

    <section class="host">
      <div class="container1">
        <h2 class="heading-new">
          How will you benefit
        </h2>
        <div class="row1">
          <div class="col-md-6">
            <div class="col host-profile-col">
              <img src="assets/public/asset/img/benefits.jpg" alt="" class="host-img">
            </div>
          </div>
          <!-- <div class="col-md-6"> -->
          <div class="col host-content-col">
            <!-- <h2 class="heading">How will you benefit</h2> -->
            <div class="host-feature list-design"
              style="padding: 0.4rem 0; flex-direction:row; justify-content: flex-start; align-items:start;">
              <i class='bx' style="margin-top:6px;"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Learn new styles and resources for
                creating the best possible resume</h4>
            </div>
            <div class="host-feature list-design">
              <i class='bx' style="margin-top:6px;"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Access an instructor that is ready to
                answer any questions, give positive suggestions and encouragement</h4>
            </div>
            <div class="host-feature list-design">
              <i class='bx' style="margin-top:6px;"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Create an up-to-date, concise, and
                polished resume</h4>
            </div>
            <div class="host-feature list-design">
              <i class='bx' style="margin-top:6px;"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Use your newly created resume as a
                powerful tool that will impress potential employers</h4>
            </div>
            <div class="host-feature list-design">
              <i class='bx' style="margin-top:6px;"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Get more interview calls</h4>
            </div>
            <div class="host-feature list-design">
              <i class='bx' style="margin-top:6px;"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Become more confident while giving an
                Interview</h4>
            </div>
          </div>
          <!-- </div> -->
        </div>
        <span class="topic-btn1-area">
          <button class="btn1 topics-btn1 white" onclick="topFunction()">
            <a class="font-weight-bold" href="#">Grab your seat</a>
          </button>
        </span>
      </div>
    </section>

    <div class="text-center">
      <h1>This <span class="highlight-container1"><span class="highlight">Limited Seats!! Diwali offer for Naukriyan
            Subscribers!!</span></span> </h1>
    </div>

    <section class="topics">
      <div class="container1">
        <h2 class="heading-new" style="color:#f9980f;">
          FREE GIFTS TO WORKSHOP ATTENDEES
        </h2>

        <div class="topics-row mt-5">
          <!-- <div class="col-3"></div> -->
          <div class="row flex-column justify-content-center mb-3 ml-4">
            <div class="host-feature list-design align-items-end">
              <i class="fa fa-solid fa-gift"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Resume worksheet</h4>
            </div>
            <div class="host-feature list-design align-items-end">
              <i class="fa fa-solid fa-gift"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Resume Checklist</h4>
            </div>
            <div class="host-feature list-design align-items-end">
              <i class="fa fa-solid fa-gift"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Template for cover letter</h4>
            </div>
            <div class="host-feature list-design align-items-end">
              <i class="fa fa-solid fa-gift"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">Template for follow-up emails</h4>
            </div>
            <div class="host-feature list-design align-items-end">
              <i class="fa fa-solid fa-gift"></i>
              <h4 class="feature-name" style="padding-left: 0.8rem;">List of Action words according to your
                Industry</h4>
            </div>
          </div>
        </div>

        <span class="topic-btn1-area">
          <button class="btn1 topics-btn1 white" onclick="topFunction()">
            <a class="font-weight-bold" href="#">Grab your seat</a>
          </button>
        </span>
      </div>
    </section>

    <section class="footer1">
      <div class="container1">
        <h2 class="heading-new">What are you waiting for??</h2>
        <!-- <p class="para-line white">
				Phasellus accumsan mauris sit amet urna pretium varius. Aliquam suscipit felis a arcu laoreet congue. Habeo nemore appellantur eu usu.
			</p> -->
        <button class="btn1 topics-btn1 white" onclick="topFunction()">
          <a class="font-weight-bold" href="#">
            Register for the Free Workshop!!
          </a>
        </button>
      </div>
    </section>


    <main-footer></main-footer>
  </div>
</template>

  

<script>
import $ from "jquery";
import "../../../../../public/css/workshop.css";
export default {

  name: "ResumeBuilding",
  data() {
    return {
      form: new Form({
        name:"",
        contact:"",
        email:"",
      }),

    };
  },
  methods: {
    
    registerUser() {
      if (
        this.form.name === "" ||
        this.form.email === "" ||
        this.form.contact === ""
      ) {
        swal("Please fill all mandatory fields");
      } else {
        this.form.post("/store-resume-building-workshop").then(() => {
          this.$router.push("/thankyou");
          toast({
            type: "success",
            title: "Registered Successfully",
          });
        });
      }
    },
  
    topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
  },
};
</script>
  
<style scoped>
.highlight-container1, .highlight {
			position: relative;
			display: inline-block;
		}

		.highlight {
			display: inline-block;
		}

		.highlight-container1::before {
			content: ' ';
			display: block;
			height: 90%;
			width: 100%;
			margin-left: -3px;
			margin-right: -3px;
			position: absolute;
			background: rgba(234, 221, 6, 0.3);
			transform: rotate(2deg);
			top: -1px;
			left: -1px;
			border-radius: 20% 25% 20% 24%;
			padding: 10px 3px 3px 10px;
		}

		.list-design {
			padding: 0.4rem 0;
			flex-direction: row;
			justify-content: flex-start;
			align-items: start;
		}

		.topics-btn1:hover {
			background-color: #f95602;
		}
</style>
  