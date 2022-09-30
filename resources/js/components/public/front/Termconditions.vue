<template>
    <div id="termconditions">
        <main-header></main-header>
        <header class="masthead1 text-center text-white mt-5">
            <div class="masthead-content" id="form-container">
                <div class="container">
                    <h1 id="looking" class="masthead-heading mb-0 pb-4">Term & Conditions</h1>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>

        <section class="section mt-3 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body term-condition" v-html="web_info.terms_and_condition">
                                <!-- <h1 class="custom heading">About Our Company</h1> -->
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
        name: "Termconditions",
          data() {
            return {
            web_info: "",
            };
        },
        metaInfo: {
            title:'Latest Job openings in Delhi NCR 2021 | IT recruiter Jobs –Naukriyan',
            // Define meta tags here.
            meta:[
                {name: 'keywords', content: 'Latest Job openings in Delhi 2021, IT recruiter Jobs in Delhi NCR'},
            {name: 'description', content: 'If you are looking for the Latest IT Job openings In Delhi, Naukriyan is the correct place for you.  Then you Contact Us ☎ (+91) 117-962-6411 ✓ Recruitment 2021 ✓ Fresher Jobs'}
            ],
        },
        mounted(){
            this.getWebsiteInfo()
            this.$store.dispatch('getAllProfile','/userprofile')
        },
        computed:{
            allProfile(){
                return this.$store.getters.getAllProfile
            }
        },
        methods:{
            getWebsiteInfo(){
                axios
            .get("get-web-info")
            .then((response) => {
                this.web_info = response.data.data[0];
            })
            .catch((error) => {
                console.log("error");
            });
            }
        }

    }
</script>

<style scoped>
    .term-condition p {
        text-align: left!important;
    }
</style>