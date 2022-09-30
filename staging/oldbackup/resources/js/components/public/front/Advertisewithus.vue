<template>
    <div id="advertisewithus">
        <jobseeker-header v-if="allProfile != null && allProfile.user_type==='Jobseeker'"></jobseeker-header>
        <Emp-header v-if="allProfile != null && allProfile.user_type==='Employer'"></Emp-header>
        <main-header v-if=""></main-header>
        <header class="masthead1 text-center text-white mt-5">

            <div class="masthead-content" id="form-container">
                <div class="container">
                    <h1 id="looking" class="masthead-heading mb-0 pb-4">Advertise With Us</h1>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>

        </header>

        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12" v-html="web_info.advertise_with_us">

                    </div>
                </div>
            </div>
        </section>
        <main-footer></main-footer>

    </div>
</template>

<script>
    export default {
        name: "Advertisewithus",
        data() {
            return {
            web_info: "",
            };
        },
        mounted() {
            this.getWebsiteInfo();
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

</style>