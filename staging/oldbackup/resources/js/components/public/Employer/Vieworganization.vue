<template>
  <div id="vieworganization">
    <Emp-header></Emp-header>
    <header class="masthead1 text-center text-white">
      <div class="masthead-content" id="form-container">
        <div class="container">
          <h1 id="looking" class="masthead-heading mb-5 pb-4">
            Company Profile
          </h1>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>
    <section class="js_fixedcontent detail-header">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-10 col-md-9">
                <h1>
                  {{ allIndustry.company_name }}
                  <sup class="review" id="t-rating">
                    <span class="review-star">
                      <i
                        v-for="ratingStar in ratingStars"
                        :key="ratingStar.id"
                        :class="
                          ratingStar.id <= avgRating
                            ? 'fa fa-star active'
                            : 'fa fa-star'
                        "
                      ></i>
                    </span>

                    <span class="review-count fs-12" v-if="avgRating"
                      >Avg. {{ avgRating }} / 5</span
                    >
                  </sup>
                </h1>
                <p class="mb-0">{{ allIndustry.website }}</p>
                <div class="detail-tags">
                  <div class="destination">
                    <p>
                      <span>{{
                        ("Established On - " + allIndustry.established_year)
                          | timeformat
                      }}</span>
                    </p>
                  </div>
                </div>

                <div class="detail-tags">
                  <div class="destination">
                    <ul class="simple-list-sshare">
                      <li>
                        <a :href="allIndustry.com_facebook" target="_blank"
                          ><i class="fab fa-facebook-square"></i
                        ></a>
                      </li>
                      <li>
                        <a :href="allIndustry.com_linkedin" target="_blank"
                          ><i class="fab fa-linkedin"></i
                        ></a>
                      </li>
                      <li>
                        <a :href="allIndustry.com_twitter" target="_blank"
                          ><i class="fab fa-twitter-square"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-md-3">
                <div class="meta-option">
                  <div class="price-wrapper p-0">
                    <p class="price mb-2">
                      <span class="d-block">{{ allIndustry.owner_name }}</span>
                      <ins class="new-price d-block">{{
                        allIndustry.com_contact
                      }}</ins>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="top-adjust section pb-5 mt-0 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card mt-3">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Company Summary</h2>

                <p class="fs-13">{{ allIndustry.com_summary }}.</p>
              </div>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Youtube Videos</h2>

                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-lg-4 col-md-12 mb-3">
                      <video-embed css="embed-responsive-4by3" :src="`${allIndustry.company_video}`"></video-embed>
                    </div>
                  
                  <!--Grid column-->
                </div>
              </div>
            </div>

            <div class="card mt-3">
              <div class="card-body">
                <h2 class="hk-pg-title pb-3 fs-25">Additional Information</h2>

                <p class="fs-13">{{ allIndustry.additional }}.</p>
              </div>
            </div>

            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>

    <main-footer></main-footer>
  </div>
</template>

<script>
export default {
  name: "Vieworganization",
  data() {
    return {
      city: [],
      rate: [],
      avgRating: "",
      userRating: "",
      page: "",

      ratingStars: [{ id: 1 }, { id: 2 }, { id: 3 }, { id: 4 }, { id: 5 }],
    };
  },
  mounted() {
    this.$store.dispatch("getAllOrganisations", "/employer-profile");
    this.getRatingsDetails();
  },
  computed: {
    allIndustry() {
      return this.$store.getters.getAllOrganisations;
    },
  },
  methods: {
    getRatingsDetails() {
      axios.get("/get/average/ratings").then((response) => {
        this.avgRating = response.data.data.average_rating;
        this.userRating = response.data.data.user_rating;
      });
    },
    StateId(event) {
      let stateId = event.target.value;
      console.log(stateId);
      axios
        .get("/get-city-id/" + stateId)
        .then((response) => {
          console.log(response);
          if (response) {
            this.city = response.data.data;
          }
        })
        .catch(() => {});
    },
  },
  created() {
    this.getRatingsDetails();
  },
};
</script>

<style scoped>
</style>