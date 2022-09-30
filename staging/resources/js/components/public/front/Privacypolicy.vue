<template>
    <div id="privacypolicy">
        <main-header></main-header>
        <header class="masthead1 text-center text-white mt-5">

            <div class="masthead-content" id="form-container">
                <div class="container">
                    <h1 id="looking" class="masthead-heading mb-0 pb-4">Privacy Policy</h1>
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
                            <div class="card-body privacy-policy" v-html="web_info.privacy_policy">
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
        name: "Privacypolicy",
        data() {
            return {
            web_info: "",
            };
        },
        mounted(){
            this.getWebsiteInfo()
            this.$store.dispatch('getAllProfile','/userprofile')
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
    .privacy-policy p{
        text-align: left!important;
    }
</style>