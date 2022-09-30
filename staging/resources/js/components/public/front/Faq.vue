<template>
    <div id="faq">
        <jobseeker-header v-if="allProfile != null && allProfile.user_type==='Jobseeker'"></jobseeker-header>
        <Emp-header v-if="allProfile != null && allProfile.user_type==='Employer'"></Emp-header>
        <main-header v-if=""></main-header>
        <header class="masthead1 text-center text-white mt-5">

            <div class="masthead-content" id="form-container">
                <div class="container">
                    <h1 id="looking" class="masthead-heading mb-0 pb-4">FAQs</h1>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>

        </header>

        <section class="section mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 mx-auto" v-for="(faq) in guideline" :key="faq.id">
                        <div class="accordion" id="faqExample">
                            <div class="card mb-2">
                                <div class="card-header pt-1 pb-1" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                           {{'Q -' +faq.question}}
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                     data-parent="#faqExample">
                                    <div class="card-body" >
                                        <b>Answer:</b> <p v-html="faq.answer"></p>
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
        name: "Faq",
        data() {
        return {
            guideline:''
            
            };
        },
        mounted() {
            this.getFaqsData()
            this.$store.dispatch('getAllProfile', '/userprofile')
            // if (localStorage.getItem('reloaded')) {
            //     // The page was just reloaded. Clear the value from local storage
            //     // so that it will reload the next time this page is visited.
            //     localStorage.removeItem('reloaded');
            // } else {
            //     // Set a flag so that we know not to reload the page twice.
            //     localStorage.setItem('reloaded', '1');
            //     location.reload();
            // }
        },
        computed: {
            allProfile() {
                return this.$store.getters.getAllProfile
            }
        },
         methods: {
             getFaqsData(){
                axios.get("/faq/data").then((response) => {
                    this.guideline = response.data.data;
                    
                });
             }
         }

    }
</script>

<style scoped>

</style>