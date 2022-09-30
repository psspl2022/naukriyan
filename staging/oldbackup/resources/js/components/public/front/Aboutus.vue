<template>
    <div id="aboutus">
        <jobseeker-header v-if="allProfile != null && allProfile.user_type==='Jobseeker'"></jobseeker-header>
        <Emp-header v-if="allProfile != null && allProfile.user_type==='Employer'"></Emp-header>
        <main-header v-if=""></main-header>
        <header class="masthead1 text-center text-white mt-5">

            <div class="masthead-content" id="form-container">
                <div class="container">
                    <h1 id="looking" class="masthead-heading mb-0 pb-4">About Us</h1>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>

        </header>

        <section class="section mt-3 mb-5" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body" v-html="web_info.about_us">
                               
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
        name: "Aboutus",
                data() {
            return {
            web_info: "",
            };
        },
        mounted() {
            this.$store.dispatch('getAllProfile', '/userprofile')
            this.getWebsiteInfo()
        },
        computed: {
            allProfile() {
                return this.$store.getters.getAllProfile
            }
        },
        methods:{
            getWebsiteInfo(){
                axios
            .get("get-web-info")
            .then((response) => {
                console.log(response)
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

</style>