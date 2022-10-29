<template>
  <div id="home">
    <main-header></main-header>
    <!-- Resume start -->
    <!-- <div class="col-10 mx-auto mar-5rem video_resume"> -->
    <!-- Header section starts from here -->
    <div class="thanks">
      <div class="container1">
        <div class="row1" style="flex-direction: column;">
          <div class="col thanks-content">
            <i class="fas fa-check-circle"></i>

            <h2 class="main-heading">
              Congrats, You're In!
            </h2>
            <p class="para-line">
              Thanks for registering, we are glad to see you here.
            </p>
          </div>
          <div class="col-md-6 extras-content">
            <img src="assets/public/asset/img/sahasha.jpg" alt="" class="host-img">

            <h3 class="heading1">
              Sahasha Namdeo
            </h3>

            <p class="para-line">
              I am on mission to help 100,000 Jobseekers get their Dream Job!!!
            </p>

            <!-- <button class="btn">
              <a href="https://atulcodex.com">
                Join the community
              </a>
            </button> -->

            <div class="separator"></div>

            <h3 class="heading1">Invite your friends</h3>

            <div class="social-media">
              <i class="fab fa-facebook"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-twitter"></i>
              <i class="fab fa-linkedin"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <main-footer></main-footer>
  </div>
</template>

  

<script>
import $ from "jquery";
import "../../../../../public/css/workshop.css";
export default {

  name: "Thankyou",
  data() {
    return {
      form: new Form({
        name: "",
        contact: "",
        email: "",
      }),

    };
  },
  methods: {
    topFunction() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
  },
};
</script>
  
<style scoped>
.highlight-container1,
.highlight {
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
  