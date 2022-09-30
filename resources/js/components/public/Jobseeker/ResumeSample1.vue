<template>
  <div id="resumesample1">
    <jobseeker-header></jobseeker-header>
    <section class="top-adjust section pb-5 "id="pt">
      <div class="container">

        <div class="rela-block page">
          <!--                <div class="rela-block top-bar">
                            <div class="caps name"><div class="abs-center">Kyle J Shanks</div></div>
                          </div>-->
          <div class="row">
            <div class="col-sm-4">
              <div class="side-bar">
                <img data-v-1c45bd0c="" src="https://www.w3schools.com/howto/img_avatar.png" class="rounded-circle avatar m-auto" style="width: 200px;height: 200px;">
               <div class="mt-4">
                 <h3>Aalima khan</h3>
                 <p>123 My Place Drive</p>
                 <p>Astoria, New York 11105</p>
                 <p>1-800-CALLPLZ</p>
                 <p>emailsareforsquares@gmail.com</p><br>
                 <ul class="skills">

                   <h4>Expertise</h4>
                   <li class="rela-block list-thing">HTML</li>
                   <li class="rela-block list-thing">CSS (Stylus)</li>
                   <li class="rela-block list-thing">JavaScript &amp; jQuery</li>
                   <li class="rela-block list-thing">Killer Taste</li>
                   <li class="rela-block caps side-header">Education</li>
                   <li class="rela-block list-thing">Advanced potion making</li>
                   <li class="rela-block list-thing">Degree in popping and locking</li>
                   <li class="rela-block list-thing">Knitting game on point</li>
                   <li class="rela-block list-thing">Culinary af</li>
                 </ul>
               </div>
              </div>
            </div>

            <div class="col-sm-8">
              <div class="rela-block content-container">
                <h4 class="text-center mb-4">Jr Front-End Developer</h4>

                <div class="rela-block caps greyed">Profile</div>
                <p class="py-4">Retro DIY quinoa, mixtape williamsburg master cleanse bushwick tumblr chillwave dreamcatcher hella wolf paleo. Knausgaard semiotics truffaut cornhole hoodie, YOLO meggings gochujang tofu. Locavore ugh kale chips iPhone biodiesel typewriter freegan, kinfolk brooklyn kitsch man bun. Austin neutra etsy, lumbersexual paleo cornhole sriracha kinfolk meggings kickstarter. </p>
                <div class="rela-block caps greyed">Experience</div>

                <h3>Job #1</h3>
                <p class="light">First job description</p>
                <p class="justified">Plaid gentrify put a bird on it, pickled XOXO farm-to-table irony raw denim messenger bag leggings. Hoodie PBR&amp;B photo booth, vegan chillwave meh paleo freegan ramps. Letterpress shabby chic fixie semiotics. Meditation sriracha banjo pour-over. Gochujang pickled hashtag mixtape cred chambray. Freegan microdosing VHS, 90's bicycle rights aesthetic hella PBR&amp;B. </p>

                <h3>Job #2</h3>
                <p class="light">Second Job Description</p>
                <p class="justified">Beard before they sold out photo booth distillery health goth. Hammock franzen green juice meggings, ethical sriracha tattooed schlitz mixtape man bun stumptown swag whatever distillery blog. Affogato iPhone normcore, meggings actually direct trade lomo plaid franzen shoreditch. Photo booth pug paleo austin, pour-over banh mi scenester vice food truck slow-carb. Street art kogi normcore, vice everyday carry crucifix thundercats man bun raw denim echo park pork belly helvetica vinyl. </p>

                <h3>Job #3</h3>
                <p class="light">Third Job Description</p>
                <p class="justified">Next level roof party lo-fi fingerstache skateboard, kogi tumblr. Shabby chic put a bird on it chambray, 3 wolf moon swag beard brooklyn post-ironic taxidermy art party microdosing keffiyeh marfa. Put a bird on it 3 wolf moon cliche helvetica knausgaard. Mumblecore fingerstache lomo, artisan freegan keffiyeh paleo kinfolk kale chips street art blog flannel.</p>
              </div>
            </div>
          </div>
        </div>
        <!--              <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="wave" id="one"><path d="M-13.36,88.98 C168.85,182.73 276.72,-73.84 506.31,79.10 L500.00,150.00 L0.00,150.00 Z"></path></svg>
                      <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="wave" id="two"><path d="M-13.36,88.98 C168.85,182.73 276.72,-73.84 506.31,79.10 L500.00,150.00 L0.00,150.00 Z"></path></svg>
                      <div id="hex-holder">
                        <div class="hex" id="uno"></div>
                        <div class="hex" id="dos"></div>
                        <div class="hex" id="tres"></div>
                      </div>-->
        <!--end of Main container-->
      </div>
    </section>
    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "ResumeSample1",
  data() {
    return {
      year: [],
      month: [],
      inputs: [],

      educationalDetails: [],
      professionalDetails: [],
      form: new Form({

      }),
      certInfos: '',
      skillInfo: '',


    }
  },
  mounted() {
    this.$store.dispatch('getAllData', '/jobseeker-profile')
    this.$store.dispatch('getAllProfile', '/userprofile')
  },
  computed: {
    alldata() {
      return this.$store.getters.getAllData;
    },
    allProfile() {
      return this.$store.getters.getAllProfile
    }

  },
  methods: {
    printWindow() {
      //alert("print");
      var printContents = document.getElementById('pt').innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
      //window.print();

    },

    getCertInfo() {
      axios.get('get-certificate-info').then(response => {
        this.certInfos = response.data.userCertInfo;
      });
    },
    getSkillInformation() {
      axios.get('get-user-skill').then(response => {
        this.skillInfo = response.data.data;
      });
    },
    getEducationalInfo() {
      axios.get('get-educational-info').then(response => {
        this.educationalDetails = response.data.educationalDetails;
      });
    },
    getProfessionalInfo() {
      axios.get('get-professional-detail').then(response => {
        this.professionalDetails = response.data.data;

      });
    }

  },


  created() {
    this.getSkillInformation();
    this.getCertInfo();
    this.getEducationalInfo();
    this.getProfessionalInfo();
  }


}
</script>


<style scoped>
.rela-block {
  position: relative;
  margin: auto;

}
.page {
  width: 100%;
  max-width: 1200px;
  margin: 0px auto;
  background-color: #fff;
  box-shadow: 6px 10px 28px 0px rgba(0,0,0,0.4);
}


.side-bar {

  background-color: #f7e0c1;
  padding: 30px 30px 50px;
  height: 100%;
}

.caps {
  text-transform: uppercase;
}

.separator {
  width: 240px;
  height: 2px;
  background-color: #999;
}
.greyed {
  background-color: #ddd;
  width: 100%;
  max-width: 580px;
  text-align: center;
  font-family: 'Open Sans';
  font-size: 18px;
  letter-spacing: 6px;
  font-weight: 600;
  line-height: 28px;
}
.content-container{
  padding: 40px 0px 20px;
}
.skills {
  padding: 0;
}
.skills li{
  list-style-type: none;
  line-height: 1.8;
  margin-bottom: 0.75rem;
}
</style>