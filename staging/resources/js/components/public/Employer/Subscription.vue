<template>
  <div id="something">
    <main-header></main-header>
    <section>
      <div class="container">
        <div id="triangles">

          <div class="content">
            <h2>Subscribe</h2>
            <hr>
            <p>Subscribe our newsletter to stay updated every moment.</p>
            <div class="row">
              <div class="col-sm-6 mx-auto">

                <form @submit.prevent="newsletter()">
                  <div class="input-group md-form form-sm form-2 pl-0">
                    <input placeholder="Enter your email" type="email" class="form-control my-0 py-1"
                           style="width: 50% !important;" name="news_email" id="news_email" v-model="form.news_email" :class="{ 'is-invalid': form.errors.has('news_email') }">
                    <div class="input-group-append">
                      <button type="submit" class="input-group-text search-input">
                        Subscribe &nbsp;<i class="far fa-paper-plane"></i>
                      </button>
                    </div>
                  </div>
                  <has-error :form="form" field="news_email"></has-error>
                </form>

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
  name: "something",
  data() {
    return {
      user: "",
      form: new Form({
        news_email: "",
        user_type: "Employer"
      }),
    };
  },
  methods: {
    newsletter() {
      this.form
          .post("/add-newsletter")
          .then(response => {
            this.form.news_email = '';
            this.$router.push("/");
            toast({
              type: "success",
              title:
                  "Thank you for subscribe with us.You will get notification for any updated in this portal",
            });
          })
          .catch(error => {
            console.log('Error...');
          });
    }
  }
}
</script>

<style scoped>
.invalid-feedback {
  display: block;
}
</style>
